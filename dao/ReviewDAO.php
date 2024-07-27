<?php
require_once('models/Message.php');
require_once('models/Review.php');

require_once('models/Movie.php');
require_once('dao/MovieDAO.php');

class ReviewDAO implements ReviewDAOInterface{
    private $message;
    private $url;
    private $conn;


    public function setMessage($url){
        return $this->message = new Message($url);
    }

    public function setUrl($url){
        $this->url = $url;
    }

    public function setConn($conn){
        $this->conn = $conn;
    }

    public function __construct($base_url, $conn){
        $this->setUrl($base_url);
        $this->setConn($conn);
        $this->setMessage($base_url);
    }

    

    public function buildReview($data){
        $id = $data['id'];
        $rating = $data['rating'];
        $comment = $data['comment'];
        $user_id = $data['user_id'];
        $movie_id = $data['movie_id'];

        $createDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $data['create_date']);
        $create_date = $createDateTime->format('d/m/Y');
        $create_time = $createDateTime->format('H:i');

        $updateDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $data['update_date']);
        $update_date = $updateDateTime->format('d/m/Y');
        $update_time = $updateDateTime->format('H:i');

        $review = new Review();
        $review->setId($id);
        $review->setRating($rating);
        $review->setComment($comment);
        $review->setUserId($user_id);
        $review->setMovieId($movie_id);
        $review->setCreateDate($create_date);
        $review->setCreateTime($create_time);
        $review->setUpdateDate($update_date);
        $review->setUpdateTime($update_time);

        return $review;
    }


    public function getMoviesReview($id){
        $stmt = $this->conn->prepare('SELECT * FROM review WHERE movie_id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0){
            $allMovies = $stmt->fetchAll();
            $allMoviesBuilded = [];

            foreach($allMovies as $movie){
                $allMoviesBuilded[] = $this->buildReview($movie);
            }

            return $allMoviesBuilded;

        } else{
            return false;
        }
    }


    public function create(Review $reviewUser){
        $movieId = $reviewUser->getMovieId();
        $userId = $reviewUser->getUserId();
        $rating = $reviewUser->getRating();
        $comment = $reviewUser->getComment();

        $stmt = $this->conn->prepare('INSERT INTO review (rating, comment, user_id, movie_id, create_date) 
        VALUES (:rating, :comment, :user_id, :movie_id, NOW() )');

        $stmt->bindParam(':rating', $rating);
        $stmt->bindParam('comment', $comment);
        $stmt->bindParam('user_id', $userId);
        $stmt->bindParam('movie_id', $movieId);

        $stmt->execute();

        $this->message->setMessage('Comentário adicionado ao filme com sucesso!', 'success', "movie.php?id=$movieId");

    }


    public function update(Review $reviewUser){

    }


    public function hasAlreadyReviewed($movieId, $userId){
        $stmt = $this->conn->prepare('SELECT * FROM review WHERE movie_id = :movieId and user_id = :userId');
        $stmt->bindParam(':movieId', $movieId);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return true;
        } else{
            return false;
        }
    }


    public function getRatings($id){

    }



}

?>
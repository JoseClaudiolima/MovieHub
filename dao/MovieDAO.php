<?php
require_once('models/Message.php');
require_once('models/Movie.php');

class MovieDAO implements MovieDAOInterface{
    private $conn;
    private $url;
    private $message;


    public function setConn($conn){
        $this->conn = $conn;
    }

    public function getUrl(){
        return $this->url;
    }
    public function setUrl($url){
        $this->url = $url;
    }

    public function getMessage(){
        return $this->message;
    }
    public function setMessage($url){
        $this->message = new Message($url);
    }


    public function __construct($conn, $url){
        $this->setConn($conn);
        $this->setUrl($url);
        $this->setMessage($url);
    }



    public function buildMovie($data){
        $id = $data['id'];
        $title = $data['title'];
        $length = $data['length'];
        $description = $data['description'];
        $image = $data['image'];
        $trailer = $data['trailer'];
        $category = $data['category'];
        $user_id = $data['user_id'];

        $movie = new Movie();
        $movie->setId($id);
        $movie->setTitle($title);
        $movie->setLength($length);
        $movie->setDescription($description);
        $movie->setImage($image);
        $movie->setTrailer($trailer);
        $movie->setCategory($category);
        $movie->setUserId($user_id);

        return $movie;
    }


    public function getLatestMovies(){

    }


    public function getMoviesByCategory($category){

    }


    public function getMoviesByUserId($id){
        $stmt = $this->conn->prepare('SELECT * FROM movies WHERE user_id = :user_id');
        $stmt->bindParam(':user_id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0){
            $allMovies = $stmt->fetchAll();
            $allMoviesBuilded = [];

            foreach($allMovies as $movie){
                $buildMovie = $this->buildMovie($movie);
                $allMoviesBuilded[] = $buildMovie;
            }
            
            return $allMoviesBuilded;

        } else{
            return false;
        }

    }


    public function findById($id){
        $stmt = $this->conn->prepare('SELECT * FROM movies WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0){
            $movieData = $stmt->fetch();
            $movieData = $this->buildMovie($movieData);

            return $movieData;

        } else{
            return false;
        }
    }


    public function findByTitle($title){

    }

    public function create(Movie $movie){
        $title = $movie->getTitle(); 
        $length = $movie->getLength(); 
        $description = $movie->getDescription(); 
        $image = $movie->getImage(); 
        $trailer = $movie->getTrailer();
        $user_id = $movie->getUserId();
        $category = $movie->getCategory();

        $stmt = $this->conn->prepare('INSERT INTO movies (title, length, description, image, trailer, user_id, category) VALUES (:title, :length, :description, :image, :trailer, :user_id, :category)');

         $stmt->bindParam(':title', $title);
         $stmt->bindParam(':length', $length);
         $stmt->bindParam(':description', $description);
         $stmt->bindParam(':image', $image);
         $stmt->bindParam(':trailer', $trailer);
         $stmt->bindParam(':user_id' , $user_id);
         $stmt->bindParam(':category' , $category);

         $stmt->execute();

         $this->message->setMessage('Filme adicionado com sucesso!', 'success');
    }


    public function update(Movie $movie){
        $id = $movie->getId();
        $title = $movie->getTitle(); 
        $length = $movie->getLength(); 
        $description = $movie->getDescription(); 
        $image = $movie->getImage(); 
        $trailer = $movie->getTrailer();
        $user_id = $movie->getUserId();
        $category = $movie->getCategory();

        $stmt = $this->conn->prepare('UPDATE movies SET title = :title, length = :length, description = :description, image = :image, trailer = :trailer, user_id = :user_id, category = :category WHERE id = :id');

         $stmt->bindParam(':id', $id);
         $stmt->bindParam(':title', $title);
         $stmt->bindParam(':length', $length);
         $stmt->bindParam(':description', $description);
         $stmt->bindParam(':image', $image);
         $stmt->bindParam(':trailer', $trailer);
         $stmt->bindParam(':user_id' , $user_id);
         $stmt->bindParam(':category' , $category);

         $stmt->execute();

         $this->message->setMessage('Filme editado com sucesso!', 'success');
    }


    public function destroy($id){
        $stmt = $this->conn->prepare('DELETE FROM movies WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $this->message->setMessage('Filme Excluido com sucesso!', 'success', 'back');
    }


}

?>
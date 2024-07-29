<?php

class Review{
    private $id;
    private $comment;
    private $rating;
    private $user_id;
    private $movie_id;
    private $create_date;
    private $create_time;
    private $update_date;
    private $update_time;


    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }


    public function getComment(){
        return $this->comment;
    }
    public function setComment($comment){
        $this->comment = $comment;
    }


    public function getRating(){
        return $this->rating;
    }
    public function setRating($rating){
        $this->rating = $rating;
    }


    public function getUserId(){
        return $this->user_id;
    }
    public function setUserId($user_id){
        $this->user_id = $user_id;
    }


    public function getMovieId(){
        return $this->movie_id;
    }
    public function setMovieId($movie_id){
        $this->movie_id = $movie_id;
    }


    public function getCreateDate(){
        return $this->create_date;
    }
    public function setCreateDate($create_date){
        $this->create_date = $create_date;
    }


    public function getCreateTime(){
        return $this->create_time;
    }
    public function setCreateTime($create_time){
        $this->create_time = $create_time;
    }


    public function getUpdateDate(){
        return $this->update_date;
    }
    public function setUpdateDate($update_date){
        $this->update_date = $update_date;
    }


    public function getUpdateTime(){
        return $this->update_time;
    }
    public function setUpdateTime($update_time){
        $this->update_time = $update_time;
    }
}

Interface ReviewDAOInterface{
    public function buildReview($data);
    public function getMoviesReview($id);
    public function create(Review $reviewUser);
    public function hasAlreadyReviewed($movieId, $userId);
    public function getRatings($id);

    public function findReviewById($id);
    public function update(Review $reviewUser);

}

?>

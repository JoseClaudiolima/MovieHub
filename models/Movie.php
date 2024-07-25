<?php

class Movie{
    private $id;
    private $title;
    private $description;
    private $category;
    private $trailer;
    private $image;
    private $length;
    private $user_id;


    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }


    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title){
        $this->title = $title;
    }


    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description = $description;
    }


    public function getCategory(){
        return $this->category;
    }
    public function setCategory($category){
        $this->category = $category;
    }


    public function getTrailer(){
        return $this->traielr;
    }
    public function setTrailer($traielr){
        $this->traielr = $traielr;
    }


    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $this->image = $image;
    }
    public function generateImageName($format){
        return bin2hex(random_bytes(50)) . $format;
    }


    public function getLength(){
        return $this->length;
    }
    public function setLength($length){
        $this->length = $length;
    }


    public function getUserId(){
        return $this->user_id;
    }
    public function setUserId($user_id){
        $this->user_id = $user_id;
    }
}


Interface MovieDAOInterface{
    public function buildMovie($data);
    public function getLatestMovies();
    public function getMoviesByCategory($category);
    public function getMoviesByUserId($id);
    public function findById($id);
    public function findByTitle($title);
    public function create(Movie $movie);
    public function update(Movie $movie);
    public function destroy($id);
}

?>
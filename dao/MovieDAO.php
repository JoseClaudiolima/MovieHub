<?php
require_once('models/Message.php');

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

    }


    public function getLatestMovies(){

    }


    public function getMoviesByCategory($category){

    }


    public function getMoviesByUserId($id){

    }


    public function findById($id){

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

    }


    public function destroy($id){

    }


}

?>
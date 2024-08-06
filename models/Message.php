<?php
require_once("config/conn.php");

class Message{
    private $url; // $base_url


    public function __construct($url){
        $this->url = $url;
    }


    public function setMessage($msg, $type, $redirect = 'index.php'){
        $_SESSION['msg'] = $msg;
        $_SESSION['type'] = $type;
        
        if ($redirect === 'back'){
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else{
            header('Location: ' . $this->url . $redirect);
        }
    }
    
    public function getMessage(){
        if (empty($_SESSION['msg'])){
            return '';

        } else {
            return [
                'msg' => $_SESSION['msg'],
                'type' => $_SESSION['type']
            ];
        }
        
    }

    public function clearMessage(){
        $_SESSION['msg'] = '';
        $_SESSION['type'] = '';
    }

}

?>
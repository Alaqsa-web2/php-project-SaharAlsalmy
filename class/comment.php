<?php

class Comment{
    private $error = "";
    public function creat_comment($post_id,$data)

    {
        if(isset($data['comment'])){

            $comment = $data['comment'];
            
            $user_id=$_SESSION['user_id'];
        
            $query ="INSERT INTO `my_social_media_db`.`comments` 
            (`comment`, `post_id`, `user_id`) VALUES ('$comment', '$post_id', '$user_id');";
          
            $DB =new Database();
            $DB->save($query);

        }
        else{

            $this->error.= "please type somthing ! <br> ";
        
        }return $this->error;
    }
    public function get_comment($id)
    {
        $query ="SELECT * FROM comments WHERE post_id = '$id'  ; ";
        $DB =new Database();
        $result =$DB->read($query);
        if ($result) {
            return $result;
            
            

    
        }
        else {
            return false;
        }

        
    }
    



   

  

}
?>
<?php

class Login{
    private $error ="";
    public function evaluate($data)
    {
        $email=$data['email'];
        $password=$data['password'];

        $query="SELECT * FROM users  WHERE email ='$email' LIMIT 1 ";  

         $DB=new Database();
         $result = $DB->read($query);
         print_r($result);

         if ($result) {
             $row = $result[0];
             //print_r($row);
             if($password == $row['password']){
                 //create session data
                 $_SESSION['user_id'] = $row['user_id'];
                // echo  $_SESSION['user_id'];


             }else 
             {
                $this->error .=" Wrong password <br> ";
             }    
        }else 
        {
            $this->error .="No such email was found <br> ";

         }
         return  $this->error;
         //print_r($row);
    
    }

    public function check_login($id)
    {
        // $query ="SELECT userid
        // FROM users
        // WHERE userid = '$id limit 1';";

        $query="SELECT `user_id` FROM `my_social_media_db`.`users` WHERE `user_id` =$id LIMIT 1;";

        
        $DB=new Database();
        $result = $DB->read($query);

        if ($result) {
            # code...
            return true;
        }
        return false;
    }



}
?>
<?php

class SignUp{

    private $error ="";

    public function evaluate($data)
    {

        foreach ($data as $key=>$value){

            if (empty($value)){
                $this->error = $this->error .$key ."is empty ! <br> ";
            }

            if ($key == "email") {
                if ( !preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$value) ) {
                    $this->error = $this->error .$key ."Invalid Emaile or is empty ! <br> ";
                }
            }
        
            if ($key == "firstName") {
                if (is_numeric($value) ) {
                    $this->error = $this->error .$key ."Invalid First name or is empty ! <br> ";
                }
            }

            if ($key == "lastName") {
                if (is_numeric($value) ) {
                    $this->error = $this->error .$key ."Invalid Last name  or is empty ! <br> ";
                }
            }

        }
        $DB = new Database();

        
        if ( $this->error == "") 
        {
        //no error so creat new user 
        $this->create_user($data);
        
        }
        else {
            
            return  $this->error;
        }
        
        
    }

    public function create_user($data)
    {

        $firstName=$data['fname'];
        $lastName=$data['lname'];
        $gender=$data['gender'];
        $email=$data['email'];
        $password=$data['password'];

        //create these  
        $url_address=strtolower($firstName). "." . strtolower($lastName);   

        $user_id=$this->create_user_id();
        
     
         $query ="INSERT INTO `my_social_media_db`.`users` 
         (`user_id`, `first_name`, `last_name`, `gender`, `email`, `password`, `url_address`)
          VALUES ('$user_id', '$firstName', '$lastName', '$gender', '$email',
           ' $password', '$url_address');
         ";
            
          $DB=new Database();
          $DB->save($query);
          //echo $query;

    

    }


    public function create_user_id()
    {
         $length = rand(4,19);
         $number ='';
         for ($i=0; $i <$length; $i++) { 
             # code...
             $new_rand=rand(0,9);
             $number =$number . $new_rand;
         }
         return $number;
    }

}



?>
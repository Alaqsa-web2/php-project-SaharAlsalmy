<?php

 class Post{
    private $error = "";
    public function creat_post($user_id,$data,$files)

     {
        if(isset($data['post'])){
             $myimage = "";
	      	$has_image = 0;
 
            $post = $data['post'];
             $post_id =$this->creat_post_id();

             $query ="INSERT INTO `my_social_media_db`.`posts`
             (`post_id`, `post`, `user_id`,`image`, `has_image`) 
             VALUES ('$post_id', '$post', '$user_id','$myimage','$has_image');";

           

            // $query ="INSERT INTO `my_social_media_db`.`posts`
            //                   (`post_id`, `user_id`, `post`) 
            //          VALUES (' $post_id', '$user_id',' $post'); ";

            $DB =new Database();
            $DB->save($query);

        }
         else{

            //$this->error.= "please type somthing ! <br> ";
        
        }return $this->error;
       

        
    }
    public function get_post($id)
    {
        $query ="SELECT * FROM posts  ORDER BY id DESC LIMIT 10  ; ";
        $DB =new Database();
        $result =$DB->read($query);
        if ($result) {
            return $result;
        }
        else {
            return false;
        }

        
    }

   




    public  function creat_post_id()
    {
        $length = rand(4,19);
		$number = "";
		for ($i=0; $i < $length; $i++) { 
			# code...
			$new_rand = rand(0,9);

			$number = $number . $new_rand;
		}

		return $number;
    }

    



  

}
?>
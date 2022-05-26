<?php
class User{
    public function get_data($id){
        
        $query="SELECT * FROM `my_social_media_db`.`users`
         WHERE `user_id` =$id;";

        $DB =new Database();
        $result= $DB->read($query);

        if ($result) {
           $row = $result[0];
           return $row ;
        }else{
            return false;
        }


    }
    public function get_data_comment($id){
        
        $query="SELECT * FROM `my_social_media_db`.`comments` WHERE `user_id` =$id";

        $DB =new Database();
        $result= $DB->read($query);

        if ($result) {
           $row = $result[0];
           return $row ;
        }else{
             return false;

        }


    }

    public function get_user($id)
	{

		$query = "SELECT * FROM users WHERE user_id =
         '$id';";
		$DB = new Database();
        
		$result = $DB->read($query);

		if($result)
		{
			return $result[0];
            
            
		}else
		{

			return false;
		}
	}
}

?>
<?php
 class Database {

    private $host = "localhost";
    private $username="root";
    private $password="";
    private $db="My_social_media_db";


##########################################################
   public function connect()
    {
        $conn = new mysqli($this->host,$this->username,$this->password,$this->db);
        if(!$conn){
            echo "Can't connect database " . mysqli_connect_error($conn);
            exit;

        }
        return $conn;
    }
##########################################################

public function read($query)
{
    $conn = $this->connect();
    $result =mysqli_query($conn,$query);
    if(!$result){
        return false;
    }else {
        $data =false;
        while($row = mysqli_fetch_assoc($result)) //
        {
            // echo "<pre>";
            // print_r($row);
            // echo"</pre>";
            $data[] =$row;

        }
        return $data;
    }

}

##########################################################
public function save($query)
{
    $conn = $this->connect();
    $result =mysqli_query($conn,$query);
    if(!$result){
        return false;
    }else {
        return true;
        echo "<script>alert('Comment added successfully.')</script>";
    }

}
##########################################################

}


$DB =new Database();


?>
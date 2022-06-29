<?php
session_start();
// unset($_SESSION['userid']);
 // print_r($_SESSION);

//  echo $_SESSION['user_id'];


include("class/connect.php");
include("class/login.php");
include("class/user.php");
include("class/post.php");
include("class/comment.php");

// cheked if the user logend in 

if (isset($_SESSION['user_id']) && is_numeric($_SESSION['user_id'])) {
    
    $id =$_SESSION['user_id'];
    

    $login=new Login();
    $result= $login->check_login($id);

    if($result)
    {
        
        $user=new User();
        $post=new Post();
        

        $user_data= $user->get_data($id);
        $info_users=$user->get_user($id);
        $post_data=$post->get_post($id);

       // print_r($info_users);


        if (!$user_data)
         { 
            header("Location:login.php"); 
             die;     
         }



      }
      else
       {
        header("location:login.php");  
        die; 
    }


    // post start here
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        # code...
        //    print_r($_POST);
        //    echo $id;
        var_dump($_FILES);

        $post = new Post();
        $id =$user_data['user_id'];
        $result= $post->creat_post($id,$_POST,$_FILES);
        

        if ($result == "") {
            header("Location:index.php");
            die;
           
        }else {
            echo $result;
        }
        //print_r($result);


    }
  

    //collect posts
	$post = new Post();
	$id = $user_data['user_id'];
	
	$posts = $post->get_post($id);
   // print_r($user_data);
//    print_r($posts);

    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap 5 css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--style-->
    <link rel="stylesheet" href="css/style.css">
    <title>Social Media</title>
</head>
<body>
   <?php include("header.php"); ?> 
<div 
    style="width: 800px;
    margin: auto;
    min-height: 300px;">
            
    <!--start nav bar-->

     <!-- posts  area-->

     <div style="  min-height: 400px; width: 800px; margin-top: 4px; margin-top:10px; ">
                <div style="border: solid 0px #aaa; padding: 10px ; background-color: white;">

                    <form action="" method="post">
                    <textarea name="post" id="textPost" placeholder="Whate is in your mind? "></textarea>
                    <input type="file" name="my_img" > <pre></pre>
                    <input type="submit" value="Post" id="post_button"> 

                    <br><br> 
                    </form>

                </div>
                <!-- ===================================================================================== -->
                <div class="postCard">

                <?php
                if(isset($posts) && $posts){
                    foreach ($posts as $ROW) { //
                        $user = new User();
                        $ROW_USER = $user->get_user($ROW['user_id']);
                             //print_r($ROW);
                             
            
                            if($ROW_USER['gender'] == "Female")
                            {
                                $image = "img/woman.png";

                            }
                            elseif($ROW_USER['gender'] == "Male"){
                                $image ="img/man.png";

                            }


                       
                        include("post.php");
                
                        }
                }
                ?> 
                   
            </div>
             
             </div>            


          </div>
     
</div>

<!--Bootstrap 5 js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>



<?php 

//require_once("class/post.php");

require_once("class/comment.php");
// print_r($ROW);


if (isset($_SESSION['user_id']) && is_numeric($_SESSION['user_id'])) 
{

    //$id =$_SESSION['user_id'];
    
    
    // comment start here
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        # code...
       $id =$ROW['post_id'];
    //    print_r($_POST);
    //    echo $id;

        $comment = new Comment();
        $result= $comment->creat_comment($id,$_POST);
         echo $result;

        if ($result == "") {
            header("Location:index.php");
            die;
            
        }else {
            echo $result;
        }

    }
  

    //collect comment
	$comment = new Comment();
	$id = $ROW['post_id'];
	
	$comments = $comment->get_comment($id);
   // print_r($comments);
    //print_r($post_data);


   // $comments = $comment->get_comment($ROW['post_id']); //رح ترجع الكومنتات الى تبعون البوست الى اليدي نفسه تبع البوست  
}



    

?>



<div class="postForm">
        <div class="flexPostForm">
            <div class="imgPostForm">
                <img src="<?php echo $image ;?>" alt="">
            </div>
            <div class="namePostCard">
                <p class="name">
                     <?php
                        echo $ROW_USER['first_name'] ." ".$ROW_USER['last_name'] ;
                     ?>
               <div class="divTime">
                    <i class="fa-solid fa-clock"></i>
                    <p> <?php  echo $ROW['date']?> </p>
                </div>
            </div>   
        </div>
        <!-- Image Posts -->
        <div class="imgPost">
        <?php
        echo $ROW['post'];
        ?>
        <br><br>
        
      

       <!-- <img src="imgs/<?php echo $imgName?>" 
       width="150px" height="150px" > -->

       <?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'):
        $image=$_FILES['my_img'];
        print_r($image); 
        echo '<br><br>';
        $imgName=$_FILES['my_img']['name'];
        echo $imgName;

        echo '<br><br>';

        $imageType=$_FILES['my_img']['type'];
        echo $imageType;

        $imageTemp=$_FILES['my_img']['tmp_name'];
        echo $imageTemp;
        $path='C:\xampp\htdocs\WebProjectFinal\SocialMediaNetwork\uploads\\';

        move_uploaded_file($imageTemp,$path,$imgName);

    endif;    
?>


        
        </div>
        <div class="divNumComments">
            <i class="fa-solid fa-comment pNumComments"></i>
            <p class="pNumComments"><?php echo$ROW['id'] ?> Comments</p>
        </div>
        <div>
            <div class="flexPostForm">
                <div class="imgPostForm">
                    <img src="<?php echo $image ;?>" alt="">
                </div>

                <div>
                    
                    
                    <form  method="post" enctype="multipart/form-data">
                    <textarea class="form-control" name="comment" id="textPost" placeholder="Type your comment ">
                    </textarea>
                    <!-- <input type="hidden" name="parent" <?php 'value' .'='. $value= $ROW['post_id'] ; ?> > -->

                    <input class="commentbtn" type="submit" value="Comment" style="font-size:12px;float:right;
                    background-color: #548de9; padding: 3px; border-radius: 4px;
                    margin:10px;color:white; border:none;" >

                    </form>



    

                </div>
            </div>
        </div>

        <hr class="hr">
    <?php
    if(isset($comments) && $comments){
        foreach ($comments as $COMMENT) {
           // if ($value == $ROW['post_id']) {  //
                include("comment.php");
            //}
           // print_r($COMMENT);
           
         
           
    
            }
    }
            ?> 


        
                            

    </div>

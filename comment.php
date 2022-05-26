<?php 


if($ROW_USER['gender'] == "Female")
{
    $image = "img/woman.png";

}
elseif($ROW_USER['gender'] == "Male"){
    $image ="img/man.png";

}
?>



    <div class="comment">
    <div class="flexPostForm">
    <div class="imgPostForm">
        <img src="<?php echo $image ;?>" alt="">
    </div>
    <div class="boxComment">
        <p name="comment" class="nameBoxComment">
            <?php
            //echo "sahar";
          echo $ROW_USER['first_name'] ." ".$ROW_USER['last_name'] ;
        ?> </p>
        <p class="contentBoxComment">
             <?php 
             echo $COMMENT['comment']; ?></p>
        <div class="divTime">
            <i class="fa-solid fa-clock"></i>
            <p>4h</p>
        </div>
    </div>
    </div>
    </div>


    
  
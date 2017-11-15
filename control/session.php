<?php 
    session_start();
    if(!empty($_SESSION["Username"])){  //ถ้าเขียนทำการ login แล้วจะข้ามไปหน้าต่อไป
       // header( "Location: home.php" );  
    }else{
        header( "Location: index.php" );       
    }
?>
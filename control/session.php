<?php 
    session_start();
    if(empty($_SESSION["StudentID"])){  //ถ้าเขียนทำการ login แล้วจะข้ามไปหน้าต่อไป
        header( "Location: index.php" );   
    }
?>
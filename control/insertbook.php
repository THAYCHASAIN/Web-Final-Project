<?php
    session_start();
    include 'Connection.php';

    $bookid =  $_REQUEST["bookid"];
    $name   =  $_REQUEST["name"];
    $author =  $_REQUEST["author"];
    $type   =  $_REQUEST["type"];
    $BLE    =  $_REQUEST["BLE"];
    $self   =  $_REQUEST["self"];
    $img    =  $_REQUEST["img"];

    
    $sql = "INSERT INTO book (BookID,Name,Author,img,Category,BLE_ID,Shelf_id) VALUES ('".$bookid."','".$name."','".$author."','".$img."','".$type."','".$BLE."','".$self."') ";
    //set status ble 
    $conn->query('UPDATE ble_list SET status = "used" WHERE ble = "'.$BLE.'"');

    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    
?>

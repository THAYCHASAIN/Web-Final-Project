<?php
    session_start();
    include 'Connection.php';

    $Bookid   =  $_REQUEST["Bookid"];
    $name   =  $_REQUEST["name"];
    $author =  $_REQUEST["author"];
    $type   =  $_REQUEST["type"];
    $BLE   =  $_REQUEST["BLE"];     
    $self   =  $_REQUEST["self"];
    $img    =  $_REQUEST["img"];

    $sql = "SELECT BLE_ID FROM book WHERE BookID = '".$Bookid ."'" ;
    $result = $conn->query($sql);
    $obj = $result->fetch_object();

    $sql1 = 'UPDATE book SET Name = "'.$name.'" , img = "'.$img.'" ,Author = "'.$author.'",Category = "'.$type .'",BLE_ID = "'.$BLE.'",Shelf_id = "'.$self.'" WHERE BookID = "'.$Bookid .'"';
    if ($obj->BLE_ID !== $BLE) {
        $conn->query('UPDATE ble_list SET status = "ready" WHERE ble = "'.$obj->BLE_ID.'"');
        $conn->query('UPDATE ble_list SET status = "used" WHERE ble = "'.$BLE.'"');
    }
    
        $conn->query($sql1);
        echo  'บันทึกการเปลี่ยนแปลงเรียบร้อยแล้ว';
/*
    
    
    $sql = "INSERT INTO book (BookID,Name,Author,img,Category,BLE_ID,Shelf_id) VALUES ('".$bookid."','".$name."','".$author."','".$img."','".$type."','".$BLE."','".$self."') ";
    //set status ble 
    $conn->query('UPDATE ble_list SET status = "used" WHERE ble = "'.$BLE.'"');

    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

*/
    
?>

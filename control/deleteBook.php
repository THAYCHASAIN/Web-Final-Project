<?php
    session_start();
    include 'Connection.php';

    $bookid =  $_REQUEST["bookid"];
    $username = $_SESSION["StudentID"];

    
    $result = $conn->query("SELECT * FROM book WHERE BookID = '".$bookid."'");
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $sql = "INSERT INTO old_book (BookID, Name, img, Author, Category, BLE_ID, Shelf_id, Status,who)   VALUES ('".$row["BookID"]."','".$row["Name"]."','".$row["img"]."','".$row["Author"]."','".$row["Category"]."','".$row["BLE_ID"]."','".$row["Shelf_id"]."',".$row["Status"].",'".$username."')"; 
            
       
 
            $conn->query($sql); //backup book
            $conn->query("DELETE FROM book WHERE BookID='".$bookid."'"); //ลบรายการ
            $conn->query("UPDATE BLE_list SET status = 'ready' WHERE ble = '".$row["BLE_ID"]."'"); //ปรับสถานะ ble
             
        }
    }
?>










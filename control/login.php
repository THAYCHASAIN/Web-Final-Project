<?php
    session_start();
    
    include 'Connection.php';

    $username =  $_REQUEST["username"];
    $password =  $_REQUEST["password"];
    
 

    $sql = "SELECT * FROM member WHERE StudentID = '".$username."'  AND Status = 1" ;
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if($row["Password"] === $password){
                $_SESSION["Username"] = $row["StudentID"];
                echo $row["Name"]; 
            }else{
                echo 'Password';
            }
        }
    } else {
        echo 'Username';
    }
?>



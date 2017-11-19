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


                $_SESSION["id"] = $row["id"];
                $_SESSION["StudentID"] = $row["StudentID"];
                $_SESSION["Password"] = $row["Password"];
                $_SESSION["Name"] = $row["Name"];
                $_SESSION["Phone"] = $row["Phone"];
                $_SESSION["Email"] = $row["Email"];
                $_SESSION["img"] = $row["img"];
                $_SESSION["Sex"] = $row["Sex"];
                $_SESSION["Status"] = $row["Status"];

                
                echo $row["Name"]; 
            }else{
                echo 'Password';
            }
        }
    } else {
        echo 'Username';
    }
?>



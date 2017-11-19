 <?php 
  session_start();
  if(!empty($_SESSION["StudentID"])){  //ถ้าเขียนทำการ login แล้วจะข้ามไปหน้าต่อไป
      header( "Location: home.php" );  
  }
  
 ?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>UP Library Go</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<style>

    body, html {
        height: 100%;
    }
    body {
            height: 100%; 
        
            
            background-image: url('/assets/img/bg-login.jpg');
            background-repeat: no-repeat;               
            background-position: center;   
            background-size: cover;        
        }
</style>

<body>
    <div class="row" style ="margin-top: 10%; margin-left: 10%;">
        <div class="col-sm-4"></div>

        <div class="col-sm-4">
            <div class="panel panel-default"style = "height: 500px; width: 400px; ">
                <div class="row" style ="">
                    <div class="panel-body" style ="margin-left: 65%;">
                        <img src="/assets/img/ict-logo.png" style = "width : 40%;" />   
                        <img src="/assets/img/up-logo.png" style = "width : 40%;" />   
                    </div>
                </div>

                <div class="row" style ="text-align: center; margin-top: 5%;">
                    <img src="/assets/img/logo.png" style = "width : 70%;"  />
                </div>
                    
                <div class="row" style ="text-align: center; margin-top: 15%;">
                    <div class="col-sm-2"></div> 

                            <div class="col-sm-8"> 

                                <div class="form-group">
                                    <input type="text" class="form-control" id ="username" placeholder="รหัสประจำตัว">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" id ="password" placeholder="รหัสผ่าน">
                                </div>
                                
                                <a> <button type="button" class="btn btn-danger btn-lg"   id="btn1">เข้าสู่ระบบ</button> </a>
                            </div>

                            <script>
                                //login
                                $(document).ready(function(){
                                    $("#btn1").click(function(){
                                        if($("#username").val().length > 0 ){   //เช็ค username != ว่าง
                                            if($("#password").val().length > 0){  //เช็ค password != ว่าง
                                                //post username password
                                                $.post("/control/login.php",
                                                {
                                                    username: $("#username").val(),
                                                    password: $("#password").val()
                                                },

                                                function(data, status){
                                                    if(data.search("Username") !== -1){
                                                        alert('ไม่พบชื่อผู้ใช้งานนี้ หรือ ผู้ใช้งานนี้ไม่มีสิทธิเข้าถึง');
                                                    }else if(data.search("Password") !== -1){
                                                        alert('รหัสผ่านไม่ถูกต้อง');
                                                    }else{
                                                        alert('ยินดีต้อนรับคุณ : '+data);
                                                        window.location.href = 'home.php';
                                                    }
                                                });
                                                                                        
                                            }else{
                                                console.log('Password not okay')
                                                alert('กรุณากรอกรหัสผ่านด้วยครับ');
                                            }
                                        }else{
                                            console.log('Username not okay')
                                            alert('กรุณากรอกชื่อผู้ใช้งานด้วยครับ');
                                        }
                    
                                    });
                                });

                            </script>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-4"></div>
    </div>
</body>
</html>
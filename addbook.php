<?php include 'control/session.php'; 
      include 'control/Connection.php'; 


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UP Libeary Go</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body >
    <div id="wrapper" >
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="home.php" class="navbar-brand" >UP Library Go</a> 
            </div>
            <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">  
                <button id = "logout" class="btn btn-danger square-btn-adjust" style = "font-weight: bold;">ออกระบบ</button>  
            </div> 
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="assets/img/<?php echo $_SESSION['img'];?>" style="width: 40%;"  class="user-image img-responsive"/>
                    <a href="editadmin.php" style="font-weight: bold; font-size: 20px;"><?php echo $_SESSION['Name'];?></a>
                </li>

                    <li>
                        <a  href="home.php"><i class="fa fa-home fa-2x"></i>  หน้าหลัก</a>
                    </li>
                    <li>
                        <a  class = "active-menu"  href="book.php"><i class="fa fa-book fa-2x"></i> รายการหนังสือ</a>
                    </li>	   
                    <li>
                        <a  href="borrow-return.php"><i class="glyphicon glyphicon-list-alt fa-2x"></i> ข้อมูลการยืม-คืน</a>
                    </li>	
                    <li>
                        <a ><i class="fa fa-bar-chart fa-2x"></i> สถิติการยืมหนังสือ<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="statistic1.php">การยืมหนังสือในแต่ละชั้น</a>
                            </li>
                            <li>
                                <a href="statistic2.php">ชั้นที่ได้รับความนิยม</a>
                            </li>

                        </ul>
                    </li> 
                    <li >
                        <a  href="editmember.php"><i class="fa fa-user fa-2x"></i> ผู้ใช้บริการห้องสมุด</a>
                    </li> 
                     <li >
                        <a  href="setting.php"><i class="fa fa-cog fa-2x"></i> ตั้งค่า</a>
                    </li>
                </ul>
            </div>
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" style=" background-image: url('assets/img/bg.jpg');"  >
            
            <div id="page-inner" >
                <div class="row">
                    <h1 class="fa fa-book fa-3x" style = "font-weight: bold; text-align: left; margin-left:5%; " > เพิ่มหนังสือ</h1>
                </div>
                <div class="row"style ="margin-top: 5%;">
                    <div class="col-sm-4"></div> 
                    <div class="col-sm-4" style ="text-align: center;">
                        <img src="assets/img/upload.png" style="width: 80%;" />   
                    </div>  
                </div> 

                <div class="row"style ="margin-top: 5%; text-align: center;">
                    <div class="col-sm-2"></div> 
                    <div class="col-sm-6"> 
                        <form class="form-horizontal">

                            <?php 
                                $result = $conn->query("SELECT * FROM book  ORDER BY BookID DESC");
                                $row = $result->fetch_assoc();
                                $index = sprintf( "%03d", intval($row["BookID"]) + 1);
                            ?>

                            <div class="form-group">
                                <label class="control-label col-sm-4" >เลขที่หนังสือ:</label>
                                <div class="col-sm-8"> 
                                    <input type="text" class="form-control" id="bookid" value = "<?php echo $index;?>" disabled>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-sm-4" >ชื่อหนังสือ:</label>
                                <div class="col-sm-8"> 
                                    <input type="text" class="form-control" id="name" placeholder="PHP MySQL">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-sm-4" >ผู้แต่ง:</label>
                                <div class="col-sm-8"> 
                                    <input type="text" class="form-control" id="author" placeholder="บัญชา ปะสีละเตสัง">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-4" >ประเภท:</label>
                                <div class="col-sm-8"> 
                                    <select class="form-control" id="type"  >
                                        <?php 
                                            echo '<option></option>';
                                            $result = $conn->query("SELECT * FROM typeofbook ");
                                            if($result->num_rows > 0){
                                                while($row = $result->fetch_assoc()) {
                                                    echo '<option>'.$row["typename"].'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-sm-4" >BLE:</label>
                                <div class="col-sm-8"> 
                                    <select class="form-control" id="BLE"  >
                                        <?php 
                                            echo '<option></option>';
                                            $result = $conn->query("SELECT * FROM ble_list WHERE status = 'ready'");
                                            if($result->num_rows > 0){
                                                while($row = $result->fetch_assoc()) {
                                                    echo '<option>'.$row["ble"].'</option>';
                                                }
                                            }else{
                                                echo '<option>ไม่พบอุปกรณ์</option>';
                                            }
                                        ?>   
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-sm-4" >ชั้นวาง:</label>
                                <div class="col-sm-8"> 
                                    <select class="form-control" id="self">
                                        <?php 
                                            echo '<option></option>';
                                            $result = $conn->query("SELECT * FROM shelf WHERE Status = 'Active'");
                                            if($result->num_rows > 0){
                                                while($row = $result->fetch_assoc()) {
                                                    echo '<option>'.$row["Shelf_id"].'</option>';
                                                }
                                            }else{
                                                echo '<option>ไม่พบชั้นวาง</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                        </form> 
                    </div>   
                </div> 
                    <div class="row"style =" text-align: center;">
                        <a> <button type="button" class="btn btn-primary" id = 'submit'>บันทึกข้อมูล</button> </a>
                    </div>  
                </div>
            </div>
        </div>     
              
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<script> 
    $("#logout").click(function(){ 
        console.log('logout') 
        if (confirm("คุณต้องการออกจากระบบใช่ไหม ?") == true) { 
            $.get("/control/logout.php"); 
            window.location.href = 'index.php';
        } 
    }); 

    $("#submit").click(function(){ 
        if($('#name').val().length != 0){
            if($('#author').val().length != 0){
                if($('#type').val().length != 0){
                    if($('#BLE').val().length != 0 && $('#BLE').val() !== 'ไม่พบอุปกรณ์'){
                        if($('#self').val().length != 0 && $('#BLE').val() !== 'ไม่พบชั้นวาง'){
                            $.post("/control/insertbook.php",
                            {   
                                bookid : $('#bookid').val(),
                                name : $('#name').val(),
                                author : $('#author').val(),
                                type : $('#type').val(),
                                BLE : $('#BLE').val(),
                                self : $('#sen  lf').val(),
                                img : 'img'
                            },
  
                            function(data, status){
                                alert(data);
                                window.location.href = 'book.php';
                            });

                        }else{ alert('กรุณาเลือกชั้นวางหนังสือ');  }
                    }else{ alert('กรุณาเลือกรหัสอุปกรณ์ BLE'); }
                }else{  alert('กรุณาเลือกประเภท'); }
            }else{ alert('กรุณากรอกชื่อผู้แต่งหนังสือ'); }
        }else{ alert('กรุณากรอกชื่อหนังสือ'); }
    });
    

</script> 
                          
                            
<?php  include 'control/session.php';
include 'control/Connection.php'; 
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$BookID = htmlspecialchars($_GET["BookID"]);

$sql = "SELECT * FROM book WHERE BookID = '".$BookID."'";
$result = $conn->query($sql);

$BookID   = '';
$Name     = '';
$Author   = '';
$Category = '';
$BLE_ID   = '';
$Shelf_id = '';
$img = '';

if ($result->num_rows > 0) {   
    while($row = $result->fetch_assoc()) {
             $BookID   = $row["BookID"];
             $Name     = $row["Name"];
             $Author   = $row["Author"];
             $Category = $row["Category"];
             $BLE_ID   = $row["BLE_ID"];
             $Shelf_id = $row["Shelf_id"];
             $img      = $row["img"];
    }
}
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
                <li class="text-center">
                    <img src="assets/img/<?php echo $_SESSION['img'];?>" style="width: 40%;"  class="user-image img-responsive"/>
                        <a href="editadmin.php" style="font-weight: bold; font-size: 20px;"><?php echo $_SESSION['Name'];?></a>
                    </li>
				
                    <li>
                        <a  href="home.php"><i class="fa fa-home fa-2x"></i>หน้าหลัก</a>
                    </li>
                    <li>
                        <a  class = "active-menu"  href="book.php"><i class="fa fa-book fa-2x"></i> รายการหนังสือ</a>
                    </li> 
                     <li>
                        <a  href="borrow-return.php" ><i class="glyphicon glyphicon-list-alt fa-2x"></i> ข้อมูลการยืม-คืน</a>
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
        <div id="page-wrapper" style=" background-image: url('assets/img/bg.jpg');">
            <div id="page-inner" >
                <h1 class="	fa fa-book fa-3x" style = "font-weight: bold; text-align: left; margin-left:5%; " > แก้ไขข้อมูลหนังสือ</h1>
                <div class="row"style ="margin-top: 10%;">
                    <div class="col-sm-1"></div>
                        <div class="col-sm-4"style =" text-align: center;" >
                             <img src="<?php echo $img;?>" style="width: 60%;"/>  
                        </div>
                        <div class="col-sm-6" >
                            <form class="form-horizontal">
                            
                        

                                <div class="form-group">
                                    <label class="control-label col-sm-4" >เลขที่หนังสือ:</label>
                                    <div class="col-sm-8"> 
                                         <input type="text" class="form-control" id="bookid" value="<?php echo $BookID;?>" disabled >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-4" >ชื่อหนังสือ :</label>
                                    <div class="col-sm-8"> 
                                         <input type="text" class="form-control" id="name" value="<?php echo $Name;?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-4" >ผู้แต่ง:</label>
                                    <div class="col-sm-8"> 
                                         <input type="text" class="form-control" id="author" value="<?php echo $Author;?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-4" >รูปภาพ:</label>
                                    <div class="col-sm-8"> 
                                         <input type="text" class="form-control" id="img" value="<?php echo $img;?>">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-4" >ประเภท:</label>
                                    <div class="col-sm-8"> 
                                        <select class="form-control" id="type"  >
                                            <?php 
                                                echo '<option>'.$Category.'</option>';
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
                                    <select class="form-control BLE" id = "BLE"  >
                                        <?php 
                                            echo '<option>'.$BLE_ID.'</option>';
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
                                                echo '<option>'.$Shelf_id.'</option>';
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


                                <div class="form-group">
                                    <label class="control-label col-sm-4" ></label>
                                    <div class="col-sm-8"> 
                                        <button type="button" class="btn btn-primary" id = "submit">บันทึกข้อมูล</button>
                                    </div>
                                </div>
                    
       
                            </form>  
                            
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
        console.log($('#bookid').val())
        console.log($('#name').val())
        console.log($('#author').val())
        console.log($('#type').val())
        console.log($('#BLE').val() )
        console.log($('#self').val())
        console.log($('#img').val())

        
        if($('#name').val().length != 0){
            if($('#author').val().length != 0){
                if($('#img').val().length != 0){
                    $.post("/control/editbook.php",
                            {   
                                Bookid   :  $('#bookid').val(),
                                name     :  $('#name').val(),
                                author   :  $('#author').val(),
                                type     :  $('#type').val(),
                                BLE      :  $('#BLE').val() ,
                                self     :  $('#self').val(),
                                img      :  $('#img').val()    
                                
                            },
  
                            function(data, status){
                                alert(data);
                                window.location.href = 'book.php';
                            });

                }else{ alert('กรุณากรอกชื่อภาพปก'); }
            }else{ alert('กรุณากรอกชื่อผู้แต่งหนังสือ'); }
        }else{ alert('กรุณากรอกชื่อหนังสือ'); }
        
    }); 
</script> 

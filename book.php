<?php include 'control/session.php';
include 'control/Connection.php'; 
$input = '';
if (!empty($_POST)){
    
    if(strlen(htmlspecialchars($_POST["bookid"])) != 0){
        $sql = "SELECT * FROM book WHERE 1 and BookID = '".htmlspecialchars($_POST["bookid"])."'";
        $input = htmlspecialchars($_POST["bookid"]);
    }else{
        $sql = "SELECT * FROM book ";
    }

}else{
    $sql = "SELECT * FROM book ";   
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
        <div id="page-wrapper" style=" background-image: url('assets/img/bg.jpg');"  >
            
            <div id="page-inner" >
            <div class="row">
                <h1 class="	fa fa-book fa-3x" style = "font-weight: bold; text-align: left; margin-left:5%; " > รายการหนังสือ</h1>
            </div> 
            <div class="row"style ="margin-top: 5%;">
                <div class="form-group">
                <div class="row" > 
                <div class="col-sm-6"></div> 
                    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
                        <label class="control-label col-sm-6" >รหัสหนังสือ:
                            <input type="text" class="form-control; col-sm-6;" id="bookid" name="bookid" value="<?php echo $input?>">
                            <a> <button type="submit" class="btn btn-warning " id="btn_search" >ค้นหา</button> </a>
                            <a> <button type="button" class="btn btn-success " id="btn_insert" >เพิ่มรายการ</button> </a>  
                        </label>   
                    </form>
                </div>
                </div>
            </div> 
            <div class="row">
            <div class="col-sm-1"></div> 
            <div class="col-sm-10" >
            <style>
                    td{
                     
                        vertical-align: middle;

                    }
            </style>
                <table class="table table-bordered" >
                <thead style = "background-color: #CC0000; color: white;" >
                    <tr>
                        <th>เลขที่</th>
                        <th>ชั้นวาง</th>
                        <th>ชื่อหนังสือ</th>
                        <th>ผู้แต่ง</th>
                        <th>ประเภท</th>
                        <th>BLE</th>
                        <th>เวลาที่ถูกเพิ่ม</th>
                        <th>สถานะ</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>                         
                    </tr>
                </thead>
                <tbody>
         
                    <?php 
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {   
                            while($row = $result->fetch_assoc()) {
                                switch($row["Status"]){
                                    case 0 : $status = 'Idle'; break;
                                    case 1 : $status = 'Picked'; break;
                                    case 2 : $status = 'Borrowed'; break;
                                    case 3 : $status = 'Error'; break;
                                }

                                echo '<tr><th>'.$row["BookID"].'</th>
                                          <td>'.$row["Shelf_id"].'</td>
                                          <td>'.$row["Name"].'</td>
                                          <td>'.$row["Author"].'</td>
                                          <td>'.$row["Category"].'</td>
                                          <td>'.$row["BLE_ID"].'</td>
                                          <td>'.$row["time_stamp"].'</td>
                                          <td style ="text-align: center; font-size : 20px;"> <span class="label label-danger" style = "width : 300px;">'.$status.'</span></td>
                                          <td style ="text-align: center;"> <a> <button  type="button" class="btn btn-primary editbook" id = "'.$row["BookID"].'">แก้ไขข้อมูล</button> </a></td>
                                          <td style ="text-align: center;"> <a> <button  type="button" class="btn btn-danger deletebook" id = "'.$row["BookID"].';'.$row["Status"].'">ลบข้อมูล</button>  </a></td></tr>';
                            }
                        }else{
                            echo '<tr><td>ไม่พบข้อมูล</td>
                                <td>ไม่พบข้อมูล</td>
                                <td>ไม่พบข้อมูล</td>
                                <td>ไม่พบข้อมูล</td>
                                <td>ไม่พบข้อมูล</td>
                                <td>ไม่พบข้อมูล</td>
                                <td>ไม่พบข้อมูล</td>
                                <td>ไม่พบข้อมูล</td>
                                <td>ไม่พบข้อมูล </td>
                                <td> ไม่พบข้อมูล</td></tr>';
                        }
                        $conn->close();
                        
                     
                    ?>
                </tbody>
                </table>
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
    
    
    $("#btn_insert").click(function(){ 
        //
        console.log('btn_insert') 
        location.href = 'addbook.php';
    }); 

    $(".deletebook").click(function(data){ 
        //addbook.php
        var arr = data.target.id.split(';')
        if(arr[1]==0){
            $.post("/control/deleteBook.php",{bookid: arr[0]},function(data, status){
                alert('ลบรายการเสร็จสิ้น');
                window.location.href = 'book.php';
            });
        }else{
            alert('หนังสือเล่มนี้ไม่อยู่ในสถานะที่ลบได้')
        }
    });
    $(".editbook").click(function(data){ 
        location.href = 'editbook.php?BookID='+data.target.id;
    }); 

</script> 

<?php include 'control/session.php'; ?>

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
                        <a  href="book.php"><i class="fa fa-book fa-2x"></i> รายการหนังสือ</a>
                    </li> 
                     <li>
                        <a  class = "active-menu"  href="borrow-return.php" ><i class="glyphicon glyphicon-list-alt fa-2x"></i> ข้อมูลการยืม-คืน</a>
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
                    <h1 class="	fa fa-user fa-3x" style = "font-weight: bold; text-align: left; margin-left:5%; " > ข้อมูลการยืมหนังสือ</h1>
                </div>
                <div class="row"style ="margin-top: 10%;">
                    <div class="form-group">
                        <div class="row" > 
                        <div class="col-sm-6"></div> 
                            <input type="text" class="form-control; col-sm-6;" id="bookid" placeholder="รหัสนิสิต">
                            <input type="text" class="form-control; col-sm-6;" id="bookid" placeholder="เลขที่หนังสือ">
                            <a  href="#"> <button type="button" class="btn btn-success " s >ค้นหา</button> </a>  
                        </div>
                    </div>
                </div>    

                <div class="row" >
                    <div class="col-sm-1"></div> 
                    <div class="col-sm-10" >
                        <table class="table table-bordered" >
                        <thead style = "background-color: #CC0000; color: white;">
                            <tr>
                                <th>รหัสนิสิต</th>
                                <th>เลขที่หนังสือ</th>
                                <th>ชื่อหนังสือ</th>
                                <th>วันที่ยืม</th>
                                <th>เวลาที่ยืม</th>
                                <th>วันที่คืน</th>
                                <th>จำนวนที่ต่ออายุ</th>
                                <th>คืนหนังสือ</th>   
                            </tr>
                        </thead>
                        <tbody>
                            <tr>                             
                                <td>57021252</td>
                                <td>001</td>
                                <td>PHP MySQL</td>
                                <td>22:11:2017</td>
                                <td>12:05:25</td>
                                <td>30:11:2017</td>
                                <td>1</td>
                                <td><button type="button" class="btn btn-primary " s >คืนหนังสือ</button></td>
                                
                            </tr>
                            <tr>    
                                <td>57021285</td>
                                <td>002</td>
                                <td>Computer Architecture</td>
                                <td>4:12:2017</td>
                                <td>15:38:00</td>
                                <td>10:12:2017</td>
                                <td>2</td>
                                <td><button type="button" class="btn btn-primary " s >คืนหนังสือ</button></td>
                                
                            </tr>
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
</script> 

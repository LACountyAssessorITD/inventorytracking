<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CSCI 401</title>
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
<body>
<?php
include "php/session.php";

	session_start();
	checkForActiveSession();
	
?>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                <?php echo getName(); ?>

                </a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">  <a href="php/process_logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a class="active-menu"  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li  >
                        <a  href="form.php"><i class="fa fa-edit fa-3x"></i> Create </a>
                    </li>   

                     <li>
                        <a href="search.php"><i class="fa fa-sitemap fa-3x"></i> Search</a>
                      </li> 
                       <li  >
                                 <a  href="table.php"><i class="fa fa-table fa-3x"></i> All Assets</a>
                        </li>

                           <li >
                             <a  href="mobilescan.php"><i class="fa fa-mobile fa-3x" style="padding-left: 10px; padding-right: 10px"></i> mobile scan</a>
                          </li>
                          

                  	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                        <h5>Welcome <?php echo getName(); ?>, Love to see you back. </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
           
                <div class="col-md-4 col-sm-4 col-xs-12">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-desktop"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"> 
                    <?php 
                          $servername = "localhost:3306";
                                        $username = "root";
                                        $password = "";
                                        $dbname = "LACounty_TEST";



                                         $connection = new mysqli($servername, $username, $password, $dbname);

                                         $sql = "SELECT * FROM all_assets WHERE SYSUPDATEUSER LIKE '";
                                         $sql .= $_SESSION['username'];
                                         $sql .="';";
                                        
                                     // if ($connection->query($sql) === TRUE) {
                                     //    echo "insert into history SUCCESSFULLY\n";
                                     //   } else {
                                     //    echo "Error:" . $connection->error . "\n";
                                     //     }

                         $result = $connection->query($sql);
                        echo $result->num_rows ;
                    ?>


                     Device</p>
                    <p class="text-muted">Under My Name</p>
                </div>
             </div>
		     </div>
             <div class="col-md-4 col-sm-4 col-xs-12">           
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">

                    <?php 
                          $servername = "localhost:3306";
                                        $username = "root";
                                        $password = "";
                                        $dbname = "LACounty_TEST";



                                         $connection = new mysqli($servername, $username, $password, $dbname);

                                         $sql = "SELECT * FROM PenddingRequest";
                                         $sql .=";";
                                        
                                     // if ($connection->query($sql) === TRUE) {
                                     //    echo "insert into history SUCCESSFULLY\n";
                                     //   } else {
                                     //    echo "Error:" . $connection->error . "\n";
                                     //     }

                         $result = $connection->query($sql);
                        echo $result->num_rows ;
                    ?>


                     New</p>
                    <p class="text-muted">Requests</p>
                </div>
             </div>
             </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">6 Recent</p>
                    <p class="text-muted">Transaction</p>
                </div>
             </div>
		     </div>
                    

			</div>
             
                 <!-- /. ROW  -->
            
                <div class="row" >
                   
                    <div class="col-md-12 col-sm-12 col-xs-12">
               
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <i class="fa fa-desktop"></i>
                           Devices Under My Name
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Asset Tag</th>
                                            <th>Asset ID</th>
                                            <th>Category</th>
                                            <th>Location</th>
                                        </tr>
                                    </thead>
                                    </tbody>
                                    <?php

                                        $servername = "localhost:3306";
                                        $username = "root";
                                        $password = "";
                                        $dbname = "LACounty_TEST";



                                         $connection = new mysqli($servername, $username, $password, $dbname);

                                         $sql = "SELECT * FROM all_assets WHERE SYSUPDATEUSER LIKE '";
                                         $sql .= $_SESSION['username'];
                                         $sql .="';";
                                        
                                     // if ($connection->query($sql) === TRUE) {
                                     //    echo "insert into history SUCCESSFULLY\n";
                                     //   } else {
                                     //    echo "Error:" . $connection->error . "\n";
                                     //     }

                                        $result = $connection->query($sql);

                                    if ($result->num_rows > 0) {
      while($row = $result->fetch_array(MYSQLI_NUM)) {
          echo '<tr>';

             for ($x = 0; $x < count($row); $x++) {
                if ($x === 0 || $x === 1  || $x === 5  || $x === 22 ) {
                echo '<td>', $row[$x], '</td>';
          }
         }
      echo '</tr>';
        }
      
      echo '</tbody>';
    }
                                    ?>


                                </table>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                </div>
                <!-- end of row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <i class="fa fa-bell fa-fw"></i>
                    New Requests               
                     </div>
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
<!-- //////////////////////////////////////// -->
<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "LACounty_TEST";

    $connection = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT * FROM PenddingRequest";
    $result = $connection->query($sql);
    $count=0;
      if ($result->num_rows > 0) {
          while($row = $result->fetch_array(MYSQLI_NUM)) {
          echo ' <div class="panel panel-default" id = "', $row[1],'">
                                    <div class="panel-heading">
                                        <h2 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#';
                                            echo $count;
                                            echo'" class="collapsed">';
                                            echo "Asset Tag #", $row[1];
                                            echo '</a>
                                        </h2>
                                    </div>
                                    <div id="';
                                    echo $count;
                                    echo'" class="panel-collapse in" style="height: auto;">
                                        <div class="panel-body">';
                                        if ($row[33]=="owner"){
                                        echo "Requset: Asset ", $row[1], " change owner to ", $row[32];}
                                        else {
                                         echo "Requset: Asset ", $row[1], " change location to ", $row[22];}

                                        
                                        if (checkRole()){

                                        echo '<br>
                                            <button type="button" class="btn btn-warning btn-circle btn-lg" style="float: right; margin-left: 10px;" title = "Deny" onclick="disapprove(\'',$row[1], '\')">
                                            <i class="glyphicon glyphicon-remove "></i></button>   
                                            <button type="button" class="btn btn-info btn-circle btn-lg" style="float: right; display: true;" title = "Approve" onclick="approve(\'',$row[1], '\')">

                                            <i class="glyphicon glyphicon-ok"></i></button>
                                            <br style="clear: both;">';}
                                        echo '

                                        </div>
                                    </div>
                                </div>';
                                        $count++;


        }

    }
?> 



                                

<!-- //////////////////////////////////////// -->


                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>


                 <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                   
                    <div class="chat-panel panel panel-default chat-boder chat-panel-head" >
                        <div class="panel-heading">
                            <i class="fa fa-bars fa-fw"></i>
                                Recent Transaction                            
                                <div class="btn-group pull-right">
                                
                                
                            </div>
                        </div>

                        <div class="panel-body">
                            <ul class="chat-box">
<?php

    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "LACounty_TEST";



    $connection = new mysqli($servername, $username, $password, $dbname);

                                        $sql = "SELECT * FROM history ORDER BY `history`.`UPDATE_TIME`  DESC LIMIT 6";
                                        $result = $connection->query($sql);

                                         if ($result->num_rows > 0) {
                                      while($row = $result->fetch_array(MYSQLI_NUM)) {
                                        echo '<li class="left clearfix">
                                 
                                    <div class="chat-body">';
                                        echo '<strong> Asset #';
                                        echo $row[0];
                                        echo '</strong>';

                                        echo ' <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i>';
                                        echo $row[1];
                                        echo ' </small>                                      
                                        <p>';
                                        echo $row[2] , ' by ', $row[3];
                                        echo '</p>
                                    </div>
                                </li>';
                                      }
                                  }


                                  

?>


                                                                       
                                           

                                
                            </ul>
                        </div>

                    </div>
                    
                </div>
                   
                </div>     
                 <!-- /. ROW  -->

    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
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

    <script>
        function approve(object){
            // console.log("hello");
            console.log(object);
            // return;


            $.ajax({
                type: "POST",
                url: 'php/approvePending.php',
                data:{ 
                    "tag": object,
                },
                success:function(html) {
                    alert(html);
                 }

            });
            

            document.querySelector("#"+object).remove();
            

        }

        function disapprove(object){
            // alert("dis");
             document.querySelector("#"+object).remove();
             $.ajax({
                type: "POST",
                url: 'php/denyPending.php',
                data:{ 
                    "tag": object,
                },
                success:function(html) {
                    alert(html);
                 }

            });

        }
    </script>
    
   
</body>
</html>

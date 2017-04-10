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
    
        </nav>   
           <!-- /. NAV TOP  -->
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
                        <a  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li  >
                        <a   href="form.php"><i class="fa fa-edit fa-3x"></i> Create </a>
                    </li>   

                     <li>
                        <a href="search.php" ><i class="fa fa-sitemap fa-3x"></i> Search</a>
                      </li> 
                       <li  >
                                 <a  href="table.php" class="active-menu" ><i class="fa fa-table fa-3x"></i> All Assets</a>
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
                     <h2>Table Examples</h2>   
                        <h5>Welcome Tony Sereno , Love to see you back. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
              <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                             <th>ASSET_ID</th>
                                              <th>ASSETTAG</th>
                                              <th>SERIALNBR</th>
                                              <th>OTHER_ID</th>
                                              <th>CATEGORY_ID</th>
                                              <th>CATEGORYDESC</th>
                                              <!-- <th>ECAPSCODE</th>
                                              <th>MAKE</th>
                                            <th>MODEL</th>
                                            <th>DECR</th>
                                            <th>CPUTYPE</th>
                                            <th>MEMORYTYPE</th>
                                            <th>HARDDISKTYPE</th> -->
                                            <th>CUSTODIANID</th>
                                            <th>CUSTODIANNAME</th>
                                            <th>ORIGVAL</th>
                                           <!--  <th>ASSET_ID</th>
                                            <th>ASSETTAG</th>
                                            <th>SERIALNBR</th>
                                            <th>OTHER_ID</th>
                                            <th>CATEGORY_ID</th>
                                            <th>CATEGORYDESC</th>
                                            <th>ECAPSCODE</th>
                                            <th>MAKE</th>
                                            <th>LIFE</th>
                                            <th>BOOKVAL</th>
                                            <th>WARRENTYEXPDATE</th>
                                            <th>PO_ID</th>
                                            <th>PURCHASEORDERNBR</th>
                                            <th>LOCATION_ID</th>
                                            <th>LOCATIONNAME</th>
                                            <th>STATUS_ID</th>
                                             <th>STATUSDESC</th>
                                             <th>STATUSDATE</th>
                                             <th>IMPORTED</th>
                                             <th>CREATEDATE</th>
                                             <th>CREATEUSER_ID</th>
                                             <th>UPDATEDATE</th>
                                             <th>UPDATEUSER_ID</th>
                                             <th>DELETEUSER_ID</th>
                                            <th>SYSUPDATEUSER</th> -->

                                        </tr>
                                    </thead>
                                    <tbody>
<!--                                         <!--  -->

<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "";

    $dbname = "LACounty_TEST";

    // $connection = mysql_connect($servername, $username, $password);
    // mysql_select_db($dbname, $connection);

    $connection = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT * FROM all_assets";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
	  while($row = $result->fetch_array(MYSQLI_NUM)) {
            echo '<tr>';
            
            for ($x = 0; $x < 6; $x++)
		{
		    echo '<td>', $row[$x], '</td>';
            }
                
            for ($x = 13; $x < 16; $x++)
		{
                 echo '<td>', $row[$x], '</td>';
            }
                
            echo '</tr>';
        }
	  
	  echo '</tbody></table><br>';
    }
?> 

                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
           
                    <!--  end  Context Classes  -->
                </div>
            </div>
                <!-- /. ROW  -->
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>

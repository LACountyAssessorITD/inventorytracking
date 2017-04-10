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
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Tony Sereno</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 Jan 2017 &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
                    </li>
                
                    
                    <li>
                        <a  href="index.html"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li  >
                        <a   href="form.html"><i class="fa fa-edit fa-3x"></i> Asset </a>
                    </li>   

                     <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i> Search<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Search by Asset Number</a>
                            </li>
                            <li>
                                <a href="#">Search by Location</a>
                            </li>
                            <li>
                                <a href="#">Search by Serial Number</a>
                            </li>

                            <li>
                                <a href="#">Search by Other Information<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Model</a>
                                    </li>
                                    <li>
                                        <a href="#">Category</a>
                                    </li>

                                </ul>
                               
                            </li>
                        </ul>
                      </li>
                       <li  >
                                 <a  class="active-menu" href="table.html"><i class="fa fa-table fa-3x"></i> Table Examples</a>
                             </li> 
                      <li><a></a></li>
                    <li><a></a></li>

                      <li><a></a></li>
                      <li><a></a></li>
                       <li><a></a></li>
                    <li><a></a></li>

                      <li><a></a></li>
                      <li><a></a></li>


                     <li>
                        <a  href="ui.html"><i class="fa fa-desktop fa-3x"></i> UI Elements</a>
                    </li>
                    <li>
                        <a  href="tab-panel.html"><i class="fa fa-qrcode fa-3x"></i> Tabs & Panels</a>
                    </li>
                           <li  >
                        <a   href="chart.html"><i class="fa fa-bar-chart-o fa-3x"></i> Morris Charts</a>
                    </li>   
                      <li  >
                        <a  href="table.html"><i class="fa fa-table fa-3x"></i> Table Examples</a>
                    </li>
                                
                    
                                       
                    
                  <li  >
                        <a  href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
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
                             Devices Information Tables
                        </div>
                        <div class="panel-body">
                          <div class="table-responsive">
                            <div id = "dataTables-example_wrapper"
                            class="dataTables_wrapper form-inline" role="grid">
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="dataTables_length" id="dataTables-example_length">
                                    <label>
                                      <select name="dataTables-example_length" aria-controls="dataTables-example" class="form-control input-sm">
                                        <option value="10"> 10</option>
                                        <option value ="25"> 25</option>
                                        
                                      </select>
                                      " records per page"
                                    </label>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div id="dataTables-example_filter "class="dataTbales_filter">
                                  <label>
                                    "Search: "
                                    <input type="search" class="form-control input-sm" aria-controls="dataTables-example">
                                  </label>
                                </div>
                              </div>

                           
<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "LACounty_TEST";

    // $connection = mysql_connect($servername,$username, $password);
    // mysql_select_db($LACounty_TEST,$connection);

    $connection = new mysqli($servername, $username, $password, $dbname);

    $sql=" SELECT * FROM ASSET ";
    $result = $connection->query($sql);


    if ($result->num_rows > 0) {
         echo '
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
                  <th>ECAPSCODE</th>
                  <th>MAKE</th>
                <th>MODEL</th>
                <th>DECR</th>
                <th>CPUTYPE</th>
                <th>MEMORYTYPE</th>
                <th>HARDDISKTYPE</th>
                <th>CUSTODIANID</th>
                <th>CUSTODIANNAME</th>
                <th>ORIGVAL</th>
                <th>ASSET_ID</th>
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
                <th>SYSUPDATEUSER</th>

                </tr></thead>
                <tbody>';
        while($row = $result->fetch_array(MYSQLI_NUM)) {
                echo '<tr class="odd gradeX">';

                for($x=0; $x<count($row); $x++){
                 echo '<td>',$row[$x],'</td>';

         }
                 echo '</tr>';

        }        echo '</tbody></table><br>';

    } else {
      echo "0 results";
  }




while($tableName = mysql_fetch_row($result)) {
 
        $table = $tableName[0];
       
        echo '<h3>',$table,'</h3>';
        $result2 = mysql_query('SHOW COLUMNS FROM '.$table) or die('cannot show columns from '.$table);
        if(mysql_num_rows($result2)) {
                echo '<table class="db-table" cellpadding="0" cellspacing="0"><thead><tr><th>ASSET_ID</th><th>ASSETTAG</th><th>SERIALNBR</th><th>OTHER_ID</th><th>CATEGORY_ID</th><th>CATEGORYDESC</th><th>ECAPSCODE</th><th>MAKE</th>
                <th>MODEL</th><th>DECR</th><th>CPUTYPE</th><th>MEMORYTYPE</th><th>HARDDISKTYPE</th><th>CUSTODIANID</th><th>CUSTODIANNAME</th><th>ORIGVAL</th>
                <th>ASSET_ID</th><th>ASSETTAG</th><th>SERIALNBR</th><th>OTHER_ID</th><th>CATEGORY_ID</th><th>CATEGORYDESC</th><th>ECAPSCODE</th><th>MAKE</th>
                <th>LIFE</th><th>BOOKVAL</th><th>WARRENTYEXPDATE</th><th>PO_ID</th><th>PURCHASEORDERNBR</th><th>LOCATION_ID</th><th>LOCATIONNAME</th><th>STATUS_ID</th>
                 <th>STATUSDESC</th><th>STATUSDATE</th><th>IMPORTED</th><th>CREATEDATE</th><th>CREATEUSER_ID</th><th>UPDATEDATE</th><th>UPDATEUSER_ID</th><th>DELETEUSER_ID</th>
                <th>SYSUPDATEUSER</th>

                </tr></thead><tbody>';
                
                while($row2 = fetch_array($result2)) {
                        echo '<tr>';
                        foreach($row2 as $key=>$value) {
                                echo '<td>',$value,'</td>';
                        }
                        echo '</tr>';
                }
                echo '</tbody></table><br>';
        }

}
?>

                                </table>
                            </div>
                             </div>
                          </div>
           
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
           
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

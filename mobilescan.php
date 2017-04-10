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
   <style>

label.btn span {
  font-size: 1.5em ;
}

label input[type="radio"] ~ i.fa.fa-circle-o{
    color: #c8c8c8;    display: inline;
}
label input[type="radio"] ~ i.fa.fa-dot-circle-o{
    display: none;
}
label input[type="radio"]:checked ~ i.fa.fa-circle-o{
    display: none;
}
label input[type="radio"]:checked ~ i.fa.fa-dot-circle-o{
    color: #7AA3CC;    display: inline;
}
label:hover input[type="radio"] ~ i.fa {
color: #7AA3CC;
}

label input[type="checkbox"] ~ i.fa.fa-square-o{
    color: #c8c8c8;    display: inline;
}
label input[type="checkbox"] ~ i.fa.fa-check-square-o{
    display: none;
}
label input[type="checkbox"]:checked ~ i.fa.fa-square-o{
    display: none;
}
label input[type="checkbox"]:checked ~ i.fa.fa-check-square-o{
    color: #7AA3CC;    display: inline;
}
label:hover input[type="checkbox"] ~ i.fa {
color: #7AA3CC;
}

div[data-toggle="buttons"] label.active{
    color: #7AA3CC;
}

div[data-toggle="buttons"] label {
display: inline-block;
padding: 6px 12px;
margin-bottom: 0;
font-size: 14px;
font-weight: normal;
line-height: 2em;
text-align: left;
white-space: nowrap;
vertical-align: top;
cursor: pointer;
background-color: none;
border: 0px solid 
#c8c8c8;
border-radius: 3px;
color: #c8c8c8;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
-o-user-select: none;
user-select: none;
}

div[data-toggle="buttons"] label:hover {
color: #7AA3CC;
}

div[data-toggle="buttons"] label:active, div[data-toggle="buttons"] label.active {
-webkit-box-shadow: none;
box-shadow: none;
}



</style>
</head>
<body onload="load_from_url_callback()">
<?php
include "php/session.php";

  session_start();
  // checkForActiveSession();
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
                <!-- <?php echo getName(); ?> -->

                </a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">  <a href="php/process_logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav> 
           <!-- /. NAV TOP  -->
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
                                 <a  href="table.php" ><i class="fa fa-table fa-3x"></i> All Assets</a>
                        </li>

                           <li >
                             <a  href="mobilescan.php"  class="active-menu"><i class="fa fa-mobile fa-3x" style="padding-left: 10px; padding-right: 10px"></i> mobile scan</a>
                          </li>
                          

                    
                </ul>
               
            </div>
            
        </nav> 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Mobile Scan</h2>   
                    </div>
                </div>   
                <hr />                
           
                 <!-- /. ROW  -->
                <div class="row" >
<div class="col-md-12 col-sm-12 col-xs-12">           
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-mobile"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">

                        <input class="btn btn-default btn-lg " onclick="startscan()" type="button" value="Start Scan" /> 

                     </p>
                    <p class="text-muted">
                      Open Scanner
                    </p>
                </div>
             </div>
             </div>
             </div>


                  <h3>Result from barcode</h3>
                  <hr>
                 <form action="scan_result.php" method="POST">
                    <input type="text" class="form-control" name="query" id="barcodefield2" />

                    <div class="btn-group btn-group-vertical" data-toggle="buttons">
                    <label class="btn">

                    <input type="radio" name="type" value="device" checked ><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i> <span> Device</span></label>
                     <label class="btn">

                    <input type="radio" name="type" value="location"> <i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i><span>Location</span></label>
                    </div>
                    <input type="submit" value="Search" class="btn btn-default btn-lg" />
                </form>
              </div>
                   </div>
                </div>


     

                 <!-- /. ROW  -->

             
          </div>
        </div>
        </div>
        <script type="text/javascript">


        function startscan() {
              window.location = "mochabarcode://CALLBACK=http://192.168.0.8:41062/www/mobilescan.php";     
                console.log("Click");  
         }


        function load_from_url_callback() {
          var myParam = location.search.split('BARCODE=')[1];
          if (myParam)
            document.querySelector("#barcodefield2").value = myParam;
          }

</script>
        </body>
        </html>
        
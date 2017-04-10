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
                        <a  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li  >
                        <a  class="active-menu"  href="form.php"><i class="fa fa-edit fa-3x"></i> Create </a>
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
        <!-- end  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Create Asset</h2>   
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Create New Property 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Basic Asset Information</h3>
                                    <form role="form"  action="php/text_html.php" method="post">
                                        <div class="form-group">
                                            <label>Asset ID (*)</label>
                                            <input class="form-control" placeholder="Please Enter Asset ID"   name ="idInput" required="required" type="number" />
                                        </div>

                       
                                        <div class="form-group">
                                            <label>Asset Tag</label>
                                            <input class="form-control" placeholder="Please Enter Asset Tag" name="tagInput" />
                                        </div>
                                        <div class="form-group">
                                            <label>Serial Number</label>
                                            <input class="form-control" placeholder="Please Enter Serial Number"  name ="serialInput" />
                                        </div>
                                          <div class="form-group">
                                            <label>Other ID</label>
                                            <input class="form-control" placeholder="Please Enter Other ID" name = "otherIDInput"/>
                                        </div>

                                         <div class="form-group">
                                            <label>Category ID (*)</label>
                                            <input class="form-control" placeholder="Please Enter Category ID" name = "categoryIDInput" required="required" type="number"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Select A Catagory</label>
                                            <select class="form-control" name="catagoryInput">
                                             
                                                <option value= "AIR FILTRATION SYSTEM<">AIR FILTRATION SYSTEM</option>
                                                <option value= "APPLE IPAD">APPLE IPAD</option>
                                                <option value= "AUDIO RECORDER">AUDIO RECORDER</option>
                                                <option value= "AUDIO/VIDEO EQUIPMENT">AUDIO/VIDEO EQUIPMENT</option>
                                                <option value= "BARCODE SCANNER">BARCODE SCANNER</option>
                                                <option value= "CALCULATOR">CALCULATOR</option>
                                                <option value= "CAMERA">CAMERA</option>
                                                <option value= "CASH REGISTER">CASH REGISTER</option>
                                                <option value= "CATALYST">CATALYST</option>
                                                <option value= "CELL PHONE">CELL PHONE</option>
                                                <option value= "DATE/TIME STAMP">DATE/TIME STAMP</option>
                                                <option value= "DIGITAL PHOTO CAMERA">DIGITAL PHOTO CAMERA</option>
                                                <option value= "DISK DUPLICATOR ">DISK DUPLICATOR </option>
                                                <option value= "DISPLAY BOARD">DISPLAY BOARD</option>
                                                <option value= "ELECTRIC ERASER">ELECTRIC ERASER</option>
                                                <option value= "ENVELOPE OPENERS-ELECTRIC">ENVELOPE OPENERS-ELECTRIC</option>
                                                <option value= "FAN">FAN</option>
                                                <option value= "FAX MACHINE ">FAX MACHINE </option>
                                                <option value= "HOLE PUNCHER (ELECTRIC)">HOLE PUNCHER (ELECTRIC)</option>
                                                <option value= "IT EQUIPMENT (OTHER) ">IT EQUIPMENT (OTHER)  </option>
                                                <option value= "ITD MISC EQUIP (ENTER DESC. IN MODEL FIELD)">ITD MISC EQUIP (ENTER DESC. IN MODEL FIELD)</option>
                                                <option value= "LAMINATOR">LAMINATOR</option>
                                                <option value= "MAILING MACHINE">MAILING MACHINE</option>
                                                <option value= "MFP/PRINTER/COPIER">MFP/PRINTER/COPIER</option>
                                                <option value= "MICROFICHE MACHINE">MICROFICHE MACHINE</option>
                                                <option value= "MICROFICHE UNIT">MICROFICHE UNIT</option>
                                                <option value= "MICROWAVE">MICROWAVE</option>
                                                <option value= "MICROWAVE OVEN">MICROWAVE OVEN</option>
                                                <option value= "MISC (ENTER DESCRIPTION IN MODEL FIELD)">MISC (ENTER DESCRIPTION IN MODEL FIELD)</option>
                                                <option value= "MONITOR">MONITOR</option>
                                                <option value= "PALLET JACK">PALLET JACK</option>
                                                <option value= "PALM PILOT (PDA)">PALM PILOT (PDA)</option>
                                                <option value= "PC-DESKTOP">PC-DESKTOP</option>
                                                <option value= "PC-LAPTOP">PC-LAPTOP</option>
                                                <option value= "PDA">PDA</option>
                                                <option value= "PENCIL SHARPENER">PENCIL SHARPENER</option>
                                                <option value= "PENCIL SHARPENER (ELECTRIC)">PENCIL SHARPENER (ELECTRIC)</option>
                                                <option value= "PRINTSHOP EQUIPMENT (OTHER)">PRINTSHOP EQUIPMENT (OTHER)</option>
                                                <option value= "PRINTSHOP MISC. MACHINE">PRINTSHOP MISC. MACHINE</option>
                                                <option value= "PROJECTOR">PROJECTOR</option>
                                                <option value= "REFRIGERATOR">REFRIGERATOR</option>
                                                <option value= "SCANNER">SCANNER </option>
                                                <option value= "SERVER">SERVER</option>
                                                <option value= "SHREDDER">SHREDDER </option>
                                                <option value= "STAPLER (ELECTRIC)">STAPLER (ELECTRIC)</option>
                                                <option value= "TABLET PC (NON IPAD)">TABLET PC (NON IPAD)</option>
                                                <option value= "TELEVISION">TELEVISION </option>
                                                <option value= "TYPEWRITER">TYPEWRITER</option>
                                                <option value= "UNSPECIFIED">UNSPECIFIED</option>
                                                <option value= "UPS (UNIVERSAL POWER SUPPLY)">UPS (UNIVERSAL POWER SUPPLY)</option>
                                                <option value= "VACUUM">VACUUM</option>
                                                <option value= "VCR">VCR</option>
                                                <option value= "VEHICLE">VEHICLE</option>
                                                <option value= "VIDEO CAMERA">VIDEO CAMERA</option>
                                                



                                                
                                                
                                                
                                                
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Ecapscode</label>
                                            <input class="form-control" placeholder="Please Enter Ecapscode " name = "ecapscodeInput"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Enter A Make</label>
                                            <input class="form-control" placeholder="Please Enter A Make" name="makeInput"/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Enter A Model</label>
                                            <input class="form-control" placeholder="Please Enter Model" name="modelInput"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Asset Description</label>
                                            <textarea class="form-control" rows="" name="descriptionInput"></textarea>
                                        </div>

                                         <div class="form-group">
                                            <label>CPU Type</label>
                                            <input class="form-control" placeholder="Please Enter CPU Type" name = "cputypeInput"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Memory Type</label>
                                            <input class="form-control" placeholder="Please Enter Memory Type" name = "memorytypeInput"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Hard Disk Type</label>
                                            <input class="form-control" placeholder="Please Enter Hard Disk Type" name = "harddisktypeInput"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Enter Custodian ID (*)</label>
                                            <input class="form-control" placeholder="Please Enter Custodian ID" name ="CustodianInput" required="required" type="number"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Enter Custodian Name</label>
                                            <input class="form-control" placeholder="Please Enter Custodian Name" name ="custodianNameInput"/>
                                        </div>              
                                        <div class="form-group">
                                            <label>Original Value</label>
                                            <input class="form-control" placeholder="Please Enter Original Value" name = "valueInput"/>
                                        </div>


                                      <div class="form-group">
                                            <label>Enter Life (*)</label>
                                            <input class="form-control" placeholder="Please Enter Life" name ="lifeInput" required="required" type="number"/>
                                        </div>

                                         <div class="form-group">
                                            <label>Enter Book Value (*)</label>
                                            <input class="form-control" placeholder="Please Enter Book Value" name ="bookvalueInput" required="required" type="number"/>
                                        </div>

                                          <div class="form-group">
                                            <label>Warrenty Expiration Time</label>
                                            <label>(month and year):</label>
                                            <input type="DATE" name="expirationInput">
                                            
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Enter PO ID (*)</label>
                                            <input class="form-control" placeholder="Please Enter PO ID " name ="poIDInput" required="required" type="number"/>
                                        </div>

                                        
                                        <div class="form-group">
                                        
                                            <label>Enter Purchase Order Number </label>
                                            <input class="form-control" placeholder="Please Enter Purchase Order Number" name ="purchaseordernumberInput"/>
                                        </div>
                                    

                                        
                                        <div class="form-group">
                                            <label>Select A Location</label>
                                            <select class="form-control" name="locationIDInput">
                                                <option value="EAST DISTRICT">EAST DISTRICT</option>
                                            
                                                <option value="LANCASTER">LANCASTER</option>
                                                <option value="MATERIALS STOCK WAREHOUSE">MATERIALS STOCK WAREHOUSE</option>
                                                <option value="NORTH DISTRICT">NORTH DISTRICT</option>
                                                <option value="SOUTH DISTRICT">SOUTH DISTRICT</option>
                                                <option value="WEST DISTRICT">WEST DISTRICT</option>
                                                <option></option>
                                                



    
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Office Location</label>
                                            <input class="form-control" placeholder="Please Enter Office Location" name="locationInput"/>
                                        </div>

                                         <div class="form-group">
                                            <label>Select A Status</label>
                                            <select class="form-control" name="statusInput">
                                             
                                                
                                                <option>0 NEW ITEM</option>
                                                <option>1 ITD STOCK</option>
                                                <option>1 IN TRANSIT</option>
                                                <option>3 IN USE</option>
                                                <option>4 REPAIR</option>
                                                <option>5 PENDING DISPOSAL</option>
                                                <option>6 DISPOSED</option>
    
                                            </select>
                                         </div>
                                      <div class="form-group">
                                            <label>Status Date</label>
                                            <label>(month and year):</label>
                                            <input type="DATE"  name="statusdateInput">
                                            
                                           
                                        </div>





                                        <div class="form-group">
                                            <label>IMPORTED ?</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="importantInput" id="optionsRadios1" value="option1" checked />TRUE
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="importantInput" id="optionsRadios2" value="option2"/>FALSE
                                                </label>
                                            </div>
                                            
                                        </div>




                                        

                                        



                                        

                                        

                                       

                                        
                                         <div class="form-group">
                                            <label>Create Date</label>
                                            <label>(month and year):</label>
                                            <input type="DATE" name="createdateInput">
                                            
                                           
                                        </div>

                                      <div class="form-group">
                                            <label>Enter Create User ID(*)</label>
                                            <input class="form-control" placeholder="Please Enter Create User ID" name ="createuserIDInput"  required="required"/>
                                        </div>

                                         <div class="form-group">
                                            <label>Update Time</label>
                                            <label>(month and year):</label>
                                            <input type="DATE"  name="updatetimeInput">
                                            
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Update User ID (*)</label>
                                            <input class="form-control" placeholder="Please Enter Update User ID" name ="updateUserIDInput" required="required" type="number"/>
                                        </div>
                                    <div class="form-group">
                                            <label>Enter Sys Update User</label>
                                            <input class="form-control" placeholder="Please Enter Sys Update User" name ="sysupdateuserInput"/>
                                        </div>

                                        



                                        

                                        <button type="submit" class="form-button" id="submit-btn">Submit </button>
                                        <button type="reset" class="form-button" id="clear-btn">Reset </button>
                                        </form>



                     <!-- End Form Elements -->
                </div>
            </div>
              
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
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>

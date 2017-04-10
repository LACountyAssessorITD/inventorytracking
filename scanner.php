<!DOCTYPE html>
<html>

  <head>
    <meta charset='utf-8' />
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <meta name="description" content="HTML5 QR code Reader : A cross platform HTML5 QR code reader." />

    <link rel="stylesheet" type="text/css" media="screen" href="stylesheets/stylesheet.css">
    
    <script src="javascripts/jquery-1.9.1.min.js"></script>
    <script src="javascripts/html5-qrcode.min.js"></script>
    <script src="javascripts/main.js"></script>

    <title>HTML5 QR code Reader</title>
  </head>

  <body>
<?php
include "php/session.php";

	session_start();
	checkForActiveSession();
?>

    <!-- HEADER -->
 

    <!-- MAIN CONTENT -->
    <div id="main_content_wrap" class="outer">
      <section id="main_content" class="inner center">
       

<h3 class="center">QR code Reader Demo</h3>

<div  class="center" id="reader" style="width:300px;height:250px;">
</div>



<h6 class="center">Result</h6>
<span id="read" class="center"></span>
<br>

<h6 class="center">Read Error (Debug only)</h6>
<span class="center">Will constantly show a message, can be ignored</span>
<span id="read_error" class="center"></span>

<br>
<h6 class="center">Video Error</h6>
<span id="vid_error" class="center"></span>

<br>
<br>
<br>

</div>
</section>


    

  </body>
</html>

<h6 class="center">Video Error</h6>
<span id="vid_error" class="center"></span>

</section>

 </div>
 


<script>


</script>
</body>
</html>
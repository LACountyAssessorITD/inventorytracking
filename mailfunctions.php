<?php

/*send mail function
 *@param $to：recevier $title：mail title $content：mail content
 *@return bool true:Success false:Fail
 */

function sendMail($to,$title,$content){
    
    require_once("phpmailer/class.phpmailer.php"); 
    require_once("phpmailer/class.smtp.php");
    
    $mail = new PHPMailer();
    
    $mail->isSMTP();
    
    $mail->SMTPAuth=true;
    //link 
    $mail->Host = 'smtp.qq.com';
    
    $mail->SMTPSecure = 'ssl';
    
    $mail->Port = 465;
    
    $mail->Hostname = 'localhost';
    $mail->CharSet = 'UTF-8';
    //set sender's nickname
    $mail->FromName = 'PHP Server';
    //smtp login email address. enter a valid email address
    $mail->Username ='lacountyinventory@gmail.com';
    //smtp password
    $mail->Password = 'lacounty2017';
    //email address
    $mail->From = 'lacountyinventory@gmail.com';
    $mail->isHTML(true); 
    $mail->addAddress($to,'PHP Notify');
    $mail->Subject = $title;
    $mail->Body = $content;
    $status = $mail->send();
    if($status) {
        return true;
    }else{
        return false;
    }
}

?>
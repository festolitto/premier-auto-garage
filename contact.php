<?php
include('connection.php');
//contact information submission
  if(isset($_POST['send'])){
  	$name=$_POST['name'];
  	$phone=$_POST['phone'];
  	$email=$_POST['email'];
  	$message=$_POST['message'];

    $mailto = "brystarautobody@gmail.com";
            $mailSub = "Customer Support";
            $mailMsg = "$message";
            $greetings="Hello Brystar";
            $mailMessage ="$greetings,<br><br> 
                            $mailMsg<br><br>
                           <b>Customer Name</b>:$name<br>
                           <b>Customer Phone</b>:$phone<br>
                           <b>Customer Email</b>:$email<br>
                          ";
            require 'PHPMailer-master/PHPMailerAutoload.php';
            $mail = new PHPMailer();
            $mail ->IsSmtp();
            $mail ->SMTPDebug = 0;
            $mail ->SMTPAuth = true;
            $mail ->SMTPSecure = 'ssl';
            $mail ->Host = "smtp.gmail.com";
            $mail ->Port = 465; // or 587
            $mail ->IsHTML(true);
            $mail ->Username = "festolitto@gmail.com";
            $mail ->Password = "53805380";
            $mail ->SetFrom("festolitto@gmail.com");
            $mail ->Subject = $mailSub;
            $mail ->Body = $mailMessage;
            $mail ->AddAddress($mailto);

            if(!$mail->Send()) {
                       echo "Mail Not Sent";
                }
                else{
                    echo "Mail Sent";
                }
    
    $query="insert into contact values('$name','$phone','$email','$message')";
    $res=mysqli_query($conn,$query);


  }
//end ofcontact information submission



//Request Service information submission
 
if(isset($_POST['request'])){
    $service=$_POST['service'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $description=$_POST['description'];
  	$query="insert into service values('$service','$name','$phone','$email','$description')";
    $res=mysqli_query($conn,$query);
    if($res){
    	echo'Request Submited Successfully';
    	    $mailto = "brystarautobody@gmail.com";
            $mailSub = "$service Service Request";
            $mailMsg = "$description";
            $greetings="Hello Brystar";
            $mailMessage ="$greetings,<br><br> 
                            $mailMsg<br><br>
                           <b>Customer Name</b>:$name<br>
                           <b>Customer Phone</b>:$phone<br>
                           <b>Customer Email</b>:$email<br>
                           <b>Customer Location</b>:Kahawa Wendani<br><br>
                          ";
            require 'PHPMailer-master/PHPMailerAutoload.php';
            $mail = new PHPMailer();
            $mail ->IsSmtp();
            $mail ->SMTPDebug = 0;
            $mail ->SMTPAuth = true;
            $mail ->SMTPSecure = 'ssl';
            $mail ->Host = "smtp.gmail.com";
            $mail ->Port = 465; // or 587
            $mail ->IsHTML(true);
            $mail ->Username = "festolitto@gmail.com";
            $mail ->Password = "53805380";
            $mail ->SetFrom("festolitto@gmail.com");
            $mail ->Subject = $mailSub;
            $mail ->Body = $mailMessage;
            $mail ->AddAddress($mailto);

            if(!$mail->Send()) {
                       echo "Mail Not Sent";
                }
                else{
                    echo "Mail Sent";
                }
    }


  	
  }
  //End of Request information submission
?>
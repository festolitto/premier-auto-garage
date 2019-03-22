 $mailto = "$email";
            $mailSub = "$service Service Request";
            $mailMsg = "$description";
            $greetings="Hello $name";
            $mailMessage ="$greetings,<br> $mailMsg<br>";
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
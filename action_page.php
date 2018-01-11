<?php
	$Name = $_POST['name'];
	$Email = $_POST['email'];
	$Subject = $_POST['subject'];
	$Message=$_POST['message'];

//pass the robot validation
	function validation(){
	    return true;
	}

   
   if(validation() == true){
   		// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
require 'PHPMailer.php';
require 'SMTP.php';
//Load composer's autoloader
//require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.qq.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '1003353398@qq.com';                 // SMTP username
    $mail->Password = 'seaezjqjgbjkbgaf';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('1003353398@qq.com','Mailer');
    $mail->addAddress('yujia.zhang@stud.fh-luebeck.de', 'Joe User');     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $Subject;
    $mail->Body    = "Sender Email address is: ". $Email . "<br>" . "Sender name is: ".$Name. "<br>" ."Sender Message is: ". $Message;


    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}

readfile("contact.html");
echo "<script>alert('Send Successfully!')</script>>";
}
?>


<!DOCTYPE html>
<html>
<head>

    <title>Send feedback from user </title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' type='text/css' href="css/bootstrap.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/header.css"/>
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">

</head>

 <?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
  header("Send_feedback.php");
}
?>

<!-- feedback is received from user   to admin mail id  -->
<?php
$Msg = '';

if(isset($_FILES["file"]["name"]) && isset($_POST['message'])) {
	$toemail = "help.iasystem@gmail.com";
	$name = $_POST['name'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$fromemail = "help.pradeepvishwakarma@gmail.com";
	$email1 =$_POST['useremail'];
	// echo ($email1);
    $msg = "hello  $name   <br> feedback massage - $message -  ";
	$msg = "<h1 style='color:green;'>  I-A-SYSTEM  </h1>
	        <h2 style='color:#0ad476a8;'>Feedback Received From User</h2>
                    <p><b>Hello  $name </b></p></br>
					<p><b>USER E-MAIL:- $email1 </b></p></br>
                    <p><b>Message:-</b>  $message  </p>";
	$s_m = md5(uniqid(time()));
	$headers = "From: ".$fromemail;
      $mime_boundary = "==Multipart_Boundary_x{$s_m}x";
	
	$headers .= "\nMIME-Version: 1.0\n" .
	"Content-Type: multipart/mixed;\n" .
	 " boundary=\"{$mime_boundary}\"";




	 $msg .= "This is a multi-part message in MIME format.\n\n" .
	"--{$mime_boundary}\n" .
	"Content-Type:text/html; charset=\"iso-8859-1\"\n" .
	"Content-Transfer-Encoding: 7bit\n\n" .
	$msg .= "\n\n";






// chaking files are  selected or not 

	
	if($_FILES["file"]["name"]!= ""){
		$file_name = $_FILES["file"]["name"];

		$content = chunk_split(base64_encode(
			file_get_contents($_FILES["file"]["tmp_name"])));
	
		$msg .= "--{$mime_boundary}\n" .
	"Content-Type: application/octet-stream;\n" .
	" name=\"{$file_name}\"\n" .
	// "Content-Disposition: attachment;\n" .
	// " filename=\"{$fileatt_name}\"\n" .
	"Content-Transfer-Encoding: base64\n\n" .
	$content .= "\n\n" .
	"--{$mime_boundary}--\n";			
		
	}

	//mail fuction of php 

	if(mail($toemail, $subject, $msg, $headers)){
		$Msg=  $name." your feed-back  has been submitted";

		
			}else{
		$Msg= $name." your feed-back  is  not  submitted";
	}
}
?>
 <!-- feedback form is receiving all input from user-->    

 
<!DOCTYPE html>
<html>

<head>
	<title> Getting feedback from user email I.A.Sys.</title>
	<meta charset="utf-8">
	<meta name="viewport"
		content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
	</script>
	<script src=
"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
	</script>
	<script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
	</script>
	<style>
		form {
			box-shadow: 0px 0px 0px #00cc99;
			padding: 40px;
			margin: 40px;
		}
	</style>
	<?php include'header.php'; ?> 
</head>

<body>
	
	<?php if(!empty($Msg)){ ?>
		<p class="text-success text-center">
			<?php echo $Msg; ?>
		</p>
	<?php } ?>
	
	<form method="post" action=""
			enctype="multipart/form-data"
			class="w-75 mx-auto">
		<h1 class="text-dark text-center">
			Give a feedback 
		</h1>
		
		<h4 class="text-gray text-center">
			Help improve Our products Sending to feedback I.A.Sys.TEAM.
		</h4>
		
		<div class="form-group">
			<input type="text" name="name"
				class="form-control"
				placeholder="Name" required="">
		</div>
		
		 <div class="form-group"> 
			<input type="email" name="useremail" 
				 class="form-control" 
				 placeholder="Email Address"required="" >
		</div> 
		
		
		<div class="form-group">
			<input type="text" name="subject"
				class="form-control"
				placeholder="Subject" required="">
		</div>
		
		<div class="form-group">
			<textarea name="message"
				class="form-control"
				placeholder="Write your message here..."required="">
				
			</textarea>
		</div>
		
		<div class="form-group">
			<input type="file" name="file">
		</div>
		
		<div class="submit text-center">
			<input type="submit" name="submit"
				class="btn btn-success "
				value="SUBMIT YOUR FEEDBACK">
		</div>
		

</body>

</html>


<?php

//logic to senting mail" to conforming  mail is received  to admin" 
$Msg = '';

if(isset($_FILES["file"]["name"]) && isset($_POST['message'])) {
	$toemail =$_POST['useremail'];
	$name = $_POST['name'];
	$subject = "Your Valuable feedBack is Recived";
	$message = $_POST['message'];
	$fromemail = "NO-REPLY@IASYSTEM.COM";
	
	// echo ($email1);



    $msg = " Dear $name   <br> feedback massage - $message -  ";
	$msg = "<h2 style='color:#0ad476a8;'>Thanks For Giving Valuable Feedback And We Improve Our Facility.</h2>
	        <h3 style='color:blue;'> Innovative Attendance System developer team</h3> 
			        <p><b> Dear:-  $name </b></p></br>
					<p><b> This E-mail Registered With Us:-  $email1 </b></p></br>
                    <p><b>Your Message:- </b>  $message  </p>
					<p><b>Thank you being part of us</b>   </p>
					<p><i>TEAM  I.A.SYSTEM </i></p>";
	$s_m = md5(uniqid(time()));
	$headers = "From: ".$fromemail;
      $mime_boundary = "==Multipart_Boundary_x{$s_m}x";
	
	$headers .= "\nMIME-Version: 1.0\n" .
	"Content-Type: multipart/mixed;\n" .
	 " boundary=\"{$mime_boundary}\"";




	 $msg .= "This is a multi-part message in MIME format.\n\n" .
	"--{$mime_boundary}\n" .
	"Content-Type:text/html; charset=\"iso-8859-1\"\n" .
	"Content-Transfer-Encoding: 7bit\n\n" .
	$msg .= "\n\n";



	if(mail($toemail, $subject, $msg, $headers)){
		$Msg=  $name." your feed-back  has been submitted";



		
		
			}else{
		$Msg= $name." your feed-back  is  not  submitted";
	}
}
?>

</main>
</body>
</html>


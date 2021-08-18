<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
//  $receiving_email_address = 'contact@example.com';
//
//  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
//    include( $php_email_form );
//  } else {
//    die( 'Unable to load the "PHP Email Form" Library!');
//  }
//
//  $contact = new PHP_Email_Form;
//  $contact->ajax = true;
//  
//  $contact->to = $receiving_email_address;
//  $contact->from_name = $_POST['name'];
//  $contact->from_email = $_POST['email'];
//  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

//  $contact->add_message( $_POST['name'], 'From');
//  $contact->add_message( $_POST['email'], 'Email');
//  $contact->add_message( $_POST['message'], 'Message', 10);
//
//  echo $contact->send();



$errorMSG1 = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG1 = "Name is required ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG1.= "Email is required ";
} else {
    $email = $_POST["email"];
}

// MSG Guest

// MSG Event
if (empty($_POST["subject"])) {
    $errorMSG1 .= "Subject is required ";
} else {
    $event = $_POST["subject"];
}


// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG1 .= "Message is required ";
} else {
    $message = $_POST["message"];
}


$EmailTo = "headoffice@vivlia.co.za";
$txt = "New Message Received";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Subject: ";
$Body .= $subject;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $txt, $Body, "From:".$email);

// redirect to success page
if ($success && $errorMSG1 == ""){
   echo "Your message has been sent. Thank you!";
}else{
    if($errorMSG1 == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG1;
    }
}
?>

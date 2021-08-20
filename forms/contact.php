<?php

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


$EmailTo = "lizzy@vivlia.co.za";
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

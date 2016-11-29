<?php

if (isset($_POST["submit"])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $comments = $_POST['comments'];

  $from = 'Contact Form';
  $to = 'lucastoltman@gmail.com';
  $subject = 'Message from my Website!';

  $body = "From: $name\n Email: $email\n Message:\n $comments";
}

/*if(isset($_POST['g-recaptcha-response'])){
        $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          echo '<h2>Please check the captcha.</h2>';
          exit;
        }
        $secretKey = "6Lc-RQ0UAAAAANpa5gh1Y38xCGWY6E9A4cuplByN";
        $ip = $_SERVER['159.203.103.224'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
          echo '<h2>Thanks for the spam!</h2>';
        } else {
          echo '<h2>Thanks for the comment. I will get back to you as soon as I can.</h2>';
        ]
*/




if (mail ($to, $subject, $body, $from)) {
  $result='<div class="alert alert-success">Thanks I will be in touch!</div>';
} else {
  $result='<div class="alert alert-danger">Sorry, an error occured. Your message failed to send.</div>';
}

/* Redirect visitor to the thank you page */
header('Location: contact_thanks.html');
exit()

?>

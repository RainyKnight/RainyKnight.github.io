<?php
if ($_POST["submit"]) {
  if (mail ($to, $subject, $body, $from)) {
    echo '<p>Your Message has been sent.</p>';
  } else {
    echo '<p>Something went wrong. :(</p>';
  }

      $name = $_POST["name"];
      $email = $_POST["email"];
      $message = $_POST["message"];
      $from = "From: buttstuff";
      $to = "lucastoltman@gmail.com";
      $subject = "Contact Form Response";

      $body = "From: $name\n Email: $email\n Message:\n $message";
}
?>

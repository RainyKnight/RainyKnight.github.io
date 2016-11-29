<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comments = $_POST['comments'];

    $to = 'lucastoltman@gmail.com';
    $subject = 'Message from my Website!';

    $body = "From: $name\n Email: $email\n Message:\n $comments";

    $headers = array(
        'From: forge@padparadscha.voidteam.net',
        'Reply-To: forge@padparadscha.voidteam.net',
        'X-Mailer: PHP/' . PHP_VERSION
    );

    if (mail($to, $subject, $body, implode(' ', $headers))) {
        echo '<div class="alert alert-success">Thanks I will be in touch!</div>';
    } else {
        echo '<div class="alert alert-danger">Sorry, an error occured. Your message failed to send.</div>';
    }
}
?>

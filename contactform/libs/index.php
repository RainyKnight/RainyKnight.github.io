<?php

if (isset($_POST['submit'])) {
    $name = ($_POST['name']).' ';
    $email = 'Message from my website!';
    $actualemail = $name .'<'.($_POST['email']).'>';
    $comments = $_POST['comments'];

    $to = 'lucastoltman@gmail.com';
    $subject = 'Message from: '. $name;


    $body = "From: $name\n
             Email: $actualemail\n
             Message:\n
             \n
             $comments";



    $headers = array(
        'From: Message from my website!',
        'Reply-To:' . $actualemail,
        'X-Mailer: PHP/' . PHP_VERSION
    );

    if (mail($to, $subject, $body, implode(' ', $headers))) {
        header('Location: http://lucasstoltman.com/contact_thanks.html');
    } else {
        echo '<div class="alert alert-danger">Sorry, an error occured. Your message failed to send.</div>';
    }
}

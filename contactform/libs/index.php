<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comments = $_POST['comments'];

    $to = 'lucastoltman@gmail.com';
    $subject = 'Message from my Website!';

    $body = '<html><body>';
    $body .= "<b>From: </b>$name\n Email: $email\n Message:\n $comments";
    $body .= '</body></html>';


    $headers = array(
        'From:' . $email,
        'Reply-To:' . $email,
        'X-Mailer: PHP/' . PHP_VERSION
    );

    if (mail($to, $subject, $body, implode(' ', $headers))) {
        header('Location: http://lucasstoltman.com/contact_thanks.html');
    } else {
        echo '<div class="alert alert-danger">Sorry, an error occured. Your message failed to send.</div>';
    }
}

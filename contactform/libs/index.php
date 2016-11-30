<?php

if (isset($_POST['submit'])) {
    $name = ($_POST['name']).' ';
    $email = 'trusted@email.com';
    $placeholder = 'LS Website Response ' .'<'. $email .'>';
    $actualemail = $_POST['email'];
    $comments = $_POST['comments'];

    $to = 'lucastoltman@gmail.com';
    $subject = 'Message from: '. $name;


    $body = "$comments\n
             From: $name <$actualemail>";



    $headers = array(
        'From: ' . $email,
        'Reply-To:' . $email,
        'X-Mailer: PHP/' . PHP_VERSION
    );

    if (mail($to, $subject, $body, implode(' ', $headers))) {
        header('Location: http://lucasstoltman.com/contact_thanks.html');
    } else {
        echo '<div class="alert alert-danger">Sorry, an error occured. Your message failed to send.</div>';
    }
}

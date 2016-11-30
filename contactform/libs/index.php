<?php
if (isset($_POST['submit'])) {
    $name = 'LS Website Reply';
    $actualname = ($_POST['name']).' ';
    $email = $name .'<trusted@email.com>';
    $actualemail = $_POST['email'];
    $comments = $_POST['comments'];
    
    $to = 'lucastoltman@gmail.com';
    
    $subject = 'Message from: '. $actualname;
    
    $body = "$comments\n
             From: $actualname\n
             Email: $actualemail\n";
    
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

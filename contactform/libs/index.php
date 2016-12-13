<?php
if (isset($_POST['submit'])) {
    $name = 'LS Website Reply ';
    $actualname = ($_POST['name']).' ';
    $email = $name .'<trusted@email.com>';
    $actualemail = $_POST['email'];
    $comments = $_POST['comments'];
    $captcha = $_POST['g-recaptcha-response'];

    $to = 'stoltmanlucas@gmail.com';

    $subject = 'Message from: '. $actualname;

    $body = "$comments\n
             Name: $actualname\n
             Email: $actualemail\n";

    $headers = array(
        'From:' . $email,
        'Reply-To:' . $email,
        'X-Mailer: PHP/' . PHP_VERSION

    );

    if(!$captcha){
          echo '<h2>Please check that you filled out the captcha form.</h2><br>
                <p>You can click the back arrow without losing the information you entered. :)</p>';
          exit;
        }
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lc-RQ0UAAAAANpa5gh1Y38xCGWY6E9A4cuplByN&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
        if($response.success==false){
          echo '<h2>Not on my watch!</h2>';
        } else {
            if (mail($to, $subject, $body, implode(' ', $headers))){
                header('Location: http://lucasstoltman.com/contact_thanks.html');
            } else {
                echo '<div class="alert alert-danger">Sorry, an error occured. Your message failed to send.</div>';
            }
        }
}

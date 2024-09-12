<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location: login-user.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="feedback.css" type="text/css">

    <!-- Favicons -->
    <link rel="shortcut icon" href="Images/logo.jpg">
    <link rel="apple-touch-icon" href="Images/logo.jpg">
    <link rel="apple-touch-icon" sizes="72x72" href="Images/logo.jpg">
    <link rel="apple-touch-icon" sizes="114x114" href="Images/logo.jpg">
    <link rel="apple-touch-icon" sizes="144x144" href="Images/logo.jpg">

</head>

<body>
    <div class="container">
        <form onsubmit="emailSend(); reset(); return false;" method="post">
            <h2>Feedback</h2>
            <h3>I value your thoughts and contributions and would like to hear from you how to quiz was,
                and i will get back to you as soon as possible.
            </h3>
            <p>Full Name:</p>
            <input type="text" name="senderName" id="senderName" placeholder="" required="required" />
            <p>Email Add:</p>
            <input type="email" name="senderEmail" id="Email_id" placeholder="" required="required" />
            <p>Subject:</p>
            <input type="text" name="subject" id="subject" placeholder="" required="required" />
            <p>Message:</p>
            <textarea name="message" id="message" rows="4" placeholder="" required="required"></textarea>
            <button type="submit" id="sendMessage" class="c-btn pull-right">Submit</button>
        </form>
    </div>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://smtpjs.com/v3/smtp.js">
    </script>

    <script src="feedback.js"></script>

</body>

</html>
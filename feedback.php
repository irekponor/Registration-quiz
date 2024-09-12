<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="feedback.css" type="text/css">
</head>

<body>
    <div class="container">
        <form onsubmit="emailSend(); reset(); return false;">
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
</body>

</html>
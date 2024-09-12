function emailSend() {
  var senderName = document.getElementById("senderName").value;
  var Email_id = document.getElementById("Email_id").value;
  var subject = document.getElementById("subject").value;
  var message = document.getElementById("message").value;

  var message =
    "Sendername: " +
    senderName +
    "<br/> Email_id: " +
    Email_id +
    "<br/> Subject: " +
    subject +
    "<br/> Message: " +
    message;

  Email.send({
    Host: "smtp.elasticemail.com",
    Username: "emmanuelirekponor86@gmail.com",
    Password: "845AB154985535014110CDF2BD9A90B71E40",
    To: "emmanuelirekponor@outlook.com",
    From: "emmanuelirekponor@outlook.com",
    Subject: "from the quiz app",
    Body: message,
  }).then((message) => {
    if (message == "OK") {
      swal(
        "Successful",
        "Thanks for giving me your feedback! I'll get back to you shortly.",
        "success"
      );
    } else {
      swal(
        "Error!",
        "There was a problem sending your message. Please try again.",
        "error"
      );
    }
  });
}

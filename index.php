<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
    <h4 class="sent-notification"></h4>
    <form id="myForm">
     <h2>Send an Email</h2>
     <label>Name</label>
     <input id="name" type="text" placeholder="Enter Name">
     <br><br>
     <label>Email</label>
     <input id="email" type="text" placeholder="Enter Email">
     <br><br>
     <label>Subject</label>
     <input id="subject" type="text" placeholder="Enter Subject">
     <br><br>
     <p>Meassage</p>
     <textarea id="body" rows="5" placeholder="type Message"></textarea>
     <br><br>
     <button type="button" onclick="sendEmail()" value="Send an Email">Submit</button>


    </form>
    </center>

    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>

</body>
</html>
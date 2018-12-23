<!DOCTYPE html>
<html>
<head>
<?php 
$title = "Iletisim";
 require_once "blocks/head.php"
  ?>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script>
  		$(document).ready (function(){
			$("#done").click (function() {
				$('#messageShow').hide();
				var name = $("#name").val();
				var email = $("#email").val();
				var subject = $("#subject").val();
				var message = $("#message").val();
				var fail = "";
				if (name.length <3) fail="Name should be more than 3 char.";
				else if (email.split ('@').length-1==0 || email.split ('.').length-1==0)
					fail="email adress is not correct";
					else if (subject.length <5) fail="subject should be more than 5 char.";
							else if (subject.length <15) fail="message should be more than 15 char.";
						if(fail !=""){
							$('#messageShow').html (fail + "<div class= 'clear'><br></div>");
							$('#messageShow').show();
							return false;
						}
						$.ajax ({
							url: '/ajax/feedback.php',
							type: 'POST',
							cache: false;
							data: {'name' : name, 'email' : email, 'subject' : subject, 'message': message},
							dataType: 'html',
							success: function(data) {
								if(data == 'message has been sended'){
									$('#messageShow').html (data + "<div class= 'clear'><br></div>");
									$('#messageShow').show();
									}
									
								}
							}
						});
					});
		});
  </script>
</head>
<body>
<?php require_once "blocks/header.php"  ?>

<div id="wrapper">
	<div id="leftCol">
	<input type="text" placeholder="Name" id="name" name="name"><br />
	<input type="text" placeholder="Email" id="email" name="email"><br />
	<input type="text" placeholder="Subject" id="subject" name="subject"><br />
	<textarea name="Message" id="message" placeholder="Write a message" ></textarea><br />
	<input type="button" name="done" id="done" value="send">
	<div id="messageShow"></div>
	</div>
<?php require_once "blocks/rightCol.php"  ?>
</div>
<?php require_once "blocks/footer.php"  ?>


</body>
</html>
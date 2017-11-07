<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Title Page</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn t work if you view the page via file:// -->
	<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>

<body>
	<form class="form-inline" id="form">
		<div class="form-group"> Nom :<br>
			<label class="sr-only" for="name"></label>
			<input type="text" class="form-control" id="nom"> </div>
		<br>
		<div class="form-group" id="blocnjf">Nom de jeune fille :<br>
			<label class="sr-only" for="nomjf"></label>
			<input type="text" class="form-control" id="njf"></div><br>
		<div class="form-group">Prénom :<br>
			<label class="sr-only" for="firstname"></label>
			<input type="text" class="form-control" id="firstname"> </div>
		<br>
		<div class="form-group">Email :<br>
			<label class="sr-only" for="email"></label>
			<input type="email" class="form-control" id="email"> </div>
		<br>
		<div class="radio">
			<label for="civ">Madame :</label>
			<input type="radio" id="mme" name="optradio"> </div>
		<div class="radio">
			<label for="civ">Monsieur :</label>
			<input type="radio" id="mr" name="optradio"> </div>
		<br>
		<button type="submit" id="boutonSubmit" class="btn btn-default">Submit</button>
	</form>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script>
		$(function(){
			$("#blocnjf").hide();
			
			$("#mme").change(function(){
				$("#blocnjf").show(400);
			});
			$("#mr").change(function(){
				$("#blocnjf").hide(400);
			});	
			$("#nom").blur(function(){
				if($(this).val().match("^[A-Z]{3,}$"))
					$(this).css('border-color','green');
				else
					$(this).css('border-color','red');
			});
			$("#njf").blur(function(){
				if($(this).val().match("^[A-Z]{3,}$"))
					$(this).css('border-color','green');
				else
					$(this).css('border-color','red');
			});
			$("#firstname").blur(function(){
				if($(this).val().match("^[A-Z]{1}[a-z]{2,}$"))
					$(this).css('border-color','green');
				else
					$(this).css('border-color','red');
			});
			$("#email").blur(function(){
				if($(this).val().match("^[A-Za-z0-9._-]{3,}[@]{1}[a-z]{2,}[.]{1}[a-z]{2,}$"))
					$(this).css('border-color','green');
				else
					$(this).css('border-color','red');
			});
		});
	</script>
</body>

</html>
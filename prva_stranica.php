<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert title here</title>
<link type="text/css" href="prva_stranica.css" rel="stylesheet"/>
</head>
<body>
<div class="container">
	<div class="form">
	<form method="POST" action="login.php">
		<div class="headline">
			<h1>Log in</h1>
		</div>	
		<div class="name">
					<input type="text" name="username" placeholder="Username"/>
		</div>
		<div class="password">
					<input type="password" name="password" placeholder="Password"/>
		</div>
		<div class="login">
			<a href="navigacija.html"><input type="submit" name="submit" value="Log in"></a> 
		</div>
		<div class="forgot">
		<a href="forgot_pass.php">Forgot your password?</a>
		</div>
	</form>
	
	</div>
	
</div>
</body>
</html>

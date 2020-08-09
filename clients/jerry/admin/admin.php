<?php
session_start();

if (isset($_SESSION['logged_in'])  && $_SESSION['logged_in']== true)
{
	header("Location: dashboard.php");
}
$error = $_SESSION['error'];
if ($_SERVER["REQUEST_METHOD"] != "POST") { 
	$error = null;
}

include_once 'head.php';

	?>

<body>

<div>
<a href='../index.php'><div class='backArrow'>Back to the website</div></a><br>
	<h1>Welcome to your Administration Panel</h1>


	<form method='post' action='index.php' class='basicform loginform group'>
	<?php 
	  if ($error)
	  {
	  	print "<p class='errormsg'>". $error . "</p>";
	  	print "<p>Incorrect password.</p>";
	  }
	  else
	  {
	  	print "<h1>Please Login:</h1>";
	  }

	?>
		<p>Password:</p>
		<input type='text' name='password' id='password' size='30' value=""><br clear='all'>
		<br><button type='submit' name='submit' id='submit' value='submit'>Login</button>
	</form>	
</div>
</body>
</html>

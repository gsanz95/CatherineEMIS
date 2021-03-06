<?php
	session_start();

	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
    	{
		header('Location:auth.php');
	}
	else
	{
		$_SESSION['logged_in'] = false;
	}
?>
<!DOCTYPE html>
<html lang="en-US">
<!--
Colors to be used

HEX: #3e4444 (dark gray)

HEX: #82b74b (light green)

HEX: #405d27 (dark green)

HEX: #c1946a (light brown)

HEX: #ffffff (white)
-->
<head> 
   <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #82b74b;
        }
        h1 {
            margin: 0;
            background-color: #3e4444;
            color: white;
        }

        .login .pane {
            position: fixed;
            top:0; left:0; bottom:0; right:0;
            width: 500px;
            height: 400px;
            margin: auto;
            font-family:arial;
            border-radius: 5px;


            background: #3e4444;
            padding: 22px 32px;
        }

        .login .misc {
            position: absolute;
            width: 100%;
            top: 90%;
        }

        .login .new
        {
            position: absolute;
            width: 100%;
            top: 85%;
        }

        .button {
            background-color: #c1946a;
            color: #ffffff;
            border: none;
            border-radius: 3px;
            width: 75px;
            text-align: center;
            padding-top: 5px;
            padding-bottom: 5px;
            margin-top: 3px;
        }

        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -10px;
            transition: 0.5s;
        }

        .button:hover span {
            padding-right: 10px;
        }

        .button:hover span:after {
            opacity: 1;
            right: 0;
        }

        div {
            color: white;

        }

        .form-group {
            font-weight:bold;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        a {
            color: white;
        }
    </style>

    <title>Catherine EMIS - Login</title>
</head>

<body>

<h1>Catherine EMIS</h1>
<div class="login">
    <div class="pane">
        <form method="post" action="<?php 
	if(isset($_POST['submit']))
	{
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['password'] = $_POST['password'];
		header("Location:auth.php");
	}?>">
            <div>
                <h2>Login</h2>
            </div>

            <div class="form-group">
                <label class="required-field">Username:<br></label>
                <input type="text" name="username" required id="id_username" class="form-control"></input>
            </div>

            <div class="form-group">
                <label class="required-field">Password:<br></label>
                <input type="password" name="password" required class="form-control"></input>
            </div>

            <button type="submit" name="submit" class="button" value="Login"><span>Login</span></button><br>

            <div class="new text-center">
                <a href="createaccount.php">Create a New Account</a><br>
            </div>

            <div class="misc text-center">
                <a href="forgot.html">Forgot your password?</a><br>
            </div>
        </form>
    </div>
</div>
</body>
</html>

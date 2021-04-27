<?php
    // Informações de login do painel de admin

        // Login
        $a = 'admin';
        // Senha
        $p = md5('Red4815@');


    // Informações de login do painel de admin



	session_start();
    include 'conn.php';

	if(isset($_POST['nome'])){
		if(isset($_POST['senha'])) {
			$ok = '1';
		}else{
			header("Location: login.php");
			exit();
		}
	}

	if(isset($ok)) {
		$senha = md5($_POST['senha']);
		$nome = $_POST['nome'];
		$pass = $p;
		$name = $a;
		if ($senha==$pass) {
			if ($nome==$name) {
				$_SESSION['login'] = '1';
				header("Location: admin.php");
			}else{
				header("Location: login.php");
				exit();	
			}
		}else{
			header("Location: login.php");
			exit();
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin - login</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
<style>
    body {
        font-family: 'Open Sans', sans-serif!important;
    }
form {
    width:  300px;
    margin:  auto;
    text-align:  center;
}

input[type="password"], input[type="text"] {
    width:  100%;
    margin-bottom:  5px;
    height: 33px;
    padding-left:  10px;
    padding-right:  10px;
    box-sizing:  border-box;
    border-radius:  3px;
    border:  1px solid #cfcfcf;
    color:  #333;
    outline:  none;
}

input[type="password"]:focus, input[type="text"]:focus {
    border-color: #00BCD4;
}

input[type="submit"] {
    width:  100%;
    height: 34px;
    border:  0;
    border-bottom: 3px solid #0003;
    border-radius:  3px;
    background-color: #00BCD4;
    color: #fffffff0;
    font-size:  14px;
    margin-top:  5px;
    cursor:  pointer;
    opacity: 0.9;
    transition: background 0.4s, border-color 0.4s, opacity 0.2s;
    outline: none;
}

input[type="submit"]:hover {
    opacity:  1;
    border-color:  transparent;
    background-color: #00ACC1;
}

form {
    max-width:  100%;
    margin-top:  50px;
    margin-bottom:  50px;
}
</style>
</head>
<body>
	<form action="login.php" method="POST">
		<input type="text" name="nome" required placeholder="Nome de usuario">
		<input type="password" name="senha" required placeholder="Senha">
		<input type="submit" value="entrar">
	</form>
</body>
</html>
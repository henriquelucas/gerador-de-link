<?php
    include 'conn.php';
	session_start();
	if(!isset($_SESSION['login'])) {
		header("Location: login.php");
		exit();
	}
	if (isset($_GET['sair'])) {
		session_destroy();
		header("Location: login.php");
    }

    // sistema de criar uma url
    if(isset($_POST['nome'])){
        $url = $_POST['url'];
        $nome = $_POST['nome'];
        $da = date('d/m/y h:m:s');
        $i = md5($da.$nome.$url.$da);
        $sql = "INSERT INTO urls(`id`, `url`, `nome`, `i`)VALUES(NULL, '$url', '$nome', '$i')";
        $qsl = mysqli_query($conn, $sql);
        $_SESSION['post'] = 'Cadastrado com sucesso!';
        header("Location: admin.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin - home</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
<style>
    h1, h2, h3, h4, h5, h6, p, button, textarea, input {
        font-family: 'Open Sans', sans-serif!important;
        font-weight: 600;
    }
	body {margin:  0;background-color: rgba(0,0,0,0.06);}
	nav {padding-top:  10px;padding-bottom:  10px;background-color: #007a96;margin-bottom: 10px;}
	.cont {width:  1200px;margin:  auto;}
	button.nav {height: 36px;border:  0;padding-left:  12px;transition:  color 0.3s;padding-right:  12px;color:  #fff;cursor:  pointer;background-color: #0000003d;border-radius:  3px;min-width: 81px;}
	button.nav:hover {background-color: #00000059;}
    .cmd {
        width: 500px;
        margin:  auto;
        margin-bottom:  15px;
        background-color:  #fff;
        box-shadow: 1px 1px 4px 0px #00000038;
        border-radius:  3px;
        padding:  10px;
        max-width: 100%;
    }
    .s2 {
    	width: 700px;
    	max-width: 100%;
    }
    p.label {
        margin:  0;
        font-family:  sans-serif;
        font-size:  14px;
        color:  #555;
        margin-bottom: 2px;
    }

    input[type="submit"] {
    	outline: none;
        width:  100%;
        margin-top:  10px;
        height: 34px;
        border:  0;
        border-radius:  3px;
        border-bottom: 2px solid #00000038;
        color:  #fffffff0;
        cursor:  pointer;
        font-family:  sans-serif;
        background-color: #00BCD4;
        padding-top:  4px;
        opacity: 0.9;
        transition: opacity 0.2s, border-color 0.4s, background 0.3s;
    }

    input[type="submit"]:hover {
        opacity:  1;
        border-color:  transparent;
        background-color: #06acc1;
    }
    input.sas {
        width:  100%;
        height: 35px;
        margin-bottom:  10px;
        border:  1px solid #cfcfcf;
        border-radius:  3px;
        color:  #333;
        padding-left:  10px;
        padding-right:  10px;
        outline:  none;
        box-sizing:  border-box;
    }
    tr.hedre>td {
        background-color:  #333;
        padding:  6px;
        color: #ffffffbf;
        font-family: sans-serif;
        font-size:  14px;
    }

    tr>td {
        font-family:  sans-serif;
        padding:  10px;
        font-size:  14px;
    }

    table {
        width:  100%;
    }

    tbody {
        width:  100%;
        background-color: #efefef;
        color:  #333;
    }
    p.notifica {
        text-align:  center;
        background-color: #4CAF50;
        color:  #fff;
        padding:  10px;
        border-radius:  3px;
    }

    h1 {
        margin:  0;
        margin-bottom:  20px;
        font-size:  22px;
        text-align:  center;
        width:  auto;
        color: #005d72;
    }
</style>
</head>
<body>
	<nav>
		<div class="cont">
			<a href="?sair">
				<button class="nav">Sair</button>
			</a>
		</div>
	</nav>
	<form action="admin.php" method="post" class="cmd">
		<h1>Cadastrar um novo link</h1>
		<p class="label">Nome do link</p>
		<input class="sas" type="text" required name="nome">
		<p class="label">Link</p>
		<input class="sas" type="url" required name="url">
        <?php if(isset($_SESSION['post'])){ ?>
            <p class="notifica"><?php echo $_SESSION['post']; ?></p>
        <?php
            unset($_SESSION['post']);
            }
        ?>
		<input type="submit" value="Cadastrar link">
	</form>
	<div class="cmd s2">
		<table>
			<tr class="hedre">
				<td width="10%">ID</td>
				<td width="40%">Nome</td>
				<td width="50%">URL Protegida</td>
			</tr>
            <?php
                $sql1 = "SELECT * FROM urls ORDER by id DESC";
                $qsl1 = mysqli_query($conn, $sql1);
                while($row = mysqli_fetch_assoc($qsl1)){
            ?>
			<tr>
				<td><?php echo $row['id'] ?></td>
				<td><?php echo $row['nome']; ?></td>
				<td>
					<a href="<?php echo $site['url'].'?token='.$row['i'] ?>"><?php echo $site['url'].'?token='.$row['i'] ?></a>
				</td>
			</tr>
            <?php } ?>
		</table>
	</div>
</body>
</html>
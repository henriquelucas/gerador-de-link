<?php
	session_start();
	if (isset($_SESSION['urls'])) {
		include 'conn.php';
		$ids = $_SESSION['urls'];
		$sql = "SELECT * FROM urls WHERE i='$ids'";
		$qsl = mysqli_query($conn, $sql);
		$url = mysqli_fetch_assoc($qsl);
		$conta = mysqli_num_rows($qsl);
		if ($conta<1) {
			echo "O link expirou, iremos atualizar em  breve";
			unset($_SESSION['urls']);
			exit();
		}
		unset($_SESSION['urls']);
	}else{
		echo "<p>O link expirou, iremos atualizar em  breve.</p>";
		unset($_SESSION['urls']);		
		exit();
	}

?>
<a class="button" href="<?php echo $url['url']; ?>">
	Baixar Agora
</a>
<meta http-equiv="refresh" content="10;URL=<?php echo $site['url'].'?token='.$url['i']; ?>" />

<?php
	require_once('cfg.php');
	session_start();

	$conexao = mysqli_connect('localhost', 'root', '', 'bd_acesso');
	if(isset($_POST['logar'])) {
		$usuarioBD = $_POST['loginParam'];
		$senhaUserBD = $_POST['senhaParam'];

		$res=mysqli_query($conexao, "SELECT id, usuario, senha FROM usuarios WHERE usuario='$usuarioBD'");
		$row=mysqli_fetch_array($res);
		$count = mysqli_num_rows($res);

		if($count == 0){
			echo"<script language='javascript' type='text/javascript'>
			alert('Usuário não encontrado. Favor realizar cadastro.');
			window.location.href='register.php'				
			</script>";
		}else{
			if($count == 1 && $row['senha'] == $senhaUserBD ){
				$_SESSION['userSessao'] = $row['usuario'];
				header("Location: home_pass.php");				
			}else{
				echo"<script language='javascript' type='text/javascript'>
				alert('Senha incorreta.');
				window.location.href='index.php'				
				</script>";		
			}
		}	
	}
?>

<html>
	<head>
		<title>Acesso Pass - O Local Seguro para você armazenar as suas senhas!</title>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
		<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
		<link rel="stylesheet" type="text/css" href="css/index.css">		
	</head>

	<body>
		<div class="container">
			<div class="logo">
				<img src="img/img_index.png">
				<img src="img/img_index_escrita.png">
			</div>
			<br>

		<div class="panel panel-login">	
			<div class="estiloForm">
				<form id="id-login-form" action="#" method="POST" role="form" style="display: block;">
					<input name="loginParam" type="text" placeholder="usuario"/>
					<input name="senhaParam" type="password" placeholder="senha">
					<button class="btn btn-info btn-block login" type="submit" name="logar">Login</button>
				</form>

			</div>							
		</div>	
		<a href="register.php"><h6>Cadastre-se!</h6></a>
		</div>						
	</body>
</html>
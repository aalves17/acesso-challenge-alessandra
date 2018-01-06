<?php
	require_once('cfg.php');
	session_start();

	$conexao = mysqli_connect('localhost', 'root', '', 'bd_acesso');
	if(isset($_POST['cadastrar'])) {
		$usuarioBD = $_POST['loginParam'];
		$senhaBD = $_POST['senhaParam'];

		$res=mysqli_query($conexao, "SELECT id, usuario, senha FROM usuarios WHERE usuario='$usuarioBD'");
		$row=mysqli_fetch_array($res);
		$count = mysqli_num_rows($res);

		if($count == 1){
			echo"<script language='javascript' type='text/javascript'>
			alert('Já existe um Usuário com este nome!');
			window.location.href='register.php'				
			</script>";				
		}else{
			mysqli_query($conexao, "INSERT INTO usuarios (usuario, senha) VALUES
			('$usuarioBD','$senhaBD')");
			echo"<script language='javascript' type='text/javascript'>
			alert('Usuário cadastrado! Favor realizar login!');
			window.location.href='index.php'				
			</script>";				
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
		<script src="jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/efeitoFormIndex.js"></script>
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
					<input name="loginParam" type="text" placeholder="Novo Usuário" required/>
					<input name="senhaParam" type="password" placeholder="senha" required>
					<button class="btn btn-info btn-block login" type="submit" name="cadastrar">Cadastrar!</button>
				</form>								
			</div>		
		</div>	
		</div>
	</body>
</html>
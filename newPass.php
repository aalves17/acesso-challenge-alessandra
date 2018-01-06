<?php
	require_once('cfg.php');
	session_start();

	$conexao = mysqli_connect('localhost', 'root', '', 'bd_acesso');
	if(!isset($_SESSION['userSessao'])){
	echo"<script language='javascript' type='text/javascript'>
		alert('Você deve estar logado para acessar essa página!');
		window.location.href='index.php'				
	</script>";	   
	exit();
	}	
	$sessaoAtual = $_SESSION['userSessao'];

	$query = "SELECT sistema FROM dados WHERE userSession = '$sessaoAtual'";
	$result = mysqli_query($conexao, $query);

	if ($result->num_rows > 0){
		while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
			$updatingSystem = $row['sistema'];
		}
	}
?>
<html>
	<head>
		<title>Acesso Pass - MyPass</title>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
		<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
		<link rel="stylesheet" type="text/css" href="css/cssNewPass.css">
		<link href='https://fonts.googleapis.com/css?family=Armata' rel='stylesheet'>
	</head>

	<body>
		<div class="navbar">
			<nav class="navbar navbar-light bg-light">
			  	<span class="navbar-brand mb-0 h1">ACESSO PASS</span>			  	
			  	<span class="navbar-brand mb-0 h1"><h5 id="changeStatus">Cadastrar Nova Senha</h5></span>
			  	<a href="home_pass.php"><span class="navbar-brand mb-0 h1"><h5>Listar Senhas</h5></span></a>
			  	<a href='logout.php'><span class="navbar-brand mb-0 h1"><h5>Sair</h5></span></a>

			</nav>			
		</div>
		<div class="container">
		</div>						
		<?php
			if(isset($_GET['id'])){	
				$idUpdate = $_GET['id'];			
				echo"<script language='javascript' type='text/javascript'>					
					document.querySelector('#changeStatus').style.color='red';
					document.querySelector('#changeStatus').textContent='Atualizando registro...';
				</script>";

				$query = "SELECT * FROM dados WHERE id = '$idUpdate'";
				$result = mysqli_query($conexao, $query);
			
				if ($result->num_rows > 0){
					while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
						$updateForm = '<div class="container">';
						$updateForm .= '<form method="post" action="updateRecord.php?id='.$row['id'].'">';
						$updateForm .='<div class="form-group row">';
						$updateForm .='<label class="col-sm-2 col-form-label">Sistema</label>';
						$updateForm .='<div class="col-sm-10">';
						$updateForm .='<input type="text" class="form-control" value="'.$row['sistema'].'" name="sistema" required>';
						$updateForm .='</div>';
						$updateForm .='</div>';
						$updateForm .='<div class="form-group row">';
						$updateForm .='<label class="col-sm-2 col-form-label">Usuário</label>';
						$updateForm .='<div class="col-sm-10">';
						$updateForm .='<input type="text" class="form-control" value='.$row['usuarioSistema'].' name="usuarioSistema" required>';
						$updateForm .='</div>';
						$updateForm .='</div>';
						$updateForm .='<div class="form-group row">';
						$updateForm .='<label class="col-sm-2 col-form-label">Senha</label>';
						$updateForm .='<div class="col-sm-10">';
						$updateForm .='<input type="password" class="form-control" value='.$row['senhaSistema'].' name="senhaSistema" required>';
						$updateForm .='</div>';
						$updateForm .='</div>';
						$updateForm .='<div class="form-group row">';
						$updateForm .='<div class="col-sm-10">';
						$updateForm .='<button name="acao" type="submit" class="btn btn-primary">Atualizar!</button>';		
						$updateForm .='</div>';
						$updateForm .='</div>';
						$updateForm .='</form>';
						$updateForm .='</div>';													
						echo $updateForm;
					}
				}				
			}else{
				$insertForm = '<div class="container">';
				$insertForm .= '<form method="post">';
				$insertForm .='<div class="form-group row">';
				$insertForm .='<label class="col-sm-2 col-form-label">Sistema</label>';
				$insertForm .='<div class="col-sm-10">';
				$insertForm .='<input type="text" class="form-control" placeholder="Sistema" name="sistema" required>';
				$insertForm .='</div>';
				$insertForm .='</div>';
				$insertForm .='<div class="form-group row">';
				$insertForm .='<label class="col-sm-2 col-form-label">Usuário</label>';
				$insertForm .='<div class="col-sm-10">';
				$insertForm .='<input type="text" class="form-control" placeholder="Usuário" name="usuarioSistema" required>';
				$insertForm .='</div>';
				$insertForm .='</div>';
				$insertForm .='<div class="form-group row">';
				$insertForm .='<label class="col-sm-2 col-form-label">Senha</label>';
				$insertForm .='<div class="col-sm-10">';
				$insertForm .='<input type="password" class="form-control" placeholder="Senha" name="senhaSistema" required>';
				$insertForm .='</div>';
				$insertForm .='</div>';
				$insertForm .='<div class="form-group row">';
				$insertForm .='<div class="col-sm-10">';
				$insertForm .='<button name="submit" type="submit" class="btn btn-primary">Cadastrar Senha!</button>';
				$insertForm .='</div>';
				$insertForm .='</div>';
				$insertForm .='</form>';
				$insertForm .='</div>';													
				echo $insertForm;									
			}
		?>

		<?php		
			if(isset($_POST['submit'])){
				$userSession    = $sessaoAtual;
				$sistema        = $_POST['sistema'];
				$usuarioSistema = $_POST['usuarioSistema'];
				$senhaSistema   = $_POST['senhaSistema'];

				mysqli_query($conexao, "INSERT INTO dados (userSession, sistema, usuarioSistema, senhaSistema) 
				VALUES 
				('$userSession','$sistema', '$usuarioSistema', '$senhaSistema')");

				echo"<script language='javascript' type='text/javascript'>
				alert('Nova Senha Cadastrada!');
				window.location.href='home_pass.php';
				</script>";											
			}
		?>				
		<blockquote>
		  <footer>Todos os direitos reservados - <a href="http://acesso.io/">Acesso</a> 2018</footer>
		</blockquote>		
	</body>
</html>
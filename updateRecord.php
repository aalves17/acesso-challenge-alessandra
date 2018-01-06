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

	if(isset($_GET['id'])){
		$idUpdate = $_GET['id'];		
		$sistema        = $_POST['sistema'];
		$usuarioSistema = $_POST['usuarioSistema'];
		$senhaSistema   = $_POST['senhaSistema'];

		$query="UPDATE dados SET sistema='$sistema', usuarioSistema='$usuarioSistema', senhaSistema='$senhaSistema' where id=$idUpdate";

		if(mysqli_query($conexao, $query)){
			echo "<script language='javascript' type='text/javascript'>
				alert('Registro Atualizado!');
				window.location.href='home_pass.php'				
			</script>";	
		}else{
			echo "ERROR: Could not able to execute $query. " . mysqli_error($conexao);
		}
	}		
?>

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
		$idDelete = $_GET['id'];
		$sql = "DELETE from dados WHERE id='$idDelete'";

		if ($conexao->query($sql) === TRUE) {
			echo"<script language='javascript' type='text/javascript'>
			alert('Registro Deletado com Sucesso!');
			window.location.href='home_pass.php'				
			</script>";	
		} else {
			echo"<script language='javascript' type='text/javascript'>
			alert('Ocorreu um erro ao deletar o registro. Tente novamente mais tarde.');
			window.location.href='home_pass.php'				
			</script>";					    
		}
	}	
?>
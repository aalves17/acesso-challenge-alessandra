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
?>
<html>
	<head>
		<title>Acesso Pass - MyPass - <?php echo $sessaoAtual; ?></title>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
		<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
		<link rel="stylesheet" type="text/css" href="css/cssHomePass.css">
		<link href='https://fonts.googleapis.com/css?family=Armata' rel='stylesheet'>
	</head>

	<body>
		<div class="navbar">
			<nav class="navbar navbar-light bg-light">
			  	<span class="navbar-brand mb-0 h1">ACESSO PASS</span>			  	
			  	<a href="newPass.php"><span class="navbar-brand mb-0 h1"><h5>Cadastrar Nova Senha</h5></span></a>
			  	<span class="navbar-brand mb-0 h1"><h5>Listar Senhas</h5></span>
			  	<a href='logout.php'><span class="navbar-brand mb-0 h1"><h5>Sair</h5></span></a>

			</nav>			
		</div>

		<div class="container">
			<div class="tabelaLista">
				<?php
					$query = "SELECT * FROM dados WHERE userSession = '$sessaoAtual'";
					$result = mysqli_query($conexao, $query);
				
					if ($result->num_rows > 0){
							$tabela = '<table class="table table-hover">';
							$tabela .='<thead>';
							$tabela .='<td>#</td>';
							$tabela .='<td>Sistema</td>';
							$tabela .='<td>Usuário</td>';
							$tabela .='<td>Senha</td>';
							$tabela .='<td>Ação</td>';
							$tabela .='</thead>';
							$idLinha = 1;							
						while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
							$tabela .='<tbody>';
							$tabela .='<td>'.$idLinha.'</td>';
							$tabela .='<td style="color:blue">'.$row['sistema'].'</td>';
							$tabela .='<td>'.$row['usuarioSistema'].'</td>';
							$tabela .='<td type="password">'.$row['senhaSistema'].'</td>';
							$idRow = $row['id'];
							$tabela .='
								<td>
									<a href="newPass.php?id='.$row['id'].'"id="btn-edit">Editar</a>
									<a href="delete.php?id='.$row['id'].'"id="btn-danger">Remover</a>
								</td>';
							$idLinha++;
						}
						$tabela .='</tbody>';
						$tabela .= '</table>';
						echo $tabela;
					}else{
						echo "Não há nenhuma senha cadastrada!";
					}
				?>
			</div>
		</div>
		<blockquote>
		  <footer>Todos os direitos reservados - <a href="http://acesso.io/">Acesso</a> 2018</footer>
		</blockquote>		
	</body>
</html>
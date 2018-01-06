<?php				
mysqli_report(MYSQLI_REPORT_STRICT);

define('banco', 'bd_acesso');
define('usuario', 'root');
define('senha', 'root');
define('host', 'localhost');

function abreConexao() {			
	try {				
		$conexao = mysqli_connect(host, usuario, senha, banco);				
		return $conexao;			
	} 
	catch (Exception $e) {				
		echo $e->getMessage();				
		return null;			
	}		
}

function fechaConexao($conexao) {			
	try {				
		mysqli_close($conexao);			
	} catch (Exception $e) {
		echo $e->getMessage();			
	}		
}
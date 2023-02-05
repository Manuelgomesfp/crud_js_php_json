<?php
	$nomeArquivoJSON = "dados.json";
	if(isset($_GET['acao'])) {
		// Adicionar
		if ($_GET['acao'] == 'adicionar') {
			if (!isset($_POST['nome']) AND !isset($_POST['sobrenome'])) {
				echo "erro";
				return;
			}
			// Recuperar os Dados do Formulário e Atribuir em um "Array"
			$novo_dados = [
				"nome" => $_POST['nome'],
				"sobrenome" => $_POST['sobrenome'], 
			];
			// Abre o Arquvio no Modo r (para leitura)
			$arquivo = fopen ($nomeArquivoJSON, 'r');
			$linhaJSON = "";
			while(!feof($arquivo)) {
				//Mostra uma linha do arquivo
				$linha = fgets($arquivo, 1024);
				$linhaJSON .= "$linha";
			}
			// Converter Dados JSON em ARRAY
			$array = json_decode($linhaJSON, true);
			// Adicionar Nova Linha
			$array['dados'][] = $novo_dados;
			// Converter ARRAY em OBJECTO
			$obj = json_encode($array);
			// Salvar em aquivo JSON
			echo file_put_contents($nomeArquivoJSON, $obj);
		}
		// Editar
		elseif ($_GET['acao'] == 'editar') {
			if (!isset($_POST['nome']) AND !isset($_POST['sobrenome']) AND !isset($_POST['usuario'])) {
				echo "erro";
				return;
			}
			$indice = $_POST['usuario'];
			// Recuperar os Dados do Formulário e Atribuir em um "Array"
			$actualizar_dados = [
				"nome" => $_POST['nome'],
				"sobrenome" => $_POST['sobrenome'], 
			];
			// Abre o Arquvio no Modo r (para leitura)
			$arquivo = fopen ($nomeArquivoJSON, 'r');
			$linhaJSON = "";
			while(!feof($arquivo)) {
				//Mostra uma linha do arquivo
				$linha = fgets($arquivo, 1024);
				$linhaJSON .= "$linha";
			}
			// Converter Dados JSON em ARRAY
			$array = json_decode($linhaJSON, true);

			// Verificar se o Indice Existe
			if (!array_key_exists($indice, $array['dados'])) {
				echo "Erro";
			}
			$array = array_replace($array['dados'], array($indice => $actualizar_dados));
			$array = ["dados" => $array];
			$obj = json_encode($array);
			echo file_put_contents($nomeArquivoJSON, $obj);
			echo "sucesso";
		}
		// Eliminar
		elseif ($_GET['acao'] == 'eliminar') {
			echo "Eliminar";
		}
		else {
			echo "Erro";
		}
	}

?>
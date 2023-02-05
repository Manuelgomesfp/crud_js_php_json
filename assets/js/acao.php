<?php
	$nomeArquivoJSON = "dados.json";
	if(isset($_GET['acao'])) {

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
		elseif ($_GET['acao'] == 'editar') {
			echo "Editar";
		}
		elseif ($_GET['acao'] == 'eliminar') {
			echo "Eliminar";
		}
		else {
			echo "Erro";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CRUD JS - PHP e JSON</title>
	<link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
</head>
<body>

	<section>
		<h1 id="titulo">Formulário de Cadastramento</h1>
		<form method="post" action="assets/js/acao.php?acao=adicionar" id="form_dados" class="form_dados">
			<div class="form">				
				<div class="form-area">
					<label for="nome">Nome<span>*</span></label>
					<input type="text" name="nome" id="nome" class="form-control" required>
				</div>
				<div class="form-area">
					<label for="sobrenome">Sobrenome<span>*</span></label>
					<input type="text" name="sobrenome" id="sobrenome" class="form-control" required>
				</div>
			</div>
			<div class="form-btn">
				<input type="hidden" name="usuario" id="usuario">
				<button type="submit" class="btn-enviar" id="btn-enviar">Adicionar</button>
				<button type="reset" class="btn-limpar" id="btn-cancelar">Cancelar</button>
			</div>
		</form>
	</section>
	<section>
		<h1>Tabela de Registros</h1>
		<div class="form-busca">
			<form>
				<input type="search" name="pesquisa" class="form-control pesquisa" placeholder="Pesquisa por Nome ou Sobrenome" required>
				<button type="button" class="btn-pesquisar" disabled style="background: #666; color: #fff;">Pesquisar</button>
			</form>
		</div>
		<div class="tabela">
			<table>
				<thead>
					<tr>
						<th id="btn-editar">#</th>
						<th>Nome</th>
						<th>Sobrenome</th>
						<th></th>
					</tr>
				</thead>
				<tbody id="dados">
				</tbody>
			</table>
		</div>
	</section>

	<footer>
		<span>Desenvolvido por: Manuel Pedro</span>
	</footer>

	<script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>
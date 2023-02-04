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
		<h1>Formulário de Cadastramento</h1>
		<form>
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
				<button type="submit" class="btn-enviar">Adicionar</button>
				<button type="reset" class="btn-limpar">Cancelar</button>
			</div>
		</form>
	</section>
	<section>
		<h1>Tabela de Registros</h1>
		<div class="tabela">
			<table>
				<thead>
					<tr>
						<th>#</th>
						<th>Nome</th>
						<th>Sobrenome</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>1</th>
						<td>Manuel</td>
						<td>Pedro</td>
						<td class="tabela-control">
							<button type="button" class="btn-editar">Editar</button>
							<button type="button" class="btn-eliminar">Eliminar</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</section>

	<script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>
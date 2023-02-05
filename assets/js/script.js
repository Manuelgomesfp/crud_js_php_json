function LerDadosJSON() {
	fetch('assets/js/dados.json')
	.then(response => response.json())
	.then(data => {
		dadosTB = data.dados;
		let tabela = document.getElementById('dados');
		tabela.innerHTML = "";
		dadosTB.forEach(function (linha, index) {
			index++;
			tabela.innerHTML += '\
				<tr>\
					<th>' + index + '</th>\
					<td>' + linha.nome + '</td>\
					<td>' + linha.sobrenome + '</td>\
					<td class="tabela-control">\
						<button type="button" class="btn-editar" onclick="editar('+ (index-1) +','+ "'"+ linha.nome +"'" +','+ "'"+ linha.sobrenome +"'"+')">Editar</button>\
						<button type="button" class="btn-eliminar" onclick="eliminar('+ (index-1) +')">Eliminar</button>\
					</td>\
				</tr>\
			';
		})
	})
	.catch(erro => console.log(erro));
}
function restaurarForm() {
	// Restaurar Formulário
	document.getElementById('nome').value = '';
	document.getElementById('sobrenome').value = '';
	document.getElementById('usuario').value = '';

	document.getElementById('titulo').innerHTML = 'Formulário de Cadastramento';
	document.getElementById('btn-enviar').innerHTML = 'Adicionar';

	// Acao
	document.getElementById('form_dados').action = 'assets/js/acao.php?acao=adicionar';
}
LerDadosJSON();
function enviar(form, acao, dadosForm) {
	console.log(acao)
	fetch(acao, {
		method: 'POST',
		body: dadosForm,
	}).then(response => response.text()).then(data => {
		restaurarForm();
		LerDadosJSON();
	}).catch((erro) => {
		console.log(erro);
	});
}

// Selecionar o Formulário
let form_dados = document.querySelectorAll('.form_dados');
form_dados.forEach(function (e) {
	// Acção do Formulário
	e.addEventListener('submit', function (event) {
		event.preventDefault();

		let form = this;
		let action = form.getAttribute('action');
		let dadosForm = new FormData(form);
		try {
			enviar(form, action, dadosForm)
		} catch (erro) {
			console.log(erro)
		}
	})
});

// Função Editar
function editar(indice, nome, sobrenome) {
	document.getElementById('nome').value = nome;
	document.getElementById('sobrenome').value = sobrenome;
	document.getElementById('usuario').value = indice;

	document.getElementById('titulo').innerHTML = 'Formulário de Edição';
	document.getElementById('btn-enviar').innerHTML = 'Actualizar';

	// Acao
	document.getElementById('form_dados').action = 'assets/js/acao.php?acao=editar';
}
// Função Eliminar
function eliminar(indice) {
	fetch('assets/js/acao.php?acao=eliminar&usuario='+indice, {
		method: 'GET',
	}).then(response => response.text()).then(data => {
		restaurarForm()
		LerDadosJSON();
	}).catch((erro) => {
		console.log(erro);
	});
}

// Restaurar Formulário
const btn_cancelar = document.getElementById('btn-cancelar');
btn_cancelar.addEventListener('click', function () {
	restaurarForm();
});
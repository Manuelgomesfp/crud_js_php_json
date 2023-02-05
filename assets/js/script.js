function enviar(form, acao, dadosForm) {
	fetch(action, {
		method: 'POST',
		body: dadosForm,
	}).then(response => response.text()).then(data => {
		// LerDadosJSON();
	}).catch((erro) => {
		console.log(erro);
	});
}

// Selecionar o Formulário
let form_dados = document.querySelectorAll('.form_dados');
// Acao
let form = document.querySelector('.btn-enviar');
let acao = form.innerHTML;
if (acao == "Adicionar") {
	action = "assets/js/acao.php?acao=adicionar";
}
else {
	action = "assets/js/acao.php?acao=editar";
}
form_dados.forEach(function (e) {
	// Acção do Formulário
	e.addEventListener('submit', function (event) {
		event.preventDefault();

		let form = this;
		// let action = form.getAttribute('action');
		let dadosForm = new FormData(form)
		try {
			enviar(form, action, dadosForm)
		} catch (erro) {
			console.log(erro)
		}
	})
});
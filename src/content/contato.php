<div id="contato-form">

	<div class="form-group has-feedback">
		<span class="glyphicon glyphicon-ok hidden" aria-hidden="true"></span>
		<span class="glyphicon glyphicon-remove hidden" aria-hidden="true"></span>
		<label for="contato-nome">Nome:</label>
		<input type="text" class="form-control" id="contato-nome" placeholder="Digite seu nome">
	</div>

	<div class="form-group has-feedback">
		<span class="glyphicon glyphicon-ok hidden" aria-hidden="true"></span>
		<span class="glyphicon glyphicon-remove hidden" aria-hidden="true"></span>
		<label for="contato-email">Email:</label>
		<input type="text" class="form-control" id="contato-email" placeholder="Digite seu email">
	</div>

	<div class="form-group">
		<span class="glyphicon glyphicon-ok hidden" aria-hidden="true"></span>
		<span class="glyphicon glyphicon-remove hidden" aria-hidden="true"></span>
		<label for="contato-mensagem">Mensagem:</label>
		<textarea class="form-control" rows="8" id="contato-mensagem" placeholder="Digite sua mensagem"></textarea>
	</div>

	<input disabled class="contato-submit-disabled" id="contato-submit" type="image" src="imgs/enviar-btn.png" alt="Submit Form" />

</div>

<script>

	$(document).ready(function () {

		function validateEmail(email) {
			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(email);
		}

		function checkField(el, validate) {
			var ret = false;

			var val = $(el).val();

			var parent = $(el).parents('.form-group');
			var feedback = $(el).siblings('.form-control-feedback');

			feedback.removeClass('hidden');

			parent.removeClass('has-error');
			parent.removeClass('has-success');

			feedback.removeClass('glyphicon-ok');
			feedback.removeClass('glyphicon-remove');

			if (val !== "") {

				if (!validate(val)) {
					parent.addClass('has-error');
					feedback.addClass('glyphicon-remove');
				} else {
					parent.addClass('has-success');
					feedback.addClass('glyphicon-ok');
					ret = true;
				}

			}

			return ret;
		}

		function checkAllFields() {
			var enableSubmit = checkField($('#contato-nome'), function (val) {
				return val !== '';
			});
			enableSubmit = checkField($('#contato-email'), validateEmail) && enableSubmit;
			enableSubmit = checkField($('#contato-mensagem'), function (val) {
				return val !== '';
			}) && enableSubmit;

			var submitButton = $('#contato-submit');
			if (enableSubmit) {
				submitButton.attr('disabled', false);
				submitButton.removeClass('contato-submit-disabled');
			} else {
				submitButton.attr('disabled', true);
				submitButton.addClass('contato-submit-disabled');
			}
		}

		$('#contato-nome').change(checkAllFields).keyup(checkAllFields);
		$('#contato-email').change(checkAllFields).keyup(checkAllFields);
		$('#contato-mensagem').change(checkAllFields).keyup(checkAllFields);

		$('#contato-submit').click(function() {
			var nome = $('#contato-nome').val();
			var email = $('#contato-email').val();
			var mensagem = $('#contato-mensagem').val();
			
			$.ajax({
				type: 'POST',
				data: {
					nome: nome,
					email: email,
					msg: mensagem
				},
				url: 'script/mail.php',
				dataType: 'json'
			})
			
			.done(function(ret) {
				console.log(ret);
			})
			
			.fail(function() {
				alert("Erro ao enviar email! O administrador foi avisado.");
			});
			
		});
		
	});

</script>
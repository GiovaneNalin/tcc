<?php session_start();
	include ("menu.php"); ?>
		<style>
			.radio-image label > input{
				visibility: hidden;
			}
			.radio-image label > input + img{
				cursor:pointer;
				border:4px solid #EEE;
				border-radius:15px;
				padding:10px;
			}
			.radio-image label > input:checked + img{
				border:4px solid #3F51B5;
			}
			.img{
				width: 100px;
			}
		</style>
	</head>
	<body class='body_agente'>
		<div class='container-fluid' align='center'>
					<!-- CADASTRO -->
					<h1>Cadastrar um paciente.</h1>
					<form method = "post" action = "insere_usuario.php"><div class='form-group'>
						<label align='left'>CPF
							<input required='required' class='form-control' maxlength='11' type="number" name="cpf" placeholder="CPF">
						</label>
						<label align='left'>CPF responsável 
							<input class='form-control' maxlength='11' type="number" name="cpf_responsavel" placeholder="CPF">
						</label>
						<label align='left'>Nome
							<input required='required' class='form-control' type='text' name='nome' placeholder="Nome">
						</label><br />
						<p>*Telefone deve conter o DDD seguido do número. </p>
						<label align='left'>Telefone
							<input required='required' class='form-control' type='number' name="telefone" placeholder="(xx) xxxx-xxxx">
						</label>
						<label align='left'>E-mail
							<input required='required' class='form-control' type="email" name="email" placeholder="E-mail">
						</label><br />
						<label align='left'>Endereço
							<input required='required' class='form-control' type="text" name="endereco" placeholder="endereco">
						</label><br />
						<label align='left'>Senha
							<input required='required' class='form-control' maxlength='6' type="password" name="senha" placeholder="Senha">
						</label>
						<label align='left'>Confirmar Senha
							<input required='required' class='form-control' maxlength='6' type="password" name="confirmar_senha" placeholder="Confirmar Senha">
						</label><br/>
						<p>*A senha deve conter 6 dígitos. </p>
						<p>*Pode conter caracteres especiais, letras e números. </p>
						<label align='left'>Data de nascimento
							<input required='required' class='form-control' type="date" name="data_nascimento">
						</label>
						<div class='form-check form-check-inline radio-image'>
						<label class=''>Sexo:<br />
							<label for='m'>
								<input required='required' class='form-check-input' type="radio" name="sexo" value="masculino" id='m'/>
								<img src='img/male.png' class='img'>
							</label>
							<label for='f'>
								<input required='required' class='form-check-input' type="radio" name="sexo" value="feminino" id='f'/>
								<img src='img/female.png' class='img'>
							</label>
						</label>
						</div>
						<!--<label class=''>Gestante?:<br />
							<label for='s'> Sim
								<input required='required' class='form-check-input' type="radio" name="gestante" value="sim" id='s'/>
							</label>
							<label for='n'> Não
								<input required='required' class='form-check-input' type="radio" name="gestante" value="nao" id='n'/>
							</label>
						</label><br/>
						
						<label align='left'>Selecione um meio para alertas:<br/>
							Whatsapp<input type = 'checkbox' name='alerta' value='1'/>
							E-mail<input type = 'checkbox' name='alerta' value='2'/>
						</label><br/> -->
						
						
						<button id='btn' class='btn btn-info'>CADASTRAR</button><br/>
					</div></form>
		</div>
</html>
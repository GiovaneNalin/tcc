<?php session_start(); ?>
<!DOCTYPE html>
<html lang = "pt-BR">
	<head>
		<meta charset = "UTF-8" />
		<title> SAV - HOME </title>
	
	<?php
		include ("menu.php");
		include("verificacao_administrador.php");
		if(isset($_SESSION["autorizado"]) and $_SESSION["permissao"] == 2){		
	?>
		<script>
		var id = null;
		var filtro = null;
			
		$(function(){
			paginacao(0);
			
			// PAGINAÇÃO
			function paginacao(p){
				$.ajax({
					url: 'json_listar_paciente.php',
					type: 'POST',
					data: {pg: p, cpf_filtro: filtro},
					success: function(matriz){
						$("#tb_paciente").html("");
						
						for(i=0;i<matriz.length;i++){
							linha = "<tr>";
							linha += "<td class = 'cpf'>" + matriz[i].cpf + "</td>";
							linha += "<td class = 'nome'>" + matriz[i].nome + "</td>";
							linha += "<td class = 'email'>" + matriz[i].email + "</td>";
							linha += "<td class = 'data_nascimento'>" + matriz[i].data_nascimento + "</td>";
							linha += "<td class = 'sexo'>" + matriz[i].sexo + "</td>";
							linha += "<td class = 'gestante'>" + matriz[i].gestante + "</td>";
							linha += "<td class = 'cpf_responsavel'>" + matriz[i].cpf_responsavel + "</td>";
							linha += "<td class = 'endereco'>" + matriz[i].endereco + "</td>";
							linha += "<td class = 'permissao'>" + matriz[i].permissao + "</td>";
							linha += "<td class = 'senha'>" + matriz[i].senha + "</td>";
							linha += "<td class = 'telefone'>" + matriz[i].telefone + "</td>";
							linha += "<td><button type = 'button' id = 'nome_alterar' class = 'alterar' value ='" + matriz[i].cpf + "'>Alterar</button></td>";
							linha += "</tr>";
							
							$("#tb_paciente").append(linha);	
						}
					}			
				});	
			}
			
			// FILTRAR
			$("#filtrar").click(function(){
				$.ajax({
					url:"paginacao_listar_paciente.php",
					type:"post",
					data:{
							cpf_filtro: $("input[cpf='cpf_filtro']").val()
					},
					success: function(d){
						console.log(d);
						filtro = $("input[cpf='cpf_filtro']").val()
						paginacao(0);
						
					}
				});
			});
			
			$(document).on("click",".alterar",function(){
				id = $(this).attr("value");
				$.ajax({
					url: "carrega_paciente_alterar.php",
					type: "post",
					data: {id: id},
					success: function(vetor){
						console.log(vetor);
						$("input[name='cpf']").val(vetor.cpf);
						$("input[name='nome']").val(vetor.nome);
						$("input[name='email']").val(vetor.email);
						$("input[name='data_nascimento']").val(vetor.data_nascimento);
						$("input[name='sexo']").val(vetor.sexo);
						$("input[name='gestante']").val(vetor.gestante);
						$("input[name='cpf_responsavel']").val(vetor.cpf_responsavel);
						$("input[name='endereco']").val(vetor.endereco);
						$("input[name='permissao']").val(vetor.permissao);
						$("input[name='senha']").val(vetor.senha);
						$("input[name='telefone']").val(vetor.telefone);
					
						
						$(".cadastrar").attr("class","alteracao");
						$(".alteracao").val("Alterar paciente");
					}
				});
			});
			
			$(document).on("click",".pg", function(){
				p = $(this).val();
				p = (p-1)*5;
				paginacao(p);
			});
			
			// ALTERAR			
			$(document).on("click",".alteracao",function(){
				$.ajax({ 
					url: "altera_paciente.php",
					type: "post",
					data: {
							id: id, 
							cpf:$("input[name='cpf']").val(),	
							nome:$("input[name='nome']").val(),	
							email:$("input[name='email']").val(),	
							data_nascimento:$("input[name='data_nascimento']").val(),	
							sexo:$("input[name='sexo']").val(),	
							gestante:$("input[name='gestante']").val(),	
							cpf_responsavel:$("input[name='cpf_responsavel']").val(),	
							endereco:$("input[name='endereco']").val(),	
							permissao:$("input[name='permissao']").val(),	
							senha:$("input[name='senha']").val(),	
							telefone:$("input[name='telefone']").val()	
							
					},
					success: function(data){
						if(data==1){
							paginacao(0);
							$("input[name='cpf']").val("");	
							$("input[name='nome']").val("");	
							$("input[name='email']").val("");	
							$("input[name='data_nascimento']").val("");	
							$("input[name='sexo']").val("");	
							$("input[name='gestante']").val("");	
							$("input[name='cpf_responsavel']").val("");	
							$("input[name='endereco']").val("");	
							$("input[name='permissao']").val("");	
							$("input[name='senha']").val("");	
							$("input[name='telefone']").val("");	
							
							$(".alteracao").attr("class","cadastrar");
							$(".cadastrar").val("Cadastrar");
						}else {
							console.log(data);
						}
					}
				});
			});											
		});
		</script>
	</head>
	<body class='body_administrador'>
	<div class='container-fluid' align='center'>
	</div>
	<br /><br />
	<?php
	}
	else{
		header("Location: index.php");
	}
	?>
	<div class='container-fluid' align='center'>
	<div>
		<div class='container-fluid' align='center'>
					<!-- CADASTRO -->					
					<form method = "post" action = "insere_usuario.php"><div class='form-group'>
						<label align='left'>CPF
							<input required='required' class='form-control' maxlength='11' type="number" name="cpf" placeholder="CPF">
						</label>
						<label align='left'>CPF responsável 
							<input required='required' class='form-control' maxlength='11' type="number" name="cpf_responsavel" placeholder="CPF">
						</label>
						<label align='left'>Nome
							<input required='required' class='form-control' type='text' name='nome' placeholder="Nome">
						</label><br />
						<label align='left'>Telefone
							<input required='required' class='form-control' type='number' name="telefone" placeholder="(xx) xxxx-xxxx">
						</label>
						<label align='left'>E-mail
							<input required='required' class='form-control' type="email" name="email" placeholder="E-mail">
						</label><br />
						<label align='left'>Endereço
							<input required='required' class='form-control' type="text" name="endereco" placeholder="endereco">
						</label><br />
						<p>*Telefone deve conter DDD seguido do número. </p>
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
								<input required='required' class='form-check-input' type="radio" name="sexo" value="m" id='m'/>
								<img src='img/male.png' class='img'>
							</label>
							<label for='f'>
								<input required='required' class='form-check-input' type="radio" name="sexo" value="f" id='f'/>
								<img src='img/female.png' class='img'>
							</label>
						</label>
						</div>
						<label class=''>Gestante?:<br />
							<label for='s'> Sim
								<input required='required' class='form-check-input' type="radio" name="gestante" value="s" id='s'/>
							</label>
							<label for='n'> Não
								<input required='required' class='form-check-input' type="radio" name="gestante" value="n" id='n'/>
							</label>
						</label><br/>
						
						<label align='left'>Selecione um meio para alertas:<br/>
							Whatsapp<input type = 'checkbox' name='alerta' value='1'/>
							E-mail<input type = 'checkbox' name='alerta' value='2'/>
						</label><br/>
						
						<input type = "button" class = "cadastrar btn btn-info" value = "Cadastrar" />						
					</div></form>
		</div>
			<form name='fltro'>
				<input type ='text' name='cpf_filtro' placeholder='Pesquisar por cpf...' />
				
				<button type='button' id='filtrar'> Filtrar </button>
			</form>
			<br />
		<table border = "1">
			<thead>
				<tr>
					<th> CPF </th>
					<th> Nome </th>
					<th> E-mail </th>
					<th> Data de Nascimento </th>
					<th> Sexo </th>
					<th> Gestante </th>
					<th> CPF do desponsável </th>
					<th> Endereço </th>
					<th> Permissão </th>
					<th> Senha </th>
					<th> Telefone </th>
					<th> Ação </th>
				</tr>
			</thead>
			<tbody id = "tb_paciente"></tbody>
		</table>
	</div>
	<br />
	<?php
		include("paginacao_listar_paciente.php");
	?>
	</div>
</body>
</html>
<?php $this->load->view('layout/painel/sidebar'); ?>

<div id="content">
	<?php $this->load->view('layout/painel/navbar'); ?>

	<div class="container-fluid">

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?php echo base_url('/painel'); ?>">Painel</a>
				</li>
				<li class="breadcrumb-item">
					<a href="<?php echo base_url('/usuarios'); ?>">Usuários Cadastrados</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">
					<?php echo (isset($titulo)) ? $titulo : 'A' ?>
				</li>
			</ol>
		</nav>

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<a title="Voltar para usuários cadastrados" href="<?php echo base_url('/usuarios'); ?>" class="btn btn-outline-secondary btn-sm float-right">
					<i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Voltar
				</a>
			</div>
			<div class="card-body">
				<!-- CONTENT -->
				<form method="POST" name="form_edit">
					<div class="form-group row">
						<div class="col-md-4">
							<label for="nome">Nome</label>
							<input type="text" name="first_name" class="form-control" id="nome" aria-describedby="nomeHelp" placeholder="Seu Nome" value="<?= $usuario->first_name; ?>">
							<?php echo form_error(
								'first_name',
								'<small id="nomeHelp" class="form-text text-danger">',
								'</small>'
							); ?>
						</div>

						<div class="col-md-4">
							<label for="sobrenome">Sobrenome</label>
							<input type="text" name="last_name" class="form-control" id="sobrenome" aria-describedby="sobrenomeHelp" placeholder="Seu Sobreome" value="<?= $usuario->last_name; ?>">
							<?php echo form_error(
								'last_name',
								'<small id="nomeHelp" class="form-text text-danger">',
								'</small>'
							); ?>
						</div>

						<div class="col-md-4">
							<label for="email">Email (Login)</label>
							<input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Seu Email" value="<?= $usuario->email; ?>">
							<?php echo form_error(
								'email',
								'<small id="nomeHelp" class="form-text text-danger">',
								'</small>'
							); ?>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-4">
							<label for="usuario">Usuário</label>
							<input type="text" name="username" class="form-control" id="usuario" aria-describedby="usuarioHelp" placeholder="Seu Usuário" value="<?= $usuario->username; ?>">
							<?php echo form_error(
								'username',
								'<small id="nomeHelp" class="form-text text-danger">',
								'</small>'
							); ?>
						</div>

						<div class="col-md-4">
							<label for="ativo">Ativo</label>
							<select class="form-control" name="active" id="ativo">
								<option value="1" <?php echo ($usuario->active == 1) ? "selected" : "" ?>>Sim</option>
								<option value="0" <?php echo ($usuario->active == 0) ? "selected" : "" ?>>Não</option>
							</select>
						</div>

						<div class="col-md-4">
							<label for="perfil_usuario">Perfil de Acesso</label>
							<select class="form-control" name="perfil_usuario" id="perfil">
								<option value="2" <?php echo ($perfil_usuario->id == 2) ? "selected" : "" ?>>Colaborador</option>
								<option value="1" <?php echo ($perfil_usuario->id == 1) ? "selected" : "" ?>>Administrador</option>
							</select>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-6">
							<label for="senha">Senha</label>
							<input type="password" name="password" class="form-control" id="senha" aria-describedby="passwordHelp">
							<?php echo form_error(
								'password',
								'<small id="nomeHelp" class="form-text text-danger">',
								'</small>'
							); ?>
						</div>

						<div class="col-md-6">
							<label for="confirmar_senha">Confirme sua senha</label>
							<input type="password" name="confirm_password" class="form-control" id="confirmar_senha" aria-describedby="confirmPasswordHelp">
							<?php echo form_error(
								'confirm_password',
								'<small id="nomeHelp" class="form-text text-danger">',
								'</small>'
							); ?>
						</div>

						<div class="alert alert-secondary">
							Se não deseja altera sua senha deixe os campos senha e confirmar senha sem preencher.
						</div>

						<input type="hidden" name="usuario_id" value="<?php echo $usuario->id ?>">
					</div>

					<button type="submit" class="btn btn-primary">Salvar</button>
				</form>
				<!-- END CONTENT -->
			</div>
		</div>

	</div>
</div>
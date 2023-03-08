<?php $this->load->view('layout/painel/sidebar'); ?>

<div id="content">
	<?php $this->load->view('layout/painel/navbar'); ?>

	<div class="container-fluid">

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?php echo base_url('/painel'); ?>">Home</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">
					<?php echo (isset($titulo)) ? $titulo : 'A' ?>
				</li>
			</ol>
		</nav>

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<a title="Voltar para home" href="<?php echo base_url('/painel'); ?>" class="btn btn-outline-secondary btn-sm float-right">
					<i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Voltar
				</a>
			</div>
			<div class="card-body">
				<!-- CONTENT -->
				<form method="POST" name="form_edit">
					<div class="form-group row">
						<div class="col-md-3">
							<label for="razaoSocial">Razão Social</label>
							<input type="text" name="sistema_razao_social" class="form-control" id="razaoSocial" aria-describedby="razaoSocialHelp" placeholder="Digite a razão social" value="<?= $sistema->sistema_razao_social; ?>">
							<?php echo form_error(
								'sistema_razao_social',
								'<small id="razaoSocialHelp" class="form-text text-danger">',
								'</small>'
							); ?>
						</div>

						<div class="col-md-3">
							<label for="fantasia">Nome Fantasia</label>
							<input type="text" name="sistema_nome_fantasia" class="form-control" id="fantasia" aria-describedby="fantasiaHelp" placeholder="Seu Sobreome" value="<?= $sistema->sistema_nome_fantasia; ?>">
							<?php echo form_error(
								'sistema_nome_fantasia',
								'<small id="fantasiaHelp" class="form-text text-danger">',
								'</small>'
							); ?>
						</div>

						<div class="col-md-3">
							<label for="cnpj">CNPJ</label>
							<input type="text" name="sistema_cnpj" class="form-control" id="cnpj" aria-describedby="cnpjHelp" placeholder="Digite o CNPJ" value="<?= $sistema->sistema_cnpj; ?>">
							<?php echo form_error(
								'sistema_cnpj',
								'<small id="cnpjHelp" class="form-text text-danger">',
								'</small>'
							); ?>
						</div>

						<div class="col-md-3">
							<label for="ie">Inscrição Estadual</label>
							<input type="text" name="sistema_ie" class="form-control" id="ie" aria-describedby="ieHelp" placeholder="Digite a inscrição estadual" value="<?= $sistema->sistema_ie; ?>">
							<?php echo form_error(
								'sistema_ie',
								'<small id="ieHelp" class="form-text text-danger">',
								'</small>'
							); ?>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-3">
							<label for="telfixo">Telefone Fixo</label>
							<input type="text" name="sistema_telefone_fixo" class="form-control" id="telfixo" aria-describedby="telfixo" placeholder="Digite a inscrição estadual" value="<?= $sistema->sistema_telefone_fixo; ?>">
							<?php echo form_error(
								'sistema_telefone_fixo',
								'<small id="telfixo" class="form-text text-danger">',
								'</small>'
							); ?>
						</div>

						<div class="col-md-3">
							<label for="telmovel">Telefone Móvel</label>
							<input type="text" name="sistema_telefone_movel" class="form-control" id="telmovel" aria-describedby="telmovel" placeholder="Digite a inscrição estadual" value="<?= $sistema->sistema_telefone_movel; ?>">
							<?php echo form_error(
								'sistema_telefone_movel',
								'<small id="telmovel" class="form-text text-danger">',
								'</small>'
							); ?>
						</div>

						<div class="col-md-3">
							<label for="telmovel">Email</label>
							<input type="email" name="sistema_email" class="form-control" id="email" aria-describedby="emailHelper" placeholder="Digite o email" value="<?= $sistema->sistema_email; ?>">
							<?php echo form_error(
								'sistema_email',
								'<small id="emailHelper" class="form-text text-danger">',
								'</small>'
							); ?>
						</div>

						<div class="col-md-3">
							<label for="site">Site</label>
							<input type="text" name="sistema_site_url" class="form-control" id="site" aria-describedby="siteHelper" placeholder="Digite o site" value="<?= $sistema->sistema_site_url; ?>">
							<?php echo form_error(
								'sistema_site_url',
								'<small id="siteHelper" class="form-text text-danger">',
								'</small>'
							); ?>
						</div>
					</div>

					<button type="submit" class="btn btn-primary">Salvar</button>
				</form>
				<!-- END CONTENT -->
			</div>
		</div>
	</div>
</div>
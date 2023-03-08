<?php
echo '<pre>';
var_dump($utilitarios);
die();
?>

<?php $this->load->view('layout/painel/sidebar'); ?>

<!-- Main Content -->
<div id="content">

	<?php $this->load->view('layout/painel/navbar'); ?>

	<!-- Begin Page Content -->
	<div class="container-fluid">

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?php echo base_url('/painel'); ?>">Painel</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">
					<?php echo (isset($titulo)) ? $titulo : 'A' ?>
				</li>
			</ol>
		</nav>

		<?php if ($message = $this->session->flashdata('sucesso')) : ?>
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>
							<i class="fa fa-smile-wink" aria-hidden="true"></i>
							<?php echo $message . '!' ?>
						</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if ($message = $this->session->flashdata('error')) : ?>
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>
							<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
							<?php echo $message . '!' ?>
						</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<a title="Cadastrar novo usuário" href="<?= base_url('usuarios/add') ?>" class="btn btn-success btn-sm float-right">
					<i class="fas fa-user-plus"></i> Adicionar
				</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>ID</th>
								<th>Usuário</th>
								<th>Login</th>
								<th>Perfil de Usuário</th>
								<th class="text-center">Ativo</th>
								<th class="text-right no-sort">Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($usuarios as $user) : ?>
								<tr>
									<td><?= $user->id ?></td>
									<td><?= $user->username ?></td>
									<td><?= $user->email ?></td>
									<td><?= ($this->ion_auth->is_admin($user->id)) ? 'Administrador' : 'Colaborador' ?></td>
									<td class="text-center pr-4"><?= ($user->active == 1) ? '<span class="badge badge-success">Sim</span>' : '<span class="badge badge-danger">Não</span>' ?></td>
									<td class="text-right">
										<a title="Editar" href="<?php echo base_url('usuarios/edit/' . $user->id); ?>" class="btn btn-sm btn-primary">
											<i class="fas fa-user-edit"></i>
										</a>
										<a title="Excluir" href="javascript(void)" data-toggle="modal" data-target="#user-<?= $user->id; ?>" class=" btn btn-sm btn-danger">
											<i class="fas fa-user-times"></i>
										</a>
									</td>
								</tr>

								<div class="modal fade" id="user-<?= $user->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja excluir?</h5>
												<button class="close" type="button" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">×</span>
												</button>
											</div>
											<div class="modal-body">Para exluir o usuário clique em <strong>"Sim"</strong></div>
											<div class="modal-footer">
												<button class="btn btn-secondary" type="button" data-dismiss="modal">Não</button>
												<a class="btn btn-danger" href="<?= base_url("usuarios/del/" . $user->id) ?>">Sim</a>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
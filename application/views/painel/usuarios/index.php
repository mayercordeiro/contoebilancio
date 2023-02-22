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
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
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
				<a title="Cadastrar novo usuário" href="" class="btn btn-success btn-sm float-right">
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
								<th>Ativo</th>
								<th class="text-right no-sort">Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($usuarios as $user) : ?>
								<tr>
									<td><?= $user->id ?></td>
									<td><?= $user->username ?></td>
									<td><?= $user->email ?></td>
									<td><?= $user->active ?></td>
									<td class="text-right">
										<a title="Editar" href="<?php echo base_url('usuarios/edit/' . $user->id); ?>" class="btn btn-sm btn-primary">
											<i class="fas fa-user-edit"></i>
										</a>
										<a title="Excluir" href="" class="btn btn-sm btn-danger">
											<i class="fas fa-user-times"></i>
										</a>
									</td>
								</tr>
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
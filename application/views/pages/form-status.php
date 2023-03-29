<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<?php if (isset($status)) : ?>
		<h1 class="h2">Editar status</h1>
		<?php else : ?>
		<h1 class="h2">Novo status</h1>
		<?php endif; ?>
		<div class="btn-toolbar mb-2 mb-md-0">
		</div>
	</div>	
	<div class="col-md-12 pt-3">
	<?php if (isset($status)) : ?>
			<form action="<?= base_url() ?>status/update/<?= $status['id'] ?>" method="post">
			<?php else : ?>
				<form action="<?= base_url() ?>status/store" method="post">
				<?php endif; ?>
				<div class="col-md-6">
					<div class="form-group">
						<label for="status">Status do chamado</label><span class="text-danger">*</span>
						<input type="text" class="form-control" name="status" id="status" placeholder="Nome do status" required value="<?= isset($status) ? $status["status"] : "" ?><?= $this->session->flashdata('title'); ?>">
					</div>
				</div>
				<div class="col-md-6">
					<button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Salvar</button>
					<a href="<?= base_url() ?>tickets" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Cancelar</a>
				</div>


				</form>
	</div>
</main>
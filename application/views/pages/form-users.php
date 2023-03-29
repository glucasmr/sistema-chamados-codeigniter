<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<?php if($user['id'] != $_SESSION["logged_user"]['id']) : ?>
	<h1 class="h2">Editar usuário</h1>
	<?php else: ?>
	<h1 class="h2">Editar perfil</h1>
	<?php endif; ?>
	</div>
	<p class="text-success font-weight-bold">
	<?= $this->session->flashdata('msgSuccess'); ?>
	</p>
	
	<div class="row">


		<div class="col-md-6">

			<form action="<?= base_url() ?>users/update/<?= $user['id'] ?>" method="post">
				<div class="form-group">
					<label for="name">Nome</label><span class="text-danger">*</span>
					<input type="text" class="form-control" name="name" id="name" placeholder="Nome do Usuário" required
					<?php if($user['id'] != $_SESSION["logged_user"]['id']) : ?>
					 disabled title="Somente o usuário pode editar este campo" 
					 <?php endif;?>
					 value="<?= $user["name"] ?>">
				</div>


				

				<button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Salvar</button>
				<a href="<?= base_url() ?>users" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Cancelar</a>
		</div>

		<div class="col-md-6">


			<div class="form-group">
				<label for="is_admin">Papel do usuário</label><span class="text-danger">*</span><br>
				<select name="is_admin" id="is_admin" class="form-control" required
				<?php if(!$_SESSION["logged_user"]['is_admin']) : ?>
					disabled title="Somente o administrador pode editar este campo"
				<?php endif; ?>>
					<?php if ($user['is_admin']) : ?>
						<option value="0">Usuário</option>
						<option value="1" selected="selected">Administrador</option>
					<?php else :	?>
						<option value="0" selected="selected">Usuário</option>
						<option value="1">Administrador</option>
					<?php endif; ?>
				</select>
			</div>
			<?php if($user['id'] == $_SESSION["logged_user"]['id']) : ?>
			<div class="d-flex justify-content-end">
			<a href="<?= base_url() ?>users/editLogin/<?=$user['id']?>" class="btn btn-info btn-xs"><i class="fas fa-pencil-alt"></i> Editar dados de login</a>
			</div>
			<?php endif;?>

		</form>
		
		</div>

	</div>
</main>
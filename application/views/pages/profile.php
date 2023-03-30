<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Seu Perfil</h1>
	</div>
	<div class="col-md-12 pt-3 row align-items-start">
	<p class="text-success font-weight-bold">
	<?= $this->session->flashdata('msgSucess'); ?>
	</p>
		<div class="col">
			<h4>Nome </h4>
			<p>
				<?= $user['name'] ?>
			</p>
			<h4>Papel</h4>
			<p>
				<?php if($user['is_admin']): ?>
				Administrador  
				<?php else: ?>
				Usuário
				<?php endif;  ?>
			</p>
				<a href="<?= base_url() ?>users/edit/<?=$user['id']?>" class="btn btn-warning btn-xs mt-3x"><i class="fas fa-pencil-alt"></i> Editar Informações</a>
		</div>
		
		
		<div class="col">
			<h4>E-mail</h4>
			<p>
				<?= $user['email'] ?>
			</p>



		</div>
	</div>
	

</main>
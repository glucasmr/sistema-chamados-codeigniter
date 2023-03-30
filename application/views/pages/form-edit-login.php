<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Editar dados de login</h1>
	</div>
	<p class="text-danger font-weight-bold">
	<?= $this->session->flashdata('msgFailure'); ?>
	</p>
	<div class="row">

		<div class="col-md-6">

			<form action="<?= base_url() ?>users/updateLogin/<?= $user['id'] ?>" method="post">
				<div class="form-group">
					<label for="email">Endereço de E-mail</label>
					<input type="email" class="form-control" name="email" id="email" placeholder="Digite o novo endereço de e-mail caso deseje alterar" required autofocus
					 value="<?= $user["email"] ?>">
				</div>

				<div class="form-group">
					<label for="newPassword">Nova senha</label>
					<input type="password" name="newPassword" id="newPassword" class="form-control" placeholder="Deixe em branco caso não deseje alterar">
					</input>
				</div>

				

				<div class="form-group">
					<label for="confirmPassword">Confirme a nova senha</label>
					<input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Deixe em branco caso não deseje alterar">
					</input>
				</div>


			<div class="form-group">
				<label for="password">Senha atual</label><span class="text-danger">*</span>
				<input type="password" name="password" id="password" class="form-control" placeholder="Digite sua senha atual" required autofocus>
				</input>
			</div>

			
			<button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Salvar</button>
				<a href="<?= base_url() ?>users" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Cancelar</a>
		
		</form>
		
		</div>

	</div>
</main>
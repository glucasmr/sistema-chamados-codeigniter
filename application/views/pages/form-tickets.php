<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<?php if (isset($ticket)) : ?>
			<h1 class="h2">Editar chamado</h1>
		<?php else : ?>
			<h1 class="h2">Novo chamado</h1>
		<?php endif; ?>
	</div>
	<div class="row justify-content-end">







		<div class="col-md-6">
			<?php if (isset($ticket)) : ?>
				<form action="<?= base_url() ?>tickets/update/<?= $ticket['id'] ?>" method="post" enctype="multipart/form-data">
				<?php else : ?>
					<form action="<?= base_url() ?>tickets/store" method="post" enctype="multipart/form-data">
					<?php endif; ?>
					<div class="form-group">
						<label for="title">Título</label><span class="text-danger">*</span>
						<input type="text" class="form-control" name="title" id="title" placeholder="Título do chamado" required 
						<?php if(isset($ticket['user_id']) && ($ticket['user_id']!=null) && ($ticket['user_id'] != $_SESSION["logged_user"]['id'])) : ?>
							disabled title="Somente o requerente do chamado pode editar este campo"
						<?php endif;?>
						 value="<?= isset($ticket) ? $ticket["title"] : "" ?><?= $this->session->flashdata('title'); ?>">
					</div>








					<?php if ($user_id = $_SESSION["logged_user"]['is_admin']) : ?>
						<div class="form-group">
							<label for="status_id">Status do chamado</label><span class="text-danger">*</span><br>
							<select name="status_id" id="status_id" class="form-control">
								<?php foreach ($tickets_status as $ticket_status) : ?>
									<option value="<?= $ticket_status['id'] ?>" <?php if (isset($ticket)) :
																					if ($ticket['status_id'] == $ticket_status['id']) : ?> selected='selected' <?php endif; ?> <?php endif; ?>><?= $ticket_status['status'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					<?php endif; ?>
					
					<?php if(isset($ticket['userfile']) && $ticket['userfile']!=null) : ?>
					

						<div style="width: px;height:360px;">
							<label for="img">Imagem:</label>


							<img name="img " src="<?= base_url() ?>assets/files/<?= $ticket['userfile'] ?>" alt="Imagem do chamado" style=" width: 100%;height: 100%;object-fit: contain;">
						</div>

						<div class="pt-5">
							<p class="text-danger font-weight-bold ">Caso seja feito upload de arquivo este será substituído </p>
						</div>
					<?php endif; ?>
		</div>

		<div class="col-md-6">


			<div class="form-group">
				<label for="description">Descrição</label><span class="text-danger">*</span>
				<input class="form-control" name="description" id="description" placeholder="Relate seu problema" required 
				<?php if(isset($ticket['user_id']) && ($ticket['user_id']!=null) && ($ticket['user_id'] != $_SESSION["logged_user"]['id'])) : ?>
					disabled title="Somente o requerente do chamado pode editar este campo"
				<?php endif;?>
				 value="<?= isset($ticket) ? $ticket["description"] : "" ?><?= $this->session->flashdata('description'); ?>"></input>
			</div>

			<div class="form-group">
				<label for="userfile">Upload de Arquivo - Imagens no formato JPG, JPEG, PNG</label>
				<input type="file" class="form-control" name="userfile" id="userfile" 
				<?php if(isset($ticket['user_id']) && ($ticket['user_id']!=null) && ($ticket['user_id'] != $_SESSION["logged_user"]['id'])) : ?>
					disabled title="Somente o requerente do chamado pode editar este campo"
				<?php endif;?>
				></input>
				<?= $this->session->flashdata('msg'); ?>
			</div>
			<div>
				<div class="d-flex justify-content-end">
					<div class="mx-2">

						<button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Enviar</button>
					</div>
					<a href="<?= base_url() ?>tickets" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Cancelar</a>
				</div>
			</div>





		</div>
		</form>
	</div>






	</div>
</main>
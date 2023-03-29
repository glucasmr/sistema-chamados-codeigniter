<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Chamado</h1>
	</div>
	<div class="col-md-12 pt-3 row align-items-start">

		<div class="col">
			<h4>Título </h4>
			<p><?= $ticket['title'] ?></p>
			<h4>Descrição</h4>
			<p><?= $ticket['description'] ?></p>
			<h4>Requerente</h4>
			<?php foreach ($users as $user) : ?>
				<?php if ($user['id'] == $ticket['user_id']) : ?>
					<p>
						<?= $user['name'] ?>
					</p>
				<?php endif; ?>
			<?php endforeach; ?>
			<h4>Atualizado em:</h4>
			<p>							<?php $arr = explode('-', $ticket['update_date']);
							$ticket['update_date'] = $arr[2].'/'.$arr[1].'/'.$arr[0];?>
							<?= $ticket['update_date']?></p>
		</div>


		<div class="col">
			<h4>Número do chamado</h4>
			<p><?= $ticket['id'] ?></p>
			<h4>Status do chamado</h4>
			<p>
				<?php foreach ($status as $unique_status) : ?>
					<?php if ($ticket['status_id'] == $unique_status['id']) : ?>
						<?= $unique_status['status'] ?>
					<?php endif; ?>
				<?php endforeach; ?>
			</p>
			<h4>Criado em:</h4>
			<p><?php $arr = explode('-', $ticket['create_date']);
							$ticket['create_date'] = $arr[2].'/'.$arr[1].'/'.$arr[0];?>
							<?=$ticket['create_date']?></p>



		</div>
	</div>
	<?php if ($ticket['userfile']) : ?>
		<div class="col-md-6" style="width: 640px;
   height:360px;">
			<h4>Imagem:</h4>
			<img src="<?= base_url() ?>assets/files/<?= $ticket['userfile'] ?>" alt="Imagem do chamado" style=" width: 100%;
	height: 100%;
	object-fit: contain;">
		</div>
	<?php endif; ?>


</main>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Chamados</h1>
		<div class="btn-group mr-2">
			<a href="<?= base_url('')?>tickets/new" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus-square"></i> Chamado</a>
		</div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Descrição</th>
					<th>Status</th>
					<th>Criado</th>
					<th>Atualizado</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($tickets as $ticket) : ?>
                <tr>
                    <td><?= $ticket['id']?></td>
                    <td><?= $ticket['description']?></td>
                    <td><?= $ticket['status']?></td>
                    <td><?= $ticket['create_date']?></td>
                    <td><?= $ticket['update_date']?></td>
                    <td>
						<a href="<?= base_url() ?>tickets/edit/<?=$ticket["id"]?>" class="btn btn-sm btn-warning">
							<i class="fas fa-pencil-alt"></i>
						</a>
						<a href="javascript:goDelete(<?= $ticket['id'] ?>)" class="btn btn-sm btn-danger">
							<i class="fas fa-trash-alt"></i>
						</a>
						</td>
                </tr>
                    
                <?php endforeach; ?>
			</tbody>
		</table>
	</div>
</main>

<script>
	function goDelete(id) {
		var myUrl = 'tickets/delete/' + id
		if(confirm('Realmente deseja excluir o chamado?')) {
			window.location.href = myUrl;
		}else {
			alert('Operação cancelada')
		}
	}
</script>
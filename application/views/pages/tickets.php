<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Seus chamados</h1>
		<div class="btn-group mr-2">
			<a href="<?= base_url()?>tickets/new" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus-square"></i> Chamado</a>
		</div>
	</div>

	<div class="table-responsive">
		<table class="display" id="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Título</th>
					<th>Status</th>
					<th>Criado</th>
					<th>Atualizado</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($tickets as $ticket) : ?>
                <tr>
                    <td><?= $ticket['id']?></td>
                    <td><?= $ticket['title']?></td>
                    <td>
					<?php foreach ($status as $unique_status) : ?>						
						<?php if($ticket['status_id']==$unique_status['id']) : ?>
							<?= $unique_status['status']?>
						<?php endif; ?>	
						<?php endforeach; ?>
					</td>
					<td>
							<?php $arr = explode('-', $ticket['create_date']);
							$ticket['create_date'] = $arr[2].'/'.$arr[1].'/'.$arr[0];?>
							<?=$ticket['create_date']?>
							
						</td>
						<td>
							<?php $arr = explode('-', $ticket['update_date']);
							$ticket['update_date'] = $arr[2].'/'.$arr[1].'/'.$arr[0];?>
							<?= $ticket['update_date']?>
						</td>
                    <td class="d-flex justify-content-center">
						<a href="<?= base_url() ?>tickets/show/<?=$ticket["id"]?>" class="btn btn-sm btn-primary" title="Visualizar">
							<i class="fas fa-eye"></i>
						</a>
						<a href="<?= base_url() ?>tickets/edit/<?=$ticket["id"]?>" class="mx-2 btn btn-sm btn-warning" title="Editar">
							<i class="fas fa-pencil-alt"></i>
						</a>
						<a href="javascript:goDelete(<?= $ticket['id'] ?>)" class="btn btn-sm btn-danger" title="Deletar">
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
	$(document).ready( function() {
    $("#table").DataTable({
		"order": [],
        "language": {
            "lengthMenu": "Mostrando _MENU_ chamados por página",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum chamado disponível",
            "infoFiltered": "(Filtrado de _MAX_ chamados)",
			"search": "Busca:",
			"paginate": {
				"first":      "Primeira",
				"last":       "Última",
				"next":       "Próxima",
				"previous":   "Anterior"
			}
        },
  		"lengthMenu": [10, 25, 50, 75, 100 ],

    });
} );


	function goDelete(id) {
		var myUrl = 'tickets/delete/' + id
		if(confirm('Realmente deseja excluir o chamado?')) {
			window.location.href = myUrl;
		}else {
			alert('Operação cancelada')
		}
	}
</script>
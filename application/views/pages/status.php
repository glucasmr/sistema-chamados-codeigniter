<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Status dos chamados</h1>
		<div class="btn-toolbar mb-2 mb-md-0">
			<div class="btn-group mr-2">
				<a href="<?= base_url()?>status/new" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus-square"></i> Status</a>
			</div>
		</div>
	</div>
	<p class="text-danger font-weight-bold">
		<?= $this->session->flashdata('msg'); ?>
	</p>

	<div class="table-responsive">
		<table class="display" id="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Status</th>
					<th>Qtd. Status</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($tickets_status as $ticket_status) : ?>
                <tr>
                    <td><?= $ticket_status['id']?></td>
                    <td><?= $ticket_status['status']?></td>
					<td>



					<?php $ticket_status['status_tickets'] = 0;
					foreach ($all_tickets as $ticket) {
						if($ticket['status_id']==$ticket_status['id']):
							$ticket_status['status_tickets']++;
						endif;
					}?>
					<?=$ticket_status['status_tickets'];?>




					</td>
                    <td class="d-flex justify-content-center ">
						<a href="<?= base_url() ?>status/edit/<?=$ticket_status["id"]?>" class="mx-2 btn btn-sm btn-warning" title="Editar">
							<i class="fas fa-pencil-alt"></i>
						</a>
						<a href="javascript:goDelete(<?= $ticket_status['id'] ?>)" class="mx-2 btn btn-sm btn-danger" title="Deletar">
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
            "lengthMenu": "Mostrando _MENU_ status por página",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum status disponível",
            "infoFiltered": "(Filtrado de _MAX_ status)",
			"search": "Busca:",
			"paginate": {
				"first":      "Primeira",
				"last":       "Última",
				"next":       "Próxima",
				"previous":   "Anterior"
			}
        },
  		"lengthMenu": [ 5, 10, 25, 50, 75, 100 ],

    });
} );


	function goDelete(id) {
		var myUrl = 'status/delete/' + id
		if(confirm('Realmente deseja excluir o status?')) {
			window.location.href = myUrl;
		}else {
			alert('Operação cancelada')
		}
	}
</script>
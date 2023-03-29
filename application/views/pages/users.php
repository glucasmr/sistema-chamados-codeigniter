<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Usuários</h1>
		
	</div>
	<p class="text-danger font-weight-bold">
		<?= $this->session->flashdata('msg'); ?>
	</p>
	<div class="table-responsive">
		<table class="display" id="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Papel</th>
					<th>Qtd. Chamados</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user['id']?></td>
                    <td><?= $user['name']?></td>
                    <td><?= $user['email']?></td>
                    <td>
						<?php if($user['is_admin']) : ?>
							<?= 'Administrador' ?>
							<?php else : ?>
								<?= 'Usuário' ?>
								<?php endif; ?>	
					</td>
					<td>

					<?php $user['user_tickets'] = 0;
					foreach ($all_tickets as $ticket) {
						if($ticket['user_id']==$user['id']):
							$user['user_tickets']++;
						endif;
					}?>
					<?=$user['user_tickets'];?>
					

					</td>
                    <td class="d-flex justify-content-center">
						<a href="<?= base_url() ?>users/edit/<?=$user["id"]?>" class="mx-2 btn btn-sm btn-warning" title="Editar">
							<i class="fas fa-pencil-alt"></i>
						</a>
						<a href="javascript:goDelete(<?= $user['id'] ?>)" class="mx-2 btn btn-sm btn-danger" title="Deletar">
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
            "lengthMenu": "Mostrando _MENU_ usuários por página",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum usuário disponível",
            "infoFiltered": "(Filtrado de _MAX_ usuários)",
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
		var myUrl = 'users/delete/' + id
		if(confirm('Realmente deseja excluir o usuário?')) {
			window.location.href = myUrl;
		}else {
			alert('Operação cancelada')
		}
	}
</script>
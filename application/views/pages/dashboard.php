    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Dashboard</h1>
		<div class="btn-toolbar mb-2 mb-md-0">
			<div class="btn-group mr-2">
				<a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus-square"></i> Chamado</a>
			</div>
		</div>
	</div>

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2 class="h2">Chamados</h2>
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
                <?php foreach ($tickets as $ticket): ?>
                    <tr>
                        <td><?= $ticket['id']?></td>
                        <td><?= $ticket['description']?></td>
                        <td><?= $ticket['status']?></td>
                        <td><?= $ticket['create_date']?></td>
                        <td><?= $ticket['update_date']?></td>
                        <td>xxx</td>
                    </tr>
                    
                <?php endforeach; ?>
				
			</tbody>
		</table>
	</div>

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2 class="h2">Last 5 Users</h2>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
					<th>Country</th>
				</tr>
			</thead>
			<tbody>
				
			</tbody>
		</table>
	</div>
</main>
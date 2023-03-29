<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?= base_url()?>dashboard">Sistema Chamados</a>
	
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap"> 
      <a class="nav-link" href="<?= base_url() ?>login/logout">Sair</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Menu</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column">
          <?php if($user_id = $_SESSION["logged_user"]['is_admin']) : ?>
            <li class="nav-item">
            <a class="nav-link" href="<?= base_url()?>dashboard">
              <span data-feather="file"></span>
              Dashboard
            </a>
          </li>
            <?php endif; ?>
					<li class="nav-item">
            <a class="nav-link" href="<?= base_url()?>tickets">
              <span data-feather="file"></span>
              Seus Chamados
            </a>
          </li>
          <?php if($user_id = $_SESSION["logged_user"]['is_admin']) : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url()?>users">
              <span data-feather="shopping-cart"></span>
              Usuários
            </a>
					</li>
          <?php endif; ?>
					
          <?php if($user_id = $_SESSION["logged_user"]['is_admin']) : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url()?>status">
                <span data-feather="shopping-cart"></span>
                Status dos Chamados
              </a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url()?>users/profile">
                <span data-feather="file"></span>
                Perfil
              </a>
            </li>
        
        </ul>
      </div>
    </nav>

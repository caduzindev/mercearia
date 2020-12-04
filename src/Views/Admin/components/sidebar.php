<div class="sidebar" data-color="danger" data-background-color="black">
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          ETA
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Supermercado
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item" >
            <a class="nav-link" href="<?php echo BASE_URL.'admin'?>">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item <?php echo $this->e($page)=='info'?'active':''?>" data-toggle="collapse" href="#info" aria-expanded="false" aria-controls="info">
            <a class="nav-link" href="#0">
              <i class="material-icons">dashboard</i>
              <p>Info</p>
            </a>
            <!-- Collapse-->
            <div class="collapse" id="info">
              <a class="nav-link" href="<?php echo BASE_URL.'admin/editInfo'?>">
                <i class="material-icons">contacts</i>
                <p>Editar Info</p>
              </a>
            </div>
          </li>
          <li class="nav-item <?php echo $this->e($page)=='products'?'active':''?>" data-toggle="collapse" href="#products" aria-expanded="false" aria-controls="products">
            <a class="nav-link" href="#0">
              <i class="material-icons">dashboard</i>
              <p>Produtos</p>
            </a>
             <!-- Collapse-->
             <div class="collapse" id="products">
              <a class="nav-link" href="<?php echo BASE_URL.'admin/addProduct'?>">
                <i class="material-icons">category</i>
                <p>Adicionar Produto</p>
              </a>
              <a class="nav-link" href="<?php echo BASE_URL.'admin/listProducts'?>">
                <i class="material-icons">category</i>
                <p>Listar Produtos</p>
              </a>
            </div>
          </li>
          <li class="nav-item  <?php echo $this->e($page)=='users'?'active':''?>" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users">
            <a class="nav-link" href="#0">
              <i class="material-icons">dashboard</i>
              <p>Usuarios</p>
            </a>
             <!-- Collapse-->
             <div class="collapse" id="users">
              <a class="nav-link" href="<?php echo BASE_URL.'admin/usersList'?>">
                <i class="material-icons">category</i>
                <p>Usuarios Cadastrados</p>
              </a>
            </div>
          </li>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
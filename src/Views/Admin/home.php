<!doctype html>
<html lang="en">

<head>
  <?php $this->insert('adminComponents::head')?>
</head>

<body>
  <div class="wrapper">
    <?php $this->insert('adminComponents::sidebar')?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php $this->insert('adminComponents::navbar')?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header card-header-danger">
                        <h4 class="card-title font-weight-bold" style="font-size:2rem"><?php echo $getHomeInfo['@qtRegister']?></h4>
                        <p class="category">Usuarios Cadastrados</p>
                    </div>
                    <div class="card-body">
                        Aqui está o total de usuarios cadastrados
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header card-header-danger">
                        <h4 class="card-title font-weight-bold" style="font-size:2rem"><?php echo $getHomeInfo['@qtFeatureds']?></h4>
                        <p class="category">Produtos em Destaque</p>
                    </div>
                    <div class="card-body">
                        Aqui está o total de produtos em Destaque
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header card-header-danger">
                        <h4 class="card-title font-weight-bold" style="font-size:2rem"><?php echo $getHomeInfo['@qtPromotions']?></h4>
                        <p class="category">Produtos em Promoção</p>
                    </div>
                    <div class="card-body">
                        Aqui está o total de produtos em Promoção
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header card-header-danger">
                        <h4 class="card-title font-weight-bold" style="font-size:2rem"><?php echo $getHomeInfo['@qtProducts']?></h4>
                        <p class="category">Total de Produtos</p>
                    </div>
                    <div class="card-body">
                        Aqui está o total de produtos cadastrados
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Mercearia
                </a>
              </li>
            </ul>
          </nav>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>
</body>
<?php $this->insert('adminComponents::scripts')?>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->insert('adminComponents::head')?>
    <title>Editar Info</title>
</head>
<body>
    <div class="wrapper">
        <?php $this->insert('adminComponents::sidebar',['page'=>'products'])?>
        <div class="main-panel">
             <!-- Navbar -->
            <?php $this->insert('adminComponents::navbar')?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Produtos</li>
                            <li class="breadcrumb-item active" aria-current="page">Listar Produtos</li>
                        </ol>
                    </nav>
                    <div class="row d-flex justify-content-around">
                        <h1 class="title">Filtros</h1>
                        <div>
                            <a class="btn btn-outline-dark" href="?filter=promotions">Promoções</a>
                            <a class="btn btn-outline-dark" href="?filter=featured">Destaques</a>
                            <a class="btn btn-outline-danger" href="?filter=all">Todos</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                    <table class="table table-shopping">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th class="text-center"></th>
                                <th class="text-left">Preço</th>
                                <th class="text-left">Destaque</th>
                                <th class="text-left">Promoção</th>
                                <th class="text-left">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($products)){?>
                                <?php foreach($products as $product){?>
                                    <tr>
                                        <td>
                                            <div class="img-container">
                                                <img src="<?php echo BASE_PATH_IMAGES.'/products/'.$product->getImage()?>" rel="nofollow" alt="image">
                                            </div>
                                        </td>
                                        <td class="td-name">
                                            <p href="#jacket" class="text-danger"><?php echo $product->getName()?></p>
                                        </td>
                                        <td>
                                            R$ <?php echo number_format($product->getPrice(),2,',',' ')?>
                                        </td>
                                        <td>
                                            <?php echo $product->getFeatured()=='Y'?'Sim':'Não'?>
                                        </td>
                                        <td>
                                            <?php echo $product->getPromotion()=='Y'?'Sim':'Não'?>
                                        </td>
                                        <td>
                                            <a type="button" rel="tooltip" href="<?php echo BASE_URL?>admin/removeProduct/<?php echo $product->getId()?>" class="btn btn-danger">
                                                <i class="material-icons">close</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php $this->insert('adminComponents::scripts')?>
</html> 
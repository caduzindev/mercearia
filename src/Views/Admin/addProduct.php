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
                            <li class="breadcrumb-item active" aria-current="page">Adicionar Produto</li>
                        </ol>
                    </nav>
                    <?php if(!empty($_SESSION['errors'])){?>
                        <?php foreach( $_SESSION['errors'] as $erro){?>
                            <div class="alert alert-danger"><?php echo $erro?></div>
                        <?php } ?>
                    <?php } ?>
                    <?php if(!empty($_SESSION['errors'])){
                        sleep(3);
                        unset($_SESSION['errors']);
                    }?>
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="name" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="price">Preço</label>
                            <input type="text" class="form-control" id="price" name="price" onKeyPress="return(moeda(this,'.',',',event))">
                        </div>

                        <div class="form-check form-check-inline mt-5">
                            <label class="form-check-label mr-5">
                                <input class="form-check-input" type="checkbox" id="featured" value="Y" name="featured"> Destaque
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="promotion" value="Y" name="promotion"> Promoção
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                        <div class="form-group d-flex flex-column align-items-center">
                            <img src="<?php echo BASE_PATH_IMAGES?>userdefault.png" alt="" id="imagePreview" style="width:400px;height:400px" class="mb-5">
                            <input type="file" name="photo" style="position:absolute;top:-2000px" id="file">

                            <div>
                                <button class="btn btn-outline-dark" id="selectImage">Selecione Imagem</button>
                                <button class="btn btn-outline-danger" id="removeImage">Remover</button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger font-weight-bold">Cadastrar</button>
                    </form>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php $this->insert('adminComponents::scripts')?>
</html> 
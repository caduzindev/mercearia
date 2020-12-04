<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->insert('adminComponents::head')?>
    <title>Editar Info</title>
</head>
<body>
    <div class="wrapper">
        <?php $this->insert('adminComponents::sidebar',['page'=>'info'])?>
        <div class="main-panel">
             <!-- Navbar -->
            <?php $this->insert('adminComponents::navbar')?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <!-- Form  -->
                    <?php echo !empty($_SESSION['error']) ? '<div class="alert alert-danger">'.$_SESSION['error'].'</div>':''?>
                    <?php if(!empty($_SESSION['error'])){
                        sleep(3);
                        unset($_SESSION['error']);
                    }?>
                    <form method="post">
                        <div class="form-group">
                            <label for="neigh" class="text-dark">Bairro</label>
                            <input type="text" class="form-control" id="neigh" name="neigh" value="<?php echo $this->e($info->getNeigh())?>">
                        </div>
                        <div class="form-group">
                            <label for="street" class="text-dark">Rua</label>
                            <input type="text" class="form-control" id="street" name="street" value="<?php echo $this->e($info->getStreet())?>">
                        </div>
                        <div class="form-group">
                            <label for="num" class="text-dark">Numero</label>
                            <input type="text" class="form-control" id="num" name="num" value="<?php echo $this->e($info->getNum())?>">
                        </div>
                        <div class="form-group">
                            <label for="tel" class="text-dark">Telefone</label>
                            <input type="text" class="form-control" id="tel" name="tel" value="<?php echo $this->e($info->getTel())?>" onkeypress="mask(this,mphone)" onblur="mask(this, mphone)">
                        </div>
                        <div class="form-group">
                            <label for="mission" class="text-dark">Missão</label>
                            <textarea class="form-control" id="mission" rows="3" style="resize:none" name="mission"><?php echo $this->e($info->getMission())?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="value" class="text-dark">Valores</label>
                            <textarea class="form-control" id="value" rows="3" style="resize:none" name="value"><?php echo $this->e($info->getValue())?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="vision" class="text-dark">Visão</label>
                            <textarea class="form-control" id="vision" rows="3" style="resize:none" name="eyes"><?php echo $this->e($info->getEyes())?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="instagram" class="text-dark">Instagram</label>
                            <input type="text" class="form-control" id="instagram" placeholder="(Opcional)" name="instagram" value="<?php echo $this->e($info->getInstagram())?>">
                        </div>
                        <div class="form-group">
                            <label for="facebook" class="text-dark">Facebook</label>
                            <input type="text" class="form-control" id="facebook" placeholder="(Opcional)" name="facebook" value="<?php echo $this->e($info->getFacebook())?>">
                        </div>
                        <div class="form-group">
                            <label for="whatsapp" class="text-dark">Whatsapp</label>
                            <input type="text" class="form-control" id="whatsapp" placeholder="(Opcional)" name="whatsapp" value="<?php echo $this->e($info->getWhatsapp())?>">
                        </div>
                        <div class="form-group">
                            <label for="linkedin" class="text-dark">Linkedin</label>
                            <input type="text" class="form-control" id="linkedin" placeholder="(Opcional)" name="linkedin" value="<?php echo $this->e($info->getLinkedin())?>">
                        </div>
                        
                        <button type="submit" class="btn btn-danger">Salvar</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<?php $this->insert('adminComponents::scripts')?>
</html> 
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->insert('adminComponents::head')?>
    <title>Editar Info</title>
</head>
<body>
    <div class="wrapper">
        <?php $this->insert('adminComponents::sidebar',['page'=>'users'])?>
        <div class="main-panel">
             <!-- Navbar -->
            <?php $this->insert('adminComponents::navbar')?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Mensagem</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($registers)){?>
                                <?php foreach($registers as $register){?>
                                    <tr>
                                        <td><?php echo $register->getId()?></td>
                                        <td><?php echo $register->getName()?></td>
                                        <td><?php echo $register->getEmail()?></td>
                                        <td><?php echo $register->getTel()?></td>
                                        <td>
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#testeModal<?php echo $register->getId()?>">Ver Mensagem</button>

                                            <div class="modal fade" id="testeModal<?php echo $register->getId()?>" tabindex="-1" role="dialog" aria-labelledby="testeModal1">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-dark">
                                                            <h5 class="modal-title text-light" id="testeModal1">Mensagem de Carlos</h5>
                                                            <button class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                <?php echo $register->getMessage()?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
</body>
<?php $this->insert('adminComponents::scripts')?>
</html> 
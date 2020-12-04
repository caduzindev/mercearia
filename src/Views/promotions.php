<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promoções ETA</title>
    <link rel="stylesheet" href=<?php echo BASE_ASSETS."css/promotions.css"?>>
</head>
<body>
    <div class="container">
        <h1>Promoções</h1>
        <?php if(!empty($productsPromotions)){?>
            <div class="containerPromotions">
                <?php foreach($productsPromotions as $product){?>
                    <div class="cardProduct">
                        <img src="<?php echo BASE_PATH_IMAGES.'products/'.$product->getImage()?>" alt="leite">
                        
                        <div class="infoProduct">
                            <h2><?php echo $product->getName()?></h2>
                            <h3>R$ <?php echo number_format($product->getPrice(),2,',',' ')?></h3>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php }else{?>
            <div class="not-found-promotions">
                <h2>Nenhum produto em Promoção</h2>
                <img src="<?php echo BASE_PATH_IMAGES?>notpromotions.svg" alt="">
            </div>
        <?php } ?>
    </div>
</body>
</html>
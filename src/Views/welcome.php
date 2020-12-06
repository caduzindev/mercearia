<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="Mercearia/Supermercado perto de você, onde você encontrará produtos de qualidade">
    <meta name="keywords" content="supermercado, mercadinho, lista de mercado, supermercado big, supermercado aberto hoje, supermercado perto de min, mercado bom preço, supermercado aberto"/>
    <meta property="og:title" content="ETA Supermercado"/>
    <!-- <meta property= “og: image” content=”http:seomaster.com.br/wp-content/themes/img/facebooklogo.png”/> -->
    <meta property="og:url" content="https://www.testandosite.com.br/"/>
    <title>ETA Supermercado</title>
    <link rel="canonical" href="https://www.testandosite.com.br/"/>
    <link rel="stylesheet" href=<?php echo BASE_ASSETS."css/home.css"?>>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<body>
    <header id="home">
        <div>
            <h1>Mercearia</h1>
            <ul class="menu-header">
                <li class="menu-item"><a href="#home">Home</a></li>
                <li class="menu-item"><a href="#contact">Contato</a></li>
                <li class="menu-item"><a href="#sobre">Sobre</a></li>
                <li class="menu-item"><a href="promotions">Promoções</a></li>
            </ul>
            
            <ion-icon name="menu" id="menu"></ion-icon>
        </div>
    </header>
    <ul class="menu-mobile">
        <li class="animate__fast"><a href="#home">Home</a></li>
        <li class="animate__faster"><a href="#contact">Contato</a></li>
        <li class="animate__fast"><a href="#sobre">Sobre</a></li>
        <li class="animate__faster"><a href="promotions">Promoções</a></li>
    </ul>
    <section class="containerDestaque animate__animated animate__backInLeft">
        <div class="effect">
            <h1>Mercadoria top demais e de qualidade</h1>
            <a href="promotions">Promoções</a>
        </div>
        <div class="productsDestaques">
            <?php if(!empty($productsFeatured) && count($productsFeatured)>=3){?>
                <div>
                    <?php foreach($productsFeatured as $product){?>
                        <div class="cardProduct">
                            <img src="<?php echo BASE_PATH_IMAGES.'products/'.$product->getImage()?>" alt=<?php echo $product->getName()?> loading=lazy>
                            
                            <div class="infoProduct">
                                <h2><?php echo $product->getName()?></h2>
                                <h3>R$ <?php echo number_format($product->getPrice(),2,',',' ')?></h3>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php }else{ ?>
                <img src="<?php echo BASE_PATH_IMAGES?>cart.svg" alt="cart" loading=lazy>
            <?php } ?>
        </div>
    </section>

    <section class="containerCompany">
        <img src=<?php echo BASE_PATH_IMAGES."empresa.png"?> alt="company" data-anime="animate__slideInLeft" loading=lazy>
        <div class="wordEffect" data-anime="animate__backInRight">
            <h3>Acredite em nós</h3>
            <div>
                <p>Tudo o que você procura pode ser encontrado em nossa mercearia, você não precisará procurar em outros lugares para poder ter o que precisa</p>
                <a href="promotions">Clique aqui</a>
            </div>
        </div>
    </section>

    <section class="containerContact" id="contact">
        <div class="contactInfo">
            <h1 data-anime="animate__bounceInDown">Contato</h1>
            <div class="contact" data-anime="animate__bounceInDown">
                <h1>Rua: <?php echo $info->getStreet()?></h1>
                <h1>Bairro: <?php echo $info->getNeigh()?></h1>
                <h1>Numero: <?php echo $info->getNum()?></h1>
                <h1>Telefone: <?php echo $info->getTel()?></h1>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15103.62118650041!2d-42.000398627250604!3d-18.846878238180654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xb1a688cd9448ed%3A0xd4be0fc7e086f5dd!2sJardim%20do%20Trevo%2C%20Gov.%20Valadares%20-%20MG!5e0!3m2!1spt-BR!2sbr!4v1606227257113!5m2!1spt-BR!2sbr" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </section>

    <section class="containerInfo" id="sobre">
        <div class="info-1" data-anime="animate__fadeInLeftBig">
            <h1>Missão</h1>
            <p><?php echo utf8_encode($info->getMission())?></p>
        </div>
        <div class="info-2" data-anime="animate__fadeInRightBig">
            <h1>Valores</h1>
            <p><?php echo utf8_encode($info->getValue())?>
        </p>
        </div>   
        <div class="info-3" data-anime="animate__fadeInLeftBig">
            <h1>Visão</h1>
            <p><?php echo utf8_encode($info->getEyes())?></p>
        </div>
    </section>

    <section class="containerUser">
        <h1>Quem é Você?</h1>
        <form method='post' id="formUser">
            <div class="content-1">
                <label for="name">Seu nome</label>
                <input type="text" name="name" id="name">

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email">

                <label for="tel">Telefone</label>
                <input type="text" name="tel" id="tel" onkeypress="mask(this,mphone)">
            </div>
            <div class="content-2">
                <label for="message">Mensagem</label>
                <textarea name="message" id="message" cols="30" rows="10"></textarea>
            </div>
        </form>
        <button id="send">Enviar</button>
    </section>

    <footer>
        <div class="containerLogo">
            <h1>Mercearia</h1>
            <div class="social-networks">
                <a href="<?php echo $info->getFacebook()?>">
                    <ion-icon name="logo-facebook"></ion-icon>
                </a>
                <a href="<?php echo $info->getInstagram()?>">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a> 
                <a href="<?php echo $info->getWhatsapp()?>">
                    <ion-icon name="logo-whatsapp"></ion-icon>
                </a>
                <a href="<?php echo $info->getLinkedin()?>">
                    <ion-icon name="logo-linkedin"></ion-icon>
                </a> 
            </div>
        </div>

        <div class="links-site">
            <a href="#home">Home</a>
            <a href="#contact">Contato</a>
            <a href="#sobre">Sobre</a>
            <a href="promotions">Promoções</a>
        </div>
    </footer>
    <!-- GetButton.io widget -->
    <script src="<?php echo BASE_ASSETS?>js/home.js"></script>
    <script type="text/javascript">
        (function () {
            var options = {
                whatsapp: "553384104137", // WhatsApp number
                call_to_action: "Olá precisa de ajuda? Clique aqui", // Call to action
                position: "right", // Position may be 'right' or 'left'
            };
            var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
</script>
<!-- /GetButton.io widget -->
</body>
</html>
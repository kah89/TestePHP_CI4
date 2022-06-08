 <style>
#login {
    max-width: 95%;
    margin: auto;
    width: 380px;
    margin-top: 5%;
}

#logo-cliente {
    max-width: 100%;
    margin: auto;
    width: 700px;
}

#logo-santri {
    max-width: 50%;
    margin: auto;
    width: 380px;
}
 </style>
 <script src="static/js/jquery.js"></script>

 <div id="login">
     <img id="logo-cliente" class="w3-margin-top" src="<?= base_url('public/static/imagens/logo_cliente.jpg')?>" />
     <?php if(session()->getFlashdata('msg')):?>
     <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
     <?php endif;?>
     <form class="form-signin" method="post" action="./User/auth">
         <input class="w3-input w3-border w3-margin-top" type="text" placeholder="Usuário" name="LOGIN">
         </br>
         <input class="w3-input w3-border w3-margin-top" type="password" placeholder="Senha" name="SENHA">
         </br>
         <button class="w3-button w3-theme w3-margin-top w3-block" type="submit">Logar</button>
     </form>
     <a href="http://www.santri.com.br">
         <img id="logo-santri" class="w3-right w3-margin-top"
             src="<?= base_url('public/static/imagens/logo_santri.svg'); ?>" />
     </a>
 </div>
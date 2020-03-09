<?php if(isset($_SESSION['logado'])){ ?>
    <a href="<?= base_url('perfil') ?>">Meu Perfil</a>
    <a href="<?= base_url('logoff') ?>">Sair</a>
<?php }else{ ?>
    <a href="<?= base_url('register') ?>">Registrar-se</a>
    <a href="<?= base_url('login') ?>">Login</a>
<?php } ?>

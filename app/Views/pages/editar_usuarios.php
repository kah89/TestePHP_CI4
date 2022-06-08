
<script src="static/js/jquery.js"></script>

<div id="lista_usuarios" class="w3-margin">

    <h4>Editar usuários</h4>

    <div style="display: none;">
        <label>Usuário 1</label>
    </div>
    <?php if (isset($validation)) : ?>
    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
    <?php endif; ?>
    <form id="form-inscricao" class="form-signin" method="post">
      
        <div>
            <label>Nome</label>
            <input type="text" class="w3-input w3-block w3-border" name="NOME_COMPLETO"
                value="<?php echo $data['NOME_COMPLETO']?>">
        </div>

        <div>
            <label>Login</label>
            <input type="text" class="w3-input w3-block w3-border" name="LOGIN"
                value="<?php echo $data['LOGIN']?>">
        </div>

        <div>
            <label>Ativo</label>
            <input type="text" class="w3-input w3-block w3-border" name="ATIVO"
                value="<?php echo $data['ATIVO']?>">
        </div>
        <div>
            <label>Senha</label>
            <input type="password" class="w3-input w3-block w3-border" name="SENHA"
                value="<?php echo $data['SENHA']?>">
        </div>


        <div>
            <button class="btn btn-success btn-lg active" type="submit">Gravar</button>
            <button class="btn btn-danger btn-lg active" type="reset">Cancelar</button>
            <a href="<?= \base_url('/user/list') ?>"><button class="btn btn-outline-info btn-lg"
                    type="button">voltar</button></a>
        </div>
    </form>

</div>
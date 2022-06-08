<script src="static/js/jquery.js"></script>

<div id="lista_usuarios" class="w3-margin">

  <h4>Cadastro de usuários</h4>

  <div style="display: none;">
    <label>Usuário 1</label>
  </div>
  <?php if (isset($validation)) : ?>
    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
  <?php endif; ?>
  <form id="form-inscricao" method="POST" action="../User/save">
    <div>
      <label>Nome</label>
      <input type="text" class="w3-input w3-block w3-border" name="NOME_COMPLETO">
    </div>

    <div>
      <label>Login</label>
      <input type="text" class="w3-input w3-block w3-border" name="LOGIN">
    </div>

    <div>
      <label>Ativo</label>
      <input type="text" class="w3-input w3-block w3-border" name="ATIVO">
    </div>
    <div>
      <label>Senha</label>
      <input type="password" class="w3-input w3-block w3-border" name="SENHA">
    </div>


    <ul>
      <li id="opt_cadastrar_clientes"><input type="checkbox" checked value="cadastrar_clientes"> <label>Cadastrar clientes</label></li>
      <li id="opt_excluir_clientes"><input type="checkbox" value="excluir_clientes"> <label>Excluir clientes</label></li>
      <li id="opt_mais"><input type="checkbox" value="mais"> <label>E assim sucessivamente</label></li>
    </ul>

    <button class="btn btn-success btn-lg active" type="submit">Gravar</button>
    <button class="btn btn-danger btn-lg active" type="reset">Cancelar</button>
    <a href="<?= \base_url('/user/list') ?>"><button class="btn btn-outline-info btn-lg" type="button">voltar</button></a>
  </form>

</div>
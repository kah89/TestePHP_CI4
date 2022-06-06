
  <script src="static/js/jquery.js"></script>
 
    <div id="lista_usuarios" class="w3-margin">

      <h4>Cadastro de usuários</h4>

      <div style="display: none;">
        <label>Usuário 1</label>
      </div>

      <div>
        <label>Nome</label>
        <input type="text" class="w3-input w3-block w3-border">
      </div>

      <div>
        <label>Login</label>
        <input type="text" class="w3-input w3-block w3-border">
      </div>

      <div>
        <label>Ativo</label>
        <input type="text" class="w3-input w3-block w3-border">
      </div>

      <ul>
        <li id="opt_cadastrar_clientes"><input type="checkbox" checked value="cadastrar_clientes"> <label>Cadastrar clientes</label></li>
        <li id="opt_excluir_clientes"><input type="checkbox" value="excluir_clientes"> <label>Excluir clientes</label></li>
        <li id="opt_mais"><input type="checkbox" value="mais"> <label>E assim sucessivamente</label></li>
      </ul>

      <button class="w3-button w3-theme w3-margin-top w3-margin-bottom">Gravar</button>
      <button class="w3-button w3-margin-top w3-margin-bottom w3-right">Cancelar</button>

    </div>

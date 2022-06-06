
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }

      th, td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid #ddd;
      }

      tr:nth-child(even) {background-color: #f2f2f2;}
    </style>

    <script src="static/js/jquery.js"></script>
    
      <div id="lista_usuarios" class="w3-margin">
        <input class="w3-input w3-border w3-margin-top" type="text" placeholder="Nome">
        <button class="w3-button w3-theme w3-margin-top">Buscar</button>
        <button class="w3-button w3-theme w3-margin-top w3-right">Cadastrar novo usuário</button>

        <table>
          <thead>
            <tr>
              <th>Nome</td>
              <th>Login</td>
              <th>Ativo</td>
              <th>Opções</td>  
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Maria Moraes</td>
              <td>MARIA</td>
              <td>Sim</td>
              <td>
                <button class="w3-button w3-theme w3-margin-top"><i class="fas fa-user-times"></i></button>
                <button class="w3-button w3-theme w3-margin-top"><i class="fas fa-edit"></i></button>
              </td>
            </tr>

            <tr>
              <td>João da Silva</td>
              <td>JOAO</td>
              <td>Sim</td>
              <td>
                <button class="w3-button w3-theme w3-margin-top"><i class="fas fa-user-times"></i></button>
                <button class="w3-button w3-theme w3-margin-top"><i class="fas fa-edit"></i></button>
              </td>
            </tr>
          </tbody>
        </table>

      </div>
    
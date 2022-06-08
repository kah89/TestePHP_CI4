<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th,
td {
    text-align: left;
    padding: 8px;
    border-bottom: 1px solid #ddd;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

.pesq{
  margin-top: 5%;
  margin-bottom: 5%;
  /* width: 100%; */
}
</style>
<script>
function confirma() {
    if (!confirm("Deseja Excluir?")) {
        return false;
    }
    return true;
}
</script>
<script src="static/js/jquery.js"></script>

<div id="lista_usuarios" class="w3-margin">
    <div class="pesq">
        <a href='./logout'>Sair</a>
        <!-- <form action="busca.php" method="GET"> -->
        <input class="w3-input w3-border w3-margin-top" type="text" placeholder="Nome">
        <button class="w3-button w3-theme w3-margin-top">Buscar</button>
        <!-- </form> -->
        <a href="<?= base_url('user/save'); ?>"><button class="w3-button w3-theme w3-margin-top w3-right">Cadastrar novo usuário</button></a>
    </div>


    <?php if (session()->get('success')) { ?>
    <script>
    $msg = '<?= session()->get('success'); ?>';
    </script>
    <?php } ?>
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
            <?php if(!empty($data) && is_array($data)):?>
            <?php foreach ($data as $user): ?>
            <tr>
                <td><?php echo $user['NOME_COMPLETO'] ?></td>
                <td><?php echo $user['LOGIN'] ?></td>
                <td><?php echo $user['ATIVO'] ?></td>
                <td><a href='/user/delete/<?php echo $user['USUARIO_ID'] ?>' onclick="return confirma()"> <button
                            class="w3-button w3-theme w3-margin-top"><i class="fas fa-user-times"></i></button></a>
                    <button class="w3-button w3-theme w3-margin-top"><i class="fas fa-edit"></i></button>
                </td>
            </tr>
            <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>

</div>
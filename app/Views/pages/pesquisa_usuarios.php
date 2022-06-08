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

.pesq {
    margin-top: 5%;
    margin-bottom: 5%;
    /* width: 100%; */
}

.cad {
    margin-bottom: 5%;
    margin-right: 5%;
}

.fas {
    margin-left: 8px;
}
</style>
<script>
function confirma() {
    if (!confirm("Deseja Excluir?")) {
        return false;
    }
    return true;
}


$(function() {
    $("#myTable input").keyup(function() {
        var index = $(this).parent().index();
        var nth = "#myTable td:nth-child(" + (index + 1).toString() + ")";
        var valor = $(this).val().toUpperCase();
        $("#myTable tbody tr").show();
        $(nth).each(function() {
            if ($(this).text().toUpperCase().indexOf(valor) < 0) {
                $(this).parent().hide();
            }
        });
    });

    $("#myTable input").blur(function() {
        $(this).val("");
    });
});
</script>
<script src="static/js/jquery.js"></script>

<div id="lista_usuarios" class="w3-margin">
    <div class="pesq " id="myPesq">
        <a href='./logout' class=" btn btn-outline-info btn-lg cad"> Sair</a>
        <h1 style="float: right" >
            Lista de usuários
        </h1>
        <a href="<?= base_url('user/save'); ?>" ><button class=" btn btn-success btn-lg cad" >Cadastrar usuário</button></a>
        <a href="<?= \base_url('/user/list')?>" ><button class="   btn btn-success btn-lg cad" >Lista usuário</button></a>



        <form>
            <div class="input-group mb-3">
                <input name="q" type="text" class="form-control form-control-lg" placeholder="Nome">
                <div class="input-group-append">
                    <button class="btn btn-dark btn-lg" type="submit">Buscar</button>
                </div>
            </div>
        </form>
    </div>

    <table id="myTable">
        <thead>
            <tr>
                <th>Nome</td>
                <th>Login</td>
                <th>Ativo</td>
                <th>Opções</td>
            </tr>
            <!-- <tr>
                <th><input type="text" id="txtCol1" placeholder="Pesquisar Nome" /></th>
                <th><input type="text" id="txtCol1" placeholder="Pesquisar Login" /></th>
                <th><input type="text" id="txtCol1" placeholder="Pesquisar Ativo" /></th>
                <th></th>
            </tr> -->
        </thead>
        <tbody>
            <!-- <tr>
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
            </tr> -->
            <?php if(!empty($data) && is_array($data)):?>
            <?php foreach ($data as $user): ?>
            <tr>
                <td><?php echo $user['NOME_COMPLETO'] ?></td>
                <td><?php echo $user['LOGIN'] ?></td>
                <td><?php echo $user['ATIVO'] ?></td>
                <td><a href='./delete/<?php echo $user['USUARIO_ID'] ?>' onclick="return confirma()"><i
                            class="fas fa-user-times" style="color: red"></i></a>

                    <a href='./edit/<?php echo $user['USUARIO_ID'] ?>'><i class="fas fa-edit"
                            style="color: blue"></i></a>
                </td>
            </tr>
            <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>

</div>
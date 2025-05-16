<?php
include 'templates/header.php';
?>
<div class="container mt-4">
    <div class="text-center">
        <a class=" btn btn-primary" id="home-link" href="<?= $BASE_URL ?>criar.php">Criar novo Cadastro</a>
    </div>
    <?php if (isset($printMsg) && $printMsg != ''): ?>
        <P id="msg"><?= $printMsg ?></P>
    <?php endif; ?>
    <h1>Pacientes Cadastrados</h1>
    <?php if (count($pacientes) > 0): ?>
        <table class="table table-bordered table-striped" id="pacientes-table">
            <thead>
                <tr>
                    <th>data chegada</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pacientes as $paciente): ?>
                    <tr>
                        <td scope="row"><?= date("d/m/y", strtotime($paciente['data_chegada'])) ?></td>
                        <td scope="row"><?= $paciente['nome'] ?></td>
                        <td scope="row"><?= $paciente['cpf'] ?></td>
                        <td class="actions">
                            <div class="d-flex flex-column flex-md-row gap-2">
                            <a class="btn edit border border-success" href=" <?= $BASE_URL ?>imprimi.php?id=<?= $paciente['id'] ?>" type="submit">imprimir</a>
                            <a class ="btn edit border border-primary" href=" <?= $BASE_URL ?>edit.php?id=<?= $paciente['id'] ?>" type="submit">editar</a>
                            <form class="d-inline-block" action="<?= $BASE_URL?>/config/processa_formulario.php" method="POST">
                                <input type="hidden" name="type" value="delete">
                                <input type="hidden" name="id" value="<?= $paciente['id']?>">
                                <button class="btn delete border border-danger" type="submit" onclick="return confirm('deseja excluir esse cadastro?')">excluir</button>
                            </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <p id="empty-list-text">ainda não tem pacientes adicionados, clique no botão <a
                        href="<?= $BASE_URL ?>criar.php">"Criar novo Cadastro"</a></p>
            <?php endif; ?>
        
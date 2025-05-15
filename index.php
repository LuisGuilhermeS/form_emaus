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
                            <a class="btn edit bg-warning" href=" <?= $BASE_URL ?>imprimi.php?id=<?= $paciente['id'] ?>" type="submit">imprimir</a>
                            <a class ="btn  edit bg-secondary" href="<?= $BASE_URL?> edit.php?id=<?= $paciente['id'] ?>" type="submit">editar</a>
                            <a class="btn delete bg-danger" type="submit" onclick="return confirm('deseja excluir esse cadastro?')">excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <p id="empty-list-text">ainda não tem pacientes adicionados, clique no botão <a
                        href="<?= $BASE_URL ?>criar.php">"Criar novo Cadastro"</a></p>
            <?php endif; ?>
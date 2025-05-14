<?php
include_once 'config/url.php';
include_once 'config/processa_formulario.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário de Atendimento</title>
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--CSS-->
    <link rel="stylesheet" href="<?= $BASE_URL ?>css/style.css">
</head>

<body class="container py-2 bg-blue-light print-container print">
    <div class="text-center">
        <a class="btn btn-primary d-print-none" href="<?= $BASE_URL ?>index.php">voltar à página inicial</a>
    </div>

    <?php if (isset($paciente['id'])): ?>
        <!--dados pessoais-->
        <hr>
        <h4 class="text-center mb-4">Dados de Identificação</h4>
        <hr>
        <div class="row mb-3">
            <div class="col-md-4 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Nome Completo:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['nome'] ?? '') ?></p>
            </div>

            <div class="col-md-2 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Chegada:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['data_chegada'] ?? '') ?></p>
            </div>

            <div class="col-md-2 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Saída:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['data_saida'] ?? '') ?></p>
            </div>

            <div class="col-md-1 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Pernoite(s):</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['pernoite'] ?? '') ?></p>
            </div>

        </div>
        <div class="row mb-3">
            <div class="col-md-4 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Nome do Pai:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['nome_pai'] ?? '') ?></p>
            </div>

            <div class="col-md-2 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Cartão SUS:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['sus'] ?? '') ?>,</p>
            </div>

            <div class="col-md-2 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0 ">CPF:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['cpf'] ?? '') ?></p>
            </div>

            <div class="col-md-2 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">RG:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['rg'] ?? '') ?></p>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Nome da Mãe:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['nome_mae'] ?? '') ?></p>
            </div>

            <div class="col-md-2 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Idade:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['idade'] ?? '') ?></p>
            </div>

            <div class="col-md-2 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Estado Civil:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['estado_civil'] ?? '') ?></p>
            </div>
            <div class="col-md-2 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Nacionalidade:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['nacionalidade'] ?? '') ?></p>
            </div>

        </div>

        <div class="row mb-3">
            <div class="col-md-4 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Tem Filhos:</label>
                <p class="mb-0">
                    <?= htmlspecialchars($paciente['filhos'] ?? 'não') ?>
                    <?php if (!empty($paciente['qtd_filhos'])): ?>
                        <span class="ms-2 fw-bold">Quantidade:</span>
                        <?= htmlspecialchars($paciente['qtd_filhos']) ?>
                    <?php endif; ?>
                </p>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Data de Nascimento:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['data_nasc'] ?? '') ?></p>
            </div>

        </div>

        <hr>
        <!--procedência-->
        <h4 class="text-center mb-4">Procedência</h4>

        <hr>

        <div class="row mb-3">
            <div class="col-md-4 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Local de Pernoite:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['local_pernoite'] ?? '') ?></p>
            </div>
            <div class="col-md-4 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Local de Procedência:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['local_procedencia'] ?? '') ?></p>
            </div>
            <div class="col-md-4 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Como chegou à instituição:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['chegada'] ?? '') ?></p>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Encaminhamento realizado com documentos:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['encaminhamento_documentos'] ?? '') ?></p>
            </div>
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Tempo em situação de rua:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['tempo_rua'] ?? '') ?></p>
            </div>
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Contato Familiar:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['contato_familia'] ?? '') ?></p>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Motivo da Situação de Rua:</label>
                <p class="mb-0">
                    <?= htmlspecialchars($paciente['motivo_rua'] ?? 'outros') ?>
                    <?php if (!empty($paciente['motivo_rua_outros']) && $paciente['motivo_rua'] === 'outros'): ?>
                        <span class="ms-2 fw-bold">Outros Motivos:</span>
                        <?= htmlspecialchars($paciente['motivo_rua_outros']) ?>
                    <?php endif; ?>
                </p>
            </div>

            <div class="col-md-6 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Motivo da Procura / Encaminhamento:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['motivo_encaminhamento'] ?? '') ?></p>
            </div>
        </div>
        <!--documentos e programas sociais-->
        <hr>
        <h4 class="text-center mb-4">Documentos e Programas Sociais</h4>
        <hr>
        <div class="row mb-3">
            <div class="col-md-6 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Documento físico:</label>
                <p class="mb-0">
                    <?= htmlspecialchars($paciente['documentos'] ?? 'outros') ?>
                    <?php if (!empty($paciente['documentos']) && $paciente['documentos_outros'] === 'outros'): ?>
                        <span class="ms-2 fw-bold">Outros Documentos:</span>
                        <?= htmlspecialchars($paciente['documentos_outros']) ?>
                    <?php endif; ?>
                </p>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Programas sociais ou Transferências de renda:</label>
                <p class="mb-0">
                    <?= htmlspecialchars($paciente['programas_sociais'] ?? 'não') ?>
                    <?php if (!empty($paciente['descricao_programa'])): ?>
                        <span class="ms-2 fw-bold">Tipo:</span>
                        <? htmlspecialchars($paciente['descricao_programa']) ?>
                    <?php endif; ?>
                </p>
            </div>
        </div>
        <hr>
        <!--situação específica-->
        <h4 class="text-center mb-4">Situação Específica</h4>
        <hr>
        <div class="row mb-3">
            <div class="col-md-6 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Condição Atual:</label>
                <p class="mb-0">
                    <?= htmlspecialchars($paciente['condicao_atual'] ?? 'outros') ?>
                    <?php if (!empty($paciente['condicao_atual']) && $paciente['condicao_outros'] === 'outros'): ?>
                        <span class="ms-2 fw-bold">Condição Outros:</span>
                        <?= htmlspecialchars($paciente['condicao_outros']) ?>
                    <?php endif; ?>
                </p>
            </div>

            <div class="col-md-6 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Pertences:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['pertences'] ?? '') ?></p>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Acolhimento institucional, Localidade e Tempo:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['acolhimento_anterior'] ?? '') ?></p>
            </div>

            <div class="col-md-6 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Privação de liberdade:</label>
                <p class="mb-0">
                    <?= htmlspecialchars($paciente['privacao_liberdade'] ?? 'não') ?>
                    <?php if (!empty($paciente['privacao_liberdade']) && !empty($paciente['tempo_privacao'])): ?>
                        <span class="ms-2 fw-bold">localidade:</span>
                        <?= htmlspecialchars($paciente['localidade_privacao']) ?>
                        <span class="ms-2 fwbold">Tempo:</span>
                        <?= htmlspecialchars($paciente['tempo_privacao']) ?>
                    <?php endif; ?>
                </p>
            </div>
        </div>
        <hr>
        <!--estrutura dinamica da instituição-->
        <h4 class="text-center mb-4">Estrutura Dinâmica da Instituição</h4>

        <div class="mb-3">
            <div class="col-md-6 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Relato Histórico:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['relato_historico'] ?? '') ?></p>
            </div>
        </div>
        <hr>
        <h4 class="text-center mb-4">Condições de Saúde do Usuário</h4>
        <hr>
        <div class="row mb-3">
            <div class="col-md-4 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0 "> Uso Medicamentos:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['uso_medicamentos'] ?? 'não') ?>
                    <?php if (!empty($paciente['descricao_medicamentos'])): ?>
                        <span class="ms-2 fw-bold">Tipo:</span>
                        <?= htmlspecialchars($paciente['descricao_medicamentos']) ?>
                    <?php endif; ?>
                </p>
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0 ">Drogas:</label>
                <p class="mb-0">
                    <?= htmlspecialchars($paciente['uso_drogas'] ?? 'não') ?>
                    <?php if (!empty($paciente['descricao_droga'])): ?>
                        <span class="ms-2 fw-bold">Tipo:</span>
                        <?= htmlspecialchars($paciente['descricao_droga']) ?>
                    <?php endif; ?>
                </p>
            </div>
            <div class="col-md-4 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0 "> problema(s) de saúde:</label>
                <p class="mb-0">
                    <?= htmlspecialchars($paciente['problema_saude'] ?? 'não') ?>
                    <?php if (!empty($paciente['descricao_saude'])): ?>
                        <span class="ms-2 fw-bold">Tipo:</span>
                        <?= htmlspecialchars($paciente['descricao_saude']) ?>
                    <?php endif; ?>
                </p>
            </div>
        </div>

        <hr>
        <!--educação projeto vida-->
        <h4 class="text-center mb-4">Educação, Trabalho e Renda</h4>
        <hr>
        <div class="row mb-3">
            <div class="col-md-4 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Trajetória Escolar:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['escolaridade'] ?? '') ?></p>
            </div>


            <div class="col-md-4 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Situação de Trabalho:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['trabalho'] ?? '') ?></p>
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Renda:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['renda'] ?? '') ?></p>
            </div>
        </div>

        <hr>
        <!-- Objetivos de Integração e Projeto de Vida -->
        <h4 class="text-center mb-4">Objetivos de Integração e Projeto de Vida</h4>
        <hr>
        <div class="row mb-3">
            <div class="col-md-6 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Por que deseja ficar e o que espera:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['motivos_procura'] ?? '') ?></p>
            </div>

            <div class="col-md-6 d-flex align-items-center">
                <label class="form-label fw-bold me-2 mb-0">Projeto de vida:</label>
                <p class="mb-0"><?= htmlspecialchars($paciente['projeto_vida'] ?? '') ?></p>
            </div>
        </div>
        <hr>
    <?php endif; ?>
    <div class="text-center">
        <button class="btn btn-success d-print-none" onclick="imprimirPagina()">Imprimir</button>
    </div>
    <script>
        function imprimirPagina() {
  window.print();
}
    </script>
</body>

</html>
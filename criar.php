<?php
include_once 'templates/header.php';
?>
<div class="print-container">
  <div class="text-center">
    <a class=" btn btn-primary" id="home-link" href="<?= $BASE_URL?>index.php">Página Inicial</a>
  </div>

  <!-- Formulário principal -->
  <form method="POST" action="<?= $BASE_URL ?>config/processa_formulario.php" enctype="multipart/form-data">
    <input type="hidden" name="type" value="criar">

    <!-- Datas -->
    <div class="row mb-3">
      <div class="col-md-4">
        <label class="form-label">Data de Chegada</label>
        <input type="date" name="data_chegada" id="data_chegada" onchange="calcularPernoite()" class="form-control"
          value="<?= htmlspecialchars($pacientes['data_chegada'] ?? '') ?>" required>
      </div>
      <div class="col-md-4">
        <label class="form-label">Data de Saída</label>
        <input type="date" name="data_saida" id="data_saida" onchange="calcularPernoite()" class="form-control"
          value="<?= htmlspecialchars($pacientes['data_saida'] ?? '') ?>" required>
      </div>
      <div class="col-md-4">
        <label class="form-label">Pernoite(s)</label>
        <input type="text" name="pernoite" id="pernoite" readonly class="form-control"
          value="<?= htmlspecialchars($pacientes['pernoite'] ?? '') ?>">
      </div>
    </div>

    <hr>

    <!-- Dados de Identificação -->
    <h4 class="text-center mb-4">Dados de Identificação</h4>

<div class="row mb-3">
  <div class="col-md-4"></div>
    <div class="col-md-4 text-center">
    <?php
      // Define caminho da imagem (padrão se vazio)
      $image = !empty($paciente['image']) ? $pacientes['image'] : 'image.jpg';
      $fotoPath = 'config/uploads/' . $image;
    ?>
    <!-- Contêiner da imagem -->
    <div id="profile-image-container"
         style="width: 150px; height: 150px; background-image: url('<?= $fotoPath ?>'); background-size: cover; background-position: center; border-radius: 10px; margin: auto;">
    </div>
    <div class="mt-2">
      <label for="image" class="form-label">Foto do Paciente (opcional)</label>
      <input type="file" name="image" id="image" class="form-control" accept=".jpg,.jpeg,.png">
    </div>
  </div>

  <div class="col-md-4"></div>
</div>

  <div class="row mb-3">
      <div class="col-md-6">
      <label class="form-label">Nome Completo</label>
      <input type="text" name="nome" id="nome" class="form-control" value="<?= htmlspecialchars($pacientes['nome'] ?? '') ?>" required>
      </div>

    <div class="col-md-6">
    <label class="form-label">Nacionalidade</label>
    <input type="text" name="nacionalidade" id="nacionalidade" class="form-control"
      value="<?= htmlspecialchars($pacientes['nacionalidade'] ?? '') ?>">
    </div>
  </div>

<div class="row mb-3">
  <div class="col-md-3">
    <label for="data_nasc" class="form-label">Data de Nascimento</label>
    <input type="date" class="form-control" id="data_nasc" name="data_nasc"
      value="<?= htmlspecialchars($pacientes['data_nasc'] ?? '') ?>">
  </div>

  <div class="col-md-3">
    <label for="idade" class="form-label">Idade</label>
    <input type="number" class="form-control" id="idade" name="idade"
      value="<?= htmlspecialchars($pacientes['idade'] ?? '') ?>">
  </div>

  <div class="col-md-2">
    <label class="form-label">Cartão SUS</label>
    <input type="text" name="sus" id="sus" class="form-control" value="<?= htmlspecialchars($pacientes['sus'] ?? '') ?>">
  </div>

  <div class="col-md-2">
    <label class="form-label">CPF</label>
    <input type="text" name="cpf" id="cpf" class="form-control" value="<?= htmlspecialchars($pacientes['cpf'] ?? '') ?>">
  </div>
  <div class="col-md-2">
    <label class="form-label">RG</label>
    <input type="text" name="rg" class="form-control" value="<?= htmlspecialchars($pacientes['rg'] ?? '') ?>">
  </div>
</div>

<div class="row mb-3">
  <div class="col-md-6">
    <label class="form-label">Nome do Pai</label>
    <input type="text" name="nome_pai" class="form-control" value="<?= htmlspecialchars($pacientes['nome_pai'] ?? '') ?>">
  </div>
  <div class="col-md-6">
    <label class="form-label">Nome da Mãe</label>
    <input type="text" name="nome_mae" class="form-control" value="<?= htmlspecialchars($pacientes['nome_mae'] ?? '') ?>">
  </div>
</div>

<div class="row mb-3">
  <div class="col-md-6">
    <label class="form-label">Estado Civil</label>
    <select name="estado_civil" class="form-select">
      <option value="">Selecione</option>
      <option value="casado" <?= ($pacientes['estado_civil'] ?? '') === 'casado' ? 'selected' : '' ?>>Casado(a)</option>
      <option value="solteiro" <?= ($pacientes['estado_civil'] ?? '') === 'solteiro' ? 'selected' : '' ?>>Solteiro(a)
      </option>
      <option value="divorciado" <?= ($pacientes['estado_civil'] ?? '') === 'divorciado' ? 'selected' : '' ?>>Divorciado(a)
      </option>
      <option value="viuvo" <?= ($pacientes['estado_civil'] ?? '') === 'viuvo' ? 'selected' : '' ?>>Viúvo(a)</option>
      <option value="separado" <?= ($pacientes['estado_civil'] ?? '') === 'separado' ? 'selected' : '' ?>>Separado(a)
      </option>
    </select>
  </div>

  <div class="col-md-6">
    <label class="form-label">Tem Filhos?</label>
    <select name="filhos" id="filhos" class="form-select" onchange="mostrarCampoFilhos()">
      <option value="">Selecione</option>
      <option value="sim" <?= ($pacientes['filhos'] ?? '') === 'sim' ? 'selected' : '' ?>>Sim</option>
      <option value="não" <?= ($pacientes['filhos'] ?? '') === 'não' ? 'selected' : '' ?>>Não</option>
    </select>
    <div id="campo_filhos" class="mt-2" style="display:none;">
      <input type="text" name="qtd_filhos" id="qtd_filhos" class="form-control" placeholder="quantidade de filhos"
        value="<?= htmlspecialchars($pacientes['qtd_filhos'] ?? '') ?>">
      </div>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-6">
      <label for="arquivo" class="form-label">Anexar Documentos, RG ou CPF (PDF ou imagem):</label>
        <input type="file" name="arquivo" id="arquivo" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
    </div>
  <div class="col-md-6">
    <label for="document" class="form-label">Anexar arquivo,Cartão SUS ou outro (pdf ou imagem):</label>
    <input type="file" name="document" id="document" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
  </div>
  </div>

<script>
  document.getElementById('data_nasc').addEventListener('change', function () {
    const data_nasc = new Date(this.value);
    const today = new Date();
    let idade = today.getFullYear() - data_nasc.getFullYear();
    const monthDiff = today.getMonth() - data_nasc.getMonth();

    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < data_nasc.getDate())) {
      idade--;
    }

    document.getElementById('idade').value = idade;
  });

  function mostrarCampoFilhos() {
    const select = document.getElementById("filhos");
    const campo = document.getElementById("campo_filhos");
    if (select.value === "sim") {
      campo.style.display = "block";
    } else {
      campo.style.display = "none";
      campo.value = "";
    }
  }

  document.addEventListener("DOMContentLoaded", function () {
    mostrarCampoFilhos();
  });
</script>

    <hr>

    <!-- Procedência -->
    <h4 class="text-center mb-4">Procedência</h4>
    <div class="row mb-3">
  <div class="col-md-6">
    <label class="form-label">Local de Pernoite</label>
    <input type="text" name="local_pernoite" id="local_pernoite" class="form-control"
      value="<?= htmlspecialchars($pacientes['local_pernoite'] ?? '') ?>">
  </div>
  <div class="col-md-6">
    <label class="form-label">Local de Procedência</label>
    <input type="text" name="local_procedencia" id="local_procedencia" class="form-control" placeholder="digite aqui..."
      value="<?= htmlspecialchars($pacientes['local_procedencia'] ?? '') ?>">
  </div>
</div>

<div class="row mb-3">
  <div class="col-md-6">
    <label class="form-label">Como chegou à instituição</label>
    <input type="text" id="chegada" name="chegada" class="form-control" placeholder="Rede socioassistencial..." rows="2"
      value="<?= htmlspecialchars($pacientes['chegada'] ?? '') ?>">
  </div>

  <div class="col-md-6">
    <label class="form-label">Encaminhamento realizado com documentos</label>
    <input type="text" id="encaminhamento_documentos" name="encaminhamento_documentos" class="form-control" placeholder="Descreva"
      value="<?= htmlspecialchars($pacientes['encaminhamento_documentos'] ?? '') ?>">
  </div>
</div>

<div class="row mb-3">
<div class="col-md-6">
    <label class="form-label">Tem contato com a família?</label>
    <input type="text" name="contato_familia"id="contato_familia" class="form-control" placeholder="sim, (12)997001122"
      value="<?= htmlspecialchars($pacientes['contato_familia'] ?? '') ?>">
  </div>
  <div class="col-md-6">
    <label class="form-label">Há quanto tempo em situação de rua?</label>
    <input type="text" name="tempo_rua" id="tempo_rua" class="form-control" value="<?= htmlspecialchars($pacientes['tempo_rua'] ?? '') ?>">
  </div>
</div>

<div class="row mb-3">
  <div class="col-md-6">
    <label class="form-label col-mb-6">Motivo da Situação de Rua</label>
    <select id="motivo_rua" name="motivo_rua" class="form-select"
      onchange="mostrarOutro('motivo_rua', 'motivo_rua_outros')">
      <option value="">Selecione</option>
      <option value="uso quimico"<?= ($pacientes['motivo_rua'] ?? '') === 'uso quimico' ? 'selected' : '' ?> >Uso de
        Substâncias Químicas</option>
      <option value="uso alcool"<?= ($pacientes['motivo_rua'] ?? '') === 'uso alcool' ? 'selected' : '' ?> >Uso de Álcool
      </option>
      <option value="perda emprego"<?= ($pacientes['motivo_rua'] ?? '') === 'perda emprego' ? 'selected' : '' ?> >Perda
        do Emprego</option>
      <option value="desilusao"<?= ($pacientes['motivo_rua'] ?? '') === 'desilusao' ? 'selected' : '' ?> >Desilusão</option>
      <option value="dificuldade convivio"<?= ($pacientes['motivo_rua'] ?? '') === 'dificuldade convivio' ? 'selected' : '' ?>
        >Dificuldade de Convivência</option>
      <option value="outros"<?= ($pacientes['motivo_rua'] ?? '') === 'outros' ? 'selected' : '' ?> >Outros</option>
    </select>
    <input type="text" id="motivo_rua_outros" name="motivo_rua_outros" class="form-control mt-2"
      placeholder="Descreva o motivo específico" style="display:none;"
      value="<?= htmlspecialchars($pacientes['motivo_rua_outros'] ?? '') ?>">
  </div>

  <div class="col-md-6">
    <label class="form-label">Motivo da Procura / Encaminhamento</label>
    <input type="text" name="motivo_encaminhamento" id="motivo_encaminhamento" class="form-control"
      value="<?= htmlspecialchars($pacientes['motivo_encaminhamento'] ?? '') ?>">
  </div>
</div>

<script>
  function mostrarOutro(selectId, inputId) {
    const select = document.getElementById(selectId);
    const input = document.getElementById(inputId);
    if (select.value === 'outros') {
      input.style.display = 'block';
    } else {
      input.style.display = 'none';
      input.value = '';
    }
  }

  document.addEventListener('DOMContentLoaded', function () {
    mostrarOutro('motivo_rua', 'motivo_rua_outros');
  });
</script>

    <hr>

    <!-- documentos e programas sociais/Situação Específica/estrutura dinâmica -->
    <h4 class="text-center mb-4">Documentos e Programas Sociais</h4>

<div class="row mb-3">
  <div class="col-md-6">
    <label class="form-label">Possui algum documento físico?</label>
    <select id="documentos" name="documentos" class="form-select" onchange="mostrarOutroDocumento()">
      <option value="">Selecione</option>
      <option value="nenhum" <?= ($pacientes['documentos']??'') === 'nenhum' ? 'selected' : '' ?>>Nenhum</option>
      <option value="rg" <?= ($pacientes['documentos']??'') === 'rg' ? 'selected' : '' ?>>RG</option>
      <option value="cpf" <?= ($pacientes['documentos']??'') === 'cpf' ? 'selected' : '' ?>>CPF</option>
      <option value="ctd" <?= ($pacientes['documentos']??'') === 'ctd' ? 'selected' : '' ?>>Carteira de Trabalho Digital</option>
      <option value="titulo_eleitoral" <?= ($pacientes['documentos']??'') === 'titulo_eleitoral' ? 'selected' : '' ?>>Título Eleitoral</option>
      <option value="reservista" <?= ($pacientes['documentos']??'') === 'reservista' ? 'selected' : '' ?>>Reservista</option>
      <option value="ctps" <?= ($pacientes['documentos']??'') === 'ctps' ? 'selected' : '' ?>>Carteira de Trabalho e Previdência Social (CTPS)</option>
      <option value="laudo" <?= ($pacientes['documentos']??'') === 'laudo' ? 'selected' : '' ?>>Laudos Médicos / Exames</option>
      <option value="outros" <?= ($pacientes['documentos']??'') === 'outros' ? 'selected' : '' ?>>Outros</option>
    </select>

    <input type="text" id="documentos_outros" name="documentos_outros" class="form-control mt-2"
      placeholder="Descreva aqui" style="<?= ($pacientes['documentos'] ?? '') === 'outros' ? 'display: block;' : 'display: none;' ?>"
      value="<?= htmlspecialchars($pacientes['documentos_outros'] ?? '') ?>">
  </div>

  <div class="col-md-6">
    <label class="form-label">Participa de programas sociais ou de transferências de renda?</label>
    <select id="programas_sociais" name="programas_sociais" class="form-select" onchange="mostrarDescricaoPrograma()">
      <option value="">Selecione</option>
      <option value="sim" <?= ($pacientes['programas_sociais']??'') === 'sim' ? 'selected' : '' ?>>Sim</option>
      <option value="não" <?= ($pacientes['programas_sociais']??'') === 'não' ? 'selected' : '' ?>>Não</option>
    </select>

    <input type="text" id="descricao_programa" name="descricao_programa" class="form-control mt-2"
      placeholder="Descreva os programas sociais" style="<?= ($pacientes['programas_sociais'] ?? '') === 'sim' ? 'display: block;' : 'display: none;' ?>"
      value="<?= htmlspecialchars($pacientes['descricao_programa'] ?? '') ?>">
  </div>
</div>
<hr>

<!--situação específica-->
<h4 class="text-center mb-4">Situação Específica</h4>
<div class="row mb-3">
  <div class="col-md-6">
    <label class="form-label">Condição Atual</label>
    <select id="condicao_atual" name="condicao_atual" class="form-select"
      onchange="mostrarOutro('condicao_atual', 'condicao_outros')">
      <option value="">Selecione</option>
      <option value="morador de rua" <?= ($pacientes['condicao_atual'] ?? '') === 'morador de rua' ? 'selected' : '' ?>>Morador
        de Rua</option>
      <option value="acolhido em abrigo" <?= ($pacientes['condicao_atual'] ?? '') === 'acolhido em abrigo' ? 'selected' : '' ?>>Acolhido em Abrigo</option>
      <option value="saida da rua" <?= ($pacientes['condicao_atual'] ?? '') === 'saida de rua' ? 'selected' : '' ?>>Em Processo
        de Saída da Rua</option>
      <option value="outros" <?= ($pacientes['condicao_atual'] ?? '') === 'outros' ? 'selected' : '' ?>>Outros</option>
    </select>
    <input type="text" id="condicao_outros" name="condicao_outros" class="form-control mt-2" placeholder="Descreva"
      style="display: none;" value="<?= htmlspecialchars($pacientes['condicao_outros'] ?? '') ?>">
  </div>

  <div class="col-md-6">
    <label class="form-label">O que trouxe de pertences?</label>
    <input type="text" id="pertences" name="pertences" class="form-control"
      placeholder="Ex: roupas, documentos, objetos pessoais..." value="<?= htmlspecialchars($pacientes['pertences'] ?? '') ?>">
  </div>
</div>

<div class="row mb-3">
  <div class="col-md-6">
    <label class="form-label">Já passou por acolhimento institucional? Qual localidade e tempo?</label>
    <input type="text" name="acolhimento_anterior" id="acolhimento_anterior" class="form-control" placeholder="Descreva"
      value="<?= htmlspecialchars($pacientes['acolhimento_anterior'] ?? '') ?>">
  </div>

  <div class="col-md-6">
    <label class="form-label">Já esteve em privação de liberdade?</label>
    <select id="privacao_liberdade" name="privacao_liberdade" class="form-select" onchange="mostrarCamposPrivacao()">
      <option value="">Selecione</option>
      <option value="sim" <?= ($pacientes['privacao_liberdade'] ?? '') === 'sim' ? 'selected' : '' ?>>Sim</option>
      <option value="não" <?= ($pacientes['privacao_liberdade'] ?? '') === 'não' ? 'selected' : '' ?>>Não</option>
    </select>
  </div>
</div>

<div class="row mb-3" id="campos_privacao" style="display: none;">
  <div class="col-md-6">
    <label class="form-label">Localidade da Privação</label>
    <input type="text" id="localidade_privacao" name="localidade_privacao" class="form-control"
      placeholder="Digite a localidade" value="<?= htmlspecialchars($pacientes['localidade_privacao']??'') ?>">
  </div>

  <div class="col-md-6">
    <label class="form-label">Tempo de Privação</label>
    <input type="text" id="tempo_privacao" name="tempo_privacao" class="form-control" placeholder="Digite o tempo"
      value="<?= htmlspecialchars($pacientes['tempo_privacao']??'') ?>">
  </div>
</div>

<hr>
<!--estrutura dinamica da instituição-->

<h4 class="text-center mb-4">Estrutura Dinâmica da Instituição</h4>

<div class="mb-3">
  <label class="form-label">Relato Histórico</label>
  <textarea name="relato_historico" placeholder="Fluxo migratório, tempo em situação de rua e motivos..."
    class="form-control"><?= htmlspecialchars($pacientes['relato_historico'] ?? '') ?></textarea>
</div>


<script>
  
  function mostrarOutroDocumento() {
    var selectDocumento = document.getElementById("documentos");
    var inputOutro = document.getElementById("documentos_outros");

    if (selectDocumento.value === "outros") {
      inputOutro.style.display = "block";
    } else {
      inputOutro.style.display = "none";
      inputOutro.value = "";
    }
  }

  function mostrarDescricaoPrograma() {
    var selectPrograma = document.getElementById("programas_sociais");
    var inputDescricao = document.getElementById("descricao_programa");

    if (selectPrograma.value === "sim") {
      inputDescricao.style.display = "block";
    } else {
      inputDescricao.style.display = "none";
      inputDescricao.value = "";
    }
  }

  document.addEventListener("DOMContentLoaded", function () {
    mostrarOutroDocumento();
    mostrarDescricaoPrograma();
  });




  function mostrarOutro(selectId, inputId) {
    var select = document.getElementById(selectId);
    var input = document.getElementById(inputId);

    if (select.value === "outros") {
      input.style.display = "block";
    } else {
      input.style.display = "none";
      input.value = "";
    }
  }

  function mostrarCamposPrivacao() {
    var selectPrivacao = document.getElementById("privacao_liberdade");
    var campos = document.getElementById("campos_privacao");

    if (selectPrivacao.value === "sim") {
      campos.style.display = "block"; // ou "block" se quiser um abaixo do outro
    } else {
      campos.style.display = "none";
      document.getElementById("localidade_privacao").value = "";
      document.getElementById("tempo_privacao").value = "";
    }
  }

  document.addEventListener("DOMContentLoaded", function () {
    mostrarOutro('condicao_atual', 'condicao_outros');
    mostrarCamposPrivacao();

  });
</script>

    <hr>
    <!-- Condições de Saúde do Usuário/Educação, Trabalho e Renda/integração e projeto vida -->
    <h4 class="text-center mb-4">Condições de Saúde do Usuário</h4>
<div class="row mb-3">
  <div class="col-md-4">
    <label class="form-label">Faz uso de medicamentos?</label>
    <select id="uso_medicamentos" name="uso_medicamentos" class="form-select" onchange="mostrarUsoMedicamentos()">
      <option value="">Selecione</option>
      <option value="sim" <?= ($pacientes['uso_medicamentos'] ?? '') === 'sim' ? 'selected' : '' ?>>Sim</option>
      <option value="não" <?= ($pacientes['uso_medicamentos'] ?? '') === 'não' ? 'selected' : '' ?>>Não</option>
    </select>
    <div id="campo_medicamentos" style="display: none;" class="mt-2">
      <input type="text" id="descricao_medicamentos" name="descricao_medicamentos" class="form-control"
        placeholder="Quais medicamentos?" value="<?= htmlspecialchars($pacientes['descricao_medicamentos']??'') ?>">
    </div>
  </div>

  <div class="col-md-4">
    <label class="form-label">Fez/Faz uso de drogas?</label>
    <select id="uso_drogas" name="uso_drogas" class="form-select" onchange="mostrarUsoDrogas()">
      <option value="">Selecione</option>
      <option value="sim" <?= ($pacientes['uso_drogas']??'') === 'sim' ? 'selected' : '' ?>>Sim</option>
      <option value="não" <?= ($pacientes['uso_drogas']??'') === 'não' ? 'selected' : '' ?>>Não</option>
    </select>
    <div id="campo_drogas" style="display: none;" class="mt-2">
      <input type="text" id="descricao_droga" name="descricao_droga" class="form-control"
        value="<?= htmlspecialchars($pacientes['descricao_droga']??'') ?>" placeholder="Quais drogas?">
    </div>
  </div>

  <div class="col-md-4">
    <label class="form-label">Possui problema(s) de saúde?</label>
    <select id="problema_saude" name="problema_saude" class="form-select" onchange="mostrarProblemaSaude()">
      <option value="">Selecione</option>
      <option value="sim" <?= ($pacientes['problema_saude']??'') === 'sim' ? 'selected' : '' ?>>Sim</option>
      <option value="não" <?= ($pacientes['problema_saude']??'') === 'não' ? 'selected' : '' ?>>Não</option>
    </select>
    <div class="mt-2" id="campo_saude" style="display: none;">
      <input type="text" id="descricao_saude" name="descricao_saude" class="form-control"
        value="<?= htmlspecialchars($pacientes['descricao_saude']??'') ?>" placeholder="Descreva o problema de saúde">
    </div>
  </div>
</div>

<hr>
<!--educação projeto vida-->
<h4 class="text-center mb-4">Educação, Trabalho e Renda</h4>
<div class="row mb-3">
  <div class="col-md-4">
    <label class="form-label">Trajetória Escolar</label>
    <input type="text" id="escolaridade" name="escolaridade" class="form-control"
      placeholder="Ex: Ensino Fundamental incompleto..." value="<?= htmlspecialchars($pacientes['escolaridade'] ?? '') ?>">
  </div>


  <div class="col-md-4">
    <label class="form-label">Situação de Trabalho</label>
    <input type="text" id="trabalho" name="trabalho" class="form-control" placeholder="Descreva "
      value="<?= htmlspecialchars($pacientes['trabalho'] ?? '') ?>">
  </div>

  <div class="col-md-4">
    <label class="form-label">Possui Renda?</label>
    <input type="text" name="renda" id="renda" class="form-control" placeholder="sim, 600 R$ mês / ou auxílio do governo"
      value="<?= htmlspecialchars($pacientes['renda'] ?? '') ?>">
  </div>
</div>

<hr>

    <!-- Objetivos de Integração e Projeto de Vida -->
    <h4 class="text-center mb-4">Objetivos de Integração e Projeto de Vida</h4>

<div class="mb-3">
  <label class="form-label">por que deseja ficar na instituição e o que espera?</label>
  <textarea name="motivos_procura" id="motivos_procura" class="form-control" rows="3"><?= htmlspecialchars($pacientes['motivos_procura'] ?? '') ?></textarea>
</div>

<div class="mb-3">
  <label class="form-label">Qual projeto de vida?</label>
  <textarea name="projeto_vida" id="projeto_vida" class="form-control" rows="3"><?= htmlspecialchars($pacientes['projeto_vida'] ?? '') ?></textarea>
</div>
<div class="mb-3">
  <label class="form-label">Qual atividade paciente desenvolveu na comunidade?</label>
  <textarea name="atividade" id="atividade" class="form-control" rows="3"><?= htmlspecialchars($pacientes['atividade'] ?? '') ?></textarea>
</div>
<hr>
<script>
  function mostrarUsoMedicamentos() {
    const select = document.getElementById("uso_medicamentos");
    const campo = document.getElementById("campo_medicamentos");
    campo.style.display = select.value === "sim" ? "block" : "none";
    if (select.value !== "sim") {
      document.getElementById("descricao_medicamentos").value = "";
    }
  }

  function mostrarUsoDrogas() {
    const select = document.getElementById("uso_drogas");
    const campo = document.getElementById("campo_drogas");
    campo.style.display = select.value === "sim" ? "block" : "none";
    if (select.value !== "sim") {
      document.getElementById("descricao_drogas").value = "";
    }
  }

  function mostrarProblemaSaude() {
    const select = document.getElementById("problema_saude");
    const campo = document.getElementById("campo_saude");
    campo.style.display = select.value === "sim" ? "block" : "none";
    if (select.value !== "sim") {
      document.getElementById("descricao_saude").value = "";
    }
  }

  // Um único DOMContentLoaded para chamar tudo
  document.addEventListener("DOMContentLoaded", function () {
    mostrarUsoMedicamentos();
    mostrarUsoDrogas();
    mostrarProblemaSaude();
  });
</script>

    
    <!-- Botões -->
    <div class="text-center mt-4">
      <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>

  </form>
</div>
</body>

</html>
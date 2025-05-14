<?php
$id = $_POST['id'] ?? '';

// Campos que serão usados no banco
$campos = [
    'data_chegada', 'data_saida', 'pernoite',
    'nome', 'nacionalidade', 'data_nasc', 'idade', 'sus', 'cpf', 'rg','nome_pai', 'nome_mae', 'estado_civil', 'filhos', 'qtd_filhos',
    'local_pernoite', 'local_procedencia', 'chegada', 'encaminhamento_documentos','contato_familia',
    'tempo_rua', 'motivo_rua', 'motivo_rua_outros','motivo_encaminhamento',
    'documentos', 'documentos_outros', 'programas_sociais','descricao_programa',
    'condicao_atual','condicao_outros','pertences','acolhimento_anterior',
    'privacao_liberdade', 'localidade_privacao', 'tempo_privacao',
    'relato_historico',
    'uso_medicamentos', 'descricao_medicamentos',
    'uso_drogas', 'descricao_droga',
    'problema_saude', 'descricao_saude',
    'escolaridade', 'trabalho', 'renda',
    'motivos_procura', 'projeto_vida'
];

// Captura os dados do formulário
foreach ($campos as $campo) {
    $$campo = $_POST[$campo] ?? '';
}

// Monta array de valores
$valores = [];
foreach ($campos as $campo) {
    $valores[] = $$campo;
}

try {
    if ($id) {
        // UPDATE
        $setters = implode(' = ?, ', $campos) . ' = ?';
        $sql = "UPDATE pacientes SET $setters WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $valores[] = $id;
        $stmt->execute($valores);
        echo "Dados atualizados com sucesso.";
    } else {
        // Verifica duplicidade por CPF + data de nascimento
        $verifica = $conn->prepare("SELECT * FROM pacientes WHERE cpf = ?");
        $verifica->execute([$cpf]);

        if ($verifica->rowCount() > 0) {
            $pacienteExistente = $verifica->fetch(PDO::FETCH_ASSOC);
            $_SESSION['paciente_existente'] = $pacienteExistente;

            // Redireciona para index.php com flag
            header("Location: index.php?duplicado=1");
            exit;
        } else {
            // INSERT
            $placeholders = rtrim(str_repeat('?,', count($campos)), ',');
            $sql = "INSERT INTO pacientes (" . implode(',', $campos) . ") VALUES ($placeholders)";
            $stmt = $conn->prepare($sql);
            $stmt->execute($valores);
        
            echo "<div class='alert alert-success'>Dados salvos com sucesso. Redirecionando para a página inicial...</div>";
            echo "<script>
                    setTimeout(function() {
                        window.location.href = '" . $BASE_URL . "form.php';
                    }, 5000);
                  </script>";
        }
        
    }
} catch (PDOException $e) {
    echo "Erro ao salvar no banco: " . $e->getMessage();
}
?>




$data_chegada, $data_saida, $pernoite,
    $nome, $nacionalidade, $data_nasc, $idade, $sus, $cpf, $rg,$nome_pai, $nome_mae, $estado_civil, $filhos, $qtd_filhos,
    $local_pernoite, $local_procedencia, $chegada, $encaminhamento_documentos,$contato_familia,
    $tempo_rua, $motivo_rua,$motivo_rua_outros,$motivo_encaminhamento,
    $documentos, $documentos_outros, $programas_sociais,$descricao_programa,
    $condicao_atual,$condicao_outros,$pertences,$acolhimento_anterior,
    $privacao_liberdade, $localidade_privacao, $tempo_privacao,
    $relato_historico,
    $uso_medicamentos, $descricao_medicamentos,
    $uso_drogas, $descricao_droga,
    $problema_saude, $descricao_saude,
    $escolaridade, $trabalho, $renda,
    $motivos_procura, $projeto_vida


//doc_sit_est.php
    <?php
$condicao_atual = $dados['condicao_atual'] ?? '';
$condicao_outros = $dados['condicao_outros'] ?? '';
$pertences = $dados['pertences'] ?? '';
$acolhimento_anterior = $dados['acolhimento_anterior'] ?? '';
$privacao_liberdade = $dados['privacao_liberdade'] ?? '';
$localidade_privacao = $dados['localidade_privacao'] ?? '';
$tempo_privacao = $dados['tempo_privacao'] ?? '';
$relato_historico = $dados['relato_historico'] ?? '';
$documentos = $dados['documentos'] ?? '';
$documentos_outros = $dados['documentos_outros'] ?? '';
$programas_sociais = $dados['programas_sociais'] ?? '';
$descricao_programa = $dados['descricao_programa'] ?? '';
?>
//identificacao
<?php
$nome = $dados['nome'] ?? '';
$nacionalidade = $dados['nacionalidade'] ?? '';
$data_nasc = $dados['data_nasc'] ?? '';
$idade = $dados['idade'] ?? '';
$sus = $dados['sus'] ?? '';
$cpf = $dados['cpf'] ?? '';
$rg = $dados['rg'] ?? '';
$nome_pai = $dados['nome_pai'] ?? '';
$nome_mae = $dados['nome_mae'] ?? '';
$estado_civil = $dados['estado_civil'] ?? '';
$filhos = $dados['filhos'] ?? '';
$qtd_filhos = $dados['qtd_filhos'] ?? '';
?>
//procedencia
<?php
$local_pernoite = $dados['local_pernoite'] ?? '';
$local_procedencia = $dados['local_procedencia'] ?? '';
$chegada = $dados['chegada'] ?? '';
$encaminhamento_documentos = $dados['encaminhamento_documentos'] ?? '';
$contato_familia = $dados['contato_familia'] ?? '';
$tempo_rua = $dados['tempo_rua'] ?? '';
$motivo_rua = $dados['motivo_rua'] ?? '';
$motivo_rua_outros = $dados['motivo_rua_outros'] ?? '';
$motivos_encaminhamento = $dados['motivo_encaminhamento'] ?? '';
?>
//saude_ed_pjt
<?php
$uso_medicamentos = $dados['uso_medicamentos'] ?? '';
$descricao_medicamentos = $dados['descricao_medicamentos'] ?? '';
$uso_drogas = $dados['uso_drogas'] ?? '';
$descricao_droga = $dados['descricao_droga'] ?? '';
$problema_saude = $dados['problema_saude'] ?? '';
$descricao_saude = $dados['descricao_saude'] ?? '';
$escolaridade = $dados['escolaridade'] ?? '';
$trabalho = $dados['trabalho'] ?? '';
$renda = $dados['renda'] ?? '';
$motivos_procura = $dados['motivos_procura'] ?? '';
$projeto_vida = $dados['projeto_vida'] ?? '';

?>

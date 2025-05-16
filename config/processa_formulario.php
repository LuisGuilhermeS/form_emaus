<?php
session_start();
include 'conexao.php';
include 'url.php';

$dados = $_POST;

//modificações de banco
if (!empty($dados)) {

    //criar contatos
    if ($dados['type'] === 'criar') {

        $data_chegada = $dados['data_chegada'];
        $data_saida = $dados['data_saida'];
        $pernoite = $dados['pernoite'];
        $nome = $dados['nome'];
        $nacionalidade = $dados['nacionalidade'];
        $data_nasc = $dados['data_nasc'];
        $idade = $dados['idade'];
        $sus = $dados['sus'];
        $cpf = $dados['cpf'];
        $rg = $dados['rg'];
        $nome_pai = $dados['nome_pai'];
        $nome_mae = $dados['nome_mae'];
        $estado_civil = $dados['estado_civil'];
        $filhos = $dados['filhos'];
        $qtd_filhos = $dados['qtd_filhos'];
        $local_pernoite = $dados['local_pernoite'];
        $local_procedencia = $dados['local_procedencia'];
        $chegada = $dados['chegada'];
        $encaminhamento_documentos = $dados['encaminhamento_documentos'];
        $contato_familia = $dados['contato_familia'];
        $tempo_rua = $dados['tempo_rua'];
        $motivo_rua = $dados['motivo_rua'];
        $motivo_rua_outros = $dados['motivo_rua_outros'];
        $motivos_encaminhamento = $dados['motivo_encaminhamento'];
        $documentos = $dados['documentos'];
        $documentos_outros = $dados['documentos_outros'];
        $programas_sociais = $dados['programas_sociais'];
        $descricao_programa = $dados['descricao_programa'];
        $condicao_atual = $dados['condicao_atual'];
        $condicao_outros = $dados['condicao_outros'];
        $pertences = $dados['pertences'];
        $acolhimento_anterior = $dados['acolhimento_anterior'];
        $privacao_liberdade = $dados['privacao_liberdade'];
        $localidade_privacao = $dados['localidade_privacao'];
        $tempo_privacao = $dados['tempo_privacao'];
        $relato_historico = $dados['relato_historico'];
        $uso_medicamentos = $dados['uso_medicamentos'];
        $descricao_medicamentos = $dados['descricao_medicamentos'];
        $uso_drogas = $dados['uso_drogas'];
        $descricao_droga = $dados['descricao_droga'];
        $problema_saude = $dados['problema_saude'];
        $descricao_saude = $dados['descricao_saude'];
        $escolaridade = $dados['escolaridade'];
        $trabalho = $dados['trabalho'];
        $renda = $dados['renda'];
        $motivos_procura = $dados['motivos_procura'];
        $projeto_vida = $dados['projeto_vida'];

        $query = 'INSERT INTO pacientes (data_chegada, data_saida, pernoite,
        nome, nacionalidade, data_nasc, idade, sus, cpf, rg,nome_pai, nome_mae, estado_civil, filhos, qtd_filhos,
        local_pernoite, local_procedencia, chegada, encaminhamento_documentos,contato_familia,
        tempo_rua, motivo_rua,motivo_rua_outros,motivo_encaminhamento,
        documentos, documentos_outros, programas_sociais,descricao_programa,
        condicao_atual,condicao_outros,pertences,acolhimento_anterior,
        privacao_liberdade, localidade_privacao, tempo_privacao,
        relato_historico,
        uso_medicamentos, descricao_medicamentos,
        uso_drogas, descricao_droga,
        problema_saude, descricao_saude,
        escolaridade, trabalho, renda,
        motivos_procura, projeto_vida)

        VALUES (:data_chegada, :data_saida, :pernoite,
        :nome, :nacionalidade, :data_nasc, :idade, :sus, :cpf, :rg, :nome_pai, :nome_mae, :estado_civil, :filhos, :qtd_filhos,
        :local_pernoite, :local_procedencia, :chegada, :encaminhamento_documentos, :contato_familia,
        :tempo_rua, :motivo_rua, :motivo_rua_outros, :motivo_encaminhamento,
        :documentos, :documentos_outros, :programas_sociais,:descricao_programa,
        :condicao_atual, :condicao_outros, :pertences, :acolhimento_anterior,
        :privacao_liberdade, :localidade_privacao, :tempo_privacao,
        :relato_historico,
        :uso_medicamentos, :descricao_medicamentos,
        :uso_drogas, :descricao_droga,
        :problema_saude, :descricao_saude,
        :escolaridade, :trabalho, :renda,
        :motivos_procura, :projeto_vida)';

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':data_chegada', $data_chegada);
        $stmt->bindParam(':data_saida', $data_saida);
        $stmt->bindParam(':pernoite', $pernoite);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':nacionalidade', $nacionalidade);
        $stmt->bindParam(':data_nasc', $data_nasc);
        $stmt->bindParam(':idade', $idade);
        $stmt->bindParam(':sus', $sus);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':nome_pai', $nome_pai);
        $stmt->bindParam(':nome_mae', $nome_mae);
        $stmt->bindParam(':estado_civil', $estado_civil);
        $stmt->bindParam(':filhos', $filhos);
        $stmt->bindParam(':qtd_filhos', $qtd_filhos);
        $stmt->bindParam(':local_pernoite', $local_pernoite);
        $stmt->bindParam(':local_procedencia', $local_procedencia);
        $stmt->bindParam(':chegada', $chegada);
        $stmt->bindParam(':encaminhamento_documentos', $encaminhamento_documentos);
        $stmt->bindParam(':contato_familia', $contato_familia);
        $stmt->bindParam(':tempo_rua', $tempo_rua);
        $stmt->bindParam(':motivo_rua', $motivo_rua);
        $stmt->bindParam(':motivo_rua_outros', $motivo_rua_outros);
        $stmt->bindParam(':motivo_encaminhamento', $motivo_encaminhamento);
        $stmt->bindParam(':documentos', $documentos);
        $stmt->bindParam(':documentos_outros', $documentos_outros);
        $stmt->bindParam(':programas_sociais', $programas_sociais);
        $stmt->bindParam(':descricao_programa', $descricao_programa);
        $stmt->bindParam(':condicao_atual', $condicao_atual);
        $stmt->bindParam(':condicao_outros', $condicao_outros);
        $stmt->bindParam(':pertences', $pertences);
        $stmt->bindParam(':acolhimento_anterior', $acolhimento_anterior);
        $stmt->bindParam(':privacao_liberdade', $privacao_liberdade);
        $stmt->bindParam(':localidade_privacao', $localidade_privacao);
        $stmt->bindParam(':tempo_privacao', $tempo_privacao);
        $stmt->bindParam(':relato_historico', $relato_historico);
        $stmt->bindParam(':uso_medicamentos', $uso_medicamentos);
        $stmt->bindParam(':descricao_medicamentos', $descricao_medicamentos);
        $stmt->bindParam(':uso_drogas', $uso_drogas);
        $stmt->bindParam(':descricao_droga', $descricao_droga);
        $stmt->bindParam(':problema_saude', $problema_saude);
        $stmt->bindParam(':descricao_saude', $descricao_saude);
        $stmt->bindParam(':escolaridade', $escolaridade);
        $stmt->bindParam(':trabalho', $trabalho);
        $stmt->bindParam(':renda', $renda);
        $stmt->bindParam(':motivos_procura', $motivos_procura);
        $stmt->bindParam(':projeto_vida', $projeto_vida);

        try {
            $stmt->execute();

            $_SESSION['msg'] = 'paciente cadastrado com sucesso!';

        } catch (PDOException $e) {
            //erro na conexão
            $error = $e->getMessage();

            echo "erro: $error";
        }

    } else if ($dados['type'] === 'edit') {


        $id = $dados['id'];
        $data_chegada = $dados['data_chegada'];
        $data_saida = $dados['data_saida'];
        $pernoite = $dados['pernoite'];
        $nome = $dados['nome'];
        $nacionalidade = $dados['nacionalidade'];
        $data_nasc = $dados['data_nasc'];
        $idade = $dados['idade'];
        $sus = $dados['sus'];
        $cpf = $dados['cpf'];
        $rg = $dados['rg'];
        $nome_pai = $dados['nome_pai'];
        $nome_mae = $dados['nome_mae'];
        $estado_civil = $dados['estado_civil'];
        $filhos = $dados['filhos'];
        $qtd_filhos = $dados['qtd_filhos'];
        $local_pernoite = $dados['local_pernoite'];
        $local_procedencia = $dados['local_procedencia'];
        $chegada = $dados['chegada'];
        $encaminhamento_documentos = $dados['encaminhamento_documentos'];
        $contato_familia = $dados['contato_familia'];
        $tempo_rua = $dados['tempo_rua'];
        $motivo_rua = $dados['motivo_rua'];
        $motivo_rua_outros = $dados['motivo_rua_outros'];
        $motivos_encaminhamento = $dados['motivo_encaminhamento'];
        $documentos = $dados['documentos'];
        $documentos_outros = $dados['documentos_outros'];
        $programas_sociais = $dados['programas_sociais'];
        $descricao_programa = $dados['descricao_programa'];
        $condicao_atual = $dados['condicao_atual'];
        $condicao_outros = $dados['condicao_outros'];
        $pertences = $dados['pertences'];
        $acolhimento_anterior = $dados['acolhimento_anterior'];
        $privacao_liberdade = $dados['privacao_liberdade'];
        $localidade_privacao = $dados['localidade_privacao'];
        $tempo_privacao = $dados['tempo_privacao'];
        $relato_historico = $dados['relato_historico'];
        $uso_medicamentos = $dados['uso_medicamentos'];
        $descricao_medicamentos = $dados['descricao_medicamentos'];
        $uso_drogas = $dados['uso_drogas'];
        $descricao_droga = $dados['descricao_droga'];
        $problema_saude = $dados['problema_saude'];
        $descricao_saude = $dados['descricao_saude'];
        $escolaridade = $dados['escolaridade'];
        $trabalho = $dados['trabalho'];
        $renda = $dados['renda'];
        $motivos_procura = $dados['motivos_procura'];
        $projeto_vida = $dados['projeto_vida'];

        $query = 'UPDATE pacientes 
        SET data_chegada=:data_chegada, data_saida=:data_saida, pernoite=:pernoite,
        nome=:nome, nacionalidade=:nacionalidade, data_nasc=:data_nasc, idade=:idade, sus=:sus, cpf=:cpf, rg=:rg, nome_pai=:nome_pai, nome_mae=:nome_mae, estado_civil=:estado_civil, filhos=:filhos, qtd_filhos=:qtd_filhos,
        local_pernoite=:local_pernoite, local_procedencia=:local_procedencia, chegada=:chegada, encaminhamento_documentos=:encaminhamento_documentos, contato_familia=:contato_familia,
        tempo_rua=:tempo_rua, motivo_rua=:motivo_rua, motivo_rua_outros=:motivo_rua_outros, motivo_encaminhamento=:motivo_encaminhamento,
        documentos=:documentos, documentos_outros=:documentos_outros, programas_sociais=:programas_sociais,descricao_programa=:descricao_programa,
        condicao_atual=:condicao_atual, condicao_outros=:condicao_outros, pertences=:pertences, acolhimento_anterior=:acolhimento_anterior,
        privacao_liberdade=:privacao_liberdade, localidade_privacao=:localidade_privacao, tempo_privacao=:tempo_privacao,
        relato_historico=:relato_historico,
        uso_medicamentos=:uso_medicamentos, descricao_medicamentos=:descricao_medicamentos,
        uso_drogas=:uso_drogas, descricao_droga=:descricao_droga,
        problema_saude=:problema_saude, descricao_saude=:descricao_saude,
        escolaridade=:escolaridade, trabalho=:trabalho, renda=:renda,
        motivos_procura=:motivos_procura, projeto_vida=:projeto_vida
        WHERE id=:id';

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':data_chegada', $data_chegada);
        $stmt->bindParam(':data_saida', $data_saida);
        $stmt->bindParam(':pernoite', $pernoite);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':nacionalidade', $nacionalidade);
        $stmt->bindParam(':data_nasc', $data_nasc);
        $stmt->bindParam(':idade', $idade);
        $stmt->bindParam(':sus', $sus);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':nome_pai', $nome_pai);
        $stmt->bindParam(':nome_mae', $nome_mae);
        $stmt->bindParam(':estado_civil', $estado_civil);
        $stmt->bindParam(':filhos', $filhos);
        $stmt->bindParam(':qtd_filhos', $qtd_filhos);
        $stmt->bindParam(':local_pernoite', $local_pernoite);
        $stmt->bindParam(':local_procedencia', $local_procedencia);
        $stmt->bindParam(':chegada', $chegada);
        $stmt->bindParam(':encaminhamento_documentos', $encaminhamento_documentos);
        $stmt->bindParam(':contato_familia', $contato_familia);
        $stmt->bindParam(':tempo_rua', $tempo_rua);
        $stmt->bindParam(':motivo_rua', $motivo_rua);
        $stmt->bindParam(':motivo_rua_outros', $motivo_rua_outros);
        $stmt->bindParam(':motivo_encaminhamento', $motivo_encaminhamento);
        $stmt->bindParam(':documentos', $documentos);
        $stmt->bindParam(':documentos_outros', $documentos_outros);
        $stmt->bindParam(':programas_sociais', $programas_sociais);
        $stmt->bindParam(':descricao_programa', $descricao_programa);
        $stmt->bindParam(':condicao_atual', $condicao_atual);
        $stmt->bindParam(':condicao_outros', $condicao_outros);
        $stmt->bindParam(':pertences', $pertences);
        $stmt->bindParam(':acolhimento_anterior', $acolhimento_anterior);
        $stmt->bindParam(':privacao_liberdade', $privacao_liberdade);
        $stmt->bindParam(':localidade_privacao', $localidade_privacao);
        $stmt->bindParam(':tempo_privacao', $tempo_privacao);
        $stmt->bindParam(':relato_historico', $relato_historico);
        $stmt->bindParam(':uso_medicamentos', $uso_medicamentos);
        $stmt->bindParam(':descricao_medicamentos', $descricao_medicamentos);
        $stmt->bindParam(':uso_drogas', $uso_drogas);
        $stmt->bindParam(':descricao_droga', $descricao_droga);
        $stmt->bindParam(':problema_saude', $problema_saude);
        $stmt->bindParam(':descricao_saude', $descricao_saude);
        $stmt->bindParam(':escolaridade', $escolaridade);
        $stmt->bindParam(':trabalho', $trabalho);
        $stmt->bindParam(':renda', $renda);
        $stmt->bindParam(':motivos_procura', $motivos_procura);
        $stmt->bindParam(':projeto_vida', $projeto_vida);

        try {

            $stmt->execute();

            $_SESSION['msg'] = 'paciente atualizado com sucesso!';

        } catch (PDOException $e) {
            //erro na conexão
            $error = $e->getMessage();

            echo "erro: $error";
        }
    } else if ($dados['type'] === 'delete') {
        
        $id = $dados['id'];
        
        $query = 'DELETE FROM pacientes WHERE id = :id';
        
        $stmt = $conn-> prepare($query);
         
        $stmt->bindParam('id',$id);
         
        try {

            $stmt->execute();

            $_SESSION['msg'] = 'paciente removido com sucesso!';

        } catch (PDOException $e) {
            //erro na conexão
            $error = $e->getMessage();

            echo "erro: $error";
        }
    }

    header('location:' . $BASE_URL . '../index.php');
    //seleção de dados
} else {

    $id;

    if (!empty($_GET)) {
        $id = $_GET['id'];
    }
    //retorna os dados de um contato
    if (!empty($id)) {
        $query = 'SELECT * FROM pacientes WHERE id = :id';

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $paciente = $stmt->fetch();

    } else {
        //retorna todos os pacientes salvos 
        $pacientes = [];
        $query = 'SELECT * FROM pacientes';

        $stmt = $conn->prepare($query);

        $stmt->execute();

        $pacientes = $stmt->fetchAll();
    }
}

//fechar conexão
$conn = null;
?>
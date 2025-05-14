<?php
include_once 'config/url.php';
include_once 'config/processa_formulario.php';
//limpa msg.
if(isset($_SESSION['msg'])){
$printMsg = $_SESSION['msg'];
$_SESSION['msg'] ='';
}
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
<link rel="stylesheet" href="<?= $BASE_URL?>css/style.css">

  <script>

    window.onload = function () {
      const formulario = document.getElementById('index.php');
      formulario.reset();
    };

    function calcularPernoite() {
      const chegada = new Date(document.getElementById("data_chegada").value);
      const saida = new Date(document.getElementById("data_saida").value);
      if (!isNaN(chegada) && !isNaN(saida)) {
        const diff = Math.ceil((saida - chegada) / (1000 * 60 * 60 * 24));
        document.getElementById("pernoite").value = diff + " dia(s)";
      }
    }

    function mostrarOutro(selectId, inputId) {
      const select = document.getElementById(selectId);
      const input = document.getElementById(inputId);
      if (select && input) {
        input.style.display = (select.value === 'outros') ? 'block' : 'none';
      }
    }

  </script>
</head>
<body class="container py-4 bg-blue-light">
<h1 class="text-center mb-4">Formulário de Atendimento</h1>
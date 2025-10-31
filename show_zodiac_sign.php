<?php include('header.php'); ?>

<?php

$data_nascimento = $_POST['data_nascimento'];


$signos = simplexml_load_file('signos.xml');


$data = DateTime::createFromFormat('Y-m-d', $data_nascimento);
$dia = (int)$data->format('d');
$mes = (int)$data->format('m');


$signoEncontrado = null;


foreach ($signos->signo as $signo) {
   
    $dataInicio = explode('/', (string)$signo->dataInicio);
    $diaInicio = (int)$dataInicio[0];
    $mesInicio = (int)$dataInicio[1];

    $dataFim = explode('/', (string)$signo->dataFim);
    $diaFim = (int)$dataFim[0];
    $mesFim = (int)$dataFim[1];

   
    
    if ($mesInicio > $mesFim) {
        
        if (($mes == $mesInicio && $dia >= $diaInicio) ||
            ($mes == $mesFim && $dia <= $diaFim) ||
            ($mes > $mesInicio) ||
            ($mes < $mesFim)) {
            $signoEncontrado = $signo;
            break;
        }
    } else {
      
        if (($mes == $mesInicio && $dia >= $diaInicio) ||
            ($mes == $mesFim && $dia <= $diaFim) ||
            ($mes > $mesInicio && $mes < $mesFim)) {
            $signoEncontrado = $signo;
            break;
        }
    }
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php if ($signoEncontrado): ?>
                <div class="card shadow resultado-signo">
                    <div class="card-body text-center">
                        <h1 class="signo-nome"><?php echo $signoEncontrado->signoNome; ?></h1>
                        <p class="signo-descricao mt-3"><?php echo $signoEncontrado->descricao; ?></p>
                        <p class="signo-periodo mt-3">
                            <strong>Período:</strong> <?php echo $signoEncontrado->dataInicio; ?> a <?php echo $signoEncontrado->dataFim; ?>
                        </p>
                        <a href="index.php" class="btn btn-primary mt-3">Voltar</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-danger text-center">
                    <h4>Erro!</h4>
                    <p>Não foi possível determinar o signo. Por favor, tente novamente.</p>
                    <a href="index.php" class="btn btn-primary mt-3">Voltar</a>
                </div>
            <?php endif; ?>

            <p class="text-center mt-3 text-muted small">Fonte: Elaborada pelo autor</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulado</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">

</head>

<body>

    <?php

include "conexao.php";
    $query = "select * from questoes order by rand() limit 15";
    $resultado = mysqli_query($conexao, $query);

    while ($linha = mysqli_fetch_array($resultado)) {
    ?>
        <div class="row justify-content-center ">
            <div class="col-md-4 col-sm-12  ">
                
                    <div class="card">
                        <div class="card-header">
                           
                            <h2> Questão: <?php echo $linha["pergunta"]; ?></h2>
                        </div>
                    </div>
                    <div class="card-body">
                    <input class="form-check-input" type="radio" name="resposta" value="A" /> a) <?php echo $linha["a"]; ?> <br>
                    <input class="form-check-input" type="radio" name="resposta" value="A" />    b) <?php echo $linha["b"]; ?> <br>
                    <input class="form-check-input" type="radio" name="resposta" value="A" />    c) <?php echo $linha["c"]; ?> <br>
                    <input class="form-check-input" type="radio" name="resposta" value="A" />    d) <?php echo $linha["d"]; ?> <br>
                    <input class="form-check-input" type="radio" name="resposta" value="A" />    e) <?php echo $linha["e"]; ?> <br>
                        <h4>Resposta <?php echo $linha["correta"]; ?> </h4>
                    </div>
                </div>

            
        </div>
        </div>
        <br>
    <?php
    }
    ?>


    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>
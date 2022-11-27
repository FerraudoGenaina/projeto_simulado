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

  if (isset($_POST) && !empty($_POST)) {
    $pergunta = $_POST["pergunta"];

    $a = $_POST["A"];
    $b = $_POST["B"];
    $c = $_POST["C"];
    $d = $_POST["D"];
    $e = $_POST["E"];

    $correta = $_POST["correta"];

    if (empty($pergunta)) {
  ?>
      <div class="alert alert-danger" role="alert">
        Faça uma pergunta!🤨
      </div>
    <?php
    }

    if (empty($a) || empty($b) || empty($c) || empty($d) || empty($e)) {
    ?>
      <div class="alert alert-danger" role="alert">
        Informe todas as respostas!
      </div>
    <?php
    }

    if (empty($correta)) {
    ?>
      <div class="alert alert-danger" role="alert">
        Escolha a resposta correta!
      </div>
  <?php
    }

    $query = "insert into questoes (pergunta,a,b,c,d,e,correta) ";
    $query = $query . " values('$pergunta','$a','$b','$c','$d','$e','$correta')";
    $resultado = mysqli_query($conexao, $query);
  }
  ?>
  <a type="button" class="btn btn-primary m-3" href="./questoes.php">Questões</a>
  <div class="row justify-content-center ">
    <div class="col-md-4 col-sm-12 border border-light border-2 ">
      <div class="mb-3 ">
        <form action="./index.php" method="post">

          <label>Faça sua pergunta!</label>
          <textarea class="form-label form-control" name="pergunta"></textarea>

          <input class="form-check-input" type="radio" name="correta" value="A" />
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">A)</span>
            </div>
            <input 
              type="text" 
              name="A" 
              class="form-control" 
              placeholder="Informe a resposta A" 
            >
          </div>

          <input class="form-check-input" type="radio" name="correta" value="B" />
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">B)</span>
            </div>
            <input 
              type="text" 
              name="B" 
              class="form-control" 
              placeholder="Informe a resposta B" 
            >
          </div>

          <input class="form-check-input" type="radio" name="correta" value="C" />
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">C)</span>
            </div>
            <input 
              type="text" 
              name="C" 
              class="form-control" 
              placeholder="Informe a resposta C" 
            >
          </div>

          <input class="form-check-input" type="radio" name="correta" value="D" />
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">D)</span>
            </div>
            <input 
              type="text" 
              name="D" 
              class="form-control" 
              placeholder="Informe a resposta D" 
            >
          </div>

          <input class="form-check-input" type="radio" name="correta" value="E" />
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">E)</span>
            </div>
            <input 
              type="text" 
              name="E" 
              class="form-control" 
              placeholder="Informe a resposta E" 
            >
          </div>

          <button class="btn btn-success" type="submit">Salvar Pergunta</button>

        </form>

      </div>
    </div>
  </div>

  <br>
  <?php
  $query = "select * from questoes order by id asc";
  $resultado = mysqli_query($conexao, $query);

  while ($linha = mysqli_fetch_array($resultado)) {
  ?>
    <div class="row justify-content-center ">
      <div class="col-md-4 col-sm-12  ">

        <div class="card">
          <div class="card-header">
            <h1> <b>ID: </b><?php echo $linha["id"]; ?> </h1> <br>
            <h2> Questão: <?php echo $linha["pergunta"]; ?></h2>
          </div>
        </div>
        <div class="card-body">
          a) <?php echo $linha["a"]; ?> <br>
          b) <?php echo $linha["b"]; ?> <br>
          c) <?php echo $linha["c"]; ?> <br>
          d) <?php echo $linha["d"]; ?> <br>
          e) <?php echo $linha["e"]; ?> <br>
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
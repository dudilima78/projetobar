<?php
include('../conexao/conexao.php');

try{
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bd = "bdprojetobar";
    $con = new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$senha); 
    $sql = "SELECT * from tblestoque";
    $qry = $con->query($sql);
    $estoque = $qry->fetchAll(PDO::FETCH_OBJ);
    //echo "<pre>";
    //print_r($vendas);
    //die();
} catch(PDOException $e){
    echo $e->getMessage();
    
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>

    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><h2>Estoque</h2></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="btn btn-secondary" aria-current="page" href="administrativo.php">Menu Principal</a>
        </li> |        
        <li class="nav-item">
          <a class="btn btn-danger" aria-current="page" href="sair.php">Sair</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav><br><br>

<div class="container-fluid">
    
<a href="frmestoque.php" class="btn btn-outline-primary">Novo Cadastro</a>

<a <div class="dropdown"></a>
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Cadastros
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
  <li><a class="dropdown-item" href="listarfuncionarios.php">Funcion??rios</a></li>
  <li><a class="dropdown-item" href="listarmenu.php">Card??pio</a></li>
  <li><a class="dropdown-item" href="listarvendas.php">Vendas</a></li>
  <li><a class="dropdown-item" href="listarcompras.php">Compras</a></li>
  <li><hr class="dropdown-divider"></li>
  <li><a class="dropdown-item" href="listarusuarios.php">Usu??rios</a></li>
  </ul>

<hr>

    <thead>
        <!-- Inicio da tabela -->

    <table class="table table-striped">

        <tr>
           <th>id</th> 
           <th>Produto</th>
           <th>Pre??o (R$)</th>
           <th>Estoque Atual</th>
           <th>Estoque M??x.</th>
           <th>Estoque Min.</th>
           <th colspan=2>A????es</th>
           
        </tr>
    </thead>
    <tbody>
    <?php foreach($estoque as $estoque) { ?>
        <tr>
            <td><?php echo $estoque->idestoque ?></td>
            <td><?php echo $estoque->produto ?></td>
            <td><?php echo $estoque->preco ?></td>
            <td><?php echo $estoque->estoque ?></td>
            <td><?php echo $estoque->estoquemax ?></td>
            <td><?php echo $estoque->estoquemin ?></td>
            <td><a href="frmestoque.php?idestoque=<?php echo $estoque->idestoque ?>" class="btn btn-warning">Editar</a></td>
            <td><a href="frmestoque.php?op=del&idproduto=<?php echo  $estoque->idestoque ?>" class="btn btn-danger">Excluir</a></td>

        </tr>
        <?php } ?>
    </tbody>
</table>
<hr>
<a href="administrativo.php" class="btn btn-secondary">Menu Principal</a>

<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
      </div>
</body>
</html>
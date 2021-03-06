<?php 

$idcompra = isset($_GET["idcompra"]) ? $_GET["idcompra"]: null;
$op = isset($_GET["op"]) ? $_GET["op"]: null;
 

    try {
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $bd = "bdprojetobar";
        $con = new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$senha); 

        if($op=="del"){
            $sql = "delete  FROM  tblcompras where idcompra= :idcompra";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":idcompra",$idcompra);
            $stmt->execute();
            header("Location:listarcompras.php");
        }


        if($idcompra){
            $sql = "SELECT * FROM  tblcompras where idcompra= :idcompra";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":idcompra",$idcompra);
            $stmt->execute();
            $compra = $stmt->fetch(PDO::FETCH_OBJ);
            
        }
        if($_POST){
            if($_POST["idcompra"]){
                $sql = "UPDATE tblcompras SET idestoque=:idestoque, dtcompra=:dtcompra, idfuncionario=:idfuncionario, qtd=:qtd WHERE idcompra =:idcompra";
                $stmt = $con->prepare($sql);
                $stmt->bindValue(":idestoque", $_POST["idestoque"]);
                $stmt->bindValue(":dtcompra", $_POST["dtcompra"]);
                $stmt->bindValue(":idfuncionario", $_POST["idfuncionario"]);
                $stmt->bindValue(":qtd", $_POST["qtd"]);
                $stmt->bindValue(":idcompra", $_POST["idcompra"]);
                $stmt->execute(); 
            } else {
                $sql = "INSERT INTO tblcompras(idestoque,dtcompra,idfuncionario,qtd) VALUES (:idestoque,:dtcompra,:idfuncionario,:qtd)";
                $stmt = $con->prepare($sql);
                $stmt->bindValue(":idestoque", $_POST["idestoque"]);
                $stmt->bindValue(":dtcompra", $_POST["dtcompra"]);
                $stmt->bindValue(":idfuncionario", $_POST["idfuncionario"]);
                $stmt->bindValue(":qtd", $_POST["qtd"]);
                $stmt->execute(); 
            }
            header("Location:listarcompras.php");
        } 
    } catch(PDOException $e){
         echo "erro".$e->getMessage;
        }


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Compras</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><h2>Cadastro de Compra</h2></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="btn btn-secondary" aria-current="page" href="administrativo.php">Menu Principal</a>
        </li> |
        <li class="nav-item dropdown">
          <a class="btn btn-primary dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Novo Cadastro
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="frmfuncionario.php">Funcion??rios</a></li>
            <li><a class="dropdown-item" href="frmestoque.php">Estoque</a></li>
            <li><a class="dropdown-item" href="frmmenu.php">Card??pio</a></li>
            <li><a class="dropdown-item" href="frmvenda.php">Vendas</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="frmusuario.php">Usu??rios</a></li>
          </ul> |
        </li>
        <li class="nav-item">
          <a class="btn btn-danger" aria-current="page" href="sair.php">Sair</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav><br><br>

<div class="container-fluid">

<form method="POST">
Data da Compra:        <input type="date" name="dtcompra"    required     value="<?php echo isset($compra) ? $compra->dtcompra : null ?>"><br><br>
N?? do Produto:       <input type="text" name="idestoque"      required     value="<?php echo isset($compra) ? $compra->idestoque : null ?>"><br><br>
Registro do Funcion??rio:        <input type="text" name="idfuncionario"    required     value="<?php echo isset($compra) ? $compra->idfuncionario : null ?>"><br><br>
Quantidade:   <input type="text" name="qtd" required     value="<?php echo isset($estoque) ? $estoque->qtd : null ?>"><br><br>
<input type="hidden"     name="idcompra"   value="<?php echo isset($compra) ? $compra->idcompra : null ?>">
<input type="submit" class="btn btn-primary" value="Cadastrar">

</form>

<hr>
<a href="listarcompras.php" class="btn btn-success">Voltar</a> 
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
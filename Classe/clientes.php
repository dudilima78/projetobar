<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco Senac</title>
</head>
<body>
    <?php
    //faz a requisição da classe cliente para ser usada
    require('./class/Cliente.class.php');

    //criar o objeto com base na classe
    $c1 = new Cliente();
    echo $c1->setClass("Eduardo",1234567,500,1500,1);
    echo $c1->saldo();
    $c1->sacar(500);
    echo $c1->saldo();
    $c1->sacar(1000);
    echo $c1->saldo();
    $c1->sacar(500);
    echo $c1->saldo();
    $c1->sacar(500);
    echo $c1->saldo();

    ?>
</body>
</html>
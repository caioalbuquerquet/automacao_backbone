<?php

function fct_consulta($query){
    $db_host = '10.5.1.42';
    $db_nome = 'siav3';
    $db_user = 'marlos';
    $db_pass = 'Aloo@2023';
    //$con = mysqli_connect("localhost","my_user","my_password","my_db");
    $conexao = mysqli_connect($db_host,$db_user,$db_pass,$db_nome) or die ("nao foi possivel conectar");
    //$usedb = mysql_select_db($db_nome,$conexao) or die ("nao foi possivel abrir a database ".$banco);
    $resultado = mysqli_query($conexao, $query) or die("FALHA: " . mysql_error());
    mysqli_close($conexao);

    return $resultado;

}

function fct_consulta2($query){

    $db_host = '10.5.1.42';
    $db_nome = 'siav3';
    $db_user = 'joao';
    $db_pass = 'Aloo@2023';
    
    $conexao = mysql_connect($db_host,$db_user,$db_pass) or die ("nao foi possivel conectar");
    $usedb = mysql_select_db($db_nome,$conexao) or die ("nao foi possivel abrir a database ".$banco);
    $resultado = mysql_query($query,$conexao) or die("FALHA: " . mysql_error());
    
//mysql_close($conexao)
return $resultado;
    
}
?>
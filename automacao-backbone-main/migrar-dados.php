<?php
include("includes.php");

$query = "SELECT automacao_hosts.id_estacao, automacao_hosts.uf, automacao_hosts.cidade, automacao_hosts.contrato FROM automacao_hosts, automacao_estacoes WHERE automacao_estacoes.id = automacao_hosts.id_estacao AND automacao_estacoes.contrato is null GROUP BY id_estacao";
$resultado = fct_consulta($query);
while ($registro = mysqli_fetch_array($resultado)) {
    $id_estacao = $registro["id_estacao"];
    $uf = $registro["uf"];
    $cidade = $registro["cidade"];
    $contrato = $registro["contrato"];

    echo "$id_estacao - $uf - $cidade - $contrato <br>";

    $query2 = "UPDATE automacao_estacoes SET uf = '$uf', cidade = '$cidade', contrato = '$contrato' WHERE id = '$id_estacao'";
    $resultado2 = fct_consulta($query2);

    echo "OK" . "<br>";
}
?>
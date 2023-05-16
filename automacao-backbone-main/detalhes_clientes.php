<?php
include("includes.php");
$id = $_GET["id"];

$query = "SELECT * FROM automacao_estacoes where id = '$id'";
$resultado = fct_consulta($query);
$registro = mysqli_fetch_array($resultado);
$numero_contrato = $registro["contrato"];

$query = "SELECT * FROM contratos, contratos_estacao WHERE contratos_estacao.contrato_id = contratos.id and numero_contrato = '$numero_contrato'";
$resultado = fct_consulta($query);
$registro = mysqli_fetch_array($resultado);
if ($registro) {
    $nome_estacao = $registro["nome_estacao"];
    $sigla_estacao = $registro["sigla_estacao"];
} else {
    $nome_estacao = "";
    $sigla_estacao = "";
    
}

print <<<END
<h3>Informações SiaV3</h3>
$numero_contrato<br>
$nome_estacao<br>
$sigla_estacao

<h3>Clientes</h3>
<table class="zebra-striped">
<thead>
    <tr>
    <th>Contrato</th>
    <th></th>
    <th>Chamado</th>
    </tr>
</thead>
<tbody>
END;
$query = "SELECT nome_fantasia, b.numero_contrato, b.status FROM contratos, contratos_estacao, contratos b, clientes WHERE contratos.numero_contrato = '$numero_contrato' and contratos_estacao.contrato_id = contratos.id AND b.id_estacao_origem = contratos_estacao.id AND clientes.id = b.cliente_id AND b.status = 'Ativado'";
$resultado = fct_consulta($query);
while ($registro = mysqli_fetch_array($resultado)) {

$nome_fantasia = $registro["nome_fantasia"];
$contrato = $registro["numero_contrato"];
$status = $registro["status"];

echo "<tr><td><a href='#' title='$nome_fantasia'>" . $contrato . "</a></td><td><div class='item-thum2' style='background-color:  #8D883E; font-size: 30pt; color: #EEEEEE;'></div></td><td></td></tr>";

}
echo "</tbody>";
echo "</table>";

?>
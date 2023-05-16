<?php
include("includes.php");
include("inc_zabbix.php");
$id = $_GET["id"];
$query = "SELECT * FROM automacao_trecho WHERE id = '$id'";
$resultado = fct_consulta($query);
$registro = mysqli_fetch_array($resultado);
$nome_trecho = $registro["nome_trecho"];
$capacidade = $registro["capacidade"];
$largura_linha = $registro["largura_linha"];
$tipo_meio = $registro["tipo_meio"];
$distancia_km = $registro["distancia_km"];


echo "<h2>Trecho Backbone</h2>";
echo "<h3>$nome_trecho</h3>";
echo "<br>";
print <<<END
<table class="zebra-striped">
<tbody>
<tr><td>Capacidade:</td><td><input style='width: 100px;' name="xlInput" type="text" value="$capacidade"></td></tr>
<!-- <tr><td>Largura da linha:</td><td><input style='width: 100px;' name="xlInput" type="text"  value="$largura_linha"></td></tr> -->
<tr><td>Tipo Meio:</td><td><input style='width: 100px;' name="xlInput" type="text"  value="$tipo_meio"></td></tr>
<tr><td>Distancia Km:</td><td><input style='width: 100px;' name="xlInput" type="text"  value="$distancia_km"></td></tr>
</tbody>
</table>
END;

$graphid="39395";
$width="150";
$height="100";
$period="3600";

$conteudo_grafico = get_graph_image_by_id($graphid, $width, $height, $period);

$img_file = 'grafico.jpg';
$src = 'data: '.$img_file.';base64,'.$conteudo_grafico;
echo '<img src="'.$src.'"> &nbsp;';
?>
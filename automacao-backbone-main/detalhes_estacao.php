<style>
    .item-thum2 {
        background-color: #ccc;
        width: 15px;
        height: 15px;
        margin: 0px;
        padding: 0px;
        border-radius: 100%;
        -webkit-border-radius: 100%;
    }

    @-webkit-keyframes blinker {
	  from {opacity: 1.0;}
	  to {opacity: 0.5;}
	}
	.blinker{
		text-decoration: blink;
		-webkit-animation-name: blinker;
		-webkit-animation-duration: 0.5s;
		-webkit-animation-iteration-count:infinite;
		-webkit-animation-timing-function:ease-in-out;
		-webkit-animation-direction: alternate;
	}

	.blinker2{
		text-decoration: blink;
		-webkit-animation-name: blinker;
		-webkit-animation-duration: 0.3s;
		-webkit-animation-iteration-count:infinite;
		-webkit-animation-timing-function:ease-in-out;
		-webkit-animation-direction: alternate;
	}
</style>

<?php
include("includes.php");
$id = $_GET["id"];
$query = "select id, coordenada, estacao, tipo, contrato, cidade, uf from automacao_estacoes where id = $id";
$resultado = fct_consulta($query);
$registro = mysqli_fetch_array($resultado);
$id = $registro['id'];
$coordenada = $registro['coordenada'];
$coordenada = explode(',', $coordenada);
$coordenada_x = $coordenada[0];
$coordenada_y = $coordenada[1];
$contrato = $registro['contrato'];
$cidade = $registro['cidade'];
$uf = $registro['uf'];

$estacao = $registro['estacao'];
$tipo = $registro['tipo'];

print <<<END
<h2>Estação</h2>
<h2><b>$estacao</b></h2>
<br>
<table class="zebra-striped">
<tbody>
<tr><td>Contrato</td><td><b>$contrato</b></td></tr>
<tr><td>UF</td><td>$uf</td></tr>
<tr><td>Cidade</td><td>$cidade</td></tr>
<tr><td>Coordenadas:</td><td><input style='width: 30px;' name="xlInput" type="text" value="$coordenada_x"><input style='width: 30px;' name="xlInput" type="text"  value="$coordenada_y"></td></tr>
<tr>
   <td>Tipo estação:</td>
   <td>
    <select name='tipo' style='width: 90px;'>
    <option value="$tipo" selected>$tipo</option>
    <option>2</option>
    <option>3</option>
    </select>
   </td>
</tr>
</tbody>
</table>

<button style='width: 70px;' type='submit' class='btn primary'>Salvar</button>
<br>
<br>
<h3>Infraestrutura</h3>
<table class="zebra-striped">
<tbody>
<!-- http://10.5.1.58/zabbix/zabbix.php?action=map.view&sysmapid=166 -->
<tr><td><div class="item-thum2 blinker" style="background-color: #BA683B; font-size: 30pt; color: #EEEEEE;"></div></td><td>AC</td><td>220v</td></tr>
<tr><td><div class="item-thum2" style="background-color:  #8D883E; font-size: 30pt; color: #EEEEEE;"></div></td><td>ICMP</td><td>12ms</td></tr>
<tr><td><div class="item-thum2" style="background-color:  #8D883E; font-size: 30pt; color: #EEEEEE;"></div></td><td>UR</td><td>OK</td></tr>
<tr><td><div class="item-thum2" style="background-color:  #8D883E; font-size: 30pt; color: #EEEEEE;"></div></td><td>Temperatura</td><td>22C</td></tr>
<tr><td><div class="item-thum2" style="background-color:  #8D883E; font-size: 30pt; color: #EEEEEE;"></div></td><td>Porta</td><td>Fechada</td></tr>
</tbody>
</table>
<h3>Dispositivos</h3>
<table class="zebra-striped">
<thead>
    <tr>
    <th></th>
    <th>Hostid</th>
    <th>IP</th>
    <th>Modelo</th>
    </tr>
</thead>
<tbody>
END;

$query2 = "select marca, Modelo, ip, hostid, id from automacao_hosts where automacao_hosts.id_estacao = '$id' order by marca";
$resultado2 = fct_consulta($query2);
while ($registro2 = mysqli_fetch_array($resultado2)) {

    $id_host = $registro2['id'];
    $modelo = $registro2['Modelo'];
    $marca = $registro2['marca'];
    $ip = $registro2['ip'];
    $hostid = $registro2['hostid'];
 
    //echo $hostid . " <a href='#' onclick='evento_click_dispositivo(" . $id_host . ")'>$ip</a> " . $marca . " " . $modelo . "<br>";
    echo "<tr style=''><td><div class='item-thum2' style='background-color: #8D883E; color: #EEEEEE;'></div></td><td>$hostid</td><td><a href='#' onclick='evento_click_dispositivo(" . $id_host . ")'>$ip</a></td><td>$marca $modelo</td></tr>";

}

print <<<END
</tbody>
</table>
END;
?>
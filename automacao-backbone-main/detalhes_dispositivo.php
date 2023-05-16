<?php
include("includes.php");
$id = $_GET["id"];
$query = "SELECT Contrato, ip, hostid, Alocacao, marca, Modelo, Classe, Servico, id_estacao from automacao_hosts WHERE id = $id";
$resultado = fct_consulta($query);
$registro = mysqli_fetch_array($resultado);

$contrato = $registro["Contrato"];
$ip = $registro["ip"];
$hostid = $registro["hostid"];
$alocacao = $registro["Alocacao"];
$marca = $registro["marca"];
$modelo = $registro["Modelo"];
$classe = $registro["Classe"];
$servico = $registro["Servico"];
$id_estacao = $registro["id_estacao"];

$query2 = "SELECT estacao from automacao_estacoes WHERE id = $id_estacao";
$resultado2 = fct_consulta($query2);
$registro2 = mysqli_fetch_array($resultado2);
$estacao = $registro2["estacao"];

echo "<br><br>";
echo "<h2>$marca $modelo</h2>";
?>

<ul class="shadetabs" id="countrytabs" style="width: 100%;"> <!-- class="tabs" -->						  
    <li><a href='#' rel='#default' class="selected">Informações</a></li><li><a href='#' rel='countrycontainer'>Zabbix</a></li><li><a href='#' rel='countrycontainer'>PRTG</a></li><li><a href='#' rel='countrycontainer'>Backup</a></li><li><a href='#' rel='countrycontainer'>Troubleshooting</a></li><li><a href='#' rel='countrycontainer'>Automação</a></li><li><a href='#' rel='countrycontainer'>Ajuda</a></li></ul>
<div id="countrydivcontainer" style="border:0px solid gray; margin-bottom: 1em; padding: 10px">
    <div class="content">
        <div class="row">	
            <div class="span13" style="border: 0px solid #000;">
<?php 
print <<<END
<h3>Informações base</h3>
<table class="zebra-striped" style="width: 300px;">
<tbody>
  <tr>
    <td>Estação:</td>
    <td><select name="mediumSelect" id="mediumSelect">
       <option value="$id_estacao" selected>$estacao</option>
       <option>2</option>
       <option>3</option>
       <option>4</option>
       <option>5</option>
       </select>
    </td>
  </tr>
  <tr>
    <td>Contrato:</td><td>$contrato</td>
  </tr>
  <tr>
    <td>IP:</td><td><a href="http://192.168.1.9/app/consulta_dispositivo.php?ip=$ip">$ip</a></td>
  </tr>
  <tr>
     <td>Classe:</td><td>$classe</td>
  </tr>
  <tr>
     <td>servico:</td><td>$servico</td>
  </tr> 
</tbody>
</table>
<button style='width: 70px;' type='submit' class='btn primary'>Salvar</button>
<br><br><br><br><br><br>
END;

print <<<END
<h3>Relação entre Interfaces</h3>
<table class="zebra-striped">
<thead>
    <tr>
    <th>Port</th>
    <th>Description</th>
    <th>Estação</th>
    <th>Host</th>
    <th>Port</th>
    <th>TRECHO</th>
    <th></th>
    </tr>
</thead>
<tbody>
END;

$query = "SELECT * FROM automacao_hosts_interfaces WHERE id_host = '$id'";
$resultado = fct_consulta($query);
while ($registro = mysqli_fetch_array($resultado)) {
    $port = $registro["port"];
    $description = $registro["description"];

    echo "<tr>
             <td>$port</td>
             <td><input style='width: 200px;' name='xlInput' type='text' value='$description'></td>
             <td>
             <select name='mediumSelect' id='mediumSelect' style='width: 90px;'>
                <option value='x' selected>x</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
             </select>
             </td>
             <td>
             <select name='mediumSelect' id='mediumSelect' style='width: 90px;'>
                <option value='x' selected>x</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
             </select>
             </td>
             <td>
             <select name='mediumSelect' id='mediumSelect' style='width: 90px;'>
                <option value='x' selected>x</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
             </select>
             </td>
             <td>
             <select name='mediumSelect' id='mediumSelect' style='width: 90px;'>
                <option value='x' selected>x</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
             </select>
             </td>
             <td>
                <button style='width: 70px;' type='submit' class='btn primary'>Salvar</button>
             </td>
          </tr>";
}

print <<<END
</tbody>
</table>
END;
?>

            </div>
        </div>
    </div>
    <!-- <img src onerror='tabsSecundario();'> -->
    <script>
        tabsPrincipal();
    </script>
</div>
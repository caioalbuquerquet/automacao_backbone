<?php
header('Content-Type: application/json');
include("includes.php");

echo "[";

$posicao_x = 17;
$posicao_y = 30;
$count = 0;
$id_estacao_aux = 0;
$query2 = "select Modelo, ip, hostid, id_estacao, tipo from automacao_hosts, automacao_estacoes where automacao_estacoes.id = automacao_hosts.id_estacao order by id_estacao";
$resultado2 = fct_consulta($query2);
while ($registro2 = mysqli_fetch_array($resultado2)) {

    $tipo = $registro2['tipo'];
    $id_estacao = $registro2['id_estacao'];

    switch ($tipo) {
        case 2:
            $contador = 8;
            break;
        case 3:
            $contador = 6;
            break;
        default:
            $contador = 11;
            break;
    }

    $posicao_x = $posicao_x + 8;
    if ($id_estacao_aux != $id_estacao) {
        $posicao_x = 17;
        $posicao_y = 30;
        $count = 0;
    }

    if ($count >= $contador) {
        $posicao_y = $posicao_y + 8;
        $posicao_x = 17;
        $count = 0;
    }

print <<<END
{"parent_id":"$id_estacao","x":$posicao_x,"y":$posicao_y,"width":5,"height":5,"fill":"blue"},
END;

$count++;
$id_estacao_aux = $id_estacao;
}

echo   '{"parent_id":"111","x":10,"y":20,"width":5,"height":5,"fill":"blue"}]';
?>
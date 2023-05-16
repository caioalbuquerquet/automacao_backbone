<?php
require_once '/includes/database.php';

$db = new Mysql;
$db->query("select estacao from automacao_estacoes")->fetchAll();

$dados = $db->data;

echo $dados;
<?php
header("Access-Control-Allow-Headers: Authorization, Content-Type");
header("Access-Control-Allow-Origin: *");
header('content-type: application/json; charset=utf-8');


$url = "https://rupolloapp.com.br/wp-json/jet-cct/soja";

// Faz a solicitação HTTP e obtém a resposta
$response = file_get_contents($url);

// Decodifica a resposta JSON em um array associativo
$data = json_decode($response, true);

$result = array();
foreach ($data as $item) {
    $lotes = $item['lotes'];
    foreach ($lotes as $subitem) {
        $lote_nome = $subitem['lotes-nome'];
        $potencial = $subitem['potencial'];
        $result[] = array("lotes-nome" => $lote_nome, "potencial" => $potencial);
    }
}

// Converte o resultado em JSON
$json_result = json_encode($result);

// Imprime o resultado
echo $json_result;
?>
<?php

function respostaJson($codigoHttp, $success,$message,$data = null){
    http_response_code($codigoHttp);

    echo json_encode([
        "success" => $success,
        "message" => $message,
        "data"    => $data
    ]);

    exit;
}

?>
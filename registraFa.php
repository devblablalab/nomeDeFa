<?php

  function get_request_data() {
    $payload = json_decode(trim(file_get_contents("php://input")));

    if( gettype($payload) == 'object' ) {
      $payload = (array) $payload;
    }

    if( !is_array($payload) ) {
      return [];
    }

    return $payload;
  }

  function send_response_json($data, $statusCode = 200) {
    try {
      http_response_code($statusCode);
      die(json_encode([
        'type' => $statusCode < 400 ? 'success' : 'error',
        'data' => $data
      ]));
    } catch (\Throwable $th) {
      http_response_code(400);
      die(json_encode([
        'type' => 'error',
        'data' => []
      ]));
    }
  }

  $requestData = get_request_data();
  send_response_json($requestData, 200);
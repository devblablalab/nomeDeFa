<?php

  class Http {
    public static function getRequestData()
    {
      $payload = json_decode(trim(file_get_contents("php://input")));

      if( gettype($payload) == 'object' ) {
        $payload = (array) $payload;
      }
  
      if( !is_array($payload) ) {
        return [];
      }
  
      return $payload;
    }

    public static function sendResponseJson($data, $statusCode = 200)
    {
      header("Content-type: application/json");
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
  }
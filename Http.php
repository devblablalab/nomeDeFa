<?php

class Http {
  public static function getRequestData()
  {
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

    $payload = $contentType == "application/json" 
      ? json_decode(trim(file_get_contents("php://input")))
      : [];

    if( gettype($payload) == 'object' ) {
      $payload = (array) $payload;
    }

    if( !is_array($payload) ) {
      return [];
    }

    return $payload;
  }

  public static function sendResponseJson(array $response, int $statusCode = 200)
  {
    header("Content-type: application/json");
    try {
      http_response_code($statusCode);
      die(json_encode($response));
    } catch (\Exception $e) {
      http_response_code(400);
      die(json_encode([
        'message' => $e->getMessage(),
        'data' => []
      ]));
    }
  }
} 
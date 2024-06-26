<?php

  use classes\Http;
  use classes\FandomSuggestion;
  require './bootstrap.php';

  if (request_blocker()) {
    return Http::sendResponseJson([
      'message' => 'Número de solicitações excedidas, aguardade alguns segundos para continuar',
      'data' => []
    ], 429);
  }
  
  $requestData = Http::getRequestData();
  $suggestion = trim(@$requestData['suggestion']) ?? '';
  $artist = trim(@$requestData['artist']) ?? '';
  $category = @$requestData['category'] ?? '';

  if(strlen($artist) > 40 || strlen($suggestion) > 40) {
    return Http::sendResponseJson([
      'message' => 'As sugestões tem o tamanho máximo de 40 caracteres. Por favor corrija os dados e tente novamente.',
      'data' => []
    ], 422);
  }

  $fandomSuggestion = new FandomSuggestion($suggestion,$artist,(int)$category);
  $fandomWasInserted = $fandomSuggestion->save();

  if(!$fandomWasInserted) {
    return Http::sendResponseJson([
      'message' => 'Não foi possível incluir o fandom',
      'data' => []
    ], 400);
  }

  return Http::sendResponseJson([
    'message' => 'Fandom inserido com sucesso!',
    'data' => $requestData
  ], 201);
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
  $suggestion = @$requestData['suggestion'] ?? '';
  $artist = @$requestData['artist'] ?? '';
  $category = @$requestData['category'] ?? '';

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
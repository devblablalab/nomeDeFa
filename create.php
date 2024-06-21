<?php
  require './Http.php';
  require './FandomSuggestion.php';

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
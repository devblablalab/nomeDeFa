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
    return Http::sendResponseJson([], 400);
  }

  return Http::sendResponseJson($requestData, 201);
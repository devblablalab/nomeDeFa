<?php
  require './Http.php';
  require './ConnectionManager.php';

  $manager = ConnectionManager::getInstance();
  $connection = $manager->getConnection();

  $requestData = Http::getRequestData();
  Http::sendResponseJson($requestData, 201);
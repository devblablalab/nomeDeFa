<?php

namespace classes;

use classes\ConnectionManager;
use PDO;

class FandomSuggestion {
    private string $suggestion;
    private string $artistName;
    private int $categoryId;
    private $connection = null;

    public function __construct(string $suggestion, string $artistName, int $categoryId) 
    {
        $connectionManager = ConnectionManager::getInstance();
        $this->suggestion = $suggestion;
        $this->artistName = $artistName;
        $this->categoryId = $categoryId;
        $this->connection = $connectionManager->getConnection();
    }

    public function getSuggestion() : string {
        return $this->suggestion;
    }

    public function setSuggestion(string $suggestion) : void {
        $this->suggestion = $suggestion;
    }

    public function getArtistName() : string {
        return $this->artistName;
    }

    public function setArtistName(string $artistName) : void {
        $this->artistName = $artistName;
    }

    public function getCategoryId() : int {
        return $this->categoryId;
    }

    public function setCategoryId(int $categoryId) : void {
        $this->categoryId = $categoryId;
    }

    public static function getActiveSuggestions() : array {
        $connectionManager = ConnectionManager::getInstance();
        if( empty($connectionManager) ) return [];	

        $sql = "SELECT 
        fs.suggestion, fs.artist_name,fs.official,c.category
        FROM fandom_suggestion fs 
        INNER JOIN categories c ON fs.fk_id_category = c.id_category
        WHERE fs.active = 1";
        
        $stmt = $connectionManager->getConnection()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save() 
    {
        try {
            $itemsToCheck = [
                $this->suggestion,
                $this->artistName,
                $this->categoryId
            ];

            if( $this->connection == null || some_item_is_empty($itemsToCheck) ) return false;
    
            $this->setCategoryId($this->categoryId);
    
            $sql = "INSERT INTO fandom_suggestion(suggestion, artist_name, fk_id_category) 
                    VALUES(:suggestion, :artist_name, :fk_id_category)";

            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':suggestion', $this->suggestion, PDO::PARAM_STR);
            $stmt->bindParam(':artist_name', $this->artistName, PDO::PARAM_STR);
            $stmt->bindParam(':fk_id_category', $this->categoryId, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (\Exception $e) {
            return false;
        }
    }
}
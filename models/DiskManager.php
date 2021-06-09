<?php 
namespace models; 

require 'Database.php';
use models\Database;  
use \PDO;

class DiskManager extends Database 
{
    public function getDisk()
    {
        $db = $this->connect(); 

        $request = $db->query('SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id');

        return $request->fetchAll(PDO::FETCH_OBJ); 
    }

    public function getDiskID($id)
    {
        $db = $this->connect(); 

        $request = $db->prepare('SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id WHERE disc_id = :id');
        $request->bindValue(':id', $id);
        $request->execute(); 

        return $request->fetch(PDO::FETCH_OBJ); 
    }

    public function getNum()
    {
        $db = $this->connect(); 

        $request = $db->query('SELECT * FROM disc');
        $result = $request->fetchAll(PDO::FETCH_OBJ); 

        return count($result); 
    }

    public function removeDisk($id)
    {
        $db = $this->connect(); 

        $request = $db->prepare('DELETE FROM disc WHERE disc_id = :id'); 
        $request->bindValue(':id', $id);
        $request->execute(); 
    }

    public function updateDisk($id, $title, $year, $label, $genre, $price, $artist_id)
    {
        $db = $this->connect(); 

        $request = $db->prepare("
            UPDATE disc
            SET disc_title = :title, disc_year = :year, disc_label = :label, disc_genre = :genre, disc_price = :price, artist_id = :artist_id
            WHERE disc_id = :id; 
        "); 

        $request->bindValue(':title', $title); 
        $request->bindValue(':year', $year); 
        $request->bindValue(':label', $label); 
        $request->bindValue(':genre', $genre); 
        $request->bindValue(':price', $price); 
        $request->bindValue(':artist_id', $artist_id); 
        $request->bindValue(':id', $id); 

        $request->execute(); 
    }

    public function addDisk($title, $year, $label, $genre, $price, $artist_id, $image = null)
    {
        $db = $this->connect();
        
        $request = $db->prepare("
            INSERT INTO disc (disc_title, disc_year, disc_label, disc_genre, disc_price, artist_id, disc_picture) 
            VALUES (:title, :year, :label, :genre, :price, :artist_id, :image);
        ");

        $request->bindValue(':title', $title); 
        $request->bindValue(':year', $year); 
        $request->bindValue(':label', $label); 
        $request->bindValue(':genre', $genre); 
        $request->bindValue(':price', $price);
        $request->bindValue(':image', $image);
        $request->bindValue(':artist_id',  $artist_id);

        $request->execute();
    }

    public function getArtists()
    {
        $db = $this->connect();

        $request = $db->query('SELECT artist_id, artist_name FROM artist');

        return $request->fetchAll(PDO::FETCH_OBJ); 
    }

    public function updateImage($id, $image)
    {
        $db = $this->connect(); 

        $request = $db->prepare("
            UPDATE disc
            SET disc_picture = :image
            WHERE disc_id = :id; 
        "); 

        $request->bindValue(':image', $image); 
        $request->bindValue(':id', $id); 

        $request->execute(); 
    }

}
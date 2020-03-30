<?php

include ("song.php");

class SongDAO
{
    private $conn, $t;

    public function __construct($conn, $t)
    {   
        $this->conn = $conn;
        $this->table = $t;
    }

    public function findSongById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM " .$this->table ." WHERE ID=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return new Song($row["id"], $row["title"], $row["artist"], $row["year"], $row["quantity"], $row["downloads"]);
    }

    public function searchByArtist($artist)
    {
        $stmt = $this->conn->prepare("SELECT * FROM " .$this->table ."WHERE artist=?");
        $stmt->execute([$artist]);
        $songs = [];
        while($row = $stmt->fetch())
        {
            $song = new Song($row["id"], $row["title"], $row["artist"], $row["year"], $row["quantity"], $row["downloads"]);
            $songs[] = $song;
        }
        return $songs;

    }

    public function updateSong(Song $song)
    {
        $stmt = $this->conn->prepare("UPDATE " . $this->table .  " SET title=?, artist=?, year=?, quantity=?, downloads=? WHERE ID=?");
        $stmt->execute([$song->getTitle(), $song->getArtist(), $song->getYear(), $song->getQuantity(), $song->getDownloads()], $song->getID());
    }
}

?>
<?php

class Song
{
    private $id, $title, $artist, $year, $quantity, $downloads;

    public function __construct($idIn, $titleIn, $artistIn, $yearIn, $quantityIn, $downloadsIn)
    {
        $this->id=$idIn;
        $this->title=$titleIn;
        $this->artist=$artistIn;
        $this->year=$yearIn;
        $this->quantity=$quantityIn;
        $this->downloads=$downloadsIn;
    }

    public function printDetails()
    {
        echo "<p>Song ID = " .$this->id ."</br>";
        echo "Title = " .$this->title ."</br>";
        echo "Artist = " .$this->artist ."</br>";
        echo "Year = " .$this->year ."</br>";
        echo "Quantity = " .$this->quantity ."</br>";
        echo "Downloads = " .$this->downloads ."</br></p>";
    }

    public function setID($idIn)
    {
        $this->id=$idIn;
    }

    public function download()
    {
        $this->downloads ++;
    }

    public function order($quantityIn)
    {
        $this->quantity -= $quantityIn;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getArtist()
    {
        return $this->artist;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
    
    public function getDownloads()
    {
        return $this->downloads;
    }
}
?>

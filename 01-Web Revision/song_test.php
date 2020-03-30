<?php
    include("song.php");

    $song1 = new Song(0, "Ooooo", "Haaaa", "2010", "7", "100");
    $song1->setId(1);
    $song2 = new Song(0, "Song 2", "Blur", "1997", "3000", "1000000000");
    $song2->setId(2);

    $song1->printDetails();
    $song2->printDetails();

?>
<?php
require_once 'classes/db.php';
require_once 'classes/RatingQuery.php';
require_once 'classes/GenreQuery.php';
require_once 'classes/RatingMenu.php';
require_once 'classes/GenreMenu.php';

?>

<form method="get" action="/dvds">
    <div>
        Title: <input type="text" name="title" />
    </div>
    <div>
        Ratings: 
        <?php 
        $formatRatings = "<select name='" . 'ratings' . "'>";
        $formatRatings = $formatRatings ."<option>" . "All" . "</option>";
        foreach ($ratings as $rating) {
            $formatRatings = $formatRatings . "<option value='" . $rating->id. "'>" . $rating->rating_name . "</option>";
        }
        $formatRatings = $formatRatings . "</select>";
        echo $formatRatings;
        ?>
    </div>
    <div>
        Genre: 
        <?php 
        $formatGenres = "<select name='" . 'genres' . "'>";
        $formatGenres = $formatGenres ."<option>" . "All" . "</option>";
        foreach ($genres as $genre) {
            $formatGenres = $formatGenres . "<option value='" . $genre->id . "'>" . $genre->genre_name . "</option>";
        }
        $formatGenres = $formatGenres . "</select>";
        echo $formatGenres;
        ?>
    </div>
    <div>
        <input type="submit" value="Search" />
    </div>
</form>
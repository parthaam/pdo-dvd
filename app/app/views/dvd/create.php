<?php
require_once 'classes/db.php';
require_once 'classes/RatingQuery.php';
require_once 'classes/GenreQuery.php';
require_once 'classes/RatingMenu.php';
require_once 'classes/GenreMenu.php';

?>

<form method="post" action="/dvd/insert-dvd">
    <?php
    foreach ($errors->all() as $error) {
        echo '<div class="flash-notice">'.$error.'</div><br>';
    }
    if (Session::has('success')) {
        echo '<div class="flash-notice">'.Session::get('success').'</div><br>';
    }
    ?>
    <div>
        Title: <input type="text" name="title" />
    </div>
    <div>
        Ratings: 
        <?php 
        $formatRatings = "<select name='" . 'ratings' . "'>";
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
        foreach ($genres as $genre) {
            $formatGenres = $formatGenres . "<option value='" . $genre->id . "'>" . $genre->genre_name . "</option>";
        }
        $formatGenres = $formatGenres . "</select>";
        echo $formatGenres;
        ?>
    </div>
    <div>
        Labels: 
        <?php 
        $formatLabels = "<select name='" . 'labels' . "'>";
        foreach ($labels as $label) {
            $formatLabels = $formatLabels . "<option value='" . $label->id . "'>" . $label->label_name . "</option>";
        }
        $formatLabels = $formatLabels . "</select>";
        echo $formatLabels;
        ?>
    </div>
    <div>
        Sounds: 
        <?php 
        $formatSounds = "<select name='" . 'sounds' . "'>";
        foreach ($sounds as $sound) {
            $formatSounds = $formatSounds . "<option value='" . $sound->id . "'>" . $sound->sound_name . "</option>";
        }
        $formatSounds = $formatSounds . "</select>";
        echo $formatSounds;
        ?>
    </div>
     <div>
        Formats: 
        <?php 
        $formatFormats = "<select name='" . 'sounds' . "'>";
        foreach ($formats as $format) {
            $formatFormats = $formatFormats . "<option value='" . $format->id . "'>" . $format->format_name . "</option>";
        }
        $formatFormats = $formatFormats . "</select>";
        echo $formatFormats;
        ?>
    </div>
    <div>
        <input type="submit" value="Create" />
    </div>
</form>
<?php
include "Picasa/Picasa.php";
$picasa = new Picasa();
$query = htmlspecialchars(trim($_GET['query']));
$images = $picasa->getSearchContent($query, $picasa::$maxResults, is_numeric($_GET['startIndex']) ? $_GET['startIndex'] : 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Picasa Search Gallery</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/styles/style.css" type="text/css">
</head>
<body>
<div class="wrapper row1">
    <header id="header" class="clear">
        <h1>Picasa Image Search</h1>
    </header>
</div>

<div class="wrapper row2">
    <div id="container" class="clear">
        <div id="col1">
            <form method="get" action="index.php" class="search-form">
                <input type="text" name="query" class="search-form-text" />
                <input type="submit" value="Search" class="search-form-submit"/>
            </form>
            <div class="wrapper row2">
                <?php echo isset($query) && $query != null ? '<b>Search for:' . $query .'</b>' : "Random"; ?>
            </div>
            <?php
            if (sizeof($images) == 0)
                echo '<h1>No results found</h1>';
            else {

                foreach ($images as $image) {
                    echo '<div class="col-20"><a href="imagepreview.php?id='. base64_encode($image->getId()).'" target="_blank"><img src="'. $image->getThumbMiddle() .'"/></a></div>';
                }

            }
            ?>
        </div>
    </div>
    <div class="pagination">
        <?php
        if($picasa->hasPrevious(is_numeric($_GET['startIndex']) ? $_GET['startIndex'] : 1))
            echo '<a href="?query='.$_SESSION['query'].'&startIndex='.($_SESSION['startIndex'] - $picasa::$maxResults).'"><< previous </a>';
        else if ($_SESSION['startIndex'] <= $picasa::$maxResults && $_SESSION['startIndex'] > 1)
            echo '<a href="?query='.$_SESSION['query'].'&startIndex=1">previous</a>';
        echo '|';
        //check for next page
        if($picasa->hasNextPage($query, $picasa::$maxResults, is_numeric($_GET['startIndex']) ? $_GET['startIndex'] : 1))
            echo '<a href="?query='.$_SESSION['query'].'&startIndex='.($_SESSION['startIndex'] + $picasa::$maxResults).'"> next >></a>';
        ?>
    </div>
</div>
</body>
</html>


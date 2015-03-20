<?php
    include 'Picasa/Picasa.php';
    $picasa = new Picasa();
    $data = $picasa->ImageContent(base64_decode($_GET['id']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $data->getTitle(); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/styles/style.css" type="text/css">
</head>
<body>
<div class="wrapper row1">
    <header id="header" class="clear">
        <p><?php echo '<b>Title:</b> '.$data->getTitle(); ?></p>
        <p><?php echo '<b>Author:</b> '.$data->getAuthor(); ?></p>
        <p><?php echo '<b>Size:</b> '.$data->getSize().' bytes'; ?></p>
        <p><?php echo '<b>Type:</b> '.$data->getType(); ?></p>
    </header>
</div>
<div class="wrapper row2">
    <div id="container" class="clear">
        <div id="col1">
            <img src="<?php echo $data->getImage() ?>" />
        </div>
    </div>

</div>
</body>
</html>
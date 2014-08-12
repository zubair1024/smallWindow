<?php
require './classes/Gallery.php';
$gallery = new Gallery();
$gallery->setPath('img/');
$images = $gallery->getImages(array('jpg'));
?>
<!doctype html>
<html>
    <head>
        <title>Gallery</title>
        <meta charset="utf-8">
        <link href="css/gallery.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="gallery clear-fix">
                <?php if ($images): ?>
                    <?php
                    foreach ($images as $image):
                        ?>
                        <div class="gallery-item">
                            <a href="<?php echo $image['full']; ?>"><img src="<?php echo $image['thumb']; ?>"></a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    There are no Images
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>

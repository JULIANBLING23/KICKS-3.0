<?php
function getImageRoute($imageName) {
    $img_jpeg = "images/" . $imageName . ".jpeg";
    $img_jpg = "images/" . $imageName . ".jpg";
    
    if (file_exists($img_jpeg)) {
        return $img_jpeg;
    } elseif (file_exists($img_jpg)) {
        return $img_jpg;
    } else {
        return "images/img_notfound.png";
    }
}
?>
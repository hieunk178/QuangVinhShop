
    
    <?php
function getImagesFromDir($path) {
    $images = array();
    if ( $img_dir = @opendir($path) ) {
    while ( false !== ($img_file = readdir($img_dir)) ) {
    // checks for gif, jpg, png
    if ( preg_match("/(\.gif|\.jpg|\.png)$/", $img_file) ) {
    $images[] = $img_file;
    }
    }
    closedir($img_dir);
    }
    return $images;
    }
    $path = "uploads/";
    $imgList = getImagesFromDir($path);
    foreach($imgList as $image){
        echo "<img src='uploads/$image' alt=''>";
    }
    $path = "uploads/images/";
    $imgList = getImagesFromDir($path);
    foreach($imgList as $image){
        echo "<img src='uploads/images/$image' alt=''>";
    }
    $path = "uploads/files/";
    $imgList = getImagesFromDir($path);
    foreach($imgList as $image){
        echo "<img src='uploads/files/$image' alt=''>";
    }
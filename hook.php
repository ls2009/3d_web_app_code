<?php
$directory = 'public/assets/images/gallery_images';
// Only load files with the following extensions
$allowed_extensions = array('jpg', 'jpeg', 'gif', 'png');
// Response message
$response = "";

// Check if the directory exists
if (is_dir($directory)) {
    // Opens the directory to parse the images
    $dir_handle = opendir($directory);
    
    if ($dir_handle) {
        // Iterate through all the files
        while (($file = readdir($dir_handle)) !== false) {
            // First check for hidden files
            if (substr($file, 0, 1) != '.') {
                // Split each file name to extract the file extension
                $file_components = explode('.', $file);
                // Grab the extension token
                $extension = strtolower(array_pop($file_components));
                // Is this file a valid image. If so, add it to the response
                if (in_array($extension, $allowed_extensions)) {
                    // Build a response string using the ~ symbol as a string separator
                    $response .= $directory . '/' . $file . '~';
                }
            }
        }
        closedir($dir_handle);
        
        // Return response while removing the last ~ separator
        echo rtrim($response, '~');
    } else {
        echo "Error: Unable to open directory.";
    }
} else {
    echo "Error: Directory does not exist.";
}
?>

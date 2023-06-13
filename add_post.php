<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php';

$title = $_POST['title'];
$content = $_POST['content'];

// Directory where uploaded images will be saved
$target_dir = "uploads/";

// Check if the directory exists and if it is writable
if (!is_dir($target_dir)) {
    die('The directory does not exist.');
} else if (!is_writable($target_dir)) {
    die('The directory is not writable.');
}

// The path to the image file
$target_file = $target_dir . basename($_FILES["image"]["name"]);

// Variable to check if the upload process should continue
$uploadOk = 1;

// Get the file extension of the uploaded file
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is an actual image
$check = getimagesize($_FILES["image"]["tmp_name"]);
if($check !== false) {
    $uploadOk = 1;
} else {
    echo "File is not an image.";
    $uploadOk = 0;
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow only certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if the upload process should continue
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    // If everything is ok, try to upload file
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // The image has been uploaded. The rest of your code goes here:

        $sql = "INSERT INTO posts (title, content, imagepath) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $title, $content, $target_file);
        $stmt->execute();

        header("Location: dashboard.php");

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

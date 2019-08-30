<?php
    function uploadImage($file_name,$destination){
        $target_dir = $destination;
        // rename new file 
        // 1.jpg
        $temp = explode(".", $file_name["name"]);
        // 123745.jpg
        $newfilename = round(microtime(true)) . '.' . end($temp);
        // uploads/product/123745.jpg
        $target_file = $target_dir . basename($newfilename);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($file_name["tmp_name"]);
            if($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                //echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        // if (file_exists($target_file)) {
        //     echo "Sorry, file already exists.";
        //     $uploadOk = 0;
        // }
        // //Check file size
        // if ($file_name["size"] > 500000) {
        //     echo "Sorry, your file is too large.";
        //     $uploadOk = 0;
        // }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            
            if (move_uploaded_file($file_name["tmp_name"], $target_file)) {
                return $newfilename;
                //echo "The file ". basename( $newfilename). " has been uploaded.";
            } else {
                return "can not upload";
                //echo "Sorry, there was an error uploading your file.";
            }
        }
    }

?>
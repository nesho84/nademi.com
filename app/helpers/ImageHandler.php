<?php

class ImageHandler
{
    private $imagesString = "";
    private $uploadError = "";
    private $postFiles = [];
    private $imagesArray = [];

    public function checkUpload($postFiles = [])
    {
        $this->postFiles = $postFiles;

        // Check for empty field
        if (empty($this->postFiles["demoImage"]["name"][0])) {
            $this->uploadError .= "Please choose Image";
            return;
        }

        // Build Images array and check for image type
        foreach ($this->postFiles["demoImage"]["name"] as $demoImage) {
            // Allow certain file formats
            $parts = explode(".", $demoImage);
            $ending = strtolower(end($parts));
            $allowed = ["jpg", "png", "jpeg", "gif"];

            if (in_array($ending, $allowed)) {
                $demoImage = uniqid() . "." . $ending;
                // New array with unique image names
                $this->imagesArray[] = $demoImage;
                // Save $this->imagesArray as one string separated with commas
                $this->imagesString = implode(',', $this->imagesArray);
            } else {
                $this->uploadError .= "Only JPG, JPEG, PNG & GIF files are allowed";
            }
        }

        // Return result
        if (!$this->uploadError) {
            return true;
        } else {
            return false;
        }
    }

    public function runUpload()
    {
        // Count # of uploaded files in array
        $totalImages = count($this->imagesArray);
        // Loop through each file
        for ($i = 0; $i < $totalImages; $i++) {
            //Get the temp file path
            $tmpFilePath = $this->postFiles['demoImage']['tmp_name'][$i];

            //Make sure we have a file path
            if ($tmpFilePath != "") {
                //Setup our new file path
                $newFilePath = DEMO_UPLOAD_PATH . '/' . $this->imagesArray[$i];

                //Upload the file into the temp dir
                move_uploaded_file($tmpFilePath, $newFilePath);
            } else {
                $this->uploadError .= "Sorry, there was an error uploading your files.";
            }
        }

        // // @TODO: Get image info and check for details
        // foreach ($this->postFiles["demoImage"]["tmp_name"] as $tmp_name) {
        //     if ($tmp_name != "") {
        //         if (!getimagesize($tmp_name)) {
        //             $this->uploadError .= "File(s) is not an image";
        //         }
        //     }
        // }

        // Return result
        if (!$this->uploadError) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteImages($existingdemoImages)
    {
        // Delete images from the Upload Folder (as array or single image)
        $imgs = explode(",", $existingdemoImages);
        foreach ($imgs as $img) {
            // Remove the existing Images
            if (file_exists(DEMO_UPLOAD_PATH . '/' . $img)) {
                unlink(DEMO_UPLOAD_PATH . '/' . $img);
            }
        }
    }

    public function getImagesAsString()
    {
        return $this->imagesString;
    }

    public function getUploadErrors()
    {
        return $this->uploadError;
    }
}

<?php

namespace Models;

class Photo
{
    protected string $error;
    protected string $image;
    
    public function __construct()
    {
        $this->error = '';
        $this->image = '';
    }
    
    public function add(): void
    {
        $photo = $_FILES['photo'];
        if (isset($photo)) {
            $fileTmpName = $photo['tmp_name'];
            if (
                $photo['error'] !== UPLOAD_ERR_OK
                || !is_uploaded_file($fileTmpName)
            ) {
                $this->error = 'An unknown error occurred while uploading the file.';
            } else {
                if (empty($this->error)) {
                    $image = getimagesize($fileTmpName);
                    $name = md5_file($fileTmpName);
                    $extension = image_type_to_extension($image[2]);

                    if (
                        $extension != '.png'
                        && $extension != '.jpg'
                        && $extension != '.jpeg'
                    ) {
                        $this->error = 'You can upload images only .jpg or .png format.';
                    }
                    $path = dirname(__DIR__, 2) . "/public/image/";
                    $this->image = $name . $extension;
                    if (!move_uploaded_file($fileTmpName, $path . $this->image)) {
                        $this->error = 'An error occurred while writing the image to the disc.';
                    }
                }
            }
        } else {
            $this->error = 'An unknown error occurred while uploading the file.';
        }
    }
    
    public function get(): string {
        return $this->image;
    }
    
    public function getError(): string {
        return $this->error;
    }
}

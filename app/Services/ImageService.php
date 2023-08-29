<?php
namespace App\Services;


class ImageService extends DataBase{

    public function __construct()
    {
        ///
    }

    public function makeImg($file, $path)
    {
        $data = [];
        if (isset($file) && $file['error'] === UPLOAD_ERR_OK) {
            $uploaded_file_path = $path . basename($file['name']);
            if (move_uploaded_file($file['tmp_name'], $uploaded_file_path)) {
                $data['image'] = $uploaded_file_path;
                return $uploaded_file_path;
            } else {
                // Если не удалось переместить файл, выведите ошибку
                echo "Failed to save the uploaded file.";
            }
        }

    }
}
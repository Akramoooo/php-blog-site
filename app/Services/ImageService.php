<?php
namespace App\Services;

use SplFileInfo;

class ImageService extends DataBase{

    public function __construct()
    {
        ///
    }

    public function makeImg(array $file, $path)
    {
        $file_name = $file['name'];
        $file_info = new SplFileInfo($file_name);
        $extension = $file_info->getExtension();
        $new_file_name = uniqid() . '.' . $extension;
        $destination = $path . '/' . $new_file_name;
        return $destination;

    }
}
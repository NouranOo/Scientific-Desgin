<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 10/24/2019
 * Time: 12:00 PM
 */

namespace App\Helper;


class UploadImages
{
    public static function upload($image, $subfolder = '')
    {
        $response = new \stdClass();
        $alloweed_types = [
            'png',
            'jpeg',
            'jpg',
        ];
        // check if file is valide image
        if (!in_array($image->extension(), $alloweed_types)) {
            $response->status = 400;
            $response->message = 'image type not allowed';
            $response->data = [];
            echo json_encode($response);
            die;
        }
        // upload the image
        if (!file_exists('public/uploads/' . $subfolder)) {
            mkdir('public/uploads/' . $subfolder, 0775);
        }
        $fileName = sha1(random_int(1, 5000) * (float)microtime()) . '.' . $image->extension(); // renameing image
        $image->move('public/uploads/' . $subfolder, $fileName);
        return $fileName;
    }
}

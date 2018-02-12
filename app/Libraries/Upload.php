<?php

/**
 * Created by PhpStorm.
 * User: michael
 * Date: 10/25/16
 * Time: 1:21 AM
 */

namespace App\Libraries;

use Illuminate\Support\Facades\Storage;
use Image;

class Upload {

  /**
   * Uploads post image and creates two different re-sized versions of the image
   *
   *
   *
   * @param $image
   * @param $key
   * @param $directory
   * @param int $resizeWidth
   * @param int $resizeHeight
   * @return string
   */
  public function uploadImage($image, $directory,$resizeWidth = NULL,$resizeHeight = NULL) {

    $imageName = $this->randomString(15);

    // Generate full paths
    $fullPath = $directory . '/' . $imageName . '.' . $image->getClientOriginalExtension();


    // Create Image
    $img = Image::make($image);

    // Check if image will be resized.
    if(!empty($resizeWidth) || !empty($resizeHeight)){

      $img->resize($resizeWidth,$resizeHeight, function ($constraint) {
        $constraint->aspectRatio();
      });
    }

    $img->encode('jpg', 10);
    $img->stream();

    //Save image
    //$path = file($img)->store('cards');
    //todo fix storage issues
    $path = Storage::disk('public')->put($fullPath,$img);


    return $fullPath;
  }

  public function deleteImage($image) {
    //delete specified image from directory
  }

  public function makeDirectory($key) {
    $path = '' . $key;

    if (!file_exists($path)) {
      mkdir($path);
    }
  }

  function filenameSafe($name) {
    $except = ['\\', '/', ':', '*', '?', '"', '<', '>', '|'];
    return str_replace($except, '', $name);
  }

  /**
   *
   * Generate random secure string for image storage
   *
   * @param $length
   * @param string $keyspace
   *
   * @return string
   */
  public function randomString($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
      $str .= $keyspace[random_int(0, $max)];
    }
    return $str;
  }
}
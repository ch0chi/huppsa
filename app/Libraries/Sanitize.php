<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 10/26/16
 * Time: 5:26 AM
 */

namespace App\Libraries;


class Sanitize
{

    public function __construct(){

    }

    /**
     * @param $str
     * @return mixed returns sanitized string
     */
    static function clean($str){

        $str = str_replace(' ', '-', $str); // Replaces all spaces with hyphens.
        $str = preg_replace('/[^A-Za-z0-9\-]/', '', $str); // Removes special chars.

        return preg_replace('/-+/', '-', $str); // Replaces multiple hyphens with single one.
    }

    static function checkIfClean($str){

    }

}
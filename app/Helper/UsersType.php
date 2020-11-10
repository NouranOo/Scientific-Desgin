<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 10/26/2019
 * Time: 1:38 PM
 */

namespace App\Helper;


class UsersType
{
    const Provider = 0;
    const Supplier = 1;
    const Both = 2;

    static function getType($status)
    {
        $arr = array(
            '0' => 'طالب خدمه',
            '1' => 'مقدم خدمه',
            '2' => 'طالب / مقدم',
        );
        return $arr[$status];
    }
}

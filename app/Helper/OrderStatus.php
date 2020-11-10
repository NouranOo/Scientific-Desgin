<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 10/26/2019
 * Time: 1:38 PM
 */

namespace App\Helper;


class OrderStatus
{
    const Pending = 0;
    const Delivery = 1;
    const Completed = 2;

    const arr=array(
        '0' => 'Pending',
        '1' => 'Delivery',
        '2' => 'Completed',
    );
    static function getStatus($status)
    {
        $arr = array(
            '0' => 'Pending',
            '1' => 'Delivery',
            '2' => 'Completed',
        );
        return $arr[$status];
    }
}

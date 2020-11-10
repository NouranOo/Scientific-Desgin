<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 10/26/2019
 * Time: 1:38 PM
 */

namespace App\Helper;


class ShippingStatus
{
    const Active = 1;
    const InActive = 0;

    static function getStatus($status)
    {
        $arr = array(
            '1' => 'Active',
            '0' => 'In Active',
        );
        return $arr[$status];
    }
}

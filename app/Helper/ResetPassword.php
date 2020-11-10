<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 11/10/2019
 * Time: 4:02 PM
 */

namespace App\Helper;


use Illuminate\Support\Facades\Mail;

class ResetPassword
{
    static function sendMessage($data, $to)
    {
        Mail::send('mail', $data, function ($message) use ($to,$data) {
            $message->to($to)->subject
            ('Renta Reset Password');
            $message->from('info@renta.mallahsoft.com ', 'Renta');
        });
        return TRUE;
    }
}

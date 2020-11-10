<?php

/**
 * Created by PhpStorm.
 * User: mallahsoft
 * Date: 21/10/18
 * Time: 10:50 ص
 */

namespace App\Repository;

use App\User;
use Illuminate\Http\Request;


class UserRepository implements IBaseRepository {

    function save($data) {
//dd($data);
        $user = User::create($data);
        return $user;
    }

    function findAll() {
        $users = User::with(['supplier'])->orderBy('id', 'desc')->get();
        return $users;
    }

    function findByEmail($email)
    {
        $user=User::where('email',$email)->first();
        return $user;
    }

    function findById($id) {
       $user=User::with(['supplier'])->find($id);
       return $user;
    }

    function update($id, $data) {
       $user=User::where('id',$id)->update($data);
       return $user;
    }

    function delete($id) {
     User::destroy($id);
     return true;
    }

}

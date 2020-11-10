<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 19/10/18
 * Time: 12:36 م
 */

namespace App\Repository;


interface IBaseRepository
{


    function save($data);
    function findAll();
    function findById($id);
    function update($id,$data);
    function delete($id);

}

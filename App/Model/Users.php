<?php
/**
 * Created by PhpStorm.
 * User: loquet_j
 * Date: 28/02/2016
 * Time: 20:46
 */

namespace REST\App\Model;

use \REST\Config\DB;

class Users extends DB
{
    public function findOne($id)
    {
        return $this->connect()->query("SELECT * FROM user WHERE id = $id")->fetchAll(\PDO::FETCH_ASSOC);
    }

}
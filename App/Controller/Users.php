<?php

/**
 * Created by PhpStorm.
 * User: loquet_j
 * Date: 28/02/2016
 * Time: 19:14
 */

namespace REST\App\Controller;

use \REST\App\Model\Users as UsersModel;

class Users
{

    /**
     * @var $userModel
     */
    private $userModel;

    /**
     * @return UsersModel
     */
    public function getUserModel()
    {
        if ($this->userModel == null)
            $this->userModel = new UsersModel();
        return $this->userModel;
    }

    public function indexAction()
    {
        header('Content-Type: application/json');
        echo '';
    }

    public function getIdAction($id)
    {
        header('Content-Type: application/json');
        echo json_encode($this->getUserModel()->findOne($id));
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/16
 * Time: 20:42
 */

namespace Cms\Logic;


use Cms\Entity\UserEntity;

class UserLogic extends BaseLogic
{
    /**
     * 处理用户登录
     */
    public function login($username)
    {
         $this->di->setShared('user', function () use($username) {

             return new UserEntity(['username' => $username]);
         });
    }
}
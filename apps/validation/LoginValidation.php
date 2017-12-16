<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/16
 * Time: 16:07
 *
 * 登录验证器
 */

namespace Cms\Validation;


use Cms\Base\ApiException;
use Cms\Library\Utility;
use Cms\Models\UserModel;
use Phalcon\Validation\Validator\Callback;
use Phalcon\Validation\Validator\PresenceOf;

class LoginValidation extends BaseValidation
{

      public function loginValidate($data)
      {
           $this->usernameValidate();
           $this->passwordValidate();
           $this->validate($data);
      }


      private function usernameValidate()
      {
          $this->setFilters('username', ['striptags', 'trim']);
          $this->add('username', new PresenceOf([
              'code' => ApiException::PARAM_EMPTY,
              'message' => [
                  'username' => '用户名不能为空'
              ]
          ]));
          $this->add('username', new Callback([
              'code' => ApiException::PARAM_ERROR,
              'message' => ['username' => '该用户尚未注册，请先注册'],
              'callback' => function($data) {
                  $user = UserModel::findFirstByKey(
                      'username', $data['username'], ['username']);
                  return !empty($user);
              }
          ]));

      }

      private function passwordValidate()
      {
          $this->setFilters('password', ['striptags', 'trim']);
          $this->add('password', new PresenceOf([
              'code'    => ApiException::PARAM_EMPTY,
              'message' => [
                  'password' => '密码不能为空',
              ]
          ]));
          $this->add('password', new Callback([
              'code' => ApiException::PARAM_ERROR,
              'message' => ['password' => '密码错误'],
              'callback' => function($data) {
                   $password = UserModel::findFirstByKey(
                       'username', $data['username'], ['password']);
                   return (empty($password) ? false :
                       Utility::decrypt($data['password'], $password['password']));
              }
          ]));
      }
}
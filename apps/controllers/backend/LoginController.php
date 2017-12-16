<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/16
 * Time: 16:04
 *
 * 用户登录
 */

namespace Cms\Controllers\Backend;


use Cms\Logic\UserLogic;
use Cms\Validation\LoginValidation;
use Phalcon\Mvc\Controller;

class LoginController extends Controller
{
    /**
     * 处理用户登录
     */
    public function loginAction()
    {
          //对传递的数据进行验证
          $loginValidation = new LoginValidation();
          $loginValidation->loginValidate($this->request->getPost());
          if ($loginValidation->hasError()) {
              $errorMessage = $loginValidation->getErrorMessage();
              $this->response->error($errorMessage[0], $errorMessage[1]);
          }
          //保存用户信息
          $userLogic = new UserLogic();
          $userLogic->login($loginValidation->getValue('username'));
          //跳转到主页面
          $this->response->success();
    }

    public function loginOutAction()
    {

    }


}
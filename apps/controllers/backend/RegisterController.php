<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 17-12-15
 * Time: 上午11:01
 *
 * 用户注册
 */

namespace Cms\Controllers\Backend;


use Cms\Base\ApiException;
use Cms\Library\Utility;
use Cms\Models\UserModel;
use Cms\Validation\RegisterValidation;
use Phalcon\Mvc\Controller;

class RegisterController extends Controller
{
    /**
     * 处理用户注册
     */
      public function registerAction()
      {
            //对传递过来的参数进行验证
            $registerValidation = new RegisterValidation();
            $registerValidation->registerValidate($this->request->getPost());
            if ($registerValidation->hasError()) {
                 $message = $registerValidation->getErrorMessage();
                 $this->response->error($message[0], $message[1]);
            }
            //存入数据库
            $username = $registerValidation->getValue('username');
            $password = Utility::encrypt(
              $registerValidation->getValue('password'));
            $data = [
                'username' => $username,
                'password' => $password,
                'email'    => $registerValidation->getValue('email'),
                'phone'    => $registerValidation->getValue('phone')
            ];
            $userModel = new UserModel();
            //对保存结果进行处理
            if ($userModel->save($data)) {
                $this->response->success();
            }else {
                $this->response->error(ApiException::SAVE_FAIL,
                    ApiException::getCodeName(ApiException::SAVE_FAIL));
            }
      }


}
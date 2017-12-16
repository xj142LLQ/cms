<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/16
 * Time: 10:48
 *
 * 用户注册验证器
 */

namespace Cms\Validation;


use Cms\Base\ApiException;
use Cms\Models\UserModel;
use Phalcon\Validation\Validator\Callback;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Regex;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\PresenceOf;


class RegisterValidation extends BaseValidation
{
    /**
     * @param $info
     * 验证注册参数
     */
    public function registerValidate($info)
    {
        $this->usernameValidate();
        $this->passwordValidate();
        $this->emailValidate();
        $this->phoneValidate();
        $this->validate($info);
    }



    /**
     * 邮箱验证
     */
    private function emailValidate()
    {
        $this->setFilters('email', ['striptags', 'trim']);
        $this->add('email', new Email([

            'code'  => ApiException::PARAM_ERROR,
            'message' => [
                'email' => '该邮箱格式不正确'
            ]
        ]));
    }

    /**
     * 手机号码验证
     */
    private function phoneValidate()
    {
        $this->setFilters('phone', ['striptags', 'trim']);
        $this->add('phone', new Regex([
            'code'     => ApiException::PARAM_ERROR,
             "pattern" => [
                 'phone' => '/[0-9]{11}/'
             ],
             "message" => [
                 'phone' => '手机号码格式不正确',
             ]
        ]));
    }

    /**
     * 用户名验证
     */
    private function usernameValidate()
    {
        $this->setFilters('username', ['striptags', 'trim']);
        $this->add('username', new StringLength([
            'code' => ApiException::PARAM_ERROR,
            'min' => ['username' => 1],
            'max' => ['username' => 20],
            'messageMinimum' => [
                'username' => '用户名不能为空'
            ],
            'messageMaximum' => [
                'username' => '用户名长度不能超过20'
            ]
        ]));
        $this->add('username', new Callback([
            'code' => ApiException::PARAM_ERROR,
            'message' => ['username' => '该用户名已存在'],
            'callback' => function($data) {
                $user = UserModel::findFirstByKey('username',
                    $data['username'], ['username']);
                return !(count($user) > 0);
            }
        ]));

    }

    /**
     * 密码验证
     */
    private function passwordValidate()
    {
        $this->setFilters('password', ['striptags', 'trim']);
        $this->add('password', new PresenceOf([
            'code'    => ApiException::PARAM_EMPTY,
            'message' => [
                'password' => '密码不能为空',
            ]
        ]));
    }
}
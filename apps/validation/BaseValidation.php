<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/16
 * Time: 10:46
 *
 * 基本验证器
 */

namespace Cms\Validation;



use Phalcon\Validation;


class BaseValidation extends Validation
{
    /**
     * @return bool
     * 判断是否有错误
     */
    public function hasError()
    {
        return count($this->_messages);
    }

    /**
     * @return array|string
     * 获取验证的错误信息
     */
    public function getErrorMessage()
    {
        $messages = $this->getMessages();

        if (count($messages)) {
           return [$messages[0]->getCode(), $messages[0]->getMessage()];
        }
        return '';
    }


}
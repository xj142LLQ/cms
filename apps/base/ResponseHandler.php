<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/16
 * Time: 12:00
 *
 * 返回响应的信息
 */

namespace Cms\Base;


use Phalcon\Http\Response;

class ResponseHandler extends Response
{

    /**
     * @param array $data
     * 返回请求成功的信息
     */
    public function success(array $data=[])
    {
         $this->_send(ApiException::SUCCESS,
             ApiException::getCodeName(ApiException::SUCCESS),
             $data);
    }

    /**
     * @param $code
     * @param $message
     * 返回请求错误的信息
     */
    public function error($code, $message)
    {
         $this->_send($code, $message);
    }

    private function _send($code, $message, $data=[])
    {
        $this->setJsonContent([
            'code' => $code,
            'message' => $message,
            'data' => $data
        ]);
        $this->send();
        exit();
    }
}
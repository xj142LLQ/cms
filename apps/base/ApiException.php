<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/16
 * Time: 11:43
 */

namespace Cms\Base;


class ApiException
{
     const PARAM_EMPTY = 10001;  //参数为空
     const PARAM_ERROR = 10002;  //参数错误
     const SUCCESS     = 10003;  //请求成功
     const SAVE_FAIL   = 10004;  //保存失败

     private static $_codeList = [

         self::PARAM_EMPTY => '参数为空',
         self::PARAM_ERROR => '参数错误',
         self::SUCCESS     => '请求成功',
         self::SAVE_FAIL   => '保存失败',

     ];

    public static function getCodeName($code)
    {
         return self::$_codeList[$code];
    }

}
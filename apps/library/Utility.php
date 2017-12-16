<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/16
 * Time: 15:36
 *
 * 工具类
 */

namespace Cms\Library;


class Utility
{
    /**
     * @param $password
     * @return bool|string
     * 对密码哈希化
     */
    public static function encrypt($password)
    {
          if (isset($password)) {
             return password_hash($password, PASSWORD_BCRYPT);
          }
          return false;
    }

    /**
     * @param $password
     * @param $hash
     * @return bool|string
     * 判断密码是否输入正确
     */
    public static function decrypt($password, $hash)
    {
        if (isset($password)) {
            return password_verify($password, $hash);
        }
        return false;
    }
}
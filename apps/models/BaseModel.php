<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/16
 * Time: 16:24
 *
 * 模型基础类
 */

namespace Cms\Models;


use Phalcon\Mvc\Model;

class BaseModel extends Model
{
    /**
     * @param string $key
     * @param $value
     * @param array $columns
     * @return array|string
     * 根据某个字段查找相应的数据
     */
    public static function findFirstByKey($key='id', $value, $columns=['*'])
    {
         $result = self::findFirst([
             'conditions' => "$key = :value:",
             'bind'       => ['value' => $value],
             'columns'    => implode(',', $columns)
         ]);

         return (!empty($result) ? $result->toArray() : '');
    }

    /**
     * @param array $fields
     * @param array $columns
     * @return array
     * 根据多个字段查找值
     */
    public static function findFirstByMKey(array $fields=[], $columns=['*'])
    {
         foreach ($fields as $key => $value) {
             $conditions[] = $key . " = :{$key}:";
             $bind[$key] =  $value;
         }
         $result = self::findFirst([
             'conditions' => implode(' and ', $conditions),
             'bind'       => $bind,
             'columns'    => implode(',', $columns)
         ]);
         return $result->toArray();
    }




}
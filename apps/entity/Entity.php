<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/16
 * Time: 21:01
 */

namespace Cms\Entity;


class Entity
{
    protected $_entityData = [];

    public function __construct($data)
    {
        $this->_entityData = $data;
    }

    public function __get($name)
    {
        if (isset($this->_entityData[$name])) {
            return $this->_entityData[$name];
        }
        return '';
    }


}
<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2021/4/6
 * Time: 9:35 PM
 */

//注册模式
class Register
{
    protected static $objects;

    function set($alias, $object)//将对象注册到全局的树上
    {
        self::$objects[$alias] = $object;//将对象放到树上
    }

    static function get($name)
    {
        return self::$objects[$name];//获取某个注册到树上的对象
    }

    function _unset($alias)
    {
        unset(self::$objects[$alias]);//移除某个注册到树上的对象。
    }
}
<?php
/**
 * 简单工厂模式
 * Created by PhpStorm.
 * User: admin
 * Date: 2021/4/26
 * Time: 9:33 PM
 */

namespace Pattern;

interface people
{
    public function say();

}

class man implements people
{

    public function say()
    {
        echo '男';
    }

}

class woman implements people
{

    public function say()
    {
        echo '女';
    }

}

class SimpleFactory extends man
{

    /**
     * 创建男
     * @return man
     */
    static function createMan()
    {
        return new man();
    }


    /**
     * 创建女
     * @return woman
     */
    static function createWoman()
    {
        return new woman();
    }
}


/**
 * 具体实现
 */
$man = \SimpleFactory::createMan();
$man->say();
$woman = \SimpleFactory::createWomen();
$woman->say();
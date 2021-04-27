<?php
/**
 * 简单工厂模式
 * Created by PhpStorm.
 * User: admin
 * Date: 2021/4/26
 * Time: 9:33 PM
 */

interface People
{
    public function say();

}

class Man implements People
{

    public function say()
    {
        echo '男';
    }

}

class Woman implements People
{

    public function say()
    {
        echo '女';
    }

}

class SimpleFactory extends Man
{

    /**
     * 创建男
     * @return man
     */
    static function createMan()
    {
        return new man();
    }
}

class SimpleFactory1 extends Woman
{
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
$woman = \SimpleFactory1::createWoman();
$woman->say();
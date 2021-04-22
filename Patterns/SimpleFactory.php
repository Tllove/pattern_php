<?php
/**
 * 简单工厂模式（静态工厂方法模式）
 * Created by PhpStorm.
 * User: admin
 * Date: 2021/4/6
 * Time: 9:29 PM
 */

/**
 * 简单工厂模式（静态工厂方法模式）
 * Interface people 人类
 */
interface people
{

    //接口 空的方法 只有方法体
    public function say();
}

/**
 * Class man 继承 people 的男人类
 */
class man implements people
{
    /**
     * 具体实现people 的say 方法
     */
    public function say()
    {
        echo '我是男人<br>';
    }
}

/**
 * Class women 继承 people 的女人类
 */
class women implements people
{
    /**
     * 具体实现people 的say 方法
     */
    public function say()
    {
        echo '我是女人<br>';
    }
}

/**
 * Class SimpleFactory 工厂类
 */
class SimpleFactory
{
    /**
     * 简单工厂里的静态方法-用于创建男人对象
     * @return man
     */
    static function createMan()
    {
        return new man();
    }

    /**
     * 简单工厂里的静态方法-用于创建女人对象
     * @return women
     */
    static function createWomen()
    {
        return new women();
    }
}

/**
 * 具体调用
 */
$man = \SimpleFactory::createMan();
$man->say();
$woman = \SimpleFactory::createWomen();
$woman->say();

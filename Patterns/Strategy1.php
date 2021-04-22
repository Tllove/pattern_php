<?php


namespace Strategy;


abstract class Duck
{
    protected $fly = null;

    protected $call = null;

    protected $swim = null;

    /**
     * 介绍鸭子
     * @param $name
     */
    public function display($name)
    {
        echo "我是： " . $name . PHP_EOL;
    }

    /**
     * 叫
     */
    public function call()
    {
        if (!is_null($this->call)) {
            $this->call->call();
        }

    }

    /**
     * 飞
     */
    public function fly()
    {
        if (!is_null($this->fly)) {
            $this->fly->fly();
        }
    }

    /**
     * 游泳
     */
    public function swim()
    {
        if (!is_null($this->swim)) {
            $this->swim->swim();
        }
    }
}

//5. 定义三个接口来描述鸭子的各种能力

interface FlyInterface
{
    public function fly();
}

interface CallInterface
{
    public function call();
}

interface SwimInterface
{
    public function swim();
}
//6. 每种鸭子的能力都不相同，会飞的，不会飞的，飞的不怎样的，会叫的，不会叫的，叫不出来的，等等，每种能力都有各自的实现。

class NoFly implements FlyInterface
{

    public function fly()
    {
// TODO: Implement fly() method.
        echo "我是不会飞的鸭子" . PHP_EOL;
    }
}

class GoodFly implements FlyInterface
{

    public function fly()
    {
// TODO: Implement fly() method.
        echo '我是一个飞的还可以的鸭子' . PHP_EOL;
    }
}

class BadFly implements FlyInterface
{

    public function fly()
    {
// TODO: Implement fly() method.
        echo '我是一个飞的不怎么样的鸭子' . PHP_EOL;
    }
}

class GuaGuaCall implements CallInterface
{

    public function call()
    {
// TODO: Implement call() method.
        echo '我是一个呱呱叫的鸭子';
    }
}

class LowVoiceCall implements CallInterface
{

    public function call()
    {
// TODO: Implement call() method.
        echo '我只会小声叫的鸭子' . PHP_EOL;
    }
}

class NoCall implements CallInterface
{

    public function call()
    {
// TODO: Implement call() method.
        echo '我是一个不会叫的鸭子' . PHP_EOL;
    }
}
//7. 假如现在有一个野鸭，和一个小黄鸭，那么我们就可以根据鸭子的各自属性，来组合鸭子的各自能力，就不需要去重写抽象类的方法了
class WildDuck extends Duck
{
    public function __construct()
    {
        $this->fly = new GoodFly();
        $this->call = new LowVoiceCall();
    }
}

class YellowDuck extends Duck
{
    public function __construct()
    {
        $this->fly = new BadFly();
        $this->call = new NoCall();
    }
}
//8. 最后测试
class Client
{
    public function __construct()
    {
        $wildDuck = new WildDuck();

        $wildDuck->display('野鸭');
        $wildDuck->fly();
        $wildDuck->swim();
        $wildDuck->call();

        $yellowDuck = new YellowDuck();

        $yellowDuck->display('小黄鸭');
        $yellowDuck->fly();
        $yellowDuck->swim();
        $yellowDuck->call();
    }
}

require '../vendor/autoload.php';
new Client();
// 我是： 野鸭
//我是一个飞的还可以的鸭子
//我只会小声叫的鸭子
//我是： 小黄鸭
//我是一个飞的不怎么样的鸭子
//我是
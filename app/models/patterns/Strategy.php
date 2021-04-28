<?php
/**
 * 策略模式
 * Created by PhpStorm.
 * User: admin
 * Date: 2021/4/27
 * Time: 下午8:59
 */

namespace Pattern;

//策略模式
//策略模式的三个角色：
//1．抽象策略角色
//2．具体策略角色
//3．环境角色（对抽象策略角色的引用）


//抽象策略类(抽奖角色)
abstract class BaseAgent
{
    //抽象策略类
    //抽象类 抽象方法
    abstract function printPage();
}

//用于客户端是火狐时调用的类（环境角色）
class FireFoxAgent extends BaseAgent
{
    function printPage()
    {
        return '火狐';
    }
}

//用于客户端是谷歌时调用的类（环境角色）
class GoogleAgent extends BaseAgent
{
    function printPage()
    {
        return '谷歌';
    }
}

//具体策略角色
class Browser
{
    function call($object)
    {
        return $object->printPage();

    }

}

$bro = new Browser ();
echo $bro->call(new FireFoxAgent ());

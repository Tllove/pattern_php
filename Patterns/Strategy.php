<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2021/4/6
 * Time: 9:35 PM
 */

//策略模式
//策略模式的三个角色：
//1．抽象策略角色
//2．具体策略角色
//3．环境角色（对抽象策略角色的引用）


abstract class baseAgent
{ //抽象策略类
    //抽象类 抽象方法
    abstract function PrintPage();
}

//用于客户端是 IE时调用的类（环境角色）
class ieAgent extends baseAgent
{
    function PrintPage()
    {
        return 'IE';
    }
}

//用于客户端不是IE 时调用的类（环境角色）
class otherAgent extends baseAgent
{
    function PrintPage()
    {
        return 'not IE';
    }
}

class Browser
{ //具体策略角色
    public function call($object)
    {
        return $object->PrintPage();
    }
}

$bro = new Browser ();
echo $bro->call(new ieAgent ());
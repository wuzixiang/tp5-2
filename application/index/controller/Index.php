<?php
namespace app\index\controller;
use \app\index\controller\User;
use think\Config;
use \app\admin\controller\Index as AdminIndex;
class Index
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    }
    public function get(){
        dump(Config::get('app'));
    }
    public function test(){
    	return '我是用户自己创建的方法';
    }
    public function diaoyong(){
    	//调用前台模块的User控制器
    	$a = new \app\index\controller\User;
    	echo $a->index();

    	echo '<hr />';

    	$b= new User;
    	echo $b->index();

    	echo '<hr />';

    	//使用系统方法
    	$c = controller('User');
    	echo $c->index();


    }
    public function diaoyongs(){
    	//调用后台模块的Index控制器
    	//1.使用命名空间
    	$a = new \app\admin\controller\Index;
    	echo $a->index();
    	echo '<hr>';
    	//2.use
    	$b = new AdminIndex;
    	echo $b->index();
    	echo '<hr>';
    	//3系统函数
    	$b = controller('admin/Index');
    	echo $b->index();
    }

    public function fangfa(){
        //调用当前控制器的方法
        echo $this->test();
        echo '<hr>';
        echo self::test();
        echo '<hr>';
        echo Index::test();
        echo '<hr>';
        echo action('test');
    }
    public function fangfas(){
        //调用其他控制器中的方法
        $a = new \app\admin\controller\Index;
        echo $a->index();
        echo '<hr>';
        $a= new AdminIndex;
        echo $a->index();
        echo '<hr>';
        echo action('admin/Index/index');
    }

}

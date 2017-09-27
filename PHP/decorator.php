<?php
/**
 * 装饰器模式
 */

//原始类
class Base
{
    public $obj;
    public $content;

    public function __construct($con){
        $this->content = $con;
    }
}

//编辑类
class editorBase extends Base
{
    public function __construct($obj){
        $this->obj = $obj;
        $this->decorate();
    }

    public function decorate(){
      return $this->content = $this->obj->content.'-编辑内容';
    }
}
//检查类
class checkBase extends Base
{
    public function __construct($obj){
        $this->obj = $obj;
        $this->decorate();
    }

    public function decorate(){
        return $this->content = $this->obj->content.'-审核通过';
    }
}
//上线类
class onlineBase extends Base
{
    public function __construct($obj){
      $this->obj = $obj;
    }

    public function decorate(){
      return $this->content = $this->obj->content.'-安排上线';
    }
}

$obj = new onlineBase(new checkBase(new editorBase(new Base('原始内容'))));
echo $obj->decorate(); 

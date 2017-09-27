<?php
/**
 * 桥接模式
 */
class Info
{
  public $level;
  public $way;

  public function  sending($content,$to){
      $content = $this->level->msg($content);
      $to = $this->way->msg($to);
      echo $content.$to;
  }
}

class Normal
{
  public function  msg($content){
     return '正常消息：'.$content;
  }
}

class Special
{
  public function msg($content){
    return '特殊消息：'.$content;
  }
}

class Weixin
{
  public function  msg($to){
      return '微信发给'.$to;
  }
}

class QQ
{
  public function  msg($to){
      return 'QQ发给'.$to;
  }
}

$info = new Info();
$info->level = new Special();
$info->way = new Weixin();
$info->sending('十一去旅行','Renssh');

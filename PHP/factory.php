<?php
/**简单工厂模式-简单的计算器
* @param  string operate 操作符
* @return obj
**/

//工厂类，用来创建对象
class Factory
{
    private $operate;
    public __construct($operate){
      $this->operate = $operate;
    }

    public static createObj(){
          switch ($this->operate) {
            case '+':
              return new OperationAdd();
              break;
            case '-':
              return new OperationMin();
              break;
            case '*':
              return new OperationMul();
              break;
            case '/':
              return new OperationDiv();
              break;
            default:
              break;
          }
    }
}
//功能类，用来做具体运算
class OperationAdd
{
  public function getValue($num1=0,$num2=0){
    return intval($num1) + intval($num2);
  }
}

$operation = Factory::createObj('+');
$result = $operation->getValue(1,2);







?>

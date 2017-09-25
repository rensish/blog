<?php
/**�򵥹���ģʽ-�򵥵ļ�����
* @param  string operate ������
* @return obj
**/

//�����࣬������������
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
//�����࣬��������������
class OperationAdd
{
  public function getValue($num1=0,$num2=0){
    return intval($num1) + intval($num2);
  }
}

$operation = Factory::createObj('+');
$result = $operation->getValue(1,2);







?>

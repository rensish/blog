<?
/**
 * @description �۲���ģʽ��������-����ģʽ����һ�������״̬�����ı�ʱ�������������Ķ����ܵõ�֪ͨ������
 */

 interface Subject
 {
     /**
      * ����һ���µĹ۲��߶���
      * @param Observer $observer
      */
     public function attach($observer);
     /**
      * ɾ��һ���۲���
     * @param Observer $observer
     */
     public function detach($observer);
     /**
      * ֪ͨ���еĹ۲���
     * @param Observer $observer
     */
     public function notifyObservers();
 }


 class ConcreteSubject implements Subject
 {
     private $observers;

     public function __construct(){
         $this->observers = array();
     }

     public function attach($observer){
         return $this->observers[] = $observer;
     }

     public function detach($observer){
         $key = array_search($observer,$this->observers);
         if($key === false || !in_array($observer,$this->observers)){
             return false;
         }
         unset($this->observers[$key]);
         return true;
     }

     public function notifyObservers(){
         if(!is_array($this->observers)){
             return false;
         }
         foreach ($this->observers as $observer) {
             $observer->update();
         }
         return true;
     }
 }


 /**
  * ����۲��߽�ɫ
  */
 interface Observer
 {
     public function update();
 }


 /**
  * ����۲��߽�ɫ
  */
 class ConcreteObserver implements Observer{
     private $name;

     public function __construct($name){
         $this->name = $name;
     }

     public function update(){
         echo $this->name .' is updated!';
         echo '</br>';
     }
 }


 $subject = new ConcreteSubject();
 $observer = new ConcreteObserver('Renhaha');
 $subject -> attach($observer);

 $observer1 = new ConcreteObserver('Renheihei');
 $subject -> attach($observer1);

 $subject -> detach($observer);
 $subject -> notifyObservers();

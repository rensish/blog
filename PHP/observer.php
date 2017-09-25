<?
/**
 * @description 观察者模式，即订阅-发布模式，当一个对象的状态发生改变时，所有依赖它的对象都能得到通知并更新
 */

 interface Subject
 {
     /**
      * 增加一个新的观察者对象
      * @param Observer $observer
      */
     public function attach($observer);
     /**
      * 删除一个观察者
     * @param Observer $observer
     */
     public function detach($observer);
     /**
      * 通知所有的观察者
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
  * 抽象观察者角色
  */
 interface Observer
 {
     public function update();
 }


 /**
  * 具体观察者角色
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
 $observer = new ConcreteObserver('renhaha');
 $subject -> attach($observer);

 $observer1 = new ConcreteObserver('renheihei');
 $subject -> attach($observer1);

 $subject -> detach($observer);
 $subject -> notifyObservers();

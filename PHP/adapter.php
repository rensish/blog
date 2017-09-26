<?
/**
 * 适配器模式
 */
 class JsonData
 {

     public $data;
     public function __construct($data){
         $this->data = $data;
     }

     public function display(){
         echo json_encode($this->data);
     }
 }


 class serializeData extends JsonData
 {
     public function __construct($data){
       parent::__construct($data);
     }

     public function display(){
         echo serialize($this->data);
     }
 }

 $array = array('time','money','family');
 $obj = new serializeData($array);
 $obj->display();

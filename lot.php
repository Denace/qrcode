<?PHP
class lot{

    var $supplier;
    var $OT;
    public $Invoice;
    public $GardenName;
    public $Bagnumber;
    Public $Netweight;
/*
    public function __construct(){

        $this->setsupplier($s);
        $this->setOt($o);
        $this->setInvoice($i);
    }
*/
    //Need to declare all getter and setter methods
    public function getsupplier(){
        return $supplier;
    }
    public function getOT(){
        return $OT;
    }
    public function getInvoice(){
        return $Invoice;
    }
   

    public function setsupplier($s){
        $this->supplier=$s;
    }
    public function setOt($o){
        $this->OT=$o;
    }
    public function setInvoice($i){
        $this->$nvoice=$i;
    }

}
?>
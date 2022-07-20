<?php

class Fund{

    // Private property ,function and method only we can use own class.
    // Internal method and function of class can access private scope
    private $fund;

    function __construct($initialFund = 0){
        $this->fund = $initialFund;
    }

    public function addFund($money){
        $this->fund = $this->fund + $money;

    }
    public function deductFund($money){
        $this->fund = $this->fund - $money;

    }

    private function getTotal(){
        echo "Total fund is {$this->fund}\n";
    }

    public function test()
    {
        $this->getTotal();
    }
}

$ourFund = new Fund(200);
$ourFund->addFund(20);
$ourFund->deductFund(30);

//$ourFund->getTotal();

$ourFund->test();

?>
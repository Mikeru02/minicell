<?php
require_once 'src/models/voucher.php';

class VoucherController{
    private $voucher;

    public function __construct(){
        $this->voucher = new Voucher();
    }

    public function create($code, $name, $desc, $valid){
        $result = $this->voucher->create($code, $name, $desc, $valid);
        return $result; 
    }

    public function fetchVoucher(){
        $result = $this->voucher->fetchVoucher();
        return $result;
    }
}
?>
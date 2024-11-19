<?php
require_once 'src/models/order.php';

class OrderController{
    private $order;

    public function __construct(){
        $this->order = new Order();
    }

    public function create($userId, $productId, $address, $payment, $email){
        $result = $this->order->create($userId, $productId, $address, $payment, $email);
        return $result;
    }
}
?>
<?php
require_once 'src/models/order.php';

class OrderController{
    private $order;

    public function __construct(){
        $this->order = new Order();
    }

    public function generateOrderId() {
        return uniqid('ORD-', true);
    }

    public function create($orderId, $userId, $address, $payment, $email, $subtotal){
        $result = $this->order->create($orderId, $userId, $address, $payment, $email, $subtotal);
        return $result;
    }

    public function addProdOrders($orderId, $productId, $quantity, $size){
        $result = $this->order->addProdOrders($orderId, $productId, $quantity, $size);
        return $result;
    }

    public function fetchOrders($userId){
        $result = $this->order->fetchOrders($userId);
        return $result;
    }

    public function fetchOrderDetails($orderId){
        $result = $this->order->fetchOrderDetails($orderId);
        return $result;
    }

    public function updateOrderStatus($orderId, $status){
        $result = $this->order->updateOrderStatus($orderId, $status);
        return $result;
    }
}
?>
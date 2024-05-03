<?php
require_once __DIR__ . '/../Model/Sales.php';

class SalesController {
    private $salesModel;

    public function __construct($pdo) {
        $this->salesModel = new Sales($pdo);
    }

    // Method untuk mendapatkan semua data penjualan
    public function getAllSales() {
        return $this->salesModel->getAllSales();
    }

    // Method untuk mendapatkan data penjualan berdasarkan ID
    public function getSalesById($orderId) {
        return $this->salesModel->getSalesById($orderId);
    }

    // Method untuk menambahkan data penjualan baru
    public function addSales($data) {
        return $this->salesModel->addSale(
            $data['productName'], $data['productDescription'], $data['grossProductPrice'], 
            $data['taxPerProduct'], $data['quantityPurchased'], $data['grossRevenue'], 
            $data['totalTax'], $data['netRevenue'], $data['productCategory'], 
            $data['skuNumber'], $data['weight'], $data['color'], $data['size'], 
            $data['rating'], $data['stock'], $data['salesRep'], $data['address'], 
            $data['zipcode'], $data['phone'], $data['email'], $data['loyaltyPoints'], 
            $data['customerId'], $data['countryId']
        );
    }

    // Method untuk memperbarui data penjualan berdasarkan ID
    public function updateSales($orderId, $data) {
        return $this->salesModel->updateSale(
            $orderId, $data['productName'], $data['productDescription'], 
            $data['grossProductPrice'], $data['taxPerProduct'], $data['quantityPurchased'], 
            $data['grossRevenue'], $data['totalTax'], $data['netRevenue'], 
            $data['productCategory'], $data['skuNumber'], $data['weight'], 
            $data['color'], $data['size'], $data['rating'], $data['stock'], 
            $data['salesRep'], $data['address'], $data['zipcode'], $data['phone'], 
            $data['email'], $data['loyaltyPoints'], $data['customerId'], $data['countryId']
        );
    }

    // Method untuk menghapus data penjualan berdasarkan ID
    public function deleteSales($orderId) {
        return $this->salesModel->deleteSale($orderId);
    }
}
?>

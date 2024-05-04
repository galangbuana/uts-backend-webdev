<?php
require_once __DIR__ . '/../Model/Purchases.php';

class PurchaseController {
    private $purchaseModel;

    public function __construct($pdo) {
        $this->purchaseModel = new Purchases($pdo);
    }

    // Method untuk mendapatkan semua data pembelian
    public function getAllPurchases() {
        return $this->purchaseModel->getAllPurchases();
    }

    // Method untuk mendapatkan data pembelian berdasarkan ID
    public function getPurchaseById($purchaseId) {
        return $this->purchaseModel->getPurchaseById($purchaseId);
    }

    // Method untuk menambahkan data pembelian baru
    public function addPurchase(
        $supplier, $lastVisited, $returnStatus, $warranty, 
        $purchaseDate, $returnPolicy, $feedback, $orderId) {
        return $this->purchaseModel->addPurchase(
            $supplier, $lastVisited, $returnStatus, $warranty, 
            $purchaseDate, $returnPolicy, $feedback, $orderId
        );
    }

    // Method untuk memperbarui data pembelian berdasarkan ID
    public function updatePurchase(
        $purchaseId, $supplier, $lastVisited, $returnStatus, $warranty, 
        $purchaseDate, $returnPolicy, $feedback, $orderId) {
        return $this->purchaseModel->updatePurchase(
            $purchaseId, $supplier, $lastVisited, $returnStatus, $warranty, 
            $purchaseDate, $returnPolicy, $feedback, $orderId
        );
    }

    // Method untuk menghapus data pembelian berdasarkan ID
    public function deletePurchase($purchaseId) {
        return $this->purchaseModel->deletePurchase($purchaseId);
    }
}
?>

<?php
// Purchases.php
require_once __DIR__ . '/../../config/database.php';

class Purchases {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAllPurchases() {
        $stmt = $this->pdo->query("SELECT * FROM purchases");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPurchaseById($purchaseId) {
        $stmt = $this->pdo->prepare("SELECT * FROM purchases WHERE purchase_id = purchaseId");
        $stmt->execute([$purchaseId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addPurchase(
        $supplier, $lastVisited, $returnStatus, $warranty, 
        $purchaseDate, $returnPolicy, $feedback, $orderId) {
        $stmt = $this->pdo->prepare("
        INSERT INTO purchases (
            supplier, last_visited, return_status, warranty, 
            purchase_date, return_policy, feedback, order_id) 
        VALUES (
            :supplier, :lastVisited, :returnStatus, :warranty, 
            :purchaseDate, :returnPolicy, :feedback, :orderId)"
        );
        $stmt->execute([
            'suplier' => $supplier, 
            'last_visited' => $lastVisited, 
            'return_status' => $returnStatus, 
            'warranty' => $warranty, 
            'purchase_date' => $purchaseDate, 
            'return_policy' => $returnPolicy, 
            'feedback' => $feedback, 
            'order_id' => $orderId
        ]);
        return $this->pdo->lastInsertId();
    }

    public function updatePurchase(
        $purchaseId, $supplier, $lastVisited, $returnStatus, 
        $warranty, $purchaseDate, $returnPolicy, $feedback, $orderId) {
        $stmt = $this->pdo->prepare("
        UPDATE purchases SET 
        supplier = :supplier, 
        last_visited = :lastVisited, 
        return_status = :returnStatus, 
        warranty = :warranty, 
        purchase_date = :purchaseDate, 
        return_policy = :returnPolicy, 
        feedback = :feedback, 
        order_id = :orderId 
        WHERE purchase_id = :purchaseId"
        );
        $stmt->execute([
            'supplier' =>$supplier, 
            'last_visited' => $lastVisited, 
            'return_status' => $returnStatus, 
            'warranty' => $warranty, 
            'purchase_date' => $purchaseDate, 
            'return_policy' => $returnPolicy, 
            'feedback' => $feedback, 
            'order_id' => $orderId, 
            'purchase_id' => $purchaseId
        ]);
        return $stmt->rowCount() > 0;
    }

    public function deletePurchase($purchaseId) {
        $stmt = $this->pdo->prepare("DELETE FROM purchases WHERE purchase_id = :purchaseId");
        $stmt->execute([$purchaseId]);
        return $stmt->rowCount() > 0;
    }
}

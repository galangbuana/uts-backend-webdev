<?php
// Purchases.php
include 'config/database.php';

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
        $stmt = $this->pdo->prepare("SELECT * FROM purchases WHERE purchase_id = ?");
        $stmt->execute([$purchaseId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addPurchase($supplier, $lastVisited, $returnStatus, $warranty, $purchaseDate, $returnPolicy, $feedback, $orderId) {
        $stmt = $this->pdo->prepare("INSERT INTO purchases (supplier, last_visited, return_status, warranty, purchase_date, return_policy, feedback, order_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$supplier, $lastVisited, $returnStatus, $warranty, $purchaseDate, $returnPolicy, $feedback, $orderId]);
        return $this->pdo->lastInsertId();
    }

    public function updatePurchase($purchaseId, $supplier, $lastVisited, $returnStatus, $warranty, $purchaseDate, $returnPolicy, $feedback, $orderId) {
        $stmt = $this->pdo->prepare("UPDATE purchases SET supplier = ?, last_visited = ?, return_status = ?, warranty = ?, purchase_date = ?, return_policy = ?, feedback = ?, order_id = ? WHERE purchase_id = ?");
        $stmt->execute([$supplier, $lastVisited, $returnStatus, $warranty, $purchaseDate, $returnPolicy, $feedback, $orderId, $purchaseId]);
        return $stmt->rowCount() > 0;
    }

    public function deletePurchase($purchaseId) {
        $stmt = $this->pdo->prepare("DELETE FROM purchases WHERE purchase_id = ?");
        $stmt->execute([$purchaseId]);
        return $stmt->rowCount() > 0;
    }
}

<?php
// Sales.php
include 'config/database.php';

class Sales {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAllSales() {
        $stmt = $this->pdo->query("SELECT * FROM sales");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSalesById($orderId) {
        $stmt = $this->pdo->prepare("SELECT * FROM sales WHERE order_id = ?");
        $stmt->execute([$orderId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addSale($productName, $productDescription, $grossProductPrice, $taxPerProduct, $quantityPurchased, $grossRevenue, $totalTax, $netRevenue, $productCategory, $skuNumber, $weight, $color, $size, $rating, $stock, $salesRep, $address, $zipcode, $phone, $email, $loyaltyPoints, $customerId, $countryId) {
        $stmt = $this->pdo->prepare("INSERT INTO sales (product_name, product_description, gross_product_price, tax_per_product, quantity_purchased, gross_revenue, total_tax, net_revenue, product_category, sku_number, weight, color, size, rating, stock, sales_rep, address, zipcode, phone, email, loyalty_points, customer_id, country_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$productName, $productDescription, $grossProductPrice, $taxPerProduct, $quantityPurchased, $grossRevenue, $totalTax, $netRevenue, $productCategory, $skuNumber, $weight, $color, $size, $rating, $stock, $salesRep, $address, $zipcode, $phone, $email, $loyaltyPoints, $customerId, $countryId]);
        return $this->pdo->lastInsertId();
    }

    public function updateSale($orderId, $productName, $productDescription, $grossProductPrice, $taxPerProduct, $quantityPurchased, $grossRevenue, $totalTax, $netRevenue, $productCategory, $skuNumber, $weight, $color, $size, $rating, $stock, $salesRep, $address, $zipcode, $phone, $email, $loyaltyPoints, $customerId, $countryId) {
        $stmt = $this->pdo->prepare("UPDATE sales SET product_name = ?, product_description = ?, gross_product_price = ?, tax_per_product = ?, quantity_purchased = ?, gross_revenue = ?, total_tax = ?, net_revenue = ?, product_category = ?, sku_number = ?, weight = ?, color = ?, size = ?, rating = ?, stock = ?, sales_rep = ?, address = ?, zipcode = ?, phone = ?, email = ?, loyalty_points = ?, customer_id = ?, country_id = ? WHERE order_id = ?");
        $stmt->execute([$productName, $productDescription, $grossProductPrice, $taxPerProduct, $quantityPurchased, $grossRevenue, $totalTax, $netRevenue, $productCategory, $skuNumber, $weight, $color, $size, $rating, $stock, $salesRep, $address, $zipcode, $phone, $email, $loyaltyPoints, $customerId, $countryId, $orderId]);
        return $stmt->rowCount() > 0;
    }

    public function deleteSale($orderId) {
        $stmt = $this->pdo->prepare("DELETE FROM sales WHERE order_id = ?");
        $stmt->execute([$orderId]);
        return $stmt->rowCount() > 0;
    }
}

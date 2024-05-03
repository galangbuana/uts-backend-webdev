<?php
// Sales.php
require_once __DIR__ . '/../../config/database.php';

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
        $stmt = $this->pdo->prepare("SELECT * FROM sales WHERE order_id = :orderId");
        $stmt->execute([$orderId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addSale(
        $productName, $productDescription, $grossProductPrice, $taxPerProduct, 
        $quantityPurchased, $grossRevenue, $totalTax, $netRevenue, $productCategory, 
        $skuNumber, $weight, $color, $size, $rating, $stock, $salesRep, $address, 
        $zipcode, $phone, $email, $loyaltyPoints, $customerId, $countryId) 
        {
        $stmt = $this->pdo->prepare("
        INSERT INTO sales (
            product_name, product_description, gross_product_price, tax_per_product, 
            quantity_purchased, gross_revenue, total_tax, net_revenue, product_category, 
            sku_number, weight, color, size, rating, stock, sales_rep, address, zipcode, 
            phone, email, loyalty_points, customer_id, country_id) 
        VALUES (
            :productName, :productDescription, :grossProductPrice, :taxPerProduct, 
            :quantityPurchased, :grossRevenue, :totalTax, :netRevenue, :productCategory, 
            :skuNumber, :weight, :color, :size, :rating, :stock, :salesRep, :address, 
            :zipcode, :phone, :email, :loyaltyPoints, :customerId, :countryId)"
        );

        $stmt->execute([
            'productName' => $productName, 
            'productDescription' => $productDescription, 
            'grossProductPrice' => $grossProductPrice, 
            'taxPerProduct' => $taxPerProduct, 
            'quantityPurchased' => $quantityPurchased, 
            'grossRevenue' => $grossRevenue, 
            'totalTax' => $totalTax, 
            'netRevenue' => $netRevenue, 
            'productCategory' => $productCategory, 
            'skuNumber' => $skuNumber, 
            'weight' => $weight, 
            'color' => $color, 
            'size' => $size, 
            'rating' => $rating, 
            'stock' => $stock, 
            'salesRep' => $salesRep, 
            'address' => $address, 
            'zipcode' => $zipcode, 
            'phone' => $phone, 
            'email' => $email, 
            'loyaltyPoints' => $loyaltyPoints, 
            'customerId' => $customerId, 
            'countryId' => $countryId
        ]);
        return $this->pdo->lastInsertId();
    }

    public function updateSale(
        $orderId, $productName, $productDescription, $grossProductPrice, $taxPerProduct, 
        $quantityPurchased, $grossRevenue, $totalTax, $netRevenue, $productCategory, 
        $skuNumber, $weight, $color, $size, $rating, $stock, $salesRep, $address, 
        $zipcode, $phone, $email, $loyaltyPoints, $customerId, $countryId) {
        $stmt = $this->pdo->prepare("
            UPDATE sales SET 
            product_name = :productName, 
            product_description = :productDescription, 
            gross_product_price = :grossProductPrice, 
            tax_per_product = :taxPerProduct, 
            quantity_purchased = :quantityPurchased, 
            gross_revenue = :grossRevenue, 
            total_tax = :totalTax, 
            net_revenue = :netRevenue, 
            product_category = :productCategory,
            sku_number = :skuNumber, 
            weight = :weight, 
            color = :color, 
            size = :size, 
            rating = :rating, 
            stock = :stock, 
            sales_rep = :salesRep, 
            address = :address, 
            zipcode = :zipcode, 
            phone = :phone, 
            email = :email, 
            loyalty_points = :loyaltyPoints, 
            customer_id = :customerId, 
            country_id = :countryId 
            WHERE order_id = :customerId"
        );
        
        $stmt->execute([
            'product_name' => $productName, 
            'product_description' => $productDescription, 
            'gross_product_price' => $grossProductPrice, 
            'tax_per_product' => $taxPerProduct, 
            'quantity_purchased' => $quantityPurchased, 
            'gross_revenue' => $grossRevenue, 
            'total_tax' => $totalTax, 
            'net_revenue' => $netRevenue, 
            'product_category' => $productCategory, 
            'sku_number' => $skuNumber, 
            'weight' => $weight, 
            'color' => $color, 
            'size' => $size, 
            'rating' => $rating, 
            'stock' => $stock, 
            'sales_rep' => $salesRep, 
            'address' => $address, 
            'zipcode' => $zipcode, 
            'phone' => $phone, 
            'email' => $email, 
            'loyalty_points' => $loyaltyPoints, 
            'customer_id' => $customerId, 
            'country_id' => $countryId, 
            'order_id' => $orderId
        ]);
        return $stmt->rowCount() > 0;
    }

    public function deleteSale($orderId) {
        $stmt = $this->pdo->prepare("DELETE FROM sales WHERE order_id = :orderId");
        $stmt->execute([$orderId]);
        return $stmt->rowCount() > 0;
    }
}

<?php
// Customers.php
require_once __DIR__ . '/../../config/database.php';

class Customers {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAllCustomers() {
        $stmt = $this->pdo->query("SELECT * FROM customers");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCustomerById($customerId) {
        $stmt = $this->pdo->prepare("SELECT * FROM customers WHERE customer_id = :customerId");
        $stmt->execute([$customerId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addCustomer(
        $firstName, $lastName, $gender, 
        $email, $phoneNumber, $address, 
        $education, $occupation, $dateOfBirth, 
        $monthlyIncome, $creditScore, $maritalStatus) {
        $stmt = $this->pdo->prepare("
        INSERT INTO customers (
            first_name, last_name, gender, 
            email, phone_number, address, 
            education, occupation, date_of_birth, 
            monthly_income, credit_score, marital_status) 
        VALUES (
            :firstName, :lastName, :gender, 
            :email, :phoneNumber, :address, 
            :education, :occupation, :dateOfBirth, 
            :monthlyIncome, :creditScore, :maritalStatus)"
        );

        $stmt->execute([
            'first_name' => $firstName, 
            'last_name' => $lastName, 
            'gender' => $gender, 
            'email' => $email, 
            'phone_number' => $phoneNumber, 
            'address' => $address, 
            'education' => $education, 
            'occupation' => $occupation, 
            'date_of_birth' => $dateOfBirth, 
            'monthly_income' => $monthlyIncome, 
            'credit_score' => $creditScore, 
            'marital_status' => $maritalStatus
        ]);

        return $this->pdo->lastInsertId();
    }

    public function updateCustomer(
        $customerId, $firstName, $lastName, 
        $gender, $email, $phoneNumber, $address, 
        $education, $occupation, $dateOfBirth, 
        $monthlyIncome, $creditScore, $maritalStatus) {
        $stmt = $this->pdo->prepare("
        UPDATE customers SET 
        first_name = :firstName, 
        last_name = :lastName, 
        gender = :gender, 
        email = :email, 
        phone_number = :phoneNumber, 
        address = :address, 
        education = :education, 
        occupation = :occupation, 
        date_of_birth = :dateOfBirth, 
        monthly_income = :monthlyIncome, 
        credit_score = :creditScore, 
        marital_status = :maritalStatus
        WHERE customer_id = :customerId"
        );

        $stmt->execute([
            'first_name' => $firstName, 
            'last_name' => $lastName, 
            'gender' => $gender, 
            'email' => $email, 
            'phone_number' => $phoneNumber, 
            'address' => $address, 
            'education' => $education, 
            'occupation' => $occupation, 
            'date_of_birt' => $dateOfBirth, 
            'monthly_income' => $monthlyIncome, 
            'credit_score' => $creditScore, 
            'marital_status' => $maritalStatus
        ]);
        return $stmt->rowCount() > 0;
    }

    public function deleteCustomer($customerId) {
        $stmt = $this->pdo->prepare("DELETE FROM customers WHERE customer_id = :customerId");
        $stmt->execute(['customer_id' => $customerId]);
        return $stmt->rowCount() > 0;
    }
}

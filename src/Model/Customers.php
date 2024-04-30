<?php
// Customers.php
include 'config/database.php';

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

    public function addCustomer($firstName, $lastName, $gender, $email, $phoneNumber, $address, $education, $occupation, $dateOfBirth, $monthlyIncome, $creditScore, $maritalStatus) {
        $stmt = $this->pdo->prepare("
        INSERT INTO customers (first_name, last_name, gender, email, phone_number, address, education, occupation, date_of_birth, monthly_income, credit_score, marital_status) 
        VALUES 
        (:first_name, :last_name, :gender, :email, :phone_number, :address, :education, :occupation, :date_of_birth, :monthly_income, :credit_score, :marital_status)"
        );

        $stmt->execute([
            'firstName' => $firstName, 
            'lastName' => $lastName, 
            'gender' => $gender, 
            'email' => $email, 
            'phoneNumber' => $phoneNumber, 
            'address' => $address, 
            'education' => $education, 
            'occupation' => $occupation, 
            'dateOfBirt' => $dateOfBirth, 
            'monthlyIncome' => $monthlyIncome, 
            'creditScore' => $creditScore, 
            'maritalStatus' => $maritalStatus
        ]);

        return $this->pdo->lastInsertId();
    }

    public function updateCustomer($customerId, $firstName, $lastName, $gender, $email, $phoneNumber, $address, $education, $occupation, $dateOfBirth, $monthlyIncome, $creditScore, $maritalStatus) {
        $stmt = $this->pdo->prepare("
        UPDATE customers SET 
        first_name = :first_name, 
        last_name = :last_name, 
        gender = :gender, 
        email = :email, 
        phone_number = :phone_number, 
        address = :address, 
        education = :education, 
        occupation = :occupation, 
        date_of_birth = :date_of_birth, 
        monthly_income = :monthly_income, 
        credit_score = :credit_score, 
        marital_status = :marital_status 
        WHERE customer_id = :customer_id"
        );

        $stmt->execute([
            'firstName' => $firstName, 
            'lastName' => $lastName, 
            'gender' => $gender, 
            'email' => $email, 
            'phoneNumber' => $phoneNumber, 
            'address' => $address, 
            'education' => $education, 
            'occupation' => $occupation, 
            'dateOfBirt' => $dateOfBirth, 
            'monthlyIncome' => $monthlyIncome, 
            'creditScore' => $creditScore, 
            'maritalStatus' => $maritalStatus
        ]);
        return $stmt->rowCount() > 0;
    }

    public function deleteCustomer($customerId) {
        $stmt = $this->pdo->prepare("DELETE FROM customers WHERE customer_id = :customer_id");
        $stmt->execute(['customer_id' => $customerId]);
        return $stmt->rowCount() > 0;
    }
}

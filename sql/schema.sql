CREATE DATABASE IF NOT EXISTS work_flow_system;

USE work_flow_system;

CREATE TABLE IF NOT EXISTS customer_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    date_of_birth text NOT NULL
);

CREATE TABLE IF NOT EXISTS customer_finance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    month VARCHAR(50) NOT NULL,
    income VARCHAR(50) NOT NULL,
    expenses VARCHAR(50) NOT NULL
);

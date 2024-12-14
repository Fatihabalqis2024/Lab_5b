<?php
class User
{
    // Variable untuk simpan ke database
    private $conn;

    // Constructor untuk memulakan connection database
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Create user baru
    public function createUser($matric, $name, $password, $role)
    {
        $password = password_hash($password, PASSWORD_DEFAULT); // Hash password

        // SQL untuk insert rekod user baru ke database
        $sql = "INSERT INTO users (matric, name, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        // Check jika SQL berjaya
        if ($stmt) {
            $stmt->bind_param("ssss", $matric, $name, $password, $role);
            $result = $stmt->execute();

            if ($result) {
                return true; // Jika berjaya
            } else {
                return "Error: " . $stmt->error; // Jika fail
            }

            $stmt->close();
        } else {
            return "Error: " . $this->conn->error; // Jika fail
        }
    }

    // Read all users
    public function getUsers()
    {
        $sql = "SELECT matric, name, role FROM users";
        $result = $this->conn->query($sql);
        return $result;
    }

    // Read a single user by matric
    public function getUser($matric)
    {
        $sql = "SELECT * FROM users WHERE matric = ?";
        $stmt = $this->conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $matric);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            $stmt->close();
            return $user;
        } else {
            return "Error: " . $this->conn->error;
        }
    }

    // Kemaskini user info
    public function updateUser($matric, $name, $role)
    {
        $sql = "UPDATE users SET name = ?, role = ? WHERE matric = ?";
        $stmt = $this->conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sss", $name, $role, $matric);
            $result = $stmt->execute();

            if ($result) {
                return true;
            } else {
                return "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            return "Error: " . $this->conn->error;
        }
    }

    // Delete user berdasarkan matric
    public function deleteUser($matric)
    {
        $sql = "DELETE FROM users WHERE matric = ?";
        $stmt = $this->conn->prepare($sql);

        // Check jika SQL berjaya disediakan
        if ($stmt) {
            $stmt->bind_param("s", $matric); // Bind parameter matric kepada SQL
            $result = $stmt->execute();

            if ($result) {
                return true; // Jika berjaya
            } else {
                return "Error: " . $stmt->error; // Jika gagal
            }

            $stmt->close();
        } else {
            return "Error: " . $this->conn->error; // Jika fail sediakan
        }
    }
}
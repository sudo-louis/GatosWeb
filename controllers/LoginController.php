<?php
session_start();
include '../config/database/db.php';

class LoginController
{
    public static function login($email, $password)
    {
        global $conn;

        if (!empty($email) && !empty($password)) {
            $query = "SELECT * FROM admins WHERE email = :email";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                // Verificar contraseña
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];

                    // Redirigir al panel de administrador
                    header("Location: ../public/logeado.php");
                    exit();
                } else {
                    return "Contraseña incorrecta.";
                }
            } else {
                return "El correo no está registrado.";
            }
        } else {
            return "Por favor, completa todos los campos.";
        }
    }
}
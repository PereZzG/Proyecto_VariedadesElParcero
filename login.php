<?php
// login.php
$host = 'localhost';
$dbname = 'variedades_el_parcero';
$user = 'root'; // Por defecto en XAMPP
$pass = ''; // Sin contraseña por defecto

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            echo "Inicio de sesión exitoso";
            header("Location: Info.php");
            exit();
        } else {
            echo "Correo electrónico o contraseña incorrectos";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
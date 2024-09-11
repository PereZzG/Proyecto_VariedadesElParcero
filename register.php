<?php
// register.php
$host = 'localhost';
$dbname = 'variedades_el_parcero';
$user = 'root'; // Por defecto en XAMPP
$pass = ''; // Sin contraseña por defecto

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $stmt = $pdo->prepare("INSERT INTO users (email, name, password) VALUES (?, ?, ?)");
        $stmt->execute([$email, $name, $password]);

        echo "Usuario registrado con éxito";
        header("Location: Index.html");
        exit();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
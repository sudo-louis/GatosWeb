<?php
include '../includes/navbarAdmins.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>

<body>
    <h1 class="text-center m-4">Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?>.</h1>
</body>
</html>
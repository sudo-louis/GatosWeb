<?php
include '../includes/navbar.php';
include '../controllers/LoginController.php';

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if (!empty($email) && !empty($password)) {
        $error = LoginController::login($email, $password);
    } else {
        $error = "Por favor, completa todos los campos.";
    }
}
?>
<h1 class="text-center m-4">Iniciar Sesión</h1>
<center>
    <form class="mt-4 bg-body-tertiary p-4 rounded w-50" action="login.php" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php if ($error): ?>
        <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
    <?php endif; ?>
</center>
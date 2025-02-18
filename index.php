<?php
session_start();
if (isset($_SESSION["user"])) {
    header("location: index.php");
    exit();
}

$errors = []; // Array to store error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST["fullname"]);
    $email = trim($_POST["email"]);
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["repeat_pwd"];

    // Input validation
    if (empty($fullname) || empty($email) || empty($pwd) || empty($pwdRepeat)) {
        $errors[] = "All fields are required!";
    }

    // Check if passwords match
    if ($pwd !== $pwdRepeat) {
        $errors[] = "Passwords do not match.";
    }

    // Check password quality
    if (!preg_match("/^[A-Za-z\d]{8,}$/", $pwd)) {
        $errors[] = "Use a strong password (numbers and letters, 8 characters minimum).";
    }

    // Check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Use a valid email.";
    }

    // Check if email already exists
    if (empty($errors)) {
        try {
            require_once "database.php";
            $query = "SELECT * FROM accounts WHERE email = :email";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $errors[] = "Email already exists!";
            }
        } catch (PDOException $e) {
            $errors[] = "Database error: " . $e->getMessage();
        }
    }

    // If no errors, insert user into database
    if (empty($errors)) {
        try {
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
            $query = "INSERT INTO accounts (fullname, email, pwd) VALUES (:fullname, :email, :pwd)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":fullname", $fullname);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":pwd", $hashedPwd);
            $stmt->execute();

            // Redirect to home.php after successful registration
            $_SESSION["success"] = "Registration successful!";
            header("Location: home.php");
            exit();
        } catch (PDOException $e) {
            $errors[] = "Database error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css" type="text/css">
    <script src="https://kit.fontawesome.com/de8e2530fe.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <!-- Display errors at the top -->
            <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error) : ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <i class="fa-solid fa-user"></i>
            <h3>Create Account</h3>

            <input type="text" name="fullname" placeholder="Full Name" value="<?php echo isset($fullname) ? htmlspecialchars($fullname) : ''; ?>">

            <input type="text" name="email" placeholder="Email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">

            <input type="password" name="pwd" placeholder="Password">

            <input type="password" name="repeat_pwd" placeholder="Repeat Password">

            <input type="submit" class="btn btn-primary" value="Sign Up" name="submit">

            <p>Already registered? <a href="login-user.php">Login here</a></p>
            <a href="delete.php" class="delete">Delete Account</a>
        </form>
    </div>
</body>

</html>
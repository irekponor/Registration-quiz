<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css" type="text/css">
    <script src="https://kit.fontawesome.com/de8e2530fe.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $pwd = $_POST["pwd"];

            require_once "database.php";

            $query = "SELECT * FROM accounts WHERE email = :email";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                if (password_verify($pwd, $user["pwd"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("location: home.php");
                    exit();
                } else {
                    echo "<div class='alert alert-danger'>Password is incorrect</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Wrong email.</div>";
            }
        }
        ?>

        <form action="login-user.php" method="post">

            <h3>Sign In</h3>

            <i class="fa-solid fa-user"></i>

            <input type="text" name="email" placeholder="Email">

            <input type="password" name="pwd" placeholder="Password">

            <input type="submit" class="btn btn-primary" value="Login" name="login">

            <p>Not yet registered? <a href="index.php">Register here</a></p>
        </form>
    </div>
</body>

</html>
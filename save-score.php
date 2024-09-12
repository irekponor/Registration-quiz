<?php
session_start();

require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = $_POST["score"];
    $failed_questions = $_POST["failed_questions"];
    $email = $_POST["email"];

    try {
        $query = "INSERT INTO quiz_scores (score, failed_questions, email) VALUES (:score, :failed_questions, :email;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":score", $score);
        $stmt->bindParam(":failed_questions", $failed_questions);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        session_unset();
        session_destroy();
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Query Failed:" . $e->getMessage());
    }
}

<?php
session_start();

require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $score = $_POST["score"];
    $failed_questions = $_POST["failed_questions"];

    try {
        $query = "INSERT INTO quiz_scores (email, score, failed_questions) VALUES (:email, :score, :failed_questions)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":score", $score);
        $stmt->bindParam(":failed_questions", $failed_questions);
        $stmt->execute();

        session_unset();
        session_destroy();
    } catch (PDOException $e) {

        error_log("Database error: " . $e->getMessage());
    } finally {
        $pdo = null;
        $stmt = null;
    }
}

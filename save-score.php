<?php
session_start();

require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = $_POST["score"];
    $failed_questions = $_POST["failed_questions"];
    $email = $_POST["email"];

    try {
        $query = "INSERT INTO quiz_scores (email, score, failed_questions) VALUES (:email, :score, :failed_questions;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":score", $score);
        $stmt->bindParam(":failed_questions", $failed_questions);
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

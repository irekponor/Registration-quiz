<?php
session_start();

require_once "database.php";

$score = $_POST["score"];
$failed_questions = $_POST["failed_questions"];
$email = $_POST["email"];

$sql = "INSERT INTO quiz_scores (email, score, failed_questions, date_created) VALUES (?, ?, ?, NOW())";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(1, $email);
$stmt->bindParam(2, $score);
$stmt->bindParam(3, $failed_questions);
$stmt->execute();

echo "Score saved successfully!";

try {
    $query = "INSERT INTO quiz_scores (email, score, failed_questions) VALUES (:email, :score, :failed_questions, NOW());";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":score", $score);
    $stmt->bindParam(":failed_questions", $failed_questions);


    $stmt->execute();

    $pdo = null;
    $stmt = null;
    
        try {
            $query = "INSERT INTO tasks (tasks) VALUES (:tasks);";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":tasks", $tasks);
            $stmt->execute();
            $pdo = null;
            $stmt = null;
            header("Location: index.php");
            die();
        } catch (PDOException $e) {
            die("Query Failed:" . $e->getMessage());
        }
    }
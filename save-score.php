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

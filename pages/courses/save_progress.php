<?php
include('../../dbcon.php');
session_start();

if(isset($_POST['course_id']) && isset($_POST['progress'])) {
    $courseId = $_POST['course_id'];
    $progress = $_POST['progress'];
    $userId = $_SESSION['user_id'];

    // Vérifiez si on un enregistrement pour la combinaison donnée (course_id, user_id)
    $checkQuery = "SELECT * FROM user_courses WHERE course_id = ? AND user_id = ?";
    $checkStmt = mysqli_prepare($connection, $checkQuery);
    mysqli_stmt_bind_param($checkStmt, "ii", $courseId, $userId);
    mysqli_stmt_execute($checkStmt);
    $checkResult = mysqli_stmt_get_result($checkStmt);

    if(mysqli_num_rows($checkResult) > 0) {
        // Si on a, On fait l'UPDATE
        $updateQuery = "UPDATE user_courses SET progress = ? WHERE course_id = ? AND user_id = ?";
        $updateStmt = mysqli_prepare($connection, $updateQuery);
        mysqli_stmt_bind_param($updateStmt, "iii", $progress, $courseId, $userId);
        mysqli_stmt_execute($updateStmt);

        if(mysqli_stmt_affected_rows($updateStmt) > 0) {
            echo "Progression mise à jour.";
        } else {
            echo "Erreur lors de la mise à jour de la progression.";
        }
    } else {
        // Si non, on fait l'INSERT
        $insertQuery = "INSERT INTO user_courses (course_id, user_id, progress) VALUES (?, ?, ?)";
        $insertStmt = mysqli_prepare($connection, $insertQuery);
        mysqli_stmt_bind_param($insertStmt, "iii", $courseId, $userId, $progress);
        mysqli_stmt_execute($insertStmt);

        if(mysqli_stmt_affected_rows($insertStmt) > 0) {
            echo "Progression sauvegardée.";
        } else {
            echo "Erreur lors de la sauvegarde de la progression.";
        }
    }
}

<?php
    if (session_status() === PHP_SESSION_NONE)
        session_start();


    include "koneksi.php";

    // Ambil username dan password dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mendapatkan data user berdasarkan username
    $query = "SELECT username, password, user_id FROM m_user WHERE username = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    if ($row) {
        $hashed_password = $row['password'];

        // Verifikasi password
        if (password_verify($password, $hashed_password)) {
            // Password valid, set session
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['user_id'];
            header("Location: ../leaderboard.php");
            exit;
        } else {
            // Password tidak valid
            header("Location: ../login.php?error=invalidPass");
            exit;
        }
    } else {
        // Username tidak ditemukan
        header("Location: ../login.php?error=invalidUser");
        exit;
    }
?>

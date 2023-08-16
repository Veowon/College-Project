<?php
    require_once 'db.php';
    session_start();
    
    $login = $_POST['login'];
    $password = md5($_POST['password']);

    // Проверка на пользователя
    $check = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password' AND `role` = 3";
    $check_query = mysqli_query($connect,$check);
    $check_row = mysqli_num_rows($check_query);
    // Проверка на админа
    $admin_check = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password' AND `role` = 1";
    $admin_check_query = mysqli_query($connect,$admin_check);
    $admin_check_row = mysqli_num_rows($admin_check_query);

    if ($check_row > 0) {

        $user = mysqli_fetch_assoc($check_query);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "name" => $user['name']
        ];

        header('Location: ../../user.php');
    } elseif ($admin_check_row > 0) {
        $admin = mysqli_fetch_assoc($admin_check_query);

        $_SESSION['admin'] = [
            "id" => $admin['id'],
            "name" => $admin['name']
        ];

        header('Location: ../../admin_requests.php');
    } else {
        $_SESSION['message'] = 'Неверный логин или пароль';
        header('Location: ../../auth.php');
    };
?>
<?php 
    // Подключение к БД
    require_once 'db.php';

    // Если удаление контакта
    if ($_GET['request']=='delete') {
        $id = $_GET['id'];

        $out = mysqli_fetch_assoc(mysqli_query($connect, "SELECT `photo_off` FROM `orders` WHERE `id` = $id"));
        $photo = '../img/'.$out["photo_off"];
        // Проверяем на наличие фотографии в папке
        if (!unlink($photo)) {
            mysqli_query($connect, "DELETE FROM `orders` WHERE `orders`.`id` = $id");

            // Возвращаемся на главную
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            // Выполняем удаление
            mysqli_query($connect, "DELETE FROM `orders` WHERE `orders`.`id` = $id");

            // Возвращаемся на главную
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    // Иначе если удаление отдела
    } elseif ($_GET['category']=='delete') {
        $id = $_GET['id'];

        mysqli_query($connect, "DELETE FROM `category` WHERE `category`.`id` = $id");

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>
<?php 
    // Подключение к БД
    require_once 'db.php';

    if (isset($_GET['status']) and $_GET['status']=='complete') {
        // Берем данные из POST запроса
        $id = $_POST['id'];

        // Фотография
        $file = $_FILES['request_photo_complete'];
        if($file['size'] == 0) {
            echo "Файл слишком большой.";
            exit();
        }

        $getMime = explode('.', $file['name']);
        $mime = strtolower(end($getMime));
        $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
        if(!in_array($mime, $types)) {
            echo "Недопустимый тип файла.";
            exit();
        }

        $fileName = time()."_".$file['name'];
        $filePath = '../img/'.$fileName;

        if (!move_uploaded_file($file['tmp_name'], $filePath)) {
            echo "Файл не загрузился.";
            exit();
        }

        // И вставляем их в базу данных через запрос
        mysqli_query($connect, "UPDATE `orders` SET `photo_on` = '$fileName', `id_status` = '1' WHERE `orders`.`id` = $id");

        header("Location: ../../admin_requests.php");

        mysqli_close($connect);
    }
?>
<?php 
    if (isset($_GET['status']) and $_GET['status']=='reject') {
        // Берем данные из POST запроса
        $id = $_POST['id'];
        $request_comment_reject = $_POST['request_comment_reject'];

        // И вставляем их в базу данных через запрос
        mysqli_query($connect, "UPDATE `orders` SET `reject_comment` = '$request_comment_reject', `id_status` = '2' WHERE `orders`.`id` = $id");

        header("Location: ../../admin_requests.php");

        mysqli_close($connect);
    }
?>
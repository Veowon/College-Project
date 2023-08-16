<?php 
    // Подключение к БД
    require_once 'db.php';
    session_start();
  
    // Если добавляем заявку то выполняется этот код
    if (isset($_GET['request']) and $_GET['request']=='new') {
        // Берем данные из POST запроса
        $id = $_POST['id'];
        $request_name = $_POST['request_name'];
        $request_comment = $_POST['request_comment'];
        $request_category = $_POST['request_category'];
        $user_id = $_SESSION['user']['id'];

        // Фотография
        $file = $_FILES['request_photo'];
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

        // Вставляем в базу данных через запрос
        mysqli_query($connect, "INSERT INTO `orders` (`name`, `description`, `id_category`, `id_user`, `photo_off`) VALUES ('$request_name', '$request_comment', '$request_category', '$user_id', '$fileName');");
    }
?>
<script type="text/javascript">
    window.history.go(-2);
</script>
<?php 
    // Если добавляем категорию то выполняется этот код
    if (isset($_GET['category']) and $_GET['category']=='new') {
        // Берем данные из POST запроса
        $id = $_POST['id'];
        $category_name = $_POST['category_name'];

        // И вставляем их в базу данных через запрос
        mysqli_query($connect, "INSERT INTO `category` (`name_category`) VALUES ('$category_name');");
    }
?>
<script type="text/javascript">
    window.history.go(-2);
</script>
<?php 
    // Если добавляем пользователя то выполняется этот код
    if (isset($_GET['signup'])) {
        // Берем данные из POST запроса
        $username = $_POST['username'];
        $login = $_POST['login'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];

        if ($password==$password_confirm) {
            $check = "SELECT * FROM `users` WHERE `login` = '$login'";
            $check_query = mysqli_query($connect,$check);
            $check_row = mysqli_num_rows($check_query);

            if ($check_row==1) {
                $_SESSION['message'] = 'Логин уже занят, попробуйте другой.';
                header('Location: ../../reg.php');
            } else {
                $password = md5($password);
                mysqli_query($connect, "INSERT INTO `users`(`login`, `password`, `name`, `email`) VALUES ('$login','$password','$username','$email');");

                $_SESSION['message'] = 'Вы успешно зарегистрировались!';
                header('Location: ../../auth.php');
            };
        } else {
            $_SESSION['message'] = 'Пароли не совпадают';
            header('Location: ../../reg.php');
        };
    };
?>
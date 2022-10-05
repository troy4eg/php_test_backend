<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] === "GET" && !isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
} else if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['increment'])) {
    $_SESSION['counter']++;
} else if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['reset'])) {
    $_SESSION['counter'] = 0;
} else if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['remove'])) {
    $_SESSION['counter'] = 0;
}
?>

<form method='post'>
    <em>Значение: <?php echo $_SESSION['counter'] ?></em>
    <br>
    <input name='increment' type="submit" value='Инкремент'>
    <input name='reset' type="submit" value='Сброс'>
    <input name='remove' type="submit" value='Удаление сессии'>
</form>

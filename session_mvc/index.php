<?php

session_start();

class Counter {
    private static $value = 0;

    static function update_value() {
        $_SESSION['counter'] = self::$value;
    }

    static function init() {
        self::update_value();
    }

    static function increment() {
        if (isset($_SESSION['counter'])) {
            self::$value = $_SESSION['counter'];
        }
        self::$value++;
        self::update_value();
    }

    static function reset() {
        self::$value = 0;
        self::update_value();
    }
}

if ($_SERVER['REQUEST_METHOD'] === "GET" && !isset($_SESSION['counter'])) {
    Counter::init();
} else if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['increment'])) {
    Counter::increment();
} else if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['reset'])) {
    Counter::reset();
}
?>

<form method='post'>
    <em>Значение: <?php echo $_SESSION['counter'] ?></em>
    <br>
    <input name='increment' type="submit" value='Инкремент'>
    <input name='reset' type="submit" value='Сброс'>
</form>

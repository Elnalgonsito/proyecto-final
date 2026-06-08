/* This PHP code snippet is setting up an autoloader using the `spl_autoload_register` function. The
purpose of an autoloader is to automatically load PHP classes when they are needed, without the need
to explicitly include or require the class files. */
<?php
spl_autoload_register(function ($class) {
    $baseDir = __DIR__ . '/../';
    $class = str_replace('\\', '/', $class);
    $parts = explode('/', $class);
    if (!empty($parts)) {
        $parts[0] = strtolower($parts[0]);
    }
    $file = $baseDir . implode('/', $parts) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});
<?php 
spl_autoload_register(function ($_path) {
    // $path 類似 \Models\User 這種的字串
    $path = ltrim($_path, '\\');
    $namespace = '';
    // 最後一個 \ 之前的是資料夾路徑
    if ($lastBackslash = strrpos($path, '\\')) {
        $namespace = substr($path, 0, $lastBackslash);
        $class = substr($path, $lastBackslash + 1);
    }
    // 組成完成的路徑
    $path = empty($namespace)
        ? "$class.php"
        : $namespace . DIRECTORY_SEPARATOR . $class . '.php';
    // 引用檔案
    require_once $path;
});
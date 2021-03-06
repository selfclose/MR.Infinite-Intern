<?php

/**
 * Simple autoloader that follow the PHP Standards Recommendation #0 (PSR-0)
 * @see https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md for more informations.
 *
 * Code inspired from the SplClassLoader RFC
 * @see https://wiki.php.net/rfc/splclassloader#example_implementation
 */
spl_autoload_register(function ($className) {
    $className = ltrim($className, '\\');
    $fileName = '';
    if ($lastNsPos = strripos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName = __DIR__ . DIRECTORY_SEPARATOR . $fileName . $className . '.php';
    if (file_exists($fileName)) {
        require $fileName;
//        iLog('autoload: '.str_replace("\\", "/",$fileName));
        return true;
    }

    return false;
});

function iLog($string, $info = false) {
    try {flush();} catch (Exception $e) {}
    try {ob_flush();} catch (Exception $e) {}
    if ($info)
        echo "<script>console.info(\"{$string}\");</script>";
    else
        echo "<script>console.log(\"{$string}\");</script>";
}

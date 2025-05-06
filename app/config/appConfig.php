<?php
function loadEnv($path)
{
    if (!file_exists($path)) {
        echo "Error: .env file not found at $path\n";
        return;
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue; // Skip comments
        }
        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);
        putenv($name . '=' . $value); // Set environment variable
        $_ENV[$name] = $value; // Also set in $_ENV superglobal
        $_SERVER[$name] = $value; // Also set in $_SERVER superglobal
    }
}

// Load environment variables from .env file
loadEnv(dirname(__DIR__, 2) . '/.env');

?>
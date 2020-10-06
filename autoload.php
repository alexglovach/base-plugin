<?php

/**
 * Automatically locates and loads files based on their namespaces and their
 * file names whenever they are instantiated.
 *
 */
spl_autoload_register(function ($className) {
    $classPath = explode('\\', $className);
    $fileName = $classPath[count($classPath) - 1] . '.php';

    $filePath = '';
    for ($i = 1; $i < count($classPath) - 1; $i++) {

        $filePath .= trailingslashit($classPath[$i]);
    }

    $filePath .= $fileName;
    if (stream_resolve_include_path($filePath)) {
        include_once $filePath;
    }
});

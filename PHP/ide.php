<?php
    $language = strtolower($_POST['language']);
    $code = $_POST['code'];

    $random = substr(md5(mt_rand()), 0, 7);
    $filePath = "temp/" . $random . "." . $language;
    $programFile = fopen($filePath, "w");
    fwrite($programFile, $code);
    fclose($programFile);

    if($language == "php") {
        $output = shell_exec("G:\visual studio\.vscode\New folder\php\php.exe $filePath 2>&1");
        echo $output;
    }
    if($language == "python") {
        $outputExe = $random . ".py";
        $output = shell_exec("Python310\python.exe $filePath 2>&1 $outputExe");
        echo $output;
    }
    if($language == "java") {
        $output = shell_exec("jdk-11.0.1\bin\java.exe $filePath 2>&1");
        echo $output;
    }
    if($language == "node") {
        rename($filePath, $filePath.".js");
        $output = shell_exec("node $filePath.js 2>&1");
        echo $output;
    }
    if($language == "c") {
        $outputExe = $random . ".exe";
        // $output = shell_exec("MinGW\bin\gcc.exe $filePath -o $outputExe");
        shell_exec("gcc $filePath -o $outputExe");
        $output = shell_exec(__DIR__ . "//$outputExe");
        echo $output;
    }
    if($language == "cpp") {
        $outputExe = $random . ".exe";
        // shell_exec("MinGW\bin\g++.exe $filePath -o $outputExe");
        shell_exec("g++ $filePath -o $outputExe");
        $output = shell_exec(__DIR__ . "//$outputExe");
        echo $output;
    }
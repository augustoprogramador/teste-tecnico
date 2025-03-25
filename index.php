<?php

    define('PATH', 1);

    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    require_once "config/router.php";

    $router = new Router();

    $router->add('/', function() {
        constroiView('task_01');
    });

    $router->add('/task_01', function() {
        constroiView('task_01');
    });

    $router->add('/task_02', function() {
        constroiView('task_02');
    });

    $router->add('/task_03', function() {
        constroiView('task_03');
    });

    $router->add('/task_04', function() {
        constroiView('task_04');
    });

    $router->add('/task_05', function() {
        constroiView('task_05');
    });

    $router->dispatch($path);

    function constroiView($file) {
        extract($_POST);
        include_once "templates/header.template.php";
        include_once "views/$file.php";
        include_once "templates/footer.template.php";
    }

    // $dadosFat = json_decode(file_get_contents('faturamento.json'), true);

    // // EXERCÍCIO 05
    
    
    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //     $path = explode('/', $_SERVER['REQUEST_URI'])[PATH];

    //     switch($path) {
    //         case 'soma':
    //             echo "chamei soma</br>";
    //             calculaSoma();
    //             break;
    //         case 'fibo':
    //             echo "chamei fibo</br>";
    //             calculaFibonacci();
    //             break;
    //         case 'reverso':
    //             echo "chamei reverso</br>";
    //             reverteTexto();
    //             break;
    //         case 'faturamento':
    //             echo "chamei faturamento</br>";
    //             preencheResultados($dadosFat);
    //             break;
    //         default:
    //             calculaPercentualEstado($dadosFat);
    //             break;
    //     }
    // }
<?php

    declare(strict_types=1);
    
    $str = "";
    $newStr = "";

    function reverteTexto($str) {
        $newStr = "";
        $i = 0;
        while ($i < strlen($str)) {
            $newStr .= substr($str, -(++$i), 1);
        }
        return $newStr;
    }

    if (isset($_POST['text'])) {
        $str = $_POST['text'];
        $newStr = reverteTexto($str);
    }

?>

<div class="container">
    <div class="row">
        <div class="col-12 mt-5 d-flex flex-column align-items-center">
            <div class="d-flex align-items-baseline gap-4">
                <a href="/task_04">
                    <h3>Task 04</h3>
                </a>
                <h1>Task 05</h1>
            </div>
            <p>
                Escreva um programa que inverta os caracteres de um string.</br>
                IMPORTANTE:</br>
                a) Essa string pode ser informada através de qualquer entrada de sua preferência ou pode ser previamente definida no código;</br>
                b) Evite usar funções prontas, como, por exemplo, reverse;
            </p>
        </div>
        <div class="col-12 mt-5 d-flex justify-content-center">
            <form action="/task_05" method="POST">
                <input
                    type="text"
                    name="text"
                    id="text"
                    placeholder="Informe um texto"
                >
                <button type="submit">Inverte texto</button>
            </form>
        </div>
    </div>
    <?php if ($str !== ""): ?>
    <div class="row">
        <div class="col-12 mt-5 d-flex justify-content-center">
            <div class="callout">
                <h1>Texto invertido:</h1>
                <p><?php echo $str; ?></p>
                <p><?php echo $newStr; ?></p>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
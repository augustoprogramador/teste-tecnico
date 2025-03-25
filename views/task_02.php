<?php

    $msg = "";

    function calculaFibonacci($val) {
        $i = 2;
        $fibo = [0, 1, 1];
        while ($i <= $val ) {
            array_push($fibo, $fibo[$i-1] + $fibo[$i++]);
        }
        
        if (!vetorContem($fibo, $val)) {
            return "O valor informado não está na sequência de Fibonacci!";
        }
        return "O valor informado está na sequência de Fibonacci! Parabéns!!!";
    }

    function vetorContem($fibo, $num) {
        return array_find($fibo, function ($el) use ($num) {
            return $el === (int) $num;
        });
    }

    if (isset($val) && $val !== '')
        $msg = calculaFibonacci($val);

?>

<div class="container">
    <div class="row">
        <div class="col-12 mt-5 d-flex flex-column align-items-center">
            <div class="d-flex align-items-baseline gap-4">
                <a href="/task_01">
                    <h3>Task 01</h3>
                </a>
                <h1>Task 02</h1>
                <a href="/task_03">
                    <h3>Task 03</h3>
                </a>
            </div>
            <p>
                Dado a sequência de Fibonacci, onde se inicia por 0 e 1 e o próximo valor sempre será a soma dos 2 valores anteriores (exemplo: 0, 1, 1, 2, 3, 5, 8, 13, 21, 34...), escreva um programa na linguagem que desejar onde, informado um número, ele calcule a sequência de Fibonacci e retorne uma mensagem avisando se o número informado pertence ou não a sequência.</br>
                IMPORTANTE: Esse número pode ser informado através de qualquer entrada de sua preferência ou pode ser previamente definido no código;
            </p>
        </div>
        <div class="col-12 mt-5 d-flex justify-content-center">
            <form action="/task_02" method="POST">
                <input
                    type="number"
                    name="val"
                    id="val"
                    placeholder="Informe um valor"
                >
                <button type="submit">Calcular Fibonacci</button>
            </form>
        </div>
    </div>
    <?php if (isset($msg) && $msg !== ""): ?>
    <div class="row">
        <div class="col-12 mt-5 d-flex justify-content-center">
            <div class="callout">
                <?php echo $msg; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
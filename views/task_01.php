<?php

    declare(strict_types=1);

    $soma;

    function calculaSoma($indice) {
        $soma = 0;
        $k = 0;

        while ($k < $indice) {
            $k += 1;
            $soma += $k;
        }
        return $soma;
    }
    
    if (isset($indice) && $indice !== '')
        $soma = calculaSoma($indice);

?>

<div class="container">
    <div class="row">
        <div class="col-12 mt-5 d-flex flex-column align-items-center">
            <div class="d-flex align-items-baseline gap-4">
                <h1>Task 01</h1>
                <a href="/task_02">
                    <h3>Task 02</h3>
                </a>
            </div>
            <p>
                Observe o trecho de código abaixo: int INDICE = 13, SOMA = 0, K = 0; </br>
                Enquanto K < INDICE faça { K = K + 1; SOMA = SOMA + K; } </br>
                Imprimir(SOMA); </br>
                Ao final do processamento, qual será o valor da variável SOMA?
            </p>
        </div>
        <div class="col-12 mt-5 d-flex justify-content-center">
            <form action="/task_01" method="POST">
                <input
                    type="number"
                    name="indice"
                    id="indice"
                    placeholder="Informe um valor para o indice"
                >
                <button type="submit">Calcular SOMA</button>
            </form>
        </div>
    </div>
    <?php if (isset($soma) && $soma !== 0): ?>
    <div class="row">
        <div class="col-12 mt-5 d-flex justify-content-center">
            <div class="callout">
                Ao final do processamento o valor da SOMA foi: <?php echo $soma; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
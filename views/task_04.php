<?php

    declare(strict_types=1);

    $dadosFat = json_decode(file_get_contents('faturamento.json'), true);
    $faturamentosPorUF = [];
    
    function calculaPercentualEstado($dadosFat) {
        $faturamentosPorUF = $dadosFat['estados'];
        $faturamentosPorUF = array_map(function ($item) {
            $valorFormatado = str_replace(['R$', '.', ','], ['', '', '.'], $item['faturamento']);
            $item['faturamento'] = (float)$valorFormatado;
            return $item;
        }, $faturamentosPorUF);
        $arrFaturamentosPorUF = array_column($faturamentosPorUF, 'faturamento');
        $totalFaturamento = array_sum($arrFaturamentosPorUF);
        return array_map(function($item) use ($totalFaturamento) {
            $percentual = $item['faturamento'] / $totalFaturamento * 100;
            $item['percentual'] = number_format($percentual, 2, ',', '.');
            return $item;
        }, $faturamentosPorUF);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $faturamentosPorUF = calculaPercentualEstado($dadosFat);
    }

?>

<div class="container">
    <div class="row">
        <div class="col-12 mt-5 d-flex flex-column align-items-center">
            <div class="d-flex align-items-baseline gap-4">
                <a href="/task_02">
                    <h3>Task 03</h3>
                </a>
                <h1>Task 04</h1>
                <a href="/task_05">
                    <h3>Task 05</h3>
                </a>
            </div>
            <p>
                Dado o valor de faturamento mensal de uma distribuidora, detalhado por estado:
            </p>
            <ul>
                <li>SP – R$67.836,43</li>
                <li>RJ – R$36.678,66</li>
                <li>MG – R$29.229,88</li>
                <li>ES – R$27.165,48</li>
                <li>Outros – R$19.849,53</li>
            </ul>
            <p>
                Escreva um programa na linguagem que desejar onde calcule o percentual de representação que cada estado teve dentro do valor total mensal da distribuidora.
            </p>
        </div>
        <div class="col-12 mt-5 d-flex justify-content-center">
            <form action="/task_04" method="POST">
                <button type="submit">Calcular Percentual</button>
            </form>
        </div>
    </div>
    <?php if (!empty($faturamentosPorUF)): ?>
    <div class="row">
        <div class="col-12 mt-5 d-flex justify-content-center">
            <div class="callout text-center">
                <h1>Representatividade percentual mensal de cada estado:</h1>
                <?php foreach($faturamentosPorUF as $key => $estado): ?>
                    <p><?= "$key - " . $estado['percentual'] ?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

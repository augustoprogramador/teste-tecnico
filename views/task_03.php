<?php

    declare(strict_types=1);

    $dadosFat = json_decode(file_get_contents('faturamento.json'), true);
   
    function preencheResultados($dadosFat) {
        $dadosFat['resultados']['maior_faturamento'] = pegaMaiorFaturamentoMes($dadosFat);
        $dadosFat['resultados']['menor_faturamento'] = pegaMenorFaturamentoMes($dadosFat);
        $dadosFat['resultados']['dias_acima_da_media'] = calculaDiasAcimaMedia($dadosFat);
        return $dadosFat['resultados'];
    }

    function calculaMediaFaturamentoMes($faturamento) {
        return array_reduce($faturamento, function ($acu, $fat_dia) {
            return $acu + $fat_dia;
        }) / count($faturamento);
    }

    function calculaDiasAcimaMedia($dadosFat) {
        $faturamentos = array_column($dadosFat['dados'], 'faturamento');
        $mediaFaturamentos = calculaMediaFaturamentoMes($faturamentos);
        $diasAcimaMedia = array_filter($dadosFat['dados'], function ($item) use ($mediaFaturamentos) {
            return $item['faturamento'] > $mediaFaturamentos;
        });
        return count($diasAcimaMedia);
    }

    function pegaMaiorFaturamentoMes($dadosFat) {
        $faturamentos = array_column($dadosFat['dados'], 'faturamento');
        return max($faturamentos);
    }

    function pegaMenorFaturamentoMes($dadosFat) {
        $faturamentos = array_column($dadosFat['dados'], 'faturamento');
        return min($faturamentos);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dadosFat['resultados'] = preencheResultados($dadosFat);
    }


?>

<div class="container">
    <div class="row">
        <div class="col-12 mt-5 d-flex flex-column align-items-center">
            <div class="d-flex align-items-baseline gap-4">
                <a href="/task_02">
                    <h3>Task 02</h3>
                </a>
                <h1>Task 03</h1>
                <a href="/task_04">
                    <h3>Task 04</h3>
                </a>
            </div>
            <p>
                Dado um vetor que guarda o valor de faturamento diário de uma distribuidora, faça um programa, na linguagem que desejar, que calcule e retorne:
            </p>
            <ul>
                <li>O menor valor de faturamento ocorrido em um dia do mês;</li>
                <li>O maior valor de faturamento ocorrido em um dia do mês;</li>
                <li>Número de dias no mês em que o valor de faturamento diário foi superior à média mensal.</li>
            </ul>
            <p>
                IMPORTANTE:</br>
                a) Usar o json ou xml disponível como fonte dos dados do faturamento mensal;</br>
                b) Podem existir dias sem faturamento, como nos finais de semana e feriados. Estes dias devem ser ignorados no cálculo da média;
            </p>
        </div>
        <div class="col-12 mt-5 d-flex justify-content-center">
            <form action="/task_03" method="POST">
                <button type="submit">Calcular Faturamento mensal</button>
            </form>
        </div>
    </div>
    <?php if ($dadosFat['resultados']['maior_faturamento'] !== 0.0): ?>
    <div class="row">
        <div class="col-12 mt-5 d-flex justify-content-center">
            <div class="callout">
                <h1>Resultados: </h1>
                <p><?php echo "Maior faturamento mensal = " . $dadosFat['resultados']['maior_faturamento']; ?></p>
                <p><?php echo "Menor faturamento mensal = " . $dadosFat['resultados']['menor_faturamento']; ?></p>
                <p><?php echo "Dias acima da média = " . $dadosFat['resultados']['dias_acima_da_media']; ?></p>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
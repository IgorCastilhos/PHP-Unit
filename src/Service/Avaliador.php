<?php declare(strict_types=1);

namespace Alura\Leilao\Service;

use Alura\Leilao\Model\Leilao;

class Avaliador
{
    private float $maiorValor = -INF;
    private float $menorValor = INF;

    public function avalia(Leilao $leilao): void
    {
        foreach ($leilao->getLances() as $lance) {
            if ($lance->getValor() > $this->maiorValor) {
                $this->maiorValor = $lance->getValor();
            }

            if ($lance->getValor() < $this->menorValor) {
                $this->menorValor = $lance->getValor();
            }
        }
    }

    /**
     * @return float
     */
    public function getMaiorValor(): float
    {
        return $this->maiorValor;
    }

    /**
     * @return float
     */
    public function getMenorValor(): float
    {
        return $this->menorValor;
    }
}
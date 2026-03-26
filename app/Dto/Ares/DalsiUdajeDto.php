<?php

namespace App\Dto\Ares;

class DalsiUdajeDto
{
    public function __construct(
        /** @var ObchodniJmenoDto[] */
        public readonly array $obchodniJmeno,
        /** @var SidloZaznamDto[] */
        public readonly array $sidlo,
        public readonly ?string $pravniForma,
        public readonly ?string $pravniFormaRos,
        public readonly string $datovyZdroj,
        public readonly ?string $spisovaZnacka,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            obchodniJmeno: array_map(
                fn (array $item) => ObchodniJmenoDto::fromArray($item),
                $data['obchodniJmeno'],
            ),
            sidlo: array_map(
                fn (array $item) => SidloZaznamDto::fromArray($item),
                $data['sidlo'],
            ),
            pravniForma: $data['pravniForma'] ?? null,
            pravniFormaRos: $data['pravniFormaRos'] ?? null,
            datovyZdroj: $data['datovyZdroj'],
            spisovaZnacka: $data['spisovaZnacka'] ?? null,
        );
    }
}

<?php

namespace App\Dto\Ares;

class AdresaDorucovaciDto
{
    public function __construct(
        public readonly string $radekAdresy1,
        public readonly ?string $radekAdresy2,
        public readonly ?string $radekAdresy3,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            radekAdresy1: $data['radekAdresy1'],
            radekAdresy2: $data['radekAdresy2'] ?? null,
            radekAdresy3: $data['radekAdresy3'] ?? null,
        );
    }
}

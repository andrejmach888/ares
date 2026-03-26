<?php

namespace App\Dto\Ares;

class SidloZaznamDto
{
    public function __construct(
        public readonly SidloDto $sidlo,
        public readonly bool $primarniZaznam,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            sidlo: SidloDto::fromArray($data['sidlo']),
            primarniZaznam: $data['primarniZaznam'],
        );
    }
}

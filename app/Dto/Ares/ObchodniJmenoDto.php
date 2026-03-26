<?php

namespace App\Dto\Ares;

class ObchodniJmenoDto
{
    public function __construct(
        public readonly string $obchodniJmeno,
        public readonly bool $primarniZaznam,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            obchodniJmeno: $data['obchodniJmeno'],
            primarniZaznam: $data['primarniZaznam'],
        );
    }
}

<?php

namespace App\Dto\Ares;

class SidloDto
{
    public function __construct(
        public readonly string $kodStatu,
        public readonly string $nazevStatu,
        public readonly ?int $kodKraje,
        public readonly ?string $nazevKraje,
        public readonly ?int $kodOkresu,
        public readonly ?string $nazevOkresu,
        public readonly ?int $kodObce,
        public readonly ?string $nazevObce,
        public readonly ?int $kodMestskeCastiObvodu,
        public readonly ?int $kodUlice,
        public readonly ?string $nazevMestskeCastiObvodu,
        public readonly ?string $nazevUlice,
        public readonly ?int $cisloDomovni,
        public readonly ?int $kodCastiObce,
        public readonly ?int $cisloOrientacni,
        public readonly ?string $nazevCastiObce,
        public readonly ?int $kodAdresnihoMista,
        public readonly int $psc,
        public readonly string $textovaAdresa,
        public readonly bool $standardizaceAdresy,
        public readonly ?int $typCisloDomovni,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            kodStatu: $data['kodStatu'],
            nazevStatu: $data['nazevStatu'],
            kodKraje: $data['kodKraje'] ?? null,
            nazevKraje: $data['nazevKraje'] ?? null,
            kodOkresu: $data['kodOkresu'] ?? null,
            nazevOkresu: $data['nazevOkresu'] ?? null,
            kodObce: $data['kodObce'] ?? null,
            nazevObce: $data['nazevObce'] ?? null,
            kodMestskeCastiObvodu: $data['kodMestskeCastiObvodu'] ?? null,
            kodUlice: $data['kodUlice'] ?? null,
            nazevMestskeCastiObvodu: $data['nazevMestskeCastiObvodu'] ?? null,
            nazevUlice: $data['nazevUlice'] ?? null,
            cisloDomovni: $data['cisloDomovni'] ?? null,
            kodCastiObce: $data['kodCastiObce'] ?? null,
            cisloOrientacni: $data['cisloOrientacni'] ?? null,
            nazevCastiObce: $data['nazevCastiObce'] ?? null,
            kodAdresnihoMista: $data['kodAdresnihoMista'] ?? null,
            psc: $data['psc'],
            textovaAdresa: $data['textovaAdresa'],
            standardizaceAdresy: $data['standardizaceAdresy'],
            typCisloDomovni: $data['typCisloDomovni'] ?? null,
        );
    }
}

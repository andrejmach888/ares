<?php

namespace App\Dto\Ares;

class SubjektDto
{
    public function __construct(
        public readonly string $ico,
        public readonly string $obchodniJmeno,
        public readonly SidloDto $sidlo,
        public readonly string $pravniForma,
        public readonly string $pravniFormaRos,
        public readonly string $financniUrad,
        public readonly string $datumVzniku,
        public readonly string $datumAktualizace,
        public readonly ?string $dic,
        public readonly string $icoId,
        public readonly AdresaDorucovaciDto $adresaDorucovaci,
        public readonly SeznamRegistraciDto $seznamRegistraci,
        public readonly string $primarniZdroj,
        /** @var CzNaceDto[] */
        public readonly array $czNace,
        /** @var DalsiUdajeDto[] */
        public readonly array $dalsiUdaje,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            ico: $data['ico'],
            obchodniJmeno: $data['obchodniJmeno'],
            sidlo: SidloDto::fromArray($data['sidlo']),
            pravniForma: $data['pravniForma'],
            pravniFormaRos: $data['pravniFormaRos'],
            financniUrad: $data['financniUrad'],
            datumVzniku: $data['datumVzniku'],
            datumAktualizace: $data['datumAktualizace'],
            dic: $data['dic'] ?? null,
            icoId: $data['icoId'],
            adresaDorucovaci: AdresaDorucovaciDto::fromArray($data['adresaDorucovaci']),
            seznamRegistraci: SeznamRegistraciDto::fromArray($data['seznamRegistraci']),
            primarniZdroj: $data['primarniZdroj'],
            czNace: array_map(
                fn (string $kod) => new CzNaceDto($kod),
                $data['czNace'],
            ),
            dalsiUdaje: array_map(
                fn (array $item) => DalsiUdajeDto::fromArray($item),
                $data['dalsiUdaje'],
            ),
        );
    }
}

<?php

namespace App\Dto\Ares;

class SeznamRegistraciDto
{
    public function __construct(
        public readonly string $stavZdrojeRos,
        public readonly string $stavZdrojeVr,
        public readonly string $stavZdrojeRes,
        public readonly string $stavZdrojeRzp,
        public readonly string $stavZdrojeNrpzs,
        public readonly string $stavZdrojeRpsh,
        public readonly string $stavZdrojeRcns,
        public readonly string $stavZdrojeSzr,
        public readonly string $stavZdrojeDph,
        public readonly string $stavZdrojeSkDph,
        public readonly string $stavZdrojeSd,
        public readonly string $stavZdrojeIr,
        public readonly string $stavZdrojeCeu,
        public readonly string $stavZdrojeRs,
        public readonly string $stavZdrojeRed,
        public readonly string $stavZdrojeMonitor,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            stavZdrojeRos: $data['stavZdrojeRos'],
            stavZdrojeVr: $data['stavZdrojeVr'],
            stavZdrojeRes: $data['stavZdrojeRes'],
            stavZdrojeRzp: $data['stavZdrojeRzp'],
            stavZdrojeNrpzs: $data['stavZdrojeNrpzs'],
            stavZdrojeRpsh: $data['stavZdrojeRpsh'],
            stavZdrojeRcns: $data['stavZdrojeRcns'],
            stavZdrojeSzr: $data['stavZdrojeSzr'],
            stavZdrojeDph: $data['stavZdrojeDph'],
            stavZdrojeSkDph: $data['stavZdrojeSkDph'],
            stavZdrojeSd: $data['stavZdrojeSd'],
            stavZdrojeIr: $data['stavZdrojeIr'],
            stavZdrojeCeu: $data['stavZdrojeCeu'],
            stavZdrojeRs: $data['stavZdrojeRs'],
            stavZdrojeRed: $data['stavZdrojeRed'],
            stavZdrojeMonitor: $data['stavZdrojeMonitor'],
        );
    }
}

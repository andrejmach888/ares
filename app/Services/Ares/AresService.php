<?php

namespace App\Services\Ares;

use App\Dto\Ares\SubjektDto;
use App\Http\Clients\Ares\AresEconomicEntitiesClient;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class AresService
{
    public function __construct(
        private readonly AresEconomicEntitiesClient $client,
    ) {}

    public function getEconomicEntity(string $crn): SubjektDto
    {
        $cacheKey = __METHOD__ . ':' . $crn;
        $ttl = Carbon::now()->secondsUntilEndOfDay();

        /** @var array $data */
        $data = Cache::remember($cacheKey, $ttl, fn () => $this->client->getEconomicEntity($crn));

        return SubjektDto::fromArray($data);
    }
}

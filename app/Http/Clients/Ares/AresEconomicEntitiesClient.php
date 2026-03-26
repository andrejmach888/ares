<?php

namespace App\Http\Clients\Ares;

use App\Http\Clients\ApiClient;

class AresEconomicEntitiesClient extends ApiClient
{
    public function getEconomicEntity(string $crn): ?array
    {
        return $crn ? $this->get("ekonomicke-subjekty/{$crn}") : null;
    }
}

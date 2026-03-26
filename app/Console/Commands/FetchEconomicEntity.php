<?php

namespace App\Console\Commands;

use App\Exceptions\Api\ApiException;
use App\Exceptions\Api\ConnectionException;
use App\Services\Ares\AresService;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('ares:fetch-economic-entity')]
#[Description('Fetch economic entity from ARES by CRN (Company registration number)')]
class FetchEconomicEntity extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(AresService $service): int
    {
        $crn = $this->ask('Please enter CRN (Company registration number)');
        if ($error = $this->validatePrompt($crn, ['required', 'regex:/^[0-9]{8}$/'])) {
            $this->error($error);
            return self::FAILURE;
        }

        try {
            $data = $service->getEconomicEntity($crn);
        } catch (ApiException $e) {
            $this->error("API error [{$e->statusCode}]: {$e->getMessage()}");
            return self::FAILURE;
        } catch (ConnectionException $e) {
            $this->error("Connection error: {$e->getMessage()}");
            return self::FAILURE;
        }

        $this->newLine();
        $this->table(
            headers: ['IČO', 'Obchodné meno'],
            rows: [[$data->ico, $data->obchodniJmeno]],
        );
        $this->newLine();

        return self::SUCCESS;
    }
}

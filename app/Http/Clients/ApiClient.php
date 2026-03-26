<?php

namespace App\Http\Clients;

use App\Exceptions\Api\ClientException;
use App\Exceptions\Api\ConnectionException;
use App\Exceptions\Api\ServerException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Psr\Http\Message\ResponseInterface;

abstract class ApiClient
{
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('ares.base_url'),
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    protected function get(string $path, array $query = []): array
    {
        try {
            $options = $query ? ['query' => $query] : [];
            $response = $this->client->get($path, $options);

            return $this->decode($response);
        } catch (BadResponseException $e) {
            $this->handleBadResponse($e);
        } catch (\Throwable $e) {
            throw new ConnectionException($e->getMessage());
        }
    }

    private function handleBadResponse(BadResponseException $e): never
    {
        $response = $e->getResponse();
        $statusCode = $response->getStatusCode();
        $rawBody = (string) $response->getBody();

        if ($statusCode >= 400 && $statusCode < 500) {
            throw new ClientException($statusCode, $rawBody);
        }

        throw new ServerException($statusCode, $rawBody);
    }

    private function decode(ResponseInterface $response): array
    {
        return json_decode($response->getBody()->getContents(), associative: true, flags: JSON_THROW_ON_ERROR);
    }
}

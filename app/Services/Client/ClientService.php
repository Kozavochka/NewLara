<?php

namespace App\Services\Client;

use App\Models\Client;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ClientService
{
    public function getClientBuilder(): QueryBuilder
    {
        return QueryBuilder::for(Client::class)
            ->allowedSorts('id')
            ->allowedFilters([
                AllowedFilter::exact('name'),
                AllowedFilter::exact('phone'),
            ]);
    }

    /**
     * @param array $data
     * @return Client
     */
    public function create(array $data): Client
    {
        return Client::query()->create($data);
    }

    /**
     * @param Client $client
     * @param array $data
     * @return Client
     */
    public function update(Client $client ,array $data): Client
    {
        $client->update($data);
        return $client;
    }

    public function delete(Client $client): void
    {
        $client->delete();
    }
}

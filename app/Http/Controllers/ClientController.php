<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\ClientStoreRequest;
use App\Http\Requests\Client\ClientUpdateRequest;
use App\Http\Resources\Client\ClientResource;
use App\Models\Client;
use App\Services\Client\ClientService;

class ClientController extends ApiController
{
    public function __construct(private ClientService $clientService)
    {
    }

    public function index()
    {
        return $this->paginatedResponse(
            ClientResource::collection(
                $this->clientService
                    ->getClientBuilder()
                    ->paginate(perPage: $this->getPerPagePagination(), page: $this->getPerPagePagination())
            )
        );
    }

    public function show(Client $client)
    {
        return $this->response(
            ClientResource::make($client)
        );
    }

    public function store(ClientStoreRequest $request)
    {
        $this->clientService->create($request->validated());

        return $this->response();
    }

    public function update(Client $client, ClientUpdateRequest $request)
    {
        $this->clientService->update($request->validated());

        return $this->response();
    }

    public function delete(Client $client)
    {
        $this->clientService->delete($client);

        return $this->response();
    }
}

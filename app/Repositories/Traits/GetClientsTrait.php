<?php

namespace CodeFin\Repositories\Traits;

use CodeFin\Repositories\Interfaces\ClientRepository;

trait GetClientsTrait{

    /**
     * @return mixed
     */
    private function getClients(){
        /** @var ClientRepository $repository */
        $repository = app(ClientRepository::class);
        $repository->skipPresenter(true);
        return $repository->all();
    }
}
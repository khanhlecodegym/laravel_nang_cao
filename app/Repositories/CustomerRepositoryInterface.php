<?php

namespace App\Repositories;

interface CustomerRepositoryInterface
{
    public function all();

    public function findById($customerId);

    public function findByCustomerName($cutomerName);

    public function update($customerId);
}

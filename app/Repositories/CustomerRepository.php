<?php

namespace App\Repositories;

use App\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function all()
    {
        $customers = Customer::all();

        return $customers;
    }


    public function findById($customerId)
    {
        $customer =  Customer::where('id', $customerId)
            ->where('active', 1)
            ->with('user')
            ->firstOrFail();

        return $customer;
    }

    public function findByCustomerName($cutomerName)
    {
        // return Customer::where('name', 'like', '%' . $cutomerName . '%')
        //     ->where('active', 1)
        //     ->with('user')
        //     ->get()
        //     ->map(function ($customer) {
        //         // return $this->format($customer);

        //         return $customer->format();
        //     });

        return Customer::where('name', 'like', '%' . $cutomerName . '%')
            ->where('active', 1)
            ->with('user')
            ->get()
            ->map
            ->format();
    }

    public function update($customerId)
    {
        $customer = Customer::where('id', $customerId)->firstOrFail();

        $customer->update(request()->only(['name', 'active']));

        return $customer->format();
    }

    // protected function format($customer)
    // {
    //     return [
    //         'customer_id' => $customer->id,
    //         'name' => $customer->name,
    //         'created_by' => $customer->user->email,
    //         'last_updated' => $customer->updated_at->diffForHumans(),
    //     ];
    // }
}

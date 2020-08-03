<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        // $customers = Customer::all();
        // $customers = Customer::orderBy('name')->get();
        // $customers = Customer::where('active', 1)->get();

        // $customers = Customer::where('active', 1)
        //     ->with('user')
        //     ->get();

        // $customers = Customer::where('active', 1)
        //     ->with('user')
        //     ->get()
        //     ->map(function ($customer) {
        //         return [
        //             'customer_id' => $customer->id,
        //             'name' => $customer->name,
        //             'created_by' => $customer->user->email,
        //             'last_updated' => $customer->updated_at->diffForHumans(),
        //         ];
        //     });

        $customers = $this->customerRepository->all();

        // return $customers;

        return response()->json($customers, 200);
    }

    public function show($id)
    {
        $customer = $this->customerRepository->findById($id);

        return response()->json($customer, 200);
    }

    public function searchByName($name)
    {
        $customers = $this->customerRepository->findByCustomerName($name);

        return response()->json($customers, 200);
    }

    public function update($id)
    {
        $customer = $this->customerRepository->update($id);

        return response()->json($customer, 200);
    }
}

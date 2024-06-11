<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// import
use App\Models\Customer;

class CustomerController extends Controller
{

    public function create()
{
    return view('customers.create');
}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:customers',
            'password' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'is_customer' => 'sometimes|nullable|boolean', // This is the line you've provided
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')
            ->with('success', 'Customer created successfully.');
    }
}

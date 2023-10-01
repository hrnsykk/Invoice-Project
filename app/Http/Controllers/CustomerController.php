<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerCreateRequest;
use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;


class CustomerController extends Controller
{
    public function create(CustomerCreateRequest $request): RedirectResponse
    {
        $customer = new Customer($request->all());
        $customer->save();

        return redirect()->route('customer')->with(['successMessage' => 'Customer Created.']);
    }

    public function show (): Response
    {
        return Inertia::render('Customer',
            ['customers' => Customer::all()]
        );
    }

    public function delete (Request $request)
    {
        if($request->has('id'))
        {
            Customer::find($request->input('id'))->delete();

            return redirect()->back();
        }
    }
}

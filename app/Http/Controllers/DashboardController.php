<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->state_id === 1) {
            $client = Client::query()->where('user_id', $user->id)->first();
            return Inertia::render('Dashboard', ['client' => $client]);
        } else if ($user->state_id === 2) {
            $company = Company::query()->with('coupons')->where('user_id', $user->id)->first();
            return Inertia::render('CompanyDashboard', ['company' => $company]);
        } else {
            $companies = Company::query()->get();
            return Inertia::render('AdminDashboard', ['companies' => $companies]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

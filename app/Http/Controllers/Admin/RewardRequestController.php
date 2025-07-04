<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reward;
use App\Models\RewardRequest;

class RewardRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{

    $requests = RewardRequest::with(['user', 'reward'])->latest()->get();
    return view('admin.requests.index', compact('requests'));
}

public function update(Request $request, RewardRequest $rewardRequest)
{
    $validated = $request->validate([
        'status' => 'required|in:pending,approved,rejected',
        'admin_notes' => 'nullable|string'
    ]);

    $rewardRequest->update($validated);

    return back()->with('success', 'تم تحديث حالة الطلب');
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

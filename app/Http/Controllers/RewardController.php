<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reward;
use App\Models\RewardRequest;
use App\Models\User;

class RewardController extends Controller
{
    public function index()
    {
        $rewards = Reward::all();
        return view('rewards.index', compact('rewards'));
    }

    public function redeem(Request $request , Reward $reward)
    {

    $user = auth()->user();
    $existingRequest = RewardRequest::where('user_id', $user->id)
    ->where('reward_id', $reward->id)
    ->where('status', 'pending')
    ->exists();

if ($existingRequest) {
    return back()->with('error', 'لديك طلب قيد المراجعة لهذه المكافأة');
}

    $balance = $user->points()->sum('amount');
    if ($request->user()->id !== $user->id) {
    abort(403);
        }     

        // $PointsRequired = $reward->points_required;
        
        if ($balance < $reward->points_required) {
            return back()->with('error', 'نقاطك غير كافية لاستبدال هذه المكافأة');
        }
    
        if ($reward->stock >0 && $reward->is_active = true )
        {
                    // 1. تسجيل طلب المكافأة
        $request = RewardRequest::create([
            'user_id' => $user->id,
            'reward_id' => $reward->id,
            'phone' => $user->phone,
            'status' => 'pending'
        ]);

            $user->points()->create([
            'amount' => -$reward->points_required,
            'source' => 'reward:' .$reward->id
        ]);

        $reward->decrement('stock');
    return back()->with('success', 'تم تقديم طلبك بنجاح، سنتصل بك خلال 24 ساعة');


        if ($reward->stock <=0 || $reward->is_active = false) {
        return back()->with('error', 'معذرة : هذه المكافأة غير متاحة حالياً .. !');
    }
            return view('rewards.request',compact('reward'));

    }


    

}

public function showRedeemForm(Reward $reward)
{
    $user = auth()->user();

    // التحقق من الشروط المسبقة
    if ($reward->stock <= 0) {
        return redirect()->route('rewards.index')->with('error', 'هذه المكافأة غير متوفرة حالياً');
    }

    if ($user->current_points < $reward->points_required) {
        return redirect()->route('rewards.index')->with('error', 'نقاطك غير كافية');
    }

    return view('rewards.redeem', compact('reward'));
}

}

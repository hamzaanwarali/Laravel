<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PrepaidCard;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{
    public function showRedeemForm()
{
    return view('cards.redeem');
}

public function redeem(Request $request)
{
    $request->validate(['code' => 'required|string|max:20']);

    $card = PrepaidCard::where('code', $request->code)
             ->where('is_used', false)
             ->where('expires_at', '>', now())
             ->first();

    if ( !$card ) {
        return back()->with('error', 'الكرت غير صالح أو منتهي الصلاحية');
    }

    DB::transaction(function () use ($card) {
        // إضافة النقاط
        auth()->user()->points()->create([
            'amount' => $card->points,
            'source' => 'prepaid_card:'.$card->id
        ]);

        // تحديث حالة الكرت
        $card->update([
            'is_used' => true,
            'used_by' => auth()->id(),
            'used_at' => now()
        ]);
    });

    return redirect()->route('dashboard')
           ->with('success', "تم إضافة {$card->points} نقطة إلى رصيدك!");
}

}

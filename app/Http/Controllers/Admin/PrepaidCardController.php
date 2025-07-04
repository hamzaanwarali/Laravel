<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrepaidCard;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PrepaidCardController extends Controller
{
        // عرض جميع الكروت
    public function index()
    {
        $cards = PrepaidCard::when(request('search'), function($query) {
            $query->where('code', 'like', '%'.request('search').'%');
        })->latest()->paginate(10);

        return view('admin.cards.index', compact('cards'));
    }

    // عرض نموذج الإنشاء
    public function create()
    {
        return view('admin.cards.create');
    }

    // حفظ الكروت الجديدة
    public function store(Request $request)
    {
        $request->validate([
            'points' => 'required|integer|min:1',
            'count' => 'required|integer|min:1|max:100',
            'expires_at' => 'required|date'
        ]);

        // كود إنشاء الكروت هنا...
        
        return redirect()->route('admin.cards.index')
               ->with('success', 'تم إنشاء الكروت بنجاح');
    }

    // عرض نموذج التعديل
    public function edit($id)
    {
        $card = PrepaidCard::findOrFail($id);
        return view('admin.cards.edit', compact('card'));
    }

    // تحديث الكرت
    public function update(Request $request, $id)
    {
        $request->validate([
            'points' => 'required|integer|min:1',
            'expires_at' => 'required|date'
        ]);

        $card = PrepaidCard::findOrFail($id);
        $card->update($request->all());

        return redirect()->route('admin.cards.index')
               ->with('success', 'تم تحديث الكرت بنجاح');
    }

    // حذف الكرت
    public function destroy($id)
    {
        $card = PrepaidCard::findOrFail($id);
        $card->delete();

        return back()->with('success', 'تم حذف الكرت بنجاح');
    }

    // الحذف الجماعي
    public function bulkDelete(Request $request)
    {
        $request->validate(['ids' => 'required|array']);

        PrepaidCard::whereIn('id', $request->ids)->delete();

        return back()->with('success', 'تم حذف الكروت المحددة');
    }

    // طباعة الكرت
    public function print($id)
    {
        $card = PrepaidCard::findOrFail($id);
        return view('admin.cards.print', compact('card'));
    }
}



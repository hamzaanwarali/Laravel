<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Reward;
use App\Models\RewardRequest;

use Illuminate\Http\Request;

class RewardController extends Controller
{
    // عرض جميع المكافآت
    public function index()
    {
        $rewards = Reward::latest()->paginate(10);
        return view('admin.rewards.index', compact('rewards'));
    }

    // عرض نموذج إنشاء مكافأة
    public function create()
    {
        return view('admin.rewards.create');
    }

    // حفظ المكافأة الجديدة
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'required_points' => 'required|integer|min:1',
            'stock' => 'required|integer|min:1',
        ]);

        Reward::create($request->all());

        return redirect()->route('admin.rewards.index')
            ->with('success', 'تمت إضافة المكافأة بنجاح');
    }

    // عرض نموذج التعديل
    public function edit(Reward $reward)
    {
        return view('admin.rewards.edit', compact('reward'));
    }

    // تحديث المكافأة
    public function update(Request $request, Reward $reward)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'required_points' => 'required|integer|min:1',
            'stock' => 'required|integer|min:1',
        ]);

        $reward->update($request->all());

        return redirect()->route('admin.rewards.index')
            ->with('success', 'تم تحديث المكافأة بنجاح');
    }

    // حذف المكافأة
    public function destroy(Reward $reward)
    {
        $reward->delete();
        return redirect()->route('admin.rewards.index')
            ->with('success', 'تم حذف المكافأة بنجاح');
    }
}

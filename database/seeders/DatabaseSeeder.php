<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        
        
            ]); */

    // إنشاء بعض المكافآت
    
    Reward::create([
        'name' => 'قسيمة شراء بقيمة 50 ريال',
        'description' => 'يمكن استبدالها في المتجر X',
        'points_cost' => 500,
    ]);

    
    Reward::create([
        'name' => 'يوم إجازة',
        'description' => 'يوم إجازة مدفوع',
        'points_cost' => 1000,
    ]);

    // يمكنك إضافة المزيد من البيانات التجريبية هنا
}


    }


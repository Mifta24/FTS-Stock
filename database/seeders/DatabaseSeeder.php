<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Need;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Get or create default user
        $user = User::where('email', 'admin@fts.com')->first();

        if (!$user) {
            $user = User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@fts.com',
                'password' => bcrypt('password'),
            ]);
        }

        // Create sample needs data
        $needs = [
            [
                'item_name' => 'Kertas HVS A4',
                'description' => 'Kertas untuk print dokumen',
                'quantity' => 10,
                'unit' => 'rim',
                'estimated_price' => 350000,
                'needed_date' => now()->addDays(5),
                'status' => 'pending',
                'notes' => 'Urgent untuk laporan bulanan',
            ],
            [
                'item_name' => 'Toner Printer HP',
                'description' => 'Toner warna hitam',
                'quantity' => 2,
                'unit' => 'pcs',
                'estimated_price' => 800000,
                'needed_date' => now()->addDays(10),
                'status' => 'approved',
                'notes' => null,
            ],
            [
                'item_name' => 'Meja Kantor',
                'description' => 'Meja untuk karyawan baru',
                'quantity' => 3,
                'unit' => 'unit',
                'estimated_price' => 4500000,
                'needed_date' => now()->addDays(15),
                'status' => 'pending',
                'notes' => 'Ukuran 120x60 cm',
            ],
            [
                'item_name' => 'Kursi Kantor',
                'description' => 'Kursi ergonomis dengan sandaran punggung',
                'quantity' => 3,
                'unit' => 'unit',
                'estimated_price' => 3000000,
                'needed_date' => now()->addDays(15),
                'status' => 'approved',
                'notes' => 'Warna hitam',
            ],
            [
                'item_name' => 'Monitor LCD 24 inch',
                'description' => 'Monitor untuk workstation',
                'quantity' => 2,
                'unit' => 'unit',
                'estimated_price' => 3000000,
                'needed_date' => now()->addDays(20),
                'status' => 'rejected',
                'notes' => 'Budget belum tersedia',
            ],
            [
                'item_name' => 'Mouse Wireless',
                'description' => 'Mouse wireless Logitech',
                'quantity' => 5,
                'unit' => 'pcs',
                'estimated_price' => 750000,
                'needed_date' => now()->addDays(7),
                'status' => 'pending',
                'notes' => null,
            ],
        ];

        foreach ($needs as $need) {
            Need::create(array_merge($need, ['user_id' => $user->id]));
        }
    }
}

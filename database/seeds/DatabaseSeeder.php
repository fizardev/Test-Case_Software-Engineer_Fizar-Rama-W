<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        $role = collect(["Owner", "Manager", "Staff"]);
        $role->each(function($r) {
            \App\Role::create([
                'role' => $r
            ]);
        });

        $categories = collect(["Alat Masak", "Alat Olahraga","Perabotan Rumah"]);
        $categories->each(function($c) {
            \App\Category::create([
                'name' => $c,
            ]);
        });

        $rooms = collect(["Gudang 1", "Gudang 2", "Gudang 3"]);
        $rooms->each(function($room) {
            \App\Room::create([
                'name' => $room
            ]);
        });

        \App\User::create([
        'role_id' => 1,
        'name' => "Fizar Rama Waluyo",
        'email' => "fizardev@gmail.com",
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'avatar' => "images/users/avatar.png",
        'created_at' => now(),
        'updated_at' => now(),
        ]);
    }
}

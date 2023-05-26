<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\Post::factory(50)->create();

         $admin_user = User::factory()->create([
            'email' => 'admin@admin.com',
            'name' => 'Admin',
            'password' => bcrypt('admin')
        ]);

        $admin_role = Role::create(['name' => 'admin']);
        $admin_user->assignRole($admin_role);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

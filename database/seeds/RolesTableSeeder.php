<?php

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class RolesTableSeeder
 */
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => Role::ROLE_ADMIN],
            ['name' => Role::ROLE_MODERATOR],
            ['name' => Role::ROLE_CUSTOMER],
        ]);
    }
}

<?php

namespace Database\Seeders\User;

use App\Modules\User\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            DB::beginTransaction();
            //Create super admin
            $user = [
                'name' => 'Super Admin',
                'user_name' => 'super_admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'user_type' => 'admin',
                'phone_number' => '0000000000',
                'email_verified_at' => Carbon::now(),
                'birthday' => '1990-01-01',
            ];
            $response = User::firstWhere([
                'email' => $user['email']
            ]);
            if (!$response) {
                User::create($user);
            } else {
                $response->update($user);
            }
            DB::commit();
            echo "Successfully seed admin \n";
        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage() . "\n";
        }
    }
}

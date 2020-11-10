<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Nhi Mai',
                'address' => '193 Ton Duc Thang',
                'phone' => '0122334554',
                'email_verified_at' => now(),
                'email' => 'nhi12299@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Vu The',
                'address' => '100 Nguyen Luong Bang',
                'phone' => '013445566',
                'email_verified_at' => now(),
                'email' => 'nguyenthevu297@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Hoang Nam',
                'address' => '1099 Truong Chinh',
                'phone' => '023457864',
                'email_verified_at' => now(),
                'email' => 'hoangnamchallengme@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        User::insert($data);
    }
}

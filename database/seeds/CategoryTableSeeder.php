<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
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
                'name' => 'Bóng Đá',
                'parent_id' => '0',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Sportwear',
                'parent_id' => '0',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Balo-Túi xách thể thao',
                'parent_id' => '0',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Giày bóng đá',
                'parent_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Quần áo bóng đá',
                'parent_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Phụ kiện bóng đá',
                'parent_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Áo Nam',
                'parent_id' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Quần Nam',
                'parent_id' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dép',
                'parent_id' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Mũ Nón',
                'parent_id' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Balo',
                'parent_id' => '3',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Túi xách',
                'parent_id' => '3',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Túi chéo',
                'parent_id' => '3',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        Category::insert($data);
    }
}

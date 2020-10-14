<?php

use Illuminate\Database\Seeder;
use App\Sale;

class SaleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Giảm giá cuối năm',
            'title' => 'Giảm giá lớn',
            'content' => 'Giảm giá sâu',
            'discount' => '20',
            'start_day' => '2020_11_30',
            'end_day' => '2020_12_30'
        ];
        Sale::insert($data);
    }
}

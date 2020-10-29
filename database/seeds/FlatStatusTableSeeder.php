<?php

use Illuminate\Database\Seeder;

use App\Models\FlatStatusModel as FlatStatusModel;

class FlatStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$flatStatusList = [
            [
                'name' => 'Owner'
            ], [
                'name' => 'Rent'
            ]
        ];

        FlatStatusModel::truncate();
        foreach ($flatStatusList as $flatStatus) {
            $flatStatusModel = new FlatStatusModel();
            $flatStatusModel->fill($flatStatus);
            $flatStatusModel->save();
        }
    }
}

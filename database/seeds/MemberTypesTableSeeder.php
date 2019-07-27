<?php

use Illuminate\Database\Seeder;

use App\Models\MemberType as MemberTypeModel;

class MemberTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $memberTypesList = [
            [
                'name' => 'Owner'
            ], [
                'name' => 'Tenant'
            ], [
                'name' => 'Owner Family'
            ], [
                'name' => 'Tenant Family'
            ], [
                'name' => 'Care Taker'
            ]
        ];

        MemberTypeModel::truncate();
        foreach ($memberTypesList as $memberType) {
            $memberTypeModel = new MemberTypeModel();
            $memberTypeModel->fill($memberType);
            $memberTypeModel->save();
        }
    }
}

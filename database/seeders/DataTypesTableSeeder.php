<?php

namespace Joy\VoyagerBreadAccount\Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class DataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'accounts');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'accounts',
                'display_name_singular' => __('joy-voyager-bread-account::seeders.data_types.account.singular'),
                'display_name_plural'   => __('joy-voyager-bread-account::seeders.data_types.account.plural'),
                'icon'                  => 'voyager-bread voyager-bread-account voyager-people',
                'model_name'            => 'Joy\\VoyagerBreadAccount\\Models\\Account',
                // 'policy_name'           => 'Joy\\VoyagerBreadAccount\\Policies\\AccountPolicy',
                // 'controller'            => 'Joy\\VoyagerBreadAccount\\Http\\Controllers\\VoyagerBreadAccountController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }
    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}

<?php

// Change here.

use App\DataAccess\Models\SensorType;

use Illuminate\Database\Seeder;

class SensorTypesTableSeeder extends Seeder
{
    public function run()
    {
        SensorType::create([ 'name' => 'Soil Moisture' ]);
        SensorType::create([ 'name' => 'Temperature' ]);
        SensorType::create([ 'name' => 'PH' ]);
    }
}

?>
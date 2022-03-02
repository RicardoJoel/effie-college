<?php
  
use Illuminate\Database\Seeder;
use App\Caso;
   
class CreateCasosSeeder extends Seeder
{
    public static $casos;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                'edicion_id' => '1',
                'marca_id'   => '1',
            ],
            [
                'edicion_id' => '1',
                'marca_id'   => '2',
            ],
            [
                'edicion_id' => '1',
                'marca_id'   => '3',
            ],
            [
                'edicion_id' => '1',
                'marca_id'   => '5',
            ],
            [
                'edicion_id' => '1',
                'marca_id'   => '6',
            ],
            [
                'edicion_id' => '2',
                'marca_id'   => '1',
            ],
            [
                'edicion_id' => '2',
                'marca_id'   => '3',
            ],
            [
                'edicion_id' => '2',
                'marca_id'   => '4',
            ],
        ];
        
        foreach ($array as $key => $value)
            self::$casos[] = Caso::create($value);
    }
}

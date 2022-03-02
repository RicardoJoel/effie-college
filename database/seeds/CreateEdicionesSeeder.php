<?php
  
use Illuminate\Database\Seeder;
use App\Edicion;

class CreateEdicionesSeeder extends Seeder
{
    public static $ediciones;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                'anho'        => 2019,
            ],
            [
                'anho'        => 2020,
                'inscrip_ini' => '2020-08-01 00:00:00',
                'inscrip_fin' => '2020-08-19 23:59:59',
                'present_brf' => '2020-08-24 00:00:00',
                'entrega_css' => '2020-09-21 21:59:59',
                'jurados_slc' => '2020-09-29 21:59:59',
                'jurados_fin' => '2020-10-19 21:59:59',
                'ceremonia'   => '2020-11-03 12:00:00',
            ],
        ];
  
        foreach ($array as $key => $value)
            self::$ediciones[] = Edicion::create($value);
    }
}

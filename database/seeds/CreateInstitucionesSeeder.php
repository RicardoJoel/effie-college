<?php
  
use Illuminate\Database\Seeder;
use App\Institucion;
   
class CreateInstitucionesSeeder extends Seeder
{
    public static $instituciones;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                'nombre'      =>  'Universidad de Lima',
                'razonsocial' =>  'UNIVERSIDAD DE LIMA',
                'ruc'         =>  '20107798049',
                'direccion'   =>  'Av. Javier Prado Este Nro. 4600 - Urb. Fundo Monterrico Chico - Santiago de Surco',
                'telefono'    =>  '(01) 4376767',
            ],
            [
                'nombre'      =>  'Universidad Peruana de Ciencias Aplicadas (UPC)',
                'razonsocial' =>  'UNIVERSIDAD PERUANA DE CIENCIAS APLICADAS S.A.C.',
                'ruc'         =>  '20211614545',
                'direccion'   =>  'Prolongación Primavera 2390, Lima 15023 - Urb. Monterrico - Santiago de Surco',
                'telefono'    =>  '(01) 6303333',
            ],
            [
                'nombre'      =>  'Instituto Peruano de Publicidad (IPP)',
                'razonsocial' =>  'INSTITUTO DE EDUCACION SUPERIOR TECNOLOGICO PRIVADO "INSTITUTO PERUANO DE PUBLICIDAD"',
                'ruc'         =>  '20109733092',
                'direccion'   =>  'Av. Juan de Aliaga Nro. 421 - Magdalena del Mar',
                'telefono'    =>  '(01) 2727695',
            ],
            [
                'nombre'      =>  'Universidad ESAN',
                'razonsocial' =>  'UNIVERSIDAD ESAN',
                'ruc'         =>  '20136507720',
                'direccion'   =>  'Jr. Alonso de Molina 1652 - Urb. Monterrico chico - Santiago de Surco',
                'telefono'    =>  '(01) 3177200',
            ],
            [
                'nombre'      =>  'Instituto Toulouse Lautrec',
                'razonsocial' =>  'INSTITUCIONES TOULOUSE LAUTREC DE EDUCACION SUPERIOR S.A.C. - ITLS S.A.C.',
                'ruc'         =>  '20520869655',
                'direccion'   =>  'Av. Primavera Nro. 607 (Oficina 508) - San Borja',
                'telefono'    =>  '(01) 6172400',
            ],
            [
                'nombre'      =>  'Pontificia Universidad Católica del Perú (PUCP)',
                'razonsocial' =>  'PONTIFICIA UNIVERSIDAD CATOLICA DEL PERU',
                'ruc'         =>  '20155945860',
                'direccion'   =>  'Av. Universitaria Nro. 1801 - Urb. Pando - San Miguel',
                'telefono'    =>  '(01) 6262000',
            ],
            [
                'nombre'      =>  'Universidad de Ciencias y Artes de América Latina (UCAL)',
                'razonsocial' =>  'UNIVERSIDAD DE CIENCIAS Y ARTES DE AMERICA LATINA S.A.C. - UCAL S.A.C.',
                'ruc'         =>  '20537886618',
                'direccion'   =>  'Av. La Molina 3755, Urb. Sol de La Molina - La Molina',
                'telefono'    =>  '(01) 6222222',
            ],
            [
                'nombre'      =>  'Universidad del Pacífico',
                'razonsocial' =>  'UNIVERSIDAD DEL PACIFICO',
                'ruc'         =>  '20109705129',
                'direccion'   =>  'Jr. Gral. Luis M. Sánchez Cerro Nro. 2141 - Jesús María',
                'telefono'    =>  '(01) 2190100',
            ],
            [
                'nombre'      =>  'Otras instituciones',
                'razonsocial' =>  '',
                'ruc'         =>  '',
                'direccion'   =>  '',
                'telefono'    =>  '',
            ],
        ];
  
        foreach ($array as $key => $value)
            self::$instituciones[] = Institucion::create($value);
    }
}

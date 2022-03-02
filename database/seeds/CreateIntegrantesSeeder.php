<?php
  
use Illuminate\Database\Seeder;
use App\Integrante;
   
class CreateIntegrantesSeeder extends Seeder
{
    public static $integrantes;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            //EQUIPO PRUEBA 2020
            [
                //INTEGRANTE 1
                'nombre' => 'José',
                'apellidos' => 'Olivera Alzamora',
                'documento' => '123456',
                'email' => 'josecito@gmail.com',
                'celular' => '987654321',
                'carrera' =>  '',
                'ciclo' =>  NULL,
                'institucion_id'  =>  1,
            ],
            [
                //INTEGRANTE 2
                'nombre' => 'Roxana',
                'apellidos' => 'Escate Sarmiento',
                'documento' => '456789',
                'email' => 'roxana@gmail.com',
                'celular' => '123456789',
                'carrera' =>  'Comunicaciones',
                'ciclo' =>  'Noveno',
                'institucion_id'  =>  1,
            ],
            [
                //INTEGRANTE 3
                'nombre' => 'Ricardo',
                'apellidos' => 'Béjar Luque',
                'documento' => '654321',
                'email' => 'rbejar@preciso.pe',
                'celular' => '999999999',
                'carrera' =>  'Marketing',
                'ciclo' =>  'Décimo',
                'institucion_id'  =>  1,
            ],
            [
                //INTEGRANTE 4
                'nombre' => 'Adrián',
                'apellidos' => 'Sánchez Dominguez',
                'documento' => '9876543',
                'email' => 'adrian@gmail.com',
                'celular' => '987654321',
                'carrera' =>  'Publicidad',
                'ciclo' =>  'Noveno',
                'institucion_id'  =>  1,
            ],
            //EQUIPO 1 2019
            [
                //INTEGRANTE 5
                'nombre' => 'Juan José',
                'apellidos' => 'Tirado',
                'documento' => '07810981',
                'email' => 'jtirado@ipp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  NULL,
                'institucion_id'  =>  3,
            ],
            [
                //INTEGRANTE 6
                'nombre' => 'Joan',
                'apellidos' => 'Borjas',
                'documento' => '71424531',
                'email' => '20171036@ipp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  3,
            ],
            [
                //INTEGRANTE 7
                'nombre' => 'Elio',
                'apellidos' => 'Bachani',
                'documento' => '70674683',
                'email' => '20162020@ipp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  3,
            ],
            [
                //INTEGRANTE 8
                'nombre' => 'Camila',
                'apellidos' => 'Gallardo',
                'documento' => '77131874',
                'email' => '20171042@ipp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  3,
            ],
            [
                //INTEGRANTE 9
                'nombre' => 'María Camila',
                'apellidos' => 'Vidal',
                'documento' => '71248873',
                'email' => '20171066@ipp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  3,
            ],
            //EQUIPO 2 2019
            [
                //INTEGRANTE 10
                'nombre' => 'Ricardo',
                'apellidos' => 'Majca',
                'documento' => '00221573',
                'email' => 'rmajka@ipp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  NULL,
                'institucion_id'  =>  3,
            ],
            [
                //INTEGRANTE 11
                'nombre' => 'Camila',
                'apellidos' => 'Tudela',
                'documento' => '77073359',
                'email' => '20161009@ipp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  3,
            ],
            [
                //INTEGRANTE 12
                'nombre' => 'Andrés',
                'apellidos' => 'Chipana',
                'documento' => '70745534',
                'email' => '20152049@ipp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  3,
            ],
            [
                //INTEGRANTE 13
                'nombre' => 'Frida',
                'apellidos' => 'Cabrera',
                'documento' => '70558582',
                'email' => '20161010@ipp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  3,
            ],
            [
                //INTEGRANTE 14
                'nombre' => 'María Roxana',
                'apellidos' => 'Arias',
                'documento' => '74729345',
                'email' => '20162505@ipp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  3,
            ],
            [
                //INTEGRANTE 15
                'nombre' => 'María Isabel',
                'apellidos' => 'Cavassa',
                'documento' => '72017013',
                'email' => '20171517@ipp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  3,
            ],
            //EQUIPO 3 2019
            [
                //INTEGRANTE 16
                'nombre' => 'Ana María',
                'apellidos' => 'Barbero',
                'documento' => '29641932',
                'email' => 'anabarbero@hotmail.com',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  NULL,
                'institucion_id'  =>  2,
            ],
            [
                //INTEGRANTE 17
                'nombre' => 'Farley',
                'apellidos' => 'Chacalianza',
                'documento' => '76538699',
                'email' => 'u201520569@upc.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  2,
            ],
            [
                //INTEGRANTE 18
                'nombre' => 'Jimena',
                'apellidos' => 'Aranda',
                'documento' => '70616396',
                'email' => 'u201612564@upc.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  2,
            ],
            [
                //INTEGRANTE 19
                'nombre' => 'Andrea',
                'apellidos' => 'Sanjinés',
                'documento' => '72943310',
                'email' => 'u201611350@upc.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  2,
            ],
            [
                //INTEGRANTE 20
                'nombre' => 'Carlos',
                'apellidos' => 'Valdivia',
                'documento' => '48880204',
                'email' => 'u201522121@upc.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  2,
            ],
            [
                //INTEGRANTE 21
                'nombre' => 'Fiorella',
                'apellidos' => 'Best',
                'documento' => '76577762',
                'email' => 'u201522833@upc.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  2,
            ],
            //EQUIPO 4 2019
            [
                //INTEGRANTE 22
                'nombre' => 'Juana',
                'apellidos' => 'Zegarra',
                'documento' => '76814119',
                'email' => '20162001@ipp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  3,
            ],
            [
                //INTEGRANTE 23
                'nombre' => 'Diego',
                'apellidos' => 'Mesones',
                'documento' => '48205296',
                'email' => '20131089@ipp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  3,
            ],
            [
                //INTEGRANTE 24
                'nombre' => 'Pablo',
                'apellidos' => 'Temoche',
                'documento' => '75228037',
                'email' => '20161039@ipp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  3,
            ],
            [
                //INTEGRANTE 25
                'nombre' => 'Mariana',
                'apellidos' => 'Berrocal',
                'documento' => '73040536',
                'email' => '20162509@ipp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  3,
            ],
            //EQUIPO 5 2019
            [
                //INTEGRANTE 26
                'nombre' => 'Luis Fernando',
                'apellidos' => 'Terry',
                'documento' => '41722250',
                'email' => 'lterry@ulima.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  NULL,
                'institucion_id'  =>  1,
            ],
            [
                //INTEGRANTE 27
                'nombre' => 'María Fernanda',
                'apellidos' => 'Castrillón',
                'documento' => '74447587',
                'email' => '20141683@aloe.ulima.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  1,
            ],
            [
                //INTEGRANTE 28
                'nombre' => 'Gianella',
                'apellidos' => 'Castro',
                'documento' => '77165556',
                'email' => '20141686@aloe.ulima.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  1,
            ],
            [
                //INTEGRANTE 29
                'nombre' => 'Greysi',
                'apellidos' => 'Cebrián',
                'documento' => '73189522',
                'email' => '20140288@aloe.ulima.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  1,
            ],
            //EQUIPO 6 2019
            [
                //INTEGRANTE 30
                'nombre' => 'Juan Miguel',
                'apellidos' => 'Coriat',
                'documento' => '08194108',
                'email' => 'jcoriat@ulima.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  NULL,
                'institucion_id'  =>  1,
            ],
            [
                //INTEGRANTE 31
                'nombre' => 'Kevin',
                'apellidos' => 'Takuma',
                'documento' => '70504065',
                'email' => '20111228@aloe.ulima.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  1,
            ],
            [
                //INTEGRANTE 32
                'nombre' => 'Diego',
                'apellidos' => 'Ponce',
                'documento' => '70326592',
                'email' => '20141048@aloe.ulima.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  1,
            ],
            [
                //INTEGRANTE 33
                'nombre' => 'Samantha',
                'apellidos' => 'Sánchez',
                'documento' => '46480717',
                'email' => '20152336@aloe.ulima.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  1,
            ],
            //EQUIPO 7 2019
            [
                //INTEGRANTE 34
                'nombre' => 'Juan',
                'apellidos' => 'Carranza',
                'documento' => '70268721',
                'email' => '20171049@ipp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  3,
            ],
            [
                //INTEGRANTE 35
                'nombre' => 'Flavio',
                'apellidos' => 'Ramos',
                'documento' => '75446456',
                'email' => '20152004@ipp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  3,
            ],
            [
                //INTEGRANTE 36
                'nombre' => 'Lucía',
                'apellidos' => 'Acasuzo',
                'documento' => '73091853',
                'email' => '20171006@ipp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  3,
            ],
            [
                //INTEGRANTE 37
                'nombre' => 'Mitsuo',
                'apellidos' => 'Higa',
                'documento' => '47431228',
                'email' => '20171525@ipp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  3,
            ],
            //EQUIPO 8 2019
            [
                //INTEGRANTE 38
                'nombre' => 'Angela',
                'apellidos' => 'Dominguez',
                'documento' => '45862920',
                'email' => 'angela.nellydominguez@gmail.com',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  NULL,
                'institucion_id'  =>  6,
            ],
            [
                //INTEGRANTE 39
                'nombre' => 'Maricielo',
                'apellidos' => 'Rodríguez',
                'documento' => '72857366',
                'email' => 'mjrodriguez@pucp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  6,
            ],
            [
                //INTEGRANTE 40
                'nombre' => 'Leslie',
                'apellidos' => 'Caldas',
                'documento' => '76029183',
                'email' => 'leslie.caldas@pucp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  6,
            ],
            [
                //INTEGRANTE 41
                'nombre' => 'Jimena',
                'apellidos' => 'Arce',
                'documento' => '73069781',
                'email' => 'a20143316@pucp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  6,
            ],
            [
                //INTEGRANTE 42
                'nombre' => 'Aracelly',
                'apellidos' => 'Manchego',
                'documento' => '72488728',
                'email' => 'aracelly.manchego@pucp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  6,
            ],
            [
                //INTEGRANTE 43
                'nombre' => 'Diego',
                'apellidos' => 'Ortega',
                'documento' => '74020719',
                'email' => 'dortegad@pucp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  6,
            ],
            //EQUIPO 9 2019
            [
                //INTEGRANTE 44
                'nombre' => 'Anaís',
                'apellidos' => 'Gonzalez',
                'documento' => '47548501',
                'email' => 'anais.gonzales@pucp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  NULL,
                'institucion_id'  =>  6,
            ],
            [
                //INTEGRANTE 45
                'nombre' => 'Carmen',
                'apellidos' => 'Meneses',
                'documento' => '07093598',
                'email' => 'carmen.meneses@pucp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  6,
            ],
            [
                //INTEGRANTE 46
                'nombre' => 'Rubí',
                'apellidos' => 'Medina',
                'documento' => '72207869',
                'email' => 'rubi.medina@pucp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  6,
            ],
            [
                //INTEGRANTE 47
                'nombre' => 'Carlos Felipe',
                'apellidos' => 'Puza',
                'documento' => '74415620',
                'email' => 'a20152816@pucp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  6,
            ],
            [
                //INTEGRANTE 48
                'nombre' => 'Kiara',
                'apellidos' => 'Burbano',
                'documento' => '71426233',
                'email' => 'kburbano@pucp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  6,
            ],
            [
                //INTEGRANTE 49
                'nombre' => 'Jasmine',
                'apellidos' => 'Tantaleán',
                'documento' => '70076332',
                'email' => 'a20140733@pucp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  6,
            ],
            //EQUIPO 10 2019
            [
                //INTEGRANTE 50
                'nombre' => 'Luis Ernesto',
                'apellidos' => 'Velezmoro',
                'documento' => '10545162',
                'email' => 'lvelezmo@ulima.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  NULL,
                'institucion_id'  =>  1,
            ],
            [
                //INTEGRANTE 51
                'nombre' => 'Diana',
                'apellidos' => 'Ayala',
                'documento' => '71305143',
                'email' => 'dianaayalag@gmail.com',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  1,
            ],
            [
                //INTEGRANTE 52
                'nombre' => 'Caleria',
                'apellidos' => 'Lizaraso',
                'documento' => '73190881',
                'email' => 'vale_lizaraso11@hotmail.com',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  1,
            ],
            [
                //INTEGRANTE 53
                'nombre' => 'Ronaldo',
                'apellidos' => 'Ortiz',
                'documento' => '76386746',
                'email' => 'ronaldoandree@hotmail.com',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  1,
            ],
            [
                //INTEGRANTE 54
                'nombre' => 'Sebastián',
                'apellidos' => 'Valdivia',
                'documento' => '73592174',
                'email' => 'sebas.valdivia@hotmail.com',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  1,
            ],
            [
                //INTEGRANTE 55
                'nombre' => 'Erika',
                'apellidos' => 'Castro',
                'documento' => '70384643',
                'email' => 'erikacastrolingan@gmail.com',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  1,
            ],
            //EQUIPO 11 2019
            [
                //INTEGRANTE 56
                'nombre' => 'Carlos',
                'apellidos' => 'Mory',
                'documento' => '10341734',
                'email' => 'pcadcmor@upc.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  NULL,
                'institucion_id'  =>  2,
            ],
            [
                //INTEGRANTE 57
                'nombre' => 'Celso',
                'apellidos' => 'Zuleta',
                'documento' => '71452062',
                'email' => 'u201617985@upc.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  2,
            ],
            [
                //INTEGRANTE 58
                'nombre' => 'Kiara',
                'apellidos' => 'Yarleque',
                'documento' => '70001480',
                'email' => 'u201515795@upc.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  2,
            ],
            [
                //INTEGRANTE 59
                'nombre' => 'Nesmar',
                'apellidos' => 'Galindo',
                'documento' => '70148939',
                'email' => 'u201513932@upc.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  2,
            ],
            [
                //INTEGRANTE 60
                'nombre' => 'Rodney',
                'apellidos' => 'Guzman',
                'documento' => '70148939X',
                'email' => 'u201514522@upc.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  2,
            ],
            [
                //INTEGRANTE 61
                'nombre' => 'Royce',
                'apellidos' => 'Chumpitaz',
                'documento' => '73390473',
                'email' => 'u201511197@upc.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  2,
            ],
            [
                //INTEGRANTE 62
                'nombre' => 'Marco',
                'apellidos' => 'Morales',
                'documento' => '74741771',
                'email' => 'u201611219@upc.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  2,
            ],
            //EQUIPO 12 2019
            [
                //INTEGRANTE 63
                'nombre' => 'Ivan',
                'apellidos' => 'Quiquia',
                'documento' => '42230002',
                'email' => 'ivan.quiquia@pucp.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  NULL,
                'institucion_id'  =>  6,
            ],
            [
                //INTEGRANTE 64
                'nombre' => 'Gabriel',
                'apellidos' => 'Flores',
                'documento' => '73184348',
                'email' => 'gabriel.flores@pucp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  6,
            ],
            [
                //INTEGRANTE 65
                'nombre' => 'Ana',
                'apellidos' => 'Berrospi',
                'documento' => '73042775',
                'email' => 'a.berrospic@pucp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  6,
            ],
            [
                //INTEGRANTE 66
                'nombre' => 'Deysi',
                'apellidos' => 'Melgarejo',
                'documento' => '74231597',
                'email' => 'dmelgarejo@pucp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  6,
            ],
            [
                //INTEGRANTE 67
                'nombre' => 'Andrea',
                'apellidos' => 'Medina',
                'documento' => '70001485',
                'email' => 'a20130664@pucp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  6,
            ],
            [
                //INTEGRANTE 68
                'nombre' => 'Giuliana',
                'apellidos' => 'Francis',
                'documento' => '72649475',
                'email' => 'groldan@pucp.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  6,
            ],
            //EQUIPO 13 2019
            [
                //INTEGRANTE 69
                'nombre' => 'Nilda',
                'apellidos' => 'Manco',
                'documento' => '45462088',
                'email' => 'pcamnman@upc.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  NULL,
                'institucion_id'  =>  2,
            ],
            [
                //INTEGRANTE 70
                'nombre' => 'Camila',
                'apellidos' => 'León',
                'documento' => '74118910',
                'email' => 'u201520073@upc.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  2,
            ],
            [
                //INTEGRANTE 71
                'nombre' => 'Álvaro',
                'apellidos' => 'Gutiérrez',
                'documento' => '72012298',
                'email' => 'u201610459@upc.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  2,
            ],
            [
                //INTEGRANTE 72
                'nombre' => 'Berko',
                'apellidos' => 'Heringman',
                'documento' => '73128548',
                'email' => 'u201319957@upc.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  2,
            ],
            [
                //INTEGRANTE 73
                'nombre' => 'Macarena',
                'apellidos' => 'Ramírez',
                'documento' => '74024234',
                'email' => 'u201522850@upc.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  2,
            ],
            [
                //INTEGRANTE 74
                'nombre' => 'Manuel',
                'apellidos' => 'Villar',
                'documento' => '74610893',
                'email' => 'u201511651@upc.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  2,
            ],
            [
                //INTEGRANTE 75
                'nombre' => 'Nathaly',
                'apellidos' => 'Alor',
                'documento' => '72033909',
                'email' => 'u20141a534@upc.edu.pe',
                'celular' => '',
                'carrera' =>  '',
                'ciclo' =>  '',
                'institucion_id'  =>  2,
            ],
        ];

        foreach ($array as $key => $value)
            self::$integrantes[] = Integrante::create($value);
    }
}

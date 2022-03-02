<?php
  
use Illuminate\Database\Seeder;
use App\User;
   
class CreateUsersSeeder extends Seeder
{
    public static $users;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                //ADMINISTRADOR
                'is_admin' => true,
                'password' => Hash::make('RvMl2IG#'),
                'situacion' => 'ADMINISTRADOR',
            ],
            [
                //EQUIPO PRUEBA 2020
                'password' => Hash::make('ToP%$YGy'),
                'situacion' => 'PARTICIPANTE',
                'escuela' => 'Marketing y Publicidad',
                'tutor_id' => 1,
                'institucion_id' => 6,
                'caso_id' => 6,
            ],
            [
                //EQUIPO 1
                'situacion' => 'GANADOR',
                'tutor_id' => 5,
                'institucion_id' => 3,
                'caso_id' => 3,
            ],
            [
                //EQUIPO 2
                'situacion' => 'FINALISTA',
                'tutor_id' => 10,
                'institucion_id' => 3,
                'caso_id' => 3,
            ],
            [
                //EQUIPO 3
                'situacion' => 'FINALISTA',
                'tutor_id' => 16,
                'institucion_id' => 2,
                'caso_id' => 3,
            ],
            [
                //EQUIPO 4
                'situacion' => 'GANADOR',
                'tutor_id' => 10,
                'institucion_id' => 3,
                'caso_id' => 1,
            ],
            [
                //EQUIPO 5
                'situacion' => 'FINALISTA',
                'tutor_id' => 26,
                'institucion_id' => 1,
                'caso_id' => 1,
            ],
            [
                //EQUIPO 6
                'situacion' => 'GANADOR',
                'tutor_id' => 30,
                'institucion_id' => 1,
                'caso_id' => 4,
            ],
            [
                //EQUIPO 7
                'situacion' => 'FINALISTA',
                'tutor_id' => 5,
                'institucion_id' => 3,
                'caso_id' => 4,
            ],
            [
                //EQUIPO 8
                'situacion' => 'FINALISTA',
                'tutor_id' => 38,
                'institucion_id' => 6,
                'caso_id' => 4,
            ],
            [
                //Equipo 9
                'situacion' => 'GANADOR',
                'tutor_id' => 44,
                'institucion_id' => 6,
                'caso_id' => 2,
            ],
            [
                //EQUIPO 10
                'situacion' => 'FINALISTA',
                'tutor_id' => 50,
                'institucion_id' => 1,
                'caso_id' => 2,
            ],
            [
                //EQUIPO 11
                'situacion' => 'FINALISTA',
                'tutor_id' => 56,
                'institucion_id' => 2,
                'caso_id' => 2,
            ],
            [
                //EQUIPO 12
                'situacion' => 'GANADOR',
                'tutor_id' => 63,
                'institucion_id' => 6,
                'caso_id' => 5,
            ],
            [
                //EQUIPO 13
                'situacion' => 'FINALISTA',
                'tutor_id' => 69,
                'institucion_id' => 2,
                'caso_id' => 5,
            ],
        ];

        foreach ($array as $key => $value) {
            $user = User::create($value);
            $user->username = 'E2019' . str_pad($user->id - 2, 3, '0', STR_PAD_LEFT);
            $user->save();
            self::$users[] = $user;
        }
        self::$users[0]->username = 'ADMIN2020'; 
        self::$users[0]->save();
        self::$users[1]->username = 'E2020001';
        self::$users[1]->save();

        $integrantes = CreateIntegrantesSeeder::$integrantes;

        self::$users[1]->alumnos()->attach($integrantes[1]);
        self::$users[1]->alumnos()->attach($integrantes[2]);
        self::$users[1]->alumnos()->attach($integrantes[3]);
        
        self::$users[2]->alumnos()->attach($integrantes[5]);
        self::$users[2]->alumnos()->attach($integrantes[6]);
        self::$users[2]->alumnos()->attach($integrantes[7]);
        self::$users[2]->alumnos()->attach($integrantes[8]);

        self::$users[3]->alumnos()->attach($integrantes[10]);
        self::$users[3]->alumnos()->attach($integrantes[11]);
        self::$users[3]->alumnos()->attach($integrantes[12]);
        self::$users[3]->alumnos()->attach($integrantes[13]);
        self::$users[3]->alumnos()->attach($integrantes[14]);

        self::$users[4]->alumnos()->attach($integrantes[16]);
        self::$users[4]->alumnos()->attach($integrantes[17]);
        self::$users[4]->alumnos()->attach($integrantes[18]);
        self::$users[4]->alumnos()->attach($integrantes[19]);
        self::$users[4]->alumnos()->attach($integrantes[20]);

        self::$users[5]->alumnos()->attach($integrantes[21]);
        self::$users[5]->alumnos()->attach($integrantes[22]);
        self::$users[5]->alumnos()->attach($integrantes[23]);
        self::$users[5]->alumnos()->attach($integrantes[24]);

        self::$users[6]->alumnos()->attach($integrantes[26]);
        self::$users[6]->alumnos()->attach($integrantes[27]);
        self::$users[6]->alumnos()->attach($integrantes[28]);

        self::$users[7]->alumnos()->attach($integrantes[30]);
        self::$users[7]->alumnos()->attach($integrantes[31]);
        self::$users[7]->alumnos()->attach($integrantes[32]);

        self::$users[8]->alumnos()->attach($integrantes[33]);
        self::$users[8]->alumnos()->attach($integrantes[34]);
        self::$users[8]->alumnos()->attach($integrantes[35]);
        self::$users[8]->alumnos()->attach($integrantes[36]);

        self::$users[9]->alumnos()->attach($integrantes[38]);
        self::$users[9]->alumnos()->attach($integrantes[39]);
        self::$users[9]->alumnos()->attach($integrantes[40]);
        self::$users[9]->alumnos()->attach($integrantes[41]);
        self::$users[9]->alumnos()->attach($integrantes[42]);

        self::$users[10]->alumnos()->attach($integrantes[44]);
        self::$users[10]->alumnos()->attach($integrantes[45]);
        self::$users[10]->alumnos()->attach($integrantes[46]);
        self::$users[10]->alumnos()->attach($integrantes[47]);
        self::$users[10]->alumnos()->attach($integrantes[48]);

        self::$users[11]->alumnos()->attach($integrantes[50]);
        self::$users[11]->alumnos()->attach($integrantes[51]);
        self::$users[11]->alumnos()->attach($integrantes[52]);
        self::$users[11]->alumnos()->attach($integrantes[53]);
        self::$users[11]->alumnos()->attach($integrantes[54]);

        self::$users[12]->alumnos()->attach($integrantes[56]);
        self::$users[12]->alumnos()->attach($integrantes[57]);
        self::$users[12]->alumnos()->attach($integrantes[58]);
        self::$users[12]->alumnos()->attach($integrantes[59]);
        self::$users[12]->alumnos()->attach($integrantes[60]);
        self::$users[12]->alumnos()->attach($integrantes[61]);

        self::$users[13]->alumnos()->attach($integrantes[63]);
        self::$users[13]->alumnos()->attach($integrantes[64]);
        self::$users[13]->alumnos()->attach($integrantes[65]);
        self::$users[13]->alumnos()->attach($integrantes[66]);
        self::$users[13]->alumnos()->attach($integrantes[67]);

        self::$users[14]->alumnos()->attach($integrantes[69]);
        self::$users[14]->alumnos()->attach($integrantes[70]);
        self::$users[14]->alumnos()->attach($integrantes[71]);
        self::$users[14]->alumnos()->attach($integrantes[72]);
        self::$users[14]->alumnos()->attach($integrantes[73]);
        self::$users[14]->alumnos()->attach($integrantes[74]);
    }
}

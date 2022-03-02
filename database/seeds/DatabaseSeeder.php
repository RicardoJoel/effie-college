<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CreateEdicionesSeeder::class);
        $this->call(CreateMarcasSeeder::class);
        $this->call(CreateCasosSeeder::class);
        $this->call(CreateInstitucionesSeeder::class);
        $this->call(CreateIntegrantesSeeder::class);
        $this->call(CreateUsersSeeder::class);
    }
}

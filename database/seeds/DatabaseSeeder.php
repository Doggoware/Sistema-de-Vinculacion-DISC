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
        // $this->call(UsersTableSeeder::class);
		factory(App\Registro::class, 20)->create();
		factory(App\Convenio::class, 20)->create();
		factory(App\extension::class, 20)->create();
		factory(App\aprendizaje::class, 20)->create();
	}
}

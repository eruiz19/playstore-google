<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('categorys')->delete();

        DB::table('categorys')->insert([
            'name' => 'Redes sociales',
        ]);

        DB::table('categorys')->insert([
            'name' => 'Juegos',
        ]);

        DB::table('categorys')->insert([
            'name' => 'Libros',
        ]);

    }
}

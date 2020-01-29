<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('posts')->insert([

          'user_id' => '1',

          'caption' => 'Ini gambar difoto pada tanggal 30 Februari 2019',

          'image' => 'images/EadLogo.png',

      ]);

      DB::table('posts')->insert([

          'user_id' => '1',

          'caption' => 'Testing apakah perulangan berhasil apa tidak',

          'image' => 'images/scenery.jpg',

      ]);

    }
}

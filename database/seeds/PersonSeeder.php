<?php

use Illuminate\Database\Seeder;
use App\Person;


class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Person $person)
    {
        factory(Person::class, 50)->create();
//        DB::table('people')->insert([
//            'first_name' => Str::random(10),
//            'last_name' => Str::random(10),
//            'email' => Str::random(10).'@topemail.com',
//            'rg' => Str::random(10),
//            'cpf' => Str::random(10),
//            'address' => Str::random(10),
//            'number' => Str::random(10),
//            'neighborhood' => Str::random(10),
//            'city' => Str::random(10),
//            'zipcode' => Str::random(10),
//        ]);
    }
}

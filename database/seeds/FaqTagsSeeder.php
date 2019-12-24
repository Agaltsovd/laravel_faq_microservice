<?php

use Illuminate\Database\Seeder;

class FaqTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\FaqsTags::class, 10)->create();
    }
}

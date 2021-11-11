<?php

namespace Database\Seeders;

use App\Models\Law;

class LawsSeeder extends BasicSeeder
{
    public function run()
    {
        if ($this->isNotSeeded()) {
            $laws = [
               [
                   'uuid' => '49fe8fef-f934-4b11-afc4-e5b22fcd291d',
                   'title' => 'Investitionsgesetz Kohleregionen',
               ],
            ];

            foreach ($laws as $law) {
                Law::insert([
                    'uuid' => $law['uuid'],
                    'title' => $law['title'],
                ]);
            }

            $this->saveSeed();
        }
    }
}

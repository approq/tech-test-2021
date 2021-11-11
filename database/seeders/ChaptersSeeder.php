<?php

namespace Database\Seeders;

use App\Models\Chapter;

class ChaptersSeeder extends BasicSeeder
{
    public function run()
    {
        if ($this->isNotSeeded()) {
            $chapters = [
                [
                    'uuid' => '48adb5ae-f6fc-4c25-be6a-6c312419eecf',
                    'law_uuid' => '49fe8fef-f934-4b11-afc4-e5b22fcd291d',
                    'number' => 'Kapitel 1',
                    'title' => 'Finanzhilfen zum Ausgleich unterschiedlicher Wirtschaftskraft und zur Förderung des wirtschaftlichen Wachstums in den Braunkohlerevieren nach Artikel 104b des Grundgesetzes'
                ],
                [
                    'uuid' => 'd0c36cf2-7455-4acf-b466-0cb88bd1efbc',
                    'law_uuid' => '49fe8fef-f934-4b11-afc4-e5b22fcd291d',
                    'number' => 'Kapitel 2',
                    'title' => 'Strukturhilfen für strukturschwache Standorte von Steinkohlekraftwerken und das ehemalige Braunkohlerevier Helmstedt'
                ],
                [
                    'uuid' => '3040b2a5-bfc0-45de-8527-ab82e15719d5',
                    'law_uuid' => '49fe8fef-f934-4b11-afc4-e5b22fcd291d',
                    'number' => 'Kapitel 3',
                    'title' => 'Weitere Maßnahmen des Bundes'
                ],
                [
                    'uuid' => 'c77b87b4-04ad-4da6-9100-efda86a85b47',
                    'law_uuid' => '49fe8fef-f934-4b11-afc4-e5b22fcd291d',
                    'number' => 'Kapitel 4',
                    'title' => 'Zusätzliche Investitionen in die Bundesfernstraßen und Bundesschienenwege zur Förderung der Gebiete nach § 2'
                ],
                [
                    'uuid' => '3e2fa540-16f1-476e-96e6-89cebef0713c',
                    'law_uuid' => '49fe8fef-f934-4b11-afc4-e5b22fcd291d',
                    'number' => 'Kapitel 5',
                    'title' => 'Gemeinsame Vorschriften und Grundsätze'
                ]
            ];

            foreach ($chapters as $chapter) {
                Chapter::insert([
                    'uuid' => $chapter['uuid'],
                    'law_uuid' => $chapter['law_uuid'],
                    'number' => $chapter['number'],
                    'title' => $chapter['title'],
                ]);
            }

            $this->saveSeed();
        }
    }
}

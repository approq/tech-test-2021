<?php

namespace App\Console\Commands;

use App\Models\Chapter;
use App\Models\Law;
use App\Models\Paragraph;
use Illuminate\Console\Command;

class UploadLawFromXML extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upload-law-from-xml {path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload law from xml';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Upload started!");

        $xml = simplexml_load_string(file_get_contents($this->argument('path')));

        foreach ($xml->norm as $norm) {
            if ($norm->metadaten->kurzue) {
                $law = Law::create([
                    'title' => $norm->metadaten->kurzue,
                ]);

                $this->info("LAW: " . $law->title);
            } elseif ($norm->metadaten->gliederungseinheit) {
                $chapter = Chapter::create([
                    'law_uuid' => $law->uuid,
                    'number' => (string) $norm->metadaten->gliederungseinheit->gliederungsbez,
                    'title' => (string) $norm->metadaten->gliederungseinheit->gliederungstitel,
                ]);
            } elseif ($norm->metadaten->enbez) {
                $subparagraphs = [];

                foreach ($norm->textdaten->text->Content->P as $subparagraph) {
                    $subparagraphs[] = (string) $subparagraph;
                }

                Paragraph::create([
                    'law_uuid' => $law->uuid,
                    'chapter_uuid' => $chapter->uuid,
                    'number' => (string) $norm->metadaten->enbez,
                    'title' => (string) $norm->metadaten->titel,
                    'content' => json_encode($subparagraphs),
                ]);
            }
        }

        $this->info("Upload finished!");
    }
}

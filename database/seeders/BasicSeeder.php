<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class BasicSeeder
 */
abstract class BasicSeeder extends Seeder
{
    private string $seedName;

    /**
     * BasicSeeder constructor.
     */
    public function __construct()
    {
        $this->seedName = get_class($this);
    }

    /**
     * Save the seed into the database when it's run
     */
    protected function saveSeed()
    {
        DB::table('seeds')->insert(
            [
                'seed'  => $this->seedName,
                'batch' => true
            ]
        );
    }

    /**
     * Check if seed wasn't yet run and so it doesn't exist in the database
     *
     * @return bool
     */
    protected function isNotSeeded():bool
    {
        return DB::table('seeds')->where('seed', $this->seedName)->doesntExist();
    }
}

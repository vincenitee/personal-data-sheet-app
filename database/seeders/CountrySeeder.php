<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = storage_path('app/private/csv/countries.csv');
        $batchSize = 10;
        $data = [];

        // Check if the file exists
        if (!file_exists($filePath)) {
            $this->command->error("File not found at: {$filePath}");
            return;
        }

        // Open the CSV file
        if (($handle = fopen($filePath, 'r')) !== false) {
            // Skip the header row
            $header = fgetcsv($handle, 1000, ',');

            // Loop through the CSV rows
            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                // Add the row data to the array
                $data[] = [
                    'id' => $row[0],
                    'name' => $row[1],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                // If the batch size is reached, insert the data
                if (count($data) == $batchSize) {
                    DB::table('countries')->insert($data);
                    $data = []; // Reset the batch
                }
            }

            // Insert remaining records (if any)
            if (!empty($data)) {
                DB::table('countries')->insert($data);
            }

            fclose($handle);

            $this->command->info('Country table seeded successfully');
        } else {
            $this->command->info("Could not open the file at: {$filePath}");
        }
    }
}

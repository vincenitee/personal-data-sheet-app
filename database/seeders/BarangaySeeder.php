<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = storage_path('app/private/csv/refbrgy.csv');
        $batchSize = 50;
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
                    'municipality_id' => $row[1],
                    'name' => $row[2],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                // If the batch size is reached, insert the data
                if (count($data) == $batchSize) {
                    DB::table('barangays')->insert($data);
                    $data = []; // Reset the batch
                }
            }

            // Insert remaining records (if any)
            if (!empty($data)) {
                DB::table('barangays')->insert($data);
            }

            fclose($handle);

            $this->command->info('Barangay table seeded successfully');
        } else {
            $this->command->info("Could not open the file at: {$filePath}");
        }
    }
}

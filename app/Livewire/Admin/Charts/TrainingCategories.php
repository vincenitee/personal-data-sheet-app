<?php

namespace App\Livewire\Admin\Charts;

use App\Enums\TrainingTypes;
use App\Models\Training;
use Livewire\Component;
use Livewire\Attributes\On;

class TrainingCategories extends Component
{
    public $chartData = [];
    public $trainingDetails = [];

    public function mount()
    {
        $this->getTrainingCategoriesData();
    }

    protected function getTrainingCategoriesData()
    {
        // Get all trainings
        $trainings = Training::all();

        // Group by training type
        $trainingsByType = $trainings->groupBy('type');

        // Prepare labels and data for pie chart
        $labels = [];
        $data = [];
        $colors = $this->generateColors(count($trainingsByType));

        $index = 0;
        foreach ($trainingsByType as $type => $typeTrainings) {
            // Get the readable type name from enum if possible
            $typeName = TrainingTypes::tryFrom($type) ? TrainingTypes::from($type)->value : $type;
            $labels[] = $typeName;
            $data[] = $typeTrainings->count();

            // Store training details for potential download
            $this->trainingDetails[$typeName] = $typeTrainings->map(function ($training) {
                return [
                    'id' => $training->id,
                    'title' => $training->title,
                    'type' => $training->type,
                    'conducted_by' => $training->conducted_by,
                    'date_from' => $training->date_from,
                    'date_to' => $training->date_to,
                    'hours' => $training->hours,
                ];
            })->toArray();

            $index++;
        }

        // Prepare chart data
        $this->chartData = [
            'labels' => $labels,
            'series' => $data,
            'colors' => $colors
        ];
    }

    // Generate distinct colors for pie chart segments
    protected function generateColors($count)
    {
        $baseColors = [
            '#FF6384', // Red
            '#36A2EB', // Blue
            '#FFCE56', // Yellow
            '#4BC0C0', // Teal
            '#9966FF', // Purple
            '#FF9F40', // Orange
            '#2CC990', // Green
            '#FF8A80', // Light Red
            '#82B1FF', // Light Blue
            '#B39DDB'  // Light Purple
        ];

        $colors = [];
        for ($i = 0; $i < $count; $i++) {
            $colors[] = $baseColors[$i % count($baseColors)];
        }

        return $colors;
    }

    #[On('refreshTrainingCategoriesChart')]
    public function refreshChart()
    {
        $this->getTrainingCategoriesData();
        $this->dispatch('trainingCategoriesDataUpdated', ['chartData' => $this->chartData]);
    }

    #[On('downloadTrainingCategoryList')]
    public function downloadTrainingCategoryList($category)
    {
        if (!isset($category)) {
            return;
        }

        // Convert the stored training details back to collection
        $trainings = Training::where('type', $category)->get();

        // Define the columns to display in the report
        $columns = [
            'employee' => 'Employee',
            'title' => 'Training Title',
            'type' => 'Training Type',
            'sponsored_by' => 'Conducted By',
            'date_from' => 'Start Date',
            'date_to' => 'End Date',
            'total_hours' => 'No. of Hours'
        ];

        // Set the title and generated date
        $title = 'Training Category Report - ' . ucwords($category);
        $generatedDate = now()->format('F d, Y');

        // Generate HTML content for PDF
        $html = view('reports.training-category', compact('trainings', 'columns', 'title', 'generatedDate'))->render();

        // Ensure a valid filename
        $fileName = 'training_category_' . \Illuminate\Support\Str::slug($category, '_') . '_' . now()->format('Ymd_His') . '.pdf';

        // Generate PDF with Dompdf
        $dompdf = new \Dompdf\Dompdf([
            'defaultFont' => 'Arial',
            'isRemoteEnabled' => true
        ]);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Store the file
        $output = $dompdf->output();
        $pdfPath = storage_path("app/public/reports/$fileName");
        file_put_contents($pdfPath, $output);

        // Return download response
        return response()->download($pdfPath)->deleteFileAfterSend();
    }

    #[On('downloadAllEmployee')]
    public function downloadAllEmployee()
    {
        // Fetch all trainings with their related employee data
        $trainings = Training::with('entry.personalInformation')->get();

        // Sort trainings by employee name, then by type, then by total_hours
        $trainings = $trainings->sortBy([
            ['entry.personalInformation.first_name', 'asc'],  // Sort by employee's first name (ascending)
            ['type', 'asc'],  // Then sort by type (ascending)
            ['total_hours', 'asc'] // Finally sort by total_hours (ascending)
        ]);

        // Define the columns to display in the report
        $columns = [
            'employee' => 'Employee',
            'title' => 'Training Title',
            'type' => 'Training Type',
            'sponsored_by' => 'Conducted By',
            'date_from' => 'Start Date',
            'date_to' => 'End Date',
            'total_hours' => 'No. of Hours'
        ];

        // Set the title and generated date
        $title = 'Training Category Report';
        $generatedDate = now()->format('F d, Y');

        // Generate HTML content for PDF
        $html = view('reports.training-category', compact('trainings', 'columns', 'title', 'generatedDate'))->render();

        // Ensure a valid filename
        $fileName = 'training_category_' . now()->format('Ymd_His') . '.pdf';

        // Generate PDF with Dompdf
        $dompdf = new \Dompdf\Dompdf([
            'defaultFont' => 'Arial',
            'isRemoteEnabled' => true
        ]);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Store the file
        $output = $dompdf->output();
        $pdfPath = storage_path("app/public/reports/$fileName");
        file_put_contents($pdfPath, $output);

        // Return download response
        return response()->download($pdfPath)->deleteFileAfterSend();
    }



    public function render()
    {
        return view('livewire.admin.charts.training-categories', [
            'chartData' => $this->chartData
        ]);
    }
}
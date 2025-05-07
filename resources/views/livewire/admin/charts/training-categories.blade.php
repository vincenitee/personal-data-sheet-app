<!-- resources/views/livewire/admin/charts/training-categories.blade.php -->
<div class="card card-body h-100 training-categories-container" wire:ignore x-data="trainingCategoriesChartData()">
    <div id="trainingCategoriesPieChart" style="height: 350px; width: 100%;"></div>

    <div>
        <button class="btn btn-sm btn-success mt-2 float-end"
                wire:click="downloadAllEmployee"
                wire:loading.attr="disabled"
                title="Download full list">
            <span wire:loading.remove wire:target="downloadAllEmployee">
                <i class="bi bi-download"></i> Download
            </span>
            <span wire:loading wire:target="downloadAllEmployee">
                <div class="spinner-border spinner-border-sm text-light" role="status"></div>
            </span>
        </button>
    </div>
</div>

@push('scripts')
<script>
    function trainingCategoriesChartData() {
        let categoriesChart = null;

        function initCategoriesChart(chartData) {
            if (categoriesChart) {
                categoriesChart.destroy();
            }

            var options = {
                chart: {
                    type: 'pie',
                    height: 350,
                    events: {
                        dataPointSelection: function(event, chartContext, config) {
                            const selectedCategory = chartData.labels[config.dataPointIndex];
                            console.log('Selected category:', selectedCategory);
                            @this.call('downloadTrainingCategoryList', selectedCategory);
                        }
                    }
                },
                series: chartData.series,
                labels: chartData.labels,
                colors: chartData.colors,
                title: {
                    text: "Training Distribution by Category"
                },
                subtitle: {
                    text: "Click on sections to download training list by category"
                },
                legend: {
                    position: 'right'
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val, opts) {
                        return opts.w.config.series[opts.seriesIndex] + ' (' + val.toFixed(1) + '%)';
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return `${value} Trainings`;
                        }
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            height: 300
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            categoriesChart = new ApexCharts(document.querySelector('#trainingCategoriesPieChart'), options);
            categoriesChart.render();
        }

        return {
            init() {
                initCategoriesChart(@json($chartData));

                Livewire.on('trainingCategoriesDataUpdated', (data) => {
                    initCategoriesChart(data.chartData);
                });

                document.addEventListener('DOMContentLoaded', () => {
                    const refreshButton = document.getElementById('refreshTrainingCategoriesBtn');
                    if (refreshButton) {
                        refreshButton.addEventListener('click', () => {
                            @this.call('refreshChart');
                        });
                    }
                });
            }
        }
    }
</script>
@endpush
<div class="card card-body" wire:ignore>
    <div id="employmentTenureChart" style="height: 350px; width: 100%;"></div>

    {{-- <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('employmentTenureChart', () => ({
                chart: null,
                init() {
                    this.chart = new ApexCharts(document.querySelector("#employmentTenureChart"), {


                    this.chart.render();

                    // Listen for Livewire updates
                    Livewire.on('chartUpdated', (newData) => {
                        this.chart.updateOptions({
                            series: newData.series, // ✅ Fixed: Directly use the newData
                            xaxis: { categories: newData.labels }
                        });
                    });
                }
            }));
        });
    </script> --}}
    {{-- <pre>{{ json_encode($chartData) }}</pre> --}}
</div>

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function generateDistinctColors(numColors) {
                let colors = [];
                const baseHues = [210, 180, 145, 330, 280, 45]; // Blues, teals, oranges, magentas, purples, yellows

                for (let i = 0; i < numColors; i++) {
                    const hue = baseHues[i % baseHues.length] + (Math.floor(i / baseHues.length) * 30);
                    const saturation = 65 + (i % 3) * 10;
                    const lightness = 45 + (i % 4) * 5;
                    const color = `hsl(${hue}, ${saturation}%, ${lightness}%)`;
                    colors.push(color);
                }

                return colors;
            }

            var options = {
                chart: {
                    type: 'bar',
                    height: 350
                },
                series: @json($chartData['series']),
                xaxis: {
                    categories: @json($chartData['labels']),
                    labels: {
                        style: {
                            fontSize: '14px'
                        }
                    }
                },
                title: {
                    text: "Employment Tenure Analysis"
                },
                subtitle: {
                    text: "Based on approved entries"
                },
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return `${value} Employees`;
                        }
                    }
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%',
                        distributed: true
                    }
                },
                colors: generateDistinctColors(@json(count($chartData['labels']))),
                legend: {
                    show: false
                }
            };

            var chart = new ApexCharts(document.querySelector('#employmentTenureChart'), options);
            chart.render();
        });
    </script>
@endpush

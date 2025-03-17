<div class="card card-body h-100" wire:ignore>
    <div id="salaryChart" style="height: 350px; width: 100%"></div>
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
                    text: "Employment Distribution based on Salary"
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
                        distributed: true,
                        horizontal: true,
                    }
                },
                colors: generateDistinctColors(@json(count($chartData['labels']))),
                legend: {
                    show: false
                }
            };

            var chart = new ApexCharts(document.querySelector('#salaryChart'), options);
            chart.render();
        });
    </script>
@endpush

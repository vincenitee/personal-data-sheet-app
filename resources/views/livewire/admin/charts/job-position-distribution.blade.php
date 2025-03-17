<div class="card card-body" wire:ignore>
    <div id="jobChart" style="height: 350px; width: 100%;"></div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function generateDistinctColors(numColors) {
                let colors = [];
                const baseHues = [210, 180, 145, 330, 280, 45]; // Blues, teals, oranges, magentas, purples, yellows

                for (let i = 0; i < numColors; i++) {
                    // Cycle through base hues and add variations
                    const hue = baseHues[i % baseHues.length] + (Math.floor(i / baseHues.length) * 30);

                    // Vary saturation between 65-85% for a modern look
                    const saturation = 65 + (i % 3) * 10;

                    // Vary lightness between 45-65% for a balanced palette
                    const lightness = 45 + (i % 4) * 5;

                    const color = `hsl(${hue}, ${saturation}%, ${lightness}%)`;
                    colors.push(color);
                }

                return colors;
            }

            var options = {
                title: {
                    text: "Employee Distribution by Job Positions"
                },
                subtitle: {
                    text: "Based on approved entries"
                },
                series: [{
                    data: @json($chartData['series'])
                }],
                chart: {
                    height: 350,
                    type: 'bar',
                    events: {
                        click: function(chart, w, e) {
                            console.log(chart, w, e)
                        }
                    }
                },
                colors: generateDistinctColors(@json(count($chartData['labels']))),
                plotOptions: {
                    bar: {
                        columnHeight: '35%',
                        distributed: true,
                        horizontal: true,
                        dataLabels: {
                            position: 'top'
                        }
                    }
                },
                dataLabels: {
                    enabled: false
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            height: 320
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                legend: {
                    show: false
                },
                xaxis: {
                    categories: @json($chartData['labels']),
                    labels: {
                        style: {
                            colors: generateDistinctColors(@json(count($chartData['labels']))),
                            fontSize: '12px'
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#jobChart"), options);
            chart.render();
        })
    </script>
@endpush

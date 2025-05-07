<div class="card card-body h-100" wire:ignore x-data="employeeChartData()">
    <div id="employeeChart" style="height: 350px; height: 100%"></div>

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
        function employeeChartData() {
            let chart = null;

            function initChart() {
                if (chart) {
                    chart.destroy();
                }

                function generateDistinctColors(numColors) {
                    let colors = [];
                    const baseHues = [210, 180, 145, 330, 280, 45]; // Blues, teals, oranges, magentas, purples, yellows

                    for (let i = 0; i < numColors; i++) {
                        // Cycle through base hues and add variations
                        const hue = baseHues[i % baseHues.length] + (Math.floor(i / baseHues.length) * 30);
                        const saturation = 65 + (i % 3) * 10;
                        const lightness = 45 + (i % 4) * 5;
                        const color = `hsl(${hue}, ${saturation}%, ${lightness}%)`;
                        colors.push(color);
                    }

                    return colors;
                }

                const chartData = @json($chartData);

                var options = {
                    title: {
                        text: "Employee Distribution by Status"
                    },
                    subtitle: {
                        text: "Based on approved entries"
                    },
                    labels: chartData.labels,
                    series: chartData.series,
                    colors: generateDistinctColors(chartData.labels.length),
                    chart: {
                        type: 'donut',
                        height: 350,
                        toolbar: {
                            show: true,
                            tools: {
                                download: true
                            }
                        },
                        events: {
                            dataPointSelection: function(event, chartContext, config) {
                                const selectedStatus = chartData.labels[config.dataPointIndex];
                                // Call Livewire method to download employee list for this status
                                @this.call('downloadEmployeeList', selectedStatus);
                            }
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function(val, opts) {
                            return opts.w.globals.series[opts.seriesIndex] + " Employees";
                        }
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
                    }]
                };

                chart = new ApexCharts(document.querySelector("#employeeChart"), options);
                chart.render();
            }

            return {
                init() {
                    initChart();

                    // Listen for Livewire events
                    window.addEventListener('chartUpdated', event => {
                        chart.updateOptions({
                            labels: event.detail.labels,
                            series: event.detail.series
                        });
                    });

                    // Listen for Livewire navigation events
                    document.addEventListener('livewire:navigated', () => {
                        setTimeout(initChart, 100); // Small delay to ensure DOM is ready
                    });

                    // Also handle page navigation when using Livewire v3 Page component
                    document.addEventListener('livewire:navigating', () => {
                        if (chart) {
                            chart.destroy();
                            chart = null;
                        }
                    });

                    // Handle historic back/forward navigation
                    window.addEventListener('popstate', () => {
                        setTimeout(initChart, 100);
                    });
                }
            }
        }

        // // Initialize when the DOM is loaded (first page load)
        // document.addEventListener("DOMContentLoaded", function() {
        //     // Initial chart rendering is now handled by Alpine.js init()
        // });
    </script>
@endpush
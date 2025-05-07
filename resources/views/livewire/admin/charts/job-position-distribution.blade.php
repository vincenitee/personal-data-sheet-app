<div class="card card-body" wire:ignore x-data="jobPositionData()">
    <div id="jobChart" style="height: 350px; width: 100%;"></div>
    <div>
        <button class="btn btn-sm btn-success mt-2 float-end"
                wire:click="downloadEmployeeList"
                wire:loading.attr="disabled"
                title="Download full list">
            <span wire:loading.remove wire:target="downloadEmployeeList">
                <i class="bi bi-download"></i> Download
            </span>
            <span wire:loading wire:target="downloadEmployeeList">
                <div class="spinner-border spinner-border-sm text-light" role="status"></div>
            </span>
        </button>
    </div>
</div>

@push('scripts')
    <script>
        function jobPositionData() {
            let chart = null;

            function initChart(chartData) {
                if (chart) {
                    chart.destroy();
                }

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

                // Use passed chart data or fallback to initial data
                const data = chartData || @json($chartData);

                var options = {
                    title: {
                        text: "Employee Distribution by Job Positions"
                    },
                    subtitle: {
                        text: "Based on approved entries (Click on bars to download employee list)"
                    },
                    series: [{
                        data: data.series
                    }],
                    chart: {
                        height: 350,
                        type: 'bar',
                        events: {
                            dataPointSelection: function(event, chartContext, config) {
                                // Get the clicked position
                                const position = data.labels[config.dataPointIndex];

                                // Dispatch to Livewire to trigger the download
                                @this.downloadPositionEmployeeList(position);
                            }
                        }
                    },
                    colors: generateDistinctColors(data.labels.length),
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
                        enabled: true,
                        formatter: function(val) {
                            return val;
                        },
                        style: {
                            fontSize: '12px',
                            colors: ['#304758']
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
                    }],
                    legend: {
                        show: false
                    },
                    xaxis: {
                        categories: data.labels,
                        labels: {
                            style: {
                                fontSize: '12px'
                            }
                        }
                    }
                };

                chart = new ApexCharts(document.querySelector("#jobChart"), options);
                chart.render();
            }

            return {
                init() {
                    // Initialize with current data if available
                    if (@json($chartData).labels && @json($chartData).labels.length > 0) {
                        initChart();
                    }

                    // Listen for lazy load completion
                    window.addEventListener('job-chart-loaded', event => {
                        setTimeout(() => initChart(event.detail.chartData), 100);
                    });

                    // Listen for Livewire events
                    window.addEventListener('jobChartUpdated', event => {
                        initChart(event.detail);
                    });

                    // Listen for Livewire navigation events
                    document.addEventListener('livewire:navigated', () => {
                        setTimeout(() => initChart(), 100); // Small delay to ensure DOM is ready
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
                        setTimeout(() => initChart(), 100);
                    });
                }
            }
        }
    </script>
@endpush
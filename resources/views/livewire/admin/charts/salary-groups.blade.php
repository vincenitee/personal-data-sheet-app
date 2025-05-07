<div class="card card-body h-100" wire:ignore x-data="salaryGroupChart()">
    <div id="salaryChart" style="height: 350px; width: 100%"></div>

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
        function salaryGroupChart() {
            let chart = null;

            function initChart() {
                if (chart) {
                    chart.destroy();
                }

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

                const chartData = @json($chartData);

                var options = {
                    chart: {
                        type: 'bar',
                        height: 350,
                        toolbar: {
                            show: true,
                            tools: {
                                download: true
                            }
                        },
                        events: {
                            dataPointSelection: function(event, chartContext, config) {
                                const selectedSalaryRange = chartData.labels[config.dataPointIndex];
                                // Call Livewire method to download employee list for this salary range
                                @this.call('downloadSalaryList', selectedSalaryRange);
                            }
                        }
                    },
                    series: [{
                        name: 'Number of Employees',
                        data: chartData.series
                    }],
                    xaxis: {
                        categories: chartData.labels,
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
                        text: "Based on approved entries (Click on a bar to download employee list)"
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
                            horizontal: false,
                        }
                    },
                    colors: generateDistinctColors(chartData.labels.length),
                    legend: {
                        show: false
                    }
                };

                chart = new ApexCharts(document.querySelector('#salaryChart'), options);
                chart.render();
            }

            return {
                init() {
                    initChart();

                    // Listen for Livewire events
                    window.addEventListener('salaryChartUpdated', event => {
                        if (chart) {
                            chart.updateSeries([{
                                name: 'Number of Employees',
                                data: event.detail.series
                            }]);
                            chart.updateOptions({
                                xaxis: {
                                    categories: event.detail.labels
                                }
                            });
                        }
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
    </script>
@endpush
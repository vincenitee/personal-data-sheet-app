<div class="card card-body" wire:ignore x-data="ageGroupData()">
    <div id="ageGroupChart" style="height: 350px; width: 100%;"></div>

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

<?php $__env->startPush('scripts'); ?>
    <script>
        function ageGroupData() {
            let chart = null;

            function initChart(chartData) {
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

                var options = {
                    chart: {
                        type: 'bar',
                        height: 350,
                        events: {
                            dataPointSelection: function(event, chartContext, config) {
                                // Get the clicked category/label
                                const ageRange = chartData.labels[config.dataPointIndex];

                                // Dispatch to Livewire to trigger the download
                                // Pass the age range directly
                                window.Livewire.find('<?php echo e($_instance->getId()); ?>').call('downloadEmployeeList', ageRange);
                            }
                        }
                    },
                    series: chartData.series,
                    xaxis: {
                        categories: chartData.labels,
                        labels: {
                            style: {
                                fontSize: '14px'
                            }
                        }
                    },
                    title: {
                        text: "Employment Age Groups Analysis"
                    },
                    subtitle: {
                        text: "Based on approved entries (Click on bars to download employee list)"
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
                            dataLabels: {
                                position: 'top'
                            }
                        }
                    },
                    colors: generateDistinctColors(chartData.labels.length),
                    legend: {
                        show: false
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function(val) {
                            return val;
                        },
                        offsetY: -20,
                        style: {
                            fontSize: '12px',
                            colors: ['#304758']
                        }
                    }
                };

                chart = new ApexCharts(document.querySelector('#ageGroupChart'), options);
                chart.render();
            }

            return {
                init() {
                    // Initialize with data from Livewire
                    initChart(<?php echo json_encode($chartData, 15, 512) ?>);

                    // Listen for chart updates from Livewire
                    Livewire.on('ageGroupsChartUpdated', (data) => {
                        initChart(data.chartData)
                    });
                }
            }
        }
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/charts/age-groups.blade.php ENDPATH**/ ?>
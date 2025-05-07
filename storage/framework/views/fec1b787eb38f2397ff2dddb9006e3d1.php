<div class="card card-body h-100" wire:ignore x-data="sexChartData()">
    <div id="sexGroups" style="height: 350px; height: 100%"></div>

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
        function sexChartData() {
            let chart = null;

            function initChart() {
                // Properly destroy existing chart if it exists
                if (chart) {
                    chart.destroy();
                    chart = null;
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

                const chartData = <?php echo json_encode($chartData, 15, 512) ?>;

                var options = {
                    title: {
                        text: "Employee Distribution by Gender"
                    },
                    subtitle: {
                        text: "Based on approved users"
                    },
                    labels: chartData.labels,
                    series: chartData.series,
                    colors: generateDistinctColors(chartData.labels.length),
                    chart: {
                        type: 'pie',
                        height: 350,
                        toolbar: {
                            show: true,
                            tools: {
                                download: true
                            }
                        },
                        events: {
                            dataPointSelection: function(event, chartContext, config) {
                                const selectedGender = chartData.labels[config.dataPointIndex];
                                // alert(selectedGender);
                                // Call Livewire method to download employee list for this gender
                                window.Livewire.find('<?php echo e($_instance->getId()); ?>').call('downloadEmployeeList', selectedGender);
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

                // Properly assign to the outer chart variable
                chart = new ApexCharts(document.querySelector("#sexGroups"), options);
                chart.render();
            }

            return {
                init() {
                    // Initialize the chart
                    initChart();

                    // Listen for Livewire events
                    window.addEventListener('chartUpdated', event => {
                        if (chart) {
                            chart.updateOptions({
                                labels: event.detail.labels,
                                series: event.detail.series
                            });
                        } else {
                            // If chart was destroyed but we got an update, reinitialize
                            setTimeout(initChart, 100);
                        }
                    });

                    // Listen for Livewire navigation events
                    document.addEventListener('livewire:navigated', () => {
                        setTimeout(initChart, 100); // Small delay to ensure DOM is ready
                    });

                    // Handle page navigation when using Livewire v3 Page component
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
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/charts/sex-groups.blade.php ENDPATH**/ ?>
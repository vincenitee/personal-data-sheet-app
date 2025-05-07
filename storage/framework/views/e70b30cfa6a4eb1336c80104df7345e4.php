<!-- 1. Use a more specific ID and class names -->
<div class="card card-body h-100 dep-chart-container" wire:ignore x-data="companyDepartmentChartData()">
    <div id="companyDepartmentChart" style="height: 350px; width: 100%;"></div>

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
    // 2. Namespace your function name to avoid global scope conflicts
    function companyDepartmentChartData() {
        // 3. Use a more specific variable name
        let departmentChart = null;

        function initDepartmentChart(chartData) {
            if (departmentChart) {
                departmentChart.destroy();
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
                            const selectedDepartment = chartData.labels[config.dataPointIndex];
                            console.log(selectedDepartment);
                            window.Livewire.find('<?php echo e($_instance->getId()); ?>').call('downloadEmployeeList', selectedDepartment);
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
                    text: "Employee Distribution by Department"
                },
                subtitle: {
                    text: "Based on approved signups (Click on bars to download employee list)"
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
                        dataLabels: {
                            position: 'top'
                        }
                    }
                },
                colors: generateDistinctColors(chartData.labels.length),
                legend: {
                    show: false
                }
            };

            // 4. Use more specific selector
            departmentChart = new ApexCharts(document.querySelector('#companyDepartmentChart'), options);
            departmentChart.render();
        }

        return {
            // 5. Using x-init for initialization
            init() {
                // Initialize with the data from Livewire
                initDepartmentChart(<?php echo json_encode($chartData, 15, 512) ?>);

                // 6. Use a more specific event name to prevent conflicts
                Livewire.on('departmentChartUpdated', (data) => {
                    initDepartmentChart(data.chartData);
                });
            }
        }
    }
</script>
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/charts/departments.blade.php ENDPATH**/ ?>
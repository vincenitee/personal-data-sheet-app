<!-- 1. Use a more specific ID and class names -->
<div class="card card-body h-100 employee-growth-container" wire:ignore x-data="companyEmployeeGrowthData()">
    <div id="companyEmployeeGrowthChart" style="height: 350px; width: 100%;"></div>

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
    function companyEmployeeGrowthData() {
        // 3. Use a more specific variable name
        let employeeGrowthChart = null;

        function initEmployeeGrowthChart(monthsData, countsData) {
            if (employeeGrowthChart) {
                employeeGrowthChart.destroy();
            }

            var options = {
                chart: {
                    type: 'area',
                    height: 350,
                    toolbar: {
                        show: true
                    },
                    events: {
                        dataPointSelection: function(event, chartContext, config) {
                            const selectedMonth = monthsData[config.dataPointIndex];
                            console.log('Selected month:', selectedMonth);
                            window.Livewire.find('<?php echo e($_instance->getId()); ?>').call('downloadMonthlyEmployeeList', selectedMonth);
                        }
                    }
                },
                series: [{
                    name: 'Employees Added',
                    data: countsData
                }],
                xaxis: {
                    categories: monthsData,
                    labels: {
                        rotate: -45,
                        style: {
                            fontSize: '14px'
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: 'Number of Employees'
                    }
                },
                title: {
                    text: "Employee Growth Trend Over the Past Months"
                },
                subtitle: {
                    text: "Click on data points to download monthly employee list"
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 0.4,
                        opacityFrom: 0.8,
                        opacityTo: 0.3,
                        stops: [0, 90, 100]
                    }
                },
                colors: ['#1E90FF'],
                markers: {
                    size: 5,
                    colors: ['#1E90FF'],
                    strokeWidth: 2
                },
                tooltip: {
                    enabled: true,
                    x: {
                        format: 'MMM yyyy'
                    },
                    y: {
                        formatter: function(value) {
                            return `${value} Employees`;
                        }
                    }
                }
            };

            // 4. Use more specific selector
            employeeGrowthChart = new ApexCharts(document.querySelector('#companyEmployeeGrowthChart'), options);
            employeeGrowthChart.render();
        }

        return {
            // 5. Using x-init for initialization
            init() {
                // Initialize with the data from Livewire
                initEmployeeGrowthChart(<?php echo json_encode($months, 15, 512) ?>, <?php echo json_encode($employeeCounts, 15, 512) ?>);

                // 6. Use a more specific event name to prevent conflicts
                Livewire.on('employeeGrowthDataUpdated', (data) => {
                    initEmployeeGrowthChart(data.months, data.employeeCounts);
                });

                // Add refresh button event listener if needed
                document.addEventListener('DOMContentLoaded', () => {
                    const refreshButton = document.getElementById('refreshEmployeeGrowthBtn');
                    if (refreshButton) {
                        refreshButton.addEventListener('click', () => {
                            window.Livewire.find('<?php echo e($_instance->getId()); ?>').call('refreshChart');
                        });
                    }
                });
            }
        }
    }
</script>
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/charts/employee-increase.blade.php ENDPATH**/ ?>
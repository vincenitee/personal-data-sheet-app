<div class="card card-body" x-data="employeeChart()">
    <div id="employeeChart" style="height: 350px;"></div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('employeeChart', () => ({
                chart: null,
                init() {
                    this.chart = new ApexCharts(document.querySelector("#employeeChart"), {
                        chart: {
                            type: 'pie',
                            height: 350,
                            events: {
                                dataPointSelection: (event, chartContext, config) => {
                                    let selectedStatus = this.chart.w.config.labels[config
                                        .dataPointIndex];

                                    Livewire.dispatch('downloadEmployeeList', {
                                        employmentStatus: selectedStatus
                                    });
                                }
                            }
                        },
                        series: <?php echo json_encode($chartData['series'], 15, 512) ?>,
                        labels: <?php echo json_encode($chartData['labels'], 15, 512) ?>,
                        colors: [
                            '#007bff', // Permanent
                            '#28a745', // Contractual
                            '#ffc107', // Casual
                            '#dc3545', // Contract of Service
                            '#17a2b8', // Temporary
                            '#6610f2', // Fixed Term
                            '#fd7e14', // Provisional (New)
                            '#6f42c1',
                            '#adb5bd' // Coterminous (New)
                        ],
                        title: {
                            text: "Employee Distribution by Employment Status",
                            align: 'center',
                            style: {
                                fontSize: window.innerWidth < 480 ? '14px' :
                                '18px', // Adjust font size on small screens
                                fontWeight: 'bold'
                            }
                        },
                        subtitle: {
                            text: "Based on approved PDS entries",
                            align: 'center',
                            style: {
                                fontSize: '14px',
                                color: '#666'
                            }
                        },
                        tooltip: {
                            y: {
                                formatter: function(value) {
                                    let total = <?php echo json_encode(array_sum($chartData['series']), 15, 512) ?>;
                                    let percentage = ((value / total) * 100).toFixed(2);
                                    return `${value} Employees (${percentage}%)`;
                                }
                            }
                        },
                        legend: {
                            position: window.innerWidth < 480 ? 'bottom' :
                            'right', // Move legend below on small screens
                            labels: {
                                useSeriesColors: true
                            },
                            itemMargin: {
                                horizontal: 10,
                                vertical: 5
                            }
                        },
                        dataLabels: {
                            enabled: true,
                            dropShadow: {
                                enabled: false // Prevents shadow effect making labels unreadable
                            },
                            style: {
                                fontSize: window.innerWidth < 480 ? '10px' :
                                '14px', // Reduce label font size on mobile
                            },
                            formatter: function(val, opts) {
                                let value = opts.w.globals.series[opts.seriesIndex];
                                return value > 5 ? `${value} Employees` :
                                ''; // Hide small labels to avoid clutter
                            }
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    height: 320
                                },
                                title: {
                                    text: "Employee Distribution",
                                    align: 'center'
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }]
                    });

                    this.chart.render();

                    // Listen for Livewire updates and refresh chart
                    Livewire.on('chartUpdated', (newData) => {
                        this.chart.updateOptions({
                            series: newData.series,
                            labels: newData.labels
                        });
                    });
                }
            }));
        });
    </script>
</div>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/charts/employee-chart.blade.php ENDPATH**/ ?>
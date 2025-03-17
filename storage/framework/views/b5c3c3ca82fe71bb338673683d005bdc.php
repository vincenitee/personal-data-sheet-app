<div class="card card-body" wire:ignore>
    <div id="jobChart" style="height: 350px; width: 100%;"></div>
</div>

<?php $__env->startPush('scripts'); ?>
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
                    data: <?php echo json_encode($chartData['series'], 15, 512) ?>
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
                colors: generateDistinctColors(<?php echo json_encode(count($chartData['labels']), 15, 512) ?>),
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
                    categories: <?php echo json_encode($chartData['labels'], 15, 512) ?>,
                    labels: {
                        style: {
                            colors: generateDistinctColors(<?php echo json_encode(count($chartData['labels']), 15, 512) ?>),
                            fontSize: '12px'
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#jobChart"), options);
            chart.render();
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/charts/job-position-distribution.blade.php ENDPATH**/ ?>
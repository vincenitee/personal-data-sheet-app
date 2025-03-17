<div class="card card-body h-100" wire:ignore>
    <div id="salaryChart" style="height: 350px; width: 100%"></div>
</div>


<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
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
                    height: 350
                },
                series: <?php echo json_encode($chartData['series'], 15, 512) ?>,
                xaxis: {
                    categories: <?php echo json_encode($chartData['labels'], 15, 512) ?>,
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
                    text: "Based on approved entries"
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
                    }
                },
                colors: generateDistinctColors(<?php echo json_encode(count($chartData['labels']), 15, 512) ?>),
                legend: {
                    show: false
                }
            };

            var chart = new ApexCharts(document.querySelector('#salaryChart'), options);
            chart.render();
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/charts/salary-groups.blade.php ENDPATH**/ ?>
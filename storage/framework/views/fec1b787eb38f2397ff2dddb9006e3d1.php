<div class="card card-body h-100" wire:ignore>
    <div id="sexGroups" style="height: 350px; height: 100%"></div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
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
                    text: "Employee Distribution by Gender"
                },
                subtitle: {
                    text: "Based on approved users"
                },
                labels: <?php echo json_encode($chartData['labels'], 15, 512) ?>,
                series: <?php echo json_encode($chartData['series'], 15, 512) ?>,
                colors: generateDistinctColors(<?php echo json_encode(count($chartData['labels']), 15, 512) ?>),
                chart: {
                    type: 'pie',
                    height: 350,
                    toolbar: {
                        show: true,
                        tools: {
                            download: true
                        }
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val, opts) {
                        return opts.w.globals.series[opts.seriesIndex] +
                            " Employees"; // Show count inside slices
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

            var chart = new ApexCharts(document.querySelector("#sexGroups"), options);
            chart.render();

        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/charts/sex-groups.blade.php ENDPATH**/ ?>
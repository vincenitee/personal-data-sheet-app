<div class="bg-light">
    @livewire('print.sections.c1', ['pdsEntry' => $pdsEntry])
    @livewire('print.sections.c2', ['pdsEntry' => $pdsEntry])
    @livewire('print.sections.c3', ['pdsEntry' => $pdsEntry])
    @livewire('print.sections.c4', ['pdsEntry' => $pdsEntry])
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.print();
    });
</script>

@props(['count' => 0])

<div class="col-12 d-flex align-items-center">
    <!-- Badge -->
    <div class="badge bg-primary text-white rounded-circle">
        {{ $count + 1 }}
    </div>

    <!-- Separator -->
    <div class="flex-grow-1 border"></div>
</div>

@props([
    'label',
    'colSpan' => 2,
    'type' => 'default',
    'icon' => null,
    'class' => ''
])

<tr class="table-separator {{ $class }}">
    <th
        colspan="{{ $colSpan }}"
        class="table-separator__header
            text-start
            px-3
            py-2
            @switch($type)
                @case('primary')
                    bg-primary text-white
                @break
                @case('secondary')
                    bg-secondary text-white
                @break
                @case('light')
                    bg-light text-muted
                @break
                @case('dark')
                    bg-dark text-white
                @break
                @default
                    bg-soft-primary text-primary
            @endswitch
            fw-semibold
            text-uppercase
            align-middle"
    >
        @if($icon)
            <i class="{{ $icon }} me-2"></i>
        @endif
        {{ Str::upper($label) }}
    </th>
</tr>

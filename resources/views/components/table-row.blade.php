@props(['label', 'value' => null, 'type' => 'text', 'icon' => null, 'emptyState' => 'Not Applicable'])

<tr class="detail-row">
    <th scope="row" class="detail-row__label text-muted fw-semibold text-start ps-3 py-3"
        style="width: 25%; min-width: 150px;">
        @if ($icon)
            <i class="{{ $icon }} me-2 text-secondary"></i>
        @endif
        {{ Str::upper($label) }}
    </th>
    <td class="detail-row__value fw-medium py-3" style="width: 75%;">
        @if ($value !== null && $value !== '')
            @switch($type)
                @case('text')
                    <span class="text-dark">{{ $value }}</span>
                @break

                @case('email')
                    <a href="mailto:{{ $value }}" class="text-primary text-decoration-underline">
                        {{ $value }}
                    </a>
                @break

                @case('url')
                    <a href="{{ $value }}" target="_blank" rel="noopener noreferrer"
                        class="text-primary text-decoration-underline">
                        {{ $value }}
                    </a>
                @break

                @case('boolean')
                    <span class="badge {{ $value ? 'bg-success' : 'bg-danger' }}">
                        {{ $value ? 'Yes' : 'No' }}
                    </span>
                @break

                @default
                    <span>{{ $value }}</span>
            @endswitch
        @else
            <span class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                {{-- <i class="fas fa-exclamation-triangle me-1 opacity-75"></i> --}}
                {{ $emptyState }}
            </span>
        @endif
    </td>
</tr>

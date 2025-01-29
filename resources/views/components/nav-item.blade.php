@props(['icon', 'item', 'url' => '#', 'active' => false])

<li class="nav-item rounded {{ $active ? 'active' : '' }}">
    <a href="{{ $url }}" class="nav-link text-white">
        <i class="{{ $icon }}"></i>
        <span class="ms-2" style="font-size: 0.9rem;">{{ $item }}</span>
    </a>
</li>

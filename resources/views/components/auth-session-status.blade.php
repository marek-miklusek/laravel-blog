@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-semibold text-green-600']) }}>
        {{ $status }}
    </div>
@endif

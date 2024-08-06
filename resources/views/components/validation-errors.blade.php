@php
    use Statickidz\GoogleTranslate;


    $tr = new GoogleTranslate();


@endphp

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">{{ __('Alguma coisa deu errado') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)

                <li>{{ $tr->translate('en', 'pt', $error), PHP_EOL }}</li>
            @endforeach
        </ul>
    </div>
@endif

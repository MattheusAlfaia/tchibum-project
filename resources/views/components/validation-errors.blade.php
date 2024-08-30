@php
    use Statickidz\GoogleTranslate;


    $tr = new GoogleTranslate();


@endphp

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-center">{{ __('Alguma coisa deu errado!') }}</div>

        <ul class="text-danger
            list-none
            list-inside
            mt-3">
            @foreach ($errors->all() as $error)

                <li>{{ $tr->translate('en', 'pt', $error), PHP_EOL }}</li>
            @endforeach
        </ul>
    </div>
@endif

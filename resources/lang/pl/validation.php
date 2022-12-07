<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute musi zostać zaakceptowany.',
    'accepted_if' => ':attribute musi zostać zaakceptowany, gdy :inne to :wartość.',
    'active_url' => ':attribute nie jest prawidłowym adresem URL.',
    'after' => ':attribute musi być datą następującą po :data.',
    'after_or_equal' => ':attribute musi być datą późniejszą lub równą :data.',
    'alpha' => ':attribute może zawierać tylko litery.',
    'alpha_dash' => ':attribute może zawierać tylko litery, cyfry, myślniki i podkreślenia.',
    'alpha_num' => ':attribute może zawierać tylko litery i cyfry.',
    'array' => ':attribute musi być tablicą.',
    'before' => ':attribute musi być datą przed :date.',
    'before_or_equal' => ':attribute musi być datą wcześniejszą lub równą :data.',
    'between' => [
        'array' => 'Pole :attribute musi zawierać elementy od :min do :max.',
        'file' => ':attribute musi zawierać się w przedziale od :min do :max kilobajtów.',
        'numeric' => 'Wartość :attribute musi mieścić się w przedziale od :min do :max.',
        'string' => 'Pole :attribute musi zawierać się między znakami :min i :max.',
    ],
    'boolean' => 'Pole :attribute musi mieć wartość prawda lub fałsz.',
    'confirmed' => 'Potwierdzenie :attribute nie pasuje.',
    'current_password' => 'Hasło jest błędne.',
    'date' => ':attribute nie jest prawidłową datą.',
    'date_equals' => ':attribute musi być datą równą :data.',
    'date_format' => 'on :attribute nie pasuje do formatu :format.',
    'declined' => ':attribute musi zostać odrzucony.',
    'declined_if' => ':attribute musi zostać odrzucony, gdy :inne to :wartość.',
    'different' => 'Parametry :attribute i :other muszą być różne.',
    'digits' => ':attribute musi być :cyfry cyfry.',
    'digits_between' => ':attribute musi zawierać się między cyframi :min i :max.',
    'dimensions' => ':attribute ma nieprawidłowe wymiary obrazu.',
    'distinct' => 'Pole :attribute ma zduplikowaną wartość.',
    'email' => ':attribute musi być poprawnym adresem e-mail.',
    'ends_with' => ':attribute musi kończyć się jednym z następujących: :wartości.',
    'enum' => 'Wybrany :attribute jest nieprawidłowy.',
    'exists' => 'Wybrany :attribute jest nieprawidłowy.',
    'file' => ':attribute musi być plikiem.',
    'filled' => 'Pole :attribute musi mieć wartość.',
    'gt' => [
        'array' => 'Opcja :attribute musi zawierać więcej elementów niż :value.',
        'file' => ':attribute musi być większy niż :wartość kilobajtów.',
        'numeric' => ':attribute musi być większy niż :wartość.',
        'string' => ':attribute musi być większy niż :wartość znaków.',
    ],
    'gte' => [
        'array' => 'Opcja :attribute musi zawierać elementy :value lub więcej.',
        'file' => 'Wartość :attribute musi być większa lub równa :value kilobajtów.',
        'numeric' => ':attribute musi być większy lub równy :wartość.',
        'string' => 'Wartość :attribute musi być większa lub równa :value znaków.',
    ],
    'image' => ':attribute musi być obrazem.',
    'in' => 'Wybrany :attribute jest nieprawidłowy.',
    'in_array' => 'Pole :attribute nie istnieje w :other.',
    'integer' => ':attribute musi być liczbą całkowitą.',
    'ip' => ':attribute musi być poprawnym adresem IP.',
    'ipv4' => ':attribute musi być poprawnym adresem IPv4.',
    'ipv6' => ':attribute musi być prawidłowym adresem IPv6.',
    'json' => ':attribute musi być prawidłowym ciągiem znaków JSON.',
    'lt' => [
        'array' => ':attribute musi zawierać mniej niż :value elementów.',
        'file' => ':attribute musi być mniejszy niż :wartość kilobajtów.',
        'numeric' => ':attribute musi być mniejszy niż :wartość.',
        'string' => 'Wartość :attribute musi być mniejsza niż :wartość znaków.',
    ],
    'lte' => [
        'array' => ':attribute nie może zawierać więcej niż :value elementów.',
        'file' => 'Wartość :attribute musi być mniejsza lub równa :value kilobajtów.',
        'numeric' => ':attribute musi być mniejszy lub równy :wartość.',
        'string' => 'Wartość :attribute musi być mniejsza lub równa :value znaków.',
    ],
    'mac_address' => ':attribute musi być poprawnym adresem MAC.',
    'max' => [
        'array' => ':attribute nie może zawierać więcej niż :max pozycji.',
        'file' => ':attribute nie może być większy niż :max kilobajtów.',
        'numeric' => ':attribute nie może być większy niż :max.',
        'string' => 'Wartość :attribute nie może być większa niż :max znaków.',
    ],
    'mimes' => ':attribute musi być plikiem typu: :values.',
    'mimetypes' => ':attribute musi być plikiem typu: :values.',
    'min' => [
        'array' => ':attribute musi zawierać co najmniej :min pozycji.',
        'file' => ':attribute musi wynosić co najmniej :min kilobajtów.',
        'numeric' => ':attribute musi wynosić co najmniej :min.',
        'string' => ':attribute musi mieć co najmniej :min znaków.',
    ],
    'multiple_of' => ':attribute musi być wielokrotnością :wartość.',
    'not_in' => 'Wybrany :attribute jest nieprawidłowy.',
    'not_regex' => 'Format :attribute jest nieprawidłowy.',
    'numeric' => ':attribute musi być liczbą.',
    'password' => [
        'letters' => ':attribute musi zawierać co najmniej jedną literę.',
        'mixed' => ':attribute musi zawierać co najmniej jedną wielką i jedną małą literę.',
        'numbers' => ':attribute musi zawierać co najmniej jedną liczbę.',
        'symbols' => ':attribute musi zawierać co najmniej jeden symbol.',
        'uncompromised' => 'Podany :attribute pojawił się w wycieku danych. Wybierz inny :atrybut.',
    ],
    'present' => 'Pole :attribute musi być obecne.',
    'prohibited' => 'Pole :attribute jest zabronione.',
    'prohibited_if' => 'Pole :attribute jest zabronione, gdy :inne to :wartość.',
    'prohibited_unless' => 'Pole :attribute jest zabronione, chyba że :other znajduje się w :values.',
    'prohibits' => 'Pole :attribute zabrania obecności :other.',
    'regex' => 'Format :attribute jest nieprawidłowy.',
    'required' => 'Pole :attribute jest wymagane.',
    'required_array_keys' => 'Pole :attribute musi zawierać wpisy dla: :values.',
    'required_if' => 'Pole :attribute jest wymagane, gdy :inne to :wartość.',
    'required_unless' => 'Pole :attribute jest wymagane, chyba że :other występuje w :values.',
    'required_with' => 'Pole :attribute jest wymagane, gdy występuje :values.',
    'required_with_all' => 'Pole :attribute jest wymagane, gdy obecne są wartości :wartości.',
    'required_without' => 'Pole :attribute jest wymagane, gdy nie ma wartości :values.',
    'required_without_all' => 'Pole :attribute jest wymagane, gdy nie podano żadnej z wartości :values.',
    'same' => 'Parametry :attribute i :other muszą być zgodne.',
    'size' => [
        'array' => 'Pole :attribute musi zawierać elementy :size.',
        'file' => ':attribute musi mieć wartość :size kilobajty.',
        'numeric' => 'Ton :attribute musi być :rozmiar.',
        'string' => 'Pole :attribute musi składać się ze znaków :size.',
    ],
    'starts_with' => 'Pole :attribute musi zaczynać się od jednego z następujących: :wartości.',
    'string' => ':attribute musi być ciągiem znaków.',
    'timezone' => ':attribute musi być prawidłową strefą czasową.',
    'unique' => ':attribute został już zajęty.',
    'uploaded' => 'Nie udało się przesłać atrybutu :attribute.',
    'url' => 'he :attribute musi być prawidłowym adresem URL.',
    'uuid' => ':attribute musi być prawidłowym identyfikatorem UUID.',
    

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'niestandardowy komunikat',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [

        'brand_id' => 'marka',
        'name_brand' => 'nazwa marki',
        'brand_photos' => 'zdjęcie marki',

        'name_category' => 'nazwa kategorii',
        'category_id' => 'kategoria',

        'subcategory_id' => 'podkategoria',
        'name_subcategory' => 'nazwa podkategorii',

        'subsubcategory_id' => 'podkategoria podrzędna',
        'name_subsubcategory' => 'nazwa podkategorii podrzędnej',

        'name_product' => 'nazwa produktu',
        'code_product' => 'kod produktu',
        'quantity_product' => 'ilość produktu',
        'tags_product' => 'tagi produktu',
        'weight_product' => 'waga produktu',

        'price_selling' => 'cena sprzedaży',
        'price_discount' => 'cena promocyjna',

        'description_short' => 'krótki opis',
        'description_long' => 'długi opis',

        'img_slider' => 'zdjęcie suwaka',
        'title' => 'tytuł',
        'description' => 'opis'

    ],

];

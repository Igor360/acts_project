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

    'accepted'             => ':attribute повинен бути прийнятий.',
    'active_url'           => ':attribute не є дійсною URL-адресою.',
    'after'                => ':attribute повинна бути датою після :date.',
    'after_or_equal'       => ':attribute повинна бути датою після або рівною :date.',
    'alpha'                => ':attribute може містити лише літери.',
    'alpha_dash'           => ':attribute може містити лише літери, цифри та дефіси.',
    'alpha_num'            => ':attribute може містити лише літери та цифри.',
    'array'                => ':attribute повинен бути масивом.',
    'before'               => ':attribute повинна бути датою раніше :date.',
    'before_or_equal'      => ':attribute повинна бути датою раніше або рівною :date.',
    'between'              => [
        'numeric' => ':attribute повинна бути між :min і :max.',
        'file'    => ':attribute повинна бути між :min і :max кілобайт.',
        'string'  => ':attribute повинна бути між :min і :max символів.',
        'array'   => ':attribute повинна бути між :min і :max елементов.',
    ],
    'boolean'              => ':attribute поле повинно бути true чи false.',
    'confirmed'            => ':attribute підтвердження не збігається',
    'date'                 => ':attribute не є дійсною датою.',
    'date_format'          => ':attribute не відповідає формату :format.',
    'different'            => ':attribute і :other повинні бути різні',
    'digits'               => ':attribute повинно бути :digits цифр.',
    'digits_between'       => ':attribute повинно бути між :min і :max цифр.',
    'dimensions'           => ':attribute має невірні розміри зображення.',
    'distinct'             => ':attribute поле має подвійне значення.',
    'username'             => ':attribute повинна бути дійсним іменем користувача.',
    'email'                => ':attribute повинна бути дійсною електронною адресою.',
    'exists'               => 'На жаль введені дані не є дійсними.',
    'file'                 => ':attribute повинен бути файлом.',
    'filled'               => ':attribute поле повинно мати значення.',
    'image'                => ':attribute повинно бути картинкою.',
    'in'                   => 'Виббраний :attribute є недійсним.',
    'in_array'             => ':attribute поле не міститься в :other.',
    'integer'              => ':attribute повинно бути цілим числом.',
    'ip'                   => ':attribute повинен бути вірним IP адресом.',
    'ipv4'                 => ':attribute повинен бути вірним IPv4 адресом.',
    'ipv6'                 => ':attribute повинен бути вірним IPv6 адресом.',
    'json'                 => ':attribute повинен бути вірною JSON строкой.',
    'max'                  => [
        'numeric' => ':attribute не може бути більшим за :max.',
        'file'    => ':attribute не може бути більшим за :max кілобайт.',
        'string'  => ':attribute Не може бути більшим за :max символів.',
        'array'   => ':attribute не може бути більшим за :max елемкнтів.',
    ],
    'mimes'                => ':attribute повинно бути файлом з типом: :values.',
    'mimetypes'            => ':attribute повинно бути файлом з типом: :values.',
    'min'                  => [
        'numeric' => ':attribute повинен бути принаймні :min.',
        'file'    => ':attribute повинен бути принаймні :min кілобайт.',
        'string'  => ':attribute повинен бути принаймні :min символів.',
        'array'   => ':attribute повинен бути принаймні :min елементів.',
    ],
    'not_in'               => 'Вибраний :attribute є невірним.',
    'numeric'              => ':attribute повинно бути числом.',
    'present'              => ':attribute поле має бути присутнім.',
    'regex'                => ':attribute формар не є вірним.',
    'required'             => ':attribute поле є обов\'язковим.',
    'required_if'          => ':attribute поле обов\'язкове коли :other є :value.',
    'required_unless'      => ':attribute поле обов\'язкове, крім випадків :other є в :values.',
    'required_with'        => ':attribute поле обов\'язкове коли :values є присутнім.',
    'required_with_all'    => ':attribute поле обов\'язкове коли :values є присутнім.',
    'required_without'     => ':attribute поле обов\'язкове коли :values не є присутнім.',
    'required_without_all' => ':attribute поле потрібне, коли ніхто з :values є присутніми.',
    'same'                 => ':attribute і :other повинні збігатися.',
    'size'                 => [
        'numeric' => ':attribute повинен бути :size.',
        'file'    => ':attribute повинен бути :size кілобайт.',
        'string'  => ':attribute повинен бути :size символів.',
        'array'   => ':attribute повинен містити :size елементів.',
    ],
    'string'               => ':attribute повинно бути строкой.',
    'timezone'             => ':attribute повинно бути дійсною зоною.',
    'unique'               => ':attribute вже було вибрано.',
    'uploaded'             => ':attribute помилка вигрузки файлов.',
    'url'                  => 'Невірно введені дані.',

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
            'rule-name' => 'спеціальне повідомлення',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];

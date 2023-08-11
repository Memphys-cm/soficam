<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Le following language lines contain Le default error messages used by
    | Le validator class. Some of these rules have multiple versions such
    | as Le size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Le :attribute doit être accepté.',
    'active_url' => 'Le :attribute n\'est pas une URL valide.',
    'after' => 'Le :attribute doit être une date après :date.',
    'after_or_equal' => 'Le :attribute doit être une date après ou égal à :date.',
    'alpha' => 'Le :attribute ne peut contenir que des lettres.',
    'alpha_dash' => 'Le :attribute ne peut contenir que des lettres, nombres, tirets et soulignés.',
    'alpha_num' => 'Le :attribute ne peut contenir que des lettres et nombres.',
    'array' => 'Le :attribute doit être un array.',
    'before' => 'Le :attribute doit être une date avant :date.',
    'before_or_equal' => 'Le :attribute doit être une date avant ou égal à :date.',
    'between' => [
        'numeric' => 'Le :attribute doit être entre :min et :max.',
        'file' => 'Le :attribute doit être entre :min et :max kilobytes.',
        'string' => 'Le :attribute doit être entre :min et :max characters.',
        'array' => 'Le :attribute doit avoir entre :min et :max articles.',
    ],
    'boolean' => 'Le :attribute le champ doit être vrai ou faux.',
    'confirmed' => 'Le :attribute la confirmation ne correspond pas.',
    'date' => 'Le :attribute ce n\'est pas une date valide.',
    'date_equals' => 'Le :attribute doit être une date égale à :date.',
    'date_format' => 'Le :attribute ne correspond pas au format :format.',
    'different' => 'Le :attribute et :other doit être différent.',
    'digits' => 'Le :attribute doit être :digits chiffres.',
    'digits_between' => 'Le :attribute doit être entre :min et :max chiffres.',
    'dimensions' => 'Le :attribute a des dimensions d\'image non valides.',
    'distinct' => 'Le :attribute le champ a une valeur en double.',
    'email' => 'Le :attribute doit être une adresse email valide.',
    'ends_with' => 'Le :attribute doit se terminer par un des following: :values',
    'exists' => 'Le choisie :attribute est invalide.',
    'file' => 'Le :attribute doit être a file.',
    'filled' => 'Le :attribute le champ doit avoir une valeur.',
    'gt' => [
        'numeric' => 'Le :attribute doit être plus grand que :value.',
        'file' => 'Le :attribute doit être plus grand que :value kilobytes.',
        'string' => 'Le :attribute doit être plus grand que :value characters.',
        'array' => 'Le :attribute doit avoir plus de :value items.',
    ],
    'gte' => [
        'numeric' => 'Le :attribute doit être plus grand que ou égal :value.',
        'file' => 'Le :attribute doit être plus grand que ou égal :value kilobytes.',
        'string' => 'Le :attribute doit être plus grand que ou égal :value characters.',
        'array' => 'Le :attribute doit avoir :value articles ou plus.',
    ],
    'image' => 'Le :attribute doit être une image.',
    'in' => 'Le selected :attribute est invalide.',
    'in_array' => 'Le :attribute fle champ n\'existe pas dans :other.',
    'integer' => 'Le :attribute doit être un nombre entier.',
    'ip' => 'Le :attribute doit être une adresse IP valide.',
    'ipv4' => 'Le :attribute doit être une adresse IPv4 valide.',
    'ipv6' => 'Le :attribute doit être une adresse IPv6 valide.',
    'json' => 'Le :attribute doit être une chaîne JSON valide.',
    'lt' => [
        'numeric' => 'Le :attribute doit être moins que :value.',
        'file' => 'Le :attribute doit être moins que :value kilobytes.',
        'string' => 'Le :attribute doit être moins que :value characters.',
        'array' => 'Le :attribute doit avoir moins que :value items.',
    ],
    'lte' => [
        'numeric' => 'Le :attribute doit être moins que ou égal :value.',
        'file' => 'Le :attribute doit être moins que ou égal :value kilobytes.',
        'string' => 'Le :attribute doit être moins que ou égal :value characters.',
        'array' => 'Le :attribute ne doit pas avoir plus de :value items.',
    ],
    'max' => [
        'numeric' => 'Le :attribute n\'est peut être pas plus grand que :max.',
        'file' => 'Le :attribute n\'est peut être pas plus grand que :max kilobytes.',
        'string' => 'Le :attribute n\'est peut être pas plus grand que :max characters.',
        'array' => 'Le :attribute peut ne pas avoir plus de :max items.',
    ],
    'mimes' => 'Le :attribute doit être un dossier de type: :values.',
    'mimetypes' => 'Le :attribute doit être un dossier de type: :values.',
    'min' => [
        'numeric' => 'Le :attribute doit être au moins :min.',
        'file' => 'Le :attribute doit être au moins :min kilobytes.',
        'string' => 'Le :attribute doit être au moins :min characters.',
        'array' => 'Le :attribute doit avoir au moins :min items.',
    ],
    'not_in' => 'Le selected :attribute est invalide.',
    'not_regex' => 'Le :attribute format est invalide.',
    'numeric' => 'Le :attribute doit être un numéro.',
    'present' => 'Le :attribute field doit être présent.',
    'regex' => 'Le :attribute format est invalide.',
    'required' => 'Le :attribute Champ requis.',
    'required_if' => 'Le :attribute Champ requis quand :other est :value.',
    'required_unless' => 'Le :attribute Champ requis unless :other est dans :values.',
    'required_with' => 'Le :attribute Champ requis quand :values est présent.',
    'required_with_all' => 'Le :attribute Champ requis quand :values sont présent.',
    'required_without' => 'Le :attribute Champ requis quand :values n\'est pas présent.',
    'required_without_all' => 'Le :attribute Champ requis quand aucun de :values sont présent.',
    'same' => 'Le :attribute et :other must match.',
    'size' => [
        'numeric' => 'Le :attribute doit être :size.',
        'file' => 'Le :attribute doit être :size kilobytes.',
        'string' => 'Le :attribute doit être :size characters.',
        'array' => 'Le :attribute doit contenir :size items.',
    ],
    'starts_with' => 'Le :attribute doit commencer par l\'un des following: :values',
    'string' => 'Le :attribute doit être un string.',
    'timezone' => 'Le :attribute doit être une zone valide.',
    'unique' => 'Le :attribute a déjà été pris.',
    'uploaded' => 'Le :attribute échec du téléchargement.',
    'url' => 'Le :attribute format est invalide.',
    'uuid' => 'Le :attribute doit être un UUID valide.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name Le lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | Le following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];

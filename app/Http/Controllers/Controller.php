<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public $feedback_validate = [
        'required' => 'Data :attribute harus diisi.',
        'numeric' => 'Data :attribute harus berupa angka',
        'image' => 'Data :attribute harus berupa file jpeg, jpg atau png',
        'max' => 'Data :attribute maksimal :max',
        'email' => 'Data :attribute harus berupa email yang valid.',
        'in' => 'Data :attribute harus berupa :values.',
    ];
}

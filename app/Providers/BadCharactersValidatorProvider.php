<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class BadCharactersValidatorProvider extends ServiceProvider
{
    public function boot()
    {
        Validator::extend('no_bad_words', function ($attribute, $value, $parameters, $validator) {
            // Implement your logic to check for bad words
            $badWords = ['Anjing', 'Babi', 'Kunyuk', 'Bajingan', 'Asu', 'Bangsat', 'Kampret', 'Kontol', 'Memek', 'Ngentot', 'Pentil', 'Perek', 'Pepek', 'Pecun', 'Bencong', 'Banci', 'Maho', 'Gila', 'Sinting', 'Tolol', 'Sarap', 'Setan', 'Lonte', 'Hencet', 'Taptei', 'Kampang', 'Pilat', 'Keparat', 'Bejad', 'Gembel', 'Brengsek', 'Tai', 'Anjrit', 'Bangsat', 'Fuck', 'Tetek', 'Ngulum', 'Jembut', 'Totong', 'Kolop', 'Pukimak', 'Bodat', 'Heang', 'Jancuk', 'Burit', 'Titit', 'Nenen', 'Bejat', 'Silit', 'Sempak', 'Fucking', 'Asshole', 'Bitch', 'Penis', 'Vagina', 'Klitoris', 'Kelentit', 'Borjong', 'Dancuk', 'Pantek', 'Taek', 'Itil', 'Teho', 'Bejat', 'Pantat', 'Bagudung', 'Babami', 'Kanciang', 'Bungul', 'Idiot', 'Kimak', 'Henceut', 'Kacuk', 'Blowjob', 'Pussy', 'Dick', 'Damn', 'Ass'];

            foreach ($badWords as $badWord) {
                if (stripos($value, $badWord) !== false) {
                    return false;
                }
            }

            return true;
        });

        Validator::replacer('no_bad_words', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'The :attribute contains inappropriate language.');
        });

        Validator::extend('unique_from_model', function ($attribute, $value, $parameters, $validator) {
            list($modelClass, $column) = $parameters;

            $count = $modelClass::where(DB::raw('LOWER(' . $column . ')'), Str::lower($value))->count();

            return $count === 0;
        });

        Validator::replacer('unique_from_model', function ($message, $attribute, $rule, $parameters) {
            $column = $parameters[1];
            $formattedMessage = ucfirst($column) . ' is already used.';

            return $formattedMessage;
        });
    }
}

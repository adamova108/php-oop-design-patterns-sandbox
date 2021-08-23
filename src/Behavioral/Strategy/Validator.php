<?php

namespace KWD_Sandbox\Behavioral\Strategy;

class Validator
{
    public static function validate(array $request): array
    {
        $errors = [];

        foreach ($request as $field) {
            $rules = explode('|', $field['rules']);

            foreach ($rules as $rule) {

                $error = '';

                if ('email' === $rule) {
                    $error = (new ValidationStrategy(new Email($field['value'], $field['name'])))->validate();
                } else if ('numeric' === $rule) {
                    $error = (new ValidationStrategy(new Numeric($field['value'], $field['name'])))->validate();
                } else if ('required' === $rule) {
                    $error = (new ValidationStrategy(new Required($field['value'], $field['name'])))->validate();
                }

                if (!empty($error)) {
                    $errors[$field['name']]['errors'][] = $error;
                }

            }
        }

        return $errors;
    }
}
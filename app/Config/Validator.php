<?php

namespace App\Config;

class Validator
{
    public static function validateRequired(array $data, array $requiredFields): array
    {
        $errors = [];
        foreach ($requiredFields as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                $errors[$field] = ucfirst($field) . ' is required.';
            }
        }
        return $errors;
    }

    public static function validateEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}

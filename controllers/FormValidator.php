<?php

namespace controllers;

class FormValidator
{
    /**
     * @param array $data
     * @param array $regexes
     * @return array with any error found during validation
     */
    public function validate(array $data, array $regexes): array {
        $error = array();
        foreach ($regexes as $input => $regex) {
            if (!empty($data[$input])) {
                if (preg_match($regex, $data[$input]) == 0) {
                    $error[$input] = 'Valeur invalide, veuillez reessayer';
                }
            } else {
                $error[$input] = 'Champ obligatoire';
            }
        }
        return $error;
    }
}
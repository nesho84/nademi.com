<?php

class CategoryValidator
{
    private static $ok = true;

    public static function validate($postData, $id = '')
    {
        // Sanitize POST array
        $postData = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $postData = [
            'categoryUserID' => $_SESSION["userID"],
            'categoryName' => htmlspecialchars(trim($postData["categoryName"])),
            'categoryDescription' => htmlspecialchars(trim($postData["categoryDescription"]))
        ];

        // Validation
        if (empty($postData['categoryName'])) {
            self::$ok = false;
            $postData['categoryName_error'] = "Name can not be empty";
        }
        if (empty($postData['categoryDescription'])) {
            self::$ok = false;
            $postData['categoryDescription_error'] = "Please insert a description";
        }

        // return validated fields
        return $postData;
    }

    public static function getOk()
    {
        if (!self::$ok) {
            return false;
        } else {
            return true;
        }
    }
}

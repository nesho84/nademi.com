<?php

class DemoValidator
{
    private static $ok = true;

    public static function validate($postData)
    {
        // Sanitize POST array
        $postData = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Get POST data array
        $postData = [
            'demoTitle' => htmlspecialchars(trim($postData["demoTitle"])),
            'demoUserID' => $_SESSION["userID"],
            'demoCategoryID' => $postData["demoCategoryID"] ?? '',
            'demoCompletionDate' => date("Y-m-d", strtotime($postData["demoCompletionDate"])) ?? '',
            'demoDescription' => htmlspecialchars(trim($postData["demoDescription"])),
            'demoImage' => '',
            'demoLinks' => htmlspecialchars(trim($postData["demoLinks"]))
        ];

        // Validate fields
        if (empty($postData['demoTitle'])) {
            self::$ok = false;
            $postData['demoTitle_error'] = "Title can not be empty";
        }
        if (!$postData["demoCategoryID"]) {
            self::$ok = false;
            $postData['demoCategoryID_error'] = "Please choose Category";
        }
        if (empty($postData['demoCompletionDate']) || $postData['demoCompletionDate'] == '1970-01-01') {
            self::$ok = false;
            $postData['demoCompletionDate_error'] = "Please choose a Completion date";
        }
        if (empty($postData['demoDescription'])) {
            self::$ok = false;
            $postData['demoDescription_error'] = "Please write a description";
        }
        if (empty($postData['demoLinks'])) {
            self::$ok = false;
            $postData['demoLinks_error'] = "Links can not be empty";
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

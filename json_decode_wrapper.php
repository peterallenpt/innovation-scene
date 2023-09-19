<?php



// Snippet of code to make a JSON decoder function or method.
// Calls native php function and adds error code check


    public function jsonDecoder($string) {

        $string = json_decode($string, true);			// Decode the json. 'true' converts to an associative array, false = object

        // Json decode error handling

        {
        //did we have any parsing issues for the response?
        switch (json_last_error())
        {
            case JSON_ERROR_NONE:
                $error = 'No errors';
                break;
            case JSON_ERROR_DEPTH:
                $error = 'Maximum stack depth exceeded';
                break;
            case JSON_ERROR_STATE_MISMATCH:
                $error = ' Underflow or the modes mismatch';
                break;
            case JSON_ERROR_CTRL_CHAR:
                $error = 'Unexpected control character found';
                break;
            case JSON_ERROR_SYNTAX:
                $error = 'Syntax error, malformed JSON';
                break;
            case JSON_ERROR_UTF8:
                $error = 'Malformed UTF-8 characters, possibly incorrectly encoded';
                break;
            default:
                $error = 'Unknown error';
                break;
        }

        throw new Exception("Cannot read response by  '" . $this->url . "' because of: '" . $error . "'.");
    }
        return $string;
    }


?>

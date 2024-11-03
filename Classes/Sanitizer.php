<?php

class Sanitizer{

    public static function sanitize($input) {
        $inputType = getType($input);
        
        switch ($inputType){

            case 'string':
                $data = strip_tags($input);
                $data = htmlspecialchars($data);
                $data = filter_var($data, 513);// کود این است 513FILTER_SANITIZE_STRING
                return $data;
                break;
            
            case 'integer':
                $data = filter_var($input, FILTER_SANITIZE_NUMBER_INT);// کود این است 519
                return $data;
                break;

            case 'array':
                $indexed = array_values($input) === $input;
                $data = [];
                foreach($input as $key => $value){
                    if($indexed){
                        $data[] = self::sanitize($value);
                    }
                    else{

                        $data[self::sanitize($key)] = self::sanitize($value);
                    }
                } 
                return $data;
               break;
        }
    }
}

// $san = new Sanitizer();
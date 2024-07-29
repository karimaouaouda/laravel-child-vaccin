<?php

namespace App\Enum;

enum AppointmentStatus : string
{
    case WAITING = "WAITING";

    case WASTED = "WASTED";

    case DONE = "DONE";



    public static function values(bool $assoc = false){
        $values = [];

        foreach( self::cases() as $case ){
            if(!$assoc){
                $values[] = $case->value;
            }else{
                $values[$case->name] = $case->value;
            }
        }


        return $values;
    }

    public static function getByName($case_name){
        foreach(self::cases() as $case){
            if($case->name == $case_name){
                return $case;
            }
        }

        return null;
    }

    public static function getKeyByValue($value){
        foreach(self::cases() as $case){
            if($case->value == $value){
                return $case;
            }
        }

        return null;
    }

}

<?php 

namespace Options_lib;

defined('BASEPATH') || exit('Access Denied.');

include "Fields/Base.php";
include "Fields/Text.php";
include "Fields/Number.php";
include "Fields/Textarea.php";
include "Fields/Switcher.php";
include "Fields/Radio.php";
include "Fields/MultiSelect.php";
include "Fields/Select.php";
include "Fields/Image.php";
include "Repeater/Field.php";

class FieldMap {
    public static $map = [
        'text'         => 'Options_lib\\Fields\\Text',
        'number'       => 'Options_lib\\Fields\\Number',
        'textarea'     => 'Options_lib\\Fields\\Textarea',
        'select'       => 'Options_lib\\Fields\\Select',
        'switch'       => 'Options_lib\\Fields\\Switcher',
        'radio'        => 'Options_lib\\Fields\\Radio',
        'image'        => 'Options_lib\\Fields\\Image',
        'multi-select' => 'Options_lib\\Fields\\MultiSelect',
        'repeater'     => 'Options_lib\\Fields\\Repeater',
    ];

    public static function Render( $key, $field, $dom, $error, $repeater = false ) {
        $field = new self::$map[$field['type']]($key, $field, $dom, $error, $repeater);

        if( is_array($repeater) )
            $field->repeater_render();
        else
            $field->render();

        return $field;
    }

    public static function Validate( $key, $field, $ci, $options ) {
        return self::$map[$field['type']]::Validate($key, $field, $ci, $options);
    }

    public static function BeforeSave( $value, $key, $field, $options, $ci) {
        return self::$map[$field['type']]::BeforeSave($value, $key, $field, $options, $ci);
    }

    public static function AfterLoad( $value, $key, $field, $options, $ci) {
        return self::$map[$field['type']]::AfterLoad($value, $key, $field, $options, $ci);
    }
}
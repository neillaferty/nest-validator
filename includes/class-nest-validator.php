<?php

class NestValidator {

  public static function validate_code($code) {
    $closer_openers = array(
      ')' => '(',
      '}' => '{',
      ']' => '['
    );
    $openers = array();

    for ($i=0; $i < strlen($code); $i++) {
      $char = substr($code, $i, 1);
      if (in_array($char, $closer_openers)) {
        // it's an opener
        $openers[] = $char;
      } else if (array_key_exists($char, $closer_openers)) {
        // it's a closer
        // does it match the most recent unclosed opener?
        if (end($openers) == $closer_openers[$char]) {
          // cool, we don't have to worry about this one anymore.
          array_pop($openers);
        } else {
          return false;
        }
      }
    }
    // We should've popped all the openers off the array by now.
    return count($openers) === 0;
  }

}

?>

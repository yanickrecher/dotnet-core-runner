<?php
/**
 * Prompt and Validate STDIN
 * @param  string $prompt       Ausgabe für Userinput
 * @param  mixed  $valid_inputs string, array oder file
 * @param  string $default      Standardwert
 * @return string               Ausgewählte Option
 *
 * Usage:
 * // you can input <Enter> or 1, 2, 3
 * $choice = readStdin('Please choose your answer or press Enter to continue: ', array('', '1', '2', '3'));
 *
 * // check input is valid file name, use /var/path for input nothing
 * $file = readStdin('Please input the file name(/var/path):', 'is_file', '/var/path');
 *
 * // input must not be empty
 * $string = readStdin('Enter a non-empty string:', 'not_empty');
 */
function readStdin($prompt, $valid_inputs='', $default='') {
    while(!isset($input) || (is_array($valid_inputs) && !in_array($input, $valid_inputs)) || ($valid_inputs === 'is_file' && !is_file($input)) || ($valid_inputs === 'not_empty' && empty($input))) {
        echo $prompt;
        $input = strtolower(trim(fgets(STDIN)));
        if((empty($input) && $input !== '0') && !empty($default)) {
            $input = $default;
        }
    }
    return $input;
}




?>
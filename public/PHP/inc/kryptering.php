<?php 
        function Cipher($ch, $key) {
            if (!ctype_alpha($ch))
              return $ch;
              
            $offset = ord(ctype_upper($ch) ? 'A' : 'a');
            return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
          }
  
        function Krypter($input, $key) {
            $output = "";
              
            $inputArray = str_split($input);
            foreach ($inputArray as $ch)
              $output .= Cipher($ch, $key);          
            return $output;
          }

        function Dekrypter($input, $key) {
            return Krypter($input, 26 - $key);
          }
?>
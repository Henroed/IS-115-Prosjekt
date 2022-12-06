<?php 
        function Cipher($ch, $key) {
            if (!ctype_alpha($ch))       // dersom $ch ikke er en bokstav skal den returneres som feilmelding
              return $ch;
              
            $offset = ord(ctype_upper($ch) ? 'A' : 'a');
            return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
          }
  
        function Krypter($input, $key) {      // Returnerer boksvarene i $teskt men $key lengere tilbake i alfabetet
            $output = "";
              
            $inputArray = str_split($input);
            foreach ($inputArray as $ch)
              $output .= Cipher($ch, $key);          
            return $output;
          }

        function Dekrypter($input, $key) {      // returenerer krypter bare som boktaver $key lengere frem i alfabetet
            return Krypter($input, 26 - $key);
          }
?>
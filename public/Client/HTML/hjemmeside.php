<?php session_start(); ?>
<link rel="stylesheet" href="../Design/css/main.css">
<?php include 'inc/header.php'; ?>                        <!-- Hent header.php -->
<h1> Hjemmeside </h1>
<?php
      if(!isset($_SESSION['loginVerdi']))
      {
          header("Location:login.php");  
      }

      function Cipher($ch, $key)
            {
              if (!ctype_alpha($ch))
                return $ch;
            
              $offset = ord(ctype_upper($ch) ? 'A' : 'a');
              return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
            }

            function Krypter($input, $key)
            {
                $output = "";
            
                $inputArray = str_split($input);
                foreach ($inputArray as $ch)
                    $output .= Cipher($ch, $key);
            
                return $output;
            }
      
      // koble til db
      $conn = mysqli_connect("localhost", "root", "", "eventdatabase");  
      
      $side = "hjemmeside"; // definer navn på siden

      // hent fra db
        $sql = "SELECT eventID, eventNavn, dato, beskrivelse FROM event WHERE dato >= CURDATE()";
        include '../../PHP/inc/event.php';    // hent event.php
      $conn->close();
    ?>
<?php include 'inc/footer.html'; 
?><!-- Hent footer.php -->
</div>
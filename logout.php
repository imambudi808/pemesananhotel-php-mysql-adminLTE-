<?php
  session_start();

  unset($_SESSION["USERNAME_PEG"]);
  unset($_SESSION["USERNAME_PEL"]);


  header("Location: index.php");
?>
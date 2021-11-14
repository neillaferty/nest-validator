<?php

require_once("includes/class-nest-validator.php");

if ( isset($_POST['code_input'])) {
  $code = $_POST['code_input'];
  echo '<p>"' . $code . '" is ' . (NestValidator::validate_code($code) ? 'valid.' : 'INVALID.') . '</p>';
}

 ?>

 <form name="code_input" method="post" id="code_validate" action="">

   <input type="text" size="20" name="code_input" id="code_input"><input type="submit">

 </form>

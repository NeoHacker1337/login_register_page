<?php
namespace App\Libraries;

class Hash {
  public static function make($passsword){
    return password_hash($password, PASSWORD_BCRYPT);
  }
}

?>

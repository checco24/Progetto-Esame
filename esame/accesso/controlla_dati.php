<?php


function controlla_nome($nome){
  if (!empty($nome)
  && preg_match("/^[a-zA-Z]{1,}$/",$nome)) {
    return true;
  }
  return false;
}

function controlla_cognome($cognome){
  if (!empty($cognome)
  && preg_match("/^[a-zA-Z]{1,12}$/",$cognome)) {
    return true;
  }
  return false;
}

function controlla_email($email){
  if (!(empty($email))
  && filter_var($email,FILTER_VALIDATE_EMAIL)) {
    return true;
  }
  return false;
}

function controlla_data($data){
  if (!empty($data)
  && validateDate($data)) {
    return true;
  }
  return false;
}

  function controlla_password($pwd,$pwd2){
  if (!(empty($pwd) || empty($pwd2))
  && (strcmp($pwd,$pwd2)==0)
     ) {
    return true;
  }
  return false;
}


function validateDate($date){
  $arr=explode("-",$date);
  if (checkdate($arr[1], $arr[2], $arr[0])) {
        return true;
    } else {
        return false;
    }
}

?>

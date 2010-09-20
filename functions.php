<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);  
  
  function _each($array, $body){
    if (!is_callable($body)) throw new Exception("Invalid block.");
    foreach($array as $k => $v) call_user_func_array($body, array($k, $v));
  }
  
  function _collect($array, $body){
    if (!is_callable($body)) throw new Exception("Invalid block.");
    $collection = array();
    foreach($array as $k => $v) $collection[] = call_user_func_array($body, array($k, $v));
    return $collection;
  }
  
  function _map($array, $body){
    return _collect($array, $body);
  }
  
  function _select($array, $body){
    if (!is_callable($body)) throw new Exception("Invalid block.");
    $collection = array();
    foreach($array as $k => $v) if (call_user_func_array($body, array($k, $v))) $collection[] = $v;
    return $collection;
  }
  
  function _at($array, $at){
    if (!is_numeric($at)) throw new Exception("Invalid index.");
    if ($at >= 0) return $array[$at];
    return $array[sizeof($array) + $at];
  }
  
  function _compact($array){
    $collection = array();
    foreach($array as $k => $v) if ($v != null) $collection[] = $v;
    return $collection;
  }
?>
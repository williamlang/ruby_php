<?php
  include('functions.php');
?>
<html>
  <head>
    <title>Ruby Functions to PHP</title>
    <style type="text/css">
      div.code{
        background:#EEEEEE;
        border:1px solid #000000;
        margin:10px;
        padding:10px;
        margin-left:0;
        padding-left:0;
        font-size:12px;
        font-family:system;
        overflow-x:auto;
        width:99%;
      }
    </style>
  </head>
  <body>
    <h1>_each</h1>
    <div class="code">
      <?php
        highlight_string('
        <?php
          $array = array(1, 2, 3);
          _each($array, function($key, $value){
            echo $key " = ". $value . "<br />";
          });
        ?>
        ');
      ?>
    </div>
    <?php
      $array = array(1, 2, 3);
      _each($array, function($key, $value){ 
        echo $key .' = '. $value . '<br />'; 
      });
    ?>
      <h1>_collect</h1>
      <div class="code">
      <?php
        highlight_string('
        <?php
          $results = _collect($array, function($key, $value){
            return $value; 
          });
          
          _each($results, function($key, $value){ 
            echo $key ." = ". $value . "<br />"; 
          });
        ?>
        ');
      ?>
      </div>
    <?php
      $results = _collect($array, function($key, $value){
        return $value;
      });
      
      _each($results, function($key, $value){ 
        echo $key ." = ". $value . "<br />"; 
      });
    ?>
      <h1>_map</h1>
      <div class="code">
      <?php
        highlight_string('
        <?php
            $results = _map($array, function($key, $value){
              return $value;
            });
            
            _each($results, function($key, $value){ 
              echo $key ." = ". $value . "<br />"; 
            });
        ?>');
      ?>
      </div>
    <?php
      $results = _map($array, function($key, $value){
        return $value;
      });
      
      _each($results, function($key, $value){ 
        echo $key ." = ". $value . "<br />"; 
      });
    ?>
    <h1>_select</h1>
    <div class="code">
    <?php
      highlight_string('
      <?php
        $results = _select($array, function($key, $value){
          return $key == 2;
        });
        
        _each($results, function($key, $value){ 
          echo $key ." = ". $value . "<br />"; 
        });
      ?>
      ');
    ?>
    </div>
    <?php
      $results = _select($array, function($key, $value){
        return $key == 2;
      });
      
      _each($results, function($key, $value){ 
        echo $key ." = ". $value . "<br />"; 
      });
    ?>
    <h1>_at</h1>
    <div class="code">
    <?php
      highlight_string('
      <?php
        echo _at($array, 2) . "<br />";
        echo _at($array, -1);
      ?>
      ');
    ?>
    </div>
    <?php
      echo _at($array, 2) . "<br />";
      echo _at($array, -1);
    ?>
  </body>
</html>
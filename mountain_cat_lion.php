<?php
  //1 
  $index = 0;
  //2
  $mindful_health_data = array();
  
  //3
  function mindful_health_read_data($filename) {
      $fp = @fopen($filename, 'r');
      if (!$fp) {
          return false;
      }
      while ($row = fgetcsv($fp)) {
          $mindful_health_data[] = $row;
      }
      fclose($fp);
      return $mindful_health_data;
  }
  
  //4
  function mindful_health_write_data($filename, $mindful_health_data) {
      $fp = fopen($filename, 'w');
      foreach ($mindful_health_data as $row) {
          fputcsv($fp, $row);
      }
      fclose($fp);
  }
  
  //5
  function mindful_health_save_index($filename, $index) {
      $fp = fopen($filename, 'w');
      fwrite($fp, $index);
      fclose($fp);
  }
  
  //6
  function mindful_health_get_index($filename) {
      $fp = fopen($filename, 'r');
      $index = fread($fp, filesize($filename));
      fclose($fp);
      return $index;
  }
  
  //7
  function mindful_health_get_data($mindful_health_data, $index) {
      if ($index >= count($mindful_health_data)) {
          return false;
      }
      return $mindful_health_data[$index];
  }
  
  //8
  function mindful_health_update_data($mindful_health_data, $index, $data) {
      if ($index >= count($mindful_health_data)) {
          return false;
      }
      $mindful_health_data[$index] = $data;
      return true;
  }
  
  //9
  function mindful_health_process_input($data) {
      // do something
      return $processed_data;
  }
  
  //10
  function mindful_health_increment_index($index) {
      $index++;
      if ($index >= count($mindful_health_data)) {
          $index = 0;
      }
      return $index;
  }
 
  //11
  function mindful_health_output($data) {
      // do something
  }
  
  //12
  while (true) {
      //13
      $mindful_health_data = mindful_health_read_data('mindful_health.csv');
      //14
      $index = mindful_health_get_index('mindful_health.txt');
      //15
      $data = mindful_health_get_data($mindful_health_data, $index);
      //16
      $processed_data = mindful_health_process_input($data);
      //17
      mindful_health_update_data($mindful_health_data, $index, $processed_data);
      //18
      mindful_health_write_data('mindful_health.csv', $mindful_health_data);
      //19
      mindful_health_save_index('mindful_health.txt', $index);
      //20
      mindful_health_output($data);
      //21
      $index = mindful_health_increment_index($index);
  }
?>
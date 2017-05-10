<?php

namespace Gevman\CsvLite;

interface CsvActions
{
  public function read($delimiter = "," ,$enclosure = '"' ,$escape = '\\');

  public function write(array $data);
  
  public function clear();
  
  public function delete();
}
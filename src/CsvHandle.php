<?php

namespace Gevman\CsvLite;

interface CsvHandle
{
  /**
   * @param string $name
   * @param string $mode
   * @return CsvActions
   */
  public function create($name = null, $mode = 'w+');

  /**
   * @param string $name
   * @return CsvActions
   */
  public function open($name);
  
}
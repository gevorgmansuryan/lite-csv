<?php

namespace Gevman\CsvLite;


class Csv implements CsvHandle, CsvActions
{
  private $handle;

  public function create($name = null, $mode = 'w+')
  {
    $name = sprintf("%s.csv", $name ? $name : (new \DateTime())->format('Y_m_d_H_i_s'));
    $this->handle = fopen($name, $mode);
    return $this;
  }

  public function open($name)
  {
    $this->handle = fopen($name, 'a+');
    return $this;
  }

  public function read($delimiter = ",", $enclosure = '"', $escape = '\\')
  {
    $result = [];
    while (($data = fgetcsv($this->handle, null, $delimiter, $enclosure, $escape)) !== false) {
      $result[] = $data;
    }
    return $result;
  }

  public function clear()
  {
    ftruncate($this->handle, 0);
    return $this;
  }

  public function delete()
  {
    unlink($this->handle);
  }

  public function write(array $data)
  {
    fputcsv($this->handle, $data);
  }

  public function __destruct()
  {
    @fclose($this->handle);
  }
}
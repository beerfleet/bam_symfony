<?php

namespace Calendar\Model;

use Exception;

class LeapYear {

  protected $year;

  public function isLeapYear($year = null) {
    if (!is_numeric($year) && null !== $year) {
      throw new Exception("YEAR MUST BE NUMERIC");
    }

    if (null === $year) {
      $year = date('Y');
    }

    $this->year = $year;
    return 0 == $year % 400 || (0 == $year % 4 && 0 != $year % 100);
  }

  public function getYear() {
    return $this->year;
  }

}

<?php

namespace App\Import\Enums;

use App\Enums\BaseEnum;

class XMLReaderStates extends BaseEnum {
  const STATE_BEGIN_READ = 1;
  const STATE_END_READ = 2;
  const STATE_PARSE_ELEMENT = 3;
  const STATE_BREAK_READ = 4;
  const STATE_PARSE_PAUSE = 5;
}
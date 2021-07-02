<?php

namespace App\Exports;

use App\Models\Common\Evaluation;
use App\Models\Common\Office;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class ScheduleExport implements FromCollection
{
  public function collection() {
    $schedules[] = [
      '№ Отделения',
      'Город',
      'Адрес',
      'Телефон',
      'Время работы',
      'Рабочие дни',
      'Перенесено'
    ];

    foreach (Office::query()->with('city', 'temporaryOffice')->cursor() as $office) {
      $schedule['№ Отделения'] = $office->number;
      $schedule['Город'] = $office->city->title_ru;
      $schedule['Адрес'] = "$office->street_type_ru $office->address_ru";
      $schedule['Телефон'] = $office->phone;
      $schedule['Время работы'] = "$office->time_start - $office->time_end";
      $schedule['Рабочие дни'] = $office->work_days_ru;
      if($office->isTransported()) {
        $newNumber = $office->temporaryOffice->number;
        $newAddress = $office->temporaryOffice->street_type_ru.$office->temporaryOffice->address_ru;
        if($office->temporaryOffice->full_day)
          $newSchedule = 'Круглосуточно';
        else {
          if($office->temporaryOffice->time_start)
            $newSchedule = $office->temporaryOffice->time_start.' - '.$office->temporaryOffice->time_end;
          elseif(!$office->temporaryOffice->time_start && $office->temporaryOffice->work_days_ru)
            $newSchedule = $office->temporaryOffice->work_days_ru;
          else
            $newSchedule = 'Время не укзано';
        }

        $schedule['Перенесено'] = "Перенесено в №".$newNumber.', '.$newAddress.', '.$newSchedule;
      } else {
        $schedule['Перенесено'] = '';
      }
      $schedules[] = $schedule;
    }

    return collect($schedules);
  }
}

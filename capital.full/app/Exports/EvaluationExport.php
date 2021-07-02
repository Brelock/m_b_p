<?php

namespace App\Exports;

use App\Models\Common\Evaluation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class EvaluationExport implements FromCollection
{
  public function collection() {
    $evaluations[] = [
      '№',
      'Дата создания',
      'Положительный',
      'Отрицательный',
      'Телефон',
      'Комментарий'
    ];

    foreach (Evaluation::orderBy('office_id')->with('office')->cursor() as $evaluation) {
      $comment['№'] = "Отделение {$evaluation->office->number}";
      $comment['Дата создания'] = $evaluation->created_at->format('d.m.Y H:i');
      $comment['Положительный'] = $evaluation->mark ? 1 : 0;
      $comment['Отрицательный'] = $evaluation->mark ? 0 : 1;
      $comment['Телефон'] = $evaluation->phone;
      $comment['Комментарий'] = $evaluation->comment;
      $evaluations[] = $comment;
    }

    return collect($evaluations);
  }
}

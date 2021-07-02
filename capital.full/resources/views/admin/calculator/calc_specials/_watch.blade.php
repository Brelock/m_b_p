<tr>
    <td><strong>Модель</strong></td>
    <td>{{ $request->data->clock_model or 'не указано' }}</td>
</tr>
<tr>
    <td><strong>Бренд</strong></td>
    <td>{{ $request->data->clock_brand or 'не указано' }}</td>
</tr>
<tr>
    <td><strong>Документы</strong></td>
    <td>{{ $request->data->clock_docs or 'не указано' }}</td>
</tr>
<tr>
    <td><strong>Место покупки</strong></td>
    <td>{{ $request->data->clock_place or 'не указано' }}</td>
</tr>
<tr>
    <td><strong>Состояние</strong></td>
    <td>{{ $request->data->clock_condition or 'не указано' }}</td>
</tr>
<tr>
    <td><strong>Оригинальная упаковка</strong></td>
    <td>{{ $request->data->clock_original_package or 'не указано' }}</td>
</tr>
<tr>
    <td><strong>Дата покупки</strong></td>
    {{--<td></td>--}}
    <td>{{ $request->data->clock_day. ' - '. $request->data->clock_month . ' - ' .$request->data->clock_year }}</td>
</tr>
<tr>
    <td><strong>Информация</strong></td>
    <td>{{ $request->data->additional_info or 'не указано' }}</td>
</tr>
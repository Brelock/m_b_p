<tr>
    <td><strong>Вид изделия</strong></td>
    <td>{{ $request->data->jewelry_type or 'не указано' }}</td>
</tr>
<tr>
    <td><strong>Масса, </strong></td>
    <td>{{ $request->data->jewelry_mass or 'не указано' }}</td>
</tr>
<tr>
    <td><strong>Бренд</strong></td>
    <td>{{ $request->data->jewelry_brand  or 'не указано'}}</td>
</tr>
<tr>
    <td><strong>Металл</strong></td>
    <td>{{ $request->data->jewelry_metal or 'не указано' }}</td>
</tr>
<tr>
    <td><strong>Проба</strong></td>
    <td>{{ $request->data->jewelry_probe or 'не указано' }}</td>
</tr>
<tr>
    <td><strong>Документы</strong></td>
    <td>{{ $request->data->jewelry_documents or 'не указано' }}</td>
</tr>
<tr>
    <td><strong>Характеристики вставок</strong></td>
    <td>{{ $request->data->jewelry_characteristics or 'не указано' }}</td>
</tr>
<tr>
    <td><strong>Оригинальная упаковка</strong></td>
    <td>{{ $request->data->jewelry_original_package or 'не указано' }}</td>
</tr>
<tr>
    <td><strong>Информация</strong></td>
    <td>{{ $request->data->additional_info or 'не указано' }}</td>
</tr>
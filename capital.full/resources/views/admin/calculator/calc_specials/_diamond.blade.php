<tr>
    <td><strong>Форма камня</strong></td>
    <td>{{ $request->data->diamond_form or 'не указано' }}</td>
</tr>
<tr>
    <td><strong>Масса, </strong>карат</td>
    <td>{{ $request->data->diamond_mass or 'не указано' }}</td>
</tr>
<tr>
    <td><strong>Геометрические параметры</strong></td>
    <td>{{ $request->data->diamond_geometry or 'не указано' }}</td>
</tr>
<tr>
    <td><strong>Цвет камня, </strong>GIA</td>
    <td>{{ $request->data->diamond_color_GIA or 'не указано' }}</td>
</tr>
<tr>
    <td><strong>Цвет камня, </strong>ГОСТ</td>
    <td>{{ $request->data->diamond_color_gost or 'не указано' }}</td>
</tr>
<tr>
    <td><strong>Наличие сертификата</strong></td>
    <td>{{ $request->data->diamond_certificate or 'не указано' }}</td>
</tr>
<tr>
    <td><strong>Номер сертификата</strong></td>
    <td>{{ $request->data->diamond_certificate_id or 'не указано' }}</td>
</tr>
<tr>
    <td><strong>Чистота,  </strong>GIA</td>
    <td>{{ $request->data->diamond_cleanness_GIA or 'не указано' }}</td>
</tr>
<tr>
    <td><strong>Чистота,  </strong>ГОСТ</td>
    <td>{{ $request->data->diamond_cleanness_gost or 'не указано' }}</td>
</tr>
<tr>
    <td><strong>Информация</strong></td>
    <td>{{ $request->data->diamond_additional_info or 'не указано' }}</td>
</tr>
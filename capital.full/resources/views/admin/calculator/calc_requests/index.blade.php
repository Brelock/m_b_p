@extends('admin.layouts.app')

@section('content')

    <h3>Заявки на оценку золота и серебра</h3>

    <div class="table">

        <form action="" method="" id="formRequests">
            {{ csrf_field() }}

          <input type="hidden" name="_formOrders" value="true">


          <div style="display:flex;
                        justify-content: space-between;
                        align-items: center;
                        margin-bottom: 1rem;">
                        
                @if(count($requests))

                <div class="button-group form-group" style="margin-bottom: 0">
                    <button id="destroy_all_button" type="submit" class="btn btn-danger">
                        <i aria-hidden="true" class="fa fa-trash-o">
                        </i>Удалить
                    </button>
                </div>

                @endif
               
                <div style="display:flex;
                            justify-content: flex-end;">

                    <div style="margin-right: 20px">Дата</div>

                    <div style="display: flex;text-transform: lowercase; font-weight: normal;">
                        <span class="pr-1">от:</span>
                        <input type="text" class="inputSearch datepickerFrom form-control form-control-sm mb-3 mr-sm-3 mb-sm-0"
                            name="dateStart"
                            value="@if(request()->has('dateStart')){{request()->dateStart}}@endif">

                        <span class="pr-1">до: </span>
                        <input type="text" class="inputSearch datepickerTo form-control form-control-sm mb-3 mr-sm-3 mb-sm-0"
                            name="dateEnd"
                            value="@if(request()->has('dateEnd')){{request()->dateEnd}}@endif">
                    </div>

                    <div>
                        <button type="submit" class="btnSearch btn btn-sm btn-primary"
                                style="margin-right: 8px;">Найти
                        </button>&nbsp;
                        <a class="btn btn-sm btn-outline-primary" href="{{ route('requests.index', ['_formOrders' => true]) }}">Очистить фильтры
                        </a>
                    </div>

                </div>

            </div>

            @if(count($requests))
              <div>
                <span>Количество заявок: {{ $requests->total() }}</span>
              </div>


                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="total" class="all" data-id="d1">
                        </th>
                        <th>№</th>
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>email</th>
                        <th>Город</th>


                        {{--<th>Вес</th>--}}
                        {{--<th>Проба</th>--}}
                        {{--<th>Камень</th>--}}
                        {{--<th>Тариф</th>--}}
                        {{--<th>Статус</th>--}}
                        {{--<th>Срок</th>--}}
                        {{--<th>Сумма</th>--}}
                        {{--<th>Переплата</th>--}}

                        <th>Отправлено</th>
                        <th>Состояние</th>
                        <th>Изменить состояние</th>
                        {{--<th>Изображение</th>--}}
                        <th>Просмотреть</th>
                        <th>Удалить</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($requests as $request)
                        <tr  data-element-id="{{ $request->id }}">
                            <td>
                                <input type="checkbox" name="requests[]" value="{{ $request->id }}" class="one" data-id="d1">
                            </td>
                            <td>{{ $loop->iteration+$page }}</td>
                            <td><a href="{{ route('requests.show', $request->id) }}">{{ $request->name }}</a></td>
                            <td>{{ $request->phone }}</td>
                            <td>{{ $request->email }}</td>
                            <td>{{ $request->city }}</td>

                            {{--<td>{{ $request->weight }}</td>--}}
                            {{--<td>{{ $request->hallmark }}</td>--}}
                            {{--<td>--}}
                                {{--@if($request->stone)--}}
                                    {{--Есть--}}
                                {{--@else--}}
                                    {{--Нет--}}
                                {{--@endif--}}
                            {{--</td>--}}
                            {{--<td>{{ $request->tariff }}</td>--}}
                            {{--<td>{{ $request->client_status }}</td>--}}
                            {{--<td>{{ $request->term }}</td>--}}
                            {{--<td>{{ $request->amount }}</td>--}}
                            {{--<td>{{ $request->overpayment }}</td>--}}

                            <td>
                                {{ $request->created_at->diffForHumans() }}
                            </td>
                            <td>
                                @if( $request->status == 1)
                                    <span class="badge badge-success" id="status-badge-{{ $request->id }}">Обработано</span>
                                @else
                                    <span class="badge badge-warning" id="status-badge-{{ $request->id }}">Не обработано</span>
                                @endif
                            </td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" class="status-switcher" data-change-url="/admin/calculator/requests/{{ $request->id }}"  data-change-id="{{ $request->id }}"  @if($request->status == 0) checked @endif>
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            {{--<td>--}}
                                {{--<img src="/img/wedding-ring.jpg" alt="ring" style="height: 60px; width: 60px;">--}}
                            {{--</td>--}}
                            <td><a href="{{ route('requests.show', $request->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                            <td>
                                <a href=""  class="delete" data-delete-url="/admin/calculator/requests/{{ $request->id }}" data-element-id="{{ $request->id }}">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            @else
                Не создано ни одной заявки
            @endif

        </form>



    </div>

    @if(count($requests)) {{ $requests->links() }} @endif

@endsection

@section('scripts')

  <script>
      /** Datapiker init */

      $(function() {
          $("input.datepickerFrom").datepicker();
      });
      $(function() {
          $("input.datepickerTo" ).datepicker();
      });

      /** Filtered requests */
      function filteredOrders(actionUrl) {
          $('input:checked').prop('checked', false);
          $('input[name=_token]').remove();

          $(":input").each(function() {
              if (!$(this).val()) {
                  $(this).prop('disabled', true);
              }
          });

          $('#formRequests').attr('action', actionUrl).attr("method", "get").submit();
      }

      $(".btnSearch").click(function(e){
          e.preventDefault();
          filteredOrders("{{ route('requests.index') }}");
      });

      /** Delete requests */
      function deleteRequests(actionUrl) {
          if (!confirm('Вы уверены, что хотите удалить?')) { return }
          $('#formRequests').attr('action', actionUrl).attr("method", "post").attr('id', 'destroy_all_form').submit();
      }

      $(".btn-danger").click(function(e){
          e.preventDefault();
          deleteRequests("{{ route('requests.destroyAll') }}");
      });

  </script>
@endsection
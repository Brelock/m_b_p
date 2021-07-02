<?php
/* @var \App\Models\FileUnload[] $fileUploadsXls */
?>

  @foreach($fileUploadsXls as $fileXls)
    <div class="unloading-table-section unloading-section flex">
      <div class="td"><img src="{{ $fileXls->icon_name ? $fileXls->assetAbsolute($fileXls->icon_name) : \EscapeWork\Assets\Facades\Asset::v('img/no_foto.svg') }}" alt="">
        <span>{{ $fileXls->icon_title }}</span>
      </div>
      <div class="td"><img src="{{ \EscapeWork\Assets\Facades\Asset::v("img/".$formatLabels[$fileXls->format]."-icon.svg") }}" alt=""></div>
      <div class="td">{{ $fileXls->title }}</div>
      <div class="td">{{ $fileXls->quantity }}</div>
      <div class="td">{{ $fileXls->description ?: '-' }}</div>
      <div class="td"><a href="{{ route('download.xls', ['unloadFile' => $fileXls]) }}" download>Скачать</a></div>
    </div>
  @endforeach

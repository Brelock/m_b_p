<?php
/* @var \App\Models\FileUnload[] $fileUploadsXml */
?>

  @foreach($fileUploadsXml as $fileXml)
    <div class="unloading-table-section unloading-section flex">
      <div class="td"><img src="{{ $fileXml->icon_name ? $fileXml->assetAbsolute($fileXml->icon_name) : \EscapeWork\Assets\Facades\Asset::v('img/no_foto.svg') }}" alt="">
        <span>{{ $fileXml->icon_title }}</span>
      </div>
      <div class="td"><img src="{{ \EscapeWork\Assets\Facades\Asset::v("img/".$formatLabels[$fileXml->format]."-icon.svg") }}" alt=""></div>
      <div class="td">{{ $fileXml->title }}</div>
      <div class="td">{{ $fileXml->quantity }}</div>
      <div class="td">{{ $fileXml->description }}</div>
      <div class="td"><a href="{{ $fileXml->file_url }}" download>Скачать</a></div>
    </div>
  @endforeach

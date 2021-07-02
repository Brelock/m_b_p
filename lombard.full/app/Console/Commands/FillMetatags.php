<?php

namespace App\Console\Commands;

use App\Models\Admin\News;
use App\Models\Common\Client;
use Illuminate\Console\Command;

class FillMetatags extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fill:metatags';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Заполняет все title и description по новостям и акциям, ну и клиентам';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Процесс может занять какое-то время, пойди лучше сделай кофе или чай...');

        foreach (News::cursor() as $news){

            $news->update([
                'meta_title_ru' => $news->title_ru,
                'meta_title_uk' => $news->title_uk,
                'meta_description_ru' => substr(strip_tags(html_entity_decode($news->description_ru)), 0, strrpos(substr(strip_tags(html_entity_decode($news->description_ru)), 0, 300), ' ')),
                'meta_description_uk' => substr(strip_tags(html_entity_decode($news->description_uk)), 0, strrpos(substr(strip_tags(html_entity_decode($news->description_uk)), 0, 300), ' ')),
            ]);
//            substr(strip_tags($news->description_ru), 0, strrpos(substr(strip_tags($news->description_ru), 0, 150), '.'));
        }

        $this->info('Новости есть, теперь для клиентов.');

        foreach (Client::cursor() as $client){

            $client->update([

                'meta_title_ru' => $client->title_ru,
                'meta_title_uk' => $client->title_uk,
                'meta_description_ru' => substr(strip_tags(html_entity_decode($client->description_ru)), 0, strrpos(substr(strip_tags(html_entity_decode($client->description_ru)), 0, 300), ' ')),
                'meta_description_uk' => substr(strip_tags(html_entity_decode($client->description_uk)), 0, strrpos(substr(strip_tags(html_entity_decode($client->description_uk)), 0, 300), ' ')),
            ]);
//            substr(strip_tags($news->description_ru), 0, strrpos(substr(strip_tags($news->description_ru), 0, 150), '.'));
        }

        $this->info('Готово. Вы почти в топе гугла, нужно немного подождать.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CommonRequest;
use App\Models\Admin\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    private $paginate = 15;

    public function index(Request $request)
    {
        $page = $request->has('page') ? $request->page*$this->paginate-$this->paginate : 0;

        if ($request->has('q')){
            $input = $request->input();
            $news = News::where('title_ru', 'like', "%{$request->q}%")
                ->orWhere('title_uk', 'like', "%{$request->q}%")
                ->paginate($this->paginate)
                ->appends(['q' => $input['q']]);
        } else {
            $news = News::latest()->paginate($this->paginate);
        }
        return view('admin.news.index', compact('news', 'page'));
    }

    public function create()
    {

        return view('admin.news.create');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);

        return view('admin.news.create', compact('news'));
    }

    public function store(CommonRequest $request)
    {
        $news = new News;

        $this->saveNews($request, $news);


        return redirect()->route('news.index')
            ->with(['message' => 'Новость сохранена', 'class' => 'success']);
    }

    public function update(CommonRequest $request, $id)
    {
        $news = News::find($id);

        $marked = $this->saveNews($request, $news);


        if (basename($request->url) == 'login'){
            return redirect()->route('news.index')
                ->with(['message' => 'Новость сохранена', 'class' => 'success', 'marked' => $marked->id]);
        }
        return redirect($request->url)
            ->with(['message' => 'Новость сохранена', 'class' => 'success', 'marked' => $marked->id]);
    }

    private function saveNews($request, $news)
    {
        $input = $request->except('_token', '_method', 'images', 'url', 'city_id', 'alias');
        $input['alias'] = $request->alias ? $request->alias : str_slug($request->title_ru);
        //$input['alias'] = $news->makeAlias($request);
        $input['meta_title_ru'] = $request->meta_title_ru ? $request->meta_title_ru : $request->title_ru;
        $input['meta_title_uk'] = $request->meta_title_uk ? $request->meta_title_uk : $request->title_uk;
        $input['meta_description_ru'] = $request->meta_description_ru ? $request->meta_description_ru : substr(strip_tags(html_entity_decode($request->description_ru)), 0, strrpos(substr(strip_tags(html_entity_decode($request->description_ru)), 0, 300), ' '));
        $input['meta_description_uk'] = $request->meta_description_uk ? $request->meta_description_uk : substr(strip_tags(html_entity_decode($request->description_uk)), 0, strrpos(substr(strip_tags(html_entity_decode($request->description_uk)), 0, 300), ' '));
        if ($request->has('image')) {

            $news->deleteImage($news->image, 'news');

            $input['image'] = $news->saveImage($request->image, 'news', 1200, null);
        } else {
            $input['image'] = $news->image;
        }
        if ($request->has('image_small')) {

            $news->deleteImage($news->image_small, 'news');

            $input['image_small'] = $news->saveImage($request->image_small, 'news', 378, 227);
        } else {
            $input['image_small'] = $news->image_small;
        }
        if ($request->has('date') && $request->date != '') {
            $input['date']  = date('Y-m-d', strtotime($request->date));
        }
        else
        {
            $input['date'] = date('Y-m-d');
        }
        $news->fill($input);
        $news->save();


        return $news;
    }

    public function destroyAll(Request $request)
    {
        if($request->news && count($request->news)){

            News::destroy($request->news);

            return redirect()->route('news.index')
                ->with(['message' => 'Новости удалены', 'class' => 'success']);
        } else {
            return back()->with(['message' => 'Не выбрано ни одной новости', 'class' => 'warning']);
        }
    }
    public function destroy( News $news ) {

        if ($news->delete()){
            return response()->json( [
                "class" => "success", "message" => 'Новость удалена'
            ] );
        }
    }
}

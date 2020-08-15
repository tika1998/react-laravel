<?php

namespace App\Http\Controllers;

use App\Contract\NewsInterface;
use App\Http\Requests\NewsRequest;
use App\News;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $newsInterface;

    public function __construct(NewsInterface $NewsInterface)
    {
        $this->newsInterface = $NewsInterface;
    }

    public function index()
    {
       // $news = News::paginate(2);
        $news = News::all();
        return $news;
      //return view('news.allNews', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('news.createNews');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $id = Auth::id();
        $task = News::create([
            'name' => $request->name,
            'user_id' => $id,
            'short_description' => $request->short_description,
            'news' => $request->news,
        ]);
        return redirect('/news/create')->with('message', 'Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $news = News::findorfail($id);
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findorfail($id);
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(NewsRequest $request, $id)
    {
        $news = News::findorfail($id);
        $news->update($request->all());
        return redirect('/news');
    }

    public function hello()
    {
        //$a = News::with('user')->where('user_id', 1)->get();
        //dd($a);
        $news = $this->newsInterface->getNews();
        dd($news);
        return view('news.hello', compact('a'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return view('news.createNews');
    }
}

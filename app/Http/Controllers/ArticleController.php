<?php
namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $perpage = 10;
    public function index()
    {
        $articles = Article::with('category')->ofCategory()->latest()->limit($this->perpage)->get();
        $articles->transform(function ($article, $key){
            $article->thumb = $this->getThumb($article->cover);
            return $article;
        });
        return view('article_list', compact('articles'));
    }

    public function listByCategory(Category $category)
    {
        $articles = Article::with('category')->ofCategory($category->id)->latest()->limit($this->perpage)->get();
        $articles->transform(function ($article, $key){
            $article->thumb = $this->getThumb($article->cover);
            return $article;
        });
        return view('article_list', compact('articles', 'category'));
    }

    public function show(Article $article)
    {
        $article->increment('view_count');
        $article->save();
        return view('article_detail', compact('article'));
    }

    public function search(Request $request)
    {
        $searchText = $request->input('text');
        $searchText = addslashes($searchText);
        $searchText = str_replace('%', '\%', $searchText);
        $searchText = str_replace('_', '\_', $searchText);
        $articles = Article::with('category')->where('title', 'like', "%{$searchText}%")->latest()->get();
        $articles->transform(function ($article, $key){
            $article->thumb = $this->getThumb($article->cover);
            return $article;
        });
        return view('article_list', compact('articles'));
    }

    protected function getThumb($path = '')
    {
        if (!$path) return '';
        $pathInfo = explode(".", $path);
        return $pathInfo[0].'-thumb'.'.'.$pathInfo[1];
    }

    public function getArticlesForList(Request $request)
    {
        $page = $request->input('page') < 1 ? 1 : $request->input('page');
        $offset = ($page - 1) * $this->perpage;
        $articles = Article::with('category')
            ->when($request->input('c'), function (Builder $query) use ($request){
                return $query->where('category_id', $request->input('c'));
            })->latest()
            ->offset($offset)
            ->limit($this->perpage)
            ->get();


        return response()->json([
           'error' => 0,
            'count' => $articles->count(),
            'articles' => view('article_list_ajax', compact('articles'))->render()
        ]);
    }
}

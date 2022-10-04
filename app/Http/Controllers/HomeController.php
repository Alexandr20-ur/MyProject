<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Rubric;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Case_;

class HomeController extends Controller {

    public function index(Request $request) {
        $title = 'Home page';
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('home', compact('title', 'posts'));
    }

    public function create() {
        $title = 'Create Post';
        $rubrics = Rubric::pluck('title', 'id')->all();
        return view('create', compact('title', 'rubrics'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'title' => 'required|min:5|max:100',
            'content' => 'required',
            'rubric_id' => 'integer',
        ],
         [
            'title.required' => 'Заполните поле названия',
            'title.min' => 'Минимум 5 символов в названии',
            'rubric_id.integer' => 'Выберите рубрику из списка',
        ]);


        Post::create($request->all());
        return redirect()->route('home');
    }
}

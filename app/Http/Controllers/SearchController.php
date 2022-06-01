<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author\AuthorPdf;
use App\Models\Blog\Blog;
use App\Models\Tutorial\Tutorial;
use App\Models\Story\Story;
use App\Models\Category\CategoryBlog;
use App\Models\Category\CategoryTutorial;
use App\Models\Category\CategoryStory;
use App\Models\Category\CategoryMovie;
use App\Models\Category\CategoryPdf;
use App\Models\Category\CategoryTemplate;
use App\Models\Category\CategoryPrefree;
use App\Models\Movie\Movie;
use App\Models\Pdf\Pdf;
use App\Models\Series\SeriesPdf;
use App\Models\Source\PreemiumFree;
use App\Models\Movie\Youtubemovie;
use App\Models\Tag\TagTemplate;
use App\Models\Tag\TagTutorial;
use App\Models\Template\Template;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');
        $category = array();
        $tag = array();
        $author = array();
        $series = array();

        // Blog
        $blogs = Blog::with('categoryblog','user')->where('title','LIKE', "%{$search}%")->where('status', 1)->orderBy('id','desc')->get();
        if (count($blogs) == 0) {
            $category = CategoryBlog::where('name','LIKE', "%{$search}%")->where('status', 1)->first();
            if($category) {
                $blogs = $category->blog()->where('status', 1)->orderBy('id','desc')->get();
            }
        }

        // TUTORIAL
        $tutorials = Tutorial::where('title','LIKE', "%{$search}%")->where('status', 1)->orderBy('id','desc')->get();
        if (count($tutorials) == 0) {
            $category = CategoryTutorial::where('name','LIKE', "%{$search}%")->where('status', 1)->first();
            if($category) {
                $tutorials = $category->tutorial()->where('status', 1)->orderBy('id','desc')->get();
            }else{
                $tag = TagTutorial::where('name','LIKE',"%{$search}%")->where('status', 1)->first();
                if($tag) {
                    $tutorials =  $tag->tutorial()->where('status', 1)->orderBy('id','desc')->get();
                }
            }
        }

        // STORY
        $stories = Story::where('title','LIKE', "%{$search}%")->where('status', 1)->orderBy('id','desc')->get();
        if (count($stories) == 0) {
            $category = CategoryStory::where('name','LIKE', "%{$search}%")->where('status', 1)->first();
            if($category) {
                $stories = $category->story()->where('status', 1)->orderBy('id','desc')->get();
            }
        }

        // TEMPLATE
        $templates = Template::where('title','LIKE', "%{$search}%")->where('status', 1)->orderBy('id','desc')->get();
        if (count($templates) == 0) {
            $category = CategoryTemplate::where('name','LIKE', "%{$search}%")->where('status', 1)->first();
            if($category) {
                $templates = $category->template()->where('status', 1)->orderBy('id','desc')->get();
            }else{
                $tag = TagTemplate::where('name','LIKE',"%{$search}%")->where('status', 1)->first();
                if($tag) {
                    $templates =  $tag->template()->where('status', 1)->orderBy('id','desc')->get();
                }
            }
        }

        // MOVIE
        $movies = Movie::where('name','LIKE', "%{$search}%")->where('status', 1)->orderBy('id','desc')->get();
        if (count($movies) == 0) {
            $category = CategoryMovie::where('name','LIKE', "%{$search}%")->where('status', 1)->first();
            if($category) {
                $movies = $category->movie()->where('status', 1)->orderBy('id','desc')->get();
            }
        }

        // YOUTUBE MOVIE
        $ytmovies = Youtubemovie::where('name','LIKE', "%{$search}%")->where('status', 1)->orderBy('id','desc')->get();
        if (count($ytmovies) == 0) {
            $category = CategoryMovie::where('name','LIKE', "%{$search}%")->where('status', 1)->first();
            if($category) {
                $ytmovies = $category->ytmovie()->where('status', 1)->orderBy('id','desc')->get();
            }
        }

        // SOURCES
        $sources = PreemiumFree::where('title','LIKE', "%{$search}%")->where('status', 1)->orderBy('id','desc')->get();

        // PDDF
        $pdfs = PDF::where('name','LIKE', "%{$search}%")->orWhere('title','LIKE', "%{$search}%")->where('status', 1)->orderBy('id','desc')->get();
        if (count($pdfs) == 0) {
            $category = CategoryPdf::where('name','LIKE', "%{$search}%")->where('status', 1)->first();
            if($category) {
                $pdfs = $category->pdf()->where('status', 1)->orderBy('id','desc')->get();
            }else{
                $author = AuthorPdf::where('name','LIKE',"%{$search}%")->where('status', 1)->first();
                if($author) {
                    $pdfs =  $author->pdf()->where('status', 1)->orderBy('id','desc')->get();
                }else{
                    $series = SeriesPdf::where('name','LIKE',"%{$search}%")->where('status', 1)->first();
                    if($series) {
                        $pdfs =  $series->pdf()->where('status', 1)->orderBy('id','desc')->get();
                    }
                }
            }
        }
        

        return view('search', compact('tutorials','stories','templates','movies','ytmovies','sources','pdfs','blogs','search','category','tag'));
    }

}

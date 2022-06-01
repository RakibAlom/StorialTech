<?php

namespace App\Http\Controllers;

use App\Models\Admin\Help;
use App\Models\Admin\Notice;
use App\Models\Admin\Privacy;
use App\Models\Author\AuthorPdf;
use App\Models\Blog\Blog;
use App\Models\Category\CategoryBlog;
use App\Models\Category\CategoryMovie;
use App\Models\Category\CategoryPdf;
use App\Models\Category\CategoryPrefree;
use App\Models\Category\CategoryStory;
use App\Models\Category\CategoryTemplate;
use App\Models\Category\CategoryTutorial;
use App\Models\Movie\Movie;
use App\Models\Movie\Youtubemovie;
use App\Models\Pdf\Pdf;
use App\Models\Series\SeriesPdf;
use App\Models\Story\Story;
use App\Models\Source\PreemiumFree;
use App\Models\Tag\TagTemplate;
use App\Models\Tag\TagTutorial;
use App\Models\Template\Template;
use App\Models\Tools\BacklinkList;
use App\Models\Tools\BacklinkPageDetails;
use App\Models\Tools\WebStory;
use App\Models\Tutorial\Tutorial;
use App\Models\User;
use App\Models\Youtube\Youtube;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $vpdf = Pdf::sum('views');
        $vauthorpdf = AuthorPdf::sum('views');
        $vcategorypdf = CategoryPdf::sum('views');
        $vseriespdf = SeriesPdf::sum('views');
        $pdfvisits = $vpdf + $vauthorpdf + $vcategorypdf + $vseriespdf;

        $vmovie = Movie::sum('views');
        $vymovie = Youtubemovie::sum('views');
        $vcategorymovie = CategoryMovie::sum('views');
        $movievisits = $vmovie + $vymovie + $vcategorymovie;

        $vstory = Story::sum('views');
        $vcategorystory = CategoryStory::sum('views');
        $storyvisits = $vstory + $vcategorystory;

        $vtemplate = Template::sum('views');
        $vtagtemplate = TagTemplate::sum('views');
        $vcategorytemp = CategoryTemplate::sum('views');
        $templatevisits = $vtemplate + $vtagtemplate + $vcategorytemp;

        $vtutorial = Tutorial::sum('views');
        $vtagtutorial = TagTutorial::sum('views');
        $vcategorytutorial = CategoryTutorial::sum('views');
        $tutorialvisits = $vtutorial + $vtagtutorial + $vcategorytutorial;

        $vsource = PreemiumFree::sum('views');
        $sourcecategory = CategoryPrefree::sum('views');
        $sourcevisits = $vsource + $sourcecategory;
        
        $vblog = Blog::sum('views');
        $vcategoryblog = CategoryBlog::sum('views');
        $blogvisits = $vblog + $vcategoryblog;

        $vyoutube = Youtube::sum('views');

        $vnotice = Notice::sum('views');
        $vprivacy = Privacy::sum('views');
        $vhelp = Help::sum('views');

        $backlinksviews = BacklinkPageDetails::sum('views');

        $totalvisits = $pdfvisits + $storyvisits + $templatevisits + $tutorialvisits + $blogvisits + $sourcevisits + $vyoutube + $vnotice + $vprivacy + $vhelp + $backlinksviews;

        $story = Story::where('status', 1)->get();
        $tutorial = Tutorial::where('status', 1)->get();
        $template = Template::where('status', 1)->get();
        $pdf = Pdf::where('status', 1)->get();
        $movie = Movie::where('status', 1)->get();
        $ymovie = Youtubemovie::where('status', 1)->get();
        $source = PreemiumFree::where('status', 1)->get();
        $blog = Blog::where('status', 1)->get();
        $backlinks = BacklinkList::where('status', 1)->get();
        $users = User::where('utype', 1)->get();
        $webstories = WebStory::where('status', 1)->get();
        
        
        $admins = User::where('utype', 5)->orWhere('utype', 2)->get();
        $moderators = User::where('utype', 2)->get();
        $count = 1;

        return view('admin.index', compact('users','admins','moderators','story','tutorial','template','pdf','movie','blog','ymovie','source','backlinks','totalvisits','pdfvisits','movievisits','storyvisits','templatevisits','tutorialvisits','blogvisits','sourcevisits','backlinksviews','webstories','count'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogCategory;
use App\Models\Movie\Movie;
use App\Models\Template\Template;
use App\Models\Template\TemplateCategory;
use App\Models\Tutorial\Tutorial;
use App\Models\Tutorial\TutorialCategory;
use App\Models\Pdf\Pdf;
use App\Models\Pdf\PdfCategory;
use App\Models\Pdf\PdfAuthor;
use App\Models\Source\PreemiumFree;
use App\Models\Story\Story;
use App\Models\Story\StoryCategory;
use App\Models\Tools\ToolSiteLink;
use App\Models\Tools\WebStory;

class SitemapController extends Controller
{
    // Blog Sitemap
    public function Sitemap() {
        // create new sitemap object
        $sitemap = App::make('sitemap');

        
        // Blog Sitemap
        $sitemap->add(URL::to('/blog'), '2021-04-27T06:54:36+00:00', '1.0', 'daily');
        $blogs = Blog::orderBy('id','desc')->where('status',1)->get();
        $blogcounter = 0;
        $blogSitemapCounter = 1;
        
        foreach ($blogs as $blog) {
            if ($blogcounter == 1000) {
                $sitemap->store('xml', '../blog-sitemap' . $blogSitemapCounter);
                $sitemap->addSitemap(secure_url('blog-sitemap' . $blogSitemapCounter . '.xml'));
                $sitemap->model->resetItems();
                $blogcounter = 0;
                $blogSitemapCounter++;
            }
            $blogImages = [
                ['url' => URL::to('storage/app/public/'.$blog->image), 'title' => $blog->title, 'caption' => $blog->title],
            ];

            $sitemap->add(URL::to('blog') .'/' . $blog->slug, $blog->created_at, 0.8, 'daily', $blogImages);
            $blogcounter++;
        }
    
        if (!empty($sitemap->model->getItems())) {
            $sitemap->store('xml', '../blog-sitemap' . $blogSitemapCounter);
            $sitemap->addSitemap(secure_url('blog-sitemap' . $blogSitemapCounter . '.xml'));
            $sitemap->model->resetItems();
        }
    


        // Template Sitemap
        $sitemap->add(URL::to('/template'), '2021-04-27T06:54:36+00:00', '1.0', 'daily');
        $templates = Template::orderBy('id','desc')->where('status',1)->get();
        $templatecounter = 0;
        $templateSitemapCounter = 1;
    
        foreach ($templates as $template) {
            if ($templatecounter == 1000) {
                $sitemap->store('xml', '../template-sitemap' . $templateSitemapCounter);
                $sitemap->addSitemap(secure_url('template-sitemap' . $templateSitemapCounter . '.xml'));
                $sitemap->model->resetItems();
                $templatecounter = 0;
                $templateSitemapCounter++;
            }
            $templateImages = [
                ['url' => URL::to('storage/app/public/'.$template->image), 'title' => $template->title, 'caption' => $template->title],
            ];

            $sitemap->add(URL::to('template') .'/' . $template->slug, $template->created_at, 0.6, 'daily', $templateImages);
            $templatecounter++;
        }
    
        if (!empty($sitemap->model->getItems())) {
            $sitemap->store('xml', '../template-sitemap' . $templateSitemapCounter);
            $sitemap->addSitemap(secure_url('template-sitemap' . $templateSitemapCounter . '.xml'));
            $sitemap->model->resetItems();
        }


        // Tutorial Sitemap
        $sitemap->add(URL::to('/tutorial'), '2021-04-27T06:54:36+00:00', '1.0', 'daily');
        $tutorials = Tutorial::orderBy('id','desc')->where('status',1)->get();
        $tutorialcounter = 0;
        $tutorialSitemapCounter = 1;
    
        foreach ($tutorials as $tutorial) {
            if ($tutorialcounter == 1000) {
                $sitemap->store('xml', '../tutorial-sitemap' . $tutorialSitemapCounter);
                $sitemap->addSitemap(secure_url('tutorial-sitemap' . $tutorialSitemapCounter . '.xml'));
                $sitemap->model->resetItems();
                $tutorialcounter = 0;
                $tutorialSitemapCounter++;
            }
            $tutorialImages = [
                ['url' => URL::to('storage/app/public/'.$tutorial->image), 'title' => $tutorial->title, 'caption' => $tutorial->title],
            ];

            $sitemap->add(URL::to('tutorial') .'/' . $tutorial->slug, $tutorial->created_at, 0.8, 'daily', $tutorialImages);
            $tutorialcounter++;
        }
    
        if (!empty($sitemap->model->getItems())) {
            $sitemap->store('xml', '../tutorial-sitemap' . $tutorialSitemapCounter);
            $sitemap->addSitemap(secure_url('tutorial-sitemap' . $tutorialSitemapCounter . '.xml'));
            $sitemap->model->resetItems();
        }


        // Pdf Sitemap
        $sitemap->add(URL::to('/pdf'), '2021-04-27T06:54:36+00:00', '1.0', 'daily');
        $pdfs = Pdf::orderBy('id','desc')->where('status',1)->get();
        $pdfcounter = 0;
        $pdfSitemapCounter = 1;
    
        foreach ($pdfs as $pdf) {
            if ($pdfcounter == 1000) {
                $sitemap->store('xml', '../pdf-sitemap' . $pdfSitemapCounter);
                $sitemap->addSitemap(secure_url('pdf-sitemap' . $pdfSitemapCounter . '.xml'));
                $sitemap->model->resetItems();
                $pdfcounter = 0;
                $pdfSitemapCounter++;
            }
            $pdfImages = [
                ['url' => URL::to('storage/app/public/'.$pdf->image), 'title' => $pdf->title, 'caption' => 'Book: ' . $pdf->name],
            ];

            $sitemap->add(URL::to('pdf') .'/' . $pdf->slug, $pdf->created_at, 0.8, 'daily', $pdfImages);
            $pdfcounter++;
        }
    
        if (!empty($sitemap->model->getItems())) {
            $sitemap->store('xml', '../pdf-sitemap' . $pdfSitemapCounter);
            $sitemap->addSitemap(secure_url('pdf-sitemap' . $pdfSitemapCounter . '.xml'));
            $sitemap->model->resetItems();
        }

        
        // PreFree Sitemap
        $sitemap->add(URL::to('/premium-free-source'), '2021-04-27T06:54:36+00:00', '1.0', 'daily');
        $prefrees = PreemiumFree::orderBy('id','desc')->where('status',1)->get();
        $prefreecounter = 0;
        $prefreeSitemapCounter = 1;

        foreach ($prefrees as $prefree) {
            if ($prefreecounter == 1000) {
                $sitemap->store('xml', '../prefree-sitemap' . $prefreeSitemapCounter);
                $sitemap->addSitemap(secure_url('prefree-sitemap' . $prefreeSitemapCounter . '.xml'));
                $sitemap->model->resetItems();
                $prefreecounter = 0;
                $prefreeSitemapCounter++;
            }

            $sitemap->add(URL::to('premium-free-source') .'/' . $prefree->slug, $prefree->created_at, 0.8, 'daily');
            $prefreecounter++;
        }
    
        if (!empty($sitemap->model->getItems())) {
            $sitemap->store('xml', '../prefree-sitemap' . $prefreeSitemapCounter);
            $sitemap->addSitemap(secure_url('prefree-sitemap' . $prefreeSitemapCounter . '.xml'));
            $sitemap->model->resetItems();
        }


        // Story Sitemap
        $sitemap->add(URL::to('/story'), '2021-04-27T06:54:36+00:00', '1.0', 'daily');
        $stories = Story::orderBy('id','desc')->where('status',1)->get();
        $storycounter = 0;
        $storySitemapCounter = 1;

        foreach ($stories as $story) {
            if ($storycounter == 1000) {
                $sitemap->store('xml', '../story-sitemap' . $storySitemapCounter);
                $sitemap->addSitemap(secure_url('story-sitemap' . $storySitemapCounter . '.xml'));
                $sitemap->model->resetItems();
                $storycounter = 0;
                $storySitemapCounter++;
            }

            $sitemap->add(URL::to('story') .'/' . $story->slug, $story->created_at, 0.8, 'daily');
            $storycounter++;
        }
    
        if (!empty($sitemap->model->getItems())) {
            $sitemap->store('xml', '../story-sitemap' . $storySitemapCounter);
            $sitemap->addSitemap(secure_url('story-sitemap' . $storySitemapCounter . '.xml'));
            $sitemap->model->resetItems();
        }

        // Web Stories Sitemap
        $sitemap->add(URL::to('/web-stories'), '2021-04-27T06:54:36+00:00', '1.0', 'daily');
        $webstories = WebStory::orderBy('id','desc')->where('status',1)->get();
        $webstorycounter = 0;
        $webstorySitemapCounter = 1;
        
        foreach ($webstories as $webstory) {
            if ($webstorycounter == 1000) {
                $sitemap->store('xml', '../web-story-sitemap' . $webstorySitemapCounter);
                $sitemap->addSitemap(secure_url('web-story-sitemap' . $webstorySitemapCounter . '.xml'));
                $sitemap->model->resetItems();
                $webstorycounter = 0;
                $webstorySitemapCounter++;
            }
            $webstoryImages = [
                ['url' => URL::to('storage/app/public/'.$webstory->image), 'title' => $webstory->title, 'caption' => $webstory->title],
            ];

            $sitemap->add(URL::to('web-stories') .'/' . $webstory->slug, $webstory->created_at, 0.4, 'daily', $webstoryImages);
            $webstorycounter++;
        }
    
        if (!empty($sitemap->model->getItems())) {
            $sitemap->store('xml', '../web-story-sitemap' . $blogSitemapCounter);
            $sitemap->addSitemap(secure_url('web-story-sitemap' . $blogSitemapCounter . '.xml'));
            $sitemap->model->resetItems();
        }


        $sitemap->store('sitemapindex', '../sitemap');
        return redirect('sitemap.xml');
    }


    public function sitemapList()
    {
        $blogs = Blog::where('status', 1)->latest()->get();
        $tutorials = Tutorial::where('status', 1)->latest()->get();
        $stories = Story::where('status', 1)->latest()->get();
        $pdfs = Pdf::where('status', 1)->latest()->get();
        $templates = Template::where('status', 1)->latest()->get();
        $sources = PreemiumFree::where('status', 1)->latest()->get();
        $tools = ToolSiteLink::where('status', 1)->orderBy('tool_name', 'asc')->get();
        $movies = Movie::where('status', 1)->latest()->get();

        return view ('admin.tools.sitemaplist', compact('blogs','tutorials','stories','pdfs','templates','sources','tools','movies'));
    }

}

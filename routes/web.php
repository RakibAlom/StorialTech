<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CustomCodeController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\HelpController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\PlatformController;
use App\Http\Controllers\Admin\PrivacyCotroller;
use App\Http\Controllers\Admin\ResetController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\TermsController;
use App\Http\Controllers\Admin\ToolSiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PremiumFreeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Ads\AdsController;
use App\Http\Controllers\Author\PdfAuthorController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Blog\BlogLikeController;
use App\Http\Controllers\Blog\BlogCommentController;
use App\Http\Controllers\Blog\BlogPublicController;
use App\Http\Controllers\Category\BlogCategoryController;
use App\Http\Controllers\Category\MovieCategoryController;
use App\Http\Controllers\Category\PdfCategoryController;
use App\Http\Controllers\Category\PrefreeCategoryController;
use App\Http\Controllers\Category\StoryCategoryController;
use App\Http\Controllers\Category\TemplateCategoryController;
use App\Http\Controllers\Category\TutorialCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Movie\MoviePublicController;
use App\Http\Controllers\Movie\MovieController;
use App\Http\Controllers\Movie\YoutubeMoviePublicController;
use App\Http\Controllers\Movie\YoutubeMovieController;
use App\Http\Controllers\OpenController;
use App\Http\Controllers\Other\BasicController;
use App\Http\Controllers\Pdf\PdfController;
use App\Http\Controllers\Pdf\PdfPublicController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Seo\BlogSeoController;
use App\Http\Controllers\Seo\MovieSeoController;
use App\Http\Controllers\Seo\PdfSeoController;
use App\Http\Controllers\Seo\PrefreeSeoController;
use App\Http\Controllers\Seo\StorySeoController;
use App\Http\Controllers\Seo\TemplateSeoController;
use App\Http\Controllers\Seo\TutorialSeoController;
use App\Http\Controllers\Seo\WebstorySeoController;
use App\Http\Controllers\Series\PdfSeriesController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Story\StoryCommentController;
use App\Http\Controllers\Story\StoryController;
use App\Http\Controllers\Story\StoryLikeController;
use App\Http\Controllers\Story\StoryPublicController;
use App\Http\Controllers\Tag\TemplateTagController;
use App\Http\Controllers\Tag\TutorialTagController;
use App\Http\Controllers\Template\TemplateController;
use App\Http\Controllers\Template\TemplatePublicController;
use App\Http\Controllers\Tool\Backlink\BacklinkListController;
use App\Http\Controllers\Tool\Backlink\BacklinkPageDetailsController;
use App\Http\Controllers\Tool\FeedController;
use App\Http\Controllers\Tool\WebStory\WebStoryController;
use App\Http\Controllers\Tool\WebStory\WebStoryPublicController;
use App\Http\Controllers\Tutorial\TutorialCommentController;
use App\Http\Controllers\Tutorial\TutorialController;
use App\Http\Controllers\Tutorial\TutorialLikeController;
use App\Http\Controllers\Tutorial\TutorialPublicController;
use App\Http\Controllers\Youtube\YoutubeController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// 5xx Redirect Route Are Here
Route::get('/movie/dolittle-2020-bluray-dual-audio-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/113-Himu-Ebong-Harvard-Ph.D.-Boltu-Bhai-PDF-Book-Himu-Series-Free-Download', [ResetController::class, 'redirect']);
Route::get('/pdf/9-Jhansir-Rani-Bangla-Comics-eBook', [ResetController::class, 'redirect']);
Route::get('/movie/alita-battle-angel-2019', [ResetController::class, 'redirect']);
Route::get('/pdf/15-Atongko-By-Rawshon-Jamil-eBook-Download', [ResetController::class, 'redirect']);
Route::get('/movie/john-wick-chapter-3-parabellum-2019-bluray-dual-audio-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/first-man-2018-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/the-amazing-spider-man-2-2014-bluray-dual-audio-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/84-Se-Ase-Dheere-PDF-Book-Himu-Series-Free-Download', [ResetController::class, 'redirect']);
Route::get('/movie/the-mechanic-2011-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/1-Nishongotar-Eksho-Bochhor-by-Gabrial-Garcia-Marquez-%7C-StorialTech', [ResetController::class, 'redirect']);
Route::get('/movie/category/mystery', [ResetController::class, 'redirect']);
Route::get('/pdf/6-Eshop-Er-Golpo-Guccho-Bangla-Onobad-eBook-StorialTech', [ResetController::class, 'redirect']);
Route::get('/movie/wrong-turn-2021-bluray', [ResetController::class, 'redirect']);
Route::get('/movie/moana-2016-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/premium-free-source/2', [ResetController::class, 'redirect']);
Route::get('/pdf/73-Himur-Roopalee-Ratri-PDF-Book-Himu-Series-Free-Download', [ResetController::class, 'redirect']);
Route::get('/movie/spider-man-homecoming-2017-bluray-dual-audio-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/99-Akranto-Dutabash-By-Masud-Rana-PDF-Book', [ResetController::class, 'redirect']);
Route::get('/movie/fantastic-four-2005-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/79-Night-of-The-Vampire-By-Anish-Das-Apu-PDF-Book', [ResetController::class, 'redirect']);
Route::get('/blog/%C2%A010-important-cryptocurrencies-after-that-bitcoin', [ResetController::class, 'redirect']);
Route::get('/movie/guardians-2017', [ResetController::class, 'redirect']);
Route::get('/movie/category/japanese-chinese', [ResetController::class, 'redirect']);
Route::get('/movie/pogaru-2021-hindi-dubbed-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/16-Protighat-by-Sanowarul-Haque-Rizvi-eBook-Download', [ResetController::class, 'redirect']);
Route::get('/movie/sulthan-2021-tamil-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/category/animation-movie', [ResetController::class, 'redirect']);
Route::get('/movie/jack-the-giant-slayer-2013-daul-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/39-Rupantor-&-Cokranta-Bengali-PDF-Book-Download', [ResetController::class, 'redirect']);
Route::get('/pdf/26-Danger-Girl-O-Noroker-Soytan-3-Bangla-Comics-eBook-Download', [ResetController::class, 'redirect']);
Route::get('/movie/spider-man-2-2004-bluray-dual-audio-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/enai-noki-paayum-thota-2019-dual-audio-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/14-Tipu-Sultan-Bangla-Comics-eBook-Download', [ResetController::class, 'redirect']);
Route::get('/movie/category/super-hero-movie', [ResetController::class, 'redirect']);
Route::get('/pdf/35-Bonduke-Bichar-eBook-Download-On-StorialTech-PDF', [ResetController::class, 'redirect']);
Route::get('/movie/category/thriller-movie', [ResetController::class, 'redirect']);
Route::get('/movie/spider-man-2002-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/category/horror-movie', [ResetController::class, 'redirect']);
Route::get('/movie/saina-2021-hindi-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/61-Dawnload-Bangla-Western-eBook-Masul', [ResetController::class, 'redirect']);
Route::get('/pdf/category/7-Science-Fiction-Book', [ResetController::class, 'redirect']);
Route::get('/movie/category/telegu-movie', [ResetController::class, 'redirect']);
Route::get('/movie/category/hindi-dubbed-movie', [ResetController::class, 'redirect']);
Route::get('/movie/occupation-2018-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/testing-pdf', [ResetController::class, 'redirect']);
Route::get('/movie/night-in-paradise-2020-korean-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/39-Rupantor-&-Cokranta-Bengali-PDF-Book-Download', [ResetController::class, 'redirect']);
Route::get('/movie/x-men-origins-wolverine-2009-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/padi-padi-leche-manasu-2018-hindi-dubbbed-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/the-last-airbender-2010-dual-audio-hindi-english-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/the-last-airbender-2010-dual-audio-hindi-english-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/spider-man-2-2004-bluray-dual-audio-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/war-2019-hindi-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/master-2016-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/98-Oshuvo-Chaya-Bangla-PDF-Book', [ResetController::class, 'redirect']);
Route::get('/pdf/98-Oshuvo-Chaya-Bangla-PDF-Book', [ResetController::class, 'redirect']);
Route::get('/movie/moana-2016-dual-audio-bluray', [ResetController::class, 'redirect']);
Route::get('/pdf/category/6-Horror-Book', [ResetController::class, 'redirect']);
Route::get('/movie/riddick-2013-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/great-white-2021-movie-480p-720p-download', [ResetController::class, 'redirect']);
Route::get('/pdf/21-Hangama-Bangla-PDF-Download', [ResetController::class, 'redirect']);
Route::get('/pdf/category/1-Onubad-Boi', [ResetController::class, 'redirect']);
Route::get('/pdf/17-Dussahos-Shodh-Trash-By-Golam-Mawla-Nayeem-eBook-Download', [ResetController::class, 'redirect']);
Route::get('/pdf/81-Bhautik-Golpo-Samagra-PDF-Book', [ResetController::class, 'redirect']);
Route::get('/premium-free-source/3388-premium-movie-watch-giveaway', [ResetController::class, 'redirect']);
Route::get('/pdf/77-Ekjon-Himu-Kaekti-Jhin-Jhin-Poka-PDF-Book-Himu-Series-Free-Download', [ResetController::class, 'redirect']);
Route::get('/movie/24-time-story-2016-hindi-dubbed-hdrip-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/saamy-square-2018-tamil-hindi-dubbed-480p-720p', [ResetController::class, 'redirect']);
Route::get('/template/frost-coming-soon--under-construction-bootstrap-4-template', [ResetController::class, 'redirect']);
Route::get('/movie/x-men-2000-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/aynay-kar-mukh-bangla-pdf-book-download-60b4cf71e596f', [ResetController::class, 'redirect']);
Route::get('/movie/enai-noki-paayum-thota-2019-dual-audio-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/spider-man-far-from-home-2019-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/7-Che-Gueverar-Diary-Bangla-Onobad-eBook', [ResetController::class, 'redirect']);
Route::get('/movie/shivaay-2016', [ResetController::class, 'redirect']);
Route::get('/pdf/106-Andhokarer-Bondhu-PDF-Book', [ResetController::class, 'redirect']);
Route::get('/movie/black-water-abyss-2020-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/mission-impossible-ghost-protocol-2011-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/nerkonda-paarvai-2019-hindi-dubbed-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/skylines-2020', [ResetController::class, 'redirect']);
Route::get('/pdf/23-Angulima-Bangla-Comics-Pdf-Book-By-StorialTech', [ResetController::class, 'redirect']);
Route::get('/youtube-movie/boy-hindi-dubbed', [ResetController::class, 'redirect']);
Route::get('/movie/don-2006-hindi-movie-bluray-480p-and-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/102-Akromon-89-By-Masun-Rana-Series-Bangla-PDF-Book', [ResetController::class, 'redirect']);
Route::get('/pdf/49-Poton-PDF-Book-Download-Free-on-SotrialTech', [ResetController::class, 'redirect']);
Route::get('/movie/the-amazing-spider-man-2-2014-bluray-dual-audio-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/space-sweepers-2021', [ResetController::class, 'redirect']);
Route::get('/movie/jolly-llb-2-movie', [ResetController::class, 'redirect']);
Route::get('/movie/mission-impossible-5-rogue-nation-2015-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/pirates-of-the-caribbean-dead-men-tell-no-tales-2017-bluray-dual-audio-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/35-Bonduke-Bichar-eBook-Download-On-StorialTech-PDF', [ResetController::class, 'redirect']);
Route::get('/pdf/nctb-books-of-class-5--2020--%7C-bgs-free-download-pdf-book', [ResetController::class, 'redirect']);
Route::get('/pdf/67-Rakter-Nesha-Bangla-Western-eBook-Dawnload', [ResetController::class, 'redirect']);
Route::get('/movie/kaappaan-2019-hindi-dubbed-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/mission-impossible-fallout-2018-dual-audio-imax-bluray-hevc-480p-720p', [ResetController::class, 'redirect']);
Route::get('/blog/best-laptop-for-2022-15-best-laptops-you-can-purchase', [ResetController::class, 'redirect']);
Route::get('/movie/sultha-2021-tamil-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/sketch-2018-dual-audio-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/49-Poton-PDF-Book-Download-Free-on-SotrialTech', [ResetController::class, 'redirect']);
Route::get('/pdf/114-Dipu-Number-2-eBook-free-download-.', [ResetController::class, 'redirect']);
Route::get('/pdf/72-Kartuj-Bangla-Western-eBook-Dawnload', [ResetController::class, 'redirect']);
Route::get('/pdf/93-Rat-Dostar-Train-Eshechilo-Bangla-eBook', [ResetController::class, 'redirect']);
Route::get('/pdf/93-Rat-Dostar-Train-Eshechilo-Bangla-eBook', [ResetController::class, 'redirect']);
Route::get('/pdf/1-Nishongotar-Eksho-Bochhor-by-Gabrial-Garcia-Marquez-%7C-StorialTech', [ResetController::class, 'redirect']);
Route::get('/pdf/107-Aaj-Himur-Biye-PDF-Book-Himu-Series-Free-Download', [ResetController::class, 'redirect']);
Route::get('/pdf/105-Andes-Er-Bondi-Bangla-PDF-Book', [ResetController::class, 'redirect']);
Route::get('/movie/pirates-of-the-caribbean-dead-man%E2%80%99s-chest-2006-bluray-dual-audio-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/action-2019-hindi-dubbed-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/transformers-2007-dual-audio-hindi-english-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/the-last-airbender-2010-dual-audio-hindi-english-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/69-Himur-Hate-Kaekti-Neelpadmo-PDF-Book-Himu-Series-Free-Download', [ResetController::class, 'redirect']);
Route::get('/youtube-movie/category/action-movie', [ResetController::class, 'redirect']);
Route::get('/youtube-movie/category/action-movie', [ResetController::class, 'redirect']);
Route::get('/youtube-movie/category/korean-movie', [ResetController::class, 'redirect']);
Route::get('/youtube-movie/category/hindi-dubbed-movie', [ResetController::class, 'redirect']);
Route::get('/youtube-movie/category/drama-series', [ResetController::class, 'redirect']);
Route::get('/youtube-movie/category/comedy-movie', [ResetController::class, 'redirect']);
Route::get('/movie/100-2019-hindi-dubbed-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/captain-marvel-2019', [ResetController::class, 'redirect']);
Route::get('/movie/category/fantasy-movie?page=3', [ResetController::class, 'redirect']);
Route::get('/movie/fantastic-4-rise-of-the-silver-surfer-2007-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/category/action-movie?page=7', [ResetController::class, 'redirect']);
Route::get('/latest-movie?page=7', [ResetController::class, 'redirect']);
Route::get('/latest-movie?page=8', [ResetController::class, 'redirect']);
Route::get('/template/discy-v4-5-1--social-questions-and-answers-wordpress-theme', [ResetController::class, 'redirect']);
Route::get('/pdf/31-Game-of-Thrones-1-Comics-eBook-Download', [ResetController::class, 'redirect']);
Route::get('/latest-movie?page=4', [ResetController::class, 'redirect']);
Route::get('/template/phox-hosting-wordpress---whmcs-theme', [ResetController::class, 'redirect']);
Route::get('/movie/pacific-rim-uprising-2018-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/long-walk-to-freedom-bangla-pdf', [ResetController::class, 'redirect']);
Route::get('/pdf/long-walk-to-freedom-bangla-pdf', [ResetController::class, 'redirect']);
Route::get('/pdf/the-magician', [ResetController::class, 'redirect']);
Route::get('/movie/ava-2020-bluray-movie-480p-720p', [ResetController::class, 'redirect']);
Route::get('/template/wilm', [ResetController::class, 'redirect']);
Route::get('/pdf/vutera-sob-eikhane-bhuter-golpo-pdf-', [ResetController::class, 'redirect']);
Route::get('/movie/jai-lava-kusa-2017-hindi-dubbed-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/harry-potter-and-the-philosopher', [ResetController::class, 'redirect']);
Route::get('/pdf/4-A-Tale-Of-Two-Cities-Bangla-Onobad-eBook-By-Charles-Dickens', [ResetController::class, 'redirect']);
Route::get('/movie/a-writer%E2%80%99s-odyssey-2021-chinese-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/28-Bonkonna-Bangla-Comics-eBook-Download-On-StorialTech', [ResetController::class, 'redirect']);
Route::get('/pdf/12-Asterix-o-cleopatra-Bangla-Comics-eBook-Download', [ResetController::class, 'redirect']);
Route::get('/pdf/32-Game-of-Thrones-2-Bangla-Comics-eBook-Download', [ResetController::class, 'redirect']);
Route::get('/pdf/57-Dorjar-Opashe-PDF-Book-Himu-Series-Free-Download', [ResetController::class, 'redirect']);
Route::get('/blog/in-2021-apple-ceo-tim-cook-will-earn-more-than-1-400-times-the-average-worker-at-the-company-', [ResetController::class, 'redirect']);
Route::get('/pdf/60-Dawnload-Bangla-Western-eBook-Mukhosh', [ResetController::class, 'redirect']);
Route::get('/movie/category/adventure-movie?page=2', [ResetController::class, 'redirect']);
Route::get('/pdf/94-Monalisar-Shesh-Rat-Bangla-PDF-Book', [ResetController::class, 'redirect']);
Route::get('/movie/category/romantic', [ResetController::class, 'redirect']);
Route::get('/pdf/18-Bipak-by-Masud-Anwar-Bangla-Ebook-Download', [ResetController::class, 'redirect']);
Route::get('/pdf/33-Hanan-PDF-Book-Free-Download-on-StorialTech', [ResetController::class, 'redirect']);
Route::get('/pdf/57-Dorjar-Opashe-PDF-Book-Himu-Series-Free-Download', [ResetController::class, 'redirect']);
Route::get('/movie/category/mystery', [ResetController::class, 'redirect']);
Route::get('/pdf/category/1-Onubad-Boi', [ResetController::class, 'redirect']);
Route::get('/pdf/113-Himu-Ebong-Harvard-Ph.D.-Boltu-Bhai-PDF-Book-Himu-Series-Free-Download', [ResetController::class, 'redirect']);
Route::get('/movie/alita-battle-angel-2019', [ResetController::class, 'redirect']);
Route::get('/pdf/15-Atongko-By-Rawshon-Jamil-eBook-Download', [ResetController::class, 'redirect']);
Route::get('/movie/john-wick-chapter-3-parabellum-2019-bluray-dual-audio-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/woochi-the-demon-slayer-2009-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/first-man-2018-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/the-amazing-spider-man-2-2014-bluray-dual-audio-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/84-Se-Ase-Dheere-PDF-Book-Himu-Series-Free-Download', [ResetController::class, 'redirect']);
Route::get('/movie/the-mechanic-2011-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/1-Nishongotar-Eksho-Bochhor-by-Gabrial-Garcia-Marquez-|-StorialTech', [ResetController::class, 'redirect']);
Route::get('/pdf/6-Eshop-Er-Golpo-Guccho-Bangla-Onobad-eBook-StorialTech', [ResetController::class, 'redirect']);
Route::get('/movie/moana-2016-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/premium-free-source/2', [ResetController::class, 'redirect']);
Route::get('/pdf/73-Himur-Roopalee-Ratri-PDF-Book-Himu-Series-Free-Download', [ResetController::class, 'redirect']);
Route::get('/movie/spider-man-homecoming-2017-bluray-dual-audio-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/99-Akranto-Dutabash-By-Masud-Rana-PDF-Book', [ResetController::class, 'redirect']);
Route::get('/movie/fantastic-four-2005-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/blog/ 10-important-cryptocurrencies-after-that-bitcoin', [ResetController::class, 'redirect']);
Route::get('/movie/guardians-2017', [ResetController::class, 'redirect']);
Route::get('/movie/category/japanese-chinese', [ResetController::class, 'redirect']);
Route::get('/movie/pogaru-2021-hindi-dubbed-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/16-Protighat-by-Sanowarul-Haque-Rizvi-eBook-Download', [ResetController::class, 'redirect']);
Route::get('/movie/sulthan-2021-tamil-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/category/animation-movie', [ResetController::class, 'redirect']);
Route::get('/movie/jack-the-giant-slayer-2013-daul-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/39-Rupantor-&-Cokranta-Bengali-PDF-Book-Download', [ResetController::class, 'redirect']);
Route::get('/pdf/26-Danger-Girl-O-Noroker-Soytan-3-Bangla-Comics-eBook-Download', [ResetController::class, 'redirect']);
Route::get('/movie/enai-noki-paayum-thota-2019-dual-audio-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/14-Tipu-Sultan-Bangla-Comics-eBook-Download', [ResetController::class, 'redirect']);
Route::get('/movie/category/super-hero-movie', [ResetController::class, 'redirect']);
Route::get('/pdf/35-Bonduke-Bichar-eBook-Download-On-StorialTech-PDF', [ResetController::class, 'redirect']);
Route::get('/movie/category/thriller-movie', [ResetController::class, 'redirect']);
Route::get('/movie/spider-man-2002-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/category/horror-movie', [ResetController::class, 'redirect']);
Route::get('/movie/saina-2021-hindi-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/61-Dawnload-Bangla-Western-eBook-Masul', [ResetController::class, 'redirect']);
Route::get('/movie/the-unity-of-heroes-2018-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/category/7-Science-Fiction-Book', [ResetController::class, 'redirect']);
Route::get('/movie/category/telegu-movie', [ResetController::class, 'redirect']);
Route::get('/movie/category/hindi-dubbed-movie', [ResetController::class, 'redirect']);
Route::get('/movie/occupation-2018-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/testing-pdf', [ResetController::class, 'redirect']);
Route::get('/movie/night-in-paradise-2020-korean-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/39-Rupantor-&-Cokranta-Bengali-PDF-Book-Download', [ResetController::class, 'redirect']);
Route::get('/movie/x-men-origins-wolverine-2009-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/padi-padi-leche-manasu-2018-hindi-dubbbed-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/the-last-airbender-2010-dual-audio-hindi-english-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/spider-man-2-2004-bluray-dual-audio-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/war-2019-hindi-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/master-2016-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/98-Oshuvo-Chaya-Bangla-PDF-Book', [ResetController::class, 'redirect']);
Route::get('/movie/moana-2016-dual-audio-bluray', [ResetController::class, 'redirect']);
Route::get('/pdf/category/6-Horror-Book', [ResetController::class, 'redirect']);
Route::get('/movie/riddick-2013-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/great-white-2021-movie-480p-720p-download', [ResetController::class, 'redirect']);
Route::get('/pdf/17-Dussahos-Shodh-Trash-By-Golam-Mawla-Nayeem-eBook-Download', [ResetController::class, 'redirect']);
Route::get('/pdf/81-Bhautik-Golpo-Samagra-PDF-Book', [ResetController::class, 'redirect']);
Route::get('/premium-free-source/3388-premium-movie-watch-giveaway', [ResetController::class, 'redirect']);
Route::get('/pdf/77-Ekjon-Himu-Kaekti-Jhin-Jhin-Poka-PDF-Book-Himu-Series-Free-Download', [ResetController::class, 'redirect']);
Route::get('/movie/24-time-story-2016-hindi-dubbed-hdrip-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/saamy-square-2018-tamil-hindi-dubbed-480p-720p', [ResetController::class, 'redirect']);
Route::get('/template/frost-coming-soon--under-construction-bootstrap-4-template', [ResetController::class, 'redirect']);
Route::get('/movie/x-men-2000-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/aynay-kar-mukh-bangla-pdf-book-download-60b4cf71e596f', [ResetController::class, 'redirect']);
Route::get('/movie/enai-noki-paayum-thota-2019-dual-audio-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/spider-man-far-from-home-2019-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/7-Che-Gueverar-Diary-Bangla-Onobad-eBook', [ResetController::class, 'redirect']);
Route::get('/movie/shivaay-2016', [ResetController::class, 'redirect']);
Route::get('/pdf/106-Andhokarer-Bondhu-PDF-Book', [ResetController::class, 'redirect']);
Route::get('/movie/black-water-abyss-2020-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/mission-impossible-ghost-protocol-2011-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/nerkonda-paarvai-2019-hindi-dubbed-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/skylines-2020', [ResetController::class, 'redirect']);
Route::get('/pdf/23-Angulima-Bangla-Comics-Pdf-Book-By-StorialTech', [ResetController::class, 'redirect']);
Route::get('/youtube-movie/boy-hindi-dubbed', [ResetController::class, 'redirect']);
Route::get('/movie/don-2006-hindi-movie-bluray-480p-and-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/102-Akromon-89-By-Masun-Rana-Series-Bangla-PDF-Book', [ResetController::class, 'redirect']);
Route::get('/movie/the-amazing-spider-man-2-2014-bluray-dual-audio-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/jolly-llb-2-movie', [ResetController::class, 'redirect']);
Route::get('/movie/mission-impossible-5-rogue-nation-2015-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/pirates-of-the-caribbean-dead-men-tell-no-tales-2017-bluray-dual-audio-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/35-Bonduke-Bichar-eBook-Download-On-StorialTech-PDF', [ResetController::class, 'redirect']);
Route::get('/pdf/nctb-books-of-class-5--2020--|-bgs-free-download-pdf-book', [ResetController::class, 'redirect']);
Route::get('/pdf/67-Rakter-Nesha-Bangla-Western-eBook-Dawnload', [ResetController::class, 'redirect']);
Route::get('/movie/kaappaan-2019-hindi-dubbed-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/mission-impossible-fallout-2018-dual-audio-imax-bluray-hevc-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/mission-impossible-ii-2000-dual-audio-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/blog/best-laptop-for-2022-15-best-laptops-you-can-purchase', [ResetController::class, 'redirect']);
Route::get('/movie/sultha-2021-tamil-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/sketch-2018-dual-audio-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/49-Poton-PDF-Book-Download-Free-on-SotrialTech', [ResetController::class, 'redirect']);
Route::get('/pdf/114-Dipu-Number-2-eBook-free-download-.', [ResetController::class, 'redirect']);
Route::get('/pdf/72-Kartuj-Bangla-Western-eBook-Dawnload', [ResetController::class, 'redirect']);
Route::get('/pdf/93-Rat-Dostar-Train-Eshechilo-Bangla-eBook', [ResetController::class, 'redirect']);
Route::get('/pdf/1-Nishongotar-Eksho-Bochhor-by-Gabrial-Garcia-Marquez-|-StorialTech', [ResetController::class, 'redirect']);
Route::get('/pdf/107-Aaj-Himur-Biye-PDF-Book-Himu-Series-Free-Download', [ResetController::class, 'redirect']);
Route::get('/pdf/105-Andes-Er-Bondi-Bangla-PDF-Book', [ResetController::class, 'redirect']);
Route::get('/movie/pirates-of-the-caribbean-dead-man’s-chest-2006-bluray-dual-audio-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/action-2019-hindi-dubbed-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/transformers-2007-dual-audio-hindi-english-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/movie/the-last-airbender-2010-dual-audio-hindi-english-bluray-480p-720p', [ResetController::class, 'redirect']);
Route::get('/pdf/69-Himur-Hate-Kaekti-Neelpadmo-PDF-Book-Himu-Series-Free-Download', [ResetController::class, 'redirect']);
Route::get('/youtube-movie/category/action-movie', [ResetController::class, 'redirect']);
Route::get('/youtube-movie/category/korean-movie', [ResetController::class, 'redirect']);
Route::get('/youtube-movie/category/hindi-dubbed-movie', [ResetController::class, 'redirect']);
Route::get('/youtube-movie/category/drama-series', [ResetController::class, 'redirect']);
Route::get('/youtube-movie/category/comedy-movie', [ResetController::class, 'redirect']);
Route::get('/movie/100-2019-hindi-dubbed-480p-720p', [ResetController::class, 'redirect']);



Route::get('/', [OpenController::class, 'index'])->name('site');
Route::get('/about', [OpenController::class, 'about'])->name('about');
Route::get('/contact', [OpenController::class, 'contact'])->name('contact');
Route::get('/privacy', [OpenController::class, 'privacy'])->name('privacy');
Route::get('/help', [OpenController::class, 'help'])->name('help');
Route::get('/terms-condition', [OpenController::class, 'terms'])->name('terms');
Route::get('/frequently-asked-questions', [OpenController::class, 'faq'])->name('faq');
Route::fallback(function () { return view("404"); });


// SEARCH ROUTE
Route::get('/search', [SearchController::class, 'search'])->name('search');

//CONTACT ROUTE
Route::post('/contact', [ContactController::class, 'store'])->name('store.contact');
//SUBSCRIBE ROUTE
Route::post('/subscribe', [SubscriberController::class, 'store'])->name('store.subscribe');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');


// TUTORIAL ROUTE ARE HERE
Route::get('/tutorial', [TutorialPublicController::class, 'index'])->name('tutorial');
// Route::post('/tutorial', [TutorialPublicController::class, 'loadmore'])->name('loadmore.tutorial');
Route::get('/tutorial/category/{slug}', [TutorialPublicController::class, 'categoryTutorial'])->name('category.tutorial');
Route::get('/tutorial/tag/{slug}', [TutorialPublicController::class, 'tagTutorial'])->name('tag.tutorial');
Route::get('/tutorial/{slug}', [TutorialPublicController::class, 'show'])->name('show.tutorial');
// TUTORIAL LIKE ROUTE ARE HERE
Route::get('/tutorial-like/{tutorial}', [TutorialLikeController::class, 'like'])->name('like.tutorial');
Route::get('/tutorial-unlike/{like}', [TutorialLikeController::class, 'unlike'])->name('unlike.tutorial');
// TUTORIAL COMMENT ROUTE ARE HERE
Route::post('/tutorial-comment/{tutorial}', [TutorialCommentController::class, 'comment'])->name('comment.tutorial');
Route::post('/update-tutorial-comment/{comment}', [TutorialCommentController::class, 'update'])->name('update-comment.tutorial');
Route::get('/delete-tutorial-comment/{comment}', [TutorialCommentController::class, 'delete'])->name('delete-comment.tutorial');
Route::post('/tutorial-comment-reply/{comment}', [TutorialCommentController::class, 'commentReply'])->name('reply-comment.tutorial');
Route::post('/update-tutorial-comment-reply/{comment}', [TutorialCommentController::class, 'updateReply'])->name('update-reply-comment.tutorial');
Route::get('/delete-tutorial-comment-reply/{comment}', [TutorialCommentController::class, 'deleteReply'])->name('delete-reply-comment.tutorial');


// STORY ROUTE ARE HERE
Route::get('/story', [StoryPublicController::class, 'index'])->name('story');
Route::get('/story/category/{slug}', [StoryPublicController::class, 'categorystory'])->name('category.story');
Route::get('/story/{slug}', [StoryPublicController::class, 'show'])->name('show.story');
// STORY LIKE ROUTE ARE HERE
Route::get('/story-like/{story}', [StoryLikeController::class, 'like'])->name('like.story');
Route::get('/story-unlike/{like}', [StoryLikeController::class, 'unlike'])->name('unlike.story');
// STORY COMMENT ROUTE ARE HERE
Route::post('/story-comment/{story}', [StoryCommentController::class, 'comment'])->name('comment.story');
Route::post('/update-story-comment/{comment}', [StoryCommentController::class, 'update'])->name('update-comment.story');
Route::get('/delete-story-comment/{comment}', [StoryCommentController::class, 'delete'])->name('delete-comment.story');
Route::post('/story-comment-reply/{comment}', [StoryCommentController::class, 'commentReply'])->name('reply-comment.story');
Route::post('/update-story-comment-reply/{comment}', [StoryCommentController::class, 'updateReply'])->name('update-reply-comment.story');
Route::get('/delete-story-comment-reply/{comment}', [StoryCommentController::class, 'deleteReply'])->name('delete-reply-comment.story');

// TEMPLATE ROUTE ARE HERE
Route::get('/template', [TemplatePublicController::class, 'index'])->name('template');
Route::get('/template/category/{slug}', [TemplatePublicController::class, 'categorytemplate'])->name('category.template');
Route::get('/template/tag/{slug}', [TemplatePublicController::class, 'tagtemplate'])->name('tag.template');
Route::get('/template/{slug}', [TemplatePublicController::class, 'show'])->name('show.template');

// PDF ROUTE ARE HERE
Route::get('/pdf', [PdfPublicController::class, 'index'])->name('pdf');
Route::get('/pdf/category/{slug}', [PdfPublicController::class, 'categorypdf'])->name('category.pdf');
Route::get('/pdf/atuhor/{slug}', [PdfPublicController::class, 'authorpdf'])->name('author.pdf');
Route::get('/pdf/series/{slug}', [PdfPublicController::class, 'seriespdf'])->name('series.pdf');
Route::get('/pdf/{slug}', [PdfPublicController::class, 'show'])->name('show.pdf');

// MOVIE ROUTE ARE HERE
Route::get('/movie', [MoviePublicController::class, 'index'])->name('movie');
Route::get('/latest-movie', [MoviePublicController::class, 'latest'])->name('latest.movie');
Route::get('/movie/category/{slug}', [MoviePublicController::class, 'categorymovie'])->name('category.movie');
Route::get('/movie/{slug}', [MoviePublicController::class, 'show'])->name('show.movie');

// YOUTUBE MOVIE ROUTE ARE HERE
Route::get('/youtube-movie', [YoutubeMoviePublicController::class, 'index'])->name('youtube.movie');
Route::get('/youtube-movie/category/{slug}', [YoutubeMoviePublicController::class, 'categorymovie'])->name('category.youtube.movie');
Route::get('/youtube-movie/{slug}', [YoutubeMoviePublicController::class, 'show'])->name('show.youtube.movie');

// SOURCE ROUTE ARE HERE
Route::get('/premium-free-source', [PremiumFreeController::class, 'source'])->name('source');
Route::get('/premium-free-source/category/{slug}', [PremiumFreeController::class, 'categorysource'])->name('category.source');
Route::get('/premium-free-source/{slug}', [PremiumFreeController::class, 'sourceshow'])->name('show.source');

// BLOG ROUTE ARE HERE
Route::get('/blog', [BlogPublicController::class, 'index'])->name('blog');
Route::get('/blog/category/{slug}', [BlogPublicController::class, 'categoryblog'])->name('category.blog');
Route::get('/blog/{slug}', [BlogPublicController::class, 'show'])->name('show.blog');
// BLOG LIKE ROUTE ARE HERE
Route::get('/blog-like/{blog}', [BlogLikeController::class, 'like'])->name('like.blog');
Route::get('/blog-unlike/{like}', [BlogLikeController::class, 'unlike'])->name('unlike.blog');
// BLOG COMMENT ROUTE ARE HERE
Route::post('/blog-comment/{blog}', [BlogCommentController::class, 'comment'])->name('comment.blog');
Route::post('/update-blog-comment/{comment}', [BlogCommentController::class, 'update'])->name('update-comment.blog');
Route::get('/delete-blog-comment/{comment}', [BlogCommentController::class, 'delete'])->name('delete-comment.blog');
Route::post('/blog-comment-reply/{comment}', [BlogCommentController::class, 'commentReply'])->name('reply-comment.blog');
Route::post('/update-blog-comment-reply/{comment}', [BlogCommentController::class, 'updateReply'])->name('update-reply-comment.blog');
Route::get('/delete-blog-comment-reply/{comment}', [BlogCommentController::class, 'deleteReply'])->name('delete-reply-comment.blog');


// RSS FEED ROUTE ARE HERE
Route::get('/feed', [FeedController::class, 'feed'])->name('feed');
Route::get('/feed/news', [FeedController::class, 'feedNews'])->name('feed.news');
Route::get('/feed/tutorial', [FeedController::class, 'feedTutorial'])->name('feed.tutorial');
Route::get('/feed/story', [FeedController::class, 'feedStory'])->name('feed.story');

// WEB STORY ROUTE ARE HERE
Route::get('/web-stories', [WebStoryPublicController::class, 'index'])->name('web-stories');
Route::get('/web-stories/{slug}', [WebStoryPublicController::class, 'show'])->name('show.webstory');

// BACKLINKS PUBLIC ROUTE ARE HERE
Route::get('/seo/backlinks-list', [BacklinkListController::class, 'publicIndex'])->name('backlinks.list');


// ADMIN ROUTE ARE HERE
Route::get('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin/register', [LoginController::class, 'adminRegister'])->name('admin.register');

Route::middleware(['auth','admin'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('home');

    // STORY ROUTE ARE HERE
    Route::get('/story-list', [StoryController::class, 'index'])->name('story');
    Route::get('/pending-story-list', [StoryController::class, 'pending'])->name('pending-list.story');
    Route::get('/deactive-story-list', [StoryController::class, 'deactiveList'])->name('deactive-list.story');
    Route::get('/story-trash-list', [StoryController::class, 'trash'])->name('trash.story');
    Route::get('/story/{slug}', [StoryController::class, 'show'])->name('show.story');
    Route::get('/create-story', [StoryController::class, 'create'])->name('create.story');
    Route::post('/store-story', [StoryController::class, 'store'])->name('store.story');
    Route::get('/edit-story/{story}', [StoryController::class, 'edit'])->name('edit.story');
    Route::post('/update-story/{story}', [StoryController::class, 'update'])->name('update.story');
    Route::get('/approve-story/{story}', [StoryController::class, 'approve'])->name('approve.story');
    Route::get('/active-story/{story}', [StoryController::class, 'active'])->name('active.story');
    Route::get('/deactive-story/{story}', [StoryController::class, 'deactive'])->name('deactive.story');
    Route::get('/soft-delete-story/{story}', [StoryController::class, 'softDelete'])->name('soft-delete.story');
    Route::get('/permanent-delete-story/{story}', [StoryController::class, 'permanentDelete'])->name('permanent-delete.story');

    // STORY CATEGORY ROUTE ARE HERE
    Route::get('/story-category-list', [StoryCategoryController::class, 'index'])->name('category.story');
    Route::get('/story-category-trash', [StoryCategoryController::class, 'trash'])->name('trash-category.story');
    Route::get('/create-story-category', [StoryCategoryController::class, 'create'])->name('create-category.story');
    Route::post('/story-category-store', [StoryCategoryController::class, 'store'])->name('store-category.story');
    Route::get('/story-category-edit/{category}', [StoryCategoryController::class, 'edit'])->name('edit-category.story');
    Route::post('/story-category-update/{category}', [StoryCategoryController::class, 'update'])->name('update-category.story');
    Route::get('/story-category-active/{category}', [StoryCategoryController::class, 'active'])->name('active-category.story');
    Route::get('/story-category-deactive/{category}', [StoryCategoryController::class, 'deactive'])->name('deactive-category.story');
    Route::get('/story-category-soft-delete/{category}', [StoryCategoryController::class, 'softDelete'])->name('soft-delete-category.story');
    Route::get('/story-category-permanent-delete/{category}', [StoryCategoryController::class, 'permanentDelete'])->name('permanent-delete-category.story');

    // TUTORIAL ROUTE ARE HERE
    Route::get('/tutorial-list', [TutorialController::class, 'index'])->name('tutorial');
    Route::get('/pending-tutorial-list', [TutorialController::class, 'pending'])->name('pending-list.tutorial');
    Route::get('/deactive-tutorial-list', [TutorialController::class, 'deactiveList'])->name('deactive-list.tutorial');
    Route::get('/tutorial-trash-list', [TutorialController::class, 'trash'])->name('trash.tutorial');
    Route::get('/tutorial/{slug}', [TutorialController::class, 'show'])->name('show.tutorial');
    Route::get('/create-tutorial', [TutorialController::class, 'create'])->name('create.tutorial');
    Route::post('/store-tutorial', [TutorialController::class, 'store'])->name('store.tutorial');
    Route::get('/edit-tutorial/{tutorial}', [TutorialController::class, 'edit'])->name('edit.tutorial');
    Route::post('/update-tutorial/{tutorial}', [TutorialController::class, 'update'])->name('update.tutorial');
    Route::get('/approve-tutorial/{tutorial}', [TutorialController::class, 'approve'])->name('approve.tutorial');
    Route::get('/active-tutorial/{tutorial}', [TutorialController::class, 'active'])->name('active.tutorial');
    Route::get('/deactive-tutorial/{tutorial}', [TutorialController::class, 'deactive'])->name('deactive.tutorial');
    Route::get('/soft-delete-tutorial/{tutorial}', [TutorialController::class, 'softDelete'])->name('soft-delete.tutorial');
    Route::get('/permanent-delete-tutorial/{tutorial}', [TutorialController::class, 'permanentDelete'])->name('permanent-delete.tutorial');

    // TUTORIAL CATEGORY ROUTE ARE HERE
    Route::get('/tutorial-category-list', [TutorialCategoryController::class, 'index'])->name('category.tutorial');
    Route::get('/tutorial-category-trash', [TutorialCategoryController::class, 'trash'])->name('trash-category.tutorial');
    Route::get('/create-tutorial-category', [TutorialCategoryController::class, 'create'])->name('create-category.tutorial');
    Route::post('/tutorial-category-store', [TutorialCategoryController::class, 'store'])->name('store-category.tutorial');
    Route::get('/tutorial-category-edit/{category}', [TutorialCategoryController::class, 'edit'])->name('edit-category.tutorial');
    Route::post('/tutorial-category-update/{category}', [TutorialCategoryController::class, 'update'])->name('update-category.tutorial');
    Route::get('/tutorial-category-active/{category}', [TutorialCategoryController::class, 'active'])->name('active-category.tutorial');
    Route::get('/tutorial-category-deactive/{category}', [TutorialCategoryController::class, 'deactive'])->name('deactive-category.tutorial');
    Route::get('/tutorial-category-soft-delete/{category}', [TutorialCategoryController::class, 'softDelete'])->name('soft-delete-category.tutorial');
    Route::get('/tutorial-category-permanent-delete/{category}', [TutorialCategoryController::class, 'permanentDelete'])->name('permanent-delete-category.tutorial');

    // TUTORIAL TAG ROUTE ARE HERE
    Route::get('/tutorial-tag-list', [TutorialTagController::class, 'index'])->name('tag.tutorial');
    Route::get('/tutorial-tag-trash', [TutorialTagController::class, 'trash'])->name('trash-tag.tutorial');
    Route::get('/create-tutorial-tag', [TutorialTagController::class, 'create'])->name('create-tag.tutorial');
    Route::post('/tutorial-tag-store', [TutorialTagController::class, 'store'])->name('store-tag.tutorial');
    Route::get('/tutorial-tag-edit/{tag}', [TutorialTagController::class, 'edit'])->name('edit-tag.tutorial');
    Route::post('/tutorial-tag-update/{tag}', [TutorialTagController::class, 'update'])->name('update-tag.tutorial');
    Route::get('/tutorial-tag-active/{tag}', [TutorialTagController::class, 'active'])->name('active-tag.tutorial');
    Route::get('/tutorial-tag-deactive/{tag}', [TutorialTagController::class, 'deactive'])->name('deactive-tag.tutorial');
    Route::get('/tutorial-tag-soft-delete/{tag}', [TutorialTagController::class, 'softDelete'])->name('soft-delete-tag.tutorial');
    Route::get('/tutorial-tag-permanent-delete/{tag}', [TutorialTagController::class, 'permanentDelete'])->name('permanent-delete-tag.tutorial');

    // PDF ROUTE ARE HERE
    Route::get('/pdf-list', [PdfController::class, 'index'])->name('pdf');
    Route::get('/deactive-pdf-list', [PdfController::class, 'deactiveList'])->name('deactive-list.pdf');
    Route::get('/pdf-trash-list', [PdfController::class, 'trash'])->name('trash.pdf');
    Route::get('/pdf/{slug}', [PdfController::class, 'show'])->name('show.pdf');
    Route::get('/create-pdf', [PdfController::class, 'create'])->name('create.pdf');
    Route::post('/store-pdf', [PdfController::class, 'store'])->name('store.pdf');
    Route::get('/edit-pdf/{pdf}', [PdfController::class, 'edit'])->name('edit.pdf');
    Route::post('/update-pdf/{pdf}', [PdfController::class, 'update'])->name('update.pdf');
    Route::get('/active-pdf/{pdf}', [PdfController::class, 'active'])->name('active.pdf');
    Route::get('/deactive-pdf/{pdf}', [PdfController::class, 'deactive'])->name('deactive.pdf');
    Route::get('/soft-delete-pdf/{pdf}', [PdfController::class, 'softDelete'])->name('soft-delete.pdf');
    Route::get('/permanent-delete-pdf/{pdf}', [PdfController::class, 'permanentDelete'])->name('permanent-delete.pdf');

    // PDF CATEGORY ROUTE ARE HERE
    Route::get('/pdf-category-list', [PdfCategoryController::class, 'index'])->name('category.pdf');
    Route::get('/pdf-category-trash', [PdfCategoryController::class, 'trash'])->name('trash-category.pdf');
    Route::get('/create-pdf-category', [PdfCategoryController::class, 'create'])->name('create-category.pdf');
    Route::post('/pdf-category-store', [PdfCategoryController::class, 'store'])->name('store-category.pdf');
    Route::get('/pdf-category-edit/{category}', [PdfCategoryController::class, 'edit'])->name('edit-category.pdf');
    Route::post('/pdf-category-update/{category}', [PdfCategoryController::class, 'update'])->name('update-category.pdf');
    Route::get('/pdf-category-active/{category}', [PdfCategoryController::class, 'active'])->name('active-category.pdf');
    Route::get('/pdf-category-deactive/{category}', [PdfCategoryController::class, 'deactive'])->name('deactive-category.pdf');
    Route::get('/pdf-category-soft-delete/{category}', [PdfCategoryController::class, 'softDelete'])->name('soft-delete-category.pdf');
    Route::get('/pdf-category-permanent-delete/{category}', [PdfCategoryController::class, 'permanentDelete'])->name('permanent-delete-category.pdf');

    // PDF AUTHOR ROUTE ARE HERE
    Route::get('/pdf-author-list', [PdfAuthorController::class, 'index'])->name('author.pdf');
    Route::get('/pdf-author-trash', [PdfAuthorController::class, 'trash'])->name('trash-author.pdf');
    Route::get('/create-pdf-author', [PdfAuthorController::class, 'create'])->name('create-author.pdf');
    Route::post('/pdf-author-store', [PdfAuthorController::class, 'store'])->name('store-author.pdf');
    Route::get('/pdf-author-edit/{author}', [PdfAuthorController::class, 'edit'])->name('edit-author.pdf');
    Route::post('/pdf-author-update/{author}', [PdfAuthorController::class, 'update'])->name('update-author.pdf');
    Route::get('/pdf-author-active/{author}', [PdfAuthorController::class, 'active'])->name('active-author.pdf');
    Route::get('/pdf-author-deactive/{author}', [PdfAuthorController::class, 'deactive'])->name('deactive-author.pdf');
    Route::get('/pdf-author-soft-delete/{author}', [PdfAuthorController::class, 'softDelete'])->name('soft-delete-author.pdf');
    Route::get('/pdf-author-permanent-delete/{author}', [PdfAuthorController::class, 'permanentDelete'])->name('permanent-delete-author.pdf');

    // PDF SERIES ROUTE ARE HERE
    Route::get('/pdf-series-list', [PdfSeriesController::class, 'index'])->name('series.pdf');
    Route::get('/pdf-series-trash', [PdfSeriesController::class, 'trash'])->name('trash-series.pdf');
    Route::get('/create-pdf-series', [PdfSeriesController::class, 'create'])->name('create-series.pdf');
    Route::post('/pdf-series-store', [PdfSeriesController::class, 'store'])->name('store-series.pdf');
    Route::get('/pdf-series-edit/{series}', [PdfSeriesController::class, 'edit'])->name('edit-series.pdf');
    Route::post('/pdf-series-update/{series}', [PdfSeriesController::class, 'update'])->name('update-series.pdf');
    Route::get('/pdf-series-active/{series}', [PdfSeriesController::class, 'active'])->name('active-series.pdf');
    Route::get('/pdf-series-deactive/{series}', [PdfSeriesController::class, 'deactive'])->name('deactive-series.pdf');
    Route::get('/pdf-series-soft-delete/{series}', [PdfSeriesController::class, 'softDelete'])->name('soft-delete-series.pdf');
    Route::get('/pdf-series-permanent-delete/{series}', [PdfSeriesController::class, 'permanentDelete'])->name('permanent-delete-series.pdf');

    // USER ROUTE ARE HERE
    Route::get('/user-list', [UserController::class, 'index'])->name('users');
    Route::get('/moderator-list', [UserController::class, 'moderators'])->name('moderator.users');
    Route::get('/admin-list', [UserController::class, 'admins'])->name('admin.users');
    Route::get('/block-user-list', [UserController::class, 'blocks'])->name('block.users');
    Route::get('/user-trash-bin', [UserController::class, 'trash'])->name('trash.users');
    Route::get('/user-profile/{slug}', [UserController::class, 'profile'])->name('profile.user');
    Route::get('/user-profile-edit/{slug}', [UserController::class, 'editProfile'])->name('edit.user');
    Route::post('/user-upload-image/{user}', [UserController::class, 'uploadImage'])->name('image.user');
    Route::post('/user-gerarel-info/{user}', [UserController::class, 'updateInfo'])->name('info.user');
    Route::post('/user-details/{user}', [UserController::class, 'storeDetails'])->name('store-details.user');
    Route::post('/user-update-details/{user}', [UserController::class, 'updateDetails'])->name('update-details.user');
    Route::get('/user-block/{user}', [UserController::class, 'block'])->name('block.user');
    Route::get('/user-unblock/{user}', [UserController::class, 'unblock'])->name('unblock.user');
    Route::get('/user-soft-delete/{user}', [UserController::class, 'softDelete'])->name('soft-delete.user');
    Route::get('/user-permanent-delete/{user}', [UserController::class, 'permanentDelete'])->name('permanent-delete.user');

    // TEMPLATE ROUTE ARE HERE
    Route::get('/template-list', [TemplateController::class, 'index'])->name('template');
    Route::get('/pending-template-list', [TemplateController::class, 'pending'])->name('pending-list.template');
    Route::get('/deactive-template-list', [TemplateController::class, 'deactiveList'])->name('deactive-list.template');
    Route::get('/template-trash-list', [TemplateController::class, 'trash'])->name('trash.template');
    Route::get('/template/{slug}', [TemplateController::class, 'show'])->name('show.template');
    Route::get('/create-template', [TemplateController::class, 'create'])->name('create.template');
    Route::post('/store-template', [TemplateController::class, 'store'])->name('store.template');
    Route::get('/edit-template/{template}', [TemplateController::class, 'edit'])->name('edit.template');
    Route::post('/update-template/{template}', [TemplateController::class, 'update'])->name('update.template');
    Route::get('/approve-template/{template}', [TemplateController::class, 'approve'])->name('approve.template');
    Route::get('/active-template/{template}', [TemplateController::class, 'active'])->name('active.template');
    Route::get('/deactive-template/{template}', [TemplateController::class, 'deactive'])->name('deactive.template');
    Route::get('/soft-delete-template/{template}', [TemplateController::class, 'softDelete'])->name('soft-delete.template');
    Route::get('/permanent-delete-template/{template}', [TemplateController::class, 'permanentDelete'])->name('permanent-delete.template');

    // TEMPLATE CATEGORY ROUTE ARE HERE
    Route::get('/template-category-list', [TemplateCategoryController::class, 'index'])->name('category.template');
    Route::get('/template-category-trash', [TemplateCategoryController::class, 'trash'])->name('trash-category.template');
    Route::get('/create-template-category', [TemplateCategoryController::class, 'create'])->name('create-category.template');
    Route::post('/template-category-store', [TemplateCategoryController::class, 'store'])->name('store-category.template');
    Route::get('/template-category-edit/{category}', [TemplateCategoryController::class, 'edit'])->name('edit-category.template');
    Route::post('/template-category-update/{category}', [TemplateCategoryController::class, 'update'])->name('update-category.template');
    Route::get('/template-category-active/{category}', [TemplateCategoryController::class, 'active'])->name('active-category.template');
    Route::get('/template-category-deactive/{category}', [TemplateCategoryController::class, 'deactive'])->name('deactive-category.template');
    Route::get('/template-category-soft-delete/{category}', [TemplateCategoryController::class, 'softDelete'])->name('soft-delete-category.template');
    Route::get('/template-category-permanent-delete/{category}', [TemplateCategoryController::class, 'permanentDelete'])->name('permanent-delete-category.template');

    // TEMPLATE TAG ROUTE ARE HERE
    Route::get('/template-tag-list', [TemplateTagController::class, 'index'])->name('tag.template');
    Route::get('/template-tag-trash', [TemplateTagController::class, 'trash'])->name('trash-tag.template');
    Route::get('/create-template-tag', [TemplateTagController::class, 'create'])->name('create-tag.template');
    Route::post('/template-tag-store', [TemplateTagController::class, 'store'])->name('store-tag.template');
    Route::get('/template-tag-edit/{tag}', [TemplateTagController::class, 'edit'])->name('edit-tag.template');
    Route::post('/template-tag-update/{tag}', [TemplateTagController::class, 'update'])->name('update-tag.template');
    Route::get('/template-tag-active/{tag}', [TemplateTagController::class, 'active'])->name('active-tag.template');
    Route::get('/template-tag-deactive/{tag}', [TemplateTagController::class, 'deactive'])->name('deactive-tag.template');
    Route::get('/template-tag-soft-delete/{tag}', [TemplateTagController::class, 'softDelete'])->name('soft-delete-tag.template');
    Route::get('/template-tag-permanent-delete/{tag}', [TemplateTagController::class, 'permanentDelete'])->name('permanent-delete-tag.template');

    // YOUTBE ROUTE ARE HERE
    Route::get('/youtube-list', [YoutubeController::class, 'index'])->name('youtube');
    Route::get('/youtube-trash', [YoutubeController::class, 'trash'])->name('trash.youtube');
    Route::get('/create-youtube', [YoutubeController::class, 'create'])->name('create.youtube');
    Route::post('/youtube-store', [YoutubeController::class, 'store'])->name('store.youtube');
    Route::get('/youtube/{slug}', [YoutubeController::class, 'show'])->name('show.youtube');
    Route::get('/youtube-edit/{youtube}', [YoutubeController::class, 'edit'])->name('edit.youtube');
    Route::post('/youtube-update/{youtube}', [YoutubeController::class, 'update'])->name('update.youtube');
    Route::get('/youtube-active/{youtube}', [YoutubeController::class, 'active'])->name('active.youtube');
    Route::get('/youtube-deactive/{youtube}', [YoutubeController::class, 'deactive'])->name('deactive.youtube');
    Route::get('/youtube-soft-delete/{youtube}', [YoutubeController::class, 'softDelete'])->name('soft-delete.youtube');
    Route::get('/youtube-permanent-delete/{youtube}', [YoutubeController::class, 'permanentDelete'])->name('permanent-delete.youtube');


    // YOTUBE MOVIE ROUTE ARE HERE
    Route::get('/youtube-movie-list', [YoutubeMovieController::class, 'index'])->name('movie.youtube');
    Route::get('/youtube-movie-trash', [YoutubeMovieController::class, 'trash'])->name('trash.movie.youtube');
    Route::get('/create-youtube-movie', [YoutubeMovieController::class, 'create'])->name('create.movie.youtube');
    Route::post('/youtube-movie-store', [YoutubeMovieController::class, 'store'])->name('store.movie.youtube');
    Route::get('/youtube-movie-edit/{youtube-movie}', [YoutubeMovieController::class, 'edit'])->name('edit.movie.youtube');
    Route::post('/youtube-movie-update/{youtube-movie}', [YoutubeMovieController::class, 'update'])->name('update.movie.youtube');
    Route::get('/youtube-movie-active/{youtube-movie}', [YoutubeMovieController::class, 'active'])->name('active.movie.youtube');
    Route::get('/youtube-movie-deactive/{youtube-movie}', [YoutubeMovieController::class, 'deactive'])->name('deactive.movie.youtube');
    Route::get('/youtube-movie-soft-delete/{youtube-movie}', [YoutubeMovieController::class, 'softDelete'])->name('soft-delete.movie.youtube');
    Route::get('/youtube-movie-permanent-delete/{youtube-movie}', [YoutubeMovieController::class, 'permanentDelete'])->name('permanent-delete.movie.youtube');

    // MOVIE ROUTE ARE HERE
    Route::get('/movie-list', [MovieController::class, 'index'])->name('movie');
    Route::get('/movie-deactive-list', [MovieController::class, 'deactiveList'])->name('deactive-list.movie');
    Route::get('/movie-trash', [MovieController::class, 'trash'])->name('trash.movie');
    Route::get('/movie/{slug}', [MovieController::class, 'show'])->name('show.movie');
    Route::get('/create-movie', [MovieController::class, 'create'])->name('create.movie');
    Route::post('/movie-store', [MovieController::class, 'store'])->name('store.movie');
    Route::get('/movie-edit/{movie}', [MovieController::class, 'edit'])->name('edit.movie');
    Route::post('/movie-update/{movie}', [MovieController::class, 'update'])->name('update.movie');
    Route::get('/movie-active/{movie}', [MovieController::class, 'active'])->name('active.movie');
    Route::get('/movie-deactive/{movie}', [MovieController::class, 'deactive'])->name('deactive.movie');
    Route::get('/movie-soft-delete/{movie}', [MovieController::class, 'softDelete'])->name('soft-delete.movie');
    Route::get('/movie-permanent-delete/{movie}', [MovieController::class, 'permanentDelete'])->name('permanent-delete.movie');

    // YOUTUBE MOVIE ROUTE ARE HERE
    Route::get('/youtube-movie-list', [YoutubeMovieController::class, 'index'])->name('youtube-movie');
    Route::get('/youtube-movie-deactive-list', [YoutubeMovieController::class, 'deactiveList'])->name('deactive-list.youtube-movie');
    Route::get('/youtube-movie-trash', [YoutubeMovieController::class, 'trash'])->name('trash.youtube-movie');
    Route::get('/youtube-movie/{slug}', [YoutubeMovieController::class, 'show'])->name('show.youtube-movie');
    Route::get('/create-youtube-movie', [YoutubeMovieController::class, 'create'])->name('create.youtube-movie');
    Route::post('/youtube-movie-store', [YoutubeMovieController::class, 'store'])->name('store.youtube-movie');
    Route::get('/youtube-movie-edit/{movie}', [YoutubeMovieController::class, 'edit'])->name('edit.youtube-movie');
    Route::post('/youtube-movie-update/{movie}', [YoutubeMovieController::class, 'update'])->name('update.youtube-movie');
    Route::get('/youtube-movie-active/{movie}', [YoutubeMovieController::class, 'active'])->name('active.youtube-movie');
    Route::get('/youtube-movie-deactive/{movie}', [YoutubeMovieController::class, 'deactive'])->name('deactive.youtube-movie');
    Route::get('/youtube-movie-soft-delete/{movie}', [YoutubeMovieController::class, 'softDelete'])->name('soft-delete.youtube-movie');
    Route::get('/youtube-movie-permanent-delete/{movie}', [YoutubeMovieController::class, 'permanentDelete'])->name('permanent-delete.youtube-movie');

    // MOVIE CATEGORY ROUTE ARE HERE
    Route::get('/movie-category-list', [MovieCategoryController::class, 'index'])->name('category.movie');
    Route::get('/movie-category-trash', [MovieCategoryController::class, 'trash'])->name('trash-category.movie');
    Route::get('/create-movie-category', [MovieCategoryController::class, 'create'])->name('create-category.movie');
    Route::post('/movie-category-store', [MovieCategoryController::class, 'store'])->name('store-category.movie');
    Route::get('/movie-category-edit/{category}', [MovieCategoryController::class, 'edit'])->name('edit-category.movie');
    Route::post('/movie-category-update/{category}', [MovieCategoryController::class, 'update'])->name('update-category.movie');
    Route::get('/movie-category-active/{category}', [MovieCategoryController::class, 'active'])->name('active-category.movie');
    Route::get('/movie-category-deactive/{category}', [MovieCategoryController::class, 'deactive'])->name('deactive-category.movie');
    Route::get('/movie-category-soft-delete/{category}', [MovieCategoryController::class, 'softDelete'])->name('soft-delete-category.movie');
    Route::get('/movie-category-permanent-delete/{category}', [MovieCategoryController::class, 'permanentDelete'])->name('permanent-delete-category.movie');

    // FAQ ROUTE ARE HERE
    Route::get('/faq-list', [FaqController::class, 'index'])->name('faq');
    Route::get('/deactive-faq-list', [FaqController::class, 'deactiveList'])->name('deactive-list.faq');
    Route::get('/faq-trash-list', [FaqController::class, 'trash'])->name('trash.faq');
    Route::get('/create-faq', [FaqController::class, 'create'])->name('create.faq');
    Route::post('/store-faq', [FaqController::class, 'store'])->name('store.faq');
    Route::get('/edit-faq/{faq}', [FaqController::class, 'edit'])->name('edit.faq');
    Route::post('/update-faq/{faq}', [FaqController::class, 'update'])->name('update.faq');
    Route::get('/active-faq/{faq}', [FaqController::class, 'active'])->name('active.faq');
    Route::get('/deactive-faq/{faq}', [FaqController::class, 'deactive'])->name('deactive.faq');
    Route::get('/soft-delete-faq/{faq}', [FaqController::class, 'softDelete'])->name('soft-delete.faq');
    Route::get('/permanent-delete-faq/{faq}', [FaqController::class, 'permanentDelete'])->name('permanent-delete.faq');

    // SOURCE ROUTE ARE HERE
    Route::get('/source-list', [PremiumFreeController::class, 'index'])->name('source');
    Route::get('/deactive-source-list', [PremiumFreeController::class, 'deactiveList'])->name('deactive-list.source');
    Route::get('/source-trash-list', [PremiumFreeController::class, 'trash'])->name('trash.source');
    Route::get('/source/{slug}', [PremiumFreeController::class, 'show'])->name('show.source');
    Route::get('/create-source', [PremiumFreeController::class, 'create'])->name('create.source');
    Route::post('/store-source', [PremiumFreeController::class, 'store'])->name('store.source');
    Route::get('/edit-source/{source}', [PremiumFreeController::class, 'edit'])->name('edit.source');
    Route::post('/update-source/{source}', [PremiumFreeController::class, 'update'])->name('update.source');
    Route::get('/active-source/{source}', [PremiumFreeController::class, 'active'])->name('active.source');
    Route::get('/deactive-source/{source}', [PremiumFreeController::class, 'deactive'])->name('deactive.source');
    Route::get('/soft-delete-source/{source}', [PremiumFreeController::class, 'softDelete'])->name('soft-delete.source');
    Route::get('/permanent-delete-source/{source}', [PremiumFreeController::class, 'permanentDelete'])->name('permanent-delete.source');

    // SOURCE CATEGORY ROUTE ARE HERE
    Route::get('/source-category-list', [PrefreeCategoryController::class, 'index'])->name('category.source');
    Route::get('/source-category-trash', [PrefreeCategoryController::class, 'trash'])->name('trash-category.source');
    Route::get('/create-source-category', [PrefreeCategoryController::class, 'create'])->name('create-category.source');
    Route::post('/source-category-store', [PrefreeCategoryController::class, 'store'])->name('store-category.source');
    Route::get('/source-category-edit/{category}', [PrefreeCategoryController::class, 'edit'])->name('edit-category.source');
    Route::post('/source-category-update/{category}', [PrefreeCategoryController::class, 'update'])->name('update-category.source');
    Route::get('/source-category-active/{category}', [PrefreeCategoryController::class, 'active'])->name('active-category.source');
    Route::get('/source-category-deactive/{category}', [PrefreeCategoryController::class, 'deactive'])->name('deactive-category.source');
    Route::get('/source-category-soft-delete/{category}', [PrefreeCategoryController::class, 'softDelete'])->name('soft-delete-category.source');
    Route::get('/source-category-permanent-delete/{category}', [PrefreeCategoryController::class, 'permanentDelete'])->name('permanent-delete-category.source');


    // NOTICE ROUTE ARE HERE
    Route::get('/notice', [NoticeController::class, 'index'])->name('notice');
    Route::get('/notice-trash', [NoticeController::class, 'trash'])->name('trash.notice');
    Route::get('/create-notice', [NoticeController::class, 'create'])->name('create.notice');
    Route::post('/store-notice', [NoticeController::class, 'store'])->name('store.notice');
    Route::post('/update-notice/{notice}', [NoticeController::class, 'update'])->name('update.notice');
    Route::get('/active-notice/{notice}', [NoticeController::class, 'active'])->name('active.notice');
    Route::get('/deactive-notice/{notice}', [NoticeController::class, 'deactive'])->name('deactive.notice');

    // ABOUT ROUTE ARE HERE
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::post('/store-about', [AboutController::class, 'store'])->name('store.about');
    Route::post('/update-about',[AboutController::class, 'update'])->name('update.about');

    // PRIVACY ROUTE ARE HERE
    Route::get('/privacy-policy', [PrivacyCotroller::class, 'index'])->name('privacy');
    Route::post('/store-privacy-policy', [PrivacyCotroller::class, 'store'])->name('store.privacy');
    Route::post('/update-privacy-policy',[PrivacyCotroller::class, 'update'])->name('update.privacy');

    // HELP ROUTE ARE HERE
    Route::get('/helps', [HelpController::class, 'index'])->name('helps');
    Route::post('/store-helps', [HelpController::class, 'store'])->name('store.helps');
    Route::post('/update-helps',[HelpController::class, 'update'])->name('update.helps');

    // TERMS & CONDITION ROUTE ARE HERE
    Route::get('/terms-condition', [TermsController::class, 'index'])->name('terms');
    Route::post('/store-terms-condition', [TermsController::class, 'store'])->name('store.terms');
    Route::post('/update-terms-condition',[TermsController::class, 'update'])->name('update.terms');

    // SUBSCRIBER ROUTE ARE HERE
    Route::get('/subscriber', [SubscriberController::class, 'index'])->name('subscriber');
    Route::get('/subscriber-trash', [SubscriberController::class, 'trash'])->name('trash.subscriber');
    Route::get('/active-subscriber/{email}',[SubscriberController::class, 'active'])->name('active.subscriber');
    Route::get('/deactive-subscriber/{email}',[SubscriberController::class, 'deactive'])->name('deactive.subscriber');
    Route::get('/soft-delete-subscriber/{subscirber}', [SubscriberController::class, 'softDelete'])->name('soft-delete.subscriber');
    Route::get('/permanent-delete-subscriber/{subscirber}', [SubscriberController::class, 'permanentDelete'])->name('permanent-delete.subscriber');

    // SETTING ROUTE ARE HERE
    Route::get('/setting', [SettingController::class, 'index'])->name('setting');
    Route::post('/store-setting', [SettingController::class, 'store'])->name('store.setting');
    Route::post('/update-setting',[SettingController::class, 'update'])->name('update.setting');
    
    // CACHE, CONFIG, OPTIMIZE
    Route::get('/route-cache', [ResetController::class, 'routeCache']);
    Route::get('/view-cache', [ResetController::class, 'viewCache']);
    Route::get('/event-cache', [ResetController::class, 'eventCache']);
    Route::get('/config-cache', [ResetController::class, 'configCache']);
    Route::get('/clear-cache', [ResetController::class, 'clearCache']);
    Route::get('/clear-view', [ResetController::class, 'clearView']);
    Route::get('/clear-event', [ResetController::class, 'clearEvent']);
    Route::get('/clear-route', [ResetController::class, 'clearRoute']);
    Route::get('/clear-optimize', [ResetController::class, 'clearOptimize']);
    Route::get('/storage-link', [ResetController::class, 'storageLink']);

    // UPDATED ROUTE ARE HERE //
    // BLOG CATEGORY ROUTE ARE HERE
    Route::get('/blog-category-list', [BlogCategoryController::class, 'index'])->name('category.blog');
    Route::get('/blog-category-trash', [BlogCategoryController::class, 'trash'])->name('trash-category.blog');
    Route::get('/create-blog-category', [BlogCategoryController::class, 'create'])->name('create-category.blog');
    Route::post('/blog-category-store', [BlogCategoryController::class, 'store'])->name('store-category.blog');
    Route::get('/blog-category-edit/{category}', [BlogCategoryController::class, 'edit'])->name('edit-category.blog');
    Route::post('/blog-category-update/{category}', [BlogCategoryController::class, 'update'])->name('update-category.blog');
    Route::get('/blog-category-active/{category}', [BlogCategoryController::class, 'active'])->name('active-category.blog');
    Route::get('/blog-category-deactive/{category}', [BlogCategoryController::class, 'deactive'])->name('deactive-category.blog');
    Route::get('/blog-category-soft-delete/{category}', [BlogCategoryController::class, 'softDelete'])->name('soft-delete-category.blog');
    Route::get('/blog-category-permanent-delete/{category}', [BlogCategoryController::class, 'permanentDelete'])->name('permanent-delete-category.blog');

    // BLOG ROUTE ARE HERE
    Route::get('/blog-list', [BlogController::class, 'index'])->name('blog');
    Route::get('/pending-blog-list', [BlogController::class, 'pending'])->name('pending-list.blog');
    Route::get('/deactive-blog-list', [BlogController::class, 'deactiveList'])->name('deactive-list.blog');
    Route::get('/blog-trash-list', [BlogController::class, 'trash'])->name('trash.blog');
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('show.blog');
    Route::get('/create-blog', [BlogController::class, 'create'])->name('create.blog');
    Route::post('/store-blog', [BlogController::class, 'store'])->name('store.blog');
    Route::get('/edit-blog/{blog}', [BlogController::class, 'edit'])->name('edit.blog');
    Route::post('/update-blog/{blog}', [BlogController::class, 'update'])->name('update.blog');
    Route::get('/approve-blog/{blog}', [BlogController::class, 'approve'])->name('approve.blog');
    Route::get('/active-blog/{blog}', [BlogController::class, 'active'])->name('active.blog');
    Route::get('/deactive-blog/{blog}', [BlogController::class, 'deactive'])->name('deactive.blog');
    Route::get('/soft-delete-blog/{blog}', [BlogController::class, 'softDelete'])->name('soft-delete.blog');
    Route::get('/permanent-delete-blog/{blog}', [BlogController::class, 'permanentDelete'])->name('permanent-delete.blog');

    // WEB STORY ROUTE ARE HERE
    Route::get('/web-stories-list', [WebStoryController::class, 'index'])->name('web-stories');
    Route::get('/web-stories-grid-list', [WebStoryController::class, 'indexGrid'])->name('web-stories.grid');
    Route::get('/pending-web-stories-list', [WebStoryController::class, 'pending'])->name('pending-list.web-stories');
    Route::get('/deactive-web-stories-list', [WebStoryController::class, 'deactiveList'])->name('deactive-list.web-stories');
    Route::get('/web-stories-trash-list', [WebStoryController::class, 'trash'])->name('trash.web-stories');
    Route::get('/web-story/{slug}', [WebStoryController::class, 'show'])->name('show.web-story');
    Route::get('/create-web-story', [WebStoryController::class, 'create'])->name('create.web-story');
    Route::post('/store-web-story', [WebStoryController::class, 'store'])->name('store.web-story');
    Route::get('/edit-web-story/{webstory}', [WebStoryController::class, 'edit'])->name('edit.web-story');
    Route::post('/update-web-story/{webstory}', [WebStoryController::class, 'update'])->name('update.web-story');
    Route::get('/approve-web-story/{webstory}', [WebStoryController::class, 'approve'])->name('approve.web-story');
    Route::get('/active-web-story/{webstory}', [WebStoryController::class, 'active'])->name('active.web-story');
    Route::get('/deactive-web-story/{webstory}', [WebStoryController::class, 'deactive'])->name('deactive.web-story');
    Route::get('/soft-delete-web-story/{webstory}', [WebStoryController::class, 'softDelete'])->name('soft-delete.web-story');
    Route::get('/permanent-delete-web-story/{webstory}', [WebStoryController::class, 'permanentDelete'])->name('permanent-delete.web-story');

    // SEO ROUTE ARE HERE
    // BLOG SEO
    Route::get('/seo-blog', [BlogSeoController::class, 'index'])->name('seo.blog');
    Route::post('/seo-blog-store', [BlogSeoController::class, 'store'])->name('seo.blog.store');
    Route::post('/seo-blog-update', [BlogSeoController::class, 'update'])->name('seo.blog.update');

    // TUTORIAL SEO
    Route::get('/seo-tutorial', [TutorialSeoController::class, 'index'])->name('seo.tutorial');
    Route::post('/seo-tutorial-store', [TutorialSeoController::class, 'store'])->name('seo.tutorial.store');
    Route::post('/seo-tutorial-update', [TutorialSeoController::class, 'update'])->name('seo.tutorial.update');

    // TEMPLATE SEO
    Route::get('/seo-template', [TemplateSeoController::class, 'index'])->name('seo.template');
    Route::post('/seo-template-store', [TemplateSeoController::class, 'store'])->name('seo.template.store');
    Route::post('/seo-template-update', [TemplateSeoController::class, 'update'])->name('seo.template.update');

    // PDF SEO
    Route::get('/seo-pdf', [PdfSeoController::class, 'index'])->name('seo.pdf');
    Route::post('/seo-pdf-store', [PdfSeoController::class, 'store'])->name('seo.pdf.store');
    Route::post('/seo-pdf-update', [PdfSeoController::class, 'update'])->name('seo.pdf.update');

    // STORY SEO
    Route::get('/seo-story', [StorySeoController::class, 'index'])->name('seo.story');
    Route::post('/seo-story-store', [StorySeoController::class, 'store'])->name('seo.story.store');
    Route::post('/seo-story-update', [StorySeoController::class, 'update'])->name('seo.story.update');

    // PREMIUM FREE SEO
    Route::get('/seo-premium-source-free', [PrefreeSeoController::class, 'index'])->name('seo.source');
    Route::post('/seo-premium-source-free', [PrefreeSeoController::class, 'store'])->name('seo.source.store');
    Route::post('/seo-premium-source-free', [PrefreeSeoController::class, 'update'])->name('seo.source.update');

    // MOVIE SEO
    Route::get('/seo-movie', [MovieSeoController::class, 'index'])->name('seo.movie');
    Route::post('/seo-movie-store', [MovieSeoController::class, 'store'])->name('seo.movie.store');
    Route::post('/seo-movie-update', [MovieSeoController::class, 'update'])->name('seo.movie.update');

    // WEB STORY SEO
    Route::get('/seo-web-story', [WebstorySeoController::class, 'index'])->name('seo.web-story');
    Route::post('/seo-web-story-store', [WebstorySeoController::class, 'store'])->name('seo.web-story.store');
    Route::post('/seo-web-story-update', [WebstorySeoController::class, 'update'])->name('seo.web-story.update');

    // CUSTOM CODE
    Route::get('/custom-code', [CustomCodeController::class, 'index'])->name('custom.code');
    Route::post('/custom-code-store', [CustomCodeController::class, 'store'])->name('custom.code.store');
    Route::post('/custom-code-update', [CustomCodeController::class, 'update'])->name('custom.code.update');

    // ADS PROGRAM 
    Route::get('/ads-program', [AdsController::class, 'index'])->name('ads');
    Route::post('/ads-store', [AdsController::class, 'store'])->name('ads.store');
    Route::post('/ads-update', [AdsController::class, 'update'])->name('ads.update');

    // CONTROL ROUTE ARE HERE
    Route::get('/platform-control', [PlatformController::class, 'index'])->name('control.platform');
    Route::post('/platform-control-store', [PlatformController::class, 'store'])->name('control.platform.store');
    Route::post('/platform-control-update', [PlatformController::class, 'update'])->name('control.platform.update');

    // MORE TOOL SITE ROUTE ARE HERE
    Route::get('/more-tools-site', [ToolSiteController::class, 'index'])->name('tools.site');
    Route::post('/new-tool-site-store', [ToolSiteController::class, 'store'])->name('tools.store');
    Route::get('/delete-tool-site/{tool}', [ToolSiteController::class, 'delete'])->name('tools.delete');

    // BACKLINKS PAGE ROUTE ARE HERE
    Route::get('/backlinks-page-details', [BacklinkPageDetailsController::class, 'index'])->name('backlinks.page');
    Route::post('/backlinks-page-details-store', [BacklinkPageDetailsController::class, 'store'])->name('backlinks.page.store');
    Route::post('/backlinks-page-details-update', [BacklinkPageDetailsController::class, 'update'])->name('backlinks.page.update');

    // BACKLINKS ROUTE ARE HERE
    Route::get('/backlinks', [BacklinkListController::class, 'index'])->name('backlinks');
    Route::get('/backlinks-trash', [BacklinkListController::class, 'trash'])->name('trash-backlinks');
    Route::get('/create-backlinks', [BacklinkListController::class, 'create'])->name('create-backlinks');
    Route::post('/store-backlinks', [BacklinkListController::class, 'store'])->name('store-backlinks');
    Route::get('/edit-backlinks/{backlinks}', [BacklinkListController::class, 'edit'])->name('edit-backlinks');
    Route::post('/backlinks-update/{backlinks}', [BacklinkListController::class, 'update'])->name('update-backlinks');
    Route::get('/backlinks-active/{backlinks}', [BacklinkListController::class, 'active'])->name('active-backlinks');
    Route::get('/backlinks-deactive/{backlinks}', [BacklinkListController::class, 'deactive'])->name('deactive-backlinks');
    Route::get('/backlinks-soft-delete/{backlinks}', [BacklinkListController::class, 'softDelete'])->name('soft-delete-backlinks');
    Route::get('/backlinks-permanent-delete/{backlinks}', [BacklinkListController::class, 'permanentDelete'])->name('permanent-delete-backlinks');


    
    // SITEMAP LIST
    Route::get('/sitemap/list', [SitemapController::class, 'sitemapList'])->name('sitemap.list');

});

Route::middleware(['auth','moderator'])->prefix('moderator')->name('moderator.')->group(function() {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('home');

    // STORY ROUTE ARE HERE
    Route::get('/story-list', [StoryController::class, 'mindex'])->name('story');
    Route::get('/pending-story-list', [StoryController::class, 'pending'])->name('pending-list.story');
    Route::get('/deactive-story-list', [StoryController::class, 'mdeactiveList'])->name('deactive-list.story');
    Route::get('/story/{slug}', [StoryController::class, 'show'])->name('show.story');
    Route::get('/create-story', [StoryController::class, 'create'])->name('create.story');
    Route::post('/store-story', [StoryController::class, 'store'])->name('store.story');
    Route::get('/edit-story/{mstory}', [StoryController::class, 'medit'])->name('edit.story');
    Route::post('/update-story/{mstory}', [StoryController::class, 'mupdate'])->name('update.story');
    Route::get('/approve-story/{mstory}', [StoryController::class, 'mapprove'])->name('approve.story');
    Route::get('/active-story/{mstory}', [StoryController::class, 'mactive'])->name('active.story');
    Route::get('/deactive-story/{mstory}', [StoryController::class, 'mdeactive'])->name('deactive.story');
    Route::get('/soft-delete-story/{mstory}', [StoryController::class, 'msoftDelete'])->name('soft-delete.story');

    // TUTORIAL ROUTE ARE HERE
    Route::get('/tutorial-list', [TutorialController::class, 'mindex'])->name('tutorial');
    Route::get('/pending-tutorial-list', [TutorialController::class, 'pending'])->name('pending-list.tutorial');
    Route::get('/deactive-tutorial-list', [TutorialController::class, 'mdeactiveList'])->name('deactive-list.tutorial');
    Route::get('/tutorial/{slug}', [TutorialController::class, 'show'])->name('show.tutorial');
    Route::get('/create-tutorial', [TutorialController::class, 'create'])->name('create.tutorial');
    Route::post('/store-tutorial', [TutorialController::class, 'store'])->name('store.tutorial');
    Route::get('/edit-tutorial/{mtutorial}', [TutorialController::class, 'medit'])->name('edit.tutorial');
    Route::post('/update-tutorial/{mtutorial}', [TutorialController::class, 'mupdate'])->name('update.tutorial');
    Route::get('/approve-tutorial/{mtutorial}', [TutorialController::class, 'mapprove'])->name('approve.tutorial');
    Route::get('/active-tutorial/{mtutorial}', [TutorialController::class, 'mactive'])->name('active.tutorial');
    Route::get('/deactive-tutorial/{mtutorial}', [TutorialController::class, 'mdeactive'])->name('deactive.tutorial');
    Route::get('/soft-delete-tutorial/{mtutorial}', [TutorialController::class, 'msoftDelete'])->name('soft-delete.tutorial');

    // PDF ROUTE ARE HERE
    Route::get('/pdf-list', [PdfController::class, 'mindex'])->name('pdf');
    Route::get('/deactive-pdf-list', [PdfController::class, 'mdeactiveList'])->name('deactive-list.pdf');
    Route::get('/pdf/{slug}', [PdfController::class, 'show'])->name('show.pdf');
    Route::get('/create-pdf', [PdfController::class, 'create'])->name('create.pdf');
    Route::post('/store-pdf', [PdfController::class, 'store'])->name('store.pdf');
    Route::get('/edit-pdf/{mpdf}', [PdfController::class, 'medit'])->name('edit.pdf');
    Route::post('/update-pdf/{mpdf}', [PdfController::class, 'mupdate'])->name('update.pdf');
    Route::get('/active-pdf/{mpdf}', [PdfController::class, 'mactive'])->name('active.pdf');
    Route::get('/deactive-pdf/{mpdf}', [PdfController::class, 'mdeactive'])->name('deactive.pdf');
    Route::get('/soft-delete-pdf/{mpdf}', [PdfController::class, 'msoftDelete'])->name('soft-delete.pdf');


    // TEMPLATE ROUTE ARE HERE
    Route::get('/template-list', [TemplateController::class, 'mindex'])->name('template');
    Route::get('/pending-template-list', [TemplateController::class, 'pending'])->name('pending-list.template');
    Route::get('/deactive-template-list', [TemplateController::class, 'mdeactiveList'])->name('deactive-list.template');
    Route::get('/template/{slug}', [TemplateController::class, 'show'])->name('show.template');
    Route::get('/create-template', [TemplateController::class, 'create'])->name('create.template');
    Route::post('/store-template', [TemplateController::class, 'store'])->name('store.template');
    Route::get('/edit-template/{mtemplate}', [TemplateController::class, 'medit'])->name('edit.template');
    Route::post('/update-template/{mtemplate}', [TemplateController::class, 'mupdate'])->name('update.template');
    Route::get('/approve-template/{mtemplate}', [TemplateController::class, 'mapprove'])->name('approve.template');
    Route::get('/active-template/{mtemplate}', [TemplateController::class, 'mactive'])->name('active.template');
    Route::get('/deactive-template/{mtemplate}', [TemplateController::class, 'mdeactive'])->name('deactive.template');
    Route::get('/soft-delete-template/{mtemplate}', [TemplateController::class, 'msoftDelete'])->name('soft-delete.template');


    // SOURCE ROUTE ARE HERE
    Route::get('/source-list', [PremiumFreeController::class, 'mindex'])->name('source');
    Route::get('/deactive-source-list', [PremiumFreeController::class, 'mdeactiveList'])->name('deactive-list.source');
    Route::get('/source/{slug}', [PremiumFreeController::class, 'show'])->name('show.source');
    Route::get('/create-source', [PremiumFreeController::class, 'create'])->name('create.source');
    Route::post('/store-source', [PremiumFreeController::class, 'store'])->name('store.source');
    Route::get('/edit-source/{msource}', [PremiumFreeController::class, 'medit'])->name('edit.source');
    Route::post('/update-source/{msource}', [PremiumFreeController::class, 'mupdate'])->name('update.source');
    Route::get('/active-source/{msource}', [PremiumFreeController::class, 'mactive'])->name('active.source');
    Route::get('/deactive-source/{msource}', [PremiumFreeController::class, 'mdeactive'])->name('deactive.source');
    Route::get('/soft-delete-source/{msource}', [PremiumFreeController::class, 'msoftDelete'])->name('soft-delete.source');
    
    // USER ROUTE ARE HERE
    Route::get('/user-profile/{slug}', [UserController::class, 'profile'])->name('profile.user');
    Route::get('/user-profile-edit/{slug}', [UserController::class, 'editProfile'])->name('edit.user');
    Route::post('/user-upload-image/{muser}', [UserController::class, 'muploadImage'])->name('image.user');
    Route::post('/user-gerarel-info/{muser}', [UserController::class, 'mupdateInfo'])->name('info.user');
    Route::post('/user-details/{muser}', [UserController::class, 'mstoreDetails'])->name('store-details.user');
    Route::post('/user-update-details/{muser}', [UserController::class, 'mupdateDetails'])->name('update-details.user');


    // UPDATED ROUTE ARE HERE //

    // BLOG ROUTE ARE HERE
    Route::get('/blog-list', [BlogController::class, 'mindex'])->name('blog');
    Route::get('/pending-blog-list', [BlogController::class, 'pending'])->name('pending-list.blog');
    Route::get('/deactive-blog-list', [BlogController::class, 'mdeactiveList'])->name('deactive-list.blog');
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('show.blog');
    Route::get('/create-blog', [BlogController::class, 'create'])->name('create.blog');
    Route::post('/store-blog', [BlogController::class, 'store'])->name('store.blog');
    Route::get('/edit-blog/{mblog}', [BlogController::class, 'medit'])->name('edit.blog');
    Route::post('/update-blog/{mblog}', [BlogController::class, 'mupdate'])->name('update.blog');
    Route::get('/approve-blog/{mblog}', [BlogController::class, 'mapprove'])->name('approve.blog');
    Route::get('/active-blog/{mblog}', [BlogController::class, 'mactive'])->name('active.blog');
    Route::get('/deactive-blog/{mblog}', [BlogController::class, 'mdeactive'])->name('deactive.blog');
    Route::get('/soft-delete-blog/{mblog}', [BlogController::class, 'msoftDelete'])->name('soft-delete.blog');

    // WEB STORY ROUTE ARE HERE
    Route::get('/web-stories-list', [WebStoryController::class, 'mindex'])->name('web-stories');
    Route::get('/deactive-web-stories-list', [WebStoryController::class, 'mdeactiveList'])->name('deactive-list.web-stories');
    Route::get('/web-story/{slug}', [WebStoryController::class, 'show'])->name('show.web-story');
    Route::get('/create-web-story', [WebStoryController::class, 'create'])->name('create.web-story');
    Route::post('/store-web-story', [WebStoryController::class, 'store'])->name('store.web-story');
    Route::get('/edit-web-story/{mwebstory}', [WebStoryController::class, 'medit'])->name('edit.web-story');
    Route::post('/update-web-story/{mwebstory}', [WebStoryController::class, 'mupdate'])->name('update.web-story');
    Route::get('/approve-web-story/{mwebstory}', [WebStoryController::class, 'mapprove'])->name('approve.web-story');
    Route::get('/active-web-story/{webstory}', [WebStoryController::class, 'mactive'])->name('active.web-story');
    Route::get('/deactive-web-story/{mwebstory}', [WebStoryController::class, 'mdeactive'])->name('deactive.web-story');
    Route::get('/soft-delete-web-story/{mwebstory}', [WebStoryController::class, 'msoftDelete'])->name('soft-delete.web-story');

});


// BASIC ROUTE ARE HERE
Route::get('name-slug', [BasicController::class, 'getName'])->name('name.slug');
Route::get('title-slug', [BasicController::class, 'getTitle'])->name('title.slug');
Route::get('get/tutorial-category/{id}', [BasicController::class, 'getTutorialCategory']);
Route::get('get/template-category/{id}', [BasicController::class, 'getTemplateCategory']);

// SITEMAP GENERATOR ROUTE ARE HERE
Route::get('sitemap', [SitemapController::class, 'Sitemap'])->name('sitemap');




@php
    $seoblog = App\Models\Seo\SeoBlog::first();
    $seotutorial = App\Models\Seo\SeoTutorial::first();
    $seostory = App\Models\Seo\SeoStory::first();
    $replace = array('<p>','</p>','<br>','</br>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<h5>','</h5>','<em>','</em>','<strong>','</strong>','<span>','</span>');
@endphp

<rss xmlns:media="http://search.yahoo.com/mrss/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:content="http://purl.org/rss/1.0/modules/content/" version="2.0">

    <channel>
        <atom:link href="{{ URL::current() }}" rel="self" type="application/rss+xml"/>

    @if (URL::current() == route('feed.news'))

        <title>{{ $seoblog->title }}</title>
        <description>{{ $seoblog->description }}</description>
        <image>
            <url>{{ asset('storage/app/public/' . $seoblog->cover_image) }}</url>
            <title>{{ $seoblog->title }}</title>
            <link>
                <![CDATA[ {{ route('blog') }} ]]>
            </link>
        </image>
        <link>
            <![CDATA[ {{ route('blog') }} ]]>
        </link>

        @foreach ($news as $item)
            <item>
                <title>{{ $item->title }}</title>
                <link>{{ $item->path() }}</link>
                <guid isPermaLink="false">{{ uniqid() }}</guid>
                <pubDate>{{ $item->created_at->toRssString() }}</pubDate>
                <description>{{ Str::limit(str_replace($replace, ' ', $item->body), 120) }}</description>
                <media:thumbnail url="{{ asset('storage/app/public/' . $item->image) }}"/>
                <media:content height="614" width="1092" medium="image" url="{{ asset('storage/app/public/' . $item->image) }}"/>
                <dc:creator>{{ $item->user->fullname }}</dc:creator>
            </item>

        @endforeach
        
    @elseif (URL::current() == route('feed.tutorial'))

        <title>{{ $seotutorial->title }}</title>
        <description>{{ $seotutorial->description }}</description>
        <image>
            <url>{{ asset('storage/app/public/' . $seotutorial->cover_image) }}</url>
            <title>{{ $seotutorial->title }}</title>
            <link>
                <![CDATA[ {{ route('tutorial') }} ]]>
            </link>
        </image>
        <link>
            <![CDATA[ {{ route('tutorial') }} ]]>
        </link>

        @foreach ($tutorials as $item)
            <item>
                <title>{{ $item->title }}</title>
                <link>{{ $item->path() }}</link>
                <guid isPermaLink="false">{{ uniqid() }}</guid>
                <pubDate>{{ $item->created_at->toRssString() }}</pubDate>
                <description>{{ Str::limit(str_replace($replace, ' ', $item->body), 120) }}</description>
                <media:thumbnail url="{{ asset('storage/app/public/' . $item->image) }}"/>
                <media:content height="614" width="1092" medium="image" url="{{ asset('storage/app/public/' . $item->image) }}"/>
                <dc:creator>{{ $item->user->fullname }}</dc:creator>
            </item>

        @endforeach

    @elseif (URL::current() == route('feed.story'))

        <title>{{ $seostory->title }}</title>
        <description>{{ $seostory->description }}</description>
        <image>
            <url>{{ asset('storage/app/public/' . $seostory->cover_image) }}</url>
            <title>{{ $seostory->title }}</title>
            <link>
                <![CDATA[ {{ route('story') }} ]]>
            </link>
        </image>
        <link>
            <![CDATA[ {{ route('story') }} ]]>
        </link>

        @foreach ($stories as $item)
            <item>
                <title>{{ $item->title }}</title>
                <link>{{ $item->path() }}</link>
                <guid isPermaLink="false">{{ uniqid() }}</guid>
                <pubDate>{{ $item->created_at->toRssString() }}</pubDate>
                <description>{{ Str::limit(str_replace($replace, ' ', $item->body), 120) }}</description>
            @if($item->image)
                <media:thumbnail url="{{ asset('storage/app/public/' . $item->image) }}"/>
                <media:content height="614" width="1092" medium="image" url="{{ asset('storage/app/public/' . $item->image) }}"/>
            @endif
                <dc:creator>{{ $item->user->fullname }}</dc:creator>
            </item>

        @endforeach

    @endif
    
    </channel>
</rss>
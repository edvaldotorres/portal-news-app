<?=
'<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL ?>
<rss version="2.0">
    <channel>
        <title><![CDATA[ Portal News App ]]></title>
        <link><![CDATA[ https://your-website.com/feed ]]></link>
        <description><![CDATA[ Portal News App ]]></description>
        <language>en</language>
        <pubDate>{{ now() }}</pubDate>
        @foreach ($news as $n)
            <item>
                <title><![CDATA[{{ $n->title }}]]></title>
                <link>{{ $n->lead }}</link>
                <pubDate>Atualizado em {{ date_format($n->updated_at, 'd/m/y') }} às
                    {{ date_format($n->updated_at, 'H:i') }}
                </pubDate>
                <description><![CDATA[{!! $n->content !!}]]></description>
                <author><![CDATA[{{ $n->user->name }}]]></author>
            </item>
        @endforeach
    </channel>
</rss>

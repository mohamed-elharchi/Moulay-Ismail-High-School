<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">

</head>
<body>
<div class="d">
    <div class="website-d">
        <h1>Moulay Ismail</h1>
        <div class="breaking-news-section">
            <span id="btext">NEWS Lycée</span>
            <marquee direction="left" onmouseover="this.stop()" onmouseout="this.start()">
                @foreach($newsList as $news)
                    <a href="{{ route('news.show', $news->id) }}" class="breaking-news">
                        <p class="bntime">{{ \Carbon\Carbon::parse($news->created_at)->format('d M Y') }}</p>
                        {{ $news->title }}
                    </a>
                @endforeach
            </marquee>
        </div>
    </div>
</div>

</body>
</html>

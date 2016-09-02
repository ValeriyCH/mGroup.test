<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php $current = key($comments); ?>
        @foreach($comments as $key => $comment)
            <li data-target="#myCarousel" data-slide-to="{{$key}}" class="{{ $current == $key ? ' active' : ''}}">{{$key}}</li>
        @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        @foreach($comments as $key => $comment)
            <div class="item{{ $current == $key ? ' active' : ''}}">
                <img src="{{$comment['img']}}" alt="">
                <div class="comment">
                    {{$comment['comment']}}
                </div>
                <div>
                    <span>{{$comment['user']}},</span>
                    <span>{{$comment['company']}}</span>
                </div>
            </div>
        @endforeach
    </div>

    {{--<!-- Left and right controls -->--}}
    {{--<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">--}}
    {{--<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>--}}
    {{--<span class="sr-only">Previous</span>--}}
    {{--</a>--}}
    {{--<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">--}}
    {{--<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>--}}
    {{--<span class="sr-only">Next</span>--}}
    {{--</a>--}}
</div>
<style>
    #listing-news-list ul{
        list-style: none;
        padding-left: 0;
    }
    #listing-news-list ul li {
        list-style: none;
    }
    #listing-news-list ul li {
        padding-left:0px;
    }
    #listing-news-list ul li img{
        width: 100rem;
    }
</style>
@if ($workplace->status =="payed")
<div id="listing-news-list" class="listing-section">
    <h3 class="listing-desc-headline margin-top-50 margin-bottom-30">Haberler</h3>
    <ul>
        @foreach ($workplace->workplaceNews as $news)
        <li>
            <div class="list-box-listing">
                <div class="list-box-listing-img"><a href="#"><img src="{{$news->image}}" alt=""></a></div>
                <div class="list-box-listing-content">
                    <div class="inner">
                        <h3><a >{{$news->title}}</a></h3>
                        <p>{{$news->content}}</p>

                    </div>
                </div>
            </div>
            <hr>

        </li>
        @endforeach
    </ul>

</div>
@endif

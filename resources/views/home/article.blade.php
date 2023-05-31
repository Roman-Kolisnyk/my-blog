<div class="home-articles">
    @forelse($articles as $article)
        <div class="window">
            <div class="titlebar">
                <div class="buttons">
                    <div class="close">
                        @can('delete', $article)
                            <form action="{{route('article.destroy', $article->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="remove-btn">
                                    <a class="closebutton" href="#">
                                        <span><strong>x</strong></span>
                                    </a>
                                </button>
                            </form>
                        @else
                            <a class="closebutton" href="#"></a>
                        @endcan
                    </div>
                    <div class="minimize">
                        <a class="minimizebutton" href="
                        @can('update', $article)
                            {{route('article.edit', $article->id)}}"><span><strong>&ndash;</strong></span></a>
                        @else
                            #">
                        @endcan
                    </div>
                    <div class="zoom">
                        <a class="zoombutton" href="
                        @can('create', \App\Models\Article::class)
                            {{route('article.create')}}"><span><strong>+</strong></span></a>
                        @else
                            #">
                        @endcan
                    </div>
                </div>
                <a class="article-title" href="{{route('article.show', $article->id)}}"><h6>{{$article->title}} ({{$article->category->name}})</h6></a>
                <!-- window title -->
            </div>
            <a href="{{route('article.show', $article->id)}}">
                <div class="image">
                    <img class="article-img" src="{{asset('storage/images/article_images/' . $article->image)}}">
                </div>
            </a>
            <div class="article-content">
                {{$article->content}}
                <!-- window content -->
                @if ($article->tags->pluck('name')->toArray())
                    <div class="tags">
                        <span><b>Tags: </b>{{implode(', ', $article->tags->pluck('name')->toArray())}}</span>
                    </div>
                @endif
            </div>
        </div>
    @empty
        <div class="no-articles">
            <h1>So far it's empty, but we will be back to you soon with news</h1>
        </div>
    @endforelse
</div>
@include('home.pagination')

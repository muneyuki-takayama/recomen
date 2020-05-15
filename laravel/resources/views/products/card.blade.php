<div class="" style="width: 200px; height: 200px; padding: 40px;">
        
        <div>
            <a href="{{ route('users.show', ['name' => $product->user->name]) }}">
            @if(!$product->user->profile_photo) 
                <i class="fas fa-user-circle fa-3x"></i>
            @endif    
            <img src="{{ $product->user->profile_photo}}" alt="">
            </a> 
        </div>
        <div>
            <a href="{{ route('products.show', ['product' => $product]) }}">
                <img src="{{ $product->pic1}}" alt="">
            </a>
        </div>
        <div>
            <a href="{{ route('users.show', ['name' => $product->user->name]) }}">
                {{ $product->user->name }}
            </a>  
        </div>
        <div>
            {{ $product->created_at->format('Y/n/j H:i') }}
        </div>

        <!-- 自分の投稿した記事のみ表示される -->
        @if(Auth::id() === $product->user_id)
        <div>
            <a href="{{ route('products.edit', ['product'=> $product]) }}">
            Edit
            </a>
        </div>
        <div>
            <!-- ここはモーダルで表示すること -->
            <form method="POST" action="{{ route('products.destroy', ['product' => $product]) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
            </form>
            
        </div>
        @endif
        <!-- 自分の投稿した記事のみ表示される -->

        <div>
        <a href="{{ route('products.show', ['product' => $product]) }}">
            {{ $product->title }}
        </a>
            <div>
                <product-like
                :initial-is-liked-by='@json($product->isLikedBy(Auth::user()))'
                :initial-count-likes='@json($product->count_likes)'
                :authorized='@json(Auth::check())'
                endpoint="{{ route('products.like', ['product' => $product]) }}"
                >
                </product-like>
            </div>
            <div class="tag-container">
                @foreach ($product->tags as $tag)
                    @if($loop->first)
                    <div>
                        <div>
                    @endif
                        <a href="{{ route('tags.show', ['name' => $tag->name]) }}">
                                {{ $tag->hashtag}}
                            </a>
                    @if($loop->last)
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
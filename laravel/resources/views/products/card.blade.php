<div class="" style="width: 200px; height: 200px; padding: 30px">
        
        <div>
            {{ $product->user->name }}
        </div>
        <div>
            {{ $product->created_at->format('Y/n/j H:i') }}
        </div>

        <!-- ログインしているユーザーのみ表示される -->
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
        <!-- ログインしているユーザーのみ表示される -->

        <div>
        <a href="{{ route('products.show', ['product' => $product]) }}">
            {{ $product->title }}
        </a>
            <div>
                <product-like
                :initial-is-liked-by='@json($product->isLikedBy(Auth::user()))'
                :initial-count-likes='@json($product->count_likes)'
                :authorized='@json(Auth::user())'
                endpoint="{{ route('products.like', ['product' => $product]) }}"
                >
                </product-like>
            </div>
        </div>
    </div>
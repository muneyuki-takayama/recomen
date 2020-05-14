<div class="">
    <div class="">
        <div class="main">
            <img-view
            select-pic-first="pic1"
            img-data-first="{{ $product->pic1 }}"
            >
            </img-view>
            <span>Image_1</span>
            <span>＊選択必須です。</span>
            
        </div>
        <div class="sub">
            <img-view
            select-pic-second="pic2"
            img-data-second="{{ $product->pic2 }}"
            >
            </img-view>
            <span>Image_2</span>
        </div>
        <div class="sub">
            <img-view
            select-pic-third="pic3"
            img-data-third="{{ $product->pic3 }}"
            >
            </img-view>
            <span>Image_3</span>
        </div>

        ＊最大容量5MB
    </div>
    
    <div>
        <product-tags-input
        :initial-tags = '@json($tagNames ?? [])'
        :autocomplete-items='@json($allTagNames ?? [])'
        >
        </product-tags-input>
    </div>
    
</div>
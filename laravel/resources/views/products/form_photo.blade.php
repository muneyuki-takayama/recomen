<div class="">
    <div class="">
        <div class="main">
            <img-view
            select-pic-first="pic1"
            >
            </img-view>
            <span>Image_1</span>
            <span>＊選択必須です。</span>
            
        </div>
        <div class="sub">
            <img-view
            select-pic-second="pic2"
            >
            </img-view>
            <input type="file" name="pic2">
            <span>Image_2</span>
        </div>
        <div class="sub">
            <img-view
            select-pic-third="pic3"
            >
            </img-view>
            <input type="file" name="pic3">
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
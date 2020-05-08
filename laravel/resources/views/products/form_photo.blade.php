<div class="">
    <div class="">
        <div class="main">
            <input type="file" name="pic1">
            <span>Image_1</span>
            <span>＊選択必須です。</span>
            
        </div>
        <div class="sub">
            <input type="file" name="pic2">
            <span>Image_2</span>
        </div>
        <div class="sub">
            <input type="file" name="pic3">
            <span>Image_3</span>
        </div>
    </div>
    
    <div>
        <product-tags-input
        :initial-tags = '@json($tagNames ?? [])'
        :autocomplete-items='@json($allTagNames ?? [])'
        >
        </product-tags-input>
    </div>
    
</div>
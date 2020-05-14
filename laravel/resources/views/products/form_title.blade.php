<div class="">
    <div>
        <label>Title</label>
        <input type="text" name="title" class="" required value="{{ $product->title ?? old('title') }}">
    </div>
    <div class="">
        <label>Comment</label>
        <textarea name="body" class="" rows="16" placeholder="Write your comment">{{ $product->body ?? old('body') }}</textarea>
    </div>
</div>
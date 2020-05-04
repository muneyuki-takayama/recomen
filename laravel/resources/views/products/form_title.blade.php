<div class="">
    <div>
        <label>Title</label>
        <input type="text" name="title" class="" required value="{{ old('title') }}">
    </div>
    <div class="">
        <label>Comment</label>
        <textarea name="body" class="" rows="16" placeholder="Write your comment">{{ old('comment') }}</textarea>
    </div>
</div>
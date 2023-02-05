@extends('base')

@section('title')
Posts
@endsection

@section('content')
<h5 style="display: inline;margin-right: 10px;">All Posts</h5>
<a href="javascript:;" class="hd_btn_primary_lined hd_add_new_post">Add new</a>
<div class="hd_mang_posts_table_wrap">

</div>

<div class="hd_add_post_modal">
    <div class="hd_add_post_modal_overlay"></div>
    <div class="hd_add_post_modal_content_wrap">
        <div class="close_hd_modal">&times;</div>
        <div class="hd_add_post_modal_content">
            <h4>Add new post</h4>

            <div class="hd_form">
                <input type="text" name="title" id="title" class="hd_field" placeholder="Post title">
                <textarea name="description" id="description" cols="30" rows="10" class="hd_field" placeholder="Write something..."></textarea>
                <button type="submit" class="hd_btn_primary">Publish</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).on('click', '.hd_add_new_post', function() {
        $('.hd_add_post_modal').show();
        $('.hd_add_post_modal_overlay').fadeIn(200, function() {
            setTimeout(function() {
                $('.hd_add_post_modal_content_wrap').slideDown(200)
            }, 200);
        });
    });
    $(document).on('click', '.close_hd_modal', function() {
        $('.hd_add_post_modal_content_wrap').slideUp(200, function() {
            setTimeout(function() {
                $('.hd_add_post_modal_overlay').fadeOut(200, function() {
                    $('.hd_add_post_modal').hide();
                });
            }, 200);
        })
    });
</script>

@endsection
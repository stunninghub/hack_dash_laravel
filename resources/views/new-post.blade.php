@extends('adminbase')

@section('title')
Post
@endsection

@section('content')
<div class="hd_post_edit_field">
    <form action="" id="hd_post_new_post_form">
        <div class="hd_post_edit_inner_wrap">
            <div class="post_edit_right_sidebar">
                <div class="hd_post_edit_sidebar_block">
                    <div class="block_title">General</div>
                    <div class="block_content">
                        <button type="submit" class="hd_btn_primary publish_post">Publish</button>
                    </div>
                </div>
            </div>
            <div class="post_edit_left_content">
                <div class="hd_field_wrap title_wrap">
                    <input type="text" name="title" id="title" class="hd_input" placeholder="Post title.." required>
                </div>
                <div class="hd_field_wrap description_wrap">
                    <textarea name="description" id="description" class="hd_post_editro_field hd_input" cols="30" rows="10" placeholder="Description here..."></textarea>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).on('submit', '#hd_post_new_post_form', function(e) {
        e.preventDefault();
        console.log("Clicked");
        let this_form = $(this);
        let form_data = new FormData(this_form.get(0));
        $.ajax({
            url: '/add_post',
            type: 'POST',
            data: form_data,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                this_form.find('button[type=submit]').text('Publishing...');
            },
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        }).done((res) => {
            console.log(res);
            res = JSON.parse(res);
            if (res['status'] == 200) {
                window.location.href = "/post/edit/" + res['id'];
            }
        }).fail((err)=>{
            console.log(err);
        });
    });
</script>
@endsection
@extends('adminbase')

@section('title')
Edit post
@endsection

@section('content')
<div class="hd_post_edit_field">
    <div class="hd_notice_wrap"></div>
    <form action="" id="hd_post_edit_post_form">
        <input type="hidden" name="post_id" value="{{ $id }}">
        <div class="hd_post_edit_inner_wrap">
            <div class="post_edit_right_sidebar">
                <div class="hd_post_edit_sidebar_block">
                    <div class="block_title">General</div>
                    <div class="block_content">
                        <p>Created at : {{ $post_created_date }}</p>
                        <p>Updated at : {{ $post_updated_date }}</p>
                        <button type="submit" class="hd_btn_primary update_post">Update</button>
                    </div>
                </div>
            </div>
            <div class="post_edit_left_content">
                <div class="hd_field_wrap title_wrap">
                    <input type="text" name="title" id="title" class="hd_input" placeholder="Post title.." value="{{ $post_title }}" required>
                </div>
                <div class="hd_field_wrap description_wrap">
                    <textarea name="description" id="description" class="hd_input" cols="30" rows="10" placeholder="Description here...">{{ $post_content }}</textarea>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).on('submit', '#hd_post_edit_post_form', function(e) {
        e.preventDefault();
        console.log("Clicked");
        let this_form = $(this);
        let form_data = new FormData(this_form.get(0));
        $.ajax({
            url: '/update_post',
            type: 'POST',
            data: form_data,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                this_form.find('button[type=submit]').text('Updating...');
            },
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        }).done((res) => {
            console.log(res);
            res = JSON.parse(res);
            if (res['status'] == 200) {
                this_form.find('button[type=submit]').text('Updated');
                hd_notice('Post Updated Successfully.', 'positive');
            } else {
                this_form.find('button[type=submit]').text('Retry update');
                hd_notice('Update unsuccessful..', 'warning');
            }
        }).fail((err) => {
            console.log(err);
            this_form.find('button[type=submit]').text('Retry update');
            hd_notice('Failed to update, Something wrong.', 'danger');
        });
    });
</script>
@endsection
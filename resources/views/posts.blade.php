@extends('adminbase')

@section('title')
Posts
@endsection

@section('content')
<h5 style="display: inline;margin-right: 10px;">All Posts</h5>
<a href="javascript:;" class="hd_btn_primary_lined hd_add_new_post">Add new</a>
<div class="hd_mang_posts_table_wrap">
    <div class="hd_posts_table_inner">
        <table class="hd_posts_table">
            <thead class="hd_table_head">
                <tr class="hd_tr">
                    <th class="hd_th">ID</th>
                    <th class="hd_th">Title</th>
                    <th class="hd_th">Created at</th>
                    <th class="hd_th">Updated at</th>
                </tr>
            </thead>

            <tbody class="hd_table_body">
                @foreach($posts as $post)
                <tr class="hd_tr">
                    <td class="hd_td">{{ $post->id }}</td>
                    <td class="hd_td">{{ $post->title }}</td>
                    <td class="hd_td">{{ $post->created_at }}</td>
                    <td class="hd_td">{{ $post->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="hd_add_post_modal">
    <div class="hd_add_post_modal_overlay"></div>
    <div class="hd_add_post_modal_content_wrap">
        <div class="close_hd_modal">&times;</div>
        <div class="hd_add_post_modal_content">
            <h4>Add new post</h4>

            <div class="hd_form">
                <form action="" method="POST" id="hd_add_new_post_form">
                    @csrf
                    <input type="text" name="title" id="title" class="hd_field" placeholder="Post title" required>
                    <textarea name="description" id="description" cols="30" rows="10" class="hd_field" placeholder="Write something..."></textarea>
                    <button type="submit" class="hd_btn_primary">Publish</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    jQuery('#hd_add_new_post_form input, #hd_add_new_post_form textarea').on('keyup', function() {
        jQuery('#hd_add_new_post_form button[type=submit]').text('Publish');
    });
    $(document).on('submit', '#hd_add_new_post_form', function(e) {
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
            }
        }).done((res) => {
            res = JSON.parse(res);
            if (res['status'] == 200) {
                var posts = "";
                var all_posts = res['posts'];
                all_posts.forEach(post => {
                    posts += `
                    <tr class="hd_tr">
                        <td class="hd_td">${post['id']}</td>
                        <td class="hd_td">${post['title']}</td>
                        <td class="hd_td">${post['created_at']}</td>
                        <td class="hd_td">${post['updated_at']}</td>
                    </tr>
                    `;
                });
                this_form.find('button[type=submit]').text('Published');
                this_form.get(0).reset();
                $('.hd_posts_table .hd_table_body').html(posts);
                setTimeout(function() {
                    $('.close_hd_modal').trigger('click');
                }, 600);
            } else {
                console.log(res);
            }
            console.log(res);
        }).fail((err) => {
            console.log(err);
        })
    });

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
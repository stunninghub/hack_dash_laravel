@extends('adminbase')

@section('title')
API
@endsection
@section('content')

<div class="hd_dashboard_wrap">
    <div class="hd_dash_settings_wrap">
        @include('settings-sidebar')
        <div class="hd_dash_settings_content">
            <div class="hd_dash_settings_content_title">
                <h5>API</h5>
            </div>
            <div class="hd_dash_settings_content_wrap">
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Necessitatibus, atque. Magnam maiores tenetur accusamus ex. Quod quo labore neque distinctio incidunt dolorum a, id sint autem tempore rem, officia facere.
                </p>
                <div class="hd_input_wrap">
                    <label for="hack_dash_api">Token:</label>
                    <input type="text" name="hack_dash_api" value="{{ $current_api_token }}" class="hd_input" id="hack_dash_api">
                </div>
                <br>
                <div class="hd_input_wrap">
                    <input type="button" value="Generate new token" class="hd_btn_primary_lined" id="create_new_api_token">
                </div>
            </div>
        </div>
        <script>
            $(document).on('click', '#create_new_api_token', function(e) {
                e.preventDefault();
                let this_btn = $(this);
                $.ajax({
                    url: '/generate_api',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function() {
                        this_btn.css({
                            opacity: 0.6,
                            pointerEvents: 'none'
                        }).val('Generating token...');
                    }
                }).done((res) => {
                    res = JSON.parse(res);
                    if (res['status'] == 200) {
                        console.log(res['message']);
                        if(res['token']){
                            $('#hack_dash_api').val(res['token']);
                        }
                    } else {
                        console.log(res);
                    }
                    this_btn.css({
                        opacity: 1,
                        pointerEvents: 'all'
                    }).val('Generate new token');
                }).fail((err) => {
                    console.log(err);
                    this_btn.css({
                        opacity: 1,
                        pointerEvents: 'all'
                    }).val('Generate new token');
                })
            });
        </script>
    </div>
</div>
@endsection
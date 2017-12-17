<div id="message">
    @foreach($list as $value)
        <span><label>{{$value->created_at}}</label></span>
        <span><label>{{$value->user->name}}：</label></span>
        <span><input type="text" class="form-control round-form" value="{{$value->content}}" readonly></span>
    @endforeach
</div>
<div id="contact_form">
    <input class="hidden" id="send_to" value="{{$send_to}}">
    <label>
        <input type="text" id="content" required>
    </label>
    <input class="sendButton send-message" type="submit" value="发送">
</div>

<script type="text/javascript">
    $('.send-message').click(function () {
        $.ajax({
            type: 'post',
            url: 'chat',
            data: {'send_to': $('#send_to').val(), 'content': $('#content').val()},
            success: function (rps) {
                var str = '<span><label>' + rps.created_at + '</label></span>\n' +
                    '    <span><label>' + rps.user + '：</label></span>\n' +
                    '    <span><input type="text" class="form-control round-form" value="' + rps.content + '" readonly></span>';
                console.log(str);
                $('#message').append(str);
                $('#content').val('');
            },
            dataType: 'json'
        })
    });
</script>
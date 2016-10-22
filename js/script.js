function imagepreview(input)
    {
        if(input.files && input.files[0])
        {
            var field = new FileReader();
            field.onload=function (e)
            {
                $('#preview').attr('src', e.target.result);
                $('#preview').attr('style', 'height: 200px; width: 200px');
            };
            field.readAsDataURL(input.files[0]);
        }
    }
/*$('#post_submit').click(function()
{
    var data=$('#post_form :input').serializeArray();
    $.post($('#post_form').attr('action'), data, function(output)
    {
        $('#posts').html(output);
    });
}
);
$('#post_form').submit(function()
{
    
})*/
$('#comment_make').click(function ()
{
    var fields=$('#comment_form :input').serializeArray();
    $.post($('#comment_form').attr('action'), fields, function(output)
    {
        $('#comments').html(output);
        clearInput();
    });
}
);
$('#comment_form').submit(function ()
{
    return false;
});
function clearInput(){
    $('#comment_form :input').each(function()
    {
        $(this).val('');
    });
}
function alert_delete() 
{
    return confirm('Точно удалить?');
}

function show_hide(el)
{
    if ($(el).css('display') == "none") {
        $(el).show();
    } else {
        $(el).hide();
    }
    return false;
}
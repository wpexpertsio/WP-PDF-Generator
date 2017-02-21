function wppg_download_pdf()
{
    document.getElementById('download_link').click();
}

function wppg_loading_pdf()
{
    document.getElementById('loading_gif').style.display = 'block';
}

jQuery(document).load()
{
    document.getElementById('loading_gif').style.display = 'none';
}
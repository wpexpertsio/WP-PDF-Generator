var pdf_radio_btn = 0;

function wppg_pdf_image()
{
    pdf_radio_btn = 1;
    document.getElementById('pdf-text').readOnly = true;
}

function wppg_pdf_text()
{
    pdf_radio_btn = 0;
    document.getElementById('pdf-text').readOnly = false;
}

jQuery('.btn-radio').click(function(){
    if(pdf_radio_btn == 0)
    {
        return false;
    }
    else if(pdf_radio_btn == 1)
    {
        return true;
    }
});




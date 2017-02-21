<?php
class wppg_objects_pdf_class
{
    function wppg_objects_save_format($option, $new_value)
    {
        update_option($option, $new_value);
    }
    function wppg_objects_get_pdf($option){
        get_option($option);
    }
}
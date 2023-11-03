<?php

/*-------------------------------------------------------
  ACF Options Page
-------------------------------------------------------*/

if (function_exists('acf_add_options_page')) {
  acf_add_options_page();
  acf_set_options_page_title('Options');
}

/*-------------------------------------------------------
  ACF Google Maps
-------------------------------------------------------*/

function acf_google_map_api() {
  acf_update_setting('google_api_key', 'AIzaSyDheQWAg7ict4iFzYP4XYIdfODPonjdK4I');
}
// add_action('acf/init', 'acf_google_map_api');

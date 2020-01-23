<?php defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('templates/_visitor_parts/head');
$this->load->view('templates/_visitor_parts/header');

echo (isset( $heroArea )) ? $heroArea : '';

$this->load->view('templates/_visitor_parts/sidebar_menu');
?>
<?php echo $the_view_content; ?>
<?php $this->load->view('templates/_visitor_parts/footer'); ?>

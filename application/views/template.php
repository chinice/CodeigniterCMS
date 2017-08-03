<?php
$this->load->view('partials/header', $data);
$this->load->view('partials/menu');
$this->load->view($content);
$this->load->view('partials/footer');
$this->load->view($pageFooter);
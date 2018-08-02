<?php

Plugin::load('fields', true);

$dropdown = new PluginFieldsWarrantyamcfieldDropdown();
include GLPI_ROOT . "/front/dropdown.common.php";

<?php

Plugin::load('fields', true);

$dropdown = new PluginFieldsLocationcountryfieldDropdown();
include GLPI_ROOT . "/front/dropdown.common.php";

<?php

Plugin::load('fields', true);

$dropdown = new PluginFieldsStandaloneinnetworkfieldDropdown();
include GLPI_ROOT . "/front/dropdown.common.php";

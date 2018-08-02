<?php

Plugin::load('fields', true);

$dropdown = new PluginFieldsPhysicallyexistynfieldDropdown();
include GLPI_ROOT . "/front/dropdown.common.php";

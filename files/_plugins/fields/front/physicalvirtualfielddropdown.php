<?php

Plugin::load('fields', true);

$dropdown = new PluginFieldsPhysicalvirtualfieldDropdown();
include GLPI_ROOT . "/front/dropdown.common.php";

<?php

Plugin::load('fields', true);

$dropdown = new PluginFieldsSublocationfieldDropdown();
include GLPI_ROOT . "/front/dropdown.common.php";

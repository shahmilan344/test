<?php

Plugin::load('fields', true);

$dropdown = new PluginFieldsRegionfieldDropdown();
include GLPI_ROOT . "/front/dropdown.common.php";

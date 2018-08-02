<?php

class PluginFieldsSoftwaresoftware extends CommonDBTM
{
   static $rightname = 'software';

   static function install($containers_id = 0) {
      global $DB;

      $obj = new self();
      $table = $obj->getTable();

      // create Table
      if (!$DB->tableExists($table)) {
         $query = "CREATE TABLE IF NOT EXISTS `$table` (
                  `id`                               INT(11)      NOT NULL auto_increment,
                  `items_id`                         INT(11)      NOT NULL,
                  `itemtype`                         VARCHAR(255) DEFAULT 'Software',
                  `plugin_fields_containers_id`      INT(11)      NOT NULL DEFAULT '1',
                  PRIMARY KEY                        (`id`),
                  UNIQUE INDEX `itemtype_item_container`
                     (`itemtype`, `items_id`, `plugin_fields_containers_id`)
               ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
         $DB->query($query) or die ($DB->error());
      }

      // and its fields
      if ($containers_id) {
         foreach ($DB->request(PluginFieldsField::getTable(), [
            'plugin_fields_containers_id' => $containers_id
         ]) as $field) {
            self::addField($field['name'], $field['type']);
         }
      }
   }

   static function uninstall() {
      global $DB;

      $obj = new self();
      return $DB->query("DROP TABLE IF EXISTS `".$obj->getTable()."`");
   }

   static function addField($fieldname, $type) {
      if ($type != 'header') {
         $sql_type = PluginFieldsMigration::getSQLType($type);

         $migration = new Migration(0);
         $migration->addField(self::getTable(), $fieldname, $sql_type);
         $migration->migrationOneTable(self::getTable());
      }
   }

   static function removeField($fieldname) {
      $migration = new Migration(0);
      $migration->dropField(self::getTable(), $fieldname);

   }
}

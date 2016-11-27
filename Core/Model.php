<?php

namespace Core;
require 'Database.php';
     class Model
       
        {

             //it will return the array of objects
         public static function Get_All()
         {
             return static::execute_query("SELECT * FROM ".static::$the_table."");

         }

         // get data in sorted order
        public static function Get_All_Order_By($field)
         {
             return static::execute_query("SELECT * FROM ".static::$the_table." ORDER BY {$field}");

         }
         // it will return the single object
         public static function Find_ById($Id)
         {
             $result = static::execute_query("SELECT * FROM ".static::$the_table." WHERE id=$Id");
             return !empty($result) ? array_shift($result) : false;
         }
         //it will execute the query and return the array of objects
         public static function execute_query($sql)
         {
             global $database;
              //this needs to be fixed
             $database = new Database();
             $result_set = $database->query($sql);
             $the_object_array = array();

             while ($row = mysqli_fetch_array($result_set))
             {
                 $the_object_array[] = static::instantiation($row);
             }
             return $the_object_array;
         }
         //it will return if the object has attribute or not
         private function has_attribute($the_attribute)
         {
             $object_properties = get_object_vars($this);
             return array_key_exists($the_attribute, $object_properties);

         }

         //it will change the database record to object
         public static function instantiation($the_record)
         {
             $calling_class = get_called_class();
             $the_object = new $calling_class;
             foreach ($the_record as $the_attribute => $recod)
             {
                 if($the_object->has_attribute($the_attribute))
                 {
                     //pay attention
                     $the_object->$the_attribute = $recod;
                 }

             }
             return $the_object;
         }
         // this will return all the properties of the class [property abstraction]
         public  function properties(){

             $properties = array();
             foreach(static::$the_table_fields as $db_field)
             {
                 if(property_exists($this,$db_field))
                 {
                     $properties[$db_field] = $this->$db_field;
                 }
             }
             return $properties;
         }

         // This is used for mysqli real escape string for user input
         protected function clean_properties()
         {
             global $database;
              //this needs to be fixed
             $database = new Database();
             $clean_properties = array();
             foreach($this->properties() as $key => $value)
             {
                 $clean_properties[$key] = $database->escape_string($value);
             }
             return $clean_properties;
         }



         // it will insert the data [property abstraction]
         public  function create()
         {
             global $database;
              //this needs to be fixed
             $database = new Database();

             $properties = static::clean_properties();

             $sql = "INSERT INTO ".static::$the_table."(".implode(",",array_keys($properties)) .")";
             $sql .= "VALUES ('".implode("','",array_values($properties))."')";

             if($database->query($sql)) {
                 //this will pull the last id of the database record
                 $this->id = $database->insert_id();
                 return true;
             }
             else {
                 die("create failed");
                 return false;
             }
         }

         //it will edit the data [property abstraction]

         public  function update()
         {
             global $database;
              //this needs to be fixed
             $database = new Database();
             $properties = static::clean_properties();
             $properties_pairs = array();

             foreach($properties as $key => $value)
             {
                 $properties_pairs[] = "{$key}='{$value}'";
             }

             $sql = "UPDATE ".static::$the_table." SET ";
             $sql .= implode(",", $properties_pairs);
             $sql .= " WHERE id = ".$database->escape_string($this->id);

             $database->query($sql);

             return (mysqli_affected_rows($database->get_connection()) == 1)? true: false;
         }

         //this works for both create and update
         public  function save()
         {
             return isset($this->id) ? static::update() : static::create();
         }

         public function delete()
         {
             global $database;
             //this needs to be fixed
             $database = new Database();
             $sql = "DELETE FROM ".static::$the_table."";
             $sql .= " WHERE id=".$database->escape_string($this->id);

             $database->query($sql);
             return (mysqli_affected_rows($database->get_connection()) == 1)? true: false;
         }
             
             
             

        }


?>
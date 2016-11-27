<?php
namespace App\Models;

use \Core\Model;

class Posts extends Model{

    protected static $the_table = "posts";
    protected static $the_table_fields = array('name','description');
    public $id;
    public $name;
    public $description;

}
?>
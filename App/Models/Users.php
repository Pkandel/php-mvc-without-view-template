<?php
namespace App\Models;

use \Core\Model;

class Users extends Model{

    protected static $the_table = "users";
    protected static $the_table_fields = array('username','email','pass','phone','address');
    public $username;
    public $email;
    public $pass;
    public $phone;
    public $address;

}
?>
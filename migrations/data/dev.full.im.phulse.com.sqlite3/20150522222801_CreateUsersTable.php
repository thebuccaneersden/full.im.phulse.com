<?php

class CreateUsersTable extends Ruckusing_Migration_Base
{
    public function up()
    {
      $t = $this->create_table("users", array("id" => false));
      $t->column("user_id", "integer", array(
        "primary_key"      => true, 
        "auto_increment"   => true, 
        "unsigned"         => true, 
        "null"             => false
      ));
      $t->column("first_name", "string");
      $t->column("last_name", "string");
      $t->column("email", "string", array("limit" => 128));
      $t->column("title", "string");
      $t->finish();

      $this->add_index("users", "email", array("unique" => true));
    }//up()

    public function down()
    {
      $this->drop_table("users");
    }//down()
}

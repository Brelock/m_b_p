<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $this->createNewRole('client', 'Client', 'Client', 1, 1);
    $this->createNewRole('admin', 'Administrator', 'User is allowed to manage and edit other users',0, 1);
  }

  public function createNewRole(string $name, string $displayName = '', string $description = '', int $isDefault = 0, int $type = 0 ): Role {
    $newRole = new Role();
    $newRole->name = $name;
    $newRole->display_name = $displayName;
    $newRole->description = $description;
    $newRole->is_default = $isDefault;
    $newRole->type = $type;
    $newRole->save();

    return $newRole;
  }
}

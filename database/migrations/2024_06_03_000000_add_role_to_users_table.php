<?php // database/migrations/2024_06_03_000000_add_role_to_users_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user'); // Voeg een nieuwe kolom 'role' toe, standaard 'user'
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role'); // Verwijder de 'role' kolom bij rollback
        });
    }
}
?>

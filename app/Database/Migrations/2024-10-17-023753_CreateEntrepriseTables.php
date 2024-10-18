<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEntrepriseTables extends Migration
{
    public function up()
    {
        // Table entreprises
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nom_entreprise' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'apropos' => [
                'type' => 'TEXT',
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('entreprises');

        // Table services
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'entreprise_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'nom_service' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'image_service' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('services');

        // Table localisations
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'entreprise_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'localisation' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('localisations');

        // Table contact_forms
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'entreprise_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'bg_color' => [
                'type' => 'VARCHAR',
                'constraint' => '7',
            ],
            'text_color' => [
                'type' => 'VARCHAR',
                'constraint' => '7',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('contact_forms');

        // Table contact_fields
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'contact_form_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'field_label' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'field_type' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('contact_fields');
    }

    public function down()
    {
        $this->forge->dropTable('contact_fields');
        $this->forge->dropTable('contact_forms');
        $this->forge->dropTable('localisations');
        $this->forge->dropTable('services');
        $this->forge->dropTable('entreprises');
    }
}

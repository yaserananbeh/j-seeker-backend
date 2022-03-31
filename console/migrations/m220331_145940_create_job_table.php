<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%job}}`.
 */
class m220331_145940_create_job_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%job}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->string(),
            'created_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey("FK_job_user_created_by", '{{%job}}', "created_by", '{{%user}}', 'id');
        $this->addForeignKey("FK_job_category_category_id", '{{%job}}', "category_id", '{{%category}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey("FK_job_user_created_by", '{{%job}}');
        $this->dropForeignKey("FK_job_category_category_id", '{{%job}}');
        $this->dropTable('{{%job}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%application}}`.
 */
class m220331_145955_create_application_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%application}}', [
            'id' => $this->primaryKey(),
            'job_id' => $this->integer(),
            'user_id' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'status' => $this->integer()->defaultValue(1)->notNull()
        ]);
        $this->addForeignKey("FK_application_user_user_id", '{{%application}}', "user_id", '{{%user}}', 'id');
        $this->addForeignKey("FK_application_job_job_id", '{{%application}}', "job_id", '{{%job}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey("FK_application_user_user_id", '{{%application}}');
        $this->dropForeignKey("FK_application_job_job_id", '{{%application}}');
        $this->dropTable('{{%application}}');
    }
}

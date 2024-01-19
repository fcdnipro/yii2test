<?php

use yii\db\Migration;

/**
 * Class m240118_222803_queue
 */
class m240118_222803_queue extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%queue}}', [
            'id' => $this->primaryKey(),
            'channel' => $this->string(255)->notNull(),
            'job' => $this->binary()->notNull(),
            'pushed_at' => $this->integer()->notNull(),
            'ttr' => $this->integer()->notNull(),
            'delay' => $this->integer()->notNull()->defaultValue(0),
            'priority' => $this->integer()->unsigned()->notNull()->defaultValue(1024),
            'reserved_at' => $this->integer(),
            'attempt' => $this->integer(),
            'done_at' => $this->integer(),
        ]);

        // Add indexes
        $this->createIndex('idx-channel', '{{%queue}}', 'channel');
        $this->createIndex('idx-reserved_at', '{{%queue}}', 'reserved_at');
        $this->createIndex('idx-priority', '{{%queue}}', 'priority');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop the indexes
        $this->dropIndex('idx-channel', '{{%queue}}');
        $this->dropIndex('idx-reserved_at', '{{%queue}}');
        $this->dropIndex('idx-priority', '{{%queue}}');

        // Drop the table
        $this->dropTable('{{%queue}}');
    }
}

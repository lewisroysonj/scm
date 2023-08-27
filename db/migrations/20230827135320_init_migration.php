<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class InitMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $this->execute('
            CREATE DATABASE IF NOT EXISTS scm_db;
        ');

        $this->execute('
            USE scm_db;
        ');

        $sql = "
            CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL
            );
        ";

        $this->execute($sql);
    }
}

<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Init extends AbstractMigration
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
    public function up(): void
    {
        $this->execute("
            CREATE TABLE IF NOT EXISTS users (
                id varchar(13),
                name varchar(200) NOT NULL,
                username varchar(150) NOT NULL,
                email varchar(255) NOT NULL,
                password varchar(255) NOT NULL,
                role varchar(100),
                PRIMARY KEY (`id`)
            );
            CREATE TABLE IF NOT EXISTS products (
                id varchar(13),
                name varchar(100) NOT NULL,
                price numeric NOT NULL,
                description varchar(100) NOT NULL,
                datetime date NOT NULL,
                image varchar(255),
                PRIMARY KEY (id)
            );
            CREATE TABLE IF NOT EXISTS bids (
                id varchar(13),
                productId varchar(13) NOT NULL,
                currentBid numeric NOT NULL,
                datetime date NOT NULL,
                PRIMARY KEY (id)
            );

            ALTER TABLE bids ADD
                CONSTRAINT fk_bids FOREIGN KEY (productId) references products (id);  
        ");
    }

    public function down()
    {
        $this->execute('DROP TABLE users');
        $this->execute('DROP TABLE products');
        $this->execute('DROP TABLE bids');
    }
}

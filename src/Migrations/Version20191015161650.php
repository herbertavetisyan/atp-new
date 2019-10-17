<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191015161650 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE events');
        $this->addSql('ALTER TABLE teams ADD branch_type VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE events (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(256) DEFAULT NULL COLLATE utf8mb4_unicode_ci, title VARCHAR(200) NOT NULL COLLATE utf8mb4_unicode_ci, description LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, location VARCHAR(200) NOT NULL COLLATE utf8mb4_unicode_ci, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE teams DROP branch_type');
    }
}

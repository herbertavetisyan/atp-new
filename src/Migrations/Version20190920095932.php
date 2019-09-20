<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190920095932 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE magazineLang (id INT AUTO_INCREMENT NOT NULL, magazine_id INT DEFAULT NULL, lang VARCHAR(2) DEFAULT NULL, title LONGTEXT DEFAULT NULL, text LONGTEXT DEFAULT NULL, INDEX IDX_D4BC8EA63EB84A1D (magazine_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE magazine (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, pdf VARCHAR(256) NOT NULL, image VARCHAR(256) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE magazineLang ADD CONSTRAINT FK_D4BC8EA63EB84A1D FOREIGN KEY (magazine_id) REFERENCES magazine (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE magazineLang DROP FOREIGN KEY FK_D4BC8EA63EB84A1D');
        $this->addSql('DROP TABLE magazineLang');
        $this->addSql('DROP TABLE magazine');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190920075526 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lessonsLang (id INT AUTO_INCREMENT NOT NULL, lessons_id INT DEFAULT NULL, lang VARCHAR(2) DEFAULT NULL, title LONGTEXT DEFAULT NULL, text LONGTEXT DEFAULT NULL, INDEX IDX_AC7B2F3DFED07355 (lessons_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lessonsLang ADD CONSTRAINT FK_AC7B2F3DFED07355 FOREIGN KEY (lessons_id) REFERENCES lessons (id)');
        $this->addSql('DROP TABLE lessons_lang');
        $this->addSql('ALTER TABLE lessons DROP pdf_name, CHANGE image pdf VARCHAR(256) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lessons_lang (id INT AUTO_INCREMENT NOT NULL, lessons_id INT DEFAULT NULL, lang VARCHAR(2) DEFAULT NULL COLLATE utf8mb4_unicode_ci, title LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, text LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_56A4E5B3FED07355 (lessons_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE lessons_lang ADD CONSTRAINT FK_56A4E5B3FED07355 FOREIGN KEY (lessons_id) REFERENCES lessons (id)');
        $this->addSql('DROP TABLE lessonsLang');
        $this->addSql('ALTER TABLE lessons ADD pdf_name VARCHAR(256) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE pdf image VARCHAR(256) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}

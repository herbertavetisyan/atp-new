<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190923123626 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE tagsLang');
        $this->addSql('ALTER TABLE tages ADD title LONGTEXT DEFAULT NULL, ADD text LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tagsLang (id INT AUTO_INCREMENT NOT NULL, tag_id INT DEFAULT NULL, title LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, text LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, lang VARCHAR(3) DEFAULT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_7B0556EFBAD26311 (tag_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE tagsLang ADD CONSTRAINT FK_7B0556EFBAD26311 FOREIGN KEY (tag_id) REFERENCES tages (id)');
        $this->addSql('ALTER TABLE tages DROP title, DROP text');
    }
}

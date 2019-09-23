<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190923122821 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE feature_tag (feature_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_41E4F23060E4B879 (feature_id), INDEX IDX_41E4F230BAD26311 (tag_id), PRIMARY KEY(feature_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tages (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tagsLang (id INT AUTO_INCREMENT NOT NULL, tag_id INT DEFAULT NULL, title LONGTEXT DEFAULT NULL, text LONGTEXT DEFAULT NULL, lang VARCHAR(3) DEFAULT NULL, INDEX IDX_7B0556EFBAD26311 (tag_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE feature_tag ADD CONSTRAINT FK_41E4F23060E4B879 FOREIGN KEY (feature_id) REFERENCES features (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE feature_tag ADD CONSTRAINT FK_41E4F230BAD26311 FOREIGN KEY (tag_id) REFERENCES tages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tagsLang ADD CONSTRAINT FK_7B0556EFBAD26311 FOREIGN KEY (tag_id) REFERENCES tages (id)');
        $this->addSql('DROP TABLE feature_page');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE feature_tag DROP FOREIGN KEY FK_41E4F230BAD26311');
        $this->addSql('ALTER TABLE tagsLang DROP FOREIGN KEY FK_7B0556EFBAD26311');
        $this->addSql('CREATE TABLE feature_page (feature_id INT NOT NULL, page_id INT NOT NULL, INDEX IDX_46203953C4663E4 (page_id), INDEX IDX_4620395360E4B879 (feature_id), PRIMARY KEY(feature_id, page_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE feature_page ADD CONSTRAINT FK_4620395360E4B879 FOREIGN KEY (feature_id) REFERENCES features (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE feature_page ADD CONSTRAINT FK_46203953C4663E4 FOREIGN KEY (page_id) REFERENCES pages (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE feature_tag');
        $this->addSql('DROP TABLE tages');
        $this->addSql('DROP TABLE tagsLang');
    }
}

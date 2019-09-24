<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190924163410 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE team_branch_lang DROP FOREIGN KEY FK_3DDBB86BD3D2AE');
        $this->addSql('ALTER TABLE teams DROP FOREIGN KEY FK_96C22258DCD6CC49');
        $this->addSql('DROP TABLE team_branch_lang');
        $this->addSql('DROP TABLE team_branches');
        $this->addSql('DROP INDEX IDX_96C22258DCD6CC49 ON teams');
        $this->addSql('ALTER TABLE teams ADD branches VARCHAR(255) DEFAULT NULL, DROP branch_id');
        $this->addSql('ALTER TABLE magazineLang CHANGE lang lang VARCHAR(3) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE team_branch_lang (id INT AUTO_INCREMENT NOT NULL, team_branch_id INT DEFAULT NULL, text LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, lang VARCHAR(3) DEFAULT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_3DDBB86BD3D2AE (team_branch_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE team_branches (id INT AUTO_INCREMENT NOT NULL, type LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE team_branch_lang ADD CONSTRAINT FK_3DDBB86BD3D2AE FOREIGN KEY (team_branch_id) REFERENCES team_branches (id)');
        $this->addSql('ALTER TABLE magazineLang CHANGE lang lang VARCHAR(2) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE teams ADD branch_id INT DEFAULT NULL, DROP branches');
        $this->addSql('ALTER TABLE teams ADD CONSTRAINT FK_96C22258DCD6CC49 FOREIGN KEY (branch_id) REFERENCES team_branches (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_96C22258DCD6CC49 ON teams (branch_id)');
    }
}

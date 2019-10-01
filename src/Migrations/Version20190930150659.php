<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190930150659 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE team_branches (team_id INT NOT NULL, branches_id INT NOT NULL, INDEX IDX_6F220D11296CD8AE (team_id), INDEX IDX_6F220D11F05BDCFC (branches_id), PRIMARY KEY(team_id, branches_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE branchesLang (id INT AUTO_INCREMENT NOT NULL, branches_id INT DEFAULT NULL, title LONGTEXT DEFAULT NULL, text LONGTEXT DEFAULT NULL, lang VARCHAR(3) DEFAULT NULL, INDEX IDX_37FBFDEF05BDCFC (branches_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE branches (id INT AUTO_INCREMENT NOT NULL, title LONGTEXT DEFAULT NULL, text LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE team_branches ADD CONSTRAINT FK_6F220D11296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_branches ADD CONSTRAINT FK_6F220D11F05BDCFC FOREIGN KEY (branches_id) REFERENCES branches (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE branchesLang ADD CONSTRAINT FK_37FBFDEF05BDCFC FOREIGN KEY (branches_id) REFERENCES branches (id)');
        $this->addSql('ALTER TABLE teams DROP branches');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE team_branches DROP FOREIGN KEY FK_6F220D11F05BDCFC');
        $this->addSql('ALTER TABLE branchesLang DROP FOREIGN KEY FK_37FBFDEF05BDCFC');
        $this->addSql('DROP TABLE team_branches');
        $this->addSql('DROP TABLE branchesLang');
        $this->addSql('DROP TABLE branches');
        $this->addSql('ALTER TABLE teams ADD branches VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}

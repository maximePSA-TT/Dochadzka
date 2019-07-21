<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190702100619 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE line (id SMALLINT UNSIGNED AUTO_INCREMENT NOT NULL, ur_id SMALLINT UNSIGNED NOT NULL, name VARCHAR(45) NOT NULL, INDEX IDX_D114B4F6AF26EC97 (ur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE uep (id SMALLINT UNSIGNED AUTO_INCREMENT NOT NULL, line_id SMALLINT UNSIGNED NOT NULL, name VARCHAR(45) NOT NULL, INDEX IDX_E5F49D774D7B7542 (line_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ur (id SMALLINT UNSIGNED AUTO_INCREMENT NOT NULL, abbreviation VARCHAR(10) NOT NULL, name VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE line ADD CONSTRAINT FK_D114B4F6AF26EC97 FOREIGN KEY (ur_id) REFERENCES ur (id)');
        $this->addSql('ALTER TABLE uep ADD CONSTRAINT FK_E5F49D774D7B7542 FOREIGN KEY (line_id) REFERENCES line (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE uep DROP FOREIGN KEY FK_E5F49D774D7B7542');
        $this->addSql('ALTER TABLE line DROP FOREIGN KEY FK_D114B4F6AF26EC97');
        $this->addSql('DROP TABLE line');
        $this->addSql('DROP TABLE uep');
        $this->addSql('DROP TABLE ur');
    }
}

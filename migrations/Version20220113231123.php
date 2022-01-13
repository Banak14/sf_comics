<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220113231123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image ADD comics_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F71AE76A2 FOREIGN KEY (comics_id) REFERENCES comics (id)');
        $this->addSql('CREATE INDEX IDX_C53D045F71AE76A2 ON image (comics_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F71AE76A2');
        $this->addSql('DROP INDEX IDX_C53D045F71AE76A2 ON image');
        $this->addSql('ALTER TABLE image DROP comics_id');
    }
}

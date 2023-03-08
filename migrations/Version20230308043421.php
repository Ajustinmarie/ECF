<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230308043421 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_allergenes (user_id INT NOT NULL, allergenes_id INT NOT NULL, INDEX IDX_6C9A3C3AA76ED395 (user_id), INDEX IDX_6C9A3C3AC21A0BEF (allergenes_id), PRIMARY KEY(user_id, allergenes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_allergenes ADD CONSTRAINT FK_6C9A3C3AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_allergenes ADD CONSTRAINT FK_6C9A3C3AC21A0BEF FOREIGN KEY (allergenes_id) REFERENCES allergenes (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_allergenes DROP FOREIGN KEY FK_6C9A3C3AA76ED395');
        $this->addSql('ALTER TABLE user_allergenes DROP FOREIGN KEY FK_6C9A3C3AC21A0BEF');
        $this->addSql('DROP TABLE user_allergenes');
    }
}

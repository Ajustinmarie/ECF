<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230308204605 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE regime DROP titre, DROP description, DROP temps_de_preparation, DROP temps_de_repos, DROP temps_de_cuisson, DROP ingredient, DROP etapes');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE regime ADD titre VARCHAR(255) NOT NULL, ADD description LONGTEXT NOT NULL, ADD temps_de_preparation INT NOT NULL, ADD temps_de_repos INT NOT NULL, ADD temps_de_cuisson INT NOT NULL, ADD ingredient LONGTEXT NOT NULL, ADD etapes LONGTEXT NOT NULL');
    }
}

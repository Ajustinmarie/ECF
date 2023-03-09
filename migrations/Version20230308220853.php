<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230308220853 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recettes (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, temps_de_preparation INT NOT NULL, temps_de_cuisson INT NOT NULL, ingédrients LONGTEXT NOT NULL, etapes LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recettes_allergenes (recettes_id INT NOT NULL, allergenes_id INT NOT NULL, INDEX IDX_4AFE999E3E2ED6D6 (recettes_id), INDEX IDX_4AFE999EC21A0BEF (allergenes_id), PRIMARY KEY(recettes_id, allergenes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recettes_regime (recettes_id INT NOT NULL, regime_id INT NOT NULL, INDEX IDX_3914009C3E2ED6D6 (recettes_id), INDEX IDX_3914009C35E7D534 (regime_id), PRIMARY KEY(recettes_id, regime_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recettes_allergenes ADD CONSTRAINT FK_4AFE999E3E2ED6D6 FOREIGN KEY (recettes_id) REFERENCES recettes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recettes_allergenes ADD CONSTRAINT FK_4AFE999EC21A0BEF FOREIGN KEY (allergenes_id) REFERENCES allergenes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recettes_regime ADD CONSTRAINT FK_3914009C3E2ED6D6 FOREIGN KEY (recettes_id) REFERENCES recettes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recettes_regime ADD CONSTRAINT FK_3914009C35E7D534 FOREIGN KEY (regime_id) REFERENCES regime (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recettes_allergenes DROP FOREIGN KEY FK_4AFE999E3E2ED6D6');
        $this->addSql('ALTER TABLE recettes_allergenes DROP FOREIGN KEY FK_4AFE999EC21A0BEF');
        $this->addSql('ALTER TABLE recettes_regime DROP FOREIGN KEY FK_3914009C3E2ED6D6');
        $this->addSql('ALTER TABLE recettes_regime DROP FOREIGN KEY FK_3914009C35E7D534');
        $this->addSql('DROP TABLE recettes');
        $this->addSql('DROP TABLE recettes_allergenes');
        $this->addSql('DROP TABLE recettes_regime');
    }
}

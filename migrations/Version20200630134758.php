<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200630134758 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formations_modules (formations_id INT NOT NULL, modules_id INT NOT NULL, INDEX IDX_F9A884EC3BF5B0C2 (formations_id), INDEX IDX_F9A884EC60D6DC42 (modules_id), PRIMARY KEY(formations_id, modules_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formations_modules ADD CONSTRAINT FK_F9A884EC3BF5B0C2 FOREIGN KEY (formations_id) REFERENCES formations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formations_modules ADD CONSTRAINT FK_F9A884EC60D6DC42 FOREIGN KEY (modules_id) REFERENCES modules (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formations ADD sujet_id INT NOT NULL');
        $this->addSql('ALTER TABLE formations ADD CONSTRAINT FK_409021377C4D497E FOREIGN KEY (sujet_id) REFERENCES themes (id)');
        $this->addSql('CREATE INDEX IDX_409021377C4D497E ON formations (sujet_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE formations_modules');
        $this->addSql('ALTER TABLE formations DROP FOREIGN KEY FK_409021377C4D497E');
        $this->addSql('DROP INDEX IDX_409021377C4D497E ON formations');
        $this->addSql('ALTER TABLE formations DROP sujet_id');
    }
}

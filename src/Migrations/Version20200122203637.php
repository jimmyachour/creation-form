<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200122203637 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contract (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, create_date_time DATETIME NOT NULL, updated_date_time DATETIME DEFAULT NULL, INDEX IDX_E98F2859C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contract_additional_property (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contract_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contract_type_contract_additional_property (contract_type_id INT NOT NULL, contract_additional_property_id INT NOT NULL, INDEX IDX_FAB0C46BCD1DF15B (contract_type_id), INDEX IDX_FAB0C46BA0424577 (contract_additional_property_id), PRIMARY KEY(contract_type_id, contract_additional_property_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT FK_E98F2859C54C8C93 FOREIGN KEY (type_id) REFERENCES contract_type (id)');
        $this->addSql('ALTER TABLE contract_type_contract_additional_property ADD CONSTRAINT FK_FAB0C46BCD1DF15B FOREIGN KEY (contract_type_id) REFERENCES contract_type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contract_type_contract_additional_property ADD CONSTRAINT FK_FAB0C46BA0424577 FOREIGN KEY (contract_additional_property_id) REFERENCES contract_additional_property (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contract_type_contract_additional_property DROP FOREIGN KEY FK_FAB0C46BA0424577');
        $this->addSql('ALTER TABLE contract DROP FOREIGN KEY FK_E98F2859C54C8C93');
        $this->addSql('ALTER TABLE contract_type_contract_additional_property DROP FOREIGN KEY FK_FAB0C46BCD1DF15B');
        $this->addSql('DROP TABLE contract');
        $this->addSql('DROP TABLE contract_additional_property');
        $this->addSql('DROP TABLE contract_type');
        $this->addSql('DROP TABLE contract_type_contract_additional_property');
    }
}

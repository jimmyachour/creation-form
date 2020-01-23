<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200123122912 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE contract_type_contract_additional_property');
        $this->addSql('ALTER TABLE contract_additional_property ADD contract_type_id INT NOT NULL, CHANGE value value VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE contract_additional_property ADD CONSTRAINT FK_BF335E7CCD1DF15B FOREIGN KEY (contract_type_id) REFERENCES contract_type (id)');
        $this->addSql('CREATE INDEX IDX_BF335E7CCD1DF15B ON contract_additional_property (contract_type_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contract_type_contract_additional_property (contract_type_id INT NOT NULL, contract_additional_property_id INT NOT NULL, INDEX IDX_FAB0C46BCD1DF15B (contract_type_id), INDEX IDX_FAB0C46BA0424577 (contract_additional_property_id), PRIMARY KEY(contract_type_id, contract_additional_property_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE contract_type_contract_additional_property ADD CONSTRAINT FK_FAB0C46BA0424577 FOREIGN KEY (contract_additional_property_id) REFERENCES contract_additional_property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contract_type_contract_additional_property ADD CONSTRAINT FK_FAB0C46BCD1DF15B FOREIGN KEY (contract_type_id) REFERENCES contract_type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contract_additional_property DROP FOREIGN KEY FK_BF335E7CCD1DF15B');
        $this->addSql('DROP INDEX IDX_BF335E7CCD1DF15B ON contract_additional_property');
        $this->addSql('ALTER TABLE contract_additional_property DROP contract_type_id, CHANGE value value VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}

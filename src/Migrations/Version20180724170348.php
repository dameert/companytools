<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180724170348 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bill ADD day_value_value DATETIME NOT NULL, ADD vat_amount_value DOUBLE PRECISION NOT NULL, ADD total_amount_value DOUBLE PRECISION NOT NULL, ADD quarter_value_quarter INT NOT NULL, ADD quarter_value_year_value_value INT NOT NULL, ADD quarter_value_month_value_value INT NOT NULL, DROP day_value, DROP vat_amount, DROP total_amount, DROP quarter_value, CHANGE company_name company_name_value VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bill ADD vat_amount DOUBLE PRECISION NOT NULL, ADD total_amount DOUBLE PRECISION NOT NULL, ADD quarter_value DATETIME NOT NULL, DROP vat_amount_value, DROP total_amount_value, DROP quarter_value_quarter, DROP quarter_value_year_value_value, DROP quarter_value_month_value_value, CHANGE company_name_value company_name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE day_value_value day_value DATETIME NOT NULL');
    }
}

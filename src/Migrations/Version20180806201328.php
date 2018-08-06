<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180806201328 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bill (reference_value VARCHAR(255) NOT NULL, company_name_value VARCHAR(255) NOT NULL, day_value_value DATETIME NOT NULL, vat_amount_value DOUBLE PRECISION NOT NULL, total_amount_value DOUBLE PRECISION NOT NULL, quarter_value_quarter INT NOT NULL, quarter_value_year_value_value INT NOT NULL, quarter_value_month_value_value INT NOT NULL, PRIMARY KEY(reference_value)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invoice (reference_value VARCHAR(255) NOT NULL, company_name_value VARCHAR(255) NOT NULL, day_value_value DATETIME NOT NULL, vat_amount_value DOUBLE PRECISION NOT NULL, total_amount_value DOUBLE PRECISION NOT NULL, quarter_value_quarter INT NOT NULL, quarter_value_year_value_value INT NOT NULL, quarter_value_month_value_value INT NOT NULL, PRIMARY KEY(reference_value)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE bill');
        $this->addSql('DROP TABLE invoice');
    }
}

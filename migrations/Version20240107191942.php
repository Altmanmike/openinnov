<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240107191942 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE account_connections (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, ip1 VARCHAR(255) DEFAULT NULL, ip2 VARCHAR(255) DEFAULT NULL, ip3 VARCHAR(255) DEFAULT NULL, nb_logged INT DEFAULT NULL, UNIQUE INDEX UNIQ_6EB10016A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE budgets (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, category_id INT DEFAULT NULL, allocated_total_amount DOUBLE PRECISION NOT NULL, period VARCHAR(100) NOT NULL, achievement_statut VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_DCAA9548A76ED395 (user_id), UNIQUE INDEX UNIQ_DCAA954812469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE expense_categories (id INT AUTO_INCREMENT NOT NULL, category_name VARCHAR(100) NOT NULL, type VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE expenses (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, category_id INT DEFAULT NULL, total_amount DOUBLE PRECISION NOT NULL, description LONGTEXT NOT NULL, payment_method VARCHAR(100) NOT NULL, validation_statut VARCHAR(100) NOT NULL, date_expense DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_2496F35BA76ED395 (user_id), INDEX IDX_2496F35B12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salary (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, total_amount DOUBLE PRECISION NOT NULL, description LONGTEXT NOT NULL, source_of_salary VARCHAR(100) NOT NULL, date_salary DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_9413BB71A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE savings_goals (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, amount_target DOUBLE PRECISION NOT NULL, description LONGTEXT NOT NULL, date_target_desired DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_EF09AB97A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tips (id INT AUTO_INCREMENT NOT NULL, budgets_target_id INT DEFAULT NULL, savings_goals_target_id INT DEFAULT NULL, description LONGTEXT NOT NULL, INDEX IDX_642C4108293782B (budgets_target_id), INDEX IDX_642C4108F733E80F (savings_goals_target_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, firstname VARCHAR(100) NOT NULL, lastname VARCHAR(100) NOT NULL, phone VARCHAR(12) NOT NULL, company VARCHAR(150) NOT NULL, zipcode VARCHAR(5) NOT NULL, city VARCHAR(150) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', last_login_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE account_connections ADD CONSTRAINT FK_6EB10016A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE budgets ADD CONSTRAINT FK_DCAA9548A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE budgets ADD CONSTRAINT FK_DCAA954812469DE2 FOREIGN KEY (category_id) REFERENCES expense_categories (id)');
        $this->addSql('ALTER TABLE expenses ADD CONSTRAINT FK_2496F35BA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE expenses ADD CONSTRAINT FK_2496F35B12469DE2 FOREIGN KEY (category_id) REFERENCES expense_categories (id)');
        $this->addSql('ALTER TABLE salary ADD CONSTRAINT FK_9413BB71A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE savings_goals ADD CONSTRAINT FK_EF09AB97A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE tips ADD CONSTRAINT FK_642C4108293782B FOREIGN KEY (budgets_target_id) REFERENCES budgets (id)');
        $this->addSql('ALTER TABLE tips ADD CONSTRAINT FK_642C4108F733E80F FOREIGN KEY (savings_goals_target_id) REFERENCES savings_goals (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE account_connections DROP FOREIGN KEY FK_6EB10016A76ED395');
        $this->addSql('ALTER TABLE budgets DROP FOREIGN KEY FK_DCAA9548A76ED395');
        $this->addSql('ALTER TABLE budgets DROP FOREIGN KEY FK_DCAA954812469DE2');
        $this->addSql('ALTER TABLE expenses DROP FOREIGN KEY FK_2496F35BA76ED395');
        $this->addSql('ALTER TABLE expenses DROP FOREIGN KEY FK_2496F35B12469DE2');
        $this->addSql('ALTER TABLE salary DROP FOREIGN KEY FK_9413BB71A76ED395');
        $this->addSql('ALTER TABLE savings_goals DROP FOREIGN KEY FK_EF09AB97A76ED395');
        $this->addSql('ALTER TABLE tips DROP FOREIGN KEY FK_642C4108293782B');
        $this->addSql('ALTER TABLE tips DROP FOREIGN KEY FK_642C4108F733E80F');
        $this->addSql('DROP TABLE account_connections');
        $this->addSql('DROP TABLE budgets');
        $this->addSql('DROP TABLE expense_categories');
        $this->addSql('DROP TABLE expenses');
        $this->addSql('DROP TABLE salary');
        $this->addSql('DROP TABLE savings_goals');
        $this->addSql('DROP TABLE tips');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

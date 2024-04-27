<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240427005410 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE empresa ADD titulo_estabelecimento VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE empresa ADD atividade_economica_principal VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE empresa ADD natureza_juridica VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE empresa ADD logradouro VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE empresa ADD numero VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE empresa ADD complemento VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE empresa ADD bairro_distrito VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE empresa ADD municipio VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE empresa ADD uf VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE empresa ADD cep VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE empresa ADD email VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE empresa ADD telefone VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE empresa DROP titulo_estabelecimento');
        $this->addSql('ALTER TABLE empresa DROP atividade_economica_principal');
        $this->addSql('ALTER TABLE empresa DROP natureza_juridica');
        $this->addSql('ALTER TABLE empresa DROP logradouro');
        $this->addSql('ALTER TABLE empresa DROP numero');
        $this->addSql('ALTER TABLE empresa DROP complemento');
        $this->addSql('ALTER TABLE empresa DROP bairro_distrito');
        $this->addSql('ALTER TABLE empresa DROP municipio');
        $this->addSql('ALTER TABLE empresa DROP uf');
        $this->addSql('ALTER TABLE empresa DROP cep');
        $this->addSql('ALTER TABLE empresa DROP email');
        $this->addSql('ALTER TABLE empresa DROP telefone');
    }
}

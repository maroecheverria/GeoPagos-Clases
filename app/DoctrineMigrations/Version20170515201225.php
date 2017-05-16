<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170515201225 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE usuarios (codigousuario INT AUTO_INCREMENT NOT NULL, usuario VARCHAR(64) NOT NULL, clave VARCHAR(255) NOT NULL, edad INT NOT NULL, PRIMARY KEY(codigousuario)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pagos (codigopago INT AUTO_INCREMENT NOT NULL, codigousuario INT DEFAULT NULL, importe NUMERIC(10, 2) DEFAULT NULL, fecha DATETIME DEFAULT NULL, INDEX fk_pagos_codigousuario_idx (codigousuario), PRIMARY KEY(codigopago)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favoritos (codigousuario INT NOT NULL, codigousuariofavorito INT NOT NULL, INDEX IDX_1E86887FA5B4F832 (codigousuario), INDEX IDX_1E86887F21F506FC (codigousuariofavorito), PRIMARY KEY(codigousuario, codigousuariofavorito)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pagos ADD CONSTRAINT FK_DA9B0DFFA5B4F832 FOREIGN KEY (codigousuario) REFERENCES usuarios (codigousuario)');
        $this->addSql('ALTER TABLE favoritos ADD CONSTRAINT FK_1E86887F21F506FC FOREIGN KEY (codigousuariofavorito) REFERENCES usuarios (codigousuario)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pagos DROP FOREIGN KEY FK_DA9B0DFFA5B4F832');
        $this->addSql('ALTER TABLE favoritos DROP FOREIGN KEY FK_1E86887F21F506FC');
        $this->addSql('DROP TABLE usuarios');
        $this->addSql('DROP TABLE pagos');
        $this->addSql('DROP TABLE favoritos');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190827090235 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_project DROP FOREIGN KEY user_project_ibfk_1');
        $this->addSql('ALTER TABLE user_project DROP FOREIGN KEY user_project_ibfk_2');
        $this->addSql('ALTER TABLE user_project ADD CONSTRAINT FK_77BECEE4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_project ADD CONSTRAINT FK_77BECEE4166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE user_project RENAME INDEX user_id TO IDX_77BECEE4A76ED395');
        $this->addSql('ALTER TABLE user_project RENAME INDEX project_id TO IDX_77BECEE4166D1F9C');
        $this->addSql('ALTER TABLE user_task DROP FOREIGN KEY user_task_ibfk_1');
        $this->addSql('ALTER TABLE user_task DROP FOREIGN KEY user_task_ibfk_2');
        $this->addSql('ALTER TABLE user_task ADD CONSTRAINT FK_28FF97ECA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_task ADD CONSTRAINT FK_28FF97EC8DB60186 FOREIGN KEY (task_id) REFERENCES task (id)');
        $this->addSql('ALTER TABLE user_task RENAME INDEX user_id TO IDX_28FF97ECA76ED395');
        $this->addSql('ALTER TABLE user_task RENAME INDEX task_id TO IDX_28FF97EC8DB60186');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY task_ibfk_1');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY task_ibfk_2');
        $this->addSql('ALTER TABLE task CHANGE state_id state_id INT DEFAULT NULL, CHANGE project_id project_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB255D83CC1 FOREIGN KEY (state_id) REFERENCES state (id)');
        $this->addSql('ALTER TABLE state CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY project_ibfk_1');
        $this->addSql('ALTER TABLE project CHANGE owner_id owner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE chat_message DROP FOREIGN KEY chat_message_ibfk_1');
        $this->addSql('ALTER TABLE chat_message DROP FOREIGN KEY chat_message_ibfk_2');
        $this->addSql('ALTER TABLE chat_message CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE project_id project_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE chat_message ADD CONSTRAINT FK_FAB3FC16A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE chat_message ADD CONSTRAINT FK_FAB3FC16166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE chat_message DROP FOREIGN KEY FK_FAB3FC16A76ED395');
        $this->addSql('ALTER TABLE chat_message DROP FOREIGN KEY FK_FAB3FC16166D1F9C');
        $this->addSql('ALTER TABLE chat_message CHANGE id id INT NOT NULL, CHANGE user_id user_id INT NOT NULL, CHANGE project_id project_id INT NOT NULL');
        $this->addSql('ALTER TABLE chat_message ADD CONSTRAINT chat_message_ibfk_1 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chat_message ADD CONSTRAINT chat_message_ibfk_2 FOREIGN KEY (project_id) REFERENCES project (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE7E3C61F9');
        $this->addSql('ALTER TABLE project CHANGE owner_id owner_id INT NOT NULL');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT project_ibfk_1 FOREIGN KEY (owner_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE state CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB25166D1F9C');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB255D83CC1');
        $this->addSql('ALTER TABLE task CHANGE project_id project_id INT NOT NULL, CHANGE state_id state_id INT NOT NULL');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT task_ibfk_1 FOREIGN KEY (project_id) REFERENCES project (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT task_ibfk_2 FOREIGN KEY (state_id) REFERENCES state (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_project DROP FOREIGN KEY FK_77BECEE4A76ED395');
        $this->addSql('ALTER TABLE user_project DROP FOREIGN KEY FK_77BECEE4166D1F9C');
        $this->addSql('ALTER TABLE user_project ADD CONSTRAINT user_project_ibfk_1 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_project ADD CONSTRAINT user_project_ibfk_2 FOREIGN KEY (project_id) REFERENCES project (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_project RENAME INDEX idx_77becee4a76ed395 TO user_id');
        $this->addSql('ALTER TABLE user_project RENAME INDEX idx_77becee4166d1f9c TO project_id');
        $this->addSql('ALTER TABLE user_task DROP FOREIGN KEY FK_28FF97ECA76ED395');
        $this->addSql('ALTER TABLE user_task DROP FOREIGN KEY FK_28FF97EC8DB60186');
        $this->addSql('ALTER TABLE user_task ADD CONSTRAINT user_task_ibfk_1 FOREIGN KEY (task_id) REFERENCES task (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_task ADD CONSTRAINT user_task_ibfk_2 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_task RENAME INDEX idx_28ff97eca76ed395 TO user_id');
        $this->addSql('ALTER TABLE user_task RENAME INDEX idx_28ff97ec8db60186 TO task_id');
    }
}

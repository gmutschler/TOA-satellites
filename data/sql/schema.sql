CREATE TABLE attendee (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, has_main_ticket TINYINT(1) DEFAULT '0', INDEX user_id_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 ENGINE = innodb;
CREATE TABLE attendee_ticket (id BIGINT AUTO_INCREMENT, attendee_id BIGINT NOT NULL, ticket_id BIGINT NOT NULL, INDEX ticket_id_idx (ticket_id), INDEX attendee_id_idx (attendee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 ENGINE = innodb;
CREATE TABLE category (id BIGINT AUTO_INCREMENT, name VARCHAR(64), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 ENGINE = innodb;
CREATE TABLE event (id BIGINT AUTO_INCREMENT, category_id BIGINT NOT NULL, organiser_id BIGINT NOT NULL, title VARCHAR(64) NOT NULL, description text NOT NULL, paypal VARCHAR(128), start_date DATETIME, end_date DATETIME, start_hour TIME NOT NULL, end_hour TIME NOT NULL, logo VARCHAR(128), listing_color VARCHAR(8), test TINYINT(1) DEFAULT '0', moderated TINYINT(1) DEFAULT '0', synchronized TINYINT(1) DEFAULT '0', venue_name VARCHAR(64), venue_address VARCHAR(128) NOT NULL, venue_city VARCHAR(32) NOT NULL, venue_postal_code BIGINT, venue_latitude DECIMAL(10, 7), venue_longitude DECIMAL(10, 7), venue_eventbrite_id BIGINT, eventbrite_id BIGINT, eventbrite_logo_url VARCHAR(128), eventbrite_accesscode_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX category_id_idx (category_id), INDEX organiser_id_idx (organiser_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 ENGINE = innodb;
CREATE TABLE organiser (id BIGINT AUTO_INCREMENT, user_id BIGINT, name VARCHAR(64), description TEXT, logo VARCHAR(128), url VARCHAR(128), twitter VARCHAR(128), facebook VARCHAR(128), synchronized TINYINT(1) DEFAULT '0', eventbrite_id BIGINT, INDEX user_id_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 ENGINE = innodb;
CREATE TABLE ticket (id BIGINT AUTO_INCREMENT, event_id BIGINT NOT NULL, name VARCHAR(64), description TEXT, price FLOAT(18, 2), quantity_declared BIGINT NOT NULL, quantity_paid BIGINT, quantity_free BIGINT, eventbrite_id BIGINT, eventbrite_hidden_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX event_id_idx (event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 ENGINE = innodb;
CREATE TABLE token (id BIGINT AUTO_INCREMENT, name VARCHAR(127), token_key LONGTEXT, token_secret LONGTEXT, user_id BIGINT, expire BIGINT, params LONGTEXT, identifier VARCHAR(255), status VARCHAR(127), o_auth_version SMALLINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE attendee ADD CONSTRAINT attendee_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE attendee_ticket ADD CONSTRAINT attendee_ticket_ticket_id_ticket_id FOREIGN KEY (ticket_id) REFERENCES ticket(id);
ALTER TABLE attendee_ticket ADD CONSTRAINT attendee_ticket_attendee_id_attendee_id FOREIGN KEY (attendee_id) REFERENCES attendee(id);
ALTER TABLE event ADD CONSTRAINT event_organiser_id_organiser_id FOREIGN KEY (organiser_id) REFERENCES organiser(id);
ALTER TABLE event ADD CONSTRAINT event_category_id_category_id FOREIGN KEY (category_id) REFERENCES category(id);
ALTER TABLE organiser ADD CONSTRAINT organiser_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE ticket ADD CONSTRAINT ticket_event_id_event_id FOREIGN KEY (event_id) REFERENCES event(id);
ALTER TABLE token ADD CONSTRAINT token_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;

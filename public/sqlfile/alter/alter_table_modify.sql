SET foreign_key_checks = 0;
ALTER TABLE auth_group_role MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE auth_listmethod MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE auth_menu MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE auth_menu_group MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE auth_usergroup MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE auth_userlevel MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE auth_users MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE dttot MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE inventory_detail MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE inventory_header MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE log_a MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE log_b MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE m_airport MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE m_company MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE m_company_store MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE m_customer MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE m_customer_data MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE m_customer_type MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE m_customer_work MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE m_nationality MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE m_payment_type MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE m_transaction MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE m_transaction_date MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE m_valas MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE rate_daily MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE stock MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE stock_price_average MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE tr_detail MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE tr_header MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE trx_api_ap_get MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE trx_api_ap_log MODIFY COLUMN id BIGINT NOT NULL AUTO_INCREMENT;
SET foreign_key_checks = 1;
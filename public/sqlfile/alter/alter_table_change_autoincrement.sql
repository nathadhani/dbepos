SET foreign_key_checks = 0;
ALTER TABLE auth_group_role CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE auth_listmethod CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE auth_menu CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE auth_menu_group CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE auth_usergroup CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE auth_userlevel CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE auth_users CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE dttot CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE inventory_detail CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE inventory_header CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE log_a CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE log_b CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE m_store CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE m_customer CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE m_customer_data CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE m_customer_type CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE m_customer_work CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE m_nationality CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE m_payment_type CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE m_transaction CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE m_transaction_date CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE m_valas CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE rate_daily CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE stock CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE tr_detail CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE tr_header CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE tr_api_get CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;

SET foreign_key_checks = 0;
ALTER TABLE tr_api_log CHANGE id id BIGINT AUTO_INCREMENT;
SET foreign_key_checks = 1;
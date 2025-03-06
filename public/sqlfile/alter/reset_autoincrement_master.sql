SET  @num := 0;
UPDATE auth_group_role SET id = @num := (@num+1);
ALTER TABLE auth_group_role AUTO_INCREMENT = 1

SET  @num := 0;
UPDATE auth_listmethod SET id = @num := (@num+1);
ALTER TABLE auth_listmethod AUTO_INCREMENT = 1

SET  @num := 0;
UPDATE auth_menu SET id = @num := (@num+1);
ALTER TABLE auth_menu AUTO_INCREMENT = 1

SET  @num := 0;
UPDATE auth_menu_group SET id = @num := (@num+1);
ALTER TABLE auth_menu_group AUTO_INCREMENT = 1

SET  @num := 0;
UPDATE auth_usergroup SET id = @num := (@num+1);
ALTER TABLE auth_usergroup AUTO_INCREMENT = 1

SET  @num := 0;
UPDATE auth_userlevel SET id = @num := (@num+1);
ALTER TABLE auth_userlevel AUTO_INCREMENT = 1

SET  @num := 0;
UPDATE auth_users SET id = @num := (@num+1);
ALTER TABLE auth_users AUTO_INCREMENT = 1

SET  @num := 0;
UPDATE m_store SET id = @num := (@num+1);
ALTER TABLE m_store AUTO_INCREMENT = 1

SET  @num := 0;
UPDATE m_customer SET id = @num := (@num+1);
ALTER TABLE m_customer AUTO_INCREMENT = 1

SET  @num := 0;
UPDATE m_customer_data SET id = @num := (@num+1);
ALTER TABLE m_customer_data AUTO_INCREMENT = 1

SET  @num := 0;
UPDATE m_customer_type SET id = @num := (@num+1);
ALTER TABLE m_customer_type AUTO_INCREMENT = 1

SET  @num := 0;
UPDATE m_customer_work SET id = @num := (@num+1);
ALTER TABLE m_customer_work AUTO_INCREMENT = 1

SET  @num := 0;
UPDATE m_nationality SET id = @num := (@num+1);
ALTER TABLE m_nationality AUTO_INCREMENT = 1

SET  @num := 0;
UPDATE m_payment_type SET id = @num := (@num+1);
ALTER TABLE m_payment_type AUTO_INCREMENT = 1

SET  @num := 0;
UPDATE m_transaction SET id = @num := (@num+1);
ALTER TABLE m_transaction AUTO_INCREMENT = 1

SET  @num := 0;
UPDATE m_transaction_date SET id = @num := (@num+1);
ALTER TABLE m_transaction_date AUTO_INCREMENT = 1

SET  @num := 0;
UPDATE m_valas SET id = @num := (@num+1);
ALTER TABLE m_valas AUTO_INCREMENT = 1
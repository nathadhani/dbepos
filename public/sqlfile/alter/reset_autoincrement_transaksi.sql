-- truncate table tr_detail
-- delete from tr_header

-- truncate table log_b
-- delete from log_a

-- truncate table inventory_detail
-- delete from inventory_header

SET  @num := 0;
UPDATE m_exchange_rate SET id = @num := (@num+1);
ALTER TABLE m_exchange_rate AUTO_INCREMENT = 1

SET  @num := 0;
UPDATE stock SET id = @num := (@num+1);
ALTER TABLE stock AUTO_INCREMENT = 1

SET  @num := 0;
UPDATE tr_detail SET id = @num := (@num+1);
ALTER TABLE tr_detail AUTO_INCREMENT = 1

SET  @num := 0;
UPDATE tr_header SET id = @num := (@num+1);
ALTER TABLE tr_header AUTO_INCREMENT = 1
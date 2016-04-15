AlTER TABLE products ADD INDEX (pname);
  
DELIMITER $$
DROP TRIGGER IF EXISTS after_transactions_INSERT $$
CREATE TRIGGER after_transactions_INSERT 
    AFTER INSERT ON transactions
    FOR EACH ROW 
BEGIN
set @temp = (select inventory_amount from products where product_id=new.product_id);
if @temp-new.quantity<0 then
delete from transactions where order_num =  new.order_num; 
else
update products 
set inventory_amount = inventory_amount-new.quantity 
where product_id=new.product_id;
end if;
    
END$$
DELIMITER ;





#the codes are just for test trigger  
drop trigger before_transactions_INSERT;
select *
from products
where product_id = 30001;#22

INSERT INTO transactions VALUES ('10000103','42032','500020','30001',30,'20020');

update products set inventory_amount = 40 where product_id='30001';

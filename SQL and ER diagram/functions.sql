#customer sign in 
#get the max customer ID fisrt
select max(customer_id)
from customer;
#new customer ID = max + 1
#get the max address id 
select max(address_id)
from address;
#new address id = max + 1
INSERT INTO address VALUES ('new_address_id','street','city','state','zip_code');
#if the kind is home
INSERT INTO customer VALUES ('new_customer_id','cname','new_address_id','home','key');
INSERT INTO home VALUES ('new_customer_id','marriage_status','gender',age,income);
#if the kind is business
INSERT INTO customer VALUES ('new_customer_id','cname','new_address_id','business','key');
INSERT INTO business VALUES ('new_customer_id',com_annual_income);




#customer login
select c_key
from customer
where customer_id = 'id';


#product browser
select *
from products
where pname like '%word%';



#purchase activity
#store information
select *
from store;

#show store information
select *
from store;

#choose salespersons
select s_id,sname, job_title
from store, salespersons 
where store.store_id = salespersons.store_id and
	  store.store_id = '40001';


#get order_num
select max(order_num)
from transactions;

#new order_num = max +1
#insert table
INSERT INTO transactions VALUES ('new_order_num','date','s_id','product_id',quantity,'customer_id');
#trigger inventory_amount check!  show!!!!


#show order information
select *
from transactions
where order_num = 'new_order_num';

#show sales person information
select s_id, sname, address_id, email, job_title, store_id
from transactions natural join salespersons
where order_num = 'new_order_num';

#show store information
select distinct(store.store_id), store.address_id,s_manager, number_of_sperson, region_id 
from transactions, salespersons, store
where store.store_id = salespersons.store_id and transactions.s_id = salespersons.s_id
      and transactions.order_num = 'new_order_num';
      
#customer purchase history
select *
from transactions
where customer_id = 'id';




#salespersons
#log in 
select s_key
from salespersons
where s_id ='id';

#personal information
select *
from salespersons natural join address
where s_id = 'id';

#store and region information
select *
from salespersons, store, region
where store.store_id = salespersons.store_id and store.region_id = region.region_id
	  and salespersons.s_id = 'id';



#What are the aggregate sales and sales quatity of the products.
select pname, sum(quantity) as sales_quantity,  sum(quantity)*price as sales
from products natural join transactions
group by product_id;

#What are the top product categories.
select t.k as top_category
from(select temp.p_kind as k, sum(temp.sales) as s
      from (select pname, p_kind, sum(quantity)*price as sales
			from products natural join transactions
			group by product_id) as temp
      group by p_kind) as t
where t.s = (select max(t2.s)
			 from (select temp1.p_kind as k, sum(temp1.sales) as s
                   from (select pname, p_kind, sum(quantity)*price as sales
			             from products natural join transactions
			             group by product_id) as temp1
			  group by p_kind) as t2);
              
#How do the various regions compare by sales volume?
select rname, sum(Sales) as Sales
from (select s_id, sum(quantity*price) as Sales
      from transactions natural join salespersons natural join products
      group by s_id) as temp natural join store natural join region
group by region_id;


#Which  businesses are buying given products the most?
select customer_id as id, cname as name, sum(quantity*price) as purchase
from customer natural join business natural join transactions natural join products
group by customer_id
having purchase = (select max(temp.purchase)
				   from (select sum(quantity*price) as purchase
                         from customer natural join business natural join transactions natural join products
                         group by customer_id) as temp);
                         
                         
#which sales person have the highest salary?
select sname as name, salary
from salespersons
where salary = (select max(salary)
				from salespersons);

#sales person and their number of order, ordered by latter
select sname, count(*)
from salespersons natural join transactions
group by s_id
order by count(*) DESC;



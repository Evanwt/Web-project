create table address
	(address_id		varchar(8), 
	 street			varchar(100), 
	 city		    varchar(50),
	 state			varchar(50),
	 zip_code		varchar(30),
	 primary key (address_id)
	);


create table customer
	(customer_id		   varchar(8),
	 cname			       varchar(50), 
	 address_id		       varchar(8),
	 c_kind		           varchar(8),
     c_key                 varchar(20),
	 primary key (customer_id),
	 foreign key (address_id) references address(address_id)
		on delete set null
	);


create table business
	(customer_id		   varchar(8), 
	 com_annual_income     numeric(8,0), 
	 primary key (customer_id),
	 foreign key (customer_id) references customer(customer_id)
		on delete cascade
	);


create table home
	(customer_id		   varchar(8),
	 marriage_status	   varchar(12), 
	 gender		           varchar(8),
	 age		           numeric(3,0), 
	 income                numeric(7,0),
	 primary key (customer_id),
	 foreign key (customer_id) references customer(customer_id)
		on delete cascade
	);



create table products
	(product_id		   varchar(8), 
	 pname			   varchar(50), 
	 inventory_amount  numeric(9,0) check (quantity >= 0),
	 price		       numeric(5,2) check (price > 0),
	 p_kind		       varchar(30),
	 primary key (product_id)
	);


create table region
	(region_id     varchar(8), 
	 rname			varchar(50), 
	 r_manager		varchar(20),
	 primary key (region_id)
	);


create table store
	(store_id		     varchar(8), 
	 address_id	         varchar(8), 
	 s_manager		     varchar(20),
	 number_of_sperson	 numeric(2,0) check (number_of_sperson > 0),
	 region_id           varchar(8), 
	 primary key (store_id),
	 foreign key (address_id) references address(address_id)
	 	on delete set null,
	 foreign key (region_id)  references region(region_id)
		on delete set null
	);


create table salespersons
	(s_id		 varchar(8), 
	 sname		 varchar(50), 
	 address_id	 varchar(8),
	 email       varchar(20),
	 job_title   varchar(20),
	 store_id    varchar(8),
	 salary      numeric(7,0),
     s_key       varchar(20),
	 primary key (s_id),
	 foreign key (address_id) references address(address_id)
		on delete set null,
	 foreign key (store_id)   references store(store_id)
		on delete set null
	);


create table transactions
	(order_num		varchar(8), 
	 t_date			date, 
	 s_id		    varchar(8),
	 product_id		varchar(8),
	 quantity		numeric(4,0) check (quantity > 0),
	 customer_id    varchar(8),
	 primary key (order_num),
	 foreign key (s_id) references salespersons(s_id)
	    on delete set null,
	 foreign key (product_id) references products(product_id)
	    on delete set null,
	 foreign key (customer_id) references customer(customer_id)
		on delete set null
	);

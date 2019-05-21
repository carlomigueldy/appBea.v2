-- run the migrations first before altering the constraints of a table.

ALTER TABLE ppmp_items 
	ADD PRIMARY KEY (item_id, ppmp_id),
	ADD CONSTRAINT FK_item_id FOREIGN KEY (item_id) REFERENCES items (id),
	ADD CONSTRAINT FK_ppmp_id FOREIGN KEY (ppmp_id) REFERENCES ppmps (id);

ALTER TABLE app_details 
	ADD PRIMARY KEY (item_id, app_id),
	ADD CONSTRAINT FK_item_id FOREIGN KEY (item_id) REFERENCES items (id),
	ADD CONSTRAINT FK_app_id FOREIGN KEY (app_id) REFERENCES apps (id);

-- Sample datas.

INSERT INTO items (description, specification, unit)
VALUES ('Item One', 'Just a description', 'box'),
('Item One', 'Just a description', 'pair'),
('Item One', 'Just a description', 'gallon'),
('Item One', 'Just a description', 'pound'),
('Item One', 'Just a description', 'ream');

INSERT INTO mops (mop_name)
VALUES ('Direct Contracting'),
('Repeat Order'),
('Shopping'),
('Negotiated Procurement'),
('SUP');

INSERT INTO cost_centers (costcenter_name)
VALUES ('College of Computer Studies'),
('College of Arts and Social Sciences'),
('College of Science and Mathematics'),
('College of Business Administration and Accountancy'),
('College of Social Arts and Sciences'),
('College of Education'),
('College of Engineering and Technology');

INSERT INTO fund_sources (fundsource_name)
VALUES ('GAA'),('Income'),('Fiduciary');

INSERT INTO accounts (account_no)
VALUES ('1105'),('6088'),('2204');

INSERT INTO ppmps (costcenter_id, fundsource_id, account_id, mop_id, type, year)
VALUES (1, 3, 1, 2, 'Primary', '2019'),
(1, 1, 1, 4, 'Primary', '2019'),
(2, 3, 2, 5, 'Supplemental', '2018'),
(2, 2, 3, 3, 'Primary', '2018');

INSERT INTO ppmp_items (item_id, ppmp_id, quarter, quantity, unit_price, amount)
VALUES (1, 1, '1st Quarter', 20, 20.2, 404),
(2, 1, '2nd Quarter', 5, 65, 325),
(5, 1, '3rd Quarter', 15, 60.75, 911.25),
(4, 1, '3rd Quarter', 10, 25, 250),

(3, 2, '1st Quarter', 70, 100.25, 7017.5),
(4, 2, '2nd Quarter', 25, 67.5, 1687.5),
(1, 2, '2nd Quarter', 30, 70.5, 2115),

(2, 3, '1st Quarter', 100, 125.25, 12525),
(4, 3, '1st Quarter', 125, 70.95, 8868.75),
(5, 3, '4th Quarter', 45, 60.95, 2742.75),
(1, 3, '4th Quarter', 75, 50.5, 3787.5),

(1, 4, '3rd Quarter', 25, 35.65, 891.25),
(2, 4, '3rd Quarter', 35, 95.45, 3340.75);






-- Migrations

Schema::create('cost_centers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('costcenter_name', 128);
            $table->timestamps();
        });

Schema::create('mops', function (Blueprint $table) {
	$table->bigIncrements('id');
	$table->string('mop_name', 128);
	$table->timestamps();
});

Schema::create('fund_sources', function (Blueprint $table) {
	$table->bigIncrements('id');
	$table->string('fundsource_name');
	$table->timestamps();
});

Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('account_no', 128);
            $table->timestamps();
        });

		Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->string('specification');
            $table->string('unit');
            $table->timestamps();
        });

		Schema::create('ppmps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('costcenter_id');
            $table->unsignedInteger('fundsource_id');
            $table->unsignedInteger('account_id');
            $table->unsignedInteger('mop_id');
            $table->string('type', 128);
            $table->string('year', 6);
            $table->string('remark', 32)->default('Unconsolidated');
            $table->foreign('costcenter_id')->references('id')->on('cost_centers');
            $table->foreign('fundsource_id')->references('id')->on('fund_sources');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('mop_id')->references('id')->on('mops');
            $table->timestamps();
        });

		Schema::create('ppmp_items', function (Blueprint $table) {
            $table->integer('item_id');
            $table->integer('ppmp_id');
            $table->string('quarter');
            $table->integer('quantity');
            $table->double('unit_price', 8, 2);
            $table->double('amount', 8, 2);
            $table->timestamps();
        });
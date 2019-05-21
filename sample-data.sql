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
VALUES ('Chemicals', 'Laboratory Supply', 'box'),
('PC Monitor', '1920x1080 Resolution', 'piece'),
('Air-Conditioner', 'Inverter', 'device'),
('HP Printer', 'For the paperworks', 'box'),
('Long & Short Bondpapers', 'Resupply of bondpapers', 'ream');

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
VALUES 
(1, 3, 1, 2, 'Primary', '2018'),
(1, 1, 1, 4, 'Primary', '2018'),
(2, 3, 2, 5, 'Supplemental', '2018'),
(2, 1, 2, 5, 'Supplemental', '2018'),
(2, 1, 2, 5, 'Primary', '2018'),
(2, 2, 2, 5, 'Primary', '2019'),
(2, 2, 2, 5, 'Supplemental', '2019'),
(2, 3, 2, 5, 'Supplemental', '2019'),
(2, 2, 3, 3, 'Primary', '2019');

INSERT INTO ppmp_items (item_id, ppmp_id, quarter, quantity, unit_price, amount)
VALUES 

(1, 1, '1st Quarter', 20, 20.2, 404),
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

(2, 4, '1st Quarter', 100, 125.25, 12525),
(1, 4, '1st Quarter', 125, 70.95, 8868.75),
(3, 4, '4th Quarter', 45, 60.95, 2742.75),
(4, 4, '4th Quarter', 75, 50.5, 3787.5),

(1, 5, '1st Quarter', 100, 125.25, 12525),
(2, 5, '1st Quarter', 125, 70.95, 8868.75),
(3, 5, '4th Quarter', 45, 60.95, 2742.75),
(5, 5, '4th Quarter', 75, 50.5, 3787.5),

(2, 6, '1st Quarter', 70, 100.25, 7017.5),
(4, 6, '2nd Quarter', 25, 67.5, 1687.5),
(5, 6, '2nd Quarter', 30, 70.5, 2115),

(1, 7, '1st Quarter', 70, 100.25, 7017.5),
(2, 7, '2nd Quarter', 25, 67.5, 1687.5),
(3, 7, '2nd Quarter', 30, 70.5, 2115),

(4, 8, '1st Quarter', 70, 100.25, 7017.5),
(1, 8, '2nd Quarter', 25, 67.5, 1687.5),
(2, 8, '2nd Quarter', 30, 70.5, 2115),

(1, 9, '3rd Quarter', 25, 35.65, 891.25),
(2, 9, '3rd Quarter', 35, 95.45, 3340.75);

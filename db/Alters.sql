ALTER TABLE Ship_Loc
RENAME COLUMN location_str_address TO location_isPickup;

ALTER TABLE Ship_Loc
ALTER COLUMN location_isPickup TYPE BOOLEAN USING location_ispickup::boolean;

ALTER TABLE Ship_Loc
RENAME COLUMN location_isPickup TO ship_loc_is_pickup;

ALTER TABLE Ship_Loc
RENAME COLUMN city TO ship_loc_city;

ALTER TABLE Ship_Loc
RENAME COLUMN location_state TO ship_loc_state;

ALTER TABLE Ship_Loc
RENAME COLUMN location_zip TO ship_loc_zip;

ALTER TABLE Bid
ALTER COLUMN bid_contact_number TYPE numeric(10,0);

--------------------------------------------------
ALTER TABLE Ship_Loc
RENAME COLUMN Ship_Loc_isPickup TO ship_to_is_pickup;

ALTER TABLE Ship_Loc
RENAME COLUMN Ship_Loc_city TO ship_to_city;

ALTER TABLE Ship_Loc
RENAME COLUMN Ship_Loc_state TO ship_to_state;

ALTER TABLE Ship_Loc
RENAME COLUMN Ship_Loc_zip TO ship_to_zip;

ALTER TABLE Ship_Loc
DROP ship_loc_is_pickup;

ALTER TABLE Ship_Loc
Rename to Ship_to;

ALTER TABLE Ship_to
RENAME COLUMN id_location TO id_ship_to;
------------------------------------------------
ALTER TABLE ship_to  
DROP COLUMN ship_to_zip;

ALTER TABLE pickup_from  
DROP COLUMN pickup_from_zip;
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
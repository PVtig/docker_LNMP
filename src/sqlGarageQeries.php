<?php

const SQL_GET_GARAGES = '
    SELECT * FROM garage
';

const SQL_GET_GARAGE = '
    SELECT * FROM garage WHERE id = ?
';

const SQL_INSERT_GARAGE = '
    INSERT INTO garage ( number, capacity, manager_id, type) VALUES (:number, :capacity, :manager_id, :type)
';

const SQL_DELETE_GARAGE = '
DELETE FROM garage WHERE garage . id = ?
';

// const SQL_ID_LAST = '
//     INSERT INTO users ( users_id, carName) VALUES (?, ?)
// ';

const SQL_UPDATE_GARAGE_BY_ID = '
    UPDATE garage SET
        number = :number,
        capacity = :capacity,
        manager_id = :manager_id,
        type = :type
    WHERE
        id = :id    
';
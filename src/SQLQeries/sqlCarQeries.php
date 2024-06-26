<?php

const SQL_GET_CARS = '
    SELECT * FROM cars
';

const SQL_GET_CAR = '
    SELECT * FROM cars WHERE id = ?
';

const SQL_INSERT_CAR = '
    INSERT INTO cars (number, type, mileage, garage_id, status) VALUES (:number, :type, :mileage, :garage_id, :status)
';

const SQL_DELETE_CAR = '
DELETE FROM cars WHERE id = ?
';

// const SQL_ID_LAST = '
//     INSERT INTO users ( users_id, carName) VALUES (?, ?)
// ';

const SQL_UPDATE_CAR_BY_ID = '
    UPDATE cars SET
        users_id = :users_id,
        carName = :carName,
    WHERE
        id = :id    
';

const SQL_CHENGE_CAR_MILEAGE_BY_ID = '
    UPDATE cars SET
        mileage = :mileage
    WHERE
        id = :id    
';

const SQL_CHENGE_CAR_STATUS_BY_ID = '
    UPDATE cars SET
        status = :status
    WHERE
        id = :id    
';

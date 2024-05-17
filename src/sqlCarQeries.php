<?php

const SQL_GET_CARS = '
    SELECT * FROM cars
';

const SQL_GET_CAR = '
    SELECT * FROM cars WHERE id = ?
';

const SQL_INSERT_CAR = '
    INSERT INTO cars ( id, number, type, mileage, garage_id) VALUES (:id, :number, :type, :mileage, :garage_id)
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

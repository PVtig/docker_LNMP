<?php

const SQL_GET_DRIVERS = '
    SELECT * FROM drivers
';

const SQL_GET_CARS = '
    SELECT * FROM cars
';

const SQL_GET_DRIVER = '
    SELECT * FROM drivers WHERE id = ?
';

const SQL_GET_CAR = '
    SELECT * FROM cars WHERE id = ?
';

const SQL_INSERT_DRIVER = '
    INSERT INTO drivers ( name, surname, salary, car_id) VALUES (:name, :surname, :salary, :car_id)
';

const SQL_INSERT_CAR = '
    INSERT INTO cars ( id, number, type, mileage) VALUES (:id, :number, :type, :mileage)
';

const SQL_DELETE_DRIVER = '
DELETE FROM drivers WHERE drivers . id = ?
';

const SQL_DELETE_CAR = '
DELETE FROM cars WHERE id = ?
';

// const SQL_ID_LAST = '
//     INSERT INTO drivers ( drivers_id, carName) VALUES (?, ?)
// ';


const SQL_UPDATE_DRIVER_BY_ID = '
    UPDATE drivers SET
        name = :name,
        surname = :surname,
        salary = :salary,
        car_id = :car_id
    WHERE
        id = :id    
';

const SQL_UPDATE_CAR_BY_ID = '
    UPDATE cars SET
        drivers_id = :drivers_id,
        carName = :carName,
    WHERE
        id = :id    
';

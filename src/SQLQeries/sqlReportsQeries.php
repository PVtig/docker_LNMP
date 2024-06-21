<?php

const SQL_GET_REPORTS = '
    SELECT * FROM reports
';

const SQL_GET_REPORT = '
    SELECT * FROM reports WHERE id = ?
';

const SQL_GET_LAST_SERVICE_REPORT = '
    SELECT * FROM reports WHERE id IN (SELECT MAX(id) FROM reports WHERE type = ? AND car_id = ?)
';

const SQL_INSERT_REPORT = '
    INSERT INTO reports ( number, type, mileage, car_id, user_id) VALUES (:number, :type, :mileage, :car_id, :user_id)
';

const SQL_DELETE_REPORT = '
DELETE FROM reports WHERE reports . id = ?
';

// const SQL_ID_LAST = '
//     INSERT INTO reports ( reports_id, carName) VALUES (?, ?)
// ';


const SQL_UPDATE_REPORT_BY_ID = '
    UPDATE reports SET
        number = :number,
        type = :type,
        mileage = :mileage,
        car_id = :car_id,
        user_id = :user_id
    WHERE
        id = :id    
';

<?php

const SQL_GET_USERS = '
    SELECT * FROM users
';

const SQL_GET_USER = '
    SELECT * FROM users WHERE id = ?
';

const SQL_INSERT_USER = '
    INSERT INTO users ( name, surname, phone, email, salary, type) VALUES (:name, :surname, :phone, :email, :salary, :type)
';

const SQL_DELETE_USER = '
DELETE FROM users WHERE users . id = ?
';

// const SQL_ID_LAST = '
//     INSERT INTO users ( users_id, carName) VALUES (?, ?)
// ';

const SQL_UPDATE_USER_BY_ID = '
    UPDATE users SET
        name = :name,
        surname = :surname,
        salary = :salary,
        car_id = :car_id
    WHERE
        id = :id    
';
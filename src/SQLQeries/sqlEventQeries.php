<?php

const SQL_GET_EVENTS = '
    SELECT * FROM events
';

const SQL_GET_EVENT = '
    SELECT * FROM events WHERE id = ?
';

const SQL_INSERT_EVENT = '
    INSERT INTO events (title, description, date) VALUES (:title, :description, :date)
';

const SQL_DELETE_EVENT = '
DELETE FROM events WHERE id = ?
';

// const SQL_ID_LAST = '
//     INSERT INTO users ( users_id, carName) VALUES (?, ?)
// ';

const SQL_UPDATE_EVENT_BY_ID = '
    UPDATE events SET
        title = :title,
        description = :description,
        date = :date
    WHERE
        id = :id    
';

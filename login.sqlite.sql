DROP TABLE IF EXISTS logins;
CREATE TABLE logins (
    id INTEGER PRIMARY KEY NOT NULL,
    name text NOT NULL,
    pass text NOT NULL,
    created_at text NOT NULL,
    updated_at text NOT NULL
);

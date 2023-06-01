CREATE TABLE IF NOT EXISTS users (
    id VARCHAR(16) PRIMARY KEY,
    username VARCHAR(255) UNIQUE,
    mail NVARCHAR(256) UNIQUE,
    password VARCHAR(255),
    roleID INT(1)
);

CREATE TABLE IF NOT EXISTS articles (
    ID VARCHAR(16) PRIMARY KEY,
    summary VARCHAR(260),
    content LONGTEXT,
    views INT
);
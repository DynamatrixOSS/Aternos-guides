CREATE TABLE IF NOT EXISTS users (
    id VARCHAR(16) PRIMARY KEY,
    username VARCHAR(255) UNIQUE,
    mail NVARCHAR(256) UNIQUE,
    password VARCHAR(255),
    roleID INT(1)
    roleID INT(1),
    about VARCHAR(1000) DEFAULT 'I use Aternos Guides!'
);

CREATE TABLE IF NOT EXISTS articles (
    id VARCHAR(16) PRIMARY KEY,
    title VARCHAR(260) unique,
    summary VARCHAR(260),
    content LONGTEXT,
    views INT,
    approved bool default false
);
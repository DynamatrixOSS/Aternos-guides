CREATE TABLE IF NOT EXISTS authentication (
    UID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE,
    mail NVARCHAR(256) UNIQUE,
    password VARCHAR(255),
    roleID INT(1)
);

CREATE TABLE IF NOT EXISTS articles (
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR,
    summary VARCHAR(260)
    # add text, not clear which property to assign yet
)
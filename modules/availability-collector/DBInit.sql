CREATE TABLE Collection (
    collectionId INT AUTO INCREMENT,
    collectionName TEXT NOT NULL,
    beginDate TIMESTAMP NOT NULL,
    endDate TIMESTAMP NOT NULL,
    assignDate TIMESTAMP NOT NULL,
    dueDate TIMESTAMP NOT NULL,
    PRIMARY KEY(collectionId)
);

CREATE TABLE OpenShift (
    shiftId INT AUTO INCREMENT,
    beginTime TIME NOT NULL,
    endTime TIME NOT NULL,
    weekDay CHAR NOT NULL,
    beginDate TIMESTAMP NOT NULL,
    endDate TIMESTAMP NOT NULL,
    PRIMARY KEY (shiftId)
);

CREATE TABLE OpenTimes (
    shiftId INT,
    collectionId INT,
    FOREIGN KEY (shiftId) REFERENCES OpenShift(shiftId),
    FOREIGN KEY (collectionId) REFERENCES Collection(collectionId)
);

CREATE TABLE RecurringShift (
    shiftId INT AUTO INCREMENT,
    beginTime TIME NOT NULL,
    endTime TIME NOT NULL,
    weekDay CHAR NOT NULL,
    beginDate TIMESTAMP,
    endDate TIMESTAMP,
    PRIMARY KEY (shiftId)
);

CREATE TABLE UserShift (
    userId INT,
    shiftId INT,
    FOREIGN KEY (userId)
        /* [[[cog import SQLGlobals.py]]] */
        /* [[[end]]] */
);
/* [[[cog
    import cog
    ]]]*/
/* [[[end]]]*/
CREATE VIEW Users (userId, userName, userPassword, userFirstName, userLastName) AS
/* [[[cog
    cog.outl("SELECT A." + UserIdColumnName + ", A." + UserNameColumnName + ", A." + UserPasswordColumnName + ", A." + UserFirstNameColumnName + ", A." + UserLastNameColumnName)
    cog.outl("FROM " + UserTableName + " A;")
    ]]]*/
/* [[[end]]] */


CREATE TABLE Pages (
    pageId INT AUTO_INCREMENT,
    pageURL TEXT NOT NULL,
    pageName TEXT NOT NULL,
    pageDesc TEXT NOT NULL,
    tileImg TEXT NOT NULL,
    pageIdent TEXT,
    PRIMARY KEY (pageId)
);

CREATE TABLE Groups (
    groupId INT AUTO_INCREMENT,
    groupName TEXT NOT NULL,
    groupDesc TEXT NOT NULL,
    tileImg TEXT NOT NULL,
    bgColor TEXT,
    PRIMARY KEY (groupId)
);

CREATE TABLE GroupPages (
    pageId INT,
    groupId INT,
    FOREIGN KEY (pageId)
        REFERENCES Pages(pageId),
    FOREIGN KEY (groupId)
        REFERENCES Groups(groupId)
);

CREATE TABLE Settings (
    sKey VARCHAR(60) UNIQUE,
    sVal TEXT,
    PRIMARY KEY (sKey)
);

CREATE TABLE Clicks (
    pageId INT,
    userId INT,
    clickTime TIMESTAMP DEFAULT NOW(),
    FOREIGN KEY (pageId)
        REFERENCES Pages(pageId),
    FOREIGN KEY (userId)
        /* [[[cog cog.out("REFERENCES " + UserTableName + "(" + UserIdColumnName + ")")]]] */
        /* [[[end]]] */
);

CREATE TABLE Supervises (
    supervisorId INT,
    superviseeId INT,
    FOREIGN KEY (supervisorId)
        /* [[[cog cog.out("REFERENCES " + UserTableName + "(" + UserIdColumnName + "),")]]] */
        /* [[[end]]] */
    FOREIGN KEY (superviseeId)
        /* [[[cog cog.out("REFERENCES " + UserTableName + "(" + UserIdColumnName + ")")]]] */
        /* [[[end]]] */
);

CREATE TABLE Roles (
    roleId INT AUTO_INCREMENT,
    roleName TEXT NOT NULL,
    roleDesc TEXT NOT NULL,
    PRIMARY KEY (roleId)
);

CREATE TABLE UserRoles (
    userId INT,
    roleId INT,
    FOREIGN KEY (userId)
        /* [[[cog cog.out("REFERENCES " + UserTableName + "(" + UserIdColumnName + "),")]]] */
        /* [[[end]]] */
    FOREIGN KEY (roleId)
        REFERENCES Roles(roleId)
);

CREATE TABLE RoleAccess (
    roleId INT,
    pageId INT,
    FOREIGN KEY (roleId)
        REFERENCES Roles(roleId),
    FOREIGN KEY (pageId)
        REFERENCES Pages(pageId)
);

CREATE TABLE Notifications (
    noteId INT AUTO_INCREMENT,
    noteIdent TEXT,
    noteShort TEXT NOT NULL,
    noteLong TEXT NOT NULL,
    noteURL TEXT NOT NULL,
    PRIMARY KEY (noteId)
);

CREATE TABLE UserNotifications (
    userId INT,
    noteId INT,
    dismissed BOOLEAN,
    resolved BOOLEAN,
    FOREIGN KEY (userId)
        /* [[[cog cog.out("REFERENCES " + UserTableName + "(" + UserIdColumnName + "),")]]] */
        /* [[[end]]] */
    FOREIGN KEY (noteId)
        REFERENCES Notifications(noteId)
);
create table newsletter
(
    id       int auto_increment
        primary key,
    email    varchar(126)         not null,
    date_add datetime             not null,
    active   tinyint(1) default 1 not null
)
collate = utf8mb4_general_ci;



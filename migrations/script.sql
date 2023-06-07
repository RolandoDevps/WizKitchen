create table newsletter
(
    id       int auto_increment
        primary key,
    email    varchar(126)         not null,
    date_add datetime             not null,
    active   tinyint(1) default 1 not null
)
collate = utf8mb4_general_ci;

create table avis
(
    id        int auto_increment
        primary key,
    image_url varchar(255) null,
    author    varchar(255) not null,
    rating    int          null,
    subject   varchar(156) null,
    content   varchar(255) null,
    date_add  datetime     null
)
collate = utf8mb4_general_ci;




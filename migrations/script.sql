create table newsletter
(
    id       int auto_increment primary key,
    email    varchar(126)         not null,
    date_add datetime             not null,
    active   tinyint(1) default 1 not null
)collate = utf8mb4_general_ci;

create table avis
(
    id        int auto_increment primary key,
    image_url varchar(255) null,
    author    varchar(255) not null,
    rating    int          null,
    subject   varchar(156) null,
    content   varchar(255) null,
    date_add  datetime     null
)collate = utf8mb4_general_ci;

create table ateliers
(
    id          int auto_increment,
    label       VARCHAR(255) null,
    description TEXT         null,
    date_add    DATETIME     null,
    image_url   VARCHAR(255) null,
    constraint ateliers_pk primary key (id)
)collate = utf8mb4_general_ci;

-- ici on aura le script de creation de la table Producteur
create table producteurs
(
    id          int auto_increment,
    label       VARCHAR(255) null,
    description TEXT         null,
    date_add    DATETIME     null,
    image_url   VARCHAR(255) null,
    constraint producteurs_pk primary key (id)
)collate = utf8mb4_general_ci;

-- ici on aura le script de creation de la table Blog
create table blogs
(
    id          int auto_increment,
    label       VARCHAR(255) null,
    image_url   VARCHAR(255) null,
    description TEXT         null,
    is_like    boolean null,
    date_add  datetime     null,
    constraint blogs_pk primary key (id)
)collate = utf8mb4_general_ci;

create table reservations
(
    id          int auto_increment,
    -- add more attributes here
    date_add  datetime     null,
    constraint reservations_pk primary key (id)
)collate = utf8mb4_general_ci;



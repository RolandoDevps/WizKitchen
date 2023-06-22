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

NSERT INTO `avis` (`id`, `image_url`, `author`, `rating`, `subject`, `content`, `date_add`) VALUES
(1, '5.png', 'Maggie L', 4, 'Pas d’iUn gain de temps', '\"Le batch-cooking a complètement trans formé ma routine culinaire. Des repas savoureux, une organisation simplifiée et un gain de temps précieux. Je ne peux plus m\'en passer !\' ', '2023-06-21 09:35:04'),
(3, '6.png', 'William G', 5, 'Des plats équilibrés', 'Grâce au batch-cooking proposé par WIZKITCHEN , je redécouvre le plaisir de manger sainement sans passer des heures en cuisine. Une solution pratique et délicieuse pour des repas équilibrés au quotidien.', '2023-06-21 09:38:07'),
(4, '7.png', 'Jeanne T', 5, 'Économique et écologique !', 'Les services de batch-cooking de WIZKITCHEN ont révolutionné ma façon de cuisiner. Des plats délicieux prêts en un clin d\'œil, parfait pour les journées chargées ! ', '2023-06-21 09:43:02');

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



drop database if exists myjournal ;
create database myjournal;
use myjournal;

create table mj_user (
    id BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(50) not null,
    email varchar(200) not null,
    username varchar(200) NOT NULL,

    password_hash text not null,
    auth_key varchar(250),
    token varchar(250),
    type varchar(50),
    is_active boolean,

    creation_date datetime NOT NULL DEFAULT now(),

    UNIQUE(email),
    UNIQUE(username)
);

create table mj_user_settings (
    id BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user BIGINT(20) NOT NULL,

    FOREIGN KEY(user) REFERENCES mj_user(ID)
);

create table mj_category (
    id BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    description VARCHAR(200),
    creation_date datetime NOT NULL DEFAULT now()
);

create table mj_tag (
    id BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    creation_date datetime NOT NULL DEFAULT now()
);

create table mj_post (
    id BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    content text NOT NULL,
    author BIGINT(20) NOT NULL,
    category BIGINT(20) NOT NULL,
    creation_date datetime NOT NULL DEFAULT now(),

    FOREIGN KEY(author) REFERENCES mj_user(ID),
    FOREIGN KEY(category) REFERENCES mj_category(ID)
);

create table mj_post_tag (
    id BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    post_id BIGINT(20) NOT NULL,
    tag_id BIGINT(20) NOT NULL,

    FOREIGN KEY(post_id) REFERENCES mj_post(ID),
    FOREIGN KEY(tag_id) REFERENCES mj_tag(ID)
);


-- Adminer 4.8.1 MySQL 8.0.15 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `wf3_php_intermediaire_gaelle`;
CREATE DATABASE `wf3_php_intermediaire_gaelle` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `wf3_php_intermediaire_gaelle`;

DROP TABLE IF EXISTS `advert`;
CREATE TABLE `advert`
(
    `id`                  int(11)                                                 NOT NULL AUTO_INCREMENT,
    `title`               varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    `description`         varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    `postal_code`         int(11)                                                 NOT NULL,
    `city`                varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    `type`                varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    `price`               int(11)                                                 NOT NULL,
    `reservation_message` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 21
  DEFAULT CHARSET = utf8;

INSERT INTO `advert` (`id`, `title`, `description`, `postal_code`, `city`, `type`, `price`, `reservation_message`)
VALUES (1, 'titre1', 'description1', 34000, 'bordeaux', 'annonce', 500, 'reservation message1'),
       (2, 'titre2', 'description2', 35000, 'rennes', 'location', 1300, 'reservation message2'),
       (3, 'titre3', 'description3', 35000, 'rennes', 'vente', 150000, 'reservation message3'),
       (4, 'titre4', 'description4', 44000, 'Nantes', 'vente', 250000, 'reservation message4'),
       (5, 'titre5', 'description5', 75000, 'Paris', 'location', 2000, 'reservation message5'),
       (6, 'titre6', 'description6', 29000, 'Brest', 'vente', 300000, 'reservation message6'),
       (7, 'titre7', 'description7', 34000, 'bordeaux', 'location', 900, 'reservation message7'),
       (8, 'titre8', 'description8', 24000, 'Monpont', 'vente', 120000, 'reservation message8'),
       (9, 'titre9', 'description9', 22000, 'Dinan', 'location', 500, 'reservation message9'),
       (10, 'titre10', 'description10', 35000, 'rennes', 'location', 1500, 'reservation message10'),
       (11, 'titre11', 'description11', 35000, 'rennes', 'vente', 300, 'reservation message11'),
       (12, 'titre12', 'description12', 56000, 'vannes', 'location', 1000, 'reservation message12'),
       (13, 'titre13', 'description13', 56000, 'vannes', 'location', 1300, 'reservation message13'),
       (14, 'titre14', 'description14', 56000, 'vannes', 'vente', 300000, 'reservation message14'),
       (15, 'titre15', 'description15', 34000, 'bordeaux', 'vente', 400000, 'reservation message15'),
       (16, 'titre16', 'description16', 35000, 'rennes', 'vente', 300000, 'reservation message16'),
       (17, 'titre17', 'description17', 56420, 'plumelec', 'location', 700, 'reservation message17'),
       (18, 'titre18', 'description18', 56420, 'cruguel', 'vente', 200000, 'reservation message18'),
       (19, 'titre19', 'description19', 56120, 'josselin', 'vente', 350000, 'reservation message19'),
       (20, 'titre20', 'description20', 35000, 'rennes', 'location', 1300, 'reservation message20');

-- 2022-03-02 09:01:49

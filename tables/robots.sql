-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: localhost
-- Létrehozás ideje: 2023. Feb 23. 11:54
-- Kiszolgáló verziója: 5.7.41
-- PHP verzió: 8.0.28

CREATE DATABASE robot_fight;
--
-- Adatbázis: `robot_fight`
-- --------------------------------------------------------
-- Tábla szerkezet ehhez a táblához `robots`
--
CREATE TABLE `robots` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` set('brawler','rouge','assault') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `power` int(5) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
--
-- A tábla indexei `robots`
--
ALTER TABLE `robots`
  ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT a táblához `robots`
--
ALTER TABLE `robots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

INSERT INTO `robots` (`id`, `name`, `type`, `power`, `created_at`, `updated_at`) VALUES
(1, 'Minotaur', 'rouge', 3, '2023-02-22 17:51:15', '2023-02-22 18:00:27'),
(2, 'Cobalt', 'brawler', 3, '2023-02-22 17:57:28', '2023-02-22 18:00:35'),
(3, 'Chomp', 'rouge', 5, '2023-02-22 18:01:37', '2023-02-22 18:01:37'),
(4, 'Warrior Dragon', 'assault', 7, '2023-02-22 18:03:54', '2023-02-22 18:03:54'),
(5, 'IceWave', 'rouge', 4, '2023-02-22 18:04:52', '2023-02-22 18:04:52'),
(6, 'Huge', 'assault', 9, '2023-02-22 18:06:00', '2023-02-22 18:06:00'),
(7, 'Uppercuat', 'brawler', 6, '2023-02-22 18:08:19', '2023-02-22 18:08:19'),
(8, 'Nightmare', 'brawler', 4, '2023-02-22 18:11:25', '2023-02-22 18:11:25'),
(9, 'Bombshell', 'rouge', 8, '2023-02-22 18:13:19', '2023-02-22 18:13:19'),
(10, 'Complete', 'brawler', 10, '2023-02-22 18:14:26', '2023-02-22 18:14:26'),
(11, 'Mikrobi', 'rouge', 10, '2023-02-22 21:33:40', '2023-02-22 21:33:40'),
(12, 'R2d2', 'assault', 1, '2023-02-22 21:35:38', '2023-02-22 21:35:38'),
(13, 'C3PO', 'rouge', 2, '2023-02-22 22:27:48', '2023-02-22 22:27:48'),
(14, 'Microbi_01', 'brawler', 20, '2023-02-22 22:28:20', '2023-02-23 12:23:25'),
(15, 'weqwefqer', 'rouge', 92, '2023-02-23 12:50:37', '2023-02-23 12:50:37');

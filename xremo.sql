-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 03 Des 2017 pada 06.13
-- Versi Server: 5.6.14
-- Versi PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `xremo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `academics`
--

CREATE TABLE IF NOT EXISTS `academics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `university_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `degree_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `degree_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qualification_level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `academics_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `academics`
--

INSERT INTO `academics` (`id`, `user_id`, `university_name`, `degree_name`, `degree_description`, `qualification_level`, `date`, `created_at`, `updated_at`, `start_date`, `end_date`) VALUES
(9, 28, 'University of Alabama', 'Degree in Hot Cakes', 'Cool', '', NULL, '2017-06-19 23:46:49', '2017-06-19 23:46:49', NULL, NULL),
(11, 28, 'Testinginging', 'testing', 'testinging', '', NULL, '2017-06-20 20:23:14', '2017-07-04 20:48:41', '2013-12-01', '2017-12-01'),
(14, 28, 'TEST', ' Bbubba', 'Dada\r\n', '', NULL, '2017-07-04 20:05:14', '2017-07-04 21:01:21', '2009-09-01', '2012-11-01'),
(17, 54, 'Bina Nusantara', 'Computer science', 'Study in the field of my passion', 'Bachelor degree', NULL, NULL, NULL, '2007-01-01', '2013-01-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `achievement`
--

CREATE TABLE IF NOT EXISTS `achievement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `achievement_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `achievement_description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `achievement`
--

INSERT INTO `achievement` (`id`, `user_id`, `achievement_name`, `start_date`, `end_date`, `achievement_description`) VALUES
(1, 54, 'Test Achievement', '2017-11-14', '2017-11-14', 'additional achievement');

-- --------------------------------------------------------

--
-- Struktur dari tabel `applieds`
--

CREATE TABLE IF NOT EXISTS `applieds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `job_position_id` int(10) unsigned NOT NULL,
  `jobseeker_cv_id` int(10) unsigned NOT NULL,
  `coverletter` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'new',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=59 ;

--
-- Dumping data untuk tabel `applieds`
--

INSERT INTO `applieds` (`id`, `user_id`, `job_position_id`, `jobseeker_cv_id`, `coverletter`, `created_at`, `updated_at`, `status`) VALUES
(1, 3, 1, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'new'),
(2, 9, 6, 0, 'hi i would like to try out!', '2016-01-13 09:44:11', '2016-01-28 07:18:25', 'new'),
(7, 2, 6, 7, 'this is my cover letter', '2016-01-13 09:58:33', '2016-01-13 09:58:33', 'new'),
(8, 32, 115, 4, 'theres a lot of things we want to know and do. so we do.', '2016-03-28 06:19:44', '2017-04-18 20:29:11', 'withdraw'),
(9, 9, 116, 2, 'teste', '2016-05-05 08:46:13', '2016-05-05 08:46:13', 'new'),
(10, 28, 116, 0, 'aslkjfaslkjf', '2017-04-02 20:27:51', '2017-04-02 20:27:51', 'new'),
(11, 32, 11, 0, '', '2017-04-18 20:26:52', '2017-04-18 20:26:52', 'new'),
(12, 28, 121, 0, '', '2017-06-14 21:48:38', '2017-06-14 21:48:38', 'new'),
(13, 28, 115, 0, '', '2017-06-28 00:02:00', '2017-06-28 00:02:00', 'new'),
(56, 54, 1, 0, '', '2017-12-01 16:25:46', '2017-12-01 16:25:46', 'new'),
(58, 54, 127, 0, '', '2017-12-01 16:30:21', '2017-12-01 16:30:21', 'withdraw');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bio_meta`
--

CREATE TABLE IF NOT EXISTS `bio_meta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `meta_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `bio_meta`
--

INSERT INTO `bio_meta` (`id`, `meta_type`, `created_at`, `updated_at`) VALUES
(1, 'academics', NULL, NULL),
(2, 'non academics', NULL, NULL),
(3, 'experiences', NULL, NULL),
(4, 'skills', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `excerpt` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `body`, `created_at`, `updated_at`, `excerpt`, `tags`, `author`) VALUES
(3, 'This is a long one', '<p>The&nbsp;<strong>Monkey</strong>&nbsp;(<strong><a href="https://en.wiktionary.org/wiki/%E7%8C%B4" title="wiktionary:猴">猴</a></strong>) is the ninth of the 12-year cycle of&nbsp;<a href="https://en.wikipedia.org/wiki/Animal" title="Animal">animals</a>&nbsp;which appear in the&nbsp;<a href="https://en.wikipedia.org/wiki/Chinese_zodiac" title="Chinese zodiac">Chinese zodiac</a>&nbsp;related to the&nbsp;<a href="https://en.wikipedia.org/wiki/Chinese_calendar" title="Chinese calendar">Chinese calendar</a>. The&nbsp;<strong>Year of the&nbsp;<a href="https://en.wikipedia.org/wiki/Monkey" title="Monkey">Monkey</a></strong>&nbsp;is associated with the&nbsp;<a href="https://en.wikipedia.org/wiki/Earthly_Branches" title="Earthly Branches">Earthly Branch</a>&nbsp;symbol&nbsp;<a href="https://en.wiktionary.org/wiki/%E7%94%B3" title="wikt:申">申</a>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border="1">\r\n	<tbody>\r\n		<tr>\r\n			<td>Earthly Branch of Birth Year:</td>\r\n			<td>Shen</td>\r\n		</tr>\r\n		<tr>\r\n			<td>The Five Elements:</td>\r\n			<td>Metal (Jin)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Yin Yang:</td>\r\n			<td>Yang</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Lunar Month:</td>\r\n			<td>Seventh</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Lucky Numbers:</td>\r\n			<td>1, 7, 8; Avoid: 2, 5, 9</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Lucky Flowers:</td>\r\n			<td>chrysanthemum</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Lucky Colors:</td>\r\n			<td>white, golden, blue; Avoid: red, black, gray, dark coffee</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '2016-02-11 08:45:39', '2016-02-11 08:45:39', 'The Monkey (猴) is the ninth of the 12-year cycle of animals which appear in the Chinese zodiac related to the Chinese calendar. The Year of the Monkey is associated with the Earthly Branch symbol 申.', '', 'Xremo'),
(5, 'Enim aut consequatur ut quae occaecat tenetur perferendis consequatur dolor', '<p>Nulla dolor cupiditate sapiente quo in quae non sit<strong>, in voluptatem ex in porro nemo assumenda.</strong></p>\r\n', '2016-02-11 08:49:54', '2016-02-11 08:49:54', 'Nulla dolor cupiditate sapiente quo in quae non sit, in voluptatem ex in porro nemo assumenda.', '', 'Xremo'),
(6, 'test', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '2017-04-24 19:43:32', '2017-04-24 19:43:32', 'test', '', 'test'),
(7, 'test', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '2017-04-24 19:43:32', '2017-04-24 19:43:32', 'test', '', 'test'),
(8, 'Enim aut consequatur ut quae occaecat tenetur perferendis consequatur dolor', '<p>Nulla dolor cupiditate sapiente quo in quae non sit<strong>, in voluptatem ex in porro nemo assumenda.</strong></p>\r\n', '2016-02-11 08:49:54', '2016-02-11 08:49:54', 'Nulla dolor cupiditate sapiente quo in quae non sit, in voluptatem ex in porro nemo assumenda.', '', 'Xremo'),
(9, 'This is a long one', '<p>The&nbsp;<strong>Monkey</strong>&nbsp;(<strong><a href="https://en.wiktionary.org/wiki/%E7%8C%B4" title="wiktionary:猴">猴</a></strong>) is the ninth of the 12-year cycle of&nbsp;<a href="https://en.wikipedia.org/wiki/Animal" title="Animal">animals</a>&nbsp;which appear in the&nbsp;<a href="https://en.wikipedia.org/wiki/Chinese_zodiac" title="Chinese zodiac">Chinese zodiac</a>&nbsp;related to the&nbsp;<a href="https://en.wikipedia.org/wiki/Chinese_calendar" title="Chinese calendar">Chinese calendar</a>. The&nbsp;<strong>Year of the&nbsp;<a href="https://en.wikipedia.org/wiki/Monkey" title="Monkey">Monkey</a></strong>&nbsp;is associated with the&nbsp;<a href="https://en.wikipedia.org/wiki/Earthly_Branches" title="Earthly Branches">Earthly Branch</a>&nbsp;symbol&nbsp;<a href="https://en.wiktionary.org/wiki/%E7%94%B3" title="wikt:申">申</a>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border="1">\r\n	<tbody>\r\n		<tr>\r\n			<td>Earthly Branch of Birth Year:</td>\r\n			<td>Shen</td>\r\n		</tr>\r\n		<tr>\r\n			<td>The Five Elements:</td>\r\n			<td>Metal (Jin)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Yin Yang:</td>\r\n			<td>Yang</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Lunar Month:</td>\r\n			<td>Seventh</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Lucky Numbers:</td>\r\n			<td>1, 7, 8; Avoid: 2, 5, 9</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Lucky Flowers:</td>\r\n			<td>chrysanthemum</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Lucky Colors:</td>\r\n			<td>white, golden, blue; Avoid: red, black, gray, dark coffee</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '2016-02-11 08:45:39', '2016-02-11 08:45:39', 'The Monkey (猴) is the ninth of the 12-year cycle of animals which appear in the Chinese zodiac related to the Chinese calendar. The Year of the Monkey is associated with the Earthly Branch symbol 申.', '', 'Xremo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `countries`
--

INSERT INTO `countries` (`id`, `name`, `country_code`, `created_at`, `updated_at`) VALUES
(3, 'Malaysia', 'MYS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Phillipines', 'PHL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Indonesia', 'IDN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Thailand', 'THD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Singapore', 'SIN', '2017-11-07 17:00:00', '2017-11-07 17:00:00'),
(8, 'Vietname', 'VNM', '2017-11-07 17:00:00', '2017-11-07 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cv_accesses`
--

CREATE TABLE IF NOT EXISTS `cv_accesses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employer_id` int(10) unsigned NOT NULL,
  `jobseeker_id` int(10) unsigned NOT NULL,
  `expiry_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cv_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `cv_accesses`
--

INSERT INTO `cv_accesses` (`id`, `employer_id`, `jobseeker_id`, `expiry_date`, `created_at`, `updated_at`, `cv_id`) VALUES
(8, 2, 0, '2016-06-14', '2016-05-15 03:46:12', '2016-05-15 03:46:12', 9),
(9, 2, 0, '2016-06-14', '2016-05-15 04:02:36', '2016-05-15 04:02:36', 1),
(10, 2, 0, '2016-06-14', '2016-05-15 04:02:55', '2016-05-15 04:02:55', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `education_levels`
--

CREATE TABLE IF NOT EXISTS `education_levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `education_levels`
--

INSERT INTO `education_levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'School', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Certificate', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Diploma', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Degree', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Masters', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'PhD', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `employment_types`
--

CREATE TABLE IF NOT EXISTS `employment_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `employment_types`
--

INSERT INTO `employment_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Full Time', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Part Time', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Contract', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Temporary', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Internship', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Volunteer', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `experiences`
--

CREATE TABLE IF NOT EXISTS `experiences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `experiences_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `experiences`
--

INSERT INTO `experiences` (`id`, `user_id`, `title`, `description`, `start_date`, `end_date`, `created_at`, `updated_at`, `company_name`) VALUES
(1, 28, 'Job Position', 'Description testing Description testing Description testing Description testing Description testing Description testing Description testing Description testing Description testing Description testing Description testing Description testing Description tes\n \nDescription testing Description testing Description testing Description testing Description testing Description testing Description testing Description testing Description testing Description testing Description testing Description testing Description tes\n \n', '2017-12-01', '2017-12-01', '2017-06-22 05:35:56', '2017-07-04 21:10:28', 'company 4'),
(2, 28, 'Something', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '2017-11-01', '2017-11-01', '2017-06-22 22:29:07', '2017-07-04 21:10:50', 'Company Name 3'),
(3, 28, 'Test', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '0000-00-00', '0000-00-00', '2017-06-28 23:20:15', '2017-07-04 22:57:07', 'Company Name 3444'),
(6, 0, 'Responsive', 'Description', '2017-12-01', '2017-12-01', '2017-07-04 22:53:00', '2017-07-04 22:53:00', 'Test'),
(7, 0, 'a', 'a', '2017-04-01', '2017-12-01', '2017-07-04 22:54:10', '2017-07-04 22:54:10', 'a'),
(8, 54, 'Elabram Web Developer', 'Elabram as web developer', '2013-01-01', '2015-01-01', '2017-11-13 17:00:00', '2017-11-13 17:00:00', 'Elabram'),
(9, 0, '0', '0', '0000-00-00', '0000-00-00', NULL, NULL, NULL),
(10, 0, '0', '0', '0000-00-00', '0000-00-00', NULL, NULL, NULL),
(11, 0, 'XREMO Test', 'Test', '0000-00-00', '0000-00-00', NULL, NULL, NULL),
(12, 54, 'Xremo - profile page with php', 'test', '2017-02-01', '1970-01-01', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `forex`
--

CREATE TABLE IF NOT EXISTS `forex` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `forex`
--

INSERT INTO `forex` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'MYR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'USD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'SG', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `full_monthly_reports`
--

CREATE TABLE IF NOT EXISTS `full_monthly_reports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date_purchase` date DEFAULT NULL,
  `invoice_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company_info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `package_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `balance` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `gst` decimal(10,2) DEFAULT NULL,
  `total` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `industries`
--

CREATE TABLE IF NOT EXISTS `industries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=59 ;

--
-- Dumping data untuk tabel `industries`
--

INSERT INTO `industries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Accounting / Audit / Tax Services', NULL, NULL),
(2, 'Advertising / Marketing / Promotion / PR', NULL, NULL),
(3, 'Aerospace / Aviation / Airline', NULL, NULL),
(4, 'Agricultural / Plantation / Poultry / Fisheries', NULL, NULL),
(5, 'Apparel', NULL, NULL),
(6, 'Architectural Services / Interior Designing', NULL, NULL),
(7, 'Arts / Design / Fashion', NULL, NULL),
(8, 'Automobile / Automotive Ancillary / Vehicle', NULL, NULL),
(9, 'Banking / Financial Services', NULL, NULL),
(10, 'BioTechnology / Pharmaceutical / Clinical research', NULL, NULL),
(11, 'Call Center / IT-Enabled Services / BPO', NULL, NULL),
(12, 'Chemical / Fertilizers / Pesticides', NULL, NULL),
(13, 'Computer / Information Technology (Hardware)', NULL, NULL),
(14, 'Computer / Information Technology (Software)', NULL, NULL),
(15, 'Construction / Building / Engineering', NULL, NULL),
(16, 'Consulting (Business & Management)', NULL, NULL),
(17, 'Consulting (IT, Science, Engineering & Technical', NULL, NULL),
(18, 'Consumer Products / FMCG', NULL, NULL),
(19, 'Education', NULL, NULL),
(20, 'Electrical & Electronics', NULL, NULL),
(21, 'Entertainment / Media', NULL, NULL),
(22, 'Environment / Health / Safety', NULL, NULL),
(23, 'Exhibitions / Event management / MICE', NULL, NULL),
(24, 'Food & Beverage / Catering / Restaurant', NULL, NULL),
(25, 'Gems / Jewellery', NULL, NULL),
(26, 'General & Wholesale Trading', NULL, NULL),
(27, 'Government / Defence', NULL, NULL),
(28, 'Grooming / Beauty / Fitness', NULL, NULL),
(29, 'Healthcare / Medical', NULL, NULL),
(30, 'Heavy Industrial / Machinery / Equipment', NULL, NULL),
(31, 'Hotel / Hospitality', NULL, NULL),
(32, 'Human Resources Management / Consulting', NULL, NULL),
(33, 'Insurance', NULL, NULL),
(34, 'Journalism', NULL, NULL),
(35, 'Law / Legal', NULL, NULL),
(36, 'Library / Museum', NULL, NULL),
(37, 'Manufacturing / Production', NULL, NULL),
(38, 'Marine / Aquaculture', NULL, NULL),
(39, 'Mining', NULL, NULL),
(40, 'Non-Profit Organisation / Social Services / NGOServices / NGO', NULL, NULL),
(41, 'Oil / Gas / Petroleum', NULL, NULL),
(42, 'Polymer / Plastic / Rubber / Tyres', NULL, NULL),
(43, 'Printing / Publishing', NULL, NULL),
(44, 'Property / Real Estate', NULL, NULL),
(45, 'R&D', NULL, NULL),
(46, 'Retail / Merchandise', NULL, NULL),
(47, 'Science & Technology', NULL, NULL),
(48, 'Security / Law Enforcement', NULL, NULL),
(49, 'Semiconductor/Wafer Fabrication', NULL, NULL),
(50, 'Sports', NULL, NULL),
(51, 'Stockbroking / Securities', NULL, NULL),
(52, 'Telecommunication', NULL, NULL),
(53, 'Textiles / Garment', NULL, NULL),
(54, 'Tobacco', NULL, NULL),
(55, 'Transportation / Logistics', NULL, NULL),
(56, 'Travel / Tourism', NULL, NULL),
(57, 'Utilities / Power', NULL, NULL),
(58, 'Wood / Fibre / Paper', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventories`
--

CREATE TABLE IF NOT EXISTS `inventories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `service_item_id` int(10) unsigned NOT NULL,
  `item_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `expiry_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `package_user_id` int(10) unsigned NOT NULL,
  `batch_no` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `neverexpires` tinyint(1) NOT NULL DEFAULT '0',
  `operation_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `inventories`
--

INSERT INTO `inventories` (`id`, `user_id`, `service_item_id`, `item_type`, `quantity`, `amount_paid`, `expiry_date`, `created_at`, `updated_at`, `package_user_id`, `batch_no`, `neverexpires`, `operation_code`) VALUES
(1, 2, 1, 'job_post', 8, '16.06', '2016-06-19', '2016-06-03 19:42:07', '2016-06-03 19:42:07', 41, '20160000000001', 0, 'post_job'),
(2, 2, 2, 'unlock_cv', 4, '4.01', '2016-06-19', '2016-06-03 19:42:07', '2016-06-03 19:42:07', 42, '20160000000001', 0, 'unlock_cv'),
(3, 2, 3, 'special_post', 10, '5.00', '2016-06-19', '2016-06-03 19:42:07', '2016-06-03 19:42:07', 43, '20160000000001', 0, ''),
(4, 2, 1, 'job_post', 8, '16.00', '0000-00-00', '2016-06-03 22:32:13', '2016-06-03 22:32:13', 34, '20160000000002', 1, 'post_job'),
(5, 2, 2, 'unlock_cv', 4, '4.00', '0000-00-00', '2016-06-03 22:32:13', '2016-06-03 22:32:13', 35, '20160000000002', 1, 'unlock_cv'),
(6, 2, 3, 'special_post', 6, '3.00', '0000-00-00', '2016-06-03 22:32:13', '2016-06-03 22:32:13', 36, '20160000000002', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobseeker_cv`
--

CREATE TABLE IF NOT EXISTS `jobseeker_cv` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `preview_file` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `jobseeker_cv`
--

INSERT INTO `jobseeker_cv` (`id`, `user_id`, `name`, `filename`, `created_at`, `updated_at`, `preview_file`) VALUES
(1, 9, '', '9_fbdab012a6b8dd7ae9695ea2d7acc83deee356af.pdf', '2015-11-15 09:12:52', '2015-11-15 09:12:52', ''),
(2, 9, '', '9_babff934d392c9221b34cccce16bf0b78926bddd.pdf', '2015-11-17 08:30:26', '2015-11-17 08:30:26', '9_babff934d392c9221b34cccce16bf0b78926bddd.jpg'),
(3, 9, '', '9_0597476ae92108ab6d0e42fd6c181100ba37bfcd.pdf', '2015-11-17 08:35:28', '2015-11-17 08:35:28', '9_0597476ae92108ab6d0e42fd6c181100ba37bfcd.jpg'),
(4, 9, '', '9_bcab169d7182b6d5d48074beb62cde22fd3e8de6.pdf', '2015-11-17 08:35:48', '2015-11-17 08:35:48', '9_bcab169d7182b6d5d48074beb62cde22fd3e8de6.jpg'),
(5, 9, '', '9_edfbff3471c1310d84afd6ed86e9bd3fe3fa4117.pdf', '2015-11-17 08:37:34', '2015-11-17 08:37:34', '9_edfbff3471c1310d84afd6ed86e9bd3fe3fa4117.jpg'),
(7, 9, '', '9_95aa43a2e36ecb2e67b47011a5af19ec2043fafd.pdf', '2016-02-16 08:10:57', '2016-02-16 08:10:57', ''),
(8, 9, '', '9_d357e75f44bfcca98cb2af4e19c967b17348b3ce.pdf', '2016-02-16 08:11:44', '2016-02-16 08:11:44', ''),
(9, 32, '', '9_ca9da8104ebcab8db9fc4553086f9b25e605a02f.pdf', '2016-04-09 19:34:37', '2016-04-09 19:34:37', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobseeker_education`
--

CREATE TABLE IF NOT EXISTS `jobseeker_education` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `level_id` int(10) unsigned NOT NULL,
  `university` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `field_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `graduation_date` date NOT NULL,
  `result` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `jobseeker_education`
--

INSERT INTO `jobseeker_education` (`id`, `user_id`, `level_id`, `university`, `field_name`, `graduation_date`, `result`, `created_at`, `updated_at`) VALUES
(1, 9, 2, 'Unitar', 'IT', '2005-01-01', '3.5', '0000-00-00 00:00:00', '2016-01-20 05:55:53'),
(2, 32, 0, 'The University of Manchester', 'Bsc in MicroComputing Analysis', '0000-00-00', '', '2017-04-12 20:40:49', '2017-04-12 20:42:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobseeker_experience`
--

CREATE TABLE IF NOT EXISTS `jobseeker_experience` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `position` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_current` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `jobseeker_experience`
--

INSERT INTO `jobseeker_experience` (`id`, `user_id`, `position`, `company_name`, `from`, `to`, `description`, `created_at`, `updated_at`, `is_current`) VALUES
(5, 9, 'Ninjo', 'Company 5', '2015-02-01', '2016-02-01', '', '2015-11-30 05:30:11', '2016-02-14 08:24:11', 0),
(6, 9, 'Offer', 'NoCasess', '2001-08-01', '2005-04-01', '', '2015-12-07 06:34:06', '2016-01-05 10:00:16', 0),
(7, 9, 'In nisi et expedita ', 'Oliver Tanner', '2013-01-01', '1997-11-01', '', '2016-01-05 09:57:05', '2016-01-05 09:57:05', 0),
(8, 9, 'Current Position', 'Current Company', '2009-03-01', '2016-02-01', '', '2016-02-14 08:24:11', '2016-02-14 08:24:11', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobseeker_profiles`
--

CREATE TABLE IF NOT EXISTS `jobseeker_profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `overview` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `postcode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `jobseeker_profiles`
--

INSERT INTO `jobseeker_profiles` (`id`, `user_id`, `overview`, `created_at`, `updated_at`, `address`, `postcode`, `city`, `state_id`, `country_id`, `occupation`) VALUES
(4, 9, '<p>Mark has been helping agencies &amp; interesting startups to solve issues throughout his career. He uses effective approaches that help people think, solve problems, and make decisions accurately. Prior to his User Experience Design background, he built websites &amp; apps based on ideas, digital marketing insights, analytics studies &amp; user behavioural research. Specialises in UX/UI, web design &amp; front-end coding. He&#39;s passionate in creating creative, crazy &amp; wild concept &amp; implementing them into projects. He co-founded Pixeller Concept, an agency powered by a team of passionate people which helps business owners run their digital platforms on a long run. Believes that design shouldn&rsquo;t be only pretty, but sustainable while meeting the right goal.</p>\r\n', '2015-11-15 00:26:56', '2016-02-13 06:23:24', '', '', '', 16, NULL, NULL),
(5, 32, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i', '2017-04-12 20:16:34', '2017-04-18 19:29:41', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobseeker_video`
--

CREATE TABLE IF NOT EXISTS `jobseeker_video` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `video_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `video_link` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `jobseeker_video`
--

INSERT INTO `jobseeker_video` (`id`, `user_id`, `video_name`, `video_link`, `description`, `created_at`, `updated_at`) VALUES
(3, 9, 'Padamkan lampu', 'qd4fu59GJaQ', '', '2015-11-25 10:04:33', '2015-11-25 10:04:33'),
(4, 9, 'Mistikus Cinta', 'cJNx7sJUpF0', '', '2016-02-13 07:49:47', '2016-02-13 07:49:47'),
(5, 32, 'Hot Sauce', '3eXwVZnXRDI', '', '2017-04-17 22:48:33', '2017-04-17 22:48:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_positions`
--

CREATE TABLE IF NOT EXISTS `job_positions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `position_level_id` int(10) unsigned NOT NULL,
  `employment_type_id` int(10) unsigned NOT NULL,
  `years_of_experience` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `position_specialization_id` int(10) unsigned NOT NULL,
  `qualifications` text COLLATE utf8_unicode_ci NOT NULL,
  `work_location_id` int(10) unsigned NOT NULL,
  `specific_location` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `job_description` text COLLATE utf8_unicode_ci NOT NULL,
  `key_responsibilities` text COLLATE utf8_unicode_ci NOT NULL,
  `skills` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `behavioural_traits` text COLLATE utf8_unicode_ci NOT NULL,
  `other_requirements` text COLLATE utf8_unicode_ci NOT NULL,
  `additional_info` text COLLATE utf8_unicode_ci,
  `attachment_file` text COLLATE utf8_unicode_ci NOT NULL,
  `forex_id` int(10) unsigned NOT NULL,
  `budget_min` decimal(10,2) NOT NULL,
  `budget_max` decimal(10,2) NOT NULL,
  `inventory_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expiry_date` date NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'draft',
  `is_priority` tinyint(1) NOT NULL DEFAULT '0',
  `package_id` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=128 ;

--
-- Dumping data untuk tabel `job_positions`
--

INSERT INTO `job_positions` (`id`, `name`, `user_id`, `position_level_id`, `employment_type_id`, `years_of_experience`, `position_specialization_id`, `qualifications`, `work_location_id`, `specific_location`, `job_description`, `key_responsibilities`, `skills`, `behavioural_traits`, `other_requirements`, `additional_info`, `attachment_file`, `forex_id`, `budget_min`, `budget_max`, `inventory_id`, `created_at`, `updated_at`, `expiry_date`, `status`, `is_priority`, `package_id`, `deleted_at`) VALUES
(1, 'Hadassah Maldonado', 2, 3, 4, '19', 8, 'Eveniet, maxime incidunt, fuga. Sit, nulla quas blanditiis omnis lorem molestias assumenda iusto voluptatum officia.', 18, 'Tempora enim voluptates sunt pariatur Mo', 'Culpa ipsum, aut odio aliquam earum dolores hic autem pariatur. Fugiat, laborum. Facilis veniam, deleniti.', 'Omnis consequatur? Necessitatibus ex sit, velit, ducimus, commodi aliquip autem sed quisquam earum rerum est dolores qui provident, soluta.', 'Ut quae rerum aut esse veniam eaque consequatur Odio', 'Dolore obcaecati in quia Nam illo nostrud exercitation sed saepe dolore.', 'Est architecto exercitationem eum alias et consequatur? Nihil eum ea praesentium accusantium praesentium eius esse eius.', '', '', 2, '0.00', '0.00', 0, '2015-12-28 00:29:23', '2016-05-14 20:40:02', '2018-06-28', 'post', 0, 0, NULL),
(2, 'Jelani Oneill', 3, 3, 2, '19', 3, 'Officiis eos, expedita et molestiae in deserunt hic non consectetur aut sint et anim impedit, sunt.', 19, 'Quia culpa odio ad odio amet elit quidem', 'Dignissimos iusto magna fugiat ex asperiores modi vel odit necessitatibus dolorem facilis aliquam omnis ad occaecat et magni odio laboris.', 'Nostrud mollitia excepteur consectetur cumque aliquid sapiente culpa consequatur? Molestiae Nam.', 'Nostrum est pariatur Corrupti ut eum animi delectus et dicta aut est laborum atque magni enim voluptas', 'Sit dolores vitae dolorem non numquam a deserunt at maxime voluptate corrupti.', 'Quas aut animi, omnis ullamco sit, ipsum, deserunt cum quas accusamus voluptatem consequatur quia possimus.', '', '', 3, '0.00', '0.00', 0, '2015-12-28 07:21:16', '2015-12-28 07:21:16', '2017-11-29', 'draft', 0, 0, NULL),
(3, 'Ingrid Bauer', 3, 3, 4, '19', 3, '<p>Quod reiciendis suscipit quaerat voluptatem fugiat consequuntur architecto corrupti, nisi reprehenderit, dolore.</p>\r\n\r\n<p>The book &ldquo;The Power of Resilience: How The Best Companies Manage The Unexpected&rdquo; will be available for purchase at the venue. The book is priced at MYR 130 and will be sold on a first-come, first served basis. Prof Sheffi will be present to autograph your copy.</p>\r\n\r\n<blockquote>\r\n<p>&ldquo;Resilience building is as critical as risk management for organizations operating in a dynamic global economy. This book is timely and important because it enables business leaders to grasp, conceptually and contextually, the power of resilience.&rdquo; &ndash;&nbsp;<strong>Klaus Schwab, Founder and Executive Chairman, World Economic</strong></p>\r\n</blockquote>\r\n', 19, 'Laudantium adipisci sint beatae rerum nu', '<p>Sit temporibus aliqua. Voluptatem enim quisquam rerum voluptas adipisicing suscipit quos ad at nulla magni velit quo ut provident.</p>\r\n', '<p>Vitae elit, impedit, proident, et ullam voluptas dolore dolorem amet, nobis tempore.</p>\r\n', 'Quos magna esse molestiae dolor iste delectus sunt dolore ut dolores', '<p>Est, qui rerum quibusdam ut at ut qui amet, dignissimos nemo amet.</p>\r\n', '<p>Dolorem non rem dignissimos voluptas in libero assumenda perspiciatis, dolor delectus, itaque pariatur.</p>\r\n', '', '', 3, '2000.00', '5000.00', 0, '2015-12-29 16:13:03', '2016-04-13 19:43:12', '0000-00-00', 'draft', 0, 0, NULL),
(6, 'Mohammad Petersen', 26, 3, 5, '19', 5, 'Molestiae aspernatur reprehenderit laudantium, omnis doloribus fugiat aut fuga. Esse, laboriosam, error molestias.', 17, 'Ipsam expedita dicta quo at qui nulla ex', 'Culpa, voluptate adipisicing fugiat maxime praesentium eu eos nobis dolore eos ex qui illo non voluptatem.', 'Quis veniam, quaerat in cum placeat, minim autem quasi quas.', 'Dolor assumenda itaque dolor in autem soluta amet impedit voluptas ullam obcaecati distinctio Esse', 'Officia non Nam in cupidatat in enim maiores error explicabo. Adipisicing nesciunt, at dolores nisi distinctio. Ducimus, esse, porro sunt.', 'Adipisci amet, dolorum exercitation consequat. Accusamus nulla odit dolores reprehenderit, sint.', '', '', 3, '44.00', '57.00', 0, '2016-01-08 01:05:09', '2016-01-12 08:14:48', '2016-04-08', 'post', 0, 0, NULL),
(10, 'Ginger Ball', 3, 2, 4, '20', 4, 'Deleniti omnis quas beatae ea laborum ratione voluptatem. Aliquam non dolore aspernatur optio, aliquam soluta assumenda labore dolor maiores ex.', 20, 'Enim sunt dignissimos inventore ducimus ', 'Earum est enim inventore proident, tempore, excepteur iure aliqua. Totam nesciunt, at quisquam dolor veritatis eligendi voluptas.', 'Veritatis quaerat autem ex quis quia accusamus et facilis quia minim Nam fugiat tempore.', 'In sed est et voluptas officiis quod', 'Ullamco iusto in voluptas a amet, est molestiae vero corrupti, reprehenderit, praesentium eum expedita sed sint doloremque nihil error cumque.', 'Qui beatae nihil consequatur? Nisi laboriosam, maiores laborum officia occaecat dolore ad dolor consequatur magna.', '', '/tmp/phpO3PjYE', 2, '51.00', '40.00', 0, '2016-01-10 02:31:35', '2016-04-26 09:22:11', '2016-04-10', 'post', 0, 0, NULL),
(11, 'Ginger Ball', 26, 2, 4, '20', 4, 'Deleniti omnis quas beatae ea laborum ratione voluptatem. Aliquam non dolore aspernatur optio, aliquam soluta assumenda labore dolor maiores ex.', 20, 'Enim sunt dignissimos inventore ducimus ', 'Earum est enim inventore proident, tempore, excepteur iure aliqua. Totam nesciunt, at quisquam dolor veritatis eligendi voluptas.', 'Veritatis quaerat autem ex quis quia accusamus et facilis quia minim Nam fugiat tempore.', 'In sed est et voluptas officiis quod', 'Ullamco iusto in voluptas a amet, est molestiae vero corrupti, reprehenderit, praesentium eum expedita sed sint doloremque nihil error cumque.', 'Qui beatae nihil consequatur? Nisi laboriosam, maiores laborum officia occaecat dolore ad dolor consequatur magna.', '', '/tmp/phpCfMbjE', 2, '51.00', '40.00', 0, '2016-01-10 02:31:56', '2016-01-10 02:31:56', '2016-04-07', 'draft', 0, 0, NULL),
(12, 'Ora Hahn', 3, 3, 2, '19', 5, 'Quis est, aliquam laborum corrupti, voluptatum est aut nobis ratione fugiat, vero quaerat nisi ratione voluptas temporibus maiores soluta sunt.', 23, 'lingkaran cyberpoint barat, 63000 cyberj', '<p>Fugiat impedit, dignissimos elit, omnis laboris in non necessitatibus dolorum excepturi et eveniet, sit reprehenderit.</p>\r\n\r\n<p><strong>WEH!</strong></p>\r\n\r\n<p><ul><li>whehehe</li><li>wfwfwfw</li><li>efefwfewfew</li></ul>\r\n\r\njahahaha\r\n', 'Molestiae nulla do dolor enim esse, et lorem dicta mollit.', 'Deleniti consequat Esse ratione laboris voluptatem Exercitation aperiam dolore dolore', 'Asperiores voluptates ut rerum placeat, esse, elit, ullamco quibusdam quia debitis tempor nostrum.', 'Voluptatem labore ut aut ab sequi esse, qui in dolore fugiat, omnis quia et repellendus. Dolor omnis nihil.', '', '', 2, '500.00', '6000.00', 0, '2016-01-28 15:02:46', '2016-01-28 15:05:27', '2016-04-29', 'post', 0, 0, NULL),
(114, 'Ross Cantrell', 3, 2, 4, '8', 7, 'Qui est elit, qui totam et maiores vel sit, molestiae doloribus temporibus laudantium, assumenda nihil et officia qui eveniet, unde.', 23, '1-3a-13a, the domain @ neocyber, linkara', 'In exercitation cupiditate et asperiores est, ab quaerat ea illum, minus esse quos sed voluptate itaque ad sed.', 'Sit ipsam sit, qui non neque hic quas consequatur? Deserunt mollitia rerum voluptatem, omnis.', 'Optio odio natus omnis dolor eu neque ea dolore numquam deserunt enim', 'Optio, est laboriosam, officia nostrud obcaecati itaque in sed similique aspernatur occaecat.', 'Enim culpa, dolore ex velit, aliqua. Tempore, dicta consequatur nulla perferendis sed earum est, laboriosam, duis elit, consequat. Fugit.', '', '', 3, '2000.00', '3000.00', 0, '2016-03-01 03:40:23', '2016-03-01 03:42:44', '2016-06-01', 'post', 0, 0, NULL),
(115, 'Project Manager (Information Technology Division)', 2, 2, 4, '5', 1, '', 23, '', '•    Lead project from initiation to closure:\r\n\r\n     o  Single point-of-contact to co-ordinate project activities;\r\n     o  Set up specific, measurable, attainable, relevant and time-bound project plan;\r\n     o  Ensure the quality of the project and its deliverables;\r\n     o  Manage internal resources including utilization, coordination, control and conflict resolution;\r\n     o  Manage day-to-day operational aspects of the project;\r\n     o	 Review and verify project deliverables prepared by participating teams including signoff and approval of gap list, functional specification  \r\n         document, data migration scope document, change requests, UAT acceptance, production go-live readiness;\r\n     o	 Ensures project documents are complete, current, shared by project team and stored appropriately.\r\n\r\n•    Identify resources needed and assign individual responsibilities.\r\n\r\n•    Apply systematic project implementation methodology and enforces project standards.', '•     Keep IT Steering Committee, Project Steering Committee and Project Team posted on the progress and status of the projects and \r\n      escalate issues/challenges to the relevant parties as needed.\r\n\r\n•    Participate in PMO Review and implementation per agreed action plan.\r\n\r\n•    Provide timely and effective project reporting to higher management and regional office. ', 'Project Management', '', '', '', '', 1, '4000.00', '60000.00', 0, '2016-03-20 21:26:15', '2016-05-02 09:31:00', '2016-06-21', 'post', 0, 0, NULL),
(116, 'Sales Executive', 3, 1, 4, '1-', 1, 'Must have Bachelor or higher degree in relative areas\r\nMust have proficient language skills in English, Mandarin and Latin.\r\nMust be open minded, easy going and self-disciplined.\r\nMust own vehicle and be willing to travel', 23, 'Suite 2001, Level 20, Suntech, 1-G-9, Li', 'Candidates must be disciplined with positive attitude, independent. Working experience in the similar position would be an added advantage. Minimum SPM / Diploma / ‘O’ Levels\r\nPreferable with sales & customer service experience\r\nAble to perform up-selling & cross-selling of product to clients\r\nGood interpersonal skills\r\nSelf-motivated & independent to handle customer relationship, grow existing and new accounts\r\nMust have reliable personal transportation and able to travel outstation if required.', 'A) Identifies business opportunities by identifying prospects and evaluating their position in the industry; researching and analyzing sales options.\r\nB) Sells products by establishing contact and developing relationships with prospects; recommending solutions.\r\nC) Maintains relationships with clients by providing support, information, and guidance; researching and recommending new opportunities; recommending profit and service improvements.\r\nD) Creates and manages a customer value plan for existing customers highlighting profiles, share and value opportunities.\r\nE) Identifies advantages and compares organization’s products/services.\r\nF) Providing technical advice to customers on all aspects of the installation and use of computer systems and networks, both before and after the sale', 'Presentation; Sales; Communication; Driving', 'N/L', '', '', '', 1, '2500.00', '3500.00', 0, '2016-03-20 21:34:30', '2016-03-20 21:34:59', '2016-06-21', 'post', 0, 0, NULL),
(117, 'Ivan Watson', 2, 3, 5, '19', 8, 'Harum labore cupiditate iusto saepe sunt sequi est officia ut qui ipsum, adipisicing tempora et praesentium velit veniam, delectus.', 23, 'Necessitatibus voluptas quas adipisci ve', '<p>catch me if <strong>you can&nbsp;</strong>g the years 2010 to 2011,</p>\r\n\r\n<p>Massachusetts Institute of Technology&rsquo;s Center for Transportation &amp; Logistics (MIT-CTL) designed, field-tested (in six workshops), and delivered a set of four scenarios and an elaborate process for using them to the Federal <strong>Highway Administration</strong> of the United States, as part of the US$1 million Future Freight Flows project. The scenarios and the process were designed to be used by any transportation planning agency in the U.S.</p>\r\n\r\n<p><strong>to decide</strong> its long-range investments in its freight transportation infrastructure. They have already been employed by a few states in developing their current long-range plans. In a separate project sponsored by a large global beverage company, MIT-CTL u</p>\r\n', 'Anim dolores rerum fugiat impedit, culpa ex eum pariatur? Mollitia dicta voluptatibus odit et magnam harum esse numquam deleniti.', 'Ex ullamco voluptate at fugit est eius anim aliquip', 'Necessitatibus eius soluta voluptatem, sed elit, quis et in quis unde anim tempora placeat.', 'Reprehenderit, vel laudantium, placeat, deleniti non exercitation ut necessitatibus quae sint sit magni voluptas omnis velit deserunt cupiditate elit, voluptatum.', '', '', 2, '8.00', '21.00', 0, '2016-04-09 07:42:31', '2016-05-02 02:59:19', '0000-00-00', 'cancelled', 0, 0, '2016-05-02 02:59:19'),
(118, '', 26, 0, 0, '', 0, '', 0, '', '', '', '', '', '', '', '', 0, '0.00', '0.00', 0, '2017-05-17 23:46:32', '2017-05-17 23:46:32', '2017-11-29', 'draft', 0, 0, NULL),
(119, '', 26, 0, 0, '', 0, '', 0, '', '', '', '', '', '', '', '', 0, '0.00', '0.00', 0, '2017-05-30 19:20:21', '2017-05-30 19:20:21', '2017-11-29', 'draft', 0, 0, NULL),
(120, 'Position Title', 26, 0, 2, '1-', 1, '', 0, '', '', '', '', '', '', '', '', 0, '0.00', '3000.00', 0, '2017-05-30 19:53:20', '2017-05-30 19:53:20', '2017-11-28', 'post', 0, 0, NULL),
(121, 'Intern for Data Management', 26, 0, 5, '0', 14, '<p>Godlike and kewl</p>\r\n', 0, '', '<ol>\r\n	<li>Smart</li>\r\n	<li>Talented</li>\r\n	<li>Pretty</li>\r\n</ol>\r\n', '', '', '', '<p>Nice to be nice</p>\r\n', '', '', 0, '0.00', '2200.00', 0, '2017-05-30 21:31:16', '2017-05-30 21:31:16', '0000-00-00', 'post', 0, 0, NULL),
(123, 'rico test post job', 55, 2, 5, '2', 0, 'job requirement', 0, '', 'job description', '', '', '', 'nice to have', 'additional info', '', 0, '0.00', '0.00', 0, '2017-11-26 17:00:00', '2017-11-26 17:00:00', '2017-11-28', 'draft', 0, 0, NULL),
(127, 'IT Staff', 55, 1, 5, '1', 0, 'can fix stuff', 0, '', 'It staff, fix all the stuff', '', '', '', 'ability to fix any kind of stuff', 'fix stuff', '', 0, '0.00', '0.00', 0, '2017-11-30 01:42:50', '2017-11-30 01:42:50', '2017-12-30', 'post', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `collection_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `disk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `manipulations` text COLLATE utf8_unicode_ci NOT NULL,
  `custom_properties` text COLLATE utf8_unicode_ci NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=133 ;

--
-- Dumping data untuk tabel `media`
--

INSERT INTO `media` (`id`, `model_id`, `model_type`, `collection_name`, `name`, `file_name`, `disk`, `size`, `manipulations`, `custom_properties`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 11, 'App\\Models\\JobPosition', 'default', 'greenery', 'greenery.jpg', 's3', 268386, '[]', '[]', 1, '2016-01-10 02:31:56', '2016-01-10 02:31:56'),
(2, 55, 'App\\Models\\ProfileUpload', 'covers', 'banner-financial', 'banner-financial.png', 's3', 516691, '[]', '[]', 2, '2016-01-14 09:09:35', '2016-01-14 09:09:35'),
(3, 56, 'App\\Models\\ProfileUpload', 'covers', 'header1', 'header1.png', 's3', 125322, '[]', '[]', 3, '2016-01-14 09:17:52', '2016-01-14 09:17:52'),
(4, 57, 'App\\Models\\ProfileUpload', 'covers', 'blog-post', 'blog-post.png', 's3', 19361, '[]', '[]', 4, '2016-01-14 09:21:33', '2016-01-14 09:21:33'),
(5, 58, 'App\\Models\\ProfileUpload', 'covers', 'p1', 'p1.jpg', 's3', 205043, '[]', '[]', 5, '2016-01-14 09:22:09', '2016-01-14 09:22:09'),
(6, 59, 'App\\Models\\ProfileUpload', 'covers', '14403503515_bb96f3ff90_n', '14403503515_bb96f3ff90_n.jpg', 's3', 43722, '[]', '[]', 6, '2016-01-14 09:23:10', '2016-01-14 09:23:10'),
(7, 60, 'App\\Models\\ProfileUpload', 'profile_photo', 'p4', 'p4.jpg', 's3', 446736, '[]', '[]', 7, '2016-01-14 09:57:44', '2016-01-14 09:57:44'),
(8, 61, 'App\\Models\\ProfileUpload', 'profile_photo', 'video-right', 'video-right.png', 's3', 225378, '[]', '[]', 8, '2016-01-14 10:00:47', '2016-01-14 10:00:47'),
(12, 62, 'App\\Models\\ProfileUpload', 'covers', 'IMG-20151208-WA0018', 'IMG-20151208-WA0018.jpg', 's3', 599192, '[]', '[]', 12, '2016-01-14 11:22:03', '2016-01-14 11:22:03'),
(13, 63, 'App\\Models\\ProfileUpload', 'avatar', 'profile2', 'profile2.jpeg', 's3', 11227, '[]', '[]', 13, '2016-01-14 11:26:52', '2016-01-14 11:26:52'),
(14, 64, 'App\\Models\\ProfileUpload', 'covers', 'IMG-20151210-WA0003', 'IMG-20151210-WA0003.jpg', 's3', 93816, '[]', '[]', 14, '2016-01-17 01:32:37', '2016-01-17 01:32:37'),
(15, 65, 'App\\Models\\ProfileUpload', 'covers', 'IMG-20151210-WA0003', 'IMG-20151210-WA0003.jpg', 's3', 93816, '[]', '[]', 15, '2016-01-17 01:45:14', '2016-01-17 01:45:14'),
(16, 66, 'App\\Models\\ProfileUpload', 'covers', 'IMG-20151210-WA0002', 'IMG-20151210-WA0002.jpg', 's3', 242633, '[]', '[]', 16, '2016-01-17 01:45:49', '2016-01-17 01:45:49'),
(17, 67, 'App\\Models\\ProfileUpload', 'covers', 'IMG-20151201-WA0003', 'IMG-20151201-WA0003.jpg', 's3', 581573, '[]', '[]', 17, '2016-01-17 01:52:42', '2016-01-17 01:52:42'),
(18, 68, 'App\\Models\\ProfileUpload', 'covers', 'IMG-20150717-WA0033', 'IMG-20150717-WA0033.jpeg', 's3', 897097, '[]', '[]', 18, '2016-01-17 01:55:59', '2016-01-17 01:55:59'),
(19, 69, 'App\\Models\\ProfileUpload', 'covers', 'DSC_0287_rsz', 'DSC_0287_rsz.jpg', 's3', 407584, '[]', '[]', 19, '2016-01-17 09:05:57', '2016-01-17 09:05:57'),
(21, 70, 'App\\Models\\ProfileUpload', 'covers', 'coverphotoYrh0Yf', 'coverphotoYrh0Yf', 's3', 104570, '[]', '[]', 20, '2016-01-17 09:12:23', '2016-01-17 09:12:23'),
(23, 71, 'App\\Models\\ProfileUpload', 'covers', 'coverphotoAtnohI', 'coverphotoAtnohI', 's3', 90610, '[]', '[]', 21, '2016-01-17 09:13:22', '2016-01-17 09:13:22'),
(25, 72, 'App\\Models\\ProfileUpload', 'covers', 'coverphotoxb7DkA', 'coverphotoxb7DkA', 's3', 103782, '[]', '[]', 22, '2016-01-17 09:19:10', '2016-01-17 09:19:10'),
(27, 73, 'App\\Models\\ProfileUpload', 'covers', 'coverphotoQ0Lb1r', 'coverphotoQ0Lb1r', 's3', 105261, '[]', '[]', 23, '2016-01-17 09:20:19', '2016-01-17 09:20:19'),
(29, 74, 'App\\Models\\ProfileUpload', 'covers', 'coverphoto77wIDs', 'coverphoto77wIDs', 's3', 100828, '[]', '[]', 24, '2016-01-17 09:32:13', '2016-01-17 09:32:13'),
(30, 75, 'App\\Models\\ProfileUpload', 'covers', 'greenbushes', 'greenbushes.png', 's3', 519190, '[]', '[]', 25, '2016-02-01 04:43:39', '2016-02-01 04:43:39'),
(31, 3, 'App\\Models\\Blog', 'featured', 'xremoCom', 'xremoCom.png', 's3', 541731, '[]', '[]', 26, '2016-02-11 08:45:39', '2016-02-11 08:45:39'),
(33, 5, 'App\\Models\\Blog', 'featured', 'cNy', 'cNy.png', 's3', 1032400, '[]', '[]', 28, '2016-02-11 08:49:56', '2016-02-11 08:49:56'),
(34, 5, 'App\\Models\\Blog', 'featured', 'mscmCalendar2', 'mscmCalendar2.jpg', 's3', 85162, '[]', '[]', 29, '2016-02-11 09:02:08', '2016-02-11 09:02:08'),
(36, 76, 'App\\Models\\ProfileUpload', 'avatar', 'xremoCom', 'xremoCom.png', 's3', 541731, '[]', '[]', 31, '2016-02-16 07:38:42', '2016-02-16 07:38:42'),
(37, 7, 'App\\Models\\JobseekerCv', 'cvs', 'pdf-sample', 'pdf-sample.pdf', 's3', 7945, '[]', '[]', 32, '2016-02-16 08:10:57', '2016-02-16 08:10:57'),
(38, 8, 'App\\Models\\JobseekerCv', 'cvs', 'pdf-sample', 'pdf-sample.pdf', 's3', 7945, '[]', '[]', 33, '2016-02-16 08:11:44', '2016-02-16 08:11:44'),
(40, 77, 'App\\Models\\ProfileUpload', 'covers', 'coverphoto2LceoP', 'coverphoto2LceoP', 's3', 322, '[]', '[]', 34, '2016-02-18 05:53:31', '2016-02-18 05:53:31'),
(41, 78, 'App\\Models\\ProfileUpload', 'avatar', 'naufalFallout', 'naufalFallout.png', 's3', 266261, '[]', '[]', 35, '2016-03-06 07:42:59', '2016-03-06 07:42:59'),
(42, 79, 'App\\Models\\ProfileUpload', 'avatar', 'naufalFallout', 'naufalFallout.png', 's3', 266261, '[]', '[]', 36, '2016-03-06 07:44:41', '2016-03-06 07:44:41'),
(43, 80, 'App\\Models\\ProfileUpload', 'avatar', 'forrest', 'forrest.png', 's3', 348464, '[]', '[]', 37, '2016-03-06 08:17:10', '2016-03-06 08:17:10'),
(44, 81, 'App\\Models\\ProfileUpload', 'avatar', 'xremo.png', 'xremo.png.png', 's3', 2326, '[]', '[]', 38, '2016-03-06 08:18:14', '2016-03-06 08:18:14'),
(45, 82, 'App\\Models\\ProfileUpload', 'profile_photo', 'IMG-20151211-WA0008', 'IMG-20151211-WA0008.jpg', 's3', 27238, '[]', '[]', 39, '2016-03-07 05:40:11', '2016-03-07 05:40:11'),
(46, 83, 'App\\Models\\ProfileUpload', 'covers', 'IMG-20151211-WA0008', 'IMG-20151211-WA0008.jpg', 's3', 27238, '[]', '[]', 40, '2016-03-07 05:48:23', '2016-03-07 05:48:23'),
(47, 84, 'App\\Models\\ProfileUpload', 'profile_photo', 'IMG-20151211-WA0008', 'IMG-20151211-WA0008.jpg', 's3', 27238, '[]', '[]', 41, '2016-03-07 05:49:30', '2016-03-07 05:49:30'),
(48, 85, 'App\\Models\\ProfileUpload', 'profile_photo', 'IMG-20151211-WA0008', 'IMG-20151211-WA0008.jpg', 's3', 27238, '[]', '[]', 42, '2016-03-07 06:20:44', '2016-03-07 06:20:44'),
(49, 86, 'App\\Models\\ProfileUpload', 'profile_photo', 'arshadAyubGraduateBusinessSchool', 'arshadAyubGraduateBusinessSchool.jpg', 's3', 30876, '[]', '[]', 43, '2016-03-07 06:21:23', '2016-03-07 06:21:23'),
(50, 87, 'App\\Models\\ProfileUpload', 'covers', 'pastprograms', 'pastprograms.png', 's3', 67378, '[]', '[]', 44, '2016-03-07 06:22:30', '2016-03-07 06:22:30'),
(52, 89, 'App\\Models\\ProfileUpload', 'covers', 'IMG_4633 S', 'IMG_4633 S.jpg', 's3', 227127, '[]', '[]', 46, '2016-03-09 01:30:46', '2016-03-09 01:30:46'),
(59, 89, 'App\\Models\\ProfileUpload', 'avatars', 'avatarphotoxv30G810minutesgame', 'avatarphotoxv30G810minutesgame.png', 's3', 4975, '[]', '[]', 47, '2016-03-12 05:52:43', '2016-03-12 05:52:43'),
(66, 92, 'App\\Models\\ProfileUpload', 'avatar', 'greenery', 'greenery.jpg', 's3', 268386, '[]', '[]', 50, '2016-03-14 06:54:17', '2016-03-14 06:54:17'),
(67, 93, 'App\\Models\\ProfileUpload', 'covers', 'spotlight', 'spotlight.png', 's3', 55428, '[]', '[]', 51, '2016-03-15 20:41:10', '2016-03-15 20:41:10'),
(68, 94, 'App\\Models\\ProfileUpload', 'covers', 'kayus', 'kayus.jpg', 's3', 256794, '[]', '[]', 52, '2016-03-16 03:59:27', '2016-03-16 03:59:27'),
(69, 95, 'App\\Models\\ProfileUpload', 'covers', 'IMG_4633 S', 'IMG_4633 S.jpg', 's3', 227127, '[]', '[]', 53, '2016-03-16 04:03:59', '2016-03-16 04:03:59'),
(70, 96, 'App\\Models\\ProfileUpload', 'covers', 'vader', 'vader.jpg', 's3', 4416, '[]', '[]', 54, '2016-03-16 04:06:25', '2016-03-16 04:06:25'),
(71, 97, 'App\\Models\\ProfileUpload', 'covers', '47949_abstract', '47949_abstract.jpg', 's3', 617720, '[]', '[]', 55, '2016-03-17 17:47:10', '2016-03-17 17:47:10'),
(72, 98, 'App\\Models\\ProfileUpload', 'covers', 'syed', 'syed.jpg', 's3', 86636, '[]', '[]', 56, '2016-03-17 17:48:01', '2016-03-17 17:48:01'),
(74, 99, 'App\\Models\\ProfileUpload', 'covers', 'coverphotovyDD8M', 'coverphotovyDD8M', 's3', 23931, '[]', '[]', 57, '2016-03-17 17:58:35', '2016-03-17 17:58:35'),
(76, 100, 'App\\Models\\ProfileUpload', 'covers', 'coverphotopNemro', 'coverphotopNemro', 's3', 160, '[]', '[]', 58, '2016-03-17 17:59:34', '2016-03-17 17:59:34'),
(78, 101, 'App\\Models\\ProfileUpload', 'covers', 'coverphotojgSRRI', 'coverphotojgSRRI', 's3', 283, '[]', '[]', 59, '2016-03-17 18:00:17', '2016-03-17 18:00:17'),
(80, 102, 'App\\Models\\ProfileUpload', 'covers', 'coverphotodcR9p1', 'coverphotodcR9p1', 's3', 72392, '[]', '[]', 60, '2016-03-17 18:08:16', '2016-03-17 18:08:16'),
(83, 103, 'App\\Models\\ProfileUpload', 'covers', 'coverphotoO6WLv2', 'coverphotoO6WLv2', 's3', 39031, '[]', '[]', 61, '2016-03-17 18:10:59', '2016-03-17 18:10:59'),
(106, 118, 'App\\Models\\ProfileUpload', 'profile_photo', 'profilephotophotoXshTKe265', 'profilephotophotoXshTKe265.jpg', 's3', 281049, '[]', '[]', 71, '2016-03-22 05:27:44', '2016-03-22 05:27:44'),
(107, 119, 'App\\Models\\ProfileUpload', 'profile_photo', 'profilephotophotog3wU4K17', 'profilephotophotog3wU4K17.jpg', 's3', 12926, '[]', '[]', 72, '2016-03-22 05:29:10', '2016-03-22 05:29:10'),
(108, 120, 'App\\Models\\ProfileUpload', 'profile_photo', 'profilephotophoto5JpZgD17', 'profilephotophoto5JpZgD17.jpg', 's3', 8471, '[]', '[]', 73, '2016-03-22 05:43:40', '2016-03-22 05:43:40'),
(109, 121, 'App\\Models\\ProfileUpload', 'profile_photo', 'profilephotophotoiQb7Ju241', 'profilephotophotoiQb7Ju241.jpg', 's3', 16232, '[]', '[]', 74, '2016-03-22 05:46:38', '2016-03-22 05:46:38'),
(110, 122, 'App\\Models\\ProfileUpload', 'profile_photo', 'profilephotophotoVEHOzs241', 'profilephotophotoVEHOzs241.jpg', 's3', 16232, '[]', '[]', 75, '2016-03-22 05:48:36', '2016-03-22 05:48:36'),
(113, 90, 'App\\Models\\ProfileUpload', 'avatars', 'avatarphoto5iuzSK246', 'avatarphoto5iuzSK246.jpg', 's3', 42753, '[]', '[]', 76, '2016-03-22 05:53:37', '2016-03-22 05:53:37'),
(114, 123, 'App\\Models\\ProfileUpload', 'profile_photo', 'profilephotophotolglhJ5mscmCalendar2', 'profilephotophotolglhJ5mscmCalendar2.png', 's3', 11489, '[]', '[]', 77, '2016-03-25 20:46:23', '2016-03-25 20:46:23'),
(115, 124, 'App\\Models\\ProfileUpload', 'profile_photo', 'profilephotophotoGYLzZWDSC_0237', 'profilephotophotoGYLzZWDSC_0237.JPG', 's3', 181235, '[]', '[]', 78, '2016-03-25 21:40:26', '2016-03-25 21:40:26'),
(116, 125, 'App\\Models\\ProfileUpload', 'profile_photo', 'profilephotophotoZ0wyBIDSC_0234', 'profilephotophotoZ0wyBIDSC_0234.JPG', 's3', 293120, '[]', '[]', 79, '2016-03-25 21:41:06', '2016-03-25 21:41:06'),
(118, 127, 'App\\Models\\ProfileUpload', 'profile_photo', 'profilephotophotoScRLp8DSC_0236', 'profilephotophotoScRLp8DSC_0236.JPG', 's3', 157268, '[]', '[]', 80, '2016-03-25 21:50:21', '2016-03-25 21:50:21'),
(119, 128, 'App\\Models\\ProfileUpload', 'profile_photo', 'profilephotophotoeMvwPsDSC_0224', 'profilephotophotoeMvwPsDSC_0224.JPG', 's3', 209702, '[]', '[]', 81, '2016-03-25 21:50:53', '2016-03-25 21:50:53'),
(120, 129, 'App\\Models\\ProfileUpload', 'profile_photo', 'profilephotophoto85DKrQDSC_0233', 'profilephotophoto85DKrQDSC_0233.JPG', 's3', 261761, '[]', '[]', 82, '2016-03-25 21:53:05', '2016-03-25 21:53:05'),
(121, 9, 'App\\Models\\JobseekerCv', 'cvs', 'pdf-sample', 'pdf-sample.pdf', 's3', 7945, '[]', '[]', 83, '2016-04-09 19:34:38', '2016-04-09 19:34:38'),
(122, 130, 'App\\Models\\ProfileUpload', 'avatar', 'download', 'download.png', 's3', 4697, '[]', '[]', 84, '2017-02-27 23:13:31', '2017-02-27 23:13:31'),
(123, 131, 'App\\Models\\ProfileUpload', 'avatar', 'images', 'images.jpg', 's3', 4444, '[]', '[]', 85, '2017-02-27 23:13:51', '2017-02-27 23:13:51'),
(124, 132, 'App\\Models\\ProfileUpload', 'avatar', 'trash', 'trash.jpg', 's3', 78999, '[]', '[]', 86, '2017-02-27 23:14:06', '2017-02-27 23:14:06'),
(125, 133, 'App\\Models\\ProfileUpload', 'avatar', 'images', 'images.jpg', 's3', 4444, '[]', '[]', 87, '2017-02-27 23:35:57', '2017-02-27 23:35:57'),
(126, 134, 'App\\Models\\ProfileUpload', 'avatar', 'test', 'test.jpeg', 's3', 8789, '[]', '[]', 88, '2017-05-22 21:58:31', '2017-05-22 21:58:31'),
(127, 135, 'App\\Models\\ProfileUpload', 'avatar', 'test2', 'test2.jpg', 's3', 79986, '[]', '[]', 89, '2017-05-22 21:59:30', '2017-05-22 21:59:30'),
(128, 136, 'App\\Models\\ProfileUpload', 'avatar', 'test', 'test.jpeg', 's3', 8789, '[]', '[]', 90, '2017-05-22 22:08:38', '2017-05-22 22:08:38'),
(129, 137, 'App\\Models\\ProfileUpload', 'avatar', 'test2', 'test2.jpg', 's3', 79986, '[]', '[]', 91, '2017-05-22 22:09:45', '2017-05-22 22:09:45'),
(130, 138, 'App\\Models\\ProfileUpload', 'avatar', 'test', 'test.jpeg', 's3', 8789, '[]', '[]', 92, '2017-05-23 20:45:33', '2017-05-23 20:45:33'),
(131, 139, 'App\\Models\\ProfileUpload', 'avatar', 'pic', 'pic.jpg', 's3', 83469, '[]', '[]', 93, '2017-06-19 19:32:29', '2017-06-19 19:32:29'),
(132, 140, 'App\\Models\\ProfileUpload', 'avatar', 'pic', 'pic.jpg', 's3', 83469, '[]', '[]', 94, '2017-06-19 19:35:06', '2017-06-19 19:35:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from_id` int(10) unsigned NOT NULL,
  `to_id` int(10) unsigned NOT NULL,
  `subject` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `thread` text COLLATE utf8_unicode_ci NOT NULL,
  `job_position_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `replied` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `messages`
--

INSERT INTO `messages` (`id`, `from_id`, `to_id`, `subject`, `body`, `thread`, `job_position_id`, `created_at`, `updated_at`, `replied`) VALUES
(13, 9, 8, 'Invitation to apply for job opening', 'can i haz ur resume?', '', 0, '2015-12-07 08:02:58', '2015-12-07 08:02:58', 0),
(14, 9, 10, 'Invitation to apply for job opening', 'test', '', 6, '2016-01-28 10:00:53', '2016-01-28 10:00:53', 0),
(15, 2, 32, 'Invitation to apply for job opening', 'Can you apply for this?', '', 12, '2016-01-28 15:06:29', '2016-01-28 15:26:44', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2013_04_12_000836_orchestra_auth_create_users_table', 1),
('2013_04_12_012833_orchestra_auth_create_user_meta_table', 1),
('2013_04_12_013023_orchestra_auth_create_roles_table', 1),
('2013_04_12_013201_orchestra_auth_create_user_role_table', 1),
('2013_04_23_132623_orchestra_auth_basic_roles', 1),
('2013_05_27_062915_orchestra_auth_create_password_reminders_table', 1),
('2014_04_16_043555_orchestra_auth_add_remember_token_to_users_table', 1),
('2015_10_25_083045_createMessages', 2),
('2015_11_03_104113_profileField', 2),
('2015_11_03_113315_createStateTable', 2),
('2015_11_03_113513_createCountry', 2),
('2015_11_05_155918_billingFields', 2),
('2015_11_06_140630_addSlugFieldToUser', 2),
('2015_11_07_020400_addfieldcompanyname', 2),
('2015_11_07_094029_profile_uploads', 2),
('2015_11_08_132913_culturetable', 2),
('2015_11_10_134907_subprofile', 2),
('2015_11_11_124444_jobseekerProfile', 2),
('2015_11_11_124459_jobseekerExperience', 2),
('2015_11_11_124509_jobseekerEducation', 2),
('2015_11_11_131353_educationLevel', 2),
('2015_11_15_092219_billingaddressCompany', 2),
('2015_11_15_134655_jobseekercv', 2),
('2015_11_15_134706_jobseekervideo', 2),
('2015_11_17_151852_addpreview', 2),
('2015_11_29_010658_createCVAccessTable', 2),
('2015_11_30_161228_addcolorToProfileculture', 2),
('2015_12_03_155212_notificationTable', 2),
('2015_12_04_232033_addAuthorId', 2),
('2015_12_05_125813_createSkills', 2),
('2015_12_05_143137_createSkillUser', 2),
('2015_12_09_132607_createServiceItem', 2),
('2015_12_09_132628_createPackages', 2),
('2015_12_09_133517_packageServiceItemBridge', 2),
('2015_12_11_092747_addDefaultValueFieldToServiceItem', 2),
('2015_12_11_102235_addValueAndQuantityFieldToServiceItemPackage', 2),
('2015_12_14_020104_createTableUserPackage', 2),
('2015_12_14_020242_createTableInventory', 2),
('2015_12_14_023946_addPackageReferenceToInventory', 2),
('2015_12_14_125819_addValidDaysCalculation', 2),
('2015_12_14_131726_addBatchNumber', 2),
('2015_12_15_132010_createBatchTable', 2),
('2015_12_15_133832_addValidDateToPackage', 2),
('2015_12_15_153018_addPackageIdToBatch', 2),
('2015_12_28_014324_createJobPosition', 2),
('2015_12_28_014653_createPositionLevel', 2),
('2015_12_28_014724_createPositionSpecialization', 2),
('2015_12_28_014820_createForex', 2),
('2015_12_28_015114_createEmploymentType', 2),
('2015_12_28_075836_addExpiryDate', 2),
('2015_12_28_132943_createApplication', 2),
('2015_12_30_040210_addStatusToJobPosting', 2),
('2016_01_03_162300_create_media_table', 2),
('2016_01_05_164318_addCurrentJobFieldForExperience', 2),
('2016_01_07_133152_addCoverLetterToApplied', 2),
('2016_01_14_204818_add_status_to_application', 2),
('2016_01_18_135135_CreateMiscs', 2),
('2016_01_20_125235_addFieldNameToEducation', 2),
('2016_01_22_153557_createIndustryTable', 2),
('2016_01_22_155651_changeIndustryName', 2),
('2016_01_24_145229_add_address_to_job_profiles', 2),
('2016_01_28_153116_jobIdForInvite', 2),
('2016_01_28_222058_messageReplied', 2),
('2013_04_11_233631_orchestra_memory_create_options_table', 1),
('2013_04_12_000836_orchestra_auth_create_users_table', 2),
('2013_04_12_012833_orchestra_auth_create_user_meta_table', 2),
('2013_04_12_013023_orchestra_auth_create_roles_table', 2),
('2013_04_12_013201_orchestra_auth_create_user_role_table', 2),
('2013_04_23_132623_orchestra_auth_basic_roles', 2),
('2013_05_27_062915_orchestra_auth_create_password_reminders_table', 2),
('2014_04_16_043555_orchestra_auth_add_remember_token_to_users_table', 2),
('2013_05_24_091711_orchestra_control_seed_acls', 3),
('2015_10_25_083045_createMessages', 4),
('2015_11_03_104113_profileField', 5),
('2015_11_03_113315_createStateTable', 6),
('2015_11_03_113513_createCountry', 7),
('2015_11_05_155918_billingFields', 8),
('2015_11_06_140630_addSlugFieldToUser', 9),
('2015_11_07_020400_addfieldcompanyname', 10),
('2015_11_07_094029_profile_uploads', 11),
('2015_11_08_132913_culturetable', 12),
('2015_11_10_134907_subprofile', 13),
('2015_11_11_124444_jobseekerProfile', 14),
('2015_11_11_124459_jobseekerExperience', 14),
('2015_11_11_124509_jobseekerEducation', 15),
('2015_11_11_131353_educationLevel', 15),
('2015_11_15_092219_billingaddressCompany', 16),
('2015_11_15_134655_jobseekercv', 17),
('2015_11_15_134706_jobseekervideo', 17),
('2015_11_17_151852_addpreview', 18),
('2015_11_29_010658_createCVAccessTable', 19),
('2015_11_30_161228_addcolorToProfileculture', 20),
('2015_12_03_155212_notificationTable', 21),
('2015_12_04_232033_addAuthorId', 22),
('2015_12_05_125813_createSkills', 23),
('2015_12_05_143137_createSkillUser', 24),
('2015_12_09_132607_createServiceItem', 25),
('2015_12_09_132628_createPackages', 25),
('2015_12_09_133517_packageServiceItemBridge', 25),
('2015_12_11_092747_addDefaultValueFieldToServiceItem', 26),
('2015_12_11_102235_addValueAndQuantityFieldToServiceItemPackage', 27),
('2015_12_14_020104_createTableUserPackage', 28),
('2015_12_14_020242_createTableInventory', 28),
('2015_12_14_023946_addPackageReferenceToInventory', 29),
('2015_12_14_125819_addValidDaysCalculation', 29),
('2015_12_14_131726_addBatchNumber', 29),
('2015_12_15_132010_createBatchTable', 30),
('2015_12_15_133832_addValidDateToPackage', 31),
('2015_12_15_153018_addPackageIdToBatch', 32),
('2015_12_28_014324_createJobPosition', 33),
('2015_12_28_014653_createPositionLevel', 33),
('2015_12_28_014724_createPositionSpecialization', 33),
('2015_12_28_014820_createForex', 33),
('2015_12_28_015114_createEmploymentType', 33),
('2015_12_28_075836_addExpiryDate', 34),
('2015_12_28_132943_createApplication', 34),
('2015_12_30_040210_addStatusToJobPosting', 35),
('2016_01_03_162300_create_media_table', 36),
('2016_01_05_164318_addCurrentJobFieldForExperience', 37),
('2016_01_07_133152_addCoverLetterToApplied', 38),
('2016_01_14_204818_add_status_to_application', 39),
('2016_01_18_135135_CreateMiscs', 40),
('2016_01_20_125235_addFieldNameToEducation', 41),
('2016_01_22_153557_createIndustryTable', 42),
('2016_01_22_155651_changeIndustryName', 43),
('2016_01_24_145229_add_address_to_job_profiles', 44),
('2016_01_28_153116_jobIdForInvite', 45),
('2016_01_28_222058_messageReplied', 46),
('2016_02_11_125239_createBlog', 47),
('2016_02_11_151919_addUsurpField', 48),
('2016_02_11_161606_addTagField', 49),
('2016_02_14_100209_addAuthorFieldToBlogs', 50),
('2016_02_15_143506_createVerificationToken', 51),
('2016_02_24_121716_addTextColorfield', 52),
('2016_03_15_155437_updateProfileInfo', 53),
('2016_04_18_122604_createPinTable', 54),
('2016_04_24_094101_createUsageTable', 55),
('2016_04_26_145450_updateUsageTableWithModelAndId', 56),
('2016_04_26_152445_updateJobPositionWithPackageId', 57),
('2016_04_28_122611_deleteAtForJobPosition', 58),
('2016_05_01_000714_addCvIDToCvAccess', 59),
('2016_05_03_123843_addInventoryIdPK', 60),
('2016_05_14_073734_addServiceItemType', 61),
('2016_05_14_105237_createValidDaysAtPackage', 61),
('2016_05_14_121057_neverExpireOnInventoryPage', 62),
('2016_05_14_154203_addOperationCodeForInventory', 63),
('2016_05_14_155304_dropServiceItemIdFromUsage', 64),
('2016_05_28_135221_addInvoiceNumberToPackageUser', 65),
('2016_05_28_160127_addTaxRate', 66),
('2016_05_29_152351_createPurchaseTable', 67),
('2016_06_04_000226_createPurchasePackageLink', 68),
('2016_06_05_051635_recordPaymentDetailInPurchase', 69),
('2016_06_15_052034_create_table_summary_monthly', 70),
('2016_06_20_132609_create_full_monthly_reports', 70),
('2016_07_17_140704_addReceiptNumberToPackagePurchaseNUsage', 70),
('2016_07_18_151411_addserviceItemToUsage', 70),
('2017_02_14_022517_create_academics_table', 71),
('2017_02_17_052251_create_non_academics_table', 72),
('2017_02_17_060513_create_experiences_table', 72),
('2017_02_17_060702_create_student_skills_table', 72),
('2017_02_23_074528_create_student_bios_table', 73),
('2017_04_18_053520_update_jobseeker_profile', 74),
('2017_06_01_073159_create_shortlists_table', 74),
('2017_06_06_024053_create_seek_lists_table', 75),
('2017_06_08_020028_create_ratings_table', 76),
('2017_06_15_033009_phone_number_studentbios', 77),
('2017_06_22_125955_add_new_elements', 78),
('2017_06_30_024927_edit_varchar_experience', 79),
('2017_07_05_025037_add_element_academics', 80),
('2017_07_05_054901_edit_experience_parameter', 81),
('2017_07_06_032137_create_bio_meta', 82),
('2017_07_06_034130_edit_ratings', 82),
('2017_07_07_032041_add_element_ratings', 83),
('2017_07_14_025025_create_reviews_table', 84);

-- --------------------------------------------------------

--
-- Struktur dari tabel `miscs`
--

CREATE TABLE IF NOT EXISTS `miscs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `miscs`
--

INSERT INTO `miscs` (`id`, `type`, `content`, `created_at`, `updated_at`) VALUES
(1, 'services', '<section><!-- Pricing Page Header -->\r\n	  	<div class="container-fluid">\r\n	  		<div class="row header-img6">\r\n	  			<div class="text-holder container">\r\n	  				<div class="col-md-10 col-md-offset-1">\r\n	  					<h3 class="overlay-dark wow fadeIn">We offer total solution for your company needs!</h3>\r\n	  				</div>\r\n	  			</div>\r\n			</div>\r\n	  	</div>\r\n	</section><!-- end Pricing Page Header -->\r\n	<section class="vpadding-large">\r\n		<div class="container">\r\n			<div class="col-md-8 col-md-offset-2">\r\n				<h2 class="text-center wow fadeIn" data-wow-delay="0.2s">Our Service</h2>\r\n				<p class="text-center">A quick view on the service that we offer here in xremo platform:</p>\r\n			</div>\r\n		</div>\r\n	</section>\r\n\r\n	\r\n  <section class="light-bg vpadding-large">\r\n    <div class="container">\r\n      <div class="col-md-4 col-md-offset-1">\r\n        <img src="img/mockup-preview.png" class="img-responsive wow fadeInLeft" data-wow-delay="0.2s">\r\n      </div>\r\n\r\n      <div class="col-md-6 col-md-offset-1">\r\n        <h2 class="wow fadeIn"><i class="fa fa-diamond"></i> Job Posting</h2>\r\n        <p>Xremo Job Advertisements consist of a single unique indexable URL with the following sections.\r\n          <ul>\r\n            <li>Job Title</li>\r\n            <li>Position Type</li>\r\n            <li>Required Experience</li>\r\n            <li>Description</li>\r\n            <li>What You''ll Get</li>\r\n            <li>Location</li>\r\n            <li>Required Education</li>\r\n            <li>Job Status</li>\r\n            <li>Responsibilities</li>\r\n            <li>Company Pitching Video</li>\r\n            <li>Job Type</li>\r\n            <li>Bachelor''s Degree</li>\r\n            <li>Salary</li>\r\n            <li>Nice To Have</li>\r\n          </ul>\r\n        </p>\r\n      </div>\r\n    </div>\r\n  </section>\r\n\r\n  <section class="light-bg vpadding-large">\r\n		<div class="container">\r\n			<div class="col-md-6 col-md-offset-1">\r\n				<h2 class="wow fadeIn"><i class="fa fa-search-plus"></i> Resume Search</h2>\r\n				<p>The Resume Search engine enables registered employers to search for candidate CVs and profiles. Profiles may or may not include Video pitches by the candidate.</p>\r\n			</div>\r\n\r\n      <div class="col-md-4">\r\n        <img src="img/mockup-preview2.png" class="img-responsive wow fadeInLeft" data-wow-delay="0.2s">\r\n      </div>\r\n		</div>\r\n	</section>\r\n\r\n	<section class="light-bg vpadding-large">\r\n		<div class="container">\r\n      <div class="col-md-4 col-md-offset-1">\r\n        <img src="img/mock-banner4.png" class="img-responsive wow fadeInRight" data-wow-delay="0.2s">\r\n      </div>\r\n			<div class="col-md-6 col-md-offset-1">\r\n				<h2 class="wow fadeIn"><i class="fa fa-bullseye"></i> Sponsored Job Ad</h2>\r\n				<p>The Sponsored Job Ad feature enables an attached Job Advertisement to be featured prominently at the top of search results and the matching agent. This represents a value added service.</p>\r\n			</div>\r\n		</div>\r\n	</section>\r\n\r\n	<section class="light-bg vpadding-large">\r\n		<div class="container">\r\n			<div class="col-md-6 col-md-offset-1">\r\n				<h2 class="wow fadeIn"><i class="fa fa-eye"></i> Employer Banners</h2>\r\n				<p>The Employer Banners are image content that an employer may wish to feature on the home page and includes, but is not limited to, banners, logos or working environment/people pictures.</p>\r\n			</div>\r\n      <div class="col-md-4">\r\n        <img src="img/mock-banner2.png" class="img-responsive wow fadeInLeft" data-wow-delay="0.2s">\r\n      </div>\r\n		</div>\r\n	</section>\r\n\r\n  <section class="light-bg vpadding-large">\r\n    <div class="container">\r\n      <div class="col-md-4 col-md-offset-1">\r\n        <img src="img/mock-banner4.png" class="img-responsive wow fadeInRight" data-wow-delay="0.2s">\r\n      </div>\r\n      <div class="col-md-6 col-md-offset-1">\r\n        <h2 class="wow fadeIn"><i class="fa fa-user-secret"></i> Sponsored Employers</h2>\r\n        <p>The Sponsored Employers section feature the brand logos of employers prominently. This is an extra service that may be included as value added services with Advertisement packages.</p>\r\n      </div>\r\n    </div>\r\n  </section>', '2016-01-18 08:13:51', '2016-03-16 08:08:39'),
(2, 'privacy', '<p>This is a this <strong>is</strong> it</p>\r\n', '2016-01-18 08:41:51', '2016-01-18 08:50:22'),
(3, 'terms', '<p>way</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>looool</strong></p>\r\n', '2016-01-18 08:50:31', '2016-01-18 08:50:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `non_academics`
--

CREATE TABLE IF NOT EXISTS `non_academics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `non_academics_user_id_foreign` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `non_academics`
--

INSERT INTO `non_academics` (`id`, `user_id`, `title`, `description`, `roles`, `date`, `created_at`, `updated_at`) VALUES
(11, 28, 'Monkeyasd', 'Monkey 1', 'Monkey 2', '2014-10-01', '2017-06-18 20:40:24', '2017-06-28 23:18:46'),
(12, 28, 'Tiger', 'Toger', 'Tiger', '2009-05-01', '2017-06-18 20:42:34', '2017-07-05 00:20:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `viewed` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `from_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `type`, `subject`, `url`, `viewed`, `created_at`, `updated_at`, `from_id`) VALUES
(1, 9, 'message', 'New Message from Zams2', '/messages', 1, '2015-12-03 09:06:24', '2016-02-16 09:00:48', 11),
(2, 8, 'message', 'New Message from test', '/messages', 1, '2015-12-07 08:02:58', '2015-12-07 08:06:43', 9),
(3, 10, 'message', 'New Message from tetete dfee322', '/messages', 0, '2016-01-28 10:00:55', '2016-01-28 10:00:55', 9),
(4, 2, 'message', 'New Message from Hizam Mohd', '/messages', 0, '2016-01-28 15:06:29', '2016-02-16 09:00:48', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orchestra_options`
--

CREATE TABLE IF NOT EXISTS `orchestra_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orchestra_options_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `orchestra_options`
--

INSERT INTO `orchestra_options` (`id`, `name`, `value`) VALUES
(1, 'site', 'a:4:{s:4:"name";s:5:"XRemo";s:5:"theme";a:2:{s:8:"frontend";s:7:"default";s:7:"backend";s:7:"default";}s:11:"description";s:0:"";s:11:"registrable";b:1;}'),
(2, 'email', 'a:13:{s:6:"driver";s:7:"mailgun";s:4:"host";s:20:"smtp.mandrillapp.com";s:4:"port";s:3:"587";s:4:"from";a:2:{s:7:"address";s:16:"mailer@xremo.com";s:4:"name";s:5:"XRemo";}s:10:"encryption";s:3:"tls";s:8:"username";s:18:"xremosdn@gmail.com";s:8:"password";s:216:"eyJpdiI6InZXUjM4NVlkbmF1RmJHSytMbjNmb3c9PSIsInZhbHVlIjoiZ2JIMnNsODBEUW42bnprWCttXC9Td1JmeUNrUzlFVlZXSnFyUWNobUh1eFk9IiwibWFjIjoiMjQxZTc1OTAyOGQ1ZDlmMjFiYjA2ZWIyZTI0NjFhMmQxZDA0YTU5NjU3NGFjNDBlOThlNTZhNmRkMzVmNDc0NiJ9";s:8:"sendmail";s:22:"/usr/sbin/sendmail -bs";s:5:"queue";b:0;s:3:"key";s:192:"eyJpdiI6ImxtbTFib1VqeTNLVTNjXC9EbWxKMGVRPT0iLCJ2YWx1ZSI6IjdwM0hNRENRb1hSTEpiVG4yYXNOU1E9PSIsIm1hYyI6IjNhNzVkNDY2MzJlZGJjOWYzNzg3ZjI5MmUwNWY3OTA4ODFkZWQ3NjhmODY1YzE1MGYzMjA3MGNhMGQ3OTc2NWYifQ==";s:6:"secret";s:244:"eyJpdiI6InJoN1JiYko1Y0tUbE9Rc0RBbVIwRXc9PSIsInZhbHVlIjoiZVBZQnBtTFQ0bUI1T0JiV0s1QnhjM3FVUnZRMVd0YkZ5SWxXSHNFbGNzaHBQRjVQYWJwWGk4NVBXYXBndHJWaCIsIm1hYyI6ImI5ZWNjMzYxZDVmMWFhYWExM2NjNDZiMmEzNWYwYmI0NGQ5OGZjMzU1NDA2MDczNzNhYTkyNzlmZDg4ZmJiZDYifQ==";s:6:"domain";s:13:"nmg.xremo.com";s:6:"region";s:9:"us-east-1";}'),
(3, 'acl_orchestra', 'a:3:{s:3:"acl";a:2:{s:3:"1:0";b:1;s:3:"1:1";b:1;}s:7:"actions";a:2:{i:0;s:16:"manage-orchestra";i:1;s:12:"manage-users";}s:5:"roles";a:5:{i:0;s:5:"guest";i:1;s:13:"administrator";i:2;s:6:"member";i:3;s:8:"employer";i:4;s:10:"job-seeker";}}'),
(4, 'extensions', 'a:2:{s:9:"available";a:1:{s:17:"orchestra/control";a:7:{s:4:"path";s:25:"vendor::orchestra/control";s:11:"source-path";s:25:"vendor::orchestra/control";s:4:"name";s:7:"Control";s:6:"config";a:0:{}s:8:"autoload";a:0:{}s:8:"provides";a:1:{i:0;s:40:"Orchestra\\Control\\ControlServiceProvider";}s:6:"plugin";s:31:"Orchestra\\Control\\ControlPlugin";}}s:6:"active";a:1:{s:17:"orchestra/control";a:7:{s:4:"path";s:25:"vendor::orchestra/control";s:11:"source-path";s:25:"vendor::orchestra/control";s:4:"name";s:7:"Control";s:6:"config";a:0:{}s:8:"autoload";a:0:{}s:8:"provides";a:1:{i:0;s:40:"Orchestra\\Control\\ControlServiceProvider";}s:6:"plugin";s:31:"Orchestra\\Control\\ControlPlugin";}}}'),
(5, 'extension_orchestra/control', 'a:3:{s:9:"localtime";b:0;s:10:"admin_role";i:1;s:11:"member_role";i:2;}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `packagebatches`
--

CREATE TABLE IF NOT EXISTS `packagebatches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `package_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `packagebatches`
--

INSERT INTO `packagebatches` (`id`, `name`, `created_by`, `created_at`, `updated_at`, `package_id`) VALUES
(1, '20160515-908912', 1, '2016-05-14 19:59:35', '2016-05-14 19:59:35', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `remark` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `valid_days` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `packages`
--

INSERT INTO `packages` (`id`, `name`, `description`, `remark`, `created_at`, `updated_at`, `from`, `to`, `status`, `valid_days`) VALUES
(1, 'Package 9852', 'package data woo1', 'wooo 1data package', '2015-12-09 08:00:12', '2016-05-14 19:56:57', '2015-12-29', '2016-12-29', 'active', 15),
(2, 'Pokcakte', 'egwgwe', 'gewgweg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2015-12-29', '2016-12-29', 'active', 0),
(3, 'testpackage wooo', 'woopackage', 'tested', '2015-12-15 06:59:19', '2015-12-15 06:59:19', '2015-12-29', '2016-12-29', 'active', 0),
(4, '', '', '', '2015-12-15 07:05:11', '2015-12-15 07:05:11', '2015-12-29', '2016-12-29', 'active', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `package_purchases`
--

CREATE TABLE IF NOT EXISTS `package_purchases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `package_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `total_amount_with_tax` int(11) NOT NULL,
  `receipt_number` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `package_purchases`
--

INSERT INTO `package_purchases` (`id`, `package_id`, `purchase_id`, `quantity`, `total_amount`, `total_amount_with_tax`, `receipt_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 25, 25, '', 'new', '2016-06-03 19:42:07', '2016-06-03 19:42:07'),
(2, 4, 2, 2, 23, 23, '', 'new', '2016-06-03 22:32:13', '2016-06-03 22:32:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `package_user`
--

CREATE TABLE IF NOT EXISTS `package_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `package_id` int(10) unsigned NOT NULL,
  `invoice_number` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `running_number` int(11) NOT NULL DEFAULT '0',
  `bought_on` date NOT NULL DEFAULT '2016-02-06',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('zam3858@gmail.com', '4814690938f2de99af5eda0edc1a691ec45904ba577f74f4787bdf88f042cd9b', '2016-02-21 03:45:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pins`
--

CREATE TABLE IF NOT EXISTS `pins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'company',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Dumping data untuk tabel `pins`
--

INSERT INTO `pins` (`id`, `user_id`, `item_id`, `type`, `created_at`, `updated_at`) VALUES
(15, 9, 2, 'company', '2016-04-18 07:16:41', '2016-04-18 07:16:41'),
(35, 9, 115, 'job', '2016-04-19 08:24:01', '2016-04-19 08:24:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `position_levels`
--

CREATE TABLE IF NOT EXISTS `position_levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `position_levels`
--

INSERT INTO `position_levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Junior', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Senior', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Executive', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `position_specializations`
--

CREATE TABLE IF NOT EXISTS `position_specializations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `position_specializations`
--

INSERT INTO `position_specializations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'UI/IX2', '0000-00-00 00:00:00', '2016-03-27 03:05:20'),
(2, 'Big Data', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'GIS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'PLC', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Mobile IOS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Mobile Android', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Mobile Hybrid', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Machine Learning', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Academics', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile_cultures`
--

CREATE TABLE IF NOT EXISTS `profile_cultures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `video_type` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `video_link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `back_color` text COLLATE utf8_unicode_ci NOT NULL,
  `text_color` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `profile_cultures`
--

INSERT INTO `profile_cultures` (`id`, `user_id`, `video_type`, `video_link`, `description`, `created_at`, `updated_at`, `back_color`, `text_color`) VALUES
(1, 3, 'vimeo', '<iframe src="https://player.vimeo.com/video/120630545" width="560" height="315" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', 'I like water. so when i look at water... i like water\r\n', '2015-11-08 07:24:43', '2015-11-08 07:24:43', '', ''),
(5, 3, '', 'zthQPe41w24', '<p>test me if u can</p>\r\n', '2015-11-30 09:42:04', '2015-11-30 09:42:04', '#f48181', ''),
(6, 16, 'youtube', 'zV0facLoRJA', '<p>dasyatttt</p>\r\n', '2016-01-14 10:05:54', '2016-01-14 10:05:54', '#dde85e', ''),
(7, 2, 'youtube', 'd4OKvc-eOpM', 'this the unleashed video', '2016-03-27 03:28:50', '2016-03-27 03:28:50', '#e40202', '#d0d0d0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile_uploads`
--

CREATE TABLE IF NOT EXISTS `profile_uploads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=142 ;

--
-- Dumping data untuk tabel `profile_uploads`
--

INSERT INTO `profile_uploads` (`id`, `user_id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(34, 3, '3_95644ed390454a01e316a1fd7918db6942167720.jpg', 'cover', '2015-11-07 09:04:46', '2015-11-07 09:04:46'),
(38, 3, '3_52962c8c9db8e948e74227ade82b9171525076ed.jpg', 'profile_photo', '2015-11-07 09:05:52', '2015-11-07 09:05:52'),
(41, 9, '9_340482ad9aa2ef0204c1e37625f1aef183b02735.jpg', 'avatar', '2015-11-28 02:07:59', '2015-11-28 02:07:59'),
(42, 9, '9_eb8dcf08dc84c78803c2c011da891eebb5bf78f4.jpg', 'avatar', '2015-11-30 05:38:34', '2015-11-30 05:38:34'),
(43, 3, '3_2bfc784ebefc60f4d1f0856b13ae3ddf49ec77cc.jpg', 'profile_photo', '2015-11-30 09:27:01', '2015-11-30 09:27:01'),
(44, 9, '9_332256d512cae6a3322456c5940103fdf73f7b9f.jpg', 'avatar', '2016-01-04 20:10:35', '2016-01-04 20:10:35'),
(45, 9, '9_1b9fd40b3907b4971b4afd7c4139e8c0f2755cd7.jpg', 'avatar', '2016-01-04 20:11:12', '2016-01-04 20:11:12'),
(46, 9, '9_6a3c71725d53853cd80692a549f4939fc58f8651.jpg', 'avatar', '2016-01-04 20:37:20', '2016-01-04 20:37:20'),
(47, 9, '9_3b0741761fa740a5bdc5851dcb9afca0c29b6ead.jpg', 'avatar', '2016-01-04 20:53:20', '2016-01-04 20:53:20'),
(48, 9, '9_cd25449a87fc7abcfb56db5628c3805f5ad12907.jpg', 'avatar', '2016-01-04 20:55:57', '2016-01-04 20:55:57'),
(49, 9, '9_b08c51fae9c92e06ced713e408bafbe1ed864126.jpg', 'avatar', '2016-01-04 22:13:41', '2016-01-04 22:13:41'),
(50, 9, '9_302719518f3b6d4e336cf6d44e72f4a079659d82.jpg', 'avatar', '2016-01-04 22:18:16', '2016-01-04 22:18:16'),
(51, 9, '9_2047c6ae9acef49d0148f0d9b5eac0a2e916e3b2.jpg', 'avatar', '2016-01-05 02:06:28', '2016-01-05 02:06:28'),
(52, 9, '9_5b91a0a9e75ef66962220326dd95c66de16e0096.jpg', 'avatar', '2016-01-05 02:07:32', '2016-01-05 02:07:32'),
(53, 9, '9_19238dbe68f9170daa5756dfbd1d5729234ddd81.jpg', 'avatar', '2016-01-05 09:04:29', '2016-01-05 09:04:29'),
(54, 3, '3_de483c899712bbf126f6bfa56998399501886522.png', 'cover', '2016-01-08 05:19:38', '2016-01-08 05:19:38'),
(55, 16, '16_12ead9c1ab1d8b992d39345dbe263136207f0d83.png', 'cover', '2016-01-14 09:09:35', '2016-01-14 09:09:35'),
(56, 16, '16_dc64cac1daaba6c922ce918ea7b5b4112bf6824c.png', 'cover', '2016-01-14 09:17:52', '2016-01-14 09:17:52'),
(57, 16, '16_08386270b7c5dd4d6e975fbc22de669b2d7b76c6.png', 'cover', '2016-01-14 09:21:33', '2016-01-14 09:21:33'),
(58, 16, '16_99cc459a4ffd1dd631d9ab033133a192e8b698a0.jpg', 'cover', '2016-01-14 09:22:09', '2016-01-14 09:22:09'),
(59, 16, '16_9114b96de6a46c2fe5c1a4e55770e5eb31c1e637.jpg', 'cover', '2016-01-14 09:23:10', '2016-01-14 09:23:10'),
(60, 16, '16_eb3934f86ce18f7549c00c1a9c1f80ef6ff9a199.jpg', 'profile_photo', '2016-01-14 09:57:44', '2016-01-14 09:57:44'),
(61, 16, '16_ac1f7d3596bbcd71bf4cf00bdb66fa384ab63e1f.png', 'profile_photo', '2016-01-14 10:00:47', '2016-01-14 10:00:47'),
(76, 9, '9_7cd1d4118c991d74a177d0596412d95b9198e21d.png', 'avatar', '2016-02-16 07:38:42', '2016-02-16 07:38:42'),
(78, 9, '9_5ead36f94ef6e65cccad86470ed102c8c4a98c91.png', 'avatar', '2016-03-06 07:42:59', '2016-03-06 07:42:59'),
(79, 9, '9_82d9929b6cfc740687fb1dd8c3edd27a56917662.png', 'avatar', '2016-03-06 07:44:41', '2016-03-06 07:44:41'),
(80, 9, '9_1b7002645ab11275a1d2da2acc1c139d9f4568a6.png', 'avatar', '2016-03-06 08:17:09', '2016-03-06 08:17:09'),
(81, 9, '9_1a95d9d2769a5e57f8f9c933d31f41186a5fc7ff.png', 'avatar', '2016-03-06 08:18:14', '2016-03-06 08:18:14'),
(90, 2, '246.jpg', 'avatar', '2016-03-13 02:39:42', '2016-03-22 05:53:35'),
(92, 9, '9_697cbef06e6696f2b381bc6575ca579d0c87717e.jpg', 'avatar', '2016-03-14 06:54:16', '2016-03-14 06:54:16'),
(103, 2, '2_c3b1c8bcd55c958947bd92baf17bdaacddf0760b.jpg', 'cover', '2016-03-17 18:09:46', '2016-03-17 18:09:46'),
(118, 2, '265.jpg', 'profile_photo', '2016-03-22 05:27:44', '2016-03-22 05:27:44'),
(119, 2, '17.jpg', 'profile_photo', '2016-03-22 05:29:10', '2016-03-22 05:29:10'),
(120, 2, '17.jpg', 'profile_photo', '2016-03-22 05:43:40', '2016-03-22 05:43:40'),
(121, 2, '241.jpg', 'profile_photo', '2016-03-22 05:46:38', '2016-03-22 05:46:38'),
(122, 2, '241.jpg', 'profile_photo', '2016-03-22 05:48:36', '2016-03-22 05:48:36'),
(123, 2, 'mscmCalendar2.png', 'profile_photo', '2016-03-25 20:46:23', '2016-03-25 20:46:23'),
(124, 2, 'DSC_0237.JPG', 'profile_photo', '2016-03-25 21:40:26', '2016-03-25 21:40:26'),
(125, 2, 'DSC_0234.JPG', 'profile_photo', '2016-03-25 21:41:06', '2016-03-25 21:41:06'),
(127, 2, 'DSC_0236.JPG', 'profile_photo', '2016-03-25 21:50:21', '2016-03-25 21:50:21'),
(128, 2, 'DSC_0224.JPG', 'profile_photo', '2016-03-25 21:50:53', '2016-03-25 21:50:53'),
(129, 2, 'DSC_0233.JPG', 'profile_photo', '2016-03-25 21:53:05', '2016-03-25 21:53:05'),
(133, 29, '29_db83ec16af8a7bc4fa42b43fc4c54e55585715bb.jpg', 'avatar', '2017-02-27 23:35:57', '2017-02-27 23:35:57'),
(134, 28, '28_299035eb2a99164ee1f62bc86ea814698859a6c3.jpeg', 'avatar', '2017-05-22 21:58:31', '2017-05-22 21:58:31'),
(135, 28, '28_04166b65ee935a7f26bd85b44528243c366ef686.jpg', 'avatar', '2017-05-22 21:59:30', '2017-05-22 21:59:30'),
(136, 26, '26_0e2bb30f6daa8c7c14d6244aefeecc72eecc0a23.jpeg', 'avatar', '2017-05-22 22:08:38', '2017-05-22 22:08:38'),
(137, 26, '26_99982250c4b4969193a661f7c3fb2584f72cd896.jpg', 'avatar', '2017-05-22 22:09:45', '2017-05-22 22:09:45'),
(138, 26, '26_2fcdc7a3f4d1a8db43a0383287ae8061f3c1810e.jpeg', 'avatar', '2017-05-23 20:45:33', '2017-05-23 20:45:33'),
(139, 28, '28_d0e7c08416f7110e98e4dd48d11c08f604423fb0.jpg', 'avatar', '2017-06-19 19:32:29', '2017-06-19 19:32:29'),
(140, 28, '28_98e97eef21b482b67b34a1159f89552391bc7ee8.jpg', 'avatar', '2017-06-19 19:35:06', '2017-06-19 19:35:06'),
(141, 54, '54_ec8761509e47638ec23f59c3073bce08_17112017.jpg', 'profile_photo', '2017-11-14 17:00:00', '2017-11-16 22:07:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `package_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `yearly_count` int(11) NOT NULL,
  `receipt_number` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `total_price_after_tax` decimal(10,2) NOT NULL,
  `receipt_ref` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_status` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `purchases`
--

INSERT INTO `purchases` (`id`, `package_id`, `user_id`, `yearly_count`, `receipt_number`, `total_price`, `total_price_after_tax`, `receipt_ref`, `payment_date`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 0, 2, 1, '20160000000001', '61.00', '61.22', '', NULL, 'pending', '2016-06-03 19:42:07', '2016-06-03 19:42:08'),
(2, 0, 2, 2, '20160000000002', '59.00', '59.00', '', NULL, 'pending', '2016-06-03 22:32:13', '2016-06-03 22:32:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bio_meta_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `endorser_id` int(10) unsigned NOT NULL,
  `rating` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `skill_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ratings_bio_meta_id_foreign` (`bio_meta_id`),
  KEY `ratings_user_id_foreign` (`user_id`),
  KEY `ratings_endorser_id_foreign` (`endorser_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `ratings`
--

INSERT INTO `ratings` (`id`, `bio_meta_id`, `user_id`, `endorser_id`, `rating`, `created_at`, `updated_at`, `skill_id`) VALUES
(1, 1, 28, 26, 3.00, '2017-07-05 23:09:42', '2017-07-05 23:09:42', 0),
(2, 1, 28, 26, 3.00, '2017-07-05 23:09:54', '2017-07-05 23:09:54', 0),
(3, 1, 28, 26, 3.00, '2017-07-05 23:13:54', '2017-07-05 23:13:54', 0),
(4, 1, 28, 26, 3.00, '2017-07-05 23:14:39', '2017-07-05 23:14:39', 0),
(5, 1, 28, 26, 3.00, '2017-07-05 23:20:43', '2017-07-05 23:20:43', 0),
(6, 1, 28, 26, 3.00, '2017-07-05 23:23:17', '2017-07-05 23:23:17', 0),
(7, 1, 28, 26, 3.00, '2017-07-05 23:23:41', '2017-07-05 23:23:41', 0),
(8, 4, 28, 26, 3.00, '2017-07-05 23:30:59', '2017-07-05 23:30:59', 0),
(9, 1, 28, 28, 4.00, '2017-07-06 20:25:12', '2017-07-06 20:25:12', 14),
(10, 3, 28, 28, 4.00, '2017-07-06 20:40:50', '2017-07-06 20:40:50', 14),
(11, 3, 28, 26, 3.00, '2017-07-06 20:48:58', '2017-07-06 20:48:58', 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bio_meta_id` int(10) unsigned NOT NULL,
  `endorser_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `skill_id` int(10) unsigned NOT NULL,
  `rating` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_skill_id_foreign` (`skill_id`),
  KEY `reviews_bio_meta_id_foreign` (`bio_meta_id`),
  KEY `reviews_user_id_foreign` (`user_id`),
  KEY `reviews_endorser_id_foreign` (`endorser_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `reviews`
--

INSERT INTO `reviews` (`id`, `bio_meta_id`, `endorser_id`, `user_id`, `skill_id`, `rating`, `created_at`, `updated_at`) VALUES
(1, 3, 26, 28, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-07-14 00:45:11', '2017-07-14 00:45:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrator', '2016-02-05 19:40:19', '2016-02-05 19:40:19', NULL),
(2, 'Member', '2016-02-05 19:40:19', '2016-02-05 19:40:19', NULL),
(3, 'Employer', '2015-10-18 09:13:55', '2015-10-18 09:13:55', NULL),
(4, 'Job Seeker', '2015-10-18 09:17:30', '2015-10-18 09:17:30', NULL),
(5, 'Student', '2015-10-18 09:17:30', '2015-10-18 09:17:30', NULL),
(6, 'Blogger', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `seek_lists`
--

CREATE TABLE IF NOT EXISTS `seek_lists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `applicant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `seek_lists`
--

INSERT INTO `seek_lists` (`id`, `user_id`, `applicant_id`, `created_at`, `updated_at`) VALUES
(5, '26', '9', '2017-06-05 20:00:16', '2017-06-05 20:00:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `service_items`
--

CREATE TABLE IF NOT EXISTS `service_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `operation_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `service_items`
--

INSERT INTO `service_items` (`id`, `name`, `value`, `operation_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'job_post', '4.00', 'post_job', 0, '2015-12-10 20:35:52', '2016-05-14 07:45:57'),
(2, 'unlock_cv', '2.00', 'unlock_cv', 0, '2015-12-10 20:36:22', '2015-12-10 20:36:22'),
(3, 'special_post', '1.00', '', 0, '2015-12-11 01:55:59', '2015-12-11 01:55:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `service_item_package`
--

CREATE TABLE IF NOT EXISTS `service_item_package` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `package_id` int(10) unsigned NOT NULL,
  `service_item_id` int(10) unsigned NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tax_rate` decimal(4,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=44 ;

--
-- Dumping data untuk tabel `service_item_package`
--

INSERT INTO `service_item_package` (`id`, `package_id`, `service_item_id`, `value`, `quantity`, `created_at`, `updated_at`, `tax_rate`) VALUES
(32, 3, 1, '4.00', 5, '2015-12-15 06:59:28', '2015-12-15 06:59:28', '0.00'),
(33, 3, 2, '2.00', 4, '2015-12-15 06:59:29', '2015-12-15 06:59:29', '0.00'),
(34, 4, 1, '4.00', 4, '2015-12-15 07:27:28', '2015-12-15 07:27:28', '0.00'),
(35, 4, 2, '2.00', 2, '2015-12-15 07:27:28', '2015-12-15 07:27:28', '0.00'),
(36, 4, 3, '1.00', 3, '2015-12-15 07:27:29', '2015-12-15 07:27:29', '0.00'),
(41, 1, 1, '4.00', 4, '2016-05-28 09:26:30', '2016-05-28 09:26:30', '0.40'),
(42, 1, 2, '2.00', 2, '2016-05-28 09:26:30', '2016-05-28 09:26:30', '0.30'),
(43, 1, 3, '1.00', 5, '2016-05-28 09:26:30', '2016-05-28 09:26:30', '0.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `service_item_usages`
--

CREATE TABLE IF NOT EXISTS `service_item_usages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `receipt_number` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `service_item_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `model` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `model_id` int(10) unsigned NOT NULL DEFAULT '0',
  `inventory_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `shortlists`
--

CREATE TABLE IF NOT EXISTS `shortlists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `applicant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `imagename` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `skills`
--

INSERT INTO `skills` (`id`, `name`, `description`, `imagename`, `created_at`, `updated_at`) VALUES
(1, 'Customer Service', 'Customer Service', 'skill-icon-11.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Critical Thinking', 'Critical Thinking', 'skill-icon-07.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Project Manager', 'Project Manager', 'skill-icon-03.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Research Skill', 'Research Skill', 'skill-icon-12.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Creative Skill', 'Creative Skill', 'skill-icon-08.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Multitasking', 'Multitasking', 'skill-icon-04.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Time Management', 'Time Management', 'skill-icon-13.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Leadership', 'Leadership', 'skill-icon-09.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Quick Learner', 'Quick Learner', 'skill-icon-05.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Communication Skill', 'Communication Skill', 'skill-icon-14.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Teamwork', 'Teamwork', 'skill-icon-10.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Sales', 'Sales', 'skill-icon-06.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skills_users`
--

CREATE TABLE IF NOT EXISTS `skills_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `skill_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data untuk tabel `skills_users`
--

INSERT INTO `skills_users` (`id`, `user_id`, `skill_id`, `created_at`, `updated_at`) VALUES
(11, 9, 2, '2016-01-14 11:08:41', '2016-01-14 11:08:41'),
(12, 9, 3, '2016-01-14 11:08:41', '2016-01-14 11:08:41'),
(13, 9, 4, '2016-01-14 11:08:41', '2016-01-14 11:08:41'),
(14, 9, 10, '2016-01-14 11:08:41', '2016-01-14 11:08:41'),
(15, 23, 2, '2016-02-01 04:20:09', '2016-02-01 04:20:09'),
(16, 23, 4, '2016-02-01 04:20:09', '2016-02-01 04:20:09'),
(17, 23, 10, '2016-02-01 04:20:10', '2016-02-01 04:20:10'),
(18, 23, 12, '2016-02-01 04:20:10', '2016-02-01 04:20:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data untuk tabel `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`, `created_at`, `updated_at`) VALUES
(16, 1, 'Perlis', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 1, 'Kedah', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 1, 'Pulau Pinang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 1, 'Ipoh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 1, 'Selangor', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 1, 'WP Kuala Lumpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 1, 'WP Putrajaya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 1, 'Negeri Sembilan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 5, 'DKI Jakarta', '2017-11-13 17:00:00', '2017-11-13 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `student_bios`
--

CREATE TABLE IF NOT EXISTS `student_bios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `youtubelink` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quote` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `summary` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_bios_user_id_foreign` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=43 ;

--
-- Dumping data untuk tabel `student_bios`
--

INSERT INTO `student_bios` (`id`, `user_id`, `youtubelink`, `quote`, `summary`, `gender`, `date_of_birth`, `occupation`, `created_at`, `updated_at`, `contact_number`) VALUES
(35, 28, 'txbTB3dno4s', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\nLorem ipsum dolor sit ', 'Male', '1991-04-12', 'Student', '2017-02-27 00:30:05', '2017-06-19 19:51:22', '012345678'),
(36, 0, NULL, NULL, NULL, '0', '0000-00-00', '0', NULL, NULL, '0'),
(37, 0, NULL, NULL, NULL, 'Female', '0000-00-00', 'student', NULL, NULL, '083894896368'),
(38, 0, NULL, NULL, NULL, 'Female', '0000-00-00', 'student', NULL, NULL, '083894896368'),
(39, 0, NULL, NULL, NULL, 'Female', '0000-00-00', 'student', NULL, NULL, '083894896368'),
(40, 0, NULL, NULL, NULL, 'Female', '0000-00-00', 'student', NULL, NULL, '083894896368'),
(41, 0, NULL, NULL, NULL, 'Female', '0000-00-00', 'student', NULL, NULL, '083894896368'),
(42, 54, 'yoaisudoajsdk', 'Own your work, no matter how small it is, always build, create and do exceptional things', 'Own your work, no matter how small it is, always build and create', 'Female', '1989-12-06', 'Web Developer', '2017-11-13 17:00:00', '2017-11-16 22:07:11', '+6283894896368');

-- --------------------------------------------------------

--
-- Struktur dari tabel `student_skills`
--

CREATE TABLE IF NOT EXISTS `student_skills` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `skills` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_skills_user_id_foreign` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `student_skills`
--

INSERT INTO `student_skills` (`id`, `user_id`, `title`, `description`, `created_at`, `updated_at`, `skills`) VALUES
(4, 28, 'Project Name', 'Skill Description', '2017-05-23 00:31:09', '2017-07-03 00:19:34', 'Example 1; Example 2; Example 3'),
(5, 28, 'Add new Skill', 'skills description', '2017-06-22 06:11:24', '2017-07-05 19:59:03', 'skill 1; skill two; skill three'),
(9, 28, 'Project Test', 'Test Description', '2017-07-03 00:03:32', '2017-07-03 00:03:32', 'Example 1; Example 2'),
(8, 28, 'New Object', 'Meta Object 1', '2017-06-30 00:12:09', '2017-07-04 22:56:40', 'Testing;1;2;3'),
(10, 54, 'Web Project Xremo', 'Create Job portal website', '2017-11-13 17:00:00', '2017-11-13 17:00:00', 'PHP, MySQL, Codeigniter, Laravel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `summary_monthly_reports`
--

CREATE TABLE IF NOT EXISTS `summary_monthly_reports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date_purchase` date DEFAULT NULL,
  `invoice_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `package_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `gst` decimal(10,2) DEFAULT NULL,
  `total` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `university`
--

CREATE TABLE IF NOT EXISTS `university` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `email_format` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `university`
--

INSERT INTO `university` (`id`, `name`, `domain`, `email_format`, `created`, `updated`) VALUES
(1, 'Binus University', 'binus.ac.id', 'binus.ac.id', '2017-11-10 02:16:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `preference_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_time` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=59 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `fullname`, `preference_name`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `slug`, `verified`, `verification_token`, `first_time`) VALUES
(1, 'zam3858@gmail.com', '$2y$10$qscPS58w/AnkxGZkhBA2BOAR.ca.lcXkgYf5.jwuWsefe2h.7NrKK', 'Administrator', '', 1, '7pXA62xM2DTfoGhmjRHHg8ygg8KXT3bluOsY4jyDBOrWTkO98t1OGv4KhwSN', '2015-10-18 08:31:52', '2016-05-28 09:28:22', NULL, '', 1, NULL, 0),
(2, 'zam7eight@gmail.com', '$2y$10$zAiB7xzuAeKIEU95c03Mz.o5jfTc5p0anqoZoEe3YMvpUw7JnzHum', 'Hizam Mohd', '', 1, 'rrDyLRhMNkSoWVyc3YXe6Ipa0jFF7ebFCGeQ8dnwirv2prTvBhALvor6l4j2', '2015-10-18 09:18:11', '2016-06-05 02:32:16', NULL, '', 1, NULL, 0),
(3, 'zam3858@yahoo.com', '$2y$10$85J.Prb9W6n2V9GTKj.K1OpHOADRh3n7bRMYY6EQ5HW.coorwvAZ2', 'Zams2', '', 0, 'VCZoWP7Upldi0FYNHGOsQF73dJLL5MMi7BxyLGuqFuPChUuLgkXOawR3HkS9', '2015-10-18 09:18:34', '2016-02-01 04:46:22', NULL, '', 1, NULL, 1),
(9, 'dark.kensei@gmail.com', '$2y$10$zAiB7xzuAeKIEU95c03Mz.o5jfTc5p0anqoZoEe3YMvpUw7JnzHum', 'tetete dfee', '', 1, 'iwFiJfcYclDgCwspGOqu0Jw4pgyRyx2dktU31oTU08ZWVRM2nFG6qUsmd548', '2015-10-27 08:05:02', '2016-05-31 08:37:23', NULL, '', 1, 'kssTpP1QLG93lFch3Kj6TlsNyGqkE8', 0),
(25, 'fakhrur@yahoo.com', '$2y$10$BZNsffUoVxjAvAC3Kg6xjOSJE6U/R0GJgCrrjjXwvwJ7rz9kx3.Ae', 'Shaeleigh Petty', '', 1, 'iR62Qp6g4biiTRbVp2yHDJnzuO9GCbRiJ41L6mB5Y5bm9uZqsVQ9VHjZtDnU', '2016-02-06 08:04:37', '2016-02-06 10:27:38', NULL, '', 1, NULL, 1),
(26, 'employer_1@hotmail.com', '$2y$10$S0c8otO4UDGzbQcE/ZsOwOHutNUi2zENC3vaTLUTO04qTfNsF7OR6', 'Employer', '', 1, 'TJgVPBqTHTKFnGqCcIUAWH60Xgv6mI5TI3DItmB52qqzxcmCpUvAg4uBVm0M', '2017-02-06 23:23:09', '2017-07-09 23:38:16', NULL, '', 1, 'mAEvqTNCeSpdG8E2G4e4eC42c0XRgT', 0),
(27, 'jobseeker_1@hotmail.com', '$2y$10$A3xf5BgoyQX5z7dPLTojP./FkII3IXz43NNURQ1MBDdEu4NVBNs.i', 'Job Seeker', '', 1, 'HdMSNSCKs1YddxT30y3eCe9PkwafW7K5mjg4OPJ9cOS4kN3tgOeWvhw1YrfU', '2017-02-13 23:56:06', '2017-04-09 19:31:51', '2017-04-09 19:31:51', '', 0, NULL, 0),
(28, 'student_1@hotmail.com', '$2y$10$3MXSF4Q5TdXw4h5a4J9ra.XtDOnann/zorYcm.7aECZkJPW4Sij3y', 'John Wazowsky', '', 1, '07vy6p4zFlAAjXdtgstbj42X7LEGWNktHVSQexCer6P0HptpiyJ0uEynmJFZ', '2017-02-14 19:53:24', '2017-07-13 21:36:22', NULL, '', 1, 'XO6YNa5ZasAi1JmAxa2KMWAH9Hg0om', 0),
(29, 'admin_afiq@hotmail.com', '$2y$10$TtqELOX6sEbyUPz5mEYAie8GN.m.cwA8WifcvwwlNoCSOA/89BZd2', 'Admin', '', 1, 'oqvEI6BJUNaw2yK3cA4VWE6Wrfpem2T2gfpIzmAsLzb2JTTTXDXK4JT3ADTi', '2017-02-27 23:35:12', '2017-06-12 21:42:23', NULL, '', 1, '9TibPulM7gczjHyV7tTp7SfNIIrG33', 0),
(30, 'dudette@hotmail.com', '$2y$10$I.1s2Ck6x3gSs/yyeVVWWu2pSFgOyRJvoNP.ihKTjW0UTToxB4sBm', 'Dude Meister', '', NULL, NULL, '2017-03-02 01:21:42', '2017-03-02 01:21:42', NULL, '', 0, '43Z7UuPCBVUiMPQ7pvvLry1YQkAJYL', 1),
(32, 'jobseeker@hotmail.com', '$2y$10$s4LiXB1SaKiF3waeS0Wuw.sBtF6C5nXFI5rIftCrIYL.ycB9GdflC', 'Job Seek', '', 1, 'Yx1xhfaIHojLAkHfiJLzHahsSr826rvdLvPLTZdyCkBYykpOPWNLCprveWpD', '2017-04-09 19:34:10', '2017-05-19 00:35:50', NULL, '', 1, 'IyB1mI0wp2wh4aRn0eF9NZqjqW45Nb', 0),
(33, 'philliphines@xremo.com', '$2y$10$fFoWAMVfTF9sP9AZYYtvKev410L1olJ.dNJzAz.paX1vPP3kujMZG', 'Test', '', 1, 'BPG4WEUNlemaKNxtJHLC2sEAhBCrcOrRmGtVbOSuzpSrrVL5ettcKQW1Dgz4', '2017-04-24 19:14:20', '2017-04-25 19:03:37', NULL, '', 1, NULL, 0),
(34, 'test44@hotmail.com', '$2y$10$s4LiXB1SaKiF3waeS0Wuw.sBtF6C5nXFI5rIftCrIYL.ycB9GdflC', 'test 44', '', 1, 'TkLOn6EHCyY0WDK8xTkPrWeDezBFFY8txhgJFTHWUdkAbjWrx8YSpgIfMmMZ', '2017-04-09 19:34:10', '2017-04-24 19:37:29', NULL, '', 1, 'IyB1mI0wp2wh4aRn0eF9NZqjqW45Nb', 0),
(35, '411@hotmail.com', '$2y$10$gYUwUnIPVTJnGuwvFZb6uecBDi8GkaYv56R6ScdDU2XyRAeHNacQW', 'test441', '', NULL, NULL, '2017-05-03 20:27:45', '2017-05-03 20:27:45', NULL, '', 0, 'zE0CVWuBSHcJttcbPoXeKOjpop3fSb', 1),
(36, '401@hotmail.com', '$2y$10$JVpdAJo2L9lAd8rFr99o4edPJ4oVQ4p8fm..E0nJIYl3a0HMzHZHy', 'test442', '', NULL, NULL, '2017-05-03 21:02:52', '2017-05-03 21:02:52', NULL, '', 0, 'CCTa5tlpiZsY6IF9xsuOKeuanvH1Ro', 1),
(37, 'null_employer@hotmail.com', '$2y$10$Uh4CEad7ZUqBGkgI59KUCu3PjN2aHvXaVe9qT9uEMNf3uKdq/o.S.', 'Null Employer', '', 1, '5Dp9Z8vY5Qn4YPZsV5FXDbuKLgG4hH5gOVuMQhSBskIqcfSfnBXIiwO1ukqQ', '2017-05-19 00:36:59', '2017-05-19 00:48:08', NULL, '', 1, 'LiSIxZRO9suxzFTYewrwK7eXnGC9Rx', 0),
(38, '7u07v4+dwtlfwngbqdo0@sharklasers.com', '$2y$10$.MLj1FxKWMdnVliUAvPRWOmpq2tBG20n3PlK9AbiExvmWGDa.PDHC', 'Student Test 1', '', NULL, NULL, '2017-05-24 19:55:08', '2017-05-24 19:55:08', NULL, '', 0, 'htnXezcY3OIQMzRKqPlk2eZnbBpKge', 1),
(39, '7u0kmg+cgxo7e1t4vx88@sharklasers.com', '$2y$10$GkYiQakq9n8Z7lK4mPX1z.bFbldWLs.AzW8/qAYhlwbL0srVyFUm2', 'testing', '', NULL, NULL, '2017-05-24 20:56:14', '2017-05-24 20:56:14', NULL, '', 0, 'DtcDWWatRaSHWSObTaQwDDJfkqLvOi', 1),
(40, 'mailer@xremo.com', '$2y$10$LWSLjhJN7Nwix.mc5TaRrOQHA7jVOnh4FSqJmTvPE/jFSBukrrrwa', 'testing', '', NULL, NULL, '2017-05-24 21:01:47', '2017-05-24 21:01:47', NULL, '', 0, 'CFIWcnDcjtTIlRcRAk5iw4aE8I3p24', 1),
(41, 'smallvile@hotmail.com', '$2y$10$lZoKPp3idg4cdGfEs2Hyk.HvlQdYTI.r9UxJBFkyXiX36cOj5e1cO', 'Bob', '', 1, 'ME3E9dhirmLHnAzlH9gwf5jxHq6iOeKfRGn3LrqGIEAKxPrqczTuLygTv6T3', '2017-05-24 23:44:22', '2017-05-24 23:47:40', NULL, '', 1, 'HrdqC2W8CXbV0VPs8r6rSE3ysID20T', 0),
(42, 'ffda@hotmail.com', '$2y$10$aK/hMy9mJx3bqhX.A/f1b.KNLkkZa3gmcEeGvMEv/IFTMtuSRNvke', 'Test', '', 1, '8EmE33toPDo0uCPVhOaP8sv9yE84CQkn0aqzfIyW4dPld0asZB4fmXgpg5NJ', '2017-05-24 23:47:54', '2017-05-25 00:24:29', NULL, '', 1, 'bS3LwTBC3dSlntXZvuXZw3vUVAQxHG', 0),
(43, 'asda@hotmail.com', '$2y$10$W04I0mAPTPNbtsIw1BF7UuTRV6iV4nlzpIwryrP/B0dkkij.VYzcq', 'test', '', 1, '0PgaBpTUCUyK3pA3WPbb3niL2SYACouDBjZ5WMsX27hwD7XaobXdDIZZKRnJ', '2017-05-31 21:16:54', '2017-05-31 21:17:24', NULL, '', 0, NULL, 0),
(44, 'asd@hotmail.com', '$2y$10$UK1d2eeFzhx4RAlR/igjA.ddH/T6JhDI479z5asdG3Sk3faJ2np9O', 'asd', '', NULL, NULL, '2017-06-12 21:13:35', '2017-06-12 21:13:35', NULL, '', 1, 'fNLhgoA1Az8evnFT7Vjazqh50qqsSt', 1),
(45, 'asdaq@hotmail.com', '$2y$10$qnEUCyyYPPmek6ZbbuTl1.1wUSe2BaadI2enGnNP0FiNDhPaR1tGy', 'asdaq', '', NULL, NULL, '2017-06-12 21:14:45', '2017-06-12 21:14:45', NULL, '', 1, 'HPxQiMoeSJKJj4IaE0P69e3EGlf9Pu', 1),
(46, 'ah@hotmail.com', '$2y$10$16sH.im8ae9XrHZtUCx5..1bhChAgiRRnCLFvd8GUxRHNtNLbQBG2', 'HI', '', NULL, NULL, '2017-06-12 21:40:08', '2017-06-12 21:40:08', NULL, '', 1, 'uez0k4E85MkH9RBMWuN8OBm9p2llw0', 1),
(47, '7zff1z+682ox9smm1iws@sharklasers.com', '$2y$10$zfRxXKC2E1/8QcnbylaU0e5V6A8FEN3D0CXkfpjsnprwrpPbBwnJK', 'trial', '', NULL, NULL, '2017-06-12 21:43:05', '2017-06-12 21:43:05', NULL, '', 1, '6rJ9exat06ipCrQ1f5mkEMH0WkXbyg', 1),
(48, '84wkkb+b4s9djamyjrjk@sharklasers.com', '$2y$10$s/zh0GribE3uqzHLPWsZgel1W34jDI384y87UW/pvL1HUOKnflMRK', 'mail tester 1', '', NULL, '0w8S85fCf5yRts2Sk3YqvBxXDpXpEBShSxqLLaQgDVa9c0W8Z6No8wzcORaP', '2017-06-27 23:15:55', '2017-06-27 23:22:21', NULL, '', 1, NULL, 0),
(49, '84wnla+b8osjw1t3058w@sharklasers.com', '$2y$10$F1Wl9vNdWaozrTI1shhO..jZmEEwUqXrNZrGJ7xfH7lMjzvD2MF4W', 'Stuu', '', NULL, 'LovK52fdffNR0ei9JCZGg4SbFVUYY2Mt6AuID76DIZoueRmEcni8gZ8lBpJB', '2017-06-27 23:22:59', '2017-06-27 23:24:23', NULL, '', 1, NULL, 0),
(50, '84wo4w+euuibxnmgzh0@sharklasers.com', '$2y$10$wMYY5PpwLlLQrD8OF3mlBuxfpnAXnCC9FavT39u0f9lkplJ0gsRRG', 'test333', '', NULL, NULL, '2017-06-27 23:24:55', '2017-06-27 23:24:55', NULL, '', 1, 'i5L4VK7leRlsOkJ9bAIDBiF4zAaWl1', 1),
(51, '84wod6+a5potmrddyuuk@sharklasers.com', '$2y$10$K0NvXSvImV49puRtF27VPOj/vY2tr3AjUPSXu8kzKD1MbQnmPK1j6', 'test3331', '', 1, 'XhZDqkxQKOcmNT3DY3bMkr0WEVl0Py2pHummkzoOcXG8jFdTnD4POfVlengM', '2017-06-27 23:25:36', '2017-06-27 23:55:35', NULL, '', 1, NULL, 0),
(54, 'dearico612@gmail.com', 'c6680e860a74a557f12daff1b995fa64', 'Dea Rico Khasandra', 'Rico', NULL, NULL, NULL, '2017-11-16 22:07:11', NULL, '', 1, NULL, 0),
(55, 'dearicokhasandra@yahoo.co.id', 'c6680e860a74a557f12daff1b995fa64', 'rico', '', NULL, NULL, NULL, NULL, NULL, '', 1, NULL, 0),
(56, 'dearicokhasandra@binus.ac.id', 'c6680e860a74a557f12daff1b995fa64', 'dearico', '', NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1),
(57, 'asdjalksdj@binus.ac.id', 'c6680e860a74a557f12daff1b995fa64', 'dearico', '', NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1),
(58, 'dearico@binus.ac.id', 'c6680e860a74a557f12daff1b995fa64', 'Dea Rico Khasandra', NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_address`
--

CREATE TABLE IF NOT EXISTS `user_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `user_address`
--

INSERT INTO `user_address` (`id`, `user_id`, `address`, `postcode`, `city`, `state`, `country`, `created_at`, `updated_at`) VALUES
(1, 54, 'Jl.M No.55 RT 004/RW 003 Cipinang, Jatinegara, Jakarta Timur', '13420', 'Jakarta', 'DKI Jakarta', 'Indonesia', '2017-11-15 02:05:10', '2017-11-16 22:07:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_employer_address`
--

CREATE TABLE IF NOT EXISTS `user_employer_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `fax_number` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_language_set`
--

CREATE TABLE IF NOT EXISTS `user_language_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `language` varchar(255) NOT NULL,
  `profieciency` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_meta`
--

CREATE TABLE IF NOT EXISTS `user_meta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_meta_user_id_name_unique` (`user_id`,`name`),
  KEY `user_meta_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `company_registration_number` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `company_industry_id` int(11) NOT NULL,
  `gst_account_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `billing_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `postcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `state_id` int(10) unsigned NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `contact_person` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_postcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_city` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_state_id` int(10) unsigned NOT NULL,
  `shipping_country_id` int(10) unsigned NOT NULL,
  `company_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `company_description` text COLLATE utf8_unicode_ci NOT NULL,
  `subdescription` text COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `company_office_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `working_hours` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dress_code` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `benefits` text COLLATE utf8_unicode_ci NOT NULL,
  `spoken_language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_staff` int(10) unsigned NOT NULL,
  `age_group_20` int(10) unsigned NOT NULL,
  `age_group_30` int(10) unsigned NOT NULL,
  `age_group_40` int(10) unsigned NOT NULL,
  `age_group_50` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `company_registration_number`, `company_industry_id`, `gst_account_number`, `billing_name`, `address`, `postcode`, `city`, `state_id`, `country_id`, `contact_person`, `phone`, `fax`, `email`, `created_at`, `updated_at`, `shipping_name`, `shipping_address`, `shipping_postcode`, `shipping_city`, `shipping_state_id`, `shipping_country_id`, `company_name`, `company_description`, `subdescription`, `url`, `company_office_number`, `working_hours`, `dress_code`, `benefits`, `spoken_language`, `total_staff`, `age_group_20`, `age_group_30`, `age_group_40`, `age_group_50`) VALUES
(4, 3, 'Day and Allen Co', 3, '110045554545', 'bill to', 'bill ship', '6000', 'bill city', 20, 3, 'Sunt aut anim quidem ut sunt molestiae et elit quia do', '+322-74-2523871', '+274-24-1834228', 'qibi@yahoo.com', '2015-11-03 06:43:21', '2016-01-25 07:59:23', 'ship to', 'address ship', '34344', 'ship city', 16, 3, 'IDonGoto University That344', 'there are things we do,\r\n\r\nthere are things that we dont\r\n444\r\nwhat are the difference\r\n\r\n                            and that is what we do\r\n\r\nand thats what we do\r\n                        \r\n                        ', '<p>i was standing here</p>\r\n\r\n<p>and then there</p>\r\n\r\n<p>and she was everywhere</p>\r\n\r\n<p>I is everywhere</p>\r\n', '', '', '', '', '', '', 0, 0, 0, 0, 0),
(5, 2, 'adfeff-0', 2, '9237236643', 'Bill n Co', '1-3a-13a', '63001', 'cyberjaya', 20, 4, 'Bill bin Ted', '2424324', '4234234234', 'Billted@gmail.com', '2016-01-14 08:48:15', '2016-05-25 08:01:32', '', '1-3a-13a, The Domain Neocyber,', '6300', 'cyberjaya', 21, 3, '', '', '                                \r\n                            ', 'http://yahoo.com', '921312', '3-6', 'casual', 'lots n lots of it', 'arabica coffeew', 3, 37, 41, 27, 29),
(6, 16, '', 0, '', '', '', '', '', 0, 0, '', '', '', '', '2016-01-26 23:50:07', '2016-01-26 23:50:07', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0),
(7, 19, '', 0, '', '', '', '', '', 0, 0, '', '', '', '', '2016-01-26 23:58:01', '2016-01-26 23:58:01', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0),
(9, 1, '', 0, '', '', '', '', '', 0, 0, '', '', '', '', '2016-01-27 07:08:09', '2016-01-27 07:08:09', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0),
(10, 22, '', 0, '', '', '', '', '', 0, 0, '', '', '', '', '2016-01-27 07:17:47', '2016-01-27 07:17:47', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0),
(11, 27, '', 0, '', '', '', '', '', 0, 0, '', '', '', '', '2017-02-14 00:16:29', '2017-02-14 00:16:29', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0),
(12, 26, 'IBC12345678', 2, '', '', 'Persiaran Lagoon, Bandar Sunway, 47500 Petaling Jaya, Selangor, Malaysia', '', '', 0, 0, '', '1234567890', '1234567890', 'HR@xremo.com', '2017-05-16 01:17:48', '2017-06-18 21:39:40', '', '', '', '', 0, 0, 'Xremo Testing Sdn. Bhd.', '', '', 'http:\\\\www.xremo.com', '', '', '', '', '', 100, 0, 0, 0, 0),
(13, 37, '', 0, '', '', '', '', '', 0, 0, '', '', '', '', '2017-05-19 00:36:59', '2017-05-19 00:36:59', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0),
(14, 44, '', 0, '', '', '', '', '', 0, 0, '', '', '', '', '2017-06-12 21:13:35', '2017-06-12 21:13:35', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0),
(15, 48, '', 0, '', '', '', '', '', 0, 0, '', '', '', '', '2017-06-27 23:15:55', '2017-06-27 23:15:55', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_projects`
--

CREATE TABLE IF NOT EXISTS `user_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `skills_acquired` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `user_projects`
--

INSERT INTO `user_projects` (`id`, `user_id`, `name`, `description`, `skills_acquired`, `created_at`, `edited_at`) VALUES
(1, 54, 'xremo website project', 'working on xremo website', 'php, mysql', '2017-11-21 08:01:12', '2017-11-21 08:01:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_role_user_id_role_id_index` (`user_id`,`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=57 ;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2015-10-18 08:31:52', '2015-10-18 08:31:52'),
(2, 2, 3, '2015-10-18 09:18:11', '2015-10-18 09:18:11'),
(4, 3, 3, '2015-10-18 09:18:49', '2015-10-18 09:18:49'),
(5, 6, 4, '2015-10-20 08:39:20', '2015-10-20 08:39:20'),
(7, 8, 4, '2015-10-20 08:49:47', '2015-10-20 08:49:47'),
(8, 9, 4, '2015-10-27 08:05:02', '2015-10-27 08:05:02'),
(9, 10, 4, '2015-11-15 01:13:25', '2015-11-15 01:13:25'),
(10, 11, 3, '2015-11-15 01:18:14', '2015-11-15 01:18:14'),
(11, 12, 4, '2015-12-29 18:56:25', '2015-12-29 18:56:25'),
(12, 13, 3, '2015-12-29 18:59:07', '2015-12-29 18:59:07'),
(13, 14, 4, '2016-01-03 05:52:51', '2016-01-03 05:52:51'),
(14, 15, 4, '2016-01-14 08:42:15', '2016-01-14 08:42:15'),
(15, 16, 3, '2016-01-14 08:43:47', '2016-01-14 08:43:47'),
(16, 17, 4, '2016-01-26 23:56:06', '2016-01-26 23:56:06'),
(17, 18, 4, '2016-01-26 23:57:08', '2016-01-26 23:57:08'),
(18, 19, 3, '2016-01-26 23:57:57', '2016-01-26 23:57:57'),
(19, 22, 3, '2016-01-27 07:17:47', '2016-01-27 07:17:47'),
(20, 23, 4, '2016-02-01 04:19:42', '2016-02-01 04:19:42'),
(21, 24, 1, '2016-02-06 05:45:03', '2016-02-06 05:45:03'),
(22, 25, 4, '2016-02-06 08:04:37', '2016-02-06 08:04:37'),
(27, 27, 4, '2017-02-13 23:56:06', '2017-02-13 23:56:06'),
(28, 28, 5, '2017-02-14 19:53:24', '2017-02-14 19:53:24'),
(29, 29, 1, '2017-02-27 23:35:12', '2017-02-27 23:35:12'),
(30, 30, 5, '2017-03-02 01:21:42', '2017-03-02 01:21:42'),
(31, 26, 3, '2017-04-09 19:17:03', '2017-04-09 19:17:03'),
(32, 32, 4, '2017-04-09 19:34:10', '2017-04-09 19:34:10'),
(33, 33, 6, '2017-04-24 19:14:20', '2017-04-24 19:14:20'),
(34, 34, 6, '2017-04-24 19:14:20', '2017-04-24 19:14:20'),
(35, 35, 5, '2017-05-03 20:27:45', '2017-05-03 20:27:45'),
(36, 36, 5, '2017-05-03 21:02:52', '2017-05-03 21:02:52'),
(37, 37, 3, '2017-05-19 00:36:59', '2017-05-19 00:36:59'),
(38, 38, 5, '2017-05-24 19:55:08', '2017-05-24 19:55:08'),
(39, 39, 5, '2017-05-24 20:56:14', '2017-05-24 20:56:14'),
(40, 40, 5, '2017-05-24 21:01:47', '2017-05-24 21:01:47'),
(41, 41, 5, '2017-05-24 23:44:22', '2017-05-24 23:44:22'),
(42, 42, 5, '2017-05-24 23:47:54', '2017-05-24 23:47:54'),
(43, 43, 2, '2017-05-31 21:16:54', '2017-05-31 21:16:54'),
(44, 44, 3, '2017-06-12 21:13:35', '2017-06-12 21:13:35'),
(45, 45, 5, '2017-06-12 21:14:45', '2017-06-12 21:14:45'),
(46, 46, 5, '2017-06-12 21:40:08', '2017-06-12 21:40:08'),
(47, 47, 5, '2017-06-12 21:43:05', '2017-06-12 21:43:05'),
(48, 48, 3, '2017-06-27 23:15:55', '2017-06-27 23:15:55'),
(49, 49, 5, '2017-06-27 23:22:59', '2017-06-27 23:22:59'),
(50, 50, 5, '2017-06-27 23:24:55', '2017-06-27 23:24:55'),
(51, 51, 5, '2017-06-27 23:25:36', '2017-06-27 23:25:36'),
(52, 54, 5, NULL, NULL),
(53, 55, 3, NULL, NULL),
(54, 56, 5, NULL, NULL),
(55, 57, 5, NULL, NULL),
(56, 58, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_skill_set`
--

CREATE TABLE IF NOT EXISTS `user_skill_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `level` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `user_skill_set`
--

INSERT INTO `user_skill_set` (`id`, `user_id`, `name`, `description`, `level`, `created_at`, `edited_at`) VALUES
(1, 54, 'HTML', 'Hypertext Markup Language', 'Expert', '2017-11-17 07:37:19', '2017-11-17 07:37:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_social`
--

CREATE TABLE IF NOT EXISTS `user_social` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `year_of_experience`
--

CREATE TABLE IF NOT EXISTS `year_of_experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `year_of_experience`
--

INSERT INTO `year_of_experience` (`id`, `name`, `created_at`, `edited_at`) VALUES
(1, 'None', '2017-11-27 03:11:19', '2017-11-27 03:15:33'),
(2, '1-2 Years of Experience', '2017-11-27 03:11:19', '2017-11-27 03:16:04'),
(3, '2-5 Years of Experience', '2017-11-27 03:11:57', '2017-11-27 03:15:49'),
(4, '5-10 Years of Experience', '2017-11-27 03:11:57', '2017-11-27 03:11:57');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_bio_meta_id_foreign` FOREIGN KEY (`bio_meta_id`) REFERENCES `bio_meta` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_endorser_id_foreign` FOREIGN KEY (`endorser_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_bio_meta_id_foreign` FOREIGN KEY (`bio_meta_id`) REFERENCES `bio_meta` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_endorser_id_foreign` FOREIGN KEY (`endorser_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `academics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

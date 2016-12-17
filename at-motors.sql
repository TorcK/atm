-- phpMyAdmin SQL Dump
-- version 4.4.15.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2016 at 06:04 PM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `at-motors`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_t` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '0',
  `hidden` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `name_t`, `order`, `title`, `description`, `public`, `hidden`) VALUES
(1, 0, 'Квадро', 'kvadro', 1, 'Ремонт квадроциклов Харьков, обслуживание багги, тюнинг квадроциклов', 'Ремонт квадроциклов, обслуживание багги, тюнинг квадроциклов, тюнинг багги', 1, 0),
(2, 0, 'Мото', 'moto', 2, 'Ремонт мотоциклов Харьков, обслуживание мотоциклов, ремонт питбайков', 'Ремонт мотоциклов, обслуживание мотоциклов, ремонт питбайков', 1, 0),
(3, 0, 'Авто', 'avto', 3, 'Ремонт автомобилей в Харькове, СТО Харьков', 'Ремонт автомобилей в Харькове, СТО Харьков', 1, 0),
(7, 0, 'main', '', 0, '', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('pikep9bo3sr8v6ldntnru09htfdop7he', '127.0.0.1', 1480606550, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438303630363438383b),
('noo968nkl5tloq6gimvsdetfi2bghk1c', '127.0.0.1', 1480606887, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438303630363739373b),
('bj64sb94a0773je6k7sgr7l55rv2kad2', '127.0.0.1', 1480607842, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438303630373536333b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('g1aab1sn3q84t34fr5dp3dlj67q740ud', '127.0.0.1', 1480607904, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438303630373837373b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('75aulcok3ldmpagglj3dijea3nhpb6qg', '127.0.0.1', 1480610319, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438303631303133303b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('4d5th5gcpdvrltt57s58tmd4bos7uv6t', '127.0.0.1', 1480610721, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438303631303732313b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('2umpacdhjnmm76jsn72176veqp3re4mn', '127.0.0.1', 1480944226, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438303934343039323b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('rfa7uv4ap9d4153eu1e9tu8gm62grp26', '127.0.0.1', 1481035711, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313033353636393b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('f6e8oeumvnq0g4rgsremsrm487f280aa', '127.0.0.1', 1481035748, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313033353732303b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('p0hql5svi66rtbshrke3q8kaa7k5ce22', '127.0.0.1', 1481035772, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313033353735383b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('3eo3qg7i9douh31c0tfra6pk7k0gdk5h', '127.0.0.1', 1481036036, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313033353738333b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('s6feqaecnqurqpctmgn2t2jkoi3r44b0', '127.0.0.1', 1481036373, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313033363039333b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('52avq1vv782g05do77d0sbli8533ic7d', '127.0.0.1', 1481036664, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313033363431333b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('bq68htgs68h7qdlkvlhomletsolmmdv0', '127.0.0.1', 1481036954, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313033363731353b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('4un14rbr3lc80h1ngdck1osb601mq8v4', '127.0.0.1', 1481037332, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313033373035353b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('drlgvq3l1hnlbvhtsjvan1qtnf5he7if', '127.0.0.1', 1481037375, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313033373337353b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('vobvjet310mf32mdir8jjtr44kthq0m5', '127.0.0.1', 1481038437, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313033383135393b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('cm9oe3rb9hn4b7pmfl517vjbg392kiqv', '127.0.0.1', 1481038612, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313033383439313b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('1hek2tebpei2lrb0f3em5ck8kl5cabm3', '127.0.0.1', 1481039939, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313033393633383b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('kn3hhovcp8i78b36lmd036t1qlmu03j6', '127.0.0.1', 1481040395, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313033393934383b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('cqrnocu8vjr4a5c9br1rsdjltlm78mpc', '127.0.0.1', 1481040674, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313034303430343b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('ibvq0kkqh9s9cvj3aakqifg1sntcfc17', '127.0.0.1', 1481123062, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313132333034363b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('ao6r727jni8ua0clsa1mb2csq4kbuko0', '127.0.0.1', 1481124487, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313132343139383b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('cp06k5o5rlunhj9bi672fnsaoes3s894', '127.0.0.1', 1481125201, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313132343937333b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('08uc2i19gakvp10e5u2p3qf23pehlmrs', '127.0.0.1', 1481125674, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313132353434323b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('j0k86fjj6a3m35lt50grpu80unaa6a2g', '127.0.0.1', 1481126277, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313132363237343b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('d38dkdqfdmijnfcdsd1lk37e43g5sntv', '127.0.0.1', 1481283248, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313238333133323b),
('lg99oka7u4jludt4cepgjsgsel6ia2ob', '127.0.0.1', 1481283487, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313238333434323b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('659bcmvt1ugvskd5ch4c22csalfdrosv', '127.0.0.1', 1481284452, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313238343435313b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('j5g75smjqnb8rohbm3e4i415enmi6u31', '127.0.0.1', 1481285493, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313238353231313b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('qpf3lidlebn53qau1u2gvun82v3v6kl1', '127.0.0.1', 1481285755, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313238353532393b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('0rlt1vj3qjqdg0k1tgdl0umk080aut3j', '127.0.0.1', 1481286721, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313238363731303b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('kgfckm2d30m8d9v2ocp6k4ksnl4aoq4e', '127.0.0.1', 1481287365, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313238373335343b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('9ke4elf0ovok9793kcs8vfrliruiounq', '127.0.0.1', 1481289558, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313238383332343b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('lm7q1hfsjeus17l1dof90eko0ar2gemp', '127.0.0.1', 1481289844, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313238393536303b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('1hhv1dgsvla35puchmbqqk2k8k028ert', '127.0.0.1', 1481290017, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313238393936323b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('tttfgn8j99f1tkfaicdfcnoe3iopssmo', '127.0.0.1', 1481972264, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313937323032323b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('f4sfc12u8mg7ni8kkm027coi0j0r9j8k', '127.0.0.1', 1481972463, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313937323337343b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('28c51gusmkolkmp4b668firhon29sinn', '127.0.0.1', 1481973095, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313937323830303b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('tpb6vruoh7dslqudr9u9niia9uvcqiqf', '127.0.0.1', 1481973742, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313937333436343b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('gogmsa1adbo96m9m5n49o1iqb9lvobkr', '127.0.0.1', 1481973914, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313937333834303b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('a18o7o8bu7o2f1iq8eosg26l10t0ijqv', '127.0.0.1', 1481974618, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313937343339303b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('13t6hbaai2io3djfj11t999n15e8c64c', '127.0.0.1', 1481975056, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313937343838303b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('3milvgnanflgmtp5scvhsofignc1cma8', '127.0.0.1', 1481977948, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313937373934383b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('26bth4p3klrafh6npp7jkod2bjdasjka', '127.0.0.1', 1481978575, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313937383435343b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('uimk6a4eftivsj4eushqj80hc784rhl1', '127.0.0.1', 1481985414, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313938353235363b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('qna7ek13kcljiqk2g1ltritdq9nc1o42', '127.0.0.1', 1481986912, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313938363632313b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('4go8nfmtu929l4341sb3j4ki3m9keu5b', '127.0.0.1', 1481987004, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313938363939393b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('mdvrffcap9sn268apbtnc4abr7iumqn8', '127.0.0.1', 1481990459, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313939303133393b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b),
('9h22stml4ke3fcm67i3imtkp7oaah6uf', '127.0.0.1', 1481990589, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313939303436313b6d795f617574685f6c69625f646174617c733a353a2261646d696e223b);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `date` int(11) NOT NULL DEFAULT '0',
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `no_delete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `category_id`, `name`, `text`, `date`, `title`, `description`, `no_delete`) VALUES
(14, 1, 'sdgds', 'sdghhfdg', 1481285570, 'dfgdsf', 'sdfgdf', 0),
(15, 1, 'test222', 'sdfasd', 1481287365, '', '', 0),
(16, 1, 'teste2134', '2342', 1481288334, '', '', 0),
(17, 1, 'teste2134222', '2342222', 1481289492, '', '', 0),
(18, 1, '11111', '11111', 1481289999, '11111', '11111', 0),
(20, 7, 'All Terrian Motors', '          <img class="index-logo" src="/www/images/logo_top.jpg" alt="ATM" border="0"/>\n          <div class="title">ATM - All Terrian Motors</div>\n          Мастерская ATM. Ремонт квадроциклов, багги, мотоциклов, автомобилей. Индивидуальный подход к клиенту и его технике, заводские и нестандартные решения. \n          <article>\n               <img width="100%" src="/www/images/index/atv.jpg" alt="ATM" border="0"/>\n               <div class="title">Квадро</div>\n               <ul>\n                    <li>Плановое ТО и обслуживание всех видов квадроциклов (замена масла, фильтров)</li>\n                    <li>Установка доп. оборудования (кофры, свет, подогрев ручек)</li>\n                    <li>Изготовление аксесуаров по требованиям заказчика (выносы радиатора, шнорхели, снегоотвалы)</li>\n                    <li>Плановое ТО и обслуживание всех видов квадроциклов (замена масла, фильтров)</li>\n                    <li>Установка доп. оборудования (кофры, свет, подогрев ручек)</li>\n                    <li>Изготовление аксесуаров по требованиям заказчика (выносы радиатора, шнорхели, снегоотвалы)</li>\n               </ul>\n          </article>\n          <article>\n               <img width="100%" src="/www/images/index/bike.jpg" alt="ATM" border="0"/>\n               <div class="title">Мото</div>\n               <ul>\n                    <li>Плановое ТО и обслуживание всех видов квадроциклов (замена масла, фильтров)</li>\n                    <li>Установка доп. оборудования (кофры, свет, подогрев ручек)</li>\n                    <li>Изготовление аксесуаров по требованиям заказчика (выносы радиатора, шнорхели, снегоотвалы)</li>\n                    <li>Плановое ТО и обслуживание всех видов квадроциклов (замена масла, фильтров)</li>\n                    <li>Установка доп. оборудования (кофры, свет, подогрев ручек)</li>\n                    <li>Изготовление аксесуаров по требованиям заказчика (выносы радиатора, шнорхели, снегоотвалы)</li>\n               </ul>\n          </article>\n          <article>\n               <img width="100%" src="/www/images/index/car.png" alt="ATM" border="0"/>\n               <div class="title">Авто</div>\n               <ul>\n                    <li>Плановое ТО и обслуживание всех видов квадроциклов (замена масла, фильтров)</li>\n                    <li>Установка доп. оборудования (кофры, свет, подогрев ручек)</li>\n                    <li>Изготовление аксесуаров по требованиям заказчика (выносы радиатора, шнорхели, снегоотвалы)</li>\n                    <li>Плановое ТО и обслуживание всех видов квадроциклов (замена масла, фильтров)</li>\n                    <li>Установка доп. оборудования (кофры, свет, подогрев ручек)</li>\n                    <li>Изготовление аксесуаров по требованиям заказчика (выносы радиатора, шнорхели, снегоотвалы)</li>\n               </ul>\n          </article>', 1481975056, '', '', 1),
(21, 7, 'Контакты', '050 024 39 98 Владимир', 1481978575, '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

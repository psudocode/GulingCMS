-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2014 at 07:43 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `idtut`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `desc`) VALUES
(1, 'PHP', 'php', 'PHP Programming Language'),
(2, 'JSP', 'jsp', 'JSP Proggraming Language'),
(28, 'js', 'js', NULL),
(29, 'mysql', 'mysql', NULL),
(30, 'set', 'set', NULL),
(31, 'test', 'test', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `image_feature` varchar(255) DEFAULT NULL,
  `post_type` varchar(255) DEFAULT 'active',
  `post_status` enum('inactive','active') DEFAULT 'active',
  `flag_sticky` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `created_at`, `updated_at`, `created_by`, `updated_by`, `image_feature`, `post_type`, `post_status`, `flag_sticky`) VALUES
(1, 'About', 'about', '<p>Ini Content <strong>About</strong></p>', '2013-12-17 16:18:56', '2013-12-27 03:35:56', 1, 1, '', 'page', 'active', 0),
(2, 'Programming Languages', 'programming-languages', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt scelerisque eros, a porta magna dictum ac. Aenean consequat, magna id cursus pharetra, turpis nunc convallis erat, non tempus nulla eros a urna. Phasellus quis sem laoreet, aliquet justo a, tempus orci. Sed blandit, augue et tincidunt rhoncus, mi nisi semper mauris, non eleifend neque sapien tempus sem. In fermentum lobortis accumsan. Mauris vitae dui elit. Maecenas sed leo a tellus bibendum bibendum eget a mi. Integer id diam id elit aliquet feugiat. In hac habitasse platea dictumst. Suspendisse eleifend, lorem eget viverra lacinia, erat nisl dapibus lacus, vitae venenatis turpis enim ut leo. Etiam non turpis condimentum, iaculis mi a, tempor tellus. Nullam fringilla luctus vulputate. Proin accumsan eros sit amet vehicula egestas. Nulla porttitor lacinia tincidunt. Fusce porttitor sodales gravida.</p>\r\n<p>Proin pharetra urna eu nibh molestie condimentum. Fusce vel leo lacus. Vivamus id neque posuere, interdum quam et, hendrerit dui. Fusce nisi ipsum, semper et quam sit amet, aliquet aliquet dolor. Ut dictum laoreet quam, quis imperdiet velit. Nulla eleifend scelerisque arcu vitae sodales. Sed eget semper mi. Pellentesque porttitor tristique nulla, sed pharetra lectus pellentesque ac. Morbi sit amet elementum elit. Proin at libero sit amet sem accumsan volutpat quis vitae magna.</p>\r\n<p>In dictum at ipsum at semper. Nulla facilisi. Nam hendrerit augue in mi tristique, tempor ultrices libero mollis. Maecenas id lorem hendrerit, mollis sapien vel, placerat sapien. Aliquam lobortis imperdiet tempor. In hac habitasse platea dictumst. Quisque a nulla odio. Maecenas bibendum eu lectus non vehicula. Quisque in dolor nec ipsum auctor congue. Fusce in mi dapibus neque ornare aliquet. Integer id diam lectus. Quisque fringilla ligula et lectus ullamcorper, vitae porta orci facilisis. Aliquam erat volutpat. Duis fermentum odio a mauris luctus placerat. Morbi eget posuere diam. Nulla vel varius nulla.</p>\r\n<p>Sed interdum erat id tortor dignissim, quis tincidunt ante mattis. Suspendisse facilisis porttitor eros vel condimentum. Curabitur porta, tellus nec congue posuere, orci mi commodo urna, non varius velit tortor at mi. Aliquam nisi erat, egestas non venenatis vestibulum, suscipit a risus. Vivamus fringilla viverra cursus. Duis sagittis faucibus turpis in placerat. Suspendisse congue leo eget nisi sagittis pretium. Cras commodo dignissim justo in luctus. Etiam ut est sit amet metus tincidunt feugiat nec ut nisl. Vivamus adipiscing hendrerit eros, a vulputate ligula viverra vitae. Nunc aliquam lectus eget urna lacinia egestas. Fusce velit ipsum, congue nec vulputate luctus, venenatis nec quam. Suspendisse gravida leo vitae cursus interdum. Praesent at ultrices tortor, at ullamcorper magna. Quisque placerat quam magna, at fringilla est accumsan ac. In tristique sapien id interdum ullamcorper.</p>\r\n<p>Praesent iaculis velit vehicula magna facilisis, ut consectetur erat pretium. Mauris gravida elit at auctor semper. Sed vel libero augue. Nulla ac fermentum augue. Integer ornare, urna eget rutrum porta, ligula quam vestibulum mauris, vel facilisis diam ante vel lectus. Ut congue posuere purus at molestie. Nulla facilisi. Aenean quis consectetur risus. Duis volutpat tortor eget dui tincidunt, quis suscipit magna sodales. Aenean volutpat vel neque eget commodo. Duis semper leo quis lectus tristique blandit.</p>', '2013-12-17 16:18:56', '2013-12-27 02:51:58', 1, 1, '2013/prog-lang.jpg', 'post', 'active', 0),
(3, 'Programming Language V1.0.5', 'programming-language-v105', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt scelerisque eros, a porta magna dictum ac. Aenean consequat, magna id cursus pharetra, turpis nunc convallis erat, non tempus nulla eros a urna. Phasellus quis sem laoreet, aliquet justo a, tempus orci. Sed blandit, augue et tincidunt rhoncus, mi nisi semper mauris, non eleifend neque sapien tempus sem. In fermentum lobortis accumsan. Mauris vitae dui elit. Maecenas sed leo a tellus bibendum bibendum eget a mi. Integer id diam id elit aliquet feugiat. In hac habitasse platea dictumst. Suspendisse eleifend, lorem eget viverra lacinia, erat nisl dapibus lacus, vitae venenatis turpis enim ut leo. Etiam non turpis condimentum, iaculis mi a, tempor tellus. Nullam fringilla luctus vulputate. Proin accumsan eros sit amet vehicula egestas. Nulla porttitor lacinia tincidunt. Fusce porttitor sodales gravida.</p>\r\n<p>Proin pharetra urna eu nibh molestie condimentum. Fusce vel leo lacus. Vivamus id neque posuere, interdum quam et, hendrerit dui. Fusce nisi ipsum, semper et quam sit amet, aliquet aliquet dolor. Ut dictum laoreet quam, quis imperdiet velit. Nulla eleifend scelerisque arcu vitae sodales. Sed eget semper mi. Pellentesque porttitor tristique nulla, sed pharetra lectus pellentesque ac. Morbi sit amet elementum elit. Proin at libero sit amet sem accumsan volutpat quis vitae magna.</p>\r\n<p>In dictum at ipsum at semper. Nulla facilisi. Nam hendrerit augue in mi tristique, tempor ultrices libero mollis. Maecenas id lorem hendrerit, mollis sapien vel, placerat sapien. Aliquam lobortis imperdiet tempor. In hac habitasse platea dictumst. Quisque a nulla odio. Maecenas bibendum eu lectus non vehicula. Quisque in dolor nec ipsum auctor congue. Fusce in mi dapibus neque ornare aliquet. Integer id diam lectus. Quisque fringilla ligula et lectus ullamcorper, vitae porta orci facilisis. Aliquam erat volutpat. Duis fermentum odio a mauris luctus placerat. Morbi eget posuere diam. Nulla vel varius nulla.</p>\r\n<p>Sed interdum erat id tortor dignissim, quis tincidunt ante mattis. Suspendisse facilisis porttitor eros vel condimentum. Curabitur porta, tellus nec congue posuere, orci mi commodo urna, non varius velit tortor at mi. Aliquam nisi erat, egestas non venenatis vestibulum, suscipit a risus. Vivamus fringilla viverra cursus. Duis sagittis faucibus turpis in placerat. Suspendisse congue leo eget nisi sagittis pretium. Cras commodo dignissim justo in luctus. Etiam ut est sit amet metus tincidunt feugiat nec ut nisl. Vivamus adipiscing hendrerit eros, a vulputate ligula viverra vitae. Nunc aliquam lectus eget urna lacinia egestas. Fusce velit ipsum, congue nec vulputate luctus, venenatis nec quam. Suspendisse gravida leo vitae cursus interdum. Praesent at ultrices tortor, at ullamcorper magna. Quisque placerat quam magna, at fringilla est accumsan ac. In tristique sapien id interdum ullamcorper.</p>\r\n<p>Praesent iaculis velit vehicula magna facilisis, ut consectetur erat pretium. Mauris gravida elit at auctor semper. Sed vel libero augue. Nulla ac fermentum augue. Integer ornare, urna eget rutrum porta, ligula quam vestibulum mauris, vel facilisis diam ante vel lectus. Ut congue posuere purus at molestie. Nulla facilisi. Aenean quis consectetur risus. Duis volutpat tortor eget dui tincidunt, quis suscipit magna sodales. Aenean volutpat vel neque eget commodo. Duis semper leo quis lectus tristique blandit.</p>', '2013-12-26 19:12:13', '2013-12-27 02:52:06', 1, 1, '2013/progs.jpg', 'post', 'active', 0),
(29, 'PHP Language is awesome', 'php-language-is-awesome', '<p><strong>Lorem</strong> ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>', '2013-12-27 03:22:26', '2013-12-27 03:22:26', 1, NULL, '', 'post', 'active', 0),
(30, 'PHP Language is awesome2', 'php-language-is-awesome2', '<p><strong>Lorem</strong> ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>', '2013-12-27 03:22:56', '2013-12-27 03:22:56', 1, NULL, '', 'post', 'active', 0),
(31, 'About Me', 'about-me', '<p>aku adalah anak gembala, selalu riang serta <strong>gembira.</strong></p>', '2013-12-27 03:39:17', '2013-12-27 03:46:31', 1, 1, '', 'page', 'active', 0),
(32, 'test', 'test', '<p>testst</p>', '2013-12-27 11:11:47', '2013-12-27 11:11:47', 1, NULL, '', 'post', 'active', 0),
(33, 'title', 'title', '<p>etst</p>', '2014-01-02 05:09:03', '2014-01-02 05:09:03', 1, NULL, NULL, 'post', 'active', 0),
(34, 'PHP Language 34', 'php-language-34', '', '2014-01-02 05:09:47', '2014-01-02 05:09:47', 1, NULL, 'uploads/port_Bunda.jpg', 'post', 'active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_to_categories`
--

CREATE TABLE IF NOT EXISTS `post_to_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `post_to_categories`
--

INSERT INTO `post_to_categories` (`id`, `post_id`, `category_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(17, 29, 1),
(18, 29, 28),
(19, 29, 29),
(20, 30, 1),
(21, 30, 28),
(22, 30, 29),
(23, 32, 30),
(24, 33, 31);

-- --------------------------------------------------------

--
-- Table structure for table `post_to_tags`
--

CREATE TABLE IF NOT EXISTS `post_to_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `post_to_tags`
--

INSERT INTO `post_to_tags` (`id`, `post_id`, `tag_id`) VALUES
(1, 3, 3),
(2, 2, 1),
(3, 2, 2),
(28, 29, 42),
(29, 29, 40),
(30, 29, 41),
(31, 30, 42),
(32, 30, 40),
(33, 30, 41),
(34, 32, 43),
(35, 33, 44);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `slug`, `desc`) VALUES
(1, 'belajar', 'belajar', 'belajar'),
(2, 'coding', 'coding', 'coding'),
(3, 'program', 'program', 'program'),
(40, 'Language', 'language', NULL),
(41, 'Programming', 'programming', NULL),
(42, 'PHP', 'php', NULL),
(43, 'sett', 'sett', NULL),
(44, 'test', 'test', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '\0\0', 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1388635715, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

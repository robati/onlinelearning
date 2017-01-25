-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2017 at 09:32 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lo`
--
CREATE DATABASE IF NOT EXISTS `lo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lo`;

-- --------------------------------------------------------

--
-- Table structure for table `allexams`
--

CREATE TABLE IF NOT EXISTS `allexams` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` int(11) NOT NULL,
  `key` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `allexams`
--

INSERT INTO `allexams` (`eid`, `name`, `time`, `key`) VALUES
(1, 'html', 10, ''),
(2, 'ادبیات', 20, ''),
(3, 'فیزیک', 20, '123'),
(4, 'english', 30, 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `alltrains`
--

CREATE TABLE IF NOT EXISTS `alltrains` (
  `name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `alltrains`
--

INSERT INTO `alltrains` (`name`, `id`) VALUES
('تمرینات htlm', 1),
('تمرین های ادبیات', 2);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `qid`, `eid`) VALUES
(1, 8, 1),
(2, 9, 1),
(3, 16, 2),
(4, 21, 2),
(5, 17, 2),
(6, 18, 2),
(7, 19, 2),
(8, 20, 2),
(9, 10, 1),
(10, 15, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 22, 3),
(16, 23, 4),
(17, 24, 4),
(31, 43, 16);

-- --------------------------------------------------------

--
-- Table structure for table `forumq`
--

CREATE TABLE IF NOT EXISTS `forumq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `forumq`
--

INSERT INTO `forumq` (`id`, `sid`, `pid`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 39, 1),
(4, 40, 1),
(5, 41, 1),
(6, 29, 2),
(7, 30, 2),
(8, 42, 2),
(11, 45, 1),
(12, 46, 2),
(13, 47, 2);

-- --------------------------------------------------------

--
-- Table structure for table `fsoal`
--

CREATE TABLE IF NOT EXISTS `fsoal` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `soal` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `comments` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `c_counter` int(11) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `fsoal`
--

INSERT INTO `fsoal` (`sid`, `uid`, `soal`, `comments`, `c_counter`) VALUES
(1, 'سهیل', ' چگونه می توان double quotes را در JavaScript نمایش داد؟', '<hr/>بهار:دوبار quote گذاشتن مگه درست نیست؟<hr/>امیر:نمی دونم', 2),
(45, 'ساحل', 'رنگ پس زمینه چطور مشخص می شه؟', '<hr/>نهال:color<hr/>ali:با background-color مشخص می شه ', 2),
(46, 'مهسا', 'این سوال ها خیلی سخت نیستن؟', '<hr/>بهاره:چرا. خیلی سخته', 3),
(47, 'Nemo', 'در پوستین خلق افتادن یعنی چی؟', '<hr/>من:NO idea<hr/>سهیل:غیبت کردن؟', 2);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `text` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ch1` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ch2` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ch3` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `correct` int(11) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=47 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `text`, `ch1`, `ch2`, `ch3`, `correct`) VALUES
(8, 'کلمه HTML مخفف کدام عبارت است :', 'Hyperlinks and Text Markup Language', 'Hyper Text Markup Language', 'Home Tool Markup Language', 2),
(9, 'برای ایجاد بزرگترین سایز عنوان در HTML باید از کدام تگ استفاده نمود :', '< head >', '< h6 >', '< h1 >', 3),
(10, ' برای رفتن به یک خط جدید باید از کدام تگ استفاده کرد :', '< / hr >', '< break >', '< / br >', 3),
(11, 'کد صحیح برای تعیین پس زمینه رنگی برای یک عنصر کدام است ؟ :', '< "body background="yellow >', '< "body style="background-color:yellow >', '< "body style="background = yellow >', 1),
(12, 'فرمت صحیح ایجاد یک لینک در HTML کدام است ؟ :', 'فرمت صحیح ایجاد یک لینک در HTML کدام است ؟ :', '< a > "http://www.developer1.ir" < / a >', 'a url="http://www.developer1.ir" > Developer1.ir < / a >', 1),
(13, 'چگونه می توان کاری کرد تا لینک در یک پنجره جدید مرورگر باز شود ؟', '< a href="url" new >', '< a href="url" target="_self" >', '< a href="url" target="_blank" >', 3),
(14, '- کدام گزینه فرمت صحیح یک تگ table است ؟ :', '< thead > < body > < tr >', '< table > < tr > < tt >', '< table > < tr > < td >', 3),
(15, 'با کدام تگ ها به ترتیب لیست های نشانه دار و لیست های شماره دار می توان ساخت?', '< ul > ، < ol >', '< list > ، < Numlist >', '< orderd > ، < unorderd >', 1),
(16, 'معنای کدام واژه نادرست است ؟  ', 'فارغ : جدا ', 'افق : کرانه', 'زائر : زیارت کننده  ', 1),
(17, 'در پوستین خلق افتادن » کنایه از.......... است.     ', 'دروغ گفتن  ', ' غیبت کردن', '  صحبت کردن ', 2),
(18, ' در کدام گزینه کلمات هم خانواده وجود ندارد ؟  ', 'صلاح و مصلحت', '  اقتدار و مقتدر', ' شور و شعور  ', 3),
(19, 'شباهت قصیده با غزل در چیست ؟', 'وزن', ' موضوع  ', 'طرز قرار گرفتن قافیه', 3),
(20, 'موضوع غزل در کدام گزینه آمده است ؟', 'بیان عاطفه و احساس ', 'فراق و جدایی', 'همه ی موارد', 3),
(21, 'منجی یعنی :', 'نجات یافته      ', 'نجات دهنده', 'مناجات کننده', 2),
(22, 'ثابت گرانش چند است؟', '6.22', '9.8', '3.14', 2),
(23, 'whre ...you go yesterday?', 'did', 'were', 'do', 1),
(24, 'did you go to school?', 'yes,i am', 'yes, i have', 'yes, i did', 3),
(25, 'sd', '1', '2', '3', 1),
(26, 'آیا', 'بله', 'خیر', 'هیچ کدام', 3),
(27, 'd', 'nj', 'nj', 'jn', 1),
(28, 'vgbh', '7', '7', '8', 1),
(29, ',', ',.', 'kln', 'k', 1),
(30, ' nm', 'jn', 'nj', 'jk', 1),
(31, '/.,m', 'jmn', 'hjb', 'hjb', 3),
(32, 'q1', 'a1', 'a2', 'a3', 1),
(33, '', '', '', '', 0),
(34, 'q2', 'c1', 'c2', 'c3', 2),
(35, '', '', '', '', 0),
(36, '', '', '', '', 0),
(37, 'm', 'm', 'm', 'm', 2),
(38, '', '', '', '', 0),
(39, '', '', '', '', 0),
(40, 'سوال 1', 'ن', 'م', 'ت', 2),
(41, 'سوال2', 'ا', 'ب', 'خ', 3),
(42, 'سوال آآآآ', 'من', 'ن', 'تا', 2),
(43, '', '', '', '', 0),
(44, 'سوال تتتتتت', 'اع', 'نت', 'تن', 2),
(45, 'سوال استاد', '1', '2', '3', 1),
(46, 'دو', '7', '7', '5', 3);

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE IF NOT EXISTS `train` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`id`, `qid`, `pid`) VALUES
(1, 10, 1),
(2, 11, 1),
(3, 16, 2),
(4, 17, 2),
(5, 18, 2),
(6, 19, 2),
(7, 20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'info@onlinelearning.ir', '1234'),
(2, 'robati.m7@gmail.com', 'm');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

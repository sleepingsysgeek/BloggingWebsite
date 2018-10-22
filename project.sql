-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 22, 2018 at 08:30 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog` varchar(500) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog`, `email`, `title`, `id`) VALUES
('dog is faithful animal.', 'gautty95p@gmail.com', 'dog', 1),
('Ultimately, I never wanted to resort to what I was asking about. It was just a morbid curiosity. I ended up going with the simple approach Chris describes in his voted answer here: stackoverflow.com/questions/1100354/how-can-i-echo-html-in-php That approach, however simplistic, escaped me on account of the whole no ending tag thing. I just had to read up more on ', 'praveenmishraemail@gmail.com', 'FirstBlog', 2),
('test', 'praveenmishraemail@gmail.com', 'test', 3),
('gfd', 'praveenmishraemail@gmail.com', 'gft', 4),
('\'', 'praveenmishraemail@gmail.com', '\'', 5),
('&quot;&quot;&quot;\'\'\'', 'praveenmishraemail@gmail.com', 'jhgjg\'\'\'\'\'&quot;&quot;', 6),
('hjfjhvjvhvjkvjmbjvb', 'gautty95p@gmail.com', 'Baaghi 2 ', 7),
('The beauty lies in the eyes of the beholder !!', 'poonam.em2895@gmail.com', 'Beauty', 8),
('rygyiyiytkjidht5rigf54lmuph6hmcijugyhubvtrckkx,xko99ucjyhcnhrjkjhibcg yc,mnythbulrh;x,kyjhgyvtbnucmm nhgv 3j3hicnbytvy ttgkhlcmnbitubyuloewiruil', 'trishajhg@gmail.com', '#metoo', 9),
('hello world is the first programm i wrote.', 'poonam.em2895@gmail.com', 'hello world', 10),
('hii Mishrajii', 'kumarashutosh84028@gmail.com', 'my Blog ', 11),
('Best toffee ðŸ˜‚ðŸ˜‚ðŸ˜‚', 'abc@abc.com', 'Chintu candy', 12),
('shcgf dsyfdfyugdgfhgdf  gjhfgdgdsb hfgdsgfgdsjgfjgdsgfjdsgjfgdsgdshhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh4444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444', 'kshravan002@gmail.com', 'qwertyuiop', 13),
('&lt;div style=&quot;text-align: center;&quot;&gt;&lt;b&gt;&lt;u&gt;&lt;i&gt;Hello world&lt;/i&gt;&lt;/u&gt;&lt;/b&gt; this blog is written on text editor.&lt;/div&gt;', 'poonam.em2895@gmail.com', 'First text editor', 15),
('<div align=\"center\"><u>this is my </u><b><u>secon</u>d blog</b>on text editor afterremoving<i>htmlspecialcharacters </i>function.<br></div>   ', 'praveenmishraemail@gmail.com', 'second test', 16),
('<div align=\"center\"><span style=\"background-color: rgb(102, 51, 153);\">htffghjhhcfgcbjkh<b>bvhhb</b></span></div><div align=\"center\"><span style=\"background-color: rgb(102, 51, 153);\"><b><span style=\"background-color: rgb(204, 255, 0);\"><u>hgkjkghhkj</u></span><br></b></span></div>', 'poonam.em2895@gmail.com', 'Kuch bhi', 17),
('<div align=\"center\"><img src=\"https://i.imgur.com/PePsJDS.jpg\" width=\"354\" height=\"214\"></div><div align=\"center\">whkqebfkeqnbkbeqkbfkjqbwkfqw<br></div>', 'poonam.em2895@gmail.com', 'qwdbqwdbjqw', 18),
('<div><img src=\"https://i.imgur.com/CG69Fdy.jpg\" width=\"525\"></div><div>this is an example<br></div><br>', 'poonam.em2895@gmail.com', 'image example', 19),
('<img src=\"https://i.imgur.com/Nij7G2i.jpg\" width=\"525\"><br>', 'praveenmishraemail@gmail.com', 'fuck off', 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `firstname` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `password` varchar(500) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`firstname`, `email`, `contact`, `password`, `lastname`) VALUES
('Chintu', 'abc@abc.com', '9464568951', 'c296539f3286a899d8b3f6632fd62274', ''),
('Gautam', 'gautty95p@gmail.com', '9693271971', '5d41402abc4b2a76b9719d911017c592', 'Gupta'),
('Shravan', 'kshravan002@gmail.com', '7033407781', 'ce4d22c014237b28634dac2cbbbc293f', 'Kumar'),
('Ashutosh', 'kumarashutosh84028@gmail.com', '9570684028', 'fa27328342675695152c15dedb8f62b8', 'kumar'),
('Poonam', 'poonam.em2895@gmail.com', '9501354582', '5d41402abc4b2a76b9719d911017c592', 'Verma'),
('Praveen', 'praveenmishraemail@gmail.com', '7901388009', '7b156bf942f20c70e77abb3f054c9340', 'Nitin'),
('twe', 'trishajhg@gmail.com', '5545254541', '385d04e7683a033fcc6c6654529eb7e9', 'rew');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

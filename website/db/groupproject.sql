-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2021 at 03:01 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `groupproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `adminID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`adminID`, `userID`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `articlecomments`
--

CREATE TABLE `articlecomments` (
  `commentID` int(11) NOT NULL,
  `commentText` varchar(1024) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `articleID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articlecomments`
--

INSERT INTO `articlecomments` (`commentID`, `commentText`, `userID`, `articleID`) VALUES
(1, 'This is a great story!', 1, 1),
(2, 'I really like this story!', 2, 1),
(3, 'Excellent writing!', 3, 1),
(4, 'Not sure about this one!', 4, 8),
(5, 'Me neither!', 5, 8),
(6, 'hello', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `articlereactions`
--

CREATE TABLE `articlereactions` (
  `reactionID` int(11) NOT NULL,
  `reactionType` varchar(8) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `articleID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articlereactions`
--

INSERT INTO `articlereactions` (`reactionID`, `reactionType`, `userID`, `articleID`) VALUES
(1, 'LIKE', 1, 1),
(2, 'LIKE', 2, 1),
(3, 'LIKE', 3, 1),
(4, 'DISLIKE', 4, 8),
(5, 'DISLIKE', 5, 8),
(6, 'LIKE', 6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `articleID` int(11) NOT NULL,
  `outletID` int(11) DEFAULT NULL,
  `authorName` varchar(255) DEFAULT NULL,
  `articleURL` varchar(255) DEFAULT NULL,
  `articleHeadline` varchar(2047) DEFAULT NULL,
  `articleText` varchar(2047) DEFAULT NULL,
  `publicationDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`articleID`, `outletID`, `authorName`, `articleURL`, `articleHeadline`, `articleText`, `publicationDate`) VALUES
(1, 1, 'John Doe', 'https://www.courts.ns.ca/', 'This is Small Claims Court sample article 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pulvinar pellentesque habitant morbi tristique. At erat pellentesque adipiscing commodo elit at imperdiet. Tristique senectus et netus et malesuada. Tellus integer feugiat scelerisque varius morbi enim nunc faucibus. Tortor aliquam nulla facilisi cras fermentum odio. Diam quam nulla porttitor massa id. Dictumst quisque sagittis purus sit amet volutpat consequat. Eu turpis egestas pretium aenean pharetra magna. Imperdiet sed euismod nisi porta lorem mollis aliquam ut porttitor. Vitae nunc sed velit dignissim sodales ut. Vivamus arcu felis bibendum ut. Eget mi proin sed libero enim sed faucibus turpis. Gravida rutrum quisque non tellus orci ac. Nisl nisi scelerisque eu ultrices vitae. Molestie a iaculis at erat.\n', '2021-12-07 19:53:21'),
(2, 1, 'John Doe', 'https://www.courts.ns.ca/', 'This is Small Claims Court sample article 2', 'Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque. Elementum nibh tellus molestie nunc non blandit massa enim nec. Elementum tempus egestas sed sed risus. Pharetra diam sit amet nisl suscipit adipiscing. Morbi tristique senectus et netus et malesuada fames. Dolor magna eget est lorem ipsum dolor sit amet. Sed vulputate odio ut enim blandit volutpat maecenas volutpat. Arcu risus quis varius quam. Felis imperdiet proin fermentum leo vel orci porta. Dignissim enim sit amet venenatis.\n', '2021-12-07 19:53:21'),
(3, 1, 'John Doe', 'https://www.courts.ns.ca/', 'This is Small Claims Court sample article 3', 'Eget est lorem ipsum dolor sit amet consectetur. Orci nulla pellentesque dignissim enim sit. A diam sollicitudin tempor id eu nisl nunc mi. Interdum consectetur libero id faucibus nisl. Egestas sed sed risus pretium. Orci porta non pulvinar neque laoreet suspendisse interdum consectetur libero. Et pharetra pharetra massa massa ultricies mi quis hendrerit. Nisl condimentum id venenatis a condimentum vitae sapien. Arcu risus quis varius quam quisque id diam vel. Volutpat odio facilisis mauris sit amet massa vitae tortor. Pharetra sit amet aliquam id diam maecenas. Sed odio morbi quis commodo.\n', '2021-12-07 19:53:21'),
(4, 2, 'Jane Doe', 'https://www.courts.ns.ca/', 'This is Provincial Court sample article 1', 'Quam vulputate dignissim suspendisse in est ante in nibh. Sit amet venenatis urna cursus eget nunc scelerisque. At tellus at urna condimentum mattis. Porttitor leo a diam sollicitudin tempor id. Purus gravida quis blandit turpis. Massa sed elementum tempus egestas sed sed. Volutpat est velit egestas dui id ornare arcu odio. Ultricies leo integer malesuada nunc vel. Rhoncus urna neque viverra justo nec ultrices dui sapien eget. Fames ac turpis egestas integer eget. Porttitor massa id neque aliquam vestibulum.\n', '2021-12-07 19:53:21'),
(5, 2, 'Jane Doe', 'https://www.courts.ns.ca/', 'This is Provincial Court sample article 2', 'Vitae tortor condimentum lacinia quis vel eros donec ac odio. Ut aliquam purus sit amet luctus venenatis lectus. Pretium lectus quam id leo. Eget nullam non nisi est sit amet facilisis magna. Odio morbi quis commodo odio aenean sed adipiscing diam. Lectus arcu bibendum at varius vel pharetra vel turpis nunc. Amet mauris commodo quis imperdiet massa tincidunt nunc. Tempus iaculis urna id volutpat lacus laoreet non curabitur. Amet venenatis urna cursus eget nunc scelerisque viverra mauris. Vitae nunc sed velit dignissim sodales ut eu sem integer. Amet est placerat in egestas erat. Dignissim suspendisse in est ante in nibh. Ornare suspendisse sed nisi lacus sed.\n', '2021-12-07 19:53:21'),
(6, 2, 'Jane Doe', 'https://www.courts.ns.ca/', 'This is Provincial Court sample article 3', 'Lobortis feugiat vivamus at augue eget arcu dictum. Odio ut sem nulla pharetra diam sit. Nisl tincidunt eget nullam non nisi. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Et netus et malesuada fames ac turpis. Id leo in vitae turpis massa. Velit dignissim sodales ut eu sem integer vitae justo. Vulputate sapien nec sagittis aliquam malesuada. Aliquam eleifend mi in nulla posuere sollicitudin. Mi proin sed libero enim sed faucibus turpis. Suspendisse potenti nullam ac tortor vitae purus faucibus.\n', '2021-12-07 19:53:21'),
(7, 3, 'Joe Doe', 'https://www.courts.ns.ca/', 'This is Supreme Court sample article 1', 'Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt. Faucibus purus in massa tempor nec feugiat nisl pretium. Placerat orci nulla pellentesque dignissim. Tempor id eu nisl nunc. Eget nulla facilisi etiam dignissim diam quis enim. Cursus eget nunc scelerisque viverra mauris in aliquam. Id faucibus nisl tincidunt eget. Tincidunt id aliquet risus feugiat in ante. Ut morbi tincidunt augue interdum velit euismod in. Urna porttitor rhoncus dolor purus. Bibendum ut tristique et egestas quis ipsum suspendisse ultrices gravida. Massa id neque aliquam vestibulum morbi blandit cursus. Elementum facilisis leo vel fringilla. Gravida dictum fusce ut placerat orci nulla pellentesque dignissim enim. Morbi tristique senectus et netus et. Dictumst vestibulum rhoncus est pellentesque elit. Et molestie ac feugiat sed. Molestie a iaculis at erat pellentesque.\n', '2021-12-07 19:53:21'),
(8, 3, 'Joe Doe', 'https://www.courts.ns.ca/', 'This is Supreme Court sample article 2', 'Et molestie ac feugiat sed lectus. Blandit libero volutpat sed cras. Accumsan in nisl nisi scelerisque eu. Fermentum dui faucibus in ornare quam. Scelerisque eu ultrices vitae auctor eu augue ut lectus. Tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada. Sit amet risus nullam eget. Convallis posuere morbi leo urna molestie at elementum eu facilisis. Pellentesque adipiscing commodo elit at imperdiet dui. Nisi vitae suscipit tellus mauris a diam maecenas sed. Enim eu turpis egestas pretium aenean pharetra magna ac. Donec massa sapien faucibus et molestie. Nunc non blandit massa enim. Neque egestas congue quisque egestas diam in.\n', '2021-12-07 19:53:21'),
(9, 3, 'Joe Doe', 'https://www.courts.ns.ca/', 'This is Supreme Court sample article 3', 'Enim tortor at auctor urna nunc id cursus metus. Ut sem nulla pharetra diam sit amet nisl. Id porta nibh venenatis cras sed felis eget. Adipiscing commodo elit at imperdiet dui accumsan sit amet nulla. Eu volutpat odio facilisis mauris sit. In fermentum et sollicitudin ac orci phasellus egestas tellus rutrum. Tellus mauris a diam maecenas sed enim ut sem. Lacinia at quis risus sed vulputate odio ut. Sem fringilla ut morbi tincidunt augue interdum. Ultrices dui sapien eget mi proin. Iaculis at erat pellentesque adipiscing commodo elit.\n', '2021-12-07 19:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `commentreactions`
--

CREATE TABLE `commentreactions` (
  `reactionID` int(11) NOT NULL,
  `reactionType` varchar(8) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `commentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentreactions`
--

INSERT INTO `commentreactions` (`reactionID`, `reactionType`, `userID`, `commentID`) VALUES
(1, 'LIKE', 1, 2),
(2, 'LIKE', 1, 3),
(3, 'LIKE', 2, 1),
(4, 'LIKE', 2, 3),
(5, 'DISLIKE', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `moderators`
--

CREATE TABLE `moderators` (
  `modID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moderators`
--

INSERT INTO `moderators` (`modID`, `userID`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE `outlets` (
  `outletID` int(11) NOT NULL,
  `outletName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `outlets`
--

INSERT INTO `outlets` (`outletID`, `outletName`) VALUES
(1, 'Small Claims Court of Nova Scotia'),
(2, 'Provincial Court of Nova Scotia'),
(3, 'Supreme Court of Nova Scotia');

-- --------------------------------------------------------

--
-- Table structure for table `userhashes`
--

CREATE TABLE `userhashes` (
  `privateID` varchar(255) NOT NULL,
  `passwordHash` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userhashes`
--

INSERT INTO `userhashes` (`privateID`, `passwordHash`) VALUES
('0cc898390e1eae00d0237eed2e8204f4', 'e746eaef342944376730f98cbb6797e1'),
('48f5c010578708ca863e20acb40cb404', '63733b317b9aa7d5b4dfeaf23b52cf1d'),
('558b54ddea277593b5377a47f33a1bab', 'ac15e28c04be157bf804d0b86b89380d'),
('58c25b1bb0841ca15c547d3f8373ed70', 'ad485448a0839cee2ff4652ab44f9878'),
('a93c925f5a6f3187447b3d4a98051040', '2323be0928a787ffdcb1bee0d1690a44'),
('a9ab03d9a5ca5503f37cba8bb8f7bdfb', 'c852e855efea8c8cf2b7588eae620d31'),
('b31db2054eb0b80844887a3239052b6a', '35af05c99eec9c5cbfdcc771f5a8c69a'),
('baf9ca3c0f40807ee55e5cc23bc01a79', 'd2a53e5e5c18f11d72f2311228519c02'),
('f19ba6dfb62dc68cf6ee4d68205cc5f5', '140b577d9a2074065c2c643afdde82b5');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `privateID` varchar(255) DEFAULT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `emailAddress` varchar(255) DEFAULT NULL,
  `registrationDate` datetime DEFAULT NULL,
  `verificationStatus` tinyint(1) DEFAULT NULL,
  `profileVisibility` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `privateID`, `userName`, `firstName`, `lastName`, `emailAddress`, `registrationDate`, `verificationStatus`, `profileVisibility`) VALUES
(1, 'f19ba6dfb62dc68cf6ee4d68205cc5f5', 'Site Administator', '', '', 'usersadmin@novascotialegalnews.ca', '2021-12-07 19:53:21', 1, 1),
(2, '48f5c010578708ca863e20acb40cb404', 'Art', 'Arthur', 'Kirkland', 'kirkland@novascotialegalnews.ca', '2021-12-07 19:53:21', 1, 1),
(3, '58c25b1bb0841ca15c547d3f8373ed70', 'Frank', 'Francis', 'Rayford', 'rayford@novascotialegalnews.ca', '2021-12-07 19:53:21', 1, 1),
(4, 'a9ab03d9a5ca5503f37cba8bb8f7bdfb', 'Henry', 'Henry', 'Fleming', 'fleming@novascotialegalnews.ca', '2021-12-07 19:53:21', 1, 1),
(5, '558b54ddea277593b5377a47f33a1bab', 'JayP', 'Jay', 'Porter', 'jayp@gmail.com', '2021-12-07 19:53:21', 1, 1),
(6, 'a93c925f5a6f3187447b3d4a98051040', 'DJ', 'Dave', 'Jameson', 'dj@gmail.com', '2021-12-07 19:53:21', 1, 1),
(7, 'b31db2054eb0b80844887a3239052b6a', 'Windy', 'Gail', 'Packer', 'windy12345@yahoo.com', '2021-12-07 19:53:21', 1, 1),
(8, 'baf9ca3c0f40807ee55e5cc23bc01a79', 'Liam', 'Liam', 'Osler', 'osler.liam@gmail.com', '2021-12-07 19:56:01', 1, 1),
(9, '0cc898390e1eae00d0237eed2e8204f4', 'LiamOsler2', 'Liam', 'Osler', 'osler.liam@gmail.com3', '2021-12-07 22:09:37', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usersaltandpepper`
--

CREATE TABLE `usersaltandpepper` (
  `privateID` varchar(255) NOT NULL,
  `userSalt` varchar(128) DEFAULT NULL,
  `userPepper` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usersaltandpepper`
--

INSERT INTO `usersaltandpepper` (`privateID`, `userSalt`, `userPepper`) VALUES
('0cc898390e1eae00d0237eed2e8204f4', 'f1e96e78', '1c5c7b4d'),
('48f5c010578708ca863e20acb40cb404', '7547eca1', '689a0e64'),
('558b54ddea277593b5377a47f33a1bab', 'd95cf184', '3c83ce26'),
('58c25b1bb0841ca15c547d3f8373ed70', '02f751cf', '30416bdd'),
('a93c925f5a6f3187447b3d4a98051040', '991343dd', '73b8805c'),
('a9ab03d9a5ca5503f37cba8bb8f7bdfb', 'e2a7e470', '2904419f'),
('b31db2054eb0b80844887a3239052b6a', '04ee0cb8', '20168c1c'),
('baf9ca3c0f40807ee55e5cc23bc01a79', '83430f44', '2ebe8338'),
('f19ba6dfb62dc68cf6ee4d68205cc5f5', '29e10024', 'aafa1319');

-- --------------------------------------------------------

--
-- Table structure for table `usersfollowsoutlets`
--

CREATE TABLE `usersfollowsoutlets` (
  `userID` int(11) DEFAULT NULL,
  `outletID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usersfollowsoutlets`
--

INSERT INTO `usersfollowsoutlets` (`userID`, `outletID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(5, 2),
(5, 3),
(6, 2),
(7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usersfollowsusers`
--

CREATE TABLE `usersfollowsusers` (
  `userID` int(11) DEFAULT NULL,
  `followID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usersfollowsusers`
--

INSERT INTO `usersfollowsusers` (`userID`, `followID`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(2, 1),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(3, 1),
(3, 2),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(4, 1),
(4, 6),
(4, 7),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(6, 3),
(7, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`adminID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `articlecomments`
--
ALTER TABLE `articlecomments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `articleID` (`articleID`);

--
-- Indexes for table `articlereactions`
--
ALTER TABLE `articlereactions`
  ADD PRIMARY KEY (`reactionID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `articleID` (`articleID`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`articleID`),
  ADD KEY `outletID` (`outletID`);

--
-- Indexes for table `commentreactions`
--
ALTER TABLE `commentreactions`
  ADD PRIMARY KEY (`reactionID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `commentID` (`commentID`);

--
-- Indexes for table `moderators`
--
ALTER TABLE `moderators`
  ADD PRIMARY KEY (`modID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`outletID`);

--
-- Indexes for table `userhashes`
--
ALTER TABLE `userhashes`
  ADD PRIMARY KEY (`privateID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `NAME` (`privateID`);

--
-- Indexes for table `usersaltandpepper`
--
ALTER TABLE `usersaltandpepper`
  ADD PRIMARY KEY (`privateID`);

--
-- Indexes for table `usersfollowsoutlets`
--
ALTER TABLE `usersfollowsoutlets`
  ADD KEY `userID` (`userID`),
  ADD KEY `outletID` (`outletID`);

--
-- Indexes for table `usersfollowsusers`
--
ALTER TABLE `usersfollowsusers`
  ADD KEY `userID` (`userID`),
  ADD KEY `followID` (`followID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `articlecomments`
--
ALTER TABLE `articlecomments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `articlereactions`
--
ALTER TABLE `articlereactions`
  MODIFY `reactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `articleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `commentreactions`
--
ALTER TABLE `commentreactions`
  MODIFY `reactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `moderators`
--
ALTER TABLE `moderators`
  MODIFY `modID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `outlets`
--
ALTER TABLE `outlets`
  MODIFY `outletID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrators`
--
ALTER TABLE `administrators`
  ADD CONSTRAINT `administrators_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `articlecomments`
--
ALTER TABLE `articlecomments`
  ADD CONSTRAINT `articlecomments_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `articlecomments_ibfk_2` FOREIGN KEY (`articleID`) REFERENCES `articles` (`articleID`);

--
-- Constraints for table `articlereactions`
--
ALTER TABLE `articlereactions`
  ADD CONSTRAINT `articlereactions_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `articlereactions_ibfk_2` FOREIGN KEY (`articleID`) REFERENCES `articles` (`articleID`);

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`outletID`) REFERENCES `outlets` (`outletID`);

--
-- Constraints for table `commentreactions`
--
ALTER TABLE `commentreactions`
  ADD CONSTRAINT `commentreactions_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `commentreactions_ibfk_2` FOREIGN KEY (`commentID`) REFERENCES `articlecomments` (`commentID`);

--
-- Constraints for table `moderators`
--
ALTER TABLE `moderators`
  ADD CONSTRAINT `moderators_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `usersfollowsoutlets`
--
ALTER TABLE `usersfollowsoutlets`
  ADD CONSTRAINT `usersfollowsoutlets_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `usersfollowsoutlets_ibfk_2` FOREIGN KEY (`outletID`) REFERENCES `outlets` (`outletID`);

--
-- Constraints for table `usersfollowsusers`
--
ALTER TABLE `usersfollowsusers`
  ADD CONSTRAINT `usersfollowsusers_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `usersfollowsusers_ibfk_2` FOREIGN KEY (`followID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

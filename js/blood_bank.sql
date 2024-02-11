

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `admin` (
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `admin` (`user`, `pass`) VALUES
('admin', 'admin');



CREATE TABLE `bloodgroup` (
  `bloodid` int(10) NOT NULL,
  `Bloodname` varchar(50) NOT NULL,
  `Availibility` varchar(50) NOT NULL,
  `unit` int(5) NOT NULL,
  `hospital` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `camps` (
  `hospital` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(100) NOT NULL,
  `contact` int(12) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `camps` (`hospital`, `address`, `city`, `contact`, `date`, `time`) VALUES
('Makati Hospital', 'Brgy. 1, Poblacion', 'Kabankalan City', 2147483647, '0000-00-00', '12:21:00');

CREATE TABLE `donate` (
  `id` int(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `age` int(50) NOT NULL,
  `bloodgroup` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `phno` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `donate` (`id`, `fullname`, `age`, `bloodgroup`, `city`, `phno`, `gender`) VALUES
(1, 'july King', 21, 'AB+', 'Kabankalan City', '09120118874', 'Male');



CREATE TABLE `login` (
  `ID` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `bloodgroup` varchar(4) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `massage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `login` (`ID`, `user`, `pass`, `useremail`, `bloodgroup`, `gender`, `massage`) VALUES
(2, 'adones', '12345', 'adones@gmail.com', 'AB+', 'Male', '');



CREATE TABLE `requestblood` (
  `id` int(50) NOT NULL,
  `user` varchar(30) DEFAULT NULL,
  `Address` varchar(100) NOT NULL,
  `bloodgroup` varchar(100) NOT NULL,
  `phno` varchar(100) NOT NULL,
  `unit` int(100) NOT NULL,
  `time-for-flood` varchar(10) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `requestblood` (`id`, `user`, `Address`, `bloodgroup`, `phno`, `unit`, `time-for-flood`, `time`, `message`) VALUES
(1, 'adones', 'Brgy. Suay, Himamaylan City', 'AB+', '09123456789', 1, 'Tomorrow M', '2021-02-03 02:47:46.353556', '');


ALTER TABLE `bloodgroup`
  ADD PRIMARY KEY (`bloodid`);

ALTER TABLE `camps`
  ADD PRIMARY KEY (`hospital`);


ALTER TABLE `donate`
  ADD PRIMARY KEY (`id`,`fullname`);


ALTER TABLE `login`
  ADD PRIMARY KEY (`user`,`useremail`),
  ADD KEY `ID` (`ID`);


ALTER TABLE `requestblood`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user` (`user`);


ALTER TABLE `bloodgroup`
  MODIFY `bloodid` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `donate`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `login`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `requestblood`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;


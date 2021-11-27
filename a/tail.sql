CREATE database tail;
CREATE TABLE `admin` (
  `ID` int(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `ContactNo` char(11) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deliveryman`
--

CREATE TABLE `deliveryman` (
  `DeliveryMan_ID` int(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `Username` varchar(30) NOT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `design`
--

CREATE TABLE `design` (
  `Design_ID` int(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `Design_Name` varchar(30) NOT NULL ,
  `Fabric` varchar(30) NOT NULL,
  `Image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `measurement`
--

CREATE TABLE `measurement` (
  `Measurement_ID` int(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `Chest` float NOT NULL,
  `Waist` float NOT NULL,
  `Sleeve` float NOT NULL,
  `Neck` float NOT NULL,
  other varchar(30)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Customer_ID` int(10) NOT NULL ,
  `Tailor_ID` int(10) NOT NULL,
  `Order_ID` int(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `Design_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `process`
--

CREATE TABLE `process` (
  `AdminID` int(10) NOT NULL,
  `DeliveryMan_ID` int(10) NOT NULL,
  `ProcessID` int(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `Order_ID` int(10) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Status` binary(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tailor`
--

CREATE TABLE `tailor` (
  `Tailor_ID` int(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Rating` int(1) NOT NULL,
  `Approval` binary(1) NOT NULL,
  `AdminID` int(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tailor_design`
--

CREATE TABLE `tailor_design` (
  `Tailor_ID` int(10) NOT NULL,
  `Design_ID` int(10) NOT NULL,
  `TD_ID` int(10) NOT NULL,
  `OrderCustomer_ID` int(10) NOT NULL,
  `OrderTailor_ID` int(10) NOT NULL,
  `Order_ID` int(10) NOT NULL,
  `Price` int(11) NOT NULL,
  `Measurement_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `ContactNo` (`ContactNo`);

--
-- Indexes for table `deliveryman`
--
ALTER TABLE `deliveryman`
  
  ADD UNIQUE KEY `ContactNo` (`ContactNo`);

--
-- Indexes for table `design`
--
ALTER TABLE `design`
  ADD PRIMARY KEY (`Design_ID`),
  ADD UNIQUE KEY `Design_Name` (`Design_Name`);

--
-- Indexes for table `measurement`
--

  

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Tailor_ID`,`Order_ID`),
  ADD UNIQUE KEY `Design_ID` (`Design_ID`),
  ADD KEY `FKOrder885950` (`Customer_ID`),
  ADD KEY `FKOrder590722` (`Tailor_ID`);

--
-- Indexes for table `process`
--
ALTER TABLE `process`
  
  ADD UNIQUE KEY `Order_ID` (`Order_ID`),
  ADD KEY `FKProcess267002` (`AdminID`),
  ADD KEY `FKProcess257010` (`DeliveryMan_ID`);

--
-- Indexes for table `tailor`
--
ALTER TABLE `tailor`
  
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `FKTailor172370` (`AdminID`);

--
-- Indexes for table `tailor_design`
--
ALTER TABLE `tailor_design`
 
  ADD KEY `FKTailor_Des70880` (`Tailor_ID`),
  ADD KEY `FKTailor_Des988348` (`Design_ID`),
  ADD KEY `FKTailor_Des671222` (`OrderTailor_ID`,`Order_ID`),
  ADD KEY `FKTailor_Des783953` (`Measurement_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `measurement`
--
ALTER TABLE `measurement`
  MODIFY `Measurement_ID` int(10) NOT NULL AUTO_INCREMENT;
 
 ALTER TABLE Tailor_Design ADD INDEX FKTailor_Des1 (TailorTailor_ID), ADD CONSTRAINT FKTailor_Des498560 FOREIGN KEY (TailorTailor_ID) REFERENCES Tailor (Tailor_ID);

ALTER TABLE Tailor_Design ADD INDEX FKTailor_Des2 (DesignDesign_ID), ADD CONSTRAINT FKTailor_Des614190 FOREIGN KEY (DesignDesign_ID) REFERENCES Design (Design_ID);

ALTER TABLE `Order` ADD INDEX FKOrder1 (CustomerCustomer_ID), ADD CONSTRAINT FKOrder2 FOREIGN KEY (CustomerCustomer_ID) REFERENCES Customer (Customer_ID);

ALTER TABLE `Order` ADD INDEX FKOrder3 (TailorTailor_ID), ADD CONSTRAINT FKOrder188572 FOREIGN KEY (TailorTailor_ID) REFERENCES Tailor (Tailor_ID);

ALTER TABLE `Order` ADD INDEX FKOrder4 (Measurement_ID), ADD CONSTRAINT FKOrder93942 FOREIGN KEY (Measurement_ID) REFERENCES Measurement (Measurement_ID);

ALTER TABLE Tailor ADD INDEX FKTailor1 (AdminID), ADD CONSTRAINT FKTailor2 FOREIGN KEY (AdminID) REFERENCES Admin (ID);

ALTER TABLE Process ADD INDEX FKProcess1 (AdminID), ADD CONSTRAINT FKProcess2 FOREIGN KEY (AdminID) REFERENCES Admin (ID);

ALTER TABLE Process ADD INDEX FKProcess3 (DeliveryMan_ID), ADD CONSTRAINT FKProcess4 FOREIGN KEY (DeliveryMan_ID) REFERENCES DeliveryMan (DeliveryMan_ID);

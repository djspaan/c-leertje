USE `leertje`;

/****** Object:  Table [dbo].[Category]    Script Date: 11-3-2018 22:11:33 ******/
/* SET ANSI_NULLS ON */

/* SET QUOTED_IDENTIFIER ON */

CREATE TABLE Category(
	`Id` int AUTO_INCREMENT NOT NULL,
	`Name` nvarchar(256) NULL,
PRIMARY KEY
(
	`Id` ASC
)
);
/****** Object:  Table [dbo].[File]    Script Date: 11-3-2018 22:11:33 ******/
/* SET ANSI_NULLS ON */

/* SET QUOTED_IDENTIFIER ON */

CREATE TABLE File(
	`Id` int AUTO_INCREMENT NOT NULL,
	`Name` nvarchar(256) NULL,
	`Location` nvarchar(256) NULL,
PRIMARY KEY
(
	`Id` ASC
)
);
/****** Object:  Table [dbo].[Product]    Script Date: 11-3-2018 22:11:33 ******/
/* SET ANSI_NULLS ON */

/* SET QUOTED_IDENTIFIER ON */

CREATE TABLE Product(
	`Id` int AUTO_INCREMENT NOT NULL,
	`StoreId` int NULL,
	`Name` nvarchar(256) NULL,
	`Price` Double NULL,
	`ShortDescription` nvarchar(1000) NULL,
	`FullDescription` Longtext NULL,
	`MetaDescription` nvarchar(1000) NULL,
	`Supplier` nvarchar(1000) NULL,
	`Brand` nvarchar(1000) NULL,
	`Model` nvarchar(1000) NULL,
	`ImageId` int NULL,
	`ThumbnailId` int NULL,
	`CategoryId` int NULL,
	`VATId` int NULL,
	`AvailableSince` datetime(3) NULL,
	`Sku` nvarchar(50) NULL,
	`Percentage` int NULL,
PRIMARY KEY
(
	`Id` ASC
)
);
/****** Object:  Table [dbo].[Store]    Script Date: 11-3-2018 22:11:33 ******/
/* SET ANSI_NULLS ON */

/* SET QUOTED_IDENTIFIER ON */

CREATE TABLE Store(
	`Id` int AUTO_INCREMENT NOT NULL,
	`Name` nvarchar(256) NULL,
PRIMARY KEY
(
	`Id` ASC
)
);
/****** Object:  Table [dbo].[VAT]    Script Date: 11-3-2018 22:11:33 ******/
/* SET ANSI_NULLS ON */

/* SET QUOTED_IDENTIFIER ON */

CREATE TABLE VAT(
	`Id` int AUTO_INCREMENT NOT NULL,
	`Name` nvarchar(256) NULL,
	`Percentage` int NULL,
PRIMARY KEY
(
	`Id` ASC
)
);

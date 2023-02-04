/*
Navicat SQL Server Data Transfer

Source Server         : LOCAL
Source Server Version : 105000
Source Host           : localhost:1433
Source Database       : dbRSHARJO
Source Schema         : dbo

Target Server Type    : SQL Server
Target Server Version : 105000
File Encoding         : 65001

Date: 2019-10-21 12:56:01
*/


-- ----------------------------
-- Table structure for AwSuratKonsul
-- ----------------------------
DROP TABLE [dbo].[AwSuratKonsul]
GO
CREATE TABLE [dbo].[AwSuratKonsul] (
[NoSuratKonsul] nvarchar(30) NULL ,
[Regno] nvarchar(8) NULL ,
[KdPoliAsal] nvarchar(5) NULL ,
[KdICD] nvarchar(50) NULL ,
[TanggalSuratKonsul] date NULL ,
[Terapi] text NULL ,
[Catatan] text NULL ,
[KdPoliTuju] nvarchar(5) NULL ,
[UserAcc] nvarchar(2) NULL ,
[TanggalAcc] datetime NULL ,
[ValidUser] varchar(255) NULL ,
[KdDocTuju] nvarchar(10) NULL 
)


GO

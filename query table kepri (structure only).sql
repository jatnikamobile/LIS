-- KALAU MAU CARI TABEL NYA  SEARCH " Table structure for _______ " (NAMA TABEL NYA)

-- ----------------------------
-- Table structure for akses_level


CREATE TABLE [dbo].[akses_level] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [user_id] int  NOT NULL,
  [akses_level] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[akses_level] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for AM_ACTIONPROFILE


CREATE TABLE [dbo].[AM_ACTIONPROFILE] (
  [ID] bigint  NOT NULL,
  [NAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [TYPE] bigint  NOT NULL
)
GO

ALTER TABLE [dbo].[AM_ACTIONPROFILE] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for AM_ManagedObject


CREATE TABLE [dbo].[AM_ManagedObject] (
  [RESOURCEID] bigint  NOT NULL,
  [RESOURCENAME] nvarchar(2000) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [TYPE] varchar(115) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [DISPLAYNAME] varchar(515) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [DESCRIPTION] varchar(max) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DCSTARTED] bigint DEFAULT ((0)) NOT NULL,
  [ACTIONSTATUS] bigint DEFAULT ((1)) NULL,
  [CREATIONTIME] bigint  NULL
)
GO

ALTER TABLE [dbo].[AM_ManagedObject] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for angka_insiden_pas_jatuh


CREATE TABLE [dbo].[angka_insiden_pas_jatuh] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [tanggal] date  NULL,
  [no_registrasi] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nama] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_rm] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [bangsal] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tgl_jatuh] date  NULL,
  [jam_jatuh] time(7)  NULL,
  [klasifikasi_perlukaan] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tgl_lapor] date  NULL,
  [pelaporan] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[angka_insiden_pas_jatuh] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for angka_kegagalan_lay_rad


CREATE TABLE [dbo].[angka_kegagalan_lay_rad] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] date  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmBangsal] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NMPoli] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DrPeng] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PenyebabPenolakan] nvarchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DrRad] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[angka_kegagalan_lay_rad] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for ANNOTATION


CREATE TABLE [dbo].[ANNOTATION] (
  [ENTITY] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [WHO] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MODTIME] numeric(19)  NULL,
  [OWNERNAME] varchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NOTES] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[ANNOTATION] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for AntrianDokter


CREATE TABLE [dbo].[AntrianDokter] (
  [id] int  NOT NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdHari] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Praktik] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[AntrianDokter] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for Applications


CREATE TABLE [dbo].[Applications] (
  [ID] bigint  NULL,
  [RESOURCENAME] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [RESOURCETYPE] varchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [APPNAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [APPTYPE] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[Applications] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for asmnt_pasien


CREATE TABLE [dbo].[asmnt_pasien] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [tanggal] date  NULL,
  [no_registrasi] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nama] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_rm] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diagnosa] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [bangsal] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kelengkapan_pengk_awal] char(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tgl_pengk_awal] date  NULL
)
GO

ALTER TABLE [dbo].[asmnt_pasien] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for asmnt_pasien_new


CREATE TABLE [dbo].[asmnt_pasien_new] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [tanggal] date  NULL,
  [no_registrasi] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nama] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_rm] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diagnosa] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [bangsal] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kelengkapan_pengk_awal] char(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tgl_pengk_awal] date  NULL
)
GO

ALTER TABLE [dbo].[asmnt_pasien_new] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for AttributeAudit


CREATE TABLE [dbo].[AttributeAudit] (
  [ID] bigint  NULL,
  [IDENTIFIER] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TIMEOFFINISH] varchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RETRIES] bigint  NULL,
  [STATUS] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[AttributeAudit] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for Audit_Diet_Detail


CREATE TABLE [dbo].[Audit_Diet_Detail] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [id_head] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPasien] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Medrec] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [OrderDiet] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DietDisajikan] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Rencana_Diet] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[Audit_Diet_Detail] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for Audit_Diet_Head


CREATE TABLE [dbo].[Audit_Diet_Head] (
  [tanggal] date  NULL,
  [lokasi] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [auditor] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [id] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[Audit_Diet_Head] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for AuthAudit


CREATE TABLE [dbo].[AuthAudit] (
  [USERNAME] varchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [OPERATION] varchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [AUDITTIME] varchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [STATUS] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[AuthAudit] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for AwBerkas


CREATE TABLE [dbo].[AwBerkas] (
  [Id] int  IDENTITY(1,1) NOT NULL,
  [Regno] char(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Medrec] char(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [IdBerkas] int  NULL,
  [FileType] int  NOT NULL,
  [FileName] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [urutan] int  NULL,
  [Directory] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JenisRawat] int  NULL
)
GO

ALTER TABLE [dbo].[AwBerkas] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for AwBerkasKlaim


CREATE TABLE [dbo].[AwBerkasKlaim] (
  [Regno] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Medrec] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regdate] datetime  NULL,
  [Regtime] datetime  NULL,
  [NoSep] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Instalasi] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [FolderKlaim] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kronis] char(2) COLLATE SQL_Latin1_General_CP1_CI_AS DEFAULT ((0)) NULL
)
GO

ALTER TABLE [dbo].[AwBerkasKlaim] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for AwBerkasKronis


CREATE TABLE [dbo].[AwBerkasKronis] (
  [Id] int  IDENTITY(1,1) NOT NULL,
  [Regno] char(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Medrec] char(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [IdBerkas] int  NULL,
  [FileType] int  NOT NULL,
  [FileName] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [urutan] int  NULL,
  [Directory] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JenisRawat] int  NULL
)
GO

ALTER TABLE [dbo].[AwBerkasKronis] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for AwHasilBiayaMutu


CREATE TABLE [dbo].[AwHasilBiayaMutu] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [Regno] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Medrec] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Firstname] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [LamaDirawat] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BiayaRuangan] float(53)  NULL,
  [BiayaIrna] float(53)  NULL,
  [BiayaOk] float(53)  NULL,
  [BiayaLab] float(53)  NULL,
  [BiayaRad] float(53)  NULL,
  [BiayaFis] float(53)  NULL,
  [BiayaHemo] float(53)  NULL,
  [BiayaPoli] float(53)  NULL,
  [BiayaUgd] float(53)  NULL,
  [BiayaApotek] float(53)  NULL,
  [BiayaTotal] float(53)  NULL,
  [BiayaInacbg] float(53)  NULL,
  [BiayaAkhir] float(53)  NULL,
  [Keterangan] nvarchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CreateAt] date  NULL,
  [UpdateAt] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[AwHasilBiayaMutu] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for AwKonsulPreops


CREATE TABLE [dbo].[AwKonsulPreops] (
  [Regno] int  NULL,
  [Medrec] varchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoSuratKonsul] varchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoliAsal] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalBuat] date  NULL,
  [PoliKe] varchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoliTuju] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDocTuju] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDocAsal] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Id_order] int  IDENTITY(1,1) NOT NULL
)
GO

ALTER TABLE [dbo].[AwKonsulPreops] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for AwMasterDataBerkasEKlaim


CREATE TABLE [dbo].[AwMasterDataBerkasEKlaim] (
  [Id] int  IDENTITY(1,1) NOT NULL,
  [NamaBerkas] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SumberBerkas] int  NULL,
  [RawatInap] int  NULL,
  [RawatJalan] int  NULL,
  [MultipleUpload] int  NULL,
  [SumberData] varchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Urutan] int  NULL,
  [tanpa_sep] int  NULL
)
GO

ALTER TABLE [dbo].[AwMasterDataBerkasEKlaim] SET (LOCK_ESCALATION = TABLE)
GO

EXEC sp_addextendedproperty
'MS_Description', N'1=Tarikan,2=Upload',
'SCHEMA', N'dbo',
'TABLE', N'AwMasterDataBerkasEKlaim',
'COLUMN', N'SumberBerkas'
GO

EXEC sp_addextendedproperty
'MS_Description', N'1=Ya,0=Tidak',
'SCHEMA', N'dbo',
'TABLE', N'AwMasterDataBerkasEKlaim',
'COLUMN', N'RawatInap'
GO

EXEC sp_addextendedproperty
'MS_Description', N'1=Ya,0=Tidak',
'SCHEMA', N'dbo',
'TABLE', N'AwMasterDataBerkasEKlaim',
'COLUMN', N'RawatJalan'
GO

EXEC sp_addextendedproperty
'MS_Description', N'1=Ya,0=Tidak',
'SCHEMA', N'dbo',
'TABLE', N'AwMasterDataBerkasEKlaim',
'COLUMN', N'MultipleUpload'
GO

EXEC sp_addextendedproperty
'MS_Description', N'Diisi Jika SumberBerkas=1 (Tarikan)',
'SCHEMA', N'dbo',
'TABLE', N'AwMasterDataBerkasEKlaim',
'COLUMN', N'SumberData'
GO

EXEC sp_addextendedproperty
'MS_Description', N'1=munculkan,0=tiadakan',
'SCHEMA', N'dbo',
'TABLE', N'AwMasterDataBerkasEKlaim',
'COLUMN', N'tanpa_sep'
GO


-- ----------------------------
-- Table structure for AwMasterDataBerkasEKlaimKronis


CREATE TABLE [dbo].[AwMasterDataBerkasEKlaimKronis] (
  [Id] int  IDENTITY(1,1) NOT NULL,
  [NamaBerkas] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SumberBerkas] int  NULL,
  [RawatInap] int  NULL,
  [RawatJalan] int  NULL,
  [MultipleUpload] int  NULL,
  [SumberData] varchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Urutan] int  NULL
)
GO

ALTER TABLE [dbo].[AwMasterDataBerkasEKlaimKronis] SET (LOCK_ESCALATION = TABLE)
GO

EXEC sp_addextendedproperty
'MS_Description', N'1=Tarikan,2=Upload',
'SCHEMA', N'dbo',
'TABLE', N'AwMasterDataBerkasEKlaimKronis',
'COLUMN', N'SumberBerkas'
GO

EXEC sp_addextendedproperty
'MS_Description', N'1=Ya,0=Tidak',
'SCHEMA', N'dbo',
'TABLE', N'AwMasterDataBerkasEKlaimKronis',
'COLUMN', N'RawatInap'
GO

EXEC sp_addextendedproperty
'MS_Description', N'1=Ya,0=Tidak',
'SCHEMA', N'dbo',
'TABLE', N'AwMasterDataBerkasEKlaimKronis',
'COLUMN', N'RawatJalan'
GO

EXEC sp_addextendedproperty
'MS_Description', N'1=Ya,0=Tidak',
'SCHEMA', N'dbo',
'TABLE', N'AwMasterDataBerkasEKlaimKronis',
'COLUMN', N'MultipleUpload'
GO

EXEC sp_addextendedproperty
'MS_Description', N'Diisi Jika SumberBerkas=1 (Tarikan)',
'SCHEMA', N'dbo',
'TABLE', N'AwMasterDataBerkasEKlaimKronis',
'COLUMN', N'SumberData'
GO


-- ----------------------------
-- Table structure for AwNoSuratKontrol


CREATE TABLE [dbo].[AwNoSuratKontrol] (
  [NoSurat] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Regno] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CreateAt] date  NULL
)
GO

ALTER TABLE [dbo].[AwNoSuratKontrol] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for AwRegOnline


CREATE TABLE [dbo].[AwRegOnline] (
  [No] int  IDENTITY(1,1) NOT NULL,
  [NoAntri] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PoliDituju] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DokterPoli] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglBerobat] date  NULL,
  [NoHP] varchar(16) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglInput] datetime  NULL,
  [JamDatang] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Cookie] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[AwRegOnline] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for AwSuratKonsul


CREATE TABLE [dbo].[AwSuratKonsul] (
  [NoSuratKonsul] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoliAsal] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdICD] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalSuratKonsul] date  NULL,
  [Terapi] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Catatan] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoliTuju] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UserAcc] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalAcc] datetime  NULL,
  [ValidUser] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDocTuju] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalKonsul] date  NULL,
  [Status] varchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDocAsal] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PreOps] char(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[AwSuratKonsul] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for AwSuratKontrolDetail


CREATE TABLE [dbo].[AwSuratKontrolDetail] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [NoSurat] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Alasan] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tindakan] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[AwSuratKontrolDetail] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for AwSuratKontrolHead


CREATE TABLE [dbo].[AwSuratKontrolHead] (
  [NoSurat] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Regno] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS DEFAULT NULL NULL,
  [Medrec] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS DEFAULT NULL NULL,
  [Firstname] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS DEFAULT NULL NULL,
  [NoRujukan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS DEFAULT NULL NULL,
  [TanggalRujukan] date DEFAULT NULL NULL,
  [TanggalSurat] date DEFAULT NULL NULL,
  [NoAntri] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS DEFAULT NULL NULL,
  [KdPoli] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Diagnosa] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CreateAt] date  NULL,
  [KdPoliTuju] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPoliTuju] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDokterTuju] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmDokterTuju] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Catatan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDiagnosa] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KonsulOperasi] int  NULL,
  [JenisSuratKonsul] int  NULL,
  [NoPeserta] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [GroupUnit] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_surat_kontrol_bpjs] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[AwSuratKontrolHead] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for AwSuratKontrolInap


CREATE TABLE [dbo].[AwSuratKontrolInap] (
  [NoSurat] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Regno] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Medrec] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglPulang] date  NULL,
  [Terapi] varchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglKePoli] date  NULL,
  [KdPoli] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nasehat] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CreateAt] date  NULL,
  [Diagnosa] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoPeserta] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [GroupUnit] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_surat_kontrol_bpjs] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[AwSuratKontrolInap] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for AwSuratPatologiAnatomi


CREATE TABLE [dbo].[AwSuratPatologiAnatomi] (
  [NoSediaan] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Regno] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(12) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurThn] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Address] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KDPoli] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NMPoli] nvarchar(60) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmBangsal] nvarchar(60) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDokterPengirim] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDokter] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglTerima] datetime  NULL,
  [TglJawab] datetime  NULL,
  [Diagnosa] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Makroskopik] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Mikroskopik] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kesimpulan] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CreateAt] datetime  NULL,
  [Bahan] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[AwSuratPatologiAnatomi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for BDRS_Jenis_Darah


CREATE TABLE [dbo].[BDRS_Jenis_Darah] (
  [Id] int  IDENTITY(1,1) NOT NULL,
  [Nama] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Aktif] int  NULL,
  [RegBy] int  NULL,
  [RegDate] date  NULL
)
GO

ALTER TABLE [dbo].[BDRS_Jenis_Darah] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for BDRS_Permintaan


CREATE TABLE [dbo].[BDRS_Permintaan] (
  [Kode_Permintaan] int  IDENTITY(1,1) NOT NULL,
  [id_dokter] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_reg] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [medrec] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nama] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [sex] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [umur] int  NULL,
  [alamat] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diagnosa] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [indikasi] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [hamil] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [abortus] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [id_gol_darah] int  NULL,
  [packed] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jumlah] int  NULL,
  [kantong_id] int  NULL,
  [transfusi_sebelumnya] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [transfusi_sebelumnya_date] date  NULL,
  [keterangan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [id_unit] int  NULL,
  [periksa] tinyint  NULL,
  [close_permintaan] tinyint  NULL,
  [reg_by] int  NULL,
  [reg_date] date  NULL,
  [jml_terpakai] int  NULL,
  [wb] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [partus] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tanggal] date  NULL,
  [kepada] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [return_date] datetime  NULL,
  [return_jml] int  NULL,
  [return_petugas] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [return_alasan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[BDRS_Permintaan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for BDRS_Permintaan_detail


CREATE TABLE [dbo].[BDRS_Permintaan_detail] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [kode_minta] int  NULL,
  [id_gol_darah] int  NULL,
  [jumlah] int  NULL,
  [kantong_id] int  NULL
)
GO

ALTER TABLE [dbo].[BDRS_Permintaan_detail] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for BDRS_Persediaan


CREATE TABLE [dbo].[BDRS_Persediaan] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [jns_trans] tinyint  NULL,
  [id_permintaan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [id_gol_darah] int  NULL,
  [cross_match] tinyint  NULL,
  [jml] int  NULL,
  [kantong_id] int  NULL,
  [sumber] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [reg_by] int  NULL,
  [reg_date] datetime  NULL,
  [exp_date] date  NULL,
  [kondisi] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_kantong] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[BDRS_Persediaan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for BDRS_Persediaan_detail


CREATE TABLE [dbo].[BDRS_Persediaan_detail] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [id_permintaan] int  NULL,
  [no_kantong] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jenis_id] int  NULL,
  [tgl_ambil] datetime  NULL,
  [petugas_bdrs] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [pengambil] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[BDRS_Persediaan_detail] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for BDRS_TBLMasterRole


CREATE TABLE [dbo].[BDRS_TBLMasterRole] (
  [KdRole] int  IDENTITY(1,1) NOT NULL,
  [NmRole] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Aktif] tinyint  NULL,
  [RegBy] int  NULL,
  [RegDate] date  NULL
)
GO

ALTER TABLE [dbo].[BDRS_TBLMasterRole] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for BDRS_TBLMasterSetting


CREATE TABLE [dbo].[BDRS_TBLMasterSetting] (
  [KdSetting] int  IDENTITY(1,1) NOT NULL,
  [NmInstitusi] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPendek] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Alamat] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Logo] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Aktif] tinyint  NULL,
  [RegBy] int  NULL,
  [RegDate] date  NULL
)
GO

ALTER TABLE [dbo].[BDRS_TBLMasterSetting] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for BDRS_TBLMasterUkuran


CREATE TABLE [dbo].[BDRS_TBLMasterUkuran] (
  [kantong_id] int  IDENTITY(1,1) NOT NULL,
  [kantong_darah] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kantong_regby] int  NULL,
  [kantong_regdate] date  NULL,
  [kantong_aktif] int  NULL
)
GO

ALTER TABLE [dbo].[BDRS_TBLMasterUkuran] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for BDRS_TBLMasterUnit


CREATE TABLE [dbo].[BDRS_TBLMasterUnit] (
  [UnitName] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [id] int  IDENTITY(1,1) NOT NULL
)
GO

ALTER TABLE [dbo].[BDRS_TBLMasterUnit] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for BDRS_TBLMasterUser


CREATE TABLE [dbo].[BDRS_TBLMasterUser] (
  [KdUser] int  IDENTITY(1,1) NOT NULL,
  [NmUser] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UserName] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Password] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdUnit] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdRole] int  NULL,
  [Aktif] int  NULL,
  [RegBy] int  NULL,
  [RegDate] date  NULL
)
GO

ALTER TABLE [dbo].[BDRS_TBLMasterUser] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for BEFailOver


CREATE TABLE [dbo].[BEFailOver] (
  [HOSTADDRESS] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NMSBEPORT] bigint  NOT NULL,
  [RMIREGISTRYPORT] bigint  NULL,
  [LASTCOUNT] numeric(19)  NULL,
  [SERVERROLE] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [STANDBYSERVERNAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [WEBSERVERPORT] int  NULL,
  [WEBPROTOCOL] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[BEFailOver] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for BiayaBungkus


CREATE TABLE [dbo].[BiayaBungkus] (
  [KdBungkus] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmBungkus] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Biaya] float(53)  NULL
)
GO

ALTER TABLE [dbo].[BiayaBungkus] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for BiayaResep


CREATE TABLE [dbo].[BiayaResep] (
  [Bks11] float(53)  NULL,
  [Bks12] float(53)  NULL,
  [Biaya1] float(53)  NULL,
  [Bks21] float(53)  NULL,
  [Bks22] float(53)  NULL,
  [Biaya2] float(53)  NULL,
  [Bks31] float(53)  NULL,
  [Bks32] float(53)  NULL,
  [Biaya3] float(53)  NULL,
  [Bks41] float(53)  NULL,
  [Bks42] float(53)  NULL,
  [Biaya4] float(53)  NULL,
  [Bks51] float(53)  NULL,
  [Bks52] float(53)  NULL,
  [Biaya5] float(53)  NULL,
  [NonRacikan] float(53)  NULL,
  [Embalase] float(53)  NULL,
  [RawatJalan] float(53)  NULL
)
GO

ALTER TABLE [dbo].[BiayaResep] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for bildetailtarifOk


CREATE TABLE [dbo].[bildetailtarifOk] (
  [KdbillTarif] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [kdbillop] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jumlah] int  NULL,
  [kdHeadTarif] varchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tarif] money  NULL
)
GO

ALTER TABLE [dbo].[bildetailtarifOk] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for BilForensik


CREATE TABLE [dbo].[BilForensik] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KodeTarif] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaTindakan] nvarchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DetailCode] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DetailName] nvarchar(70) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdURL] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrOpr] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrRawat] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdAsDrOpr] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrAnestesi] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrPenata] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrAnak] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrPendamping] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBidan] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdAsBidan] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ByRrawat] float(53)  NULL,
  [ByDrOpr] float(53)  NULL,
  [ByAsDrOpr] float(53)  NULL,
  [ByDrAnestesi] float(53)  NULL,
  [ByDrPenata] float(53)  NULL,
  [ByDrAnak] float(53)  NULL,
  [ByDrPendamping] float(53)  NULL,
  [ByBidan] float(53)  NULL,
  [ByAsBidan] float(53)  NULL,
  [BySewaAlat] float(53)  NULL,
  [ByAlatRS] float(53)  NULL,
  [ByRroom] float(53)  NULL,
  [ByObat] float(53)  NULL,
  [JumlahBiaya] float(53)  NULL,
  [Cito] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NilaiCito] float(53)  NULL,
  [CitoDrOperator] float(53)  NULL,
  [CitoAsDrOperator] float(53)  NULL,
  [CitoDrAnestesi] float(53)  NULL,
  [CitoAsDrAnestesi] float(53)  NULL,
  [CitoDrAnak] float(53)  NULL,
  [CitoDrPendamping] float(53)  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sts] int  NULL,
  [VCode] int  NULL,
  [Verifikasi] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [dabyrrawat] float(53)  NULL,
  [dabyalatrs] float(53)  NULL,
  [dabydropr] float(53)  NULL,
  [dabyasdropr] float(53)  NULL,
  [dabydranestesi] float(53)  NULL,
  [dabydrpenata] float(53)  NULL,
  [dabydranak] float(53)  NULL,
  [dabydrpendamping] float(53)  NULL,
  [dabybidan] float(53)  NULL,
  [dabyasbidan] float(53)  NULL,
  [dabysewaalat] float(53)  NULL,
  [dabyrroom] float(53)  NULL,
  [dabyobat] float(53)  NULL,
  [dajumlahbiaya] float(53)  NULL,
  [umbyrrawat] float(53)  NULL,
  [umbyalatrs] float(53)  NULL,
  [umbydropr] float(53)  NULL,
  [umbyasdropr] float(53)  NULL,
  [umbydranestesi] float(53)  NULL,
  [umbydrpenata] float(53)  NULL,
  [umbydranak] float(53)  NULL,
  [umbydrpendamping] float(53)  NULL,
  [umbybidan] float(53)  NULL,
  [umbyasbidan] float(53)  NULL,
  [umbysewaalat] float(53)  NULL,
  [umbyrroom] float(53)  NULL,
  [umbyobat] float(53)  NULL,
  [umjumlahbiaya] float(53)  NULL,
  [is_posted] bit DEFAULT ((0)) NULL,
  [ByImplant] float(53)  NULL,
  [ByAlat] float(53)  NULL,
  [ByCucian] float(53)  NULL,
  [ByHSpeetDrill] float(53)  NULL,
  [ByENDOSCOPY] float(53)  NULL,
  [ByInfantWarmer] float(53)  NULL,
  [ByCArm] float(53)  NULL,
  [ByCuttingLoop] float(53)  NULL,
  [ByUSGDoopler] float(53)  NULL,
  [BySonopet] float(53)  NULL,
  [StatusRawat] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SecondaryActionsCode] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SecondaryActionsName] ntext COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ByPatologi] float(53)  NULL,
  [Qty] int  NULL,
  [Sarana] float(53)  NULL,
  [Pelayanan] float(53)  NULL,
  [Discount] real  NULL,
  [KdLain] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [stsbayar] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tglbayar] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[BilForensik] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for BilOperasi


CREATE TABLE [dbo].[BilOperasi] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KodeTarif] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaTindakan] nvarchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DetailCode] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DetailName] nvarchar(70) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdURL] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrOpr] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrRawat] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdAsDrOpr] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrAnestesi] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrPenata] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrAnak] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrPendamping] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBidan] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdAsBidan] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ByRrawat] float(53)  NULL,
  [ByDrOpr] float(53)  NULL,
  [ByAsDrOpr] float(53)  NULL,
  [ByDrAnestesi] float(53)  NULL,
  [ByDrPenata] float(53)  NULL,
  [ByDrAnak] float(53)  NULL,
  [ByDrPendamping] float(53)  NULL,
  [ByBidan] float(53)  NULL,
  [ByAsBidan] float(53)  NULL,
  [BySewaAlat] float(53)  NULL,
  [ByAlatRS] float(53)  NULL,
  [ByRroom] float(53)  NULL,
  [ByObat] float(53)  NULL,
  [JumlahBiaya] float(53)  NULL,
  [Cito] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NilaiCito] float(53)  NULL,
  [CitoDrOperator] float(53)  NULL,
  [CitoAsDrOperator] float(53)  NULL,
  [CitoDrAnestesi] float(53)  NULL,
  [CitoAsDrAnestesi] float(53)  NULL,
  [CitoDrAnak] float(53)  NULL,
  [CitoDrPendamping] float(53)  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sts] int  NULL,
  [VCode] int  NULL,
  [Verifikasi] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [dabyrrawat] float(53)  NULL,
  [dabyalatrs] float(53)  NULL,
  [dabydropr] float(53)  NULL,
  [dabyasdropr] float(53)  NULL,
  [dabydranestesi] float(53)  NULL,
  [dabydrpenata] float(53)  NULL,
  [dabydranak] float(53)  NULL,
  [dabydrpendamping] float(53)  NULL,
  [dabybidan] float(53)  NULL,
  [dabyasbidan] float(53)  NULL,
  [dabysewaalat] float(53)  NULL,
  [dabyrroom] float(53)  NULL,
  [dabyobat] float(53)  NULL,
  [dajumlahbiaya] float(53)  NULL,
  [umbyrrawat] float(53)  NULL,
  [umbyalatrs] float(53)  NULL,
  [umbydropr] float(53)  NULL,
  [umbyasdropr] float(53)  NULL,
  [umbydranestesi] float(53)  NULL,
  [umbydrpenata] float(53)  NULL,
  [umbydranak] float(53)  NULL,
  [umbydrpendamping] float(53)  NULL,
  [umbybidan] float(53)  NULL,
  [umbyasbidan] float(53)  NULL,
  [umbysewaalat] float(53)  NULL,
  [umbyrroom] float(53)  NULL,
  [umbyobat] float(53)  NULL,
  [umjumlahbiaya] float(53)  NULL,
  [is_posted] bit DEFAULT ((0)) NULL,
  [ByImplant] float(53)  NULL,
  [ByAlat] float(53)  NULL,
  [ByCucian] float(53)  NULL,
  [ByHSpeetDrill] float(53)  NULL,
  [ByENDOSCOPY] float(53)  NULL,
  [ByInfantWarmer] float(53)  NULL,
  [ByCArm] float(53)  NULL,
  [ByCuttingLoop] float(53)  NULL,
  [ByUSGDoopler] float(53)  NULL,
  [BySonopet] float(53)  NULL,
  [StatusRawat] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SecondaryActionsCode] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SecondaryActionsName] ntext COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ByPatologi] float(53)  NULL,
  [Qty] int  NULL,
  [Sarana] float(53)  NULL,
  [Pelayanan] float(53)  NULL,
  [kdlain] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [bylain] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Discount] real  NULL,
  [stsbayar] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tglbayar] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[BilOperasi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for BS_Integ_Info


CREATE TABLE [dbo].[BS_Integ_Info] (
  [BS_ID] int  NOT NULL,
  [BV_NAME] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [IG_ID] int  NULL
)
GO

ALTER TABLE [dbo].[BS_Integ_Info] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for Checklist_mesin


CREATE TABLE [dbo].[Checklist_mesin] (
  [id_checklist] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [notransaksi] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nolab] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nm_function] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tglpilih] datetime  NULL
)
GO

ALTER TABLE [dbo].[Checklist_mesin] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for data_bayar_jasa_dokter_detail


CREATE TABLE [dbo].[data_bayar_jasa_dokter_detail] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [regno] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kd_poli] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kd_bangsal] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kd_kelas] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [notran] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tanggal] date  NULL,
  [kd_tarif] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [detail_tarif] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [biaya_tarif] money DEFAULT ((0)) NULL,
  [visite_konsul] money DEFAULT ((0)) NULL,
  [operasi] money DEFAULT ((0)) NULL,
  [tindakan_medis] money DEFAULT ((0)) NULL,
  [kd_doc] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[data_bayar_jasa_dokter_detail] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for data_bayar_jasa_dokter_detail_copy1


CREATE TABLE [dbo].[data_bayar_jasa_dokter_detail_copy1] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [regno] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kd_poli] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kd_bangsal] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kd_kelas] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [notran] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tanggal] date  NULL,
  [kd_tarif] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [detail_tarif] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [biaya_tarif] money DEFAULT ((0)) NULL,
  [visite_konsul] money DEFAULT ((0)) NULL,
  [operasi] money DEFAULT ((0)) NULL,
  [tindakan_medis] money DEFAULT ((0)) NULL,
  [kd_doc] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[data_bayar_jasa_dokter_detail_copy1] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for data_bayar_jasa_dokter_head


CREATE TABLE [dbo].[data_bayar_jasa_dokter_head] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [regno] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [medrec] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [sep] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nama] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tanggal] date  NULL,
  [notran] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kd_poli] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kd_bangsal] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kd_kelas] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kd_doc] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [total_biaya] money  NULL,
  [instalasi] varchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [status] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS DEFAULT ((1)) NULL,
  [kd_cara_bayar] varchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[data_bayar_jasa_dokter_head] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for data_bayar_jasa_dokter_head_copy1


CREATE TABLE [dbo].[data_bayar_jasa_dokter_head_copy1] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [regno] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [medrec] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [sep] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nama] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tanggal] date  NULL,
  [notran] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kd_poli] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kd_bangsal] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kd_kelas] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kd_doc] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [total_biaya] money  NULL,
  [instalasi] varchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [status] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS DEFAULT ((1)) NULL,
  [kd_cara_bayar] varchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[data_bayar_jasa_dokter_head_copy1] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for data_pasien_booking


CREATE TABLE [dbo].[data_pasien_booking] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [kodebooking] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jenispasien] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nomorkartu] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nik] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nohp] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kodepoli] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [namapoli] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [pasienbaru] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [norm] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tanggalperiksa] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kodedokter] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [namadokter] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jampraktek] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jeniskunjungan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nomorreferensi] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nomorantrean] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [angkaantrean] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [estimasidilayani] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [sisakuotajkn] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kuotajkn] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [sisakuotanonjkn] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kuotanonjkn] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [keterangan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[data_pasien_booking] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for data_sisa_bayar_dokter


CREATE TABLE [dbo].[data_sisa_bayar_dokter] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [kd_doc] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [sisa_bayar] money  NULL
)
GO

ALTER TABLE [dbo].[data_sisa_bayar_dokter] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DataCollectionAttributes


CREATE TABLE [dbo].[DataCollectionAttributes] (
  [NAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PROPKEY] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PROPNAME] varchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PROPVAL] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DataCollectionAttributes] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DataFiles


CREATE TABLE [dbo].[DataFiles] (
  [RESOURCENAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [COMPONENTNAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [FILE_NAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [TABLESPACENAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [STATUS] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CREATEBYTES] float(53)  NULL,
  [NOOFREADS] bigint  NULL,
  [WRITES] bigint  NULL,
  [AVGRDTIME] bigint  NULL,
  [AVGWRTIME] bigint  NULL,
  [COLLECTIONTIME] bigint  NOT NULL
)
GO

ALTER TABLE [dbo].[DataFiles] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DataFilesExt


CREATE TABLE [dbo].[DataFilesExt] (
  [FILEID] int  NOT NULL,
  [AUTOEXTEND] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [COLLECTIONTIME] bigint  NOT NULL
)
GO

ALTER TABLE [dbo].[DataFilesExt] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DataRBungkus


CREATE TABLE [dbo].[DataRBungkus] (
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmBungkus] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Biaya] float(53)  NULL,
  [JmlBungkus] int  NULL,
  [Jenis] int  NULL,
  [BiayaBungkus] float(53)  NULL,
  [BiayaRacikan] float(53)  NULL
)
GO

ALTER TABLE [dbo].[DataRBungkus] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DBALERT


CREATE TABLE [dbo].[DBALERT] (
  [KEYSTRING] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [VALUESTRING] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DBALERT] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DBEVENT


CREATE TABLE [dbo].[DBEVENT] (
  [KEYSTRING] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [VALUESTRING] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DBEVENT] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DBINTERFACES


CREATE TABLE [dbo].[DBINTERFACES] (
  [VALUESTRING] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DBINTERFACES] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DBpass


CREATE TABLE [dbo].[DBpass] (
  [NamaUser] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Password] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DisplayName] nvarchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TRGroup] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [oLevel] int  NULL,
  [Pin] int  NULL,
  [KdPoli] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdInstansi] int  NULL,
  [TmplLaporan] int  NULL
)
GO

ALTER TABLE [dbo].[DBpass] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DBPassDepo


CREATE TABLE [dbo].[DBPassDepo] (
  [NamaUser] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Password] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [oLevel] int  NULL,
  [KdDepo] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Displayname] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DBPassDepo] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DBPassIRJ


CREATE TABLE [dbo].[DBPassIRJ] (
  [NamaUser] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Password] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [oLevel] int  NULL,
  [KdPoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DBPassIRJ] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DBPassIRNA


CREATE TABLE [dbo].[DBPassIRNA] (
  [NamaUser] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Password] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [oLevel] int  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MultiKdBangsal] nvarchar(max) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DBPassIRNA] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DBPOLICY


CREATE TABLE [dbo].[DBPOLICY] (
  [KEYSTRING] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [VALUESTRING] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DBPOLICY] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DBPOLL


CREATE TABLE [dbo].[DBPOLL] (
  [KEYSTRING] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [VALUESTRING] varbinary(1000)  NULL
)
GO

ALTER TABLE [dbo].[DBPOLL] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DEKStore


CREATE TABLE [dbo].[DEKStore] (
  [keyToken] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [EncKeyBytes] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [EncIVBytes] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Algorithm] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[DEKStore] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for delete_sep_log


CREATE TABLE [dbo].[delete_sep_log] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [no_sep] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [deleted_date] datetime  NOT NULL,
  [user] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[delete_sep_log] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailApotik


CREATE TABLE [dbo].[DetailApotik] (
  [BLCode] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BLDate] datetime  NULL,
  [Jam] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KodeObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Harga] float(53)  NULL,
  [Qty] float(53)  NULL,
  [JumlahHarga] float(53)  NULL,
  [ByDinas] float(53)  NULL,
  [ByUmum] float(53)  NULL,
  [ByPatent] float(53)  NULL,
  [AturanPakai] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KeteranganPakai] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalData] datetime  NULL,
  [ValidData] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jenis] int  NULL,
  [Signa1] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Signa2] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JumlahHari] real  NULL,
  [Disc] int  NULL,
  [NoteSigna] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDepo] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoteCaraMinumObat] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoteSigna2] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Urutan] int  NULL
)
GO

ALTER TABLE [dbo].[DetailApotik] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailApotikBk


CREATE TABLE [dbo].[DetailApotikBk] (
  [BLCode] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BLDate] datetime  NULL,
  [Jam] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KodeObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Harga] float(53)  NULL,
  [Qty] float(53)  NULL,
  [JumlahHarga] float(53)  NULL,
  [ByDinas] float(53)  NULL,
  [ByUmum] float(53)  NULL,
  [ByPatent] float(53)  NULL,
  [AturanPakai] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KeteranganPakai] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalData] datetime  NULL,
  [ValidData] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jenis] int  NULL,
  [Signa1] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Signa2] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JumlahHari] real  NULL,
  [Disc] int  NULL,
  [NoteSigna] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDepo] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoteCaraMinumObat] nvarchar(60) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailApotikBk] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailApotikJenisResep


CREATE TABLE [dbo].[DetailApotikJenisResep] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [label] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailApotikJenisResep] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailApotikKronis


CREATE TABLE [dbo].[DetailApotikKronis] (
  [BLCode] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BLDate] datetime  NULL,
  [Jam] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KodeObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Harga] float(53)  NULL,
  [Qty] float(53)  NULL,
  [JumlahHarga] float(53)  NULL,
  [ByDinas] float(53)  NULL,
  [ByUmum] float(53)  NULL,
  [ByPatent] float(53)  NULL,
  [AturanPakai] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KeteranganPakai] nvarchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalData] datetime  NULL,
  [ValidData] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jenis] int  NULL,
  [Signa1] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Signa2] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JumlahHari] real  NULL,
  [Disc] int  NULL,
  [NoteSigna] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDepo] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoteCaraMinumObat] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoteSigna2] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [id] bigint  IDENTITY(1,1) NOT NULL
)
GO

ALTER TABLE [dbo].[DetailApotikKronis] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailApotikTmp


CREATE TABLE [dbo].[DetailApotikTmp] (
  [Id] int  IDENTITY(1,1) NOT NULL,
  [IdHead] int  NULL,
  [TglOrder] datetime  NULL,
  [Jam] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KodeObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Harga] float(53)  NULL,
  [Qty] float(53)  NULL,
  [JumlahHarga] float(53)  NULL,
  [ByDinas] float(53)  NULL,
  [ByUmum] float(53)  NULL,
  [ByPatent] float(53)  NULL,
  [AturanPakai] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KeteranganPakai] nvarchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jenis] int  NULL,
  [Signa1] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Signa2] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JumlahHari] real  NULL,
  [Disc] int  NULL,
  [NoteSigna] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDepo] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoteCaraMinumObat] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ObatKronis] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailApotikTmp] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailApotikTmp_copy


CREATE TABLE [dbo].[DetailApotikTmp_copy] (
  [Id] int  IDENTITY(1,1) NOT NULL,
  [IdHead] int  NULL,
  [TglOrder] datetime  NULL,
  [Jam] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KodeObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Harga] float(53)  NULL,
  [Qty] float(53)  NULL,
  [JumlahHarga] float(53)  NULL,
  [ByDinas] float(53)  NULL,
  [ByUmum] float(53)  NULL,
  [ByPatent] float(53)  NULL,
  [AturanPakai] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KeteranganPakai] nvarchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jenis] int  NULL,
  [Signa1] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Signa2] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JumlahHari] real  NULL,
  [Disc] int  NULL,
  [NoteSigna] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDepo] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoteCaraMinumObat] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ObatKronis] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailApotikTmp_copy] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailApotikTmpRacikan


CREATE TABLE [dbo].[DetailApotikTmpRacikan] (
  [Id] bigint  IDENTITY(1,1) NOT NULL,
  [IdHead] bigint  NOT NULL,
  [Signa] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Catatan] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Racikan] text COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Jenis] int  NULL
)
GO

ALTER TABLE [dbo].[DetailApotikTmpRacikan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailApotikUdd


CREATE TABLE [dbo].[DetailApotikUdd] (
  [BLCode] varchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BLDate] datetime  NULL,
  [Jam] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KodeObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [QtyPagi] float(53)  NULL,
  [JamPagi] datetime  NULL,
  [QtySiang] float(53)  NULL,
  [JamSiang] datetime  NULL,
  [QtySore] float(53)  NULL,
  [JamSore] datetime  NULL,
  [QtyMalam] float(53)  NULL,
  [JamMalam] datetime  NULL,
  [ValidUser] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailApotikUdd] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailBebas


CREATE TABLE [dbo].[DetailBebas] (
  [BLCode] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BLDate] datetime  NULL,
  [Jam] datetime  NULL,
  [KodeObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Harga] float(53)  NULL,
  [Qty] float(53)  NULL,
  [JumlahHarga] float(53)  NULL,
  [ByPatent] float(53)  NULL,
  [Disc] int  NULL,
  [Jenis] int  NULL,
  [Signa1] int  NULL,
  [Signa2] int  NULL,
  [JumlahHari] real  NULL,
  [NoteSigna] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalData] datetime  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDepo] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoteCaraMinumObat] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ObatResep] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailBebas] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailBilAku


CREATE TABLE [dbo].[DetailBilAku] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTarif] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmTarif] nvarchar(75) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Qty] int  NULL,
  [Sarana] float(53)  NULL,
  [Pelayanan] float(53)  NULL,
  [Discount] float(53)  NULL,
  [JumlahBiaya] float(53)  NULL,
  [JasaRS] real  NULL,
  [JasaDokter] real  NULL,
  [JasaPerawat] real  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalData] datetime  NULL,
  [is_posted] bit DEFAULT ((0)) NULL
)
GO

ALTER TABLE [dbo].[DetailBilAku] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailBilFis


CREATE TABLE [dbo].[DetailBilFis] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTarif] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmTarif] nvarchar(75) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Qty] int  NULL,
  [Sarana] float(53)  NULL,
  [Pelayanan] float(53)  NULL,
  [Discount] float(53)  NULL,
  [JumlahBiaya] float(53)  NULL,
  [ByDinas] float(53)  NULL,
  [Byumum] float(53)  NULL,
  [JasaRS] real  NULL,
  [JasaDokter] real  NULL,
  [JasaPerawat] real  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalData] datetime  NULL,
  [is_posted] bit DEFAULT ((0)) NULL
)
GO

ALTER TABLE [dbo].[DetailBilFis] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailBilHD


CREATE TABLE [dbo].[DetailBilHD] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTarif] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmTarif] nvarchar(75) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Qty] int  NULL,
  [Sarana] float(53)  NULL,
  [Pelayanan] float(53)  NULL,
  [Discount] float(53)  NULL,
  [JumlahBiaya] float(53)  NULL,
  [JasaRS] real  NULL,
  [JasaDokter] real  NULL,
  [JasaPerawat] real  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalData] datetime  NULL,
  [is_posted] bit DEFAULT ((0)) NULL
)
GO

ALTER TABLE [dbo].[DetailBilHD] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailBilIrj


CREATE TABLE [dbo].[DetailBilIrj] (
  [Notran] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTarif] nvarchar(12) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmTarif] nvarchar(75) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Qty] int  NULL,
  [Sarana] float(53)  NULL,
  [Pelayanan] float(53)  NULL,
  [JasaRs] real  NULL,
  [JasaDokter] real  NULL,
  [JasaPerawat] real  NULL,
  [JumlahBiaya] float(53)  NULL,
  [ByDinas] float(53)  NULL,
  [ByUmum] float(53)  NULL,
  [TotalBiaya] float(53)  NULL,
  [Shift] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Lokasi] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [is_posted] bit DEFAULT ((0)) NULL,
  [stsbayar] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tglbayar] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailBilIrj] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailBilIrj_copy1


CREATE TABLE [dbo].[DetailBilIrj_copy1] (
  [Notran] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTarif] nvarchar(12) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmTarif] nvarchar(75) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Qty] int  NULL,
  [Sarana] float(53)  NULL,
  [Pelayanan] float(53)  NULL,
  [JasaRs] real  NULL,
  [JasaDokter] real  NULL,
  [JasaPerawat] real  NULL,
  [JumlahBiaya] float(53)  NULL,
  [ByDinas] float(53)  NULL,
  [ByUmum] float(53)  NULL,
  [TotalBiaya] float(53)  NULL,
  [Shift] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Lokasi] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [is_posted] bit DEFAULT ((0)) NULL
)
GO

ALTER TABLE [dbo].[DetailBilIrj_copy1] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailBilIrna


CREATE TABLE [dbo].[DetailBilIrna] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(11) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MedRec] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTarif] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmTarif] nvarchar(70) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Qty] float(53)  NULL,
  [Sarana] float(53)  NULL,
  [Pelayanan] float(53)  NULL,
  [Disc] real  NULL,
  [JasaRs] real  NULL,
  [JasaDokter] real  NULL,
  [JasaPerawat] real  NULL,
  [JumlahBiaya] float(53)  NULL,
  [ByDinas] float(53)  NULL,
  [Byumum] float(53)  NULL,
  [KdDoc] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sts] int  NULL,
  [is_posted] bit DEFAULT ((0)) NULL,
  [stsbayar] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tglbayar] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailBilIrna] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailBilLab


CREATE TABLE [dbo].[DetailBilLab] (
  [NoTran] nvarchar(28) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPemeriksaan] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTarif] nvarchar(18) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmTarif] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sarana] float(53)  NULL,
  [Pelayanan] float(53)  NULL,
  [JumlahBiaya] float(53)  NULL,
  [ByDinas] float(53)  NULL,
  [ByUmum] float(53)  NULL,
  [TotalBiaya] float(53)  NULL,
  [nCover] int  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDokter] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [is_posted] bit DEFAULT ((0)) NULL,
  [Catatan_jaminan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status_mcu] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [stsbayar] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tglbayar] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailBilLab] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailBilLab_copy


CREATE TABLE [dbo].[DetailBilLab_copy] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPemeriksaan] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTarif] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmTarif] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sarana] float(53)  NULL,
  [Pelayanan] float(53)  NULL,
  [JumlahBiaya] float(53)  NULL,
  [ByDinas] float(53)  NULL,
  [ByUmum] float(53)  NULL,
  [TotalBiaya] float(53)  NULL,
  [nCover] int  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDokter] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [is_posted] bit DEFAULT ((0)) NULL,
  [Catatan_jaminan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailBilLab_copy] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailBilLabAcc


CREATE TABLE [dbo].[DetailBilLabAcc] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPemeriksaan] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTarif] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmTarif] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sarana] float(53)  NULL,
  [Pelayanan] float(53)  NULL,
  [JumlahBiaya] float(53)  NULL,
  [ByDinas] float(53)  NULL,
  [ByUmum] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalBiaya] float(53)  NULL,
  [nCover] int  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDokter] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [is_posted] bit DEFAULT ((0)) NULL,
  [Catatan_jaminan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailBilLabAcc] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailBilOperasi


CREATE TABLE [dbo].[DetailBilOperasi] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regdate] datetime  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [I_ProdukUnit] int  NULL,
  [I_Produk] int  NULL,
  [N_Produk] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [I_Tarif] int  NULL,
  [V_Tarif] float(53)  NULL,
  [Qty] int  NULL,
  [TotalBiaya] float(53)  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [I_Unit] int  NULL,
  [N_Unit] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailBilOperasi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailBilOperasiIRJ


CREATE TABLE [dbo].[DetailBilOperasiIRJ] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regdate] datetime  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [I_ProdukUnit] int  NULL,
  [I_Produk] int  NULL,
  [N_Produk] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [I_Tarif] int  NULL,
  [V_Tarif] float(53)  NULL,
  [Qty] int  NULL,
  [TotalBiaya] float(53)  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [I_Unit] int  NULL,
  [N_Unit] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailBilOperasiIRJ] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailBilPatologi


CREATE TABLE [dbo].[DetailBilPatologi] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPemeriksaan] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTarif] nvarchar(12) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmTarif] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sarana] float(53)  NULL,
  [Pelayanan] float(53)  NULL,
  [JumlahBiaya] float(53)  NULL,
  [ByDinas] float(53)  NULL,
  [ByUmum] float(53)  NULL,
  [TotalBiaya] float(53)  NULL,
  [nCover] int  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDokter] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [is_posted] bit DEFAULT ((0)) NULL,
  [Catatan_jaminan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Qty] int  NULL,
  [stsbayar] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tglbayar] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailBilPatologi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailBilRad


CREATE TABLE [dbo].[DetailBilRad] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTarif] nvarchar(12) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmTarif] nvarchar(75) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Qty] int  NULL,
  [Sarana] float(53)  NULL,
  [Pelayanan] float(53)  NULL,
  [Discount] float(53)  NULL,
  [JumlahBiaya] float(53)  NULL,
  [ByDinas] float(53)  NULL,
  [Byumum] float(53)  NULL,
  [JasaRS] real  NULL,
  [JasaDokter] real  NULL,
  [JasaPerawat] real  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalData] datetime  NULL,
  [is_posted] bit DEFAULT ((0)) NULL,
  [ACC] char(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Catatan_jaminan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [stsbayar] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tglbayar] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailBilRad] SET (LOCK_ESCALATION = TABLE)
GO

EXEC sp_addextendedproperty
'MS_Description', N'O=Onpros
Y=Acc
X = Reject',
'SCHEMA', N'dbo',
'TABLE', N'DetailBilRad',
'COLUMN', N'ACC'
GO


-- ----------------------------
-- Table structure for DetailBilRad.ACC


CREATE TABLE [dbo].[DetailBilRad.ACC] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTarif] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmTarif] nvarchar(75) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Qty] int  NULL,
  [Sarana] float(53)  NULL,
  [Pelayanan] float(53)  NULL,
  [Discount] float(53)  NULL,
  [JumlahBiaya] float(53)  NULL,
  [ByDinas] float(53)  NULL,
  [Byumum] float(53)  NULL,
  [JasaRS] real  NULL,
  [JasaDokter] real  NULL,
  [JasaPerawat] real  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalData] datetime  NULL,
  [is_posted] bit DEFAULT ((0)) NULL,
  [ACC] char(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Catatan_jaminan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailBilRad.ACC] SET (LOCK_ESCALATION = TABLE)
GO

EXEC sp_addextendedproperty
'MS_Description', N'O=Onpros
Y=Acc
X = Reject',
'SCHEMA', N'dbo',
'TABLE', N'DetailBilRad.ACC',
'COLUMN', N'ACC'
GO


-- ----------------------------
-- Table structure for DetailBilUgd


CREATE TABLE [dbo].[DetailBilUgd] (
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTarif] nvarchar(12) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmTarif] nvarchar(75) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Qty] int  NULL,
  [Sarana] float(53)  NULL,
  [Pelayanan] float(53)  NULL,
  [JasaRs] real  NULL,
  [JasaDokter] real  NULL,
  [JasaPerawat] real  NULL,
  [JumlahBiaya] float(53)  NULL,
  [ByDinas] float(53)  NULL,
  [Byumum] float(53)  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [is_posted] bit DEFAULT ((0)) NULL,
  [stsbayar] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tglbayar] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailBilUgd] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailDinas


CREATE TABLE [dbo].[DetailDinas] (
  [NOPo] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglPO] datetime  NULL,
  [KodeObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kemasan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [IsiKemasan] int  NULL,
  [Harga] float(53)  NULL,
  [Qty] real  NULL,
  [Discount] real  NULL,
  [JumlahHarga] float(53)  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Otor] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TrGroup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailDinas] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailHasil


CREATE TABLE [dbo].[DetailHasil] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [NoLab] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdGroup] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KDDetail] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NMDetail] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Satuan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NilaiNormal] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Hasil] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [cHasil] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nhasila] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nhasilb] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tglhasil] datetime  NULL,
  [jamhasil] datetime  NULL,
  [keyno] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanda] int  NULL,
  [KdMappingHistori] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdInput] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailHasil] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailIrjSekunder


CREATE TABLE [dbo].[DetailIrjSekunder] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [KdICD] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDTD] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Diagnosa] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTDK] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tindakan] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kasus] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailIrjSekunder] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailIrjUtama


CREATE TABLE [dbo].[DetailIrjUtama] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [KdICD] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDTD] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Diagnosa] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTDK] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tindakan] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kasus] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailIrjUtama] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailIrnaSekunder


CREATE TABLE [dbo].[DetailIrnaSekunder] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [KdICD] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDTD] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Diagnosa] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTDK] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tindakan] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmDoc] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailIrnaSekunder] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailIrnaUtama


CREATE TABLE [dbo].[DetailIrnaUtama] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [KdICD] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDTD] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Diagnosa] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTDK] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tindakan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmDoc] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailIrnaUtama] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailKasirIRJ


CREATE TABLE [dbo].[DetailKasirIRJ] (
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NoFile] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SelisihBiaya] money  NULL,
  [TotalBiaya] money  NULL,
  [TotalDinas] money  NULL,
  [TotalUmum] money  NULL,
  [KdBiaya] int  NULL,
  [JenisBayar] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidData] int  NULL,
  [TanggalData] datetime  NULL
)
GO

ALTER TABLE [dbo].[DetailKasirIRJ] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailKasirIRNA


CREATE TABLE [dbo].[DetailKasirIRNA] (
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoFile] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SelisihBiaya] money  NULL,
  [TotalBiaya] money  NULL,
  [TotalDinas] float(53)  NULL,
  [TotalUmum] float(53)  NULL,
  [JenisBayar] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidData] int  NULL,
  [TanggalData] datetime  NULL,
  [Kdbiaya] int  NULL
)
GO

ALTER TABLE [dbo].[DetailKasirIRNA] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailMasterPaketApotik


CREATE TABLE [dbo].[DetailMasterPaketApotik] (
  [Id] int  IDENTITY(1,1) NOT NULL,
  [IdHead] int  NULL,
  [KodeObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Harga] float(53)  NULL,
  [Qty] float(53)  NULL,
  [JumlahHarga] float(53)  NULL,
  [ByDinas] float(53)  NULL,
  [ByUmum] float(53)  NULL,
  [ByPatent] float(53)  NULL,
  [AturanPakai] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KeteranganPakai] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jenis] int  NULL,
  [Signa1] int  NULL,
  [Signa2] int  NULL,
  [JumlahHari] real  NULL,
  [Disc] int  NULL,
  [NoteSigna] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [StatusSave] varchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS DEFAULT ((0)) NULL
)
GO

ALTER TABLE [dbo].[DetailMasterPaketApotik] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailMutasi


CREATE TABLE [dbo].[DetailMutasi] (
  [NoMutasi] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [KodeObat] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kemasan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Satuan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jumlah] real  NULL,
  [ExpDate] datetime  NULL,
  [NoBatch] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Gudang] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Otor] int  NULL,
  [TrGroup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailMutasi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailMutasi_copy


CREATE TABLE [dbo].[DetailMutasi_copy] (
  [NoMutasi] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [KodeObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kemasan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Satuan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jumlah] real  NULL,
  [ExpDate] datetime  NULL,
  [NoBatch] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Gudang] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Otor] int  NULL,
  [TrGroup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailMutasi_copy] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailObatIrj


CREATE TABLE [dbo].[DetailObatIrj] (
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BiayaResep] float(53)  NULL,
  [Harga] float(53)  NULL,
  [Qty] real  NULL,
  [JumlahHarga] float(53)  NULL,
  [ByDinas] float(53)  NULL,
  [ByUmum] float(53)  NULL,
  [TotalBiaya] float(53)  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Lokasi] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailObatIrj] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailObatUgd


CREATE TABLE [dbo].[DetailObatUgd] (
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BiayaResep] float(53)  NULL,
  [Harga] float(53)  NULL,
  [Qty] real  NULL,
  [JumlahHarga] float(53)  NULL,
  [ByDinas] float(53)  NULL,
  [ByUmum] float(53)  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailObatUgd] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailOKobat


CREATE TABLE [dbo].[DetailOKobat] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [Jam] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KodeObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Harga] float(53)  NULL,
  [Qty] real  NULL,
  [QtyUp] real  NULL,
  [JumlahHarga] float(53)  NULL,
  [ByDinas] float(53)  NULL,
  [ByUmum] float(53)  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailOKobat] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailOrder


CREATE TABLE [dbo].[DetailOrder] (
  [NOPo] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglPO] datetime  NULL,
  [KodeObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kemasan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [IsiKemasan] int  NULL,
  [Harga] float(53)  NULL,
  [Qty] real  NULL,
  [Discount] real  NULL,
  [JumlahHarga] float(53)  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Otor] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TrGroup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailOrder] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailPemeriksaan


CREATE TABLE [dbo].[DetailPemeriksaan] (
  [KodeDetail] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KDDetail] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaDetail] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NNSimbol] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NNAwalPria] real  NULL,
  [NNAkhirPria] real  NULL,
  [NNAwalWanita] real  NULL,
  [NNAkhirWanita] real  NULL,
  [NilaiNormalPria] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NilaiNormalWanita] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Satuan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdMappingHistori] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdInput] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NN0_1D] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NN2_4D] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NN5_7D] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NN8_14D] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NN15_30D] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NN1_2M] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NN3_5M] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NN6_11M] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NN1_3Y] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NN4_7Y] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NN8_13Y] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Urutan] int DEFAULT ('0') NULL
)
GO

ALTER TABLE [dbo].[DetailPemeriksaan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailPindah


CREATE TABLE [dbo].[DetailPindah] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Regdate] datetime  NULL,
  [Regtime] datetime  NULL,
  [KdPoli] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPoli] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmBangsal] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKelas] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoTTidur] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ByTarif] float(53)  NULL,
  [NoKamar] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdicd] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diagnosa] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailPindah] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailPphp


CREATE TABLE [dbo].[DetailPphp] (
  [id] int  NULL,
  [nama] nvarchar(254) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [pangkat] nvarchar(254) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nip] nvarchar(254) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jabatan] nvarchar(254) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailPphp] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailProduksi


CREATE TABLE [dbo].[DetailProduksi] (
  [NoProduksi] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [KodeObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kemasan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Satuan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jumlah] real  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [trgroup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailProduksi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailRawatGabung


CREATE TABLE [dbo].[DetailRawatGabung] (
  [RegnoIbu] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [MedrecBayi] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Regdate] datetime  NULL,
  [Regtime] datetime  NULL,
  [KdPoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPoli] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmBangsal] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKelas] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoTTidur] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ByTarif] float(53)  NULL,
  [NoKamar] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdicd] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diagnosa] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailRawatGabung] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailRetApotik


CREATE TABLE [dbo].[DetailRetApotik] (
  [BLCode] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BLDate] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KodeObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Harga] money  NULL,
  [Qty] real  NULL,
  [Potongan] money  NULL,
  [JumlahHarga] money  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalData] datetime  NULL,
  [KdDepo] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailRetApotik] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailRetFaktur


CREATE TABLE [dbo].[DetailRetFaktur] (
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [KodeObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Satuan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Qty] real  NULL,
  [Harga] float(53)  NULL,
  [Jumlah] float(53)  NULL,
  [Disc] real  NULL,
  [JumlahHarga] float(53)  NULL,
  [Otor] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TrGroup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailRetFaktur] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailRRobat


CREATE TABLE [dbo].[DetailRRobat] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [Jam] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KodeObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Harga] float(53)  NULL,
  [Qty] float(53)  NULL,
  [JumlahHarga] float(53)  NULL,
  [ByDinas] float(53)  NULL,
  [ByUmum] float(53)  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailRRobat] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailTerima


CREATE TABLE [dbo].[DetailTerima] (
  [NoBPB] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [KodeObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kemasan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [IsiKemasan] int  NULL,
  [JmlPesan] real  NULL,
  [JmlTerima] real  NULL,
  [hna] money  NULL,
  [disc] real  NULL,
  [jumlah] money  NULL,
  [ppn] int  NULL,
  [hrgbeli] money  NULL,
  [ProJual] real  NULL,
  [ExpDate] datetime  NULL,
  [NoBatch] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Otor] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TrGroup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailTerima] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailTMOperasi


CREATE TABLE [dbo].[DetailTMOperasi] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regdate] datetime  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmDoc] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPoli] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TmKategori] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailTMOperasi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DetailTMOperasiIRJ


CREATE TABLE [dbo].[DetailTMOperasiIRJ] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regdate] datetime  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmDoc] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPoli] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TmKategori] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DetailTMOperasiIRJ] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for Detailttidur


CREATE TABLE [dbo].[Detailttidur] (
  [ttcode] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdbangsal] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdkelas] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nokamar] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jmlttidur] bigint  NULL,
  [ttnomor] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [idoldbed] bigint  NULL,
  [Publish] tinyint  NULL
)
GO

ALTER TABLE [dbo].[Detailttidur] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for Detailttidur_copy


CREATE TABLE [dbo].[Detailttidur_copy] (
  [ttcode] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdbangsal] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdkelas] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nokamar] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jmlttidur] bigint  NULL,
  [ttnomor] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [idoldbed] bigint  NULL,
  [Publish] tinyint  NULL
)
GO

ALTER TABLE [dbo].[Detailttidur_copy] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DISCOVERYINFO


CREATE TABLE [dbo].[DISCOVERYINFO] (
  [DISCOVERYID] bigint  NOT NULL,
  [DISCOVERYNAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DISCOVERYDETAILS] varchar(2000) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MARKEDFORDELETE] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS DEFAULT ('false') NULL,
  [TRIGGEREDFROM] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[DISCOVERYINFO] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for Distribusi_makan


CREATE TABLE [dbo].[Distribusi_makan] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [tanggal] date  NULL,
  [makan_pagi] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [makan_siang] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [makan_sore] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [petugas] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [bangsal] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[Distribusi_makan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for DokterPemeriksa


CREATE TABLE [dbo].[DokterPemeriksa] (
  [KdDoc] varchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Regno] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[DokterPemeriksa] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fADiagnosa


CREATE TABLE [dbo].[fADiagnosa] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [KdPoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdIcd] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Diagnosa] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdIcd1] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Diagnosa1] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fADiagnosa] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for failed_jobs


CREATE TABLE [dbo].[failed_jobs] (
  [id] bigint  IDENTITY(1,1) NOT NULL,
  [uuid] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [connection] nvarchar(max) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [queue] nvarchar(max) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [payload] nvarchar(max) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [exception] nvarchar(max) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [failed_at] datetime DEFAULT (getdate()) NOT NULL
)
GO

ALTER TABLE [dbo].[failed_jobs] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fAnamnesa


CREATE TABLE [dbo].[fAnamnesa] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Regdate] datetime  NULL,
  [Regtime] datetime  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Bod] datetime  NULL,
  [UmurThn] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurBln] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KelUtama] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KelTambahan] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RPenyakit] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ROperasi] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RPenyakitKeluarga] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RiwayatHaid] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fAnamnesa] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fAnamnesaFisik


CREATE TABLE [dbo].[fAnamnesaFisik] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TekananDarah] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Pernafasan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nadi] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Suhu] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TinggiBadan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BeratBadan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KeadaanUmum] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kepala] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Leher] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Thyroid] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kelenjar] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Mata] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [AlatBantu] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Refraksi] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Visus] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ButaWarna] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Lainlain] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Telinga] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Hidung] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tenggorokan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Gigidanmulut] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jantung] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Paruparu] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Perut] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kulit] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Ekstremitas] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Refleksi] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sensibilitas] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Verices] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Haemorhoid] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fAnamnesaFisik] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fAPemeriksaanFisik


CREATE TABLE [dbo].[fAPemeriksaanFisik] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [KdPoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PemeriksaanFisik] nvarchar(400) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fAPemeriksaanFisik] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fApprove


CREATE TABLE [dbo].[fApprove] (
  [Tanggal] datetime  NULL,
  [ByKuota] float(53)  NULL,
  [Pilihan] int  NULL,
  [Approval] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fApprove] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fATerapiFisik


CREATE TABLE [dbo].[fATerapiFisik] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tanggal] datetime  NULL,
  [kdpoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [terapifisik] nvarchar(400) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fATerapiFisik] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fBiayaAdministrasi


CREATE TABLE [dbo].[fBiayaAdministrasi] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Prosen] real  NULL,
  [BiayaAdministrasi] float(53)  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fBiayaAdministrasi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fBiayaKemasan


CREATE TABLE [dbo].[fBiayaKemasan] (
  [Kode] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Biaya] money  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fBiayaKemasan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fBiayaResep


CREATE TABLE [dbo].[fBiayaResep] (
  [BLCode] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BLDate] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoResep] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KodeObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Harga] float(53)  NULL,
  [Qty] float(53)  NULL,
  [JumlahHarga] float(53)  NULL,
  [ByDinas] float(53)  NULL,
  [ByUmum] float(53)  NULL,
  [ByPatent] float(53)  NULL,
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jenis] int  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Total] float(53)  NULL,
  [Jam] datetime  NULL
)
GO

ALTER TABLE [dbo].[fBiayaResep] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fCetakSEP


CREATE TABLE [dbo].[fCetakSEP] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [TanggalCetak] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nomor] int  NULL
)
GO

ALTER TABLE [dbo].[fCetakSEP] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fChangeDokterIRJ


CREATE TABLE [dbo].[fChangeDokterIRJ] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDocBefore] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDocUpdate] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fChangeDokterIRJ] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for FDepoRawat


CREATE TABLE [dbo].[FDepoRawat] (
  [KdRuang] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmRuang] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDepo] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[FDepoRawat] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fDetailEmbalase


CREATE TABLE [dbo].[fDetailEmbalase] (
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Jumlah1] int  NULL,
  [Jumlah2] int  NULL,
  [BiayaKemasan] money  NULL,
  [BiayaRacikan] money  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fDetailEmbalase] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fDetailHarga


CREATE TABLE [dbo].[fDetailHarga] (
  [KdHarga] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KdKelas] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PriceUp] real  NULL,
  [HargaBeli] money  NULL,
  [HargaJual] money  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fDetailHarga] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fDetailOperasi


CREATE TABLE [dbo].[fDetailOperasi] (
  [KdOperasi] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KDDetail] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmOperasi] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fDetailOperasi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fDetailPoli


CREATE TABLE [dbo].[fDetailPoli] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPoli] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fDetailPoli] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fDetailSupplier


CREATE TABLE [dbo].[fDetailSupplier] (
  [kdobat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [smcode] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [smname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [disc] real  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fDetailSupplier] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fDetailTarifMcu


CREATE TABLE [dbo].[fDetailTarifMcu] (
  [KdDetailPaket] int  NULL,
  [KdPaket] int  NULL,
  [Sumber] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTarif] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDetail] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fDetailTarifMcu] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fDiitPasien


CREATE TABLE [dbo].[fDiitPasien] (
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regdate] datetime  NULL,
  [Tanggal] datetime  NULL,
  [Jam] datetime  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglLahir] datetime  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Umur] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdIcd] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmIcd] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDiit] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KDDiitKhusus] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DiagnosaGizi] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TerapiGizi] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TB] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BB] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [IMT] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fDiitPasien] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fExpDate


CREATE TABLE [dbo].[fExpDate] (
  [KodeObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [ExpDate] datetime  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fExpDate] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fGroupEle


CREATE TABLE [dbo].[fGroupEle] (
  [KdGroup] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmGroup] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fGroupEle] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fGroupIBS


CREATE TABLE [dbo].[fGroupIBS] (
  [KdGroup] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmGroup] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fGroupIBS] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fGroupIBS_isi


CREATE TABLE [dbo].[fGroupIBS_isi] (
  [KdGroup] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmGroup] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fGroupIBS_isi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fGroupIGD


CREATE TABLE [dbo].[fGroupIGD] (
  [KdGroup] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmGroup] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fGroupIGD] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fGroupIRJ


CREATE TABLE [dbo].[fGroupIRJ] (
  [KdGroup] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmGroup] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Posisi] varchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fGroupIRJ] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fGroupIRNA


CREATE TABLE [dbo].[fGroupIRNA] (
  [KdGroup] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmGroup] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fGroupIRNA] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fGroupLab


CREATE TABLE [dbo].[fGroupLab] (
  [KDGroup] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmGroup] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [id] int  NULL,
  [Mesin_lab] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fGroupLab] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fGroupOK


CREATE TABLE [dbo].[fGroupOK] (
  [KdGroup] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmGroup] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fGroupOK] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fGroupPatologi


CREATE TABLE [dbo].[fGroupPatologi] (
  [KDGroup] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmGroup] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [id] int  NULL
)
GO

ALTER TABLE [dbo].[fGroupPatologi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fGroupRad


CREATE TABLE [dbo].[fGroupRad] (
  [KdGroup] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmGroup] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fGroupRad] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for FHarga


CREATE TABLE [dbo].[FHarga] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [HNA] float(53)  NULL,
  [PPN] real  NULL,
  [HrgBeli] float(53)  NULL,
  [UpPrice] real  NULL,
  [UpPriceDinas] real  NULL,
  [UpPriceAskes] real  NULL,
  [HrgJual] float(53)  NULL,
  [HrgDinas] float(53)  NULL,
  [HrgAskes] float(53)  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[FHarga] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fHeadEmbalase


CREATE TABLE [dbo].[fHeadEmbalase] (
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [BiayaR] money  NULL,
  [BiayaEmbalase] money  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fHeadEmbalase] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fInfor


CREATE TABLE [dbo].[fInfor] (
  [Company] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nama] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Phone] nvarchar(55) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Email] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Website] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fInfor] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fKategoriTMOperasi


CREATE TABLE [dbo].[fKategoriTMOperasi] (
  [Kategori] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Keterangan] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fKategoriTMOperasi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fKeyakinan


CREATE TABLE [dbo].[fKeyakinan] (
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [phcek] int  NULL,
  [phnote] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ptcek] int  NULL,
  [ptnote] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [pmcek] int  NULL,
  [pmnote] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ppcek] int  NULL,
  [ppnote] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [lain] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tanggal] datetime  NULL
)
GO

ALTER TABLE [dbo].[fKeyakinan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fLPK


CREATE TABLE [dbo].[fLPK] (
  [NoSep] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NoPeserta] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglMasuk] datetime  NULL,
  [TglKeluar] datetime  NULL,
  [Jaminan] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Spesialistik] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CaraKeluar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KondisiPulang] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdICD1] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Level1] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdICD2] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Level2] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Prosedur1] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Prosedur2] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TindakLanjut] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPPK] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglKontrol] datetime  NULL,
  [KdPoli1] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DPJP] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmpoli] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmpoli1] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmbangsal] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmkelas] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmspesialistik] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmCaraKeluar] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKondisiPulang] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fLPK] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fLynHD


CREATE TABLE [dbo].[fLynHD] (
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regdate] datetime  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTuju] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [WaktuMulai] datetime  NULL,
  [WaktuSelesai] datetime  NULL,
  [TanggalHD] datetime  NULL,
  [HemoKe] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JadwalHari] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PRETD] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PREBB] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PRENADI] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PRERESPIRASI] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [POSTD] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [POSBB] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [POSNADI] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [POSRESPIRASI] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat1] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat2] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat3] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat4] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat5] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tttransfusi] int  NULL,
  [ttgds] int  NULL,
  [ttugd] int  NULL,
  [kdicd1] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diagnosa1] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdicd2] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diagnosa2] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdicd3] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diagnosa3] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdicd4] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diagnosa4] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmdockonsultan] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmdocpjawab] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmdocpelaksana] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [thkonsultan] int  NULL,
  [thpjawab] int  NULL,
  [thpelaksana] int  NULL
)
GO

ALTER TABLE [dbo].[fLynHD] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fMedrec


CREATE TABLE [dbo].[fMedrec] (
  [NORM] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoMedrec1] float(53)  NULL,
  [NoMedrec2] int  NULL,
  [NoMedrec3] int  NULL
)
GO

ALTER TABLE [dbo].[fMedrec] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fNomorUrutPoli


CREATE TABLE [dbo].[fNomorUrutPoli] (
  [Notran] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Nomor] int  NULL
)
GO

ALTER TABLE [dbo].[fNomorUrutPoli] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fNoSuratKonsul


CREATE TABLE [dbo].[fNoSuratKonsul] (
  [NoKonsul] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoSurat] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fNoSuratKonsul] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fPejabat


CREATE TABLE [dbo].[fPejabat] (
  [id_pejabat] int  NOT NULL,
  [nama_pejabat] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [id_jabatan] int  NULL,
  [pangkat_nrp] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nm_jabatan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fPejabat] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fPembedahan


CREATE TABLE [dbo].[fPembedahan] (
  [Kdbedah] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Nmbedah] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fPembedahan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fPemeriksaanEle


CREATE TABLE [dbo].[fPemeriksaanEle] (
  [KDDetail] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KdGroup] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NMDetail] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fPemeriksaanEle] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fPemeriksaanHemo


CREATE TABLE [dbo].[fPemeriksaanHemo] (
  [KDDetail] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KdGroup] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NMDetail] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fPemeriksaanHemo] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fPemeriksaanIBS


CREATE TABLE [dbo].[fPemeriksaanIBS] (
  [KDDetail] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KDGroup] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NMDetail] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fPemeriksaanIBS] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fPemeriksaanIBS_kosong


CREATE TABLE [dbo].[fPemeriksaanIBS_kosong] (
  [KDDetail] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KDGroup] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NMDetail] nvarchar(75) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fPemeriksaanIBS_kosong] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fPemeriksaanIGD


CREATE TABLE [dbo].[fPemeriksaanIGD] (
  [KDDetail] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KdGroup] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NMDetail] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fPemeriksaanIGD] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fPemeriksaanIRJ


CREATE TABLE [dbo].[fPemeriksaanIRJ] (
  [KDDetail] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KdGroup] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NMDetail] nvarchar(512) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [flag_group] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fPemeriksaanIRJ] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fPemeriksaanIRNA


CREATE TABLE [dbo].[fPemeriksaanIRNA] (
  [KDDetail] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KDGroup] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmDetail] nvarchar(512) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [flag_tandadokter] char(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [flag_group] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fPemeriksaanIRNA] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fPemeriksaanLab


CREATE TABLE [dbo].[fPemeriksaanLab] (
  [KDDetail] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KdGroup] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NMDetail] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NNSimbol] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NNAwalPria] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NNAkhirPria] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NNAwalWanita] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NNAkhirWanita] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NilaiNormalPria] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NilaiNormalWanita] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Satuan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdMapping] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdMappingHistori] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdInput] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [flag_group] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [param_lis] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nilai_kritis] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UrutanPrint] int DEFAULT ('0') NULL,
  [NoPrint] int DEFAULT ((0)) NULL,
  [NN8_13Y] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NN4_7Y] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NN1_3Y] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NN6_11M] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NN3_5M] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NN1_2M] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NN15_30D] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NN8_14D] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NN5_7D] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NN2_4D] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NN0_1D] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fPemeriksaanLab] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fPemeriksaanOK


CREATE TABLE [dbo].[fPemeriksaanOK] (
  [KDDetail] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KdGroup] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NMDetail] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fPemeriksaanOK] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fPemeriksaanPatologi


CREATE TABLE [dbo].[fPemeriksaanPatologi] (
  [KDDetail] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KdGroup] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NMDetail] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NNSimbol] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NNAwalPria] real  NULL,
  [NNAkhirPria] real  NULL,
  [NNAwalWanita] real  NULL,
  [NNAkhirWanita] real  NULL,
  [NilaiNormalPria] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NilaiNormalWanita] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Satuan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdMapping] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdMappingHistori] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdInput] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fPemeriksaanPatologi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fPemeriksaanRad


CREATE TABLE [dbo].[fPemeriksaanRad] (
  [KdDetail] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KdGroup] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmDetail] nvarchar(512) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [need_acc] char(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [flag_group] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fPemeriksaanRad] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fPeriodeApotik


CREATE TABLE [dbo].[fPeriodeApotik] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Jumlah] real  NULL,
  [Tanggal] datetime  NULL,
  [KdDepo] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fPeriodeApotik] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fPeriodeApotikFX


CREATE TABLE [dbo].[fPeriodeApotikFX] (
  [Tanggal] datetime  NOT NULL,
  [KdDepo] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fPeriodeApotikFX] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fPeriodeFarmasi


CREATE TABLE [dbo].[fPeriodeFarmasi] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Jumlah] real  NULL,
  [Tanggal] datetime  NULL,
  [TrGroup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fPeriodeFarmasi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fPeriodeFarmasiFX


CREATE TABLE [dbo].[fPeriodeFarmasiFX] (
  [Tanggal] datetime  NOT NULL,
  [TrGroup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fPeriodeFarmasiFX] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fPeriodePoli


CREATE TABLE [dbo].[fPeriodePoli] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Lokasi] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jumlah] real  NULL,
  [Tanggal] datetime  NULL
)
GO

ALTER TABLE [dbo].[fPeriodePoli] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fPeriodePoliFX


CREATE TABLE [dbo].[fPeriodePoliFX] (
  [Tanggal] datetime  NOT NULL,
  [Lokasi] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fPeriodePoliFX] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fPeriodeUGD


CREATE TABLE [dbo].[fPeriodeUGD] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Jumlah] real  NULL,
  [Tanggal] datetime  NULL
)
GO

ALTER TABLE [dbo].[fPeriodeUGD] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fPeriodeUGDFX


CREATE TABLE [dbo].[fPeriodeUGDFX] (
  [Tanggal] datetime  NOT NULL
)
GO

ALTER TABLE [dbo].[fPeriodeUGDFX] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for FPindah


CREATE TABLE [dbo].[FPindah] (
  [NoPindah] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regdate] datetime  NULL,
  [Regtime] datetime  NULL,
  [KdPoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoKamar] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoTTidur] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdIcd] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Diagnosa] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regdate1] datetime  NULL,
  [Regtime1] datetime  NULL,
  [KdPoli1] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal1] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas1] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoKamar1] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoTTidur1] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc1] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdIcd1] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Diagnosa1] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Lama] int  NULL,
  [Biaya] float(53)  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[FPindah] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for FPPRI


CREATE TABLE [dbo].[FPPRI] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regdate] datetime  NULL,
  [Regtime] datetime  NULL,
  [Kdrujuk] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kdapasien] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kddocrujuk] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDocRS] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmDocRS] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nokamar] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoTTidur] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDocRawat] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Biayappri] float(53)  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdIcd] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Diagnosa] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status] int  NULL,
  [Kategori] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdSex] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPerusahaan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoPeserta] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tglrujuk] datetime  NULL,
  [norujuk] nvarchar(19) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [StatusReg] int  NULL,
  [kdtuju] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jtkdkelas] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jtnmkelas] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [umurthn] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [umurbln] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [umurhari] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [bod] datetime  NULL,
  [nosep] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [pisat] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [keterangan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdrujukan] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmrujukan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdrefpeserta] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmrefpeserta] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [notifsep] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdkasus] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [lokasikasus] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nikktp] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdstatpeserta] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [statpeserta] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [asalrujuk] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [phone] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdcob] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmcob] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdjaminanbpjs] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nokontrol] nvarchar(19) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdpropinsi] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmpropinsi] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdkabupaten] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmkabupaten] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdkecamatan] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmkecamatan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [polieksekutif] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [katarak] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tglkejadian] datetime  NULL,
  [suplesi] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nosuplesi] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDPJP] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Deleted] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [catatan] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_spri] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[FPPRI] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for FPPRI_copy


CREATE TABLE [dbo].[FPPRI_copy] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regdate] datetime  NULL,
  [Regtime] datetime  NULL,
  [Kdrujuk] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kdapasien] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kddocrujuk] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDocRS] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmDocRS] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nokamar] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoTTidur] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDocRawat] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Biayappri] float(53)  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdIcd] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Diagnosa] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status] int  NULL,
  [Kategori] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdSex] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPerusahaan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoPeserta] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tglrujuk] datetime  NULL,
  [norujuk] nvarchar(19) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [StatusReg] int  NULL,
  [kdtuju] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jtkdkelas] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jtnmkelas] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [umurthn] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [umurbln] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [umurhari] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [bod] datetime  NULL,
  [nosep] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [pisat] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [keterangan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdrujukan] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmrujukan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdrefpeserta] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmrefpeserta] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [notifsep] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdkasus] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [lokasikasus] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nikktp] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdstatpeserta] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [statpeserta] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [asalrujuk] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [phone] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdcob] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmcob] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdjaminanbpjs] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nokontrol] nvarchar(19) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdpropinsi] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmpropinsi] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdkabupaten] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmkabupaten] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdkecamatan] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmkecamatan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [polieksekutif] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [katarak] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tglkejadian] datetime  NULL,
  [suplesi] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nosuplesi] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDPJP] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Deleted] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [catatan] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_spri] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[FPPRI_copy] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fProfile


CREATE TABLE [dbo].[fProfile] (
  [Company] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Address1] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Address2] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Phone] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Fax] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Email] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Homepage] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kota] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [rs_ketua] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [rs_kepala] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [rs_kepala_korps] nvarchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Ket] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fProfile] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fPSEP01


CREATE TABLE [dbo].[fPSEP01] (
  [NoPeserta] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Pelayanan] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fPSEP01] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for FPulang


CREATE TABLE [dbo].[FPulang] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Regdate] datetime  NULL,
  [Regtime] datetime  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kdbangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoKamar] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoTTidur] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [Jam] datetime  NULL,
  [Lama] int  NULL,
  [LamaTotal] int  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCKeluar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKkeluar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BiayaKelas] float(53)  NULL,
  [BiayaADM] float(53)  NULL,
  [Prosen] int  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [is_posted] int  NULL
)
GO

ALTER TABLE [dbo].[FPulang] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for FrBayi


CREATE TABLE [dbo].[FrBayi] (
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regdate] datetime  NULL,
  [Regtime] datetime  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaBayi] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoTTidur] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglMasuk] datetime  NULL,
  [JamMasuk] datetime  NULL,
  [TglKeluar] datetime  NULL,
  [JamKeluar] datetime  NULL,
  [Lama] int  NULL,
  [LamaTotal] int  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BiayaKelas] float(53)  NULL,
  [BiayaADM] float(53)  NULL,
  [Prosen] int  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Otor] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[FrBayi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fregno


CREATE TABLE [dbo].[fregno] (
  [NREGNO] float(53)  NULL,
  [NMEDREC] float(53)  NULL,
  [CREGNO] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NOMOR] float(53)  NULL,
  [NOBTB] float(53)  NULL,
  [NOBRB] float(53)  NULL,
  [NOPER] float(53)  NULL,
  [Kemasan] int  NULL
)
GO

ALTER TABLE [dbo].[fregno] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fRencanaOperasi


CREATE TABLE [dbo].[fRencanaOperasi] (
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regdate] datetime  NULL,
  [Tanggal] datetime  NULL,
  [Jam] datetime  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglLahir] datetime  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Umur] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdIcd] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmIcd] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTindakan] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmTindakan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDetail] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmDetail] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrOpr] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrAsOpr] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrAnestesi] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrAsAnestesi] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdStatus] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kesehatan] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [StatusOperasi] int DEFAULT NULL NULL,
  [PenundaanDate] date  NULL,
  [PenundaanAlasan] ntext COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ApprovalDate] datetime  NULL
)
GO

ALTER TABLE [dbo].[fRencanaOperasi] SET (LOCK_ESCALATION = TABLE)
GO

EXEC sp_addextendedproperty
'MS_Description', N'NULL = Diajukan, 1 = Jaminan, 2 = Siap Operasi, 3= Proses Operasi, 4= Sesai Proses',
'SCHEMA', N'dbo',
'TABLE', N'fRencanaOperasi',
'COLUMN', N'StatusOperasi'
GO

EXEC sp_addextendedproperty
'MS_Description', N'Diisi dengan tanggal rencana operasi sebelumnya',
'SCHEMA', N'dbo',
'TABLE', N'fRencanaOperasi',
'COLUMN', N'PenundaanDate'
GO


-- ----------------------------
-- Table structure for fResumeMedik


CREATE TABLE [dbo].[fResumeMedik] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurThn] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [umurBln] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglMasuk] datetime  NULL,
  [TglKeluar] datetime  NULL,
  [KdDocRujuk] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DiagnosaAwal] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdUtama] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTambahan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTambahan1] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTambahan2] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Operasi] int  NULL,
  [JenisOperasi] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kriteria] int  NULL,
  [RSingkat] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PFisik] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Diagnosis1] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PPenunjang] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Diagnosis2] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TYDiberikan] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TSPulang] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KeadaanPulang] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglKontrol] datetime  NULL,
  [JamKontrol] datetime  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fResumeMedik] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for frExpDate


CREATE TABLE [dbo].[frExpDate] (
  [KodeObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [ExpDate] datetime  NULL,
  [Lokasi] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[frExpDate] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fRujukanBPJS


CREATE TABLE [dbo].[fRujukanBPJS] (
  [NoSep] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [TglRujukan] datetime  NULL,
  [KdRujukan] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmRujukan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdICD] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Diagnosa] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPoli] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JnsPelayanan] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TipeRujukan] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoRujukan] nvarchar(19) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoPeserta] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Bod] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JenisPeserta] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kelas] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdAsalRujukan] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmAsalRujukan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Catatan] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tglRencanaKunjungan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fRujukanBPJS] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fSign


CREATE TABLE [dbo].[fSign] (
  [Judul1] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nama1] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Judul2] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nama2] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Judul3] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nama3] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Judul_1] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nama_1] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Judul_2] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nama_2] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Judul_3] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nama_3] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Judul4] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nama4] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Judul_4] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nama_4] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fSign] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fStatusKeluar


CREATE TABLE [dbo].[fStatusKeluar] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [TanggalKeluar] datetime  NULL,
  [JamKeluar] datetime  NULL,
  [nStatus] int  NULL,
  [Status] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaPeminjam] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Bagian] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Prn] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fStatusKeluar] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fStatusMasuk


CREATE TABLE [dbo].[fStatusMasuk] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [TanggalMasuk] datetime  NULL,
  [JamMasuk] datetime  NULL,
  [nStatus] int  NULL,
  [Status] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaPeminjam] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Bagian] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fStatusMasuk] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fStockPoli


CREATE TABLE [dbo].[fStockPoli] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Lokasi] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [STAwal] real  NULL,
  [TRTerima] real  NULL,
  [TRKeluar] real  NULL,
  [TRRetur] real  NULL
)
GO

ALTER TABLE [dbo].[fStockPoli] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fTarifBedahSentral


CREATE TABLE [dbo].[fTarifBedahSentral] (
  [KDTarif] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KDDetail] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKelas] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sarana] money  NULL,
  [Pelayanan] money  NULL,
  [Tarif] money  NULL,
  [JasaDokter] real  NULL,
  [JasaDokter1] real  NULL,
  [JasaDokterTetap] money  NULL,
  [JasaPerawat] real  NULL,
  [JasaPerawat1] real  NULL,
  [JasaPerawatTetap] money  NULL,
  [JasaRumahSakit] real  NULL,
  [JasaRumahSakit1] real  NULL,
  [JasaRumahSakitTetap] money  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdAcc] nvarchar(16) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [sewa_alat] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [sewa_ok] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [d_Ahli_bedah] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [d_Anesthesi] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ass_Anesthesi] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ass_Bedah] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [obat_ok] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [implan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [cucian] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [high_speet_drill] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [endoscopy] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [d_anak] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [bidan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Infant_Warmer] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [C_Arm] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [USG_Doopler] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sonopet] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Patologi] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Cutting] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fTarifBedahSentral] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fTarifBPJSIrna


CREATE TABLE [dbo].[fTarifBPJSIrna] (
  [KdTarif] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KodeCBG] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DeskripsiCBG] nvarchar(120) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TarifKls3] float(53)  NULL,
  [TarifKls2] float(53)  NULL,
  [TarifKls1] float(53)  NULL
)
GO

ALTER TABLE [dbo].[fTarifBPJSIrna] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fTarifElektromedik


CREATE TABLE [dbo].[fTarifElektromedik] (
  [KDTarif] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KDDetail] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKelas] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sarana] money  NULL,
  [Pelayanan] money  NULL,
  [Tarif] money  NULL,
  [JasaDokter] real  NULL,
  [JasaDokter1] real  NULL,
  [JasaDokterTetap] money  NULL,
  [JasaPerawat] real  NULL,
  [JasaPerawat1] real  NULL,
  [JasaPerawatTetap] money  NULL,
  [JasaRumahSakit] real  NULL,
  [JasaRumahSakit1] real  NULL,
  [JasaRumahSakitTetap] money  NULL,
  [KdAcc] nvarchar(16) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fTarifElektromedik] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fTarifHemodialisa


CREATE TABLE [dbo].[fTarifHemodialisa] (
  [KDTarif] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KDDetail] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKelas] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sarana] float(53)  NULL,
  [Pelayanan] float(53)  NULL,
  [Tarif] float(53)  NULL,
  [JasaDokter] float(53)  NULL,
  [JasaDokter1] float(53)  NULL,
  [JasaDokterTetap] float(53)  NULL,
  [JasaPerawat] float(53)  NULL,
  [JasaPerawat1] float(53)  NULL,
  [JasaPerawatTetap] float(53)  NULL,
  [JasaRumahSakit] float(53)  NULL,
  [JasaRumahSakit1] float(53)  NULL,
  [JasaRumahSakitTetap] float(53)  NULL,
  [KdAcc] nvarchar(16) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fTarifHemodialisa] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fTarifLaboratorium


CREATE TABLE [dbo].[fTarifLaboratorium] (
  [KDTarif] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KDDetail] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKelas] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sarana] money  NULL,
  [Pelayanan] money  NULL,
  [Tarif] money  NULL,
  [JasaDokter] real  NULL,
  [JasaDokter1] real  NULL,
  [JasaDokterTetap] money  NULL,
  [JasaPerawat] real  NULL,
  [JasaPerawat1] real  NULL,
  [JasaPerawatTetap] money  NULL,
  [JasaRumahSakit] real  NULL,
  [JasaRumahSakit1] real  NULL,
  [JasaRumahSakitTetap] money  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdAcc] nvarchar(16) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fTarifLaboratorium] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fTarifMcu


CREATE TABLE [dbo].[fTarifMcu] (
  [KdPaket] int  NOT NULL,
  [NmPaket] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UserVerify] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fTarifMcu] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fTarifPatologi


CREATE TABLE [dbo].[fTarifPatologi] (
  [KDTarif] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KDDetail] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKelas] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sarana] money  NULL,
  [Pelayanan] money  NULL,
  [Tarif] money  NULL,
  [JasaDokter] real  NULL,
  [JasaDokter1] real  NULL,
  [JasaDokterTetap] money  NULL,
  [JasaPerawat] real  NULL,
  [JasaPerawat1] real  NULL,
  [JasaPerawatTetap] money  NULL,
  [JasaRumahSakit] real  NULL,
  [JasaRumahSakit1] real  NULL,
  [JasaRumahSakitTetap] money  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdAcc] nvarchar(16) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fTarifPatologi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fTarifRadiologi


CREATE TABLE [dbo].[fTarifRadiologi] (
  [KDTarif] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KDDetail] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKelas] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sarana] money  NULL,
  [Pelayanan] money  NULL,
  [Tarif] money  NULL,
  [JasaDokter] real  NULL,
  [JasaDokter1] real  NULL,
  [JasaDokterTetap] money  NULL,
  [JasaPerawat] real  NULL,
  [JasaPerawat1] real  NULL,
  [JasaPerawatTetap] money  NULL,
  [JasaRumahSakit] real  NULL,
  [JasaRumahSakit1] real  NULL,
  [JasaRumahSakitTetap] money  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdAcc] nvarchar(16) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fTarifRadiologi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fTarifRawatDarurat


CREATE TABLE [dbo].[fTarifRawatDarurat] (
  [KDTarif] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KDDetail] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sarana] float(53)  NULL,
  [Pelayanan] float(53)  NULL,
  [Tarif] float(53)  NULL,
  [JasaDokter] float(53)  NULL,
  [JasaDokter1] float(53)  NULL,
  [JasaDokterTetap] float(53)  NULL,
  [JasaPerawat] float(53)  NULL,
  [JasaPerawat1] float(53)  NULL,
  [JasaPerawatTetap] float(53)  NULL,
  [JasaRumahSakit] float(53)  NULL,
  [JasaRumahSakit1] float(53)  NULL,
  [JasaRumahSakitTetap] float(53)  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdAcc] nvarchar(16) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fTarifRawatDarurat] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fTarifRawatInap


CREATE TABLE [dbo].[fTarifRawatInap] (
  [KDTarif] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KDDetail] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKelas] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sarana] float(53)  NULL,
  [Pelayanan] float(53)  NULL,
  [Tarif] float(53)  NULL,
  [JasaDokter] float(53)  NULL,
  [JasaDokter1] float(53)  NULL,
  [JasaDokterTetap] float(53)  NULL,
  [JasaPerawat] float(53)  NULL,
  [JasaPerawat1] float(53)  NULL,
  [JasaPerawatTetap] float(53)  NULL,
  [JasaRumahSakit] float(53)  NULL,
  [JasaRumahSakit1] float(53)  NULL,
  [JasaRumahSakitTetap] float(53)  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdAcc] nvarchar(16) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fTarifRawatInap] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fTarifRawatJalan


CREATE TABLE [dbo].[fTarifRawatJalan] (
  [KDTarif] nvarchar(12) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KDDetail] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sarana] float(53)  NULL,
  [Pelayanan] float(53)  NULL,
  [Tarif] float(53)  NULL,
  [JasaDokter] float(53)  NULL,
  [JasaDokter1] float(53)  NULL,
  [JasaDokterTetap] float(53)  NULL,
  [JasaPerawat] float(53)  NULL,
  [JasaPerawat1] float(53)  NULL,
  [JasaPerawatTetap] float(53)  NULL,
  [JasaRumahSakit] float(53)  NULL,
  [JasaRumahSakit1] float(53)  NULL,
  [JasaRumahSakitTetap] float(53)  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdAcc] nvarchar(16) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fTarifRawatJalan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for FtDokter


CREATE TABLE [dbo].[FtDokter] (
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmDoc] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Spesialis] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Address] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [City] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPos] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Phone] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPoli] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [rjcvisite] bigint  NULL,
  [rjcoperasi] bigint  NULL,
  [rjctindaka] bigint  NULL,
  [rjcpmedis] bigint  NULL,
  [rjjvisite] bigint  NULL,
  [rjjoperasi] bigint  NULL,
  [rjjtindaka] bigint  NULL,
  [rjjpmedis] bigint  NULL,
  [ricvisite] bigint  NULL,
  [ricoperasi] bigint  NULL,
  [rictindaka] bigint  NULL,
  [ricpmedis] bigint  NULL,
  [rijvisite] bigint  NULL,
  [rijoperasi] bigint  NULL,
  [rijtindaka] bigint  NULL,
  [rijpmedis] bigint  NULL,
  [Posisi] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoPraktek] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Praktek] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JamPagi] datetime2(7)  NULL,
  [JamSore] datetime2(7)  NULL,
  [NPWP] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoRut] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDPJP] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDepo] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdMapping] bigint  NULL,
  [jabatan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [korps_ttd] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [file_ttd] nvarchar(254) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [file_stat] nvarchar(254) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [C_PEGAWAI] nvarchar(254) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [User] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kelompok] int  NULL,
  [stsjab] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[FtDokter] SET (LOCK_ESCALATION = TABLE)
GO

EXEC sp_addextendedproperty
'MS_Description', N'1=Ahli Bedah, 2=Asisten',
'SCHEMA', N'dbo',
'TABLE', N'FtDokter',
'COLUMN', N'Kelompok'
GO


-- ----------------------------
-- Table structure for FtDokter_270722


CREATE TABLE [dbo].[FtDokter_270722] (
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmDoc] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Spesialis] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Address] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [City] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPos] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Phone] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPoli] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [rjcvisite] bigint  NULL,
  [rjcoperasi] bigint  NULL,
  [rjctindaka] bigint  NULL,
  [rjcpmedis] bigint  NULL,
  [rjjvisite] bigint  NULL,
  [rjjoperasi] bigint  NULL,
  [rjjtindaka] bigint  NULL,
  [rjjpmedis] bigint  NULL,
  [ricvisite] bigint  NULL,
  [ricoperasi] bigint  NULL,
  [rictindaka] bigint  NULL,
  [ricpmedis] bigint  NULL,
  [rijvisite] bigint  NULL,
  [rijoperasi] bigint  NULL,
  [rijtindaka] bigint  NULL,
  [rijpmedis] bigint  NULL,
  [Posisi] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoPraktek] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Praktek] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JamPagi] datetime2(7)  NULL,
  [JamSore] datetime2(7)  NULL,
  [NPWP] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoRut] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDPJP] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDepo] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdMapping] bigint  NULL,
  [jabatan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [korps_ttd] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [file_ttd] nvarchar(254) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [file_stat] nvarchar(254) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [C_PEGAWAI] nvarchar(254) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[FtDokter_270722] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for FtDokter_old


CREATE TABLE [dbo].[FtDokter_old] (
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmDoc] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Spesialis] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Address] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [City] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPos] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Phone] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPoli] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [rjcvisite] real  NULL,
  [rjcoperasi] real  NULL,
  [rjctindakan] real  NULL,
  [rjcpmedis] real  NULL,
  [rjjvisite] real  NULL,
  [rjjoperasi] real  NULL,
  [rjjtindakan] real  NULL,
  [rjjpmedis] real  NULL,
  [ricvisite] real  NULL,
  [ricoperasi] real  NULL,
  [rictindakan] real  NULL,
  [ricpmedis] real  NULL,
  [rijvisite] real  NULL,
  [rijoperasi] real  NULL,
  [rijtindakan] real  NULL,
  [rijpmedis] real  NULL,
  [Posisi] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoPraktek] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Praktek] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JamPagi] datetime  NULL,
  [JamSore] datetime  NULL,
  [NPWP] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoRut] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDPJP] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDepo] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdMapping] int  NULL,
  [jabatan] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [korps_ttd] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [file_ttd] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [file_stat] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [C_PEGAWAI] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[FtDokter_old] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for FtDokterold


CREATE TABLE [dbo].[FtDokterold] (
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmDoc] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Spesialis] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Address] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [City] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPos] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Phone] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPoli] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [rjcvisite] real  NULL,
  [rjcoperasi] real  NULL,
  [rjctindakan] real  NULL,
  [rjcpmedis] real  NULL,
  [rjjvisite] real  NULL,
  [rjjoperasi] real  NULL,
  [rjjtindakan] real  NULL,
  [rjjpmedis] real  NULL,
  [ricvisite] real  NULL,
  [ricoperasi] real  NULL,
  [rictindakan] real  NULL,
  [ricpmedis] real  NULL,
  [rijvisite] real  NULL,
  [rijoperasi] real  NULL,
  [rijtindakan] real  NULL,
  [rijpmedis] real  NULL,
  [Posisi] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoPraktek] int  NULL,
  [Praktek] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JamPagi] datetime  NULL,
  [JamSore] datetime  NULL,
  [NPWP] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoRut] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDPJP] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDepo] varchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[FtDokterold] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for FtDrRujukan


CREATE TABLE [dbo].[FtDrRujukan] (
  [KdDr] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmDr] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Spesialis] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Address] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [City] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPos] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Phone] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[FtDrRujukan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for FtpServer


CREATE TABLE [dbo].[FtpServer] (
  [NAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [OWNERNAME] varchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [COMMAND] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BINARYMODE] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SRCFILENAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DESTFILENAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [USERNAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PASSWORD] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[FtpServer] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for fTracer


CREATE TABLE [dbo].[fTracer] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Disiapkan] datetime  NULL,
  [UserSiap] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Dikeluarkan] datetime  NULL,
  [UserKeluar] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Diterima] datetime  NULL,
  [UserTerima] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DiPrint] datetime  NULL,
  [UserPrint] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[fTracer] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for GenericFaultTable


CREATE TABLE [dbo].[GenericFaultTable] (
  [TYPE] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[GenericFaultTable] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for GroupHarga


CREATE TABLE [dbo].[GroupHarga] (
  [KDCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NMCbayar] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Discount] int  NULL,
  [UpPrice] int  NULL
)
GO

ALTER TABLE [dbo].[GroupHarga] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for grouplabold_copy


CREATE TABLE [dbo].[grouplabold_copy] (
  [KDGroup] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmGroup] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [id] int  NULL
)
GO

ALTER TABLE [dbo].[grouplabold_copy] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for GroupPemeriksaan


CREATE TABLE [dbo].[GroupPemeriksaan] (
  [IdGroup] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NamaGroup] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [dokter_persen] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [paramedis_persen] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[GroupPemeriksaan] SET (LOCK_ESCALATION = TABLE)
GO

EXEC sp_addextendedproperty
'MS_Description', N'1,2,3dst = umum, A/B=langsung, 001=urutan ,',
'SCHEMA', N'dbo',
'TABLE', N'GroupPemeriksaan',
'COLUMN', N'IdGroup'
GO


-- ----------------------------
-- Table structure for GroupTable


CREATE TABLE [dbo].[GroupTable] (
  [NAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [OWNERNAME] varchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [MEMBERNAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [MEMBEROWNERNAME] varchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[GroupTable] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HasilPatologi


CREATE TABLE [dbo].[HasilPatologi] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regdate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurThn] nvarchar(12) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglHasil] datetime  NULL,
  [JamHasil] datetime  NULL,
  [Keterangan] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoPhoto] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Hasil_KetKlinik] ntext COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Hasil_PemMikro] ntext COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Hasil_PemMakro] ntext COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Hasil_Kesimpulan] ntext COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Hasil_Anjuran] ntext COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Hasil_Datawal] ntext COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Hasil_Imuno] ntext COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Hasil_pemImuno] ntext COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Pict] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ACC] char(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdGroup] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KDDetail] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NMDetail] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[HasilPatologi] SET (LOCK_ESCALATION = TABLE)
GO

EXEC sp_addextendedproperty
'MS_Description', N'O=Onpros
Y=Acc
X = Reject',
'SCHEMA', N'dbo',
'TABLE', N'HasilPatologi',
'COLUMN', N'ACC'
GO


-- ----------------------------
-- Table structure for HasilRadiologi


CREATE TABLE [dbo].[HasilRadiologi] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Jam] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regdate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurThn] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglHasil] datetime  NULL,
  [JamHasil] datetime  NULL,
  [Hasil] ntext COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoPhoto] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Dipakai35] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Dipakai30] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Dipakai24] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Dipakai18] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DipakaiCT] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DipakaiMM] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Rusak35] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Rusak30] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Rusak24] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Rusak18] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RusakCT] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RusakMM] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Pict] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ACC] char(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[HasilRadiologi] SET (LOCK_ESCALATION = TABLE)
GO

EXEC sp_addextendedproperty
'MS_Description', N'O=Onpros
Y=Acc
X = Reject',
'SCHEMA', N'dbo',
'TABLE', N'HasilRadiologi',
'COLUMN', N'ACC'
GO


-- ----------------------------
-- Table structure for HasilRincianInacbgIrj


CREATE TABLE [dbo].[HasilRincianInacbgIrj] (
  [Regno] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Medrec] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regdate] datetime  NULL,
  [Regtime] datetime  NULL,
  [TanggalKasir] datetime  NULL,
  [KdPoli] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoPeserta] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoSep] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [IcdX] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Icd9] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ByRikDokter] float(53) DEFAULT ((0)) NULL,
  [ByTindakanMedis] float(53) DEFAULT ((0)) NULL,
  [ByLab] float(53) DEFAULT ((0)) NULL,
  [ByEkg] float(53) DEFAULT ((0)) NULL,
  [ByEeg] float(53) DEFAULT ((0)) NULL,
  [ByRad] float(53) DEFAULT ((0)) NULL,
  [ByFis] float(53) DEFAULT ((0)) NULL,
  [ByKemo] float(53)  NULL,
  [ByObat] float(53) DEFAULT ((0)) NULL,
  [ByAmhp] float(53) DEFAULT ((0)) NULL,
  [ByMri] float(53) DEFAULT ((0)) NULL,
  [ByPoli] float(53)  NULL,
  [ByLainnya] float(53) DEFAULT ((0)) NULL,
  [ByInacbg] float(53) DEFAULT ((0)) NULL,
  [ByDisetujui] float(53)  NULL,
  [StatusKlaim] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KodeInacbg] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaInacbg] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ByTarifRS] float(53)  NULL,
  [CreateBy] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CreateAt] datetime  NULL,
  [UpdateAt] datetime  NULL
)
GO

ALTER TABLE [dbo].[HasilRincianInacbgIrj] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HasilRincianInacbgIrna


CREATE TABLE [dbo].[HasilRincianInacbgIrna] (
  [Regno] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Medrec] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regdate] datetime  NULL,
  [Regtime] datetime  NULL,
  [TglPulang] datetime  NULL,
  [JamPulang] datetime  NULL,
  [KdPoli] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoPeserta] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoSep] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [IcdX] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Icd9] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [LamaRawat] float(53) DEFAULT ((0)) NULL,
  [ByRuangRawat] float(53) DEFAULT ((0)) NULL,
  [ByKamarBerasalin] float(53) DEFAULT ((0)) NULL,
  [ByOprasi] float(53) DEFAULT ((0)) NULL,
  [ByLab] float(53) DEFAULT ((0)) NULL,
  [ByEkg] float(53) DEFAULT ((0)) NULL,
  [ByEeg] float(53) DEFAULT ((0)) NULL,
  [ByRad] float(53) DEFAULT ((0)) NULL,
  [ByFis] float(53) DEFAULT ((0)) NULL,
  [ByObat] float(53) DEFAULT ((0)) NULL,
  [ByAmhp] float(53) DEFAULT ((0)) NULL,
  [ByUgd] float(53) DEFAULT ((0)) NULL,
  [ByPoli] float(53) DEFAULT ((0)) NULL,
  [ByJasaDokter] float(53) DEFAULT ((0)) NULL,
  [ByJasaPerawat] float(53) DEFAULT ((0)) NULL,
  [ByAskep] float(53) DEFAULT ((0)) NULL,
  [ByKemo] float(53) DEFAULT ((0)) NULL,
  [ByPmi] float(53) DEFAULT ((0)) NULL,
  [ByHd] float(53) DEFAULT ((0)) NULL,
  [ByMri] float(53) DEFAULT ((0)) NULL,
  [ByAmbulance] float(53) DEFAULT ((0)) NULL,
  [ByIcu] float(53) DEFAULT ((0)) NULL,
  [ByGizi] float(53) DEFAULT ((0)) NULL,
  [ByLainnya] float(53) DEFAULT ((0)) NULL,
  [ByInacbg] float(53) DEFAULT ((0)) NULL,
  [ByDisetujui] float(53)  NULL,
  [StatusKlaim] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CreateBy] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CreateAt] datetime  NULL,
  [UpdateAt] datetime  NULL,
  [KodeInacbg] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaInacbg] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ByTarifRS] float(53)  NULL
)
GO

ALTER TABLE [dbo].[HasilRincianInacbgIrna] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HasilRincianInacbgSync


CREATE TABLE [dbo].[HasilRincianInacbgSync] (
  [JenisPelayanan] int  NOT NULL,
  [Tanggal] date  NOT NULL
)
GO

ALTER TABLE [dbo].[HasilRincianInacbgSync] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadApotik


CREATE TABLE [dbo].[HeadApotik] (
  [BLCode] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [BLDate] datetime  NULL,
  [Jam] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [JumlahBiaya] money  NULL,
  [BiayaKemasan] money  NULL,
  [BiayaRacikan] money  NULL,
  [BiayaPatent] money  NULL,
  [TotalTagihan] money  NULL,
  [TotalDinas] money  NULL,
  [TotalUmum] money  NULL,
  [NoResep] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglResep] datetime  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalData] datetime  NULL,
  [Verifikasi] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidData] int  NULL,
  [Discount] float(53)  NULL,
  [TglAkhir] datetime  NULL,
  [KdDepo] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [is_posted] bit DEFAULT ((0)) NULL,
  [Pro] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Catatan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [pelayanan] money  NULL,
  [stsbayar] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tglbayar] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[HeadApotik] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadApotikKronis


CREATE TABLE [dbo].[HeadApotikKronis] (
  [BLCode] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [BLDate] datetime  NULL,
  [Jam] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [JumlahBiaya] money  NULL,
  [BiayaKemasan] money  NULL,
  [BiayaRacikan] money  NULL,
  [BiayaPatent] money  NULL,
  [TotalTagihan] money  NULL,
  [TotalDinas] money  NULL,
  [TotalUmum] money  NULL,
  [NoResep] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglResep] datetime  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalData] datetime  NULL,
  [Verifikasi] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidData] int  NULL,
  [Discount] float(53)  NULL,
  [TglAkhir] datetime  NULL,
  [KdDepo] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Catatan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Pro] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[HeadApotikKronis] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadApotikTmp


CREATE TABLE [dbo].[HeadApotikTmp] (
  [Id] int  IDENTITY(1,1) NOT NULL,
  [Jam] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JumlahBiaya] money  NULL,
  [BiayaKemasan] money  NULL,
  [BiayaRacikan] money  NULL,
  [BiayaPatent] money  NULL,
  [TotalTagihan] money  NULL,
  [TotalDinas] money  NULL,
  [TotalUmum] money  NULL,
  [KdDepo] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoUrut] int  NOT NULL,
  [Jenis] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [TglOrder] datetime  NULL,
  [IdPosisiDepo] int  NULL,
  [Status] int DEFAULT ((0)) NULL
)
GO

ALTER TABLE [dbo].[HeadApotikTmp] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadApotikTmp_copy


CREATE TABLE [dbo].[HeadApotikTmp_copy] (
  [Id] int  IDENTITY(1,1) NOT NULL,
  [Jam] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JumlahBiaya] money  NULL,
  [BiayaKemasan] money  NULL,
  [BiayaRacikan] money  NULL,
  [BiayaPatent] money  NULL,
  [TotalTagihan] money  NULL,
  [TotalDinas] money  NULL,
  [TotalUmum] money  NULL,
  [KdDepo] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoUrut] int  NOT NULL,
  [Jenis] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [TglOrder] datetime  NULL,
  [IdPosisiDepo] int  NULL,
  [Status] int DEFAULT ((0)) NULL
)
GO

ALTER TABLE [dbo].[HeadApotikTmp_copy] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadBebas


CREATE TABLE [dbo].[HeadBebas] (
  [BLCode] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [BLDate] datetime  NULL,
  [Jam] datetime  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmDokter] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JumlahBiaya] float(53)  NULL,
  [BiayaKemasan] float(53)  NULL,
  [BiayaRacikan] float(53)  NULL,
  [BiayaPatent] float(53)  NULL,
  [TotalTagihan] float(53)  NULL,
  [Discount] float(53)  NULL,
  [NoResep] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglResep] datetime  NULL,
  [TglAkhir] datetime  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalData] datetime  NULL,
  [JumlahUang] float(53)  NULL,
  [Kembalian] float(53)  NULL,
  [KdDepo] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPelanggan] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Margin] float(53)  NULL,
  [pelayanan] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [stsbayar] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[HeadBebas] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadBilAku


CREATE TABLE [dbo].[HeadBilAku] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Jam] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalBiaya] float(53)  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [TanggalData] datetime  NULL,
  [VCode] int  NULL,
  [Verifikasi] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurThn] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurBln] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurHari] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [is_posted] bit DEFAULT ((0)) NULL
)
GO

ALTER TABLE [dbo].[HeadBilAku] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadBilFis


CREATE TABLE [dbo].[HeadBilFis] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Jam] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalBiaya] float(53)  NULL,
  [TotalDinas] float(53)  NULL,
  [TotalUmum] float(53)  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [TanggalData] datetime  NULL,
  [VCode] int  NULL,
  [Verifikasi] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurThn] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurBln] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurHari] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [is_posted] bit DEFAULT ((0)) NULL
)
GO

ALTER TABLE [dbo].[HeadBilFis] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadBilHD


CREATE TABLE [dbo].[HeadBilHD] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Jam] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalBiaya] float(53)  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [TanggalData] datetime  NULL,
  [VCode] int  NULL,
  [Verifikasi] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurThn] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurBln] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurHari] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [is_posted] bit DEFAULT ((0)) NULL
)
GO

ALTER TABLE [dbo].[HeadBilHD] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadBilIrj


CREATE TABLE [dbo].[HeadBilIrj] (
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Kategori] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoKwitansi] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regno] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(12) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(12) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalBiaya] float(53)  NULL,
  [TotalDinas] float(53)  NULL,
  [TotalUmum] float(53)  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Lokasi] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [otor] int  NULL,
  [is_posted] bit DEFAULT ((0)) NULL
)
GO

ALTER TABLE [dbo].[HeadBilIrj] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadBilIrj_copy1


CREATE TABLE [dbo].[HeadBilIrj_copy1] (
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Kategori] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoKwitansi] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regno] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(12) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(12) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalBiaya] float(53)  NULL,
  [TotalDinas] float(53)  NULL,
  [TotalUmum] float(53)  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Lokasi] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [otor] int  NULL,
  [is_posted] bit DEFAULT ((0)) NULL
)
GO

ALTER TABLE [dbo].[HeadBilIrj_copy1] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadBilIrna


CREATE TABLE [dbo].[HeadBilIrna] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalBiaya] float(53)  NULL,
  [TotalDinas] float(53)  NULL,
  [TotalUmum] float(53)  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [VCode] int  NULL,
  [Verifikasi] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidData] int  NULL,
  [is_posted] bit DEFAULT ((0)) NULL
)
GO

ALTER TABLE [dbo].[HeadBilIrna] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadBilLab


CREATE TABLE [dbo].[HeadBilLab] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Jam] datetime  NULL,
  [NoLab] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglHasil] datetime  NULL,
  [JamHasil] datetime  NULL,
  [TglSelesai] datetime  NULL,
  [JamSelesai] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurThn] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurBln] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurHari] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmDoc] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jumlah] float(53)  NULL,
  [NonJamin] float(53)  NULL,
  [TotalBiaya] float(53)  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nStatus] int  NULL,
  [nJenis] int  NULL,
  [Catatan] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDokter] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [VCode] int  NULL,
  [Verifikasi] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanda] int DEFAULT ((0)) NULL,
  [is_posted] bit DEFAULT ((0)) NULL,
  [TglSampel] date  NULL,
  [AsalSampel] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Setujui] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Diskon] float(53)  NULL,
  [Pengambil_sampel] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_ambil_sampel] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_setujui] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_verif] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglCetakOrder] date  NULL,
  [kewarganegaraan] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kesan] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Saran] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status_mcu] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[HeadBilLab] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadBilLabAcc


CREATE TABLE [dbo].[HeadBilLabAcc] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Jam] datetime  NULL,
  [NoLab] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglHasil] datetime  NULL,
  [JamHasil] datetime  NULL,
  [TglSelesai] datetime  NULL,
  [JamSelesai] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurThn] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurBln] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurHari] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmDoc] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jumlah] float(53)  NULL,
  [NonJamin] float(53)  NULL,
  [TotalBiaya] float(53)  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nStatus] int  NULL,
  [nJenis] int  NULL,
  [Catatan] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDokter] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [VCode] int  NULL,
  [Verifikasi] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanda] int DEFAULT ((0)) NULL,
  [is_posted] bit DEFAULT ((0)) NULL,
  [TglSampel] date  NULL,
  [AsalSampel] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Setujui] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Diskon] float(53)  NULL,
  [Pengambil_sampel] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_ambil_sampel] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_setujui] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_verif] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglCetakOrder] datetime  NULL
)
GO

ALTER TABLE [dbo].[HeadBilLabAcc] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadBilLabTEMP


CREATE TABLE [dbo].[HeadBilLabTEMP] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Jam] datetime  NULL,
  [NoLab] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglHasil] datetime  NULL,
  [JamHasil] datetime  NULL,
  [TglSelesai] datetime  NULL,
  [JamSelesai] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurThn] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurBln] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurHari] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmDoc] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jumlah] float(53)  NULL,
  [NonJamin] float(53)  NULL,
  [TotalBiaya] float(53)  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nStatus] int  NULL,
  [nJenis] int  NULL,
  [Catatan] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDokter] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [VCode] int  NULL,
  [Verifikasi] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanda] int DEFAULT ((0)) NULL,
  [is_posted] bit DEFAULT ((0)) NULL,
  [TglSampel] date  NULL,
  [AsalSampel] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Setujui] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Diskon] float(53)  NULL,
  [Pengambil_sampel] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_ambil_sampel] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_setujui] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_verif] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglCetakOrder] datetime  NULL
)
GO

ALTER TABLE [dbo].[HeadBilLabTEMP] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadBilPatologi


CREATE TABLE [dbo].[HeadBilPatologi] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Jam] datetime  NULL,
  [NoLab] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglHasil] datetime  NULL,
  [JamHasil] datetime  NULL,
  [TglSelesai] datetime  NULL,
  [JamSelesai] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurThn] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurBln] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurHari] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmDoc] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jumlah] float(53)  NULL,
  [NonJamin] float(53)  NULL,
  [TotalBiaya] float(53)  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nStatus] int  NULL,
  [nJenis] int  NULL,
  [Catatan] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDokter] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [VCode] int  NULL,
  [Verifikasi] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanda] int DEFAULT ((0)) NULL,
  [is_posted] bit DEFAULT ((0)) NULL,
  [TglSampel] date  NULL,
  [AsalSampel] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Setujui] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Diskon] float(53)  NULL,
  [Pengambil_sampel] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_ambil_sampel] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_setujui] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_verif] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglCetakOrder] date  NULL,
  [kewarganegaraan] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[HeadBilPatologi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadBilPatologiTEMP


CREATE TABLE [dbo].[HeadBilPatologiTEMP] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Jam] datetime  NULL,
  [NoLab] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglHasil] datetime  NULL,
  [JamHasil] datetime  NULL,
  [TglSelesai] datetime  NULL,
  [JamSelesai] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurThn] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurBln] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurHari] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmDoc] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jumlah] float(53)  NULL,
  [NonJamin] float(53)  NULL,
  [TotalBiaya] float(53)  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nStatus] int  NULL,
  [nJenis] int  NULL,
  [Catatan] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDokter] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [VCode] int  NULL,
  [Verifikasi] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanda] int DEFAULT ((0)) NULL,
  [is_posted] bit DEFAULT ((0)) NULL,
  [TglSampel] date  NULL,
  [AsalSampel] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Setujui] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Diskon] float(53)  NULL,
  [Pengambil_sampel] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_ambil_sampel] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_setujui] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kd_verif] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglCetakOrder] datetime  NULL
)
GO

ALTER TABLE [dbo].[HeadBilPatologiTEMP] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadBilRad


CREATE TABLE [dbo].[HeadBilRad] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Jam] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalBiaya] float(53)  NULL,
  [TotalDinas] float(53)  NULL,
  [TotalUmum] float(53)  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [TanggalData] datetime  NULL,
  [VCode] int  NULL,
  [Verifikasi] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurThn] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurBln] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurHari] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nstatus] int  NULL,
  [Tanda] int DEFAULT ((0)) NULL,
  [KdDocPem] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [is_posted] bit DEFAULT ((0)) NULL,
  [DocPengirim] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [date_acc] datetime2(7)  NULL,
  [TglCetakOrder] datetime2(7)  NULL,
  [TglHapusOrder] datetime  NULL,
  [UserHapusOrder] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [terhapus] char(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Catt_rad] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Catt_jaminan] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status_acc] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[HeadBilRad] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadBilRadAcc


CREATE TABLE [dbo].[HeadBilRadAcc] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Jam] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalBiaya] float(53)  NULL,
  [TotalDinas] float(53)  NULL,
  [TotalUmum] float(53)  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [TanggalData] datetime  NULL,
  [VCode] int  NULL,
  [Verifikasi] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurThn] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurBln] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurHari] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nstatus] int  NULL,
  [Tanda] int DEFAULT ((0)) NULL,
  [KdDocPem] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [is_posted] bit DEFAULT ((0)) NULL,
  [DocPengirim] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [date_acc] datetime2(7)  NULL,
  [TglCetakOrder] datetime2(7)  NULL,
  [TglHapusOrder] datetime  NULL,
  [UserHapusOrder] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [terhapus] char(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Catt_rad] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Catt_jaminan] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status_acc] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[HeadBilRadAcc] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadBilRadTmp


CREATE TABLE [dbo].[HeadBilRadTmp] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Jam] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalBiaya] float(53)  NULL,
  [TotalDinas] float(53)  NULL,
  [TotalUmum] float(53)  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [TanggalData] datetime  NULL,
  [VCode] int  NULL,
  [Verifikasi] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurThn] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurBln] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurHari] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nstatus] int  NULL,
  [Tanda] int DEFAULT ((0)) NULL,
  [KdDocPem] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [is_posted] bit DEFAULT ((0)) NULL,
  [DocPengirim] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [date_acc] datetime2(7)  NULL,
  [TglCetakOrder] datetime2(7)  NULL,
  [TglHapusOrder] datetime  NULL,
  [UserHapusOrder] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [terhapus] char(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Catt_rad] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Catt_jaminan] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status_acc] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[HeadBilRadTmp] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadBilUgd


CREATE TABLE [dbo].[HeadBilUgd] (
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoKwitansi] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalBiaya] float(53)  NULL,
  [TotalDinas] float(53)  NULL,
  [TotalUmum] float(53)  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [otor] int  NULL,
  [is_posted] bit DEFAULT ((0)) NULL
)
GO

ALTER TABLE [dbo].[HeadBilUgd] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadDinas


CREATE TABLE [dbo].[HeadDinas] (
  [NOPo] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [TglPO] datetime  NULL,
  [TglKirim] datetime  NULL,
  [DueDate] datetime  NULL,
  [TermOP] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SMCode] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Memo] nvarchar(240) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jumlah] float(53)  NULL,
  [Disc] real  NULL,
  [JmlDisc] float(53)  NULL,
  [Ppn] int  NULL,
  [JmlPpn] float(53)  NULL,
  [Materai] float(53)  NULL,
  [Total] float(53)  NULL,
  [Otor] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [AsalDana] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [varuser] varbinary(max)  NULL,
  [vargroup] varbinary(max)  NULL,
  [TrGroup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS DEFAULT ('OPEN') NULL
)
GO

ALTER TABLE [dbo].[HeadDinas] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadHasil


CREATE TABLE [dbo].[HeadHasil] (
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tglhasil] datetime  NULL,
  [Jamhasil] datetime  NULL,
  [Nolab] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Umurthn] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Umurbln] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Umurhari] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Catatan] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Otor] int  NULL,
  [Saran] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanda] int  NULL,
  [PrintCount] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Publish] int DEFAULT ((1)) NULL,
  [publish_datetime] datetime  NULL,
  [Ct_value] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[HeadHasil] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadMasterPaketApotik


CREATE TABLE [dbo].[HeadMasterPaketApotik] (
  [Id] int  IDENTITY(1,1) NOT NULL,
  [NamaPaket] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KeteranganPaket] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JumlahBiaya] money  NULL,
  [BiayaKemasan] money  NULL,
  [BiayaRacikan] money  NULL,
  [BiayaPatent] money  NULL,
  [TotalTagihan] money  NULL,
  [TotalDinas] money  NULL,
  [TotalUmum] money  NULL,
  [KdDepo] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status] int DEFAULT ((0)) NULL,
  [Validuser] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[HeadMasterPaketApotik] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadMasterPaketApotik_


CREATE TABLE [dbo].[HeadMasterPaketApotik_] (
  [Id] int  IDENTITY(1,1) NOT NULL,
  [NamaPaket] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KeteranganPaket] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JumlahBiaya] money  NULL,
  [BiayaKemasan] money  NULL,
  [BiayaRacikan] money  NULL,
  [BiayaPatent] money  NULL,
  [TotalTagihan] money  NULL,
  [TotalDinas] money  NULL,
  [TotalUmum] money  NULL,
  [KdDepo] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status] int DEFAULT ((0)) NULL,
  [Validuser] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[HeadMasterPaketApotik_] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadMDT


CREATE TABLE [dbo].[HeadMDT] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NoLab] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglHasil] datetime  NULL,
  [JamHasil] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurThn] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurBln] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurHari] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Hemo] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Leuko] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Trombo] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CatEritro] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CatLeuko] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CatTrombo] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kesan] ntext COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Saran] ntext COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[HeadMDT] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadMutasi


CREATE TABLE [dbo].[HeadMutasi] (
  [NoMutasi] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Keterangan] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [GudangTujuan] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaGudang] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Otor] int  NULL,
  [TrGroup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [GudangAsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaAsal] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS DEFAULT ('DRAFT') NULL,
  [NoMutasi_send] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[HeadMutasi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadObatIrj


CREATE TABLE [dbo].[HeadObatIrj] (
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalBiaya] float(53)  NULL,
  [TotalDinas] float(53)  NULL,
  [TotalUmum] float(53)  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Lokasi] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[HeadObatIrj] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadObatUgd


CREATE TABLE [dbo].[HeadObatUgd] (
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalBiaya] float(53)  NULL,
  [TotalDinas] float(53)  NULL,
  [TotalUmum] float(53)  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[HeadObatUgd] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadOKobat


CREATE TABLE [dbo].[HeadOKobat] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Jam] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalBiaya] float(53)  NULL,
  [TotalDinas] float(53)  NULL,
  [TotalUmum] float(53)  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdGudang] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [VCode] int  NULL,
  [Verifikasi] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[HeadOKobat] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadOrder


CREATE TABLE [dbo].[HeadOrder] (
  [NOPo] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [TglPO] datetime  NULL,
  [TglKirim] datetime  NULL,
  [DueDate] datetime  NULL,
  [TermOP] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SMCode] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Memo] nvarchar(240) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jumlah] float(53)  NULL,
  [Disc] real  NULL,
  [JmlDisc] float(53)  NULL,
  [Ppn] int  NULL,
  [JmlPpn] float(53)  NULL,
  [Materai] float(53)  NULL,
  [Total] float(53)  NULL,
  [Otor] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [AsalDana] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [varuser] varbinary(max)  NULL,
  [vargroup] varbinary(max)  NULL,
  [TrGroup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS DEFAULT ('OPEN') NULL
)
GO

ALTER TABLE [dbo].[HeadOrder] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadProduksi


CREATE TABLE [dbo].[HeadProduksi] (
  [NoProduksi] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Keterangan] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KodeObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaObat] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kemasan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Satuan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Qty] real  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Otor] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [trgroup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[HeadProduksi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadRetApotik


CREATE TABLE [dbo].[HeadRetApotik] (
  [BLCode] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [BLDate] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoResep] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglResep] datetime  NULL,
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] int  NULL,
  [JumlahBiaya] money  NULL,
  [JenisBayar] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalData] datetime  NULL,
  [KdDepo] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[HeadRetApotik] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadRetFaktur


CREATE TABLE [dbo].[HeadRetFaktur] (
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [NoPO] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglPO] datetime  NULL,
  [smcode] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoDO] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglDO] datetime  NULL,
  [Status] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Otor] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jumlah] float(53)  NULL,
  [Ppn] real  NULL,
  [NilaiPpn] float(53)  NULL,
  [Materai] float(53)  NULL,
  [TotalRetur] float(53)  NULL,
  [TrGroup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[HeadRetFaktur] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadRRobat


CREATE TABLE [dbo].[HeadRRobat] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Jam] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalBiaya] float(53)  NULL,
  [TotalDinas] float(53)  NULL,
  [TotalUmum] float(53)  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdGudang] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [VCode] int  NULL,
  [Verifikasi] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[HeadRRobat] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadSaldoAwal


CREATE TABLE [dbo].[HeadSaldoAwal] (
  [NoSLDA] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Type] int  NULL,
  [CoaId] int  NULL,
  [SMCode] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [NODO] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalHarga] money  NULL,
  [Discount] float(53)  NULL,
  [DiscountDate] float(53)  NULL,
  [DueDate] real  NULL,
  [DendaKeterlambatan] float(53)  NULL,
  [is_posted] int  NULL,
  [trx_lunas] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_by] int  NULL,
  [updated_by] int  NULL
)
GO

ALTER TABLE [dbo].[HeadSaldoAwal] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadTarifOk


CREATE TABLE [dbo].[HeadTarifOk] (
  [DeskripsiTarif] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tarif] money  NULL,
  [KDDetail] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTarif] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[HeadTarifOk] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HeadTerima


CREATE TABLE [dbo].[HeadTerima] (
  [NoBPB] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [NOPo] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglPO] datetime  NULL,
  [SMCode] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NODO] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglDO] datetime  NULL,
  [JumlahHarga] money  NULL,
  [Discount] real  NULL,
  [JmlDiscount] money  NULL,
  [Materai] money  NULL,
  [Ppn] int  NULL,
  [JmlPpn] money  NULL,
  [TotalHarga] money  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [AsalDana] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TrGroup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Otor] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [is_posted] int DEFAULT ((0)) NULL,
  [trx_lunas] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[HeadTerima] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for HisStock


CREATE TABLE [dbo].[HisStock] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [tanggal] datetime  NULL,
  [trans] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdObat] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [STAkhir] real  NULL,
  [KdDepo] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [STin] real DEFAULT ((0)) NULL,
  [STout] real DEFAULT ((0)) NULL
)
GO

ALTER TABLE [dbo].[HisStock] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for indikator_mutu_poli_mata


CREATE TABLE [dbo].[indikator_mutu_poli_mata] (
  [tipe_dokumen] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_reg] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nama_pasien] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [medrec] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [endof] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [cp] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jadwal] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tunda] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ods] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [klarifikasi] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ktd] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [id] int  IDENTITY(1,1) NOT NULL,
  [patuh] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tanggal] date  NULL,
  [jml] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [sentinel] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kpc] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[indikator_mutu_poli_mata] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for InetService


CREATE TABLE [dbo].[InetService] (
  [NAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [OWNERNAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [INTERFACENAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TARGETNAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TARGETADDRESS] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PORTNO] bigint  NULL,
  [PROTOCOL] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PROTOCOLVERSION] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [THRESHOLDNAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [APPLYTHRESHOLDOVER] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TIMEOUT] bigint  NULL
)
GO

ALTER TABLE [dbo].[InetService] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for InstanceDetails


CREATE TABLE [dbo].[InstanceDetails] (
  [RESOURCENAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [COMPONENTNAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [VERSION] varchar(17) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [STARTUPTIME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CREATED] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [OPENMODE] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [LOGMODE] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [COLLECTIONTIME] bigint  NOT NULL
)
GO

ALTER TABLE [dbo].[InstanceDetails] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for InstanceStatus


CREATE TABLE [dbo].[InstanceStatus] (
  [RESOURCENAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [COMPONENTNAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [DBSIZE] bigint  NULL,
  [AVGEXECS] bigint  NULL,
  [AVGUSERS] bigint  NULL,
  [NOOFREADS] bigint  NULL,
  [WRITES] bigint  NULL,
  [BLOCKSIZE] bigint  NULL,
  [COLLECTIONTIME] bigint  NOT NULL
)
GO

ALTER TABLE [dbo].[InstanceStatus] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for IpAddress


CREATE TABLE [dbo].[IpAddress] (
  [NAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [PARENTNODE] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [PARENTNET] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [OWNERNAME] varchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[IpAddress] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for jadwal_operasi


CREATE TABLE [dbo].[jadwal_operasi] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [kode_booking] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [tanggal_operasi] date  NOT NULL,
  [jenis_tindakan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [kode_poli] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [kode_poli_bpjs] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [nama_poli] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [kode_dokter] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [kode_dpjp] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [nama_dokter] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [terlaksana] int  NOT NULL,
  [nomor_peserta] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[jadwal_operasi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for KasirApotik


CREATE TABLE [dbo].[KasirApotik] (
  [BlCode] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [BLDate] datetime  NULL,
  [Jam] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JumlahBiaya] float(53)  NULL,
  [Ppn] real  NULL,
  [JumlahPpn] float(53)  NULL,
  [JumlahOngkos] float(53)  NULL,
  [JumlahDiscount] float(53)  NULL,
  [TotalTagihan] float(53)  NULL,
  [JumlahUang] float(53)  NULL,
  [Kembalian] float(53)  NULL,
  [TerimaDari] nvarchar(60) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JenisBayar] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalData] datetime  NULL,
  [Verifikasi] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidData] int  NULL
)
GO

ALTER TABLE [dbo].[KasirApotik] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for KasirBebas


CREATE TABLE [dbo].[KasirBebas] (
  [BLCode] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [BLDate] datetime  NULL,
  [Jam] datetime  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmDokter] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JumlahBiaya] float(53)  NULL,
  [BiayaKemasan] float(53)  NULL,
  [BiayaRacikan] float(53)  NULL,
  [BiayaPatent] float(53)  NULL,
  [TotalTagihan] float(53)  NULL,
  [Discount] float(53)  NULL,
  [NoResep] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglResep] datetime  NULL,
  [TglAkhir] datetime  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalData] datetime  NULL,
  [JumlahUang] float(53)  NULL,
  [Kembalian] float(53)  NULL,
  [KdDepo] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalKasir] datetime  NULL
)
GO

ALTER TABLE [dbo].[KasirBebas] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for KasirIRJ


CREATE TABLE [dbo].[KasirIRJ] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NoKwitansi] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalBiaya] float(53)  NULL,
  [Keringanan] float(53)  NULL,
  [SelisihBiaya] float(53)  NULL,
  [TotalTagihan] float(53)  NULL,
  [TotalDinas] float(53)  NULL,
  [TotalUmum] float(53)  NULL,
  [TerimaDari] nvarchar(60) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JenisBayar] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [VCode] int  NULL,
  [Verifikasi] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidData] int  NULL,
  [BayarCash] money  NULL,
  [BayarKartu] money  NULL,
  [ProsenKartu] money  NULL,
  [TotalKartu] money  NULL,
  [JenisKartu] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BayarKartu_sc] money  NULL,
  [ProsenKartu_sc] money  NULL,
  [JenisKartu_sc] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [FasilitasDK] int  NULL,
  [KodeDK] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JenisBayarTT] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalTT] money  NULL,
  [JenisBayarSB] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalSB] money  NULL,
  [JamTransaksi] time(7)  NULL,
  [Id_Kwitansi] char(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[KasirIRJ] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for KasirIrna


CREATE TABLE [dbo].[KasirIrna] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoKwitansi] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglPulang] datetime  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [LamaDirawat] int  NULL,
  [RuangRawat] float(53)  NULL,
  [JumlahBiaya] float(53)  NULL,
  [Prosen] real  NULL,
  [Administrasi] float(53)  NULL,
  [Keringanan] float(53)  NULL,
  [SelisihBiaya] float(53)  NULL,
  [TotalBiaya] float(53)  NULL,
  [UangMuka] float(53)  NULL,
  [TotalTagihan] float(53)  NULL,
  [TotalDinas] float(53)  NULL,
  [TotalUmum] float(53)  NULL,
  [TerimaDari] nvarchar(60) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JenisBayar] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Otor] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Lokasi] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalData] datetime  NULL,
  [JenisKartu] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JenisKartu_Sc] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BayarCash] money  NULL,
  [BayarKartu] money  NULL,
  [BayarKartu_Sc] money  NULL,
  [ProsenKartu] money  NULL,
  [ProsenKartu_Sc] money  NULL,
  [TotalKartu] money  NULL,
  [FasilitasDK] int  NULL,
  [KodeDK] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JenisBayarTT] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalTT] money  NULL,
  [JenisBayarSB] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalSB] money  NULL,
  [AsuhanGizi] float(53)  NULL,
  [TanggungBPJS] money  NULL,
  [ShareCosting] money  NULL,
  [Id_Kwitansi] char(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[KasirIrna] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for KasirIrna_


CREATE TABLE [dbo].[KasirIrna_] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoKwitansi] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglPulang] datetime  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [LamaDirawat] int  NULL,
  [RuangRawat] float(53)  NULL,
  [JumlahBiaya] float(53)  NULL,
  [Prosen] real  NULL,
  [Administrasi] float(53)  NULL,
  [Keringanan] float(53)  NULL,
  [SelisihBiaya] float(53)  NULL,
  [TotalBiaya] float(53)  NULL,
  [UangMuka] float(53)  NULL,
  [TotalTagihan] float(53)  NULL,
  [TotalDinas] float(53)  NULL,
  [TotalUmum] float(53)  NULL,
  [TerimaDari] nvarchar(60) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JenisBayar] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Otor] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Lokasi] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalData] datetime  NULL,
  [JenisKartu] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JenisKartu_Sc] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BayarCash] money  NULL,
  [BayarKartu] money  NULL,
  [BayarKartu_Sc] money  NULL,
  [ProsenKartu] money  NULL,
  [ProsenKartu_Sc] money  NULL,
  [TotalKartu] money  NULL,
  [FasilitasDK] int  NULL,
  [KodeDK] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JenisBayarTT] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalTT] money  NULL,
  [JenisBayarSB] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalSB] money  NULL,
  [AsuhanGizi] float(53)  NULL,
  [TanggungBPJS] money  NULL,
  [ShareCosting] money  NULL
)
GO

ALTER TABLE [dbo].[KasirIrna_] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for kejadian_readmisi_icu


CREATE TABLE [dbo].[kejadian_readmisi_icu] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [no_registrasi] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tgl_masuk] date  NULL,
  [nama] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_rm] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diagnosa] varchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [readmisi] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [keterangan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[kejadian_readmisi_icu] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for kepatuhan_pemberian_obat


CREATE TABLE [dbo].[kepatuhan_pemberian_obat] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [tanggal] date  NULL,
  [nm_profesi] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [bangsal] varchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jml_ins_teridentifikasi] int  NULL,
  [jml_telah_readback] int  NULL,
  [jml_ins_kesalahan] int  NULL
)
GO

ALTER TABLE [dbo].[kepatuhan_pemberian_obat] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for kepatuhan_pemberian_obat_high


CREATE TABLE [dbo].[kepatuhan_pemberian_obat_high] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [tanggal] date  NULL,
  [bangsal] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nama_obat] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [label_ha] char(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [keterangan] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[kepatuhan_pemberian_obat_high] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for kepatuhan_visite_dokter


CREATE TABLE [dbo].[kepatuhan_visite_dokter] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [tanggal] date  NULL,
  [no_registrasi] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nama] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_rm] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [bangsal] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diagnosa] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kepatuhan_visite] char(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [keterangan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[kepatuhan_visite_dokter] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for konf_banner


CREATE TABLE [dbo].[konf_banner] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [banner] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[konf_banner] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for konf_info_regis


CREATE TABLE [dbo].[konf_info_regis] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [nama] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [url] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_urut] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[konf_info_regis] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for konf_jadwal_dokter


CREATE TABLE [dbo].[konf_jadwal_dokter] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [KdDoc] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmDoc] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KdPoli] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmPoli] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [HariMulai] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [HariSelesai] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [JamMulai] time(7)  NOT NULL,
  [JamSelesai] time(7)  NOT NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[konf_jadwal_dokter] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for konf_kuota_poli


CREATE TABLE [dbo].[konf_kuota_poli] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [KdPoli] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmPoli] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Kuota] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[konf_kuota_poli] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for konfigurasi


CREATE TABLE [dbo].[konfigurasi] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [logo] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [nama_web] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [unit_rs] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [alamat_rs] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[konfigurasi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for laporan_kematian_igd


CREATE TABLE [dbo].[laporan_kematian_igd] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [no_registrasi] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tgl_masuk] date  NULL,
  [nama] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_rm] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jenis_kelamin] varchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [umur] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diagnosa] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [dpjp] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [penyebab] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [waktu] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tgl_pulang] date  NULL,
  [status_pasien] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[laporan_kematian_igd] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for laundryMasuk


CREATE TABLE [dbo].[laundryMasuk] (
  [KdLaundry] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [AsalRuangan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jenis] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Berat] float(53)  NULL,
  [TglMasuk] datetime  NULL,
  [Pengantar] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglKeluar] datetime  NULL,
  [Penerima] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [StatusAkhir] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KetStatusAkhir] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KetRuangan] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Validuser] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[laundryMasuk] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for laundryProses


CREATE TABLE [dbo].[laundryProses] (
  [KdLaundry] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[laundryProses] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for laundrySelesai


CREATE TABLE [dbo].[laundrySelesai] (
  [KdLaundry] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[laundrySelesai] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for log_stok_matkes


CREATE TABLE [dbo].[log_stok_matkes] (
  [created_at] datetime  NOT NULL,
  [id_unit] smallint  NOT NULL,
  [kode_barang] char(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [id_user] int  NOT NULL,
  [stok_barang] int DEFAULT ((0)) NOT NULL,
  [stok_minimum] int DEFAULT ((0)) NOT NULL,
  [stok_pakai] int DEFAULT ((0)) NOT NULL,
  [jumlah_b] int DEFAULT ((0)) NOT NULL,
  [jumlah_r] int DEFAULT ((0)) NOT NULL,
  [jumlah_rb] int DEFAULT ((0)) NOT NULL
)
GO

ALTER TABLE [dbo].[log_stok_matkes] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for log_stok_matum


CREATE TABLE [dbo].[log_stok_matum] (
  [created_at] datetime  NOT NULL,
  [id_unit] smallint  NOT NULL,
  [kode_barang] char(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [id_user] int  NOT NULL,
  [stok_barang] int DEFAULT ((0)) NOT NULL,
  [stok_minimum] int DEFAULT ((0)) NOT NULL,
  [stok_pakai] int DEFAULT ((0)) NOT NULL,
  [jumlah_b] int DEFAULT ((0)) NOT NULL,
  [jumlah_r] int DEFAULT ((0)) NOT NULL,
  [jumlah_rb] int DEFAULT ((0)) NOT NULL
)
GO

ALTER TABLE [dbo].[log_stok_matum] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for MailServer


CREATE TABLE [dbo].[MailServer] (
  [NAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [OWNERNAME] varchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [POPPORT] bigint  NULL,
  [MMESSAGE] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [USERNAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PASSWORD] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[MailServer] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for ManagedGroupObject


CREATE TABLE [dbo].[ManagedGroupObject] (
  [NAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[ManagedGroupObject] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for ManagedObject


CREATE TABLE [dbo].[ManagedObject] (
  [NAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [DISPLAYNAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [PARENTKEY] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [TYPE] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MANAGED] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [STATUS] bigint  NULL,
  [FAILURETHRESHOLD] bigint  NULL,
  [FAILURECOUNT] bigint  NULL,
  [POLLINTERVAL] bigint  NULL,
  [STATUSCHANGETIME] varchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [STATUSUPDATETIME] varchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TESTER] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UCLASS] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CLASSNAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [WEBNMS] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [OWNERNAME] varchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [STATUSPOLLENABLED] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ISCONTAINER] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ISGROUP] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[ManagedObject] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for MapName


CREATE TABLE [dbo].[MapName] (
  [MAPID] bigint  NOT NULL,
  [MAPNAME] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[MapName] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for master_bhp


CREATE TABLE [dbo].[master_bhp] (
  [kd_tarif] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [kd_obat] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[master_bhp] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for master_distribusi_jasa_dokter


CREATE TABLE [dbo].[master_distribusi_jasa_dokter] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [kd_tarif] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [kategori] int  NOT NULL,
  [persen_dokter] float(53) DEFAULT ('0') NOT NULL,
  [persen_paramedis] float(53) DEFAULT ('0') NOT NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[master_distribusi_jasa_dokter] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for master_distribusi_jasa_dokter_copy1


CREATE TABLE [dbo].[master_distribusi_jasa_dokter_copy1] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [kd_tarif] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [kategori] int  NOT NULL,
  [persen_dokter] float(53) DEFAULT ('0') NOT NULL,
  [persen_paramedis] float(53) DEFAULT ('0') NOT NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[master_distribusi_jasa_dokter_copy1] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for master_negara


CREATE TABLE [dbo].[master_negara] (
  [id_negara] int  NOT NULL,
  [nm_negara] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[master_negara] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for master_pengajuan


CREATE TABLE [dbo].[master_pengajuan] (
  [no_pengajuan] char(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [tanggal_pengajuan] date  NOT NULL,
  [id_pengaju] int  NOT NULL,
  [kode_status] tinyint  NOT NULL,
  [kode_material] tinyint  NOT NULL,
  [catatan_approval] varchar(1000) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [catatan_pengaju] varchar(1000) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tanggal_diajukan] datetime  NULL,
  [tanggal_disetujui_1] datetime  NULL,
  [tanggal_disetujui_2] datetime  NULL,
  [tanggal_disetujui_3] datetime  NULL,
  [tanggal_disetujui_4] datetime  NULL,
  [tanggal_ditolak] datetime  NULL,
  [tanggal_diterima] datetime  NULL,
  [no_urut] smallint  NOT NULL
)
GO

ALTER TABLE [dbo].[master_pengajuan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for master_role


CREATE TABLE [dbo].[master_role] (
  [id] smallint  IDENTITY(1,1) NOT NULL,
  [nama] varchar(64) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [label] varchar(64) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_at] datetime DEFAULT (getdate()) NOT NULL,
  [updated_at] datetime DEFAULT (getdate()) NOT NULL
)
GO

ALTER TABLE [dbo].[master_role] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for master_satuan_bmhp


CREATE TABLE [dbo].[master_satuan_bmhp] (
  [kode_barang] char(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [satuan_pakai] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nilai_satuan] int  NULL,
  [id_user] int  NOT NULL,
  [created_at] datetime DEFAULT (getdate()) NOT NULL,
  [updated_at] datetime DEFAULT (getdate()) NOT NULL,
  [digunakan] tinyint  NULL
)
GO

ALTER TABLE [dbo].[master_satuan_bmhp] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for master_satuan_matkes


CREATE TABLE [dbo].[master_satuan_matkes] (
  [kode_barang] char(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [satuan_pakai] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nilai_satuan] int  NULL,
  [id_user] int  NOT NULL,
  [created_at] datetime DEFAULT (getdate()) NOT NULL,
  [updated_at] datetime DEFAULT (getdate()) NOT NULL,
  [digunakan] tinyint  NULL
)
GO

ALTER TABLE [dbo].[master_satuan_matkes] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for master_satuan_matum


CREATE TABLE [dbo].[master_satuan_matum] (
  [kode_barang] char(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [satuan_pakai] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nilai_satuan] int  NULL,
  [id_user] int  NOT NULL,
  [created_at] datetime DEFAULT (getdate()) NOT NULL,
  [updated_at] datetime DEFAULT (getdate()) NOT NULL,
  [digunakan] tinyint  NULL
)
GO

ALTER TABLE [dbo].[master_satuan_matum] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for master_stok_bmhp


CREATE TABLE [dbo].[master_stok_bmhp] (
  [id_unit] smallint  NOT NULL,
  [kode_barang] char(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [stok_barang] int DEFAULT ((0)) NOT NULL,
  [stok_minimum] int  NULL,
  [stok_pakai] int  NULL,
  [jumlah_b] int DEFAULT ((0)) NOT NULL,
  [jumlah_r] int DEFAULT ((0)) NOT NULL,
  [jumlah_rb] int DEFAULT ((0)) NOT NULL,
  [stok_pengeluaran] bigint DEFAULT ((0)) NOT NULL,
  [stok_penerimaan] bigint DEFAULT ((0)) NOT NULL,
  [stok_terakhir] bigint DEFAULT ((0)) NOT NULL
)
GO

ALTER TABLE [dbo].[master_stok_bmhp] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for master_stok_matkes


CREATE TABLE [dbo].[master_stok_matkes] (
  [id_unit] smallint  NOT NULL,
  [kode_barang] char(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [stok_barang] int DEFAULT ((0)) NOT NULL,
  [stok_minimum] int  NULL,
  [stok_pakai] int  NULL,
  [jumlah_b] int DEFAULT ((0)) NOT NULL,
  [jumlah_r] int DEFAULT ((0)) NOT NULL,
  [jumlah_rb] int DEFAULT ((0)) NOT NULL,
  [stok_pengeluaran] bigint DEFAULT ((0)) NOT NULL,
  [stok_penerimaan] bigint DEFAULT ((0)) NOT NULL,
  [stok_terakhir] bigint DEFAULT ((0)) NOT NULL
)
GO

ALTER TABLE [dbo].[master_stok_matkes] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for master_stok_matum


CREATE TABLE [dbo].[master_stok_matum] (
  [id_unit] smallint  NOT NULL,
  [kode_barang] char(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [stok_barang] int DEFAULT ((0)) NOT NULL,
  [stok_minimum] int  NULL,
  [stok_pakai] int  NULL,
  [jumlah_b] int DEFAULT ((0)) NOT NULL,
  [jumlah_r] int DEFAULT ((0)) NOT NULL,
  [jumlah_rb] int DEFAULT ((0)) NOT NULL,
  [stok_pengeluaran] bigint DEFAULT ((0)) NOT NULL,
  [stok_penerimaan] bigint DEFAULT ((0)) NOT NULL,
  [stok_terakhir] bigint DEFAULT ((0)) NOT NULL
)
GO

ALTER TABLE [dbo].[master_stok_matum] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for master_unit


CREATE TABLE [dbo].[master_unit] (
  [id] smallint  IDENTITY(1,1) NOT NULL,
  [nama] varchar(64) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [tingkat] tinyint  NULL,
  [created_at] datetime DEFAULT (getdate()) NULL,
  [updated_at] datetime DEFAULT (getdate()) NULL,
  [id_unit_induk] smallint  NULL,
  [persediaan_set] tinyint DEFAULT ((7)) NOT NULL
)
GO

ALTER TABLE [dbo].[master_unit] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for master_user


CREATE TABLE [dbo].[master_user] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [username] varchar(64) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [password_hash] char(60) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [id_role] smallint  NOT NULL,
  [id_unit] smallint  NULL,
  [created_at] datetime DEFAULT (getdate()) NULL,
  [updated_at] datetime DEFAULT (getdate()) NULL,
  [active] tinyint DEFAULT ((1)) NOT NULL,
  [nama] varchar(64) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[master_user] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for MasterGudang


CREATE TABLE [dbo].[MasterGudang] (
  [GudangCode] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [GudangName] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdRrawat] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[MasterGudang] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for MasterJabatan


CREATE TABLE [dbo].[MasterJabatan] (
  [id_jabatan] int  NOT NULL,
  [nama_jabatan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[MasterJabatan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for MasterObat


CREATE TABLE [dbo].[MasterObat] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS DEFAULT ((0)) NOT NULL,
  [NmObat] nvarchar(70) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MGroup] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MJenis] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MType] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] int  NULL,
  [Kemasan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Satuan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Komposisi] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Indikasi] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPrincipal] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SMinimum] int  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [IsiBox] int  NULL,
  [discount] real  NULL,
  [KdAcc] nvarchar(16) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [izinedar] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [expdate] datetime  NULL,
  [retriksi] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [obatkronis] int  NULL,
  [kdtuju] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdkategori] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [antibiotik] int  NULL,
  [obat_be] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmAlias] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[MasterObat] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for MasterObat_copy


CREATE TABLE [dbo].[MasterObat_copy] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS DEFAULT ((0)) NOT NULL,
  [NmObat] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MGroup] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MJenis] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MType] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] int  NULL,
  [Kemasan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Satuan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Komposisi] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Indikasi] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPrincipal] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SMinimum] int  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [IsiBox] int  NULL,
  [discount] real  NULL,
  [KdAcc] nvarchar(16) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [izinedar] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [expdate] datetime  NULL,
  [retriksi] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [obatkronis] int  NULL,
  [kdtuju] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdkategori] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [antibiotik] int  NULL,
  [obat_be] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmAlias] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[MasterObat_copy] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for MasterPS


CREATE TABLE [dbo].[MasterPS] (
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Firstname] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Pod] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Bod] datetime  NULL,
  [UmurThn] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurBln] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurHr] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [GolDarah] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RHDarah] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [WargaNegara] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoIden] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Perkawinan] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Agama] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Pendidikan] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaAyah] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaIbu] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [AskesNo] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglDaftar] datetime  NULL,
  [Address] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [City] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Propinsi] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kecamatan] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kelurahan] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPos] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Phone] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmUnit] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NrpNip] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKesatuan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmGol] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPangkat] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Pekerjaan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKorp] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaPJ] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [HubunganPJ] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PekerjaanPJ] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PhonePJ] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [AlamatPJ] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [GroupUnit] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [GroupPangkat] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [StatusKelDinas] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaKelDinas] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelurahan] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmSuku] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdSex] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keyakinan] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [McuInstansi] nvarchar(11) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [McuUnit] nvarchar(11) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Deleted] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SubUnit] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[MasterPS] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for MasterPS1


CREATE TABLE [dbo].[MasterPS1] (
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Pod] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Bod] datetime  NULL,
  [UmurThn] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurBln] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurHr] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [GolDarah] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RHDarah] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [WargaNegara] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoIden] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Perkawinan] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Agama] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Pendidikan] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaAyah] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaIbu] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [AskesNo] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglDaftar] datetime  NULL,
  [Address] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [City] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Propinsi] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kecamatan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kelurahan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPos] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Phone] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmUnit] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NrpNip] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKesatuan] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmGol] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPangkat] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Pekerjaan] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKorp] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaPJ] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [HubunganPJ] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PekerjaanPJ] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PhonePJ] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [AlamatPJ] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[MasterPS1] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for MasterPSold


CREATE TABLE [dbo].[MasterPSold] (
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Pod] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Bod] datetime  NULL,
  [UmurThn] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurBln] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurHr] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [GolDarah] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RHDarah] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [WargaNegara] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoIden] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Perkawinan] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Agama] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Pendidikan] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaAyah] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaIbu] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [AskesNo] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglDaftar] datetime  NULL,
  [Address] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [City] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Propinsi] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kecamatan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kelurahan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPos] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Phone] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmUnit] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NrpNip] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKesatuan] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmGol] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPangkat] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Pekerjaan] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKorp] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaPJ] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [HubunganPJ] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PekerjaanPJ] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PhonePJ] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [AlamatPJ] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [GroupUnit] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [GroupPangkat] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [StatusKelDinas] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaKelDinas] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelurahan] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmSuku] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdSex] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keyakinan] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[MasterPSold] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for medrecIRJ


CREATE TABLE [dbo].[medrecIRJ] (
  [Regno] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [RegDate] datetime  NULL,
  [RegTime] datetime  NULL,
  [Medrec] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglLahir] datetime  NULL,
  [UmurTahun] int  NULL,
  [UmurBulan] int  NULL,
  [UmurHari] int  NULL,
  [KDPoli] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KDDoc] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kasus] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Catatan] nvarchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoSkp] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[medrecIRJ] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for medrecIRJ_


CREATE TABLE [dbo].[medrecIRJ_] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [RegDate] datetime  NULL,
  [RegTime] datetime  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglLahir] datetime  NULL,
  [UmurTahun] int  NULL,
  [UmurBulan] int  NULL,
  [UmurHari] int  NULL,
  [KDPoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KDDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kasus] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Catatan] nvarchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoSkp] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[medrecIRJ_] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for medrecIRNA


CREATE TABLE [dbo].[medrecIRNA] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [RegDate] datetime  NULL,
  [RegTime] datetime  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglLahir] datetime  NULL,
  [UmurTahun] int  NULL,
  [UmurBulan] int  NULL,
  [UmurHari] int  NULL,
  [Domisili] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kdbangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tglkeluar] datetime  NULL,
  [Jamkeluar] datetime  NULL,
  [Lama] int  NULL,
  [Statuskeluar] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoSkp] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[medrecIRNA] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for medrecIRNA_


CREATE TABLE [dbo].[medrecIRNA_] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [RegDate] datetime  NULL,
  [RegTime] datetime  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglLahir] datetime  NULL,
  [UmurTahun] int  NULL,
  [UmurBulan] int  NULL,
  [UmurHari] int  NULL,
  [Domisili] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kdbangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tglkeluar] datetime  NULL,
  [Jamkeluar] datetime  NULL,
  [Lama] int  NULL,
  [Statuskeluar] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoSkp] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[medrecIRNA_] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for Mesin_lab


CREATE TABLE [dbo].[Mesin_lab] (
  [nm_mesin] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nm_function] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[Mesin_lab] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for METRACK


CREATE TABLE [dbo].[METRACK] (
  [NAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [VALUE] varchar(5000) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[METRACK] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for migrations


CREATE TABLE [dbo].[migrations] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [migration] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [batch] int  NOT NULL
)
GO

ALTER TABLE [dbo].[migrations] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for modul_menyusui


CREATE TABLE [dbo].[modul_menyusui] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [tanggal] date  NULL,
  [no_registrasi] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_rm] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nama] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diagnosa] varchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [asi_eksklusif] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tanggal_asi] date  NULL,
  [keterangan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[modul_menyusui] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for modul_section_cesar


CREATE TABLE [dbo].[modul_section_cesar] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [tgl_persalinan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_registrasi] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_rm] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nama] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [umur] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kddropr] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [indikasi] varchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jml_primigravida] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [keterangan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[modul_section_cesar] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for MonitoringKontrak


CREATE TABLE [dbo].[MonitoringKontrak] (
  [Id] int  IDENTITY(1,1) NOT NULL,
  [Satker] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CANNumber] nvarchar(22) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SMCode] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SMName] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UploadDate] datetime  NULL,
  [ContrackDate] datetime  NULL,
  [DueDate] nvarchar(80) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SPKNumber] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [DescriptionContrack] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [StartDate] datetime  NULL,
  [EndDate] datetime  NULL,
  [ContrackValue] money  NULL,
  [RealizionValue] money  NULL,
  [ResidualValue] money  NULL,
  [SubmissionDate] datetime  NULL,
  [CoaId] int  NULL,
  [trx_stragering] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[MonitoringKontrak] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for NilaiApotekTmp


CREATE TABLE [dbo].[NilaiApotekTmp] (
  [Regno] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Nilai] float(53)  NULL,
  [ValidUser] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[NilaiApotekTmp] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for Node


CREATE TABLE [dbo].[Node] (
  [NAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [ISROUTER] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [OWNERNAME] varchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[Node] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for NoDokter


CREATE TABLE [dbo].[NoDokter] (
  [DRCode] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Nomor] float(53)  NULL
)
GO

ALTER TABLE [dbo].[NoDokter] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for NoMasterObat


CREATE TABLE [dbo].[NoMasterObat] (
  [NTCode] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Nomor] float(53)  NULL
)
GO

ALTER TABLE [dbo].[NoMasterObat] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for NoMasterObatold


CREATE TABLE [dbo].[NoMasterObatold] (
  [NTCode] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Nomor] float(53)  NULL
)
GO

ALTER TABLE [dbo].[NoMasterObatold] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for NomorLaboratorium


CREATE TABLE [dbo].[NomorLaboratorium] (
  [NoLaborat] nvarchar(11) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Nomor] float(53)  NULL
)
GO

ALTER TABLE [dbo].[NomorLaboratorium] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for NomorPatologi


CREATE TABLE [dbo].[NomorPatologi] (
  [NoLaborat] nvarchar(11) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Nomor] float(53)  NULL
)
GO

ALTER TABLE [dbo].[NomorPatologi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for NoSupplier


CREATE TABLE [dbo].[NoSupplier] (
  [Kode] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Nomor] int  NULL
)
GO

ALTER TABLE [dbo].[NoSupplier] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for NoTransaksi


CREATE TABLE [dbo].[NoTransaksi] (
  [NTCode] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Nomor] float(53)  NULL,
  [NoBukti] float(53)  NULL,
  [NOJurnal] int  NULL
)
GO

ALTER TABLE [dbo].[NoTransaksi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for oauth_access_tokens


CREATE TABLE [dbo].[oauth_access_tokens] (
  [id] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [user_id] bigint  NULL,
  [client_id] bigint  NOT NULL,
  [name] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [scopes] nvarchar(max) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [revoked] bit  NOT NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL,
  [expires_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[oauth_access_tokens] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for oauth_auth_codes


CREATE TABLE [dbo].[oauth_auth_codes] (
  [id] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [user_id] bigint  NOT NULL,
  [client_id] bigint  NOT NULL,
  [scopes] nvarchar(max) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [revoked] bit  NOT NULL,
  [expires_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[oauth_auth_codes] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for oauth_clients


CREATE TABLE [dbo].[oauth_clients] (
  [id] bigint  IDENTITY(1,1) NOT NULL,
  [user_id] bigint  NULL,
  [name] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [secret] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [provider] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [redirect] nvarchar(max) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [personal_access_client] bit  NOT NULL,
  [password_client] bit  NOT NULL,
  [revoked] bit  NOT NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[oauth_clients] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for oauth_personal_access_clients


CREATE TABLE [dbo].[oauth_personal_access_clients] (
  [id] bigint  IDENTITY(1,1) NOT NULL,
  [client_id] bigint  NOT NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[oauth_personal_access_clients] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for oauth_refresh_tokens


CREATE TABLE [dbo].[oauth_refresh_tokens] (
  [id] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [access_token_id] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [revoked] bit  NOT NULL,
  [expires_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[oauth_refresh_tokens] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for OpnameApotik


CREATE TABLE [dbo].[OpnameApotik] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Periode] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [NoKartu] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Stock] real  NULL,
  [SKartu] real  NULL,
  [Selisih] real  NULL,
  [VStatus] int  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDepo] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [sfisik] real  NULL,
  [ssistem] real  NULL,
  [nobatch] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [expdate] datetime2(7)  NULL,
  [cstatus] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [trgroup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[OpnameApotik] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for OpnameFarmasi


CREATE TABLE [dbo].[OpnameFarmasi] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Periode] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [NoKartu] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Stock] real  NULL,
  [SKartu] real  NULL,
  [Selisih] real  NULL,
  [VStatus] int  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [sfisik] real  NULL,
  [ssistem] real  NULL,
  [nobatch] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [expdate] datetime  NULL,
  [cstatus] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [trgroup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[OpnameFarmasi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for OpnameFarmasi_kosong


CREATE TABLE [dbo].[OpnameFarmasi_kosong] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Periode] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [NoKartu] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Stock] real  NULL,
  [SKartu] real  NULL,
  [Selisih] real  NULL,
  [VStatus] int  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [sfisik] real  NULL,
  [ssistem] real  NULL,
  [nobatch] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [expdate] datetime  NULL,
  [cstatus] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [trgroup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[OpnameFarmasi_kosong] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for OpnameFarmasi_ori


CREATE TABLE [dbo].[OpnameFarmasi_ori] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Periode] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [NoKartu] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Stock] real  NULL,
  [SKartu] real  NULL,
  [Selisih] real  NULL,
  [VStatus] int  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [sfisik] real  NULL,
  [ssistem] real  NULL,
  [nobatch] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [expdate] datetime  NULL,
  [cstatus] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [trgroup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[OpnameFarmasi_ori] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for OpnameGudangBesar


CREATE TABLE [dbo].[OpnameGudangBesar] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Periode] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [NoKartu] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Stock] real  NULL,
  [SKartu] real  NULL,
  [Selisih] real  NULL,
  [VStatus] int  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [sfisik] real  NULL,
  [ssistem] real  NULL,
  [nobatch] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [expdate] datetime  NULL,
  [cstatus] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [trgroup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[OpnameGudangBesar] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for OpnameRawatJalan


CREATE TABLE [dbo].[OpnameRawatJalan] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Periode] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [Lokasi] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoKartu] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Stock] real  NULL,
  [SKartu] real  NULL,
  [Selisih] real  NULL,
  [VStatus] int  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[OpnameRawatJalan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for OpnameUGD


CREATE TABLE [dbo].[OpnameUGD] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Periode] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [NoKartu] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Stock] real  NULL,
  [SKartu] real  NULL,
  [Selisih] real  NULL,
  [VStatus] int  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[OpnameUGD] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for PanelProps


CREATE TABLE [dbo].[PanelProps] (
  [NODEID] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [USERNAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [ATTRIBNAME] varchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [ATTRIBVALUE] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[PanelProps] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for PanelTree


CREATE TABLE [dbo].[PanelTree] (
  [NODEID] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NODETYPE] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [USERNAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [PARENT] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PREVIOUSNODE] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MODULENAME] varchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[PanelTree] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for Pasien_Cedera_Kepala


CREATE TABLE [dbo].[Pasien_Cedera_Kepala] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [Tanggal] date  NULL,
  [Medrec] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPasien] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Prosen] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Ckr] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Cks] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Ckb] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Ckrct] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Cksct] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Ckbct] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoReg] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[Pasien_Cedera_Kepala] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for pasien_stroke_idh


CREATE TABLE [dbo].[pasien_stroke_idh] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [tanggal] date  NULL,
  [no_registrasi] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nama] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_rm] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diagnosa] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [bangsal] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [rehabilitasi_medis] char(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tgl_mulai] date  NULL
)
GO

ALTER TABLE [dbo].[pasien_stroke_idh] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for password_resets


CREATE TABLE [dbo].[password_resets] (
  [email] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [token] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [created_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[password_resets] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for payments_data


CREATE TABLE [dbo].[payments_data] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [billing_id] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [rrn] float(53)  NOT NULL,
  [nama] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [alamat] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [nomor_kunjungan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [tanggal_pembayaran] datetime  NOT NULL,
  [nilai] float(53)  NOT NULL,
  [status_pembayaran] int  NOT NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[payments_data] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for pelaksanaan_stdr_identifikasi


CREATE TABLE [dbo].[pelaksanaan_stdr_identifikasi] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [tanggal] date  NULL,
  [no_registrasi] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nama] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_rm] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [bangsal] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [prosedur_identifikasi] char(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[pelaksanaan_stdr_identifikasi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for pelaksanaan_stdr_pmberian_identitas


CREATE TABLE [dbo].[pelaksanaan_stdr_pmberian_identitas] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [tanggal] date  NULL,
  [no_registrasi] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nama] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_rm] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [prosedur_identifikasi] char(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [keterangan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[pelaksanaan_stdr_pmberian_identitas] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for PembayaranLayananLainnya


CREATE TABLE [dbo].[PembayaranLayananLainnya] (
  [Id] int  IDENTITY(1,1) NOT NULL,
  [Regno] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Medrec] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nama] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regdate] datetime  NULL,
  [Pembayaran] float(53)  NULL,
  [KdKategoriPasien] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDokter] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJenisBayar] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglPembayaran] datetime  NULL,
  [KdJenisPelayanan] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CreateAt] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UpdateAt] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DeleteAt] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [displayname] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[PembayaranLayananLainnya] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for PembayaranTransfer


CREATE TABLE [dbo].[PembayaranTransfer] (
  [NoTran] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [NoKasir] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regno] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Medrec] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [AsalPasien] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JenisBayar] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MediaBayar] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoKartu] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JumlahPembayaran] float(53)  NULL,
  [Shift] varchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[PembayaranTransfer] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for penandaan_risk_jatuh_tinggi


CREATE TABLE [dbo].[penandaan_risk_jatuh_tinggi] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [tanggal] date  NULL,
  [no_registrasi] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nama] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_rm] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [bangsal] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [resiko_jatuh] char(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [terpasang_gelang] char(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diagnosa] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tindak_lanjut] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[penandaan_risk_jatuh_tinggi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for penandaan_sisi_lokasi_opr


CREATE TABLE [dbo].[penandaan_sisi_lokasi_opr] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [tanggal] date  NULL,
  [no_registrasi] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nama] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_rm] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [bangsal] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jml_tindakan_opr] int  NULL,
  [jml_dilakukan_prosedur] int  NULL
)
GO

ALTER TABLE [dbo].[penandaan_sisi_lokasi_opr] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for pending_task_id_update


CREATE TABLE [dbo].[pending_task_id_update] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [kode_booking] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [task_id] int  NOT NULL,
  [time] bigint  NOT NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[pending_task_id_update] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for PendingTasks


CREATE TABLE [dbo].[PendingTasks] (
  [USERNAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TASKNAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SUBTASKNAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DEVICENAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [STATUS] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PORT] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RETRIES] bigint  NULL,
  [TIMEOUT] bigint  NULL,
  [AINDEX] bigint  NULL,
  [EXECUTIONID] bigint  NULL
)
GO

ALTER TABLE [dbo].[PendingTasks] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for pengajuan_spri


CREATE TABLE [dbo].[pengajuan_spri] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [no_kartu] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [nama] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kelamin] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tanggal_lahir] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kode_dokter] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [nama_dokter] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [poli_kontrol] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [tanggal_rencana_kontrol] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [no_spri] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nama_diagnosa] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [user] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL,
  [regno] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[pengajuan_spri] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for personal_access_tokens


CREATE TABLE [dbo].[personal_access_tokens] (
  [id] bigint  IDENTITY(1,1) NOT NULL,
  [tokenable_type] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [tokenable_id] bigint  NOT NULL,
  [name] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [token] nvarchar(64) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [abilities] nvarchar(max) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [last_used_at] datetime  NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[personal_access_tokens] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for PMS_menu


CREATE TABLE [dbo].[PMS_menu] (
  [menu_id] int  NOT NULL,
  [menu_title] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [url] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [position] char(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [parent_id] int  NULL,
  [is_parent] int  NULL,
  [show_menu] char(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [icon] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[PMS_menu] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for PMS_role


CREATE TABLE [dbo].[PMS_role] (
  [id_role] int  NOT NULL,
  [role] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [role_desc] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [is_active] char(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[PMS_role] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for PMS_role_menu


CREATE TABLE [dbo].[PMS_role_menu] (
  [id] int  NOT NULL,
  [id_role] int  NULL,
  [id_menu] int  NULL
)
GO

ALTER TABLE [dbo].[PMS_role_menu] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for PMS_role_user


CREATE TABLE [dbo].[PMS_role_user] (
  [id] int  NOT NULL,
  [id_user] int  NULL,
  [id_role] int  NULL
)
GO

ALTER TABLE [dbo].[PMS_role_user] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for PMS_user


CREATE TABLE [dbo].[PMS_user] (
  [Name] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Username] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [password] varchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [id_user] int  NOT NULL
)
GO

ALTER TABLE [dbo].[PMS_user] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for PolicyActionCondition


CREATE TABLE [dbo].[PolicyActionCondition] (
  [NAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [OBJKEY] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [POLICYACTION] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [POLICYCONDITION] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[PolicyActionCondition] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for PolicyObject


CREATE TABLE [dbo].[PolicyObject] (
  [NAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [GROUPNAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [STATUS] bigint  NULL,
  [PERIOD] bigint  NULL,
  [POLICYOBJECTCUSTOMIZER] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [HELPURL] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[PolicyObject] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for PolicyScheduleTime


CREATE TABLE [dbo].[PolicyScheduleTime] (
  [TIMEKEY] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NAME] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[PolicyScheduleTime] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for POLItpp


CREATE TABLE [dbo].[POLItpp] (
  [KDPoli] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [GRUP] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NMPoli] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTuju] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBPJS] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdGroupPemeriksaan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdMapping] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Pict] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDepo] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[POLItpp] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for PPIIPCLN


CREATE TABLE [dbo].[PPIIPCLN] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Regdate] datetime  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdICD] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KulturDarah] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KulturSputum] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KulturUrine] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KulturPus] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [AntiBiotik] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TindakanETT] int  NULL,
  [TindakanCVL] int  NULL,
  [TindakanIVFD] int  NULL,
  [TindakanUC] int  NULL,
  [HaisIDO] int  NULL,
  [HaisVAP] int  NULL,
  [HaisIADP] int  NULL,
  [HaisISK] int  NULL,
  [InfeksiFLEBITIS] int  NULL,
  [InfeksiDECUBITUS] int  NULL,
  [Transfusi] int  NULL,
  [Microorganisme] int  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[PPIIPCLN] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for Printer


CREATE TABLE [dbo].[Printer] (
  [NAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [OWNERNAME] varchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [DEVICESTATUS] bigint  NULL,
  [PRINTERSTATUS] bigint  NULL,
  [PRINTERDETECTEDERRSTATUS] bigint  NULL,
  [CONSOLEDISPBUFFERTEXT] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[Printer] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for protokol_obat


CREATE TABLE [dbo].[protokol_obat] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [no_registration] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [kode_doctor_pengajuan] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [kode_doctor_ahli] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [qrcode_kepala] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [qrcode_ketua] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [qrcode_dokter] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [test_awal] datetime  NULL,
  [test_akhir] datetime  NULL
)
GO

ALTER TABLE [dbo].[protokol_obat] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for protokol_obat_detail


CREATE TABLE [dbo].[protokol_obat_detail] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [kode_obat] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [id_protokol_obat] int  NOT NULL,
  [quantity] float(53)  NOT NULL,
  [status] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[protokol_obat_detail] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for PT_PRODUK


CREATE TABLE [dbo].[PT_PRODUK] (
  [I_Produk] int  NOT NULL,
  [N_Produk] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [I_ProdukMaster] int  NULL,
  [C_Sts_TenagaMedis] char(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [I_Entry] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [D_Entry] datetime  NULL,
  [IsTindakanMedis] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [IsHargaBisaDiUbah] char(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [IsPrioritas] int  NULL
)
GO

ALTER TABLE [dbo].[PT_PRODUK] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for PT_PRODUKCOMPONENT


CREATE TABLE [dbo].[PT_PRODUKCOMPONENT] (
  [I_ProdukComponent] int  NOT NULL,
  [N_ProdukComponent] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [I_JenisComponent] tinyint  NULL,
  [I_Entry] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [D_Entry] datetime  NULL
)
GO

ALTER TABLE [dbo].[PT_PRODUKCOMPONENT] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for PT_PRODUKMASTER


CREATE TABLE [dbo].[PT_PRODUKMASTER] (
  [I_ProdukMaster] int  NOT NULL,
  [N_ProdukMaster] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [I_Parent] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [I_Entry] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [D_Entry] datetime  NULL
)
GO

ALTER TABLE [dbo].[PT_PRODUKMASTER] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for PT_PRODUKUNIT


CREATE TABLE [dbo].[PT_PRODUKUNIT] (
  [I_ProdukUnit] int  NOT NULL,
  [I_Produk] int  NOT NULL,
  [I_Unit] int  NULL,
  [I_Entry] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [D_Entry] datetime  NULL
)
GO

ALTER TABLE [dbo].[PT_PRODUKUNIT] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for PT_TARIF


CREATE TABLE [dbo].[PT_TARIF] (
  [I_Tarif] int  NOT NULL,
  [I_ProdukUnit] int  NULL,
  [D_Berlaku] datetime  NULL,
  [V_Tarif] float(53)  NULL,
  [C_GolonganTarif] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [D_Berakhir] datetime  NULL,
  [I_Entry] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [D_Entry] datetime  NULL
)
GO

ALTER TABLE [dbo].[PT_TARIF] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for PT_TARIFCOMPONENT


CREATE TABLE [dbo].[PT_TARIFCOMPONENT] (
  [I_TarifComponent] int  NOT NULL,
  [I_ProdukComponent] int  NULL,
  [I_Tarif] int  NULL,
  [V_TarifComponent] float(53)  NULL,
  [V_ProsenTarifComponent] float(53)  NULL,
  [I_Entry] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [D_Entry] datetime  NULL
)
GO

ALTER TABLE [dbo].[PT_TARIFCOMPONENT] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for RackDetails


CREATE TABLE [dbo].[RackDetails] (
  [RACKID] int  NOT NULL,
  [RACKNAME] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [LABELNAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [PRODUCTID] int  NOT NULL
)
GO

ALTER TABLE [dbo].[RackDetails] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for REBRANDINFO


CREATE TABLE [dbo].[REBRANDINFO] (
  [ID] bigint  NOT NULL,
  [COMPANYNAME] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [PRODUCTNAME] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [COPYRIGHTTEXT] varchar(500) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [LOGINURL] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DESCRIPTION] varchar(500) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[REBRANDINFO] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for RedoLogs


CREATE TABLE [dbo].[RedoLogs] (
  [RESOURCENAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [COMPONENTNAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [GROUPNAME] varchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [THREAD] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SEQUENCE] bigint  NULL,
  [BYTES] bigint  NULL,
  [MEMBERS] bigint  NULL,
  [ARCHIVE] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [STATUS] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [FIRSTTIME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MEMBER] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MSTATUS] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [COLLECTIONTIME] bigint  NULL
)
GO

ALTER TABLE [dbo].[RedoLogs] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for refppk


CREATE TABLE [dbo].[refppk] (
  [kdkc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdppk] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KDPPKMENKES] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NMPPK] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JNSKAPPPK] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TYPEPPK] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KEPEMILIKANPPK] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JNSPPK] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NMJLNPPK] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RTPPK] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RWPPK] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KDPOSPPK] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KELPPK] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KECPPK] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NMDATI2PPK] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NMPROPPPK] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TELPPPK] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [FAXPPK] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TGLPKSPPK] datetime  NULL,
  [TGLHBSPKSPPK] datetime  NULL,
  [BEDPPK] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KODPPK] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Dati2PPK] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKlsTarif] nchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Flag] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[refppk] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for Register


CREATE TABLE [dbo].[Register] (
  [Regno] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Medrec] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Regdate] datetime  NULL,
  [RegTime] datetime  NULL,
  [KdCbayar] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPerusahaan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoPeserta] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [AtasNama] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTuju] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoTTidur] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kdcmasuk] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdRujuk] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kdapasien] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDocRujuk] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NomorUrut] int  NULL,
  [Kunjungan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurThn] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurBln] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurHari] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Bod] datetime  NULL,
  [StatusReg] int  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUpdate] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoSep] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdICD] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Otor] int  NULL,
  [KdSex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [GroupUnit] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdICDBPJS] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BodBPJS] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Pisat] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglRujuk] datetime  NULL,
  [NoRujuk] nvarchar(19) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdRujukan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmRujukan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdRefPeserta] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmRefPeserta] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKelas] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Prn] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NotifSEP] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmUnit] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKasus] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [LokasiKasus] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nikktp] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [StatPeserta] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [StatusAkhir] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdstatpeserta] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [AsalRujuk] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [phone] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdcob] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmcob] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminanBPJS] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoSepRI] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoKontrol] nvarchar(19) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPropinsi] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPropinsi] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKabupaten] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKabupaten] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKecamatan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKecamatan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PoliEksekutif] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Katarak] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglKejadian] datetime  NULL,
  [Suplesi] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoSuplesi] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDPJP] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [IdRegOld] int  NULL,
  [Deleted] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Prolanis] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Perjanjian] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Catatan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BatalBerobat] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [unitInstansi] int  NULL,
  [regno_instansi] int  NULL,
  [kewarganegaraan] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [StatusPeriksa] tinyint DEFAULT ((0)) NOT NULL,
  [rujukan_dari] int  NULL,
  [I_Kunjungan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [antrean_status] int DEFAULT ('0') NOT NULL,
  [pasien_odc] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [alasan_odc] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [regno_ibu] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[Register] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for Register_


CREATE TABLE [dbo].[Register_] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Regdate] datetime  NULL,
  [RegTime] datetime  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPerusahaan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoPeserta] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [AtasNama] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTuju] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoTTidur] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kdcmasuk] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdRujuk] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kdapasien] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDocRujuk] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NomorUrut] int  NULL,
  [Kunjungan] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurThn] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurBln] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurHari] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Bod] datetime  NULL,
  [StatusReg] int  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUpdate] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoSep] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdICD] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Otor] int  NULL,
  [KdSex] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [GroupUnit] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdICDBPJS] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BodBPJS] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Pisat] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglRujuk] datetime  NULL,
  [NoRujuk] nvarchar(19) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdRujukan] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmRujukan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdRefPeserta] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmRefPeserta] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKelas] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Prn] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NotifSEP] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmUnit] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKasus] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [LokasiKasus] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nikktp] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [StatPeserta] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [StatusAkhir] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdstatpeserta] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [AsalRujuk] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [phone] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdcob] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmcob] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminanBPJS] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoSepRI] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoKontrol] nvarchar(19) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPropinsi] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPropinsi] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKabupaten] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKabupaten] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKecamatan] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKecamatan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PoliEksekutif] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Katarak] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglKejadian] datetime  NULL,
  [Suplesi] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoSuplesi] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDPJP] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [IdRegOld] int  NULL,
  [Deleted] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Prolanis] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Perjanjian] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Catatan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BatalBerobat] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [unitInstansi] int  NULL
)
GO

ALTER TABLE [dbo].[Register_] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for Register_copy1


CREATE TABLE [dbo].[Register_copy1] (
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Regdate] datetime  NULL,
  [RegTime] datetime  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPerusahaan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoPeserta] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [AtasNama] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdTuju] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoTTidur] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kdcmasuk] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdRujuk] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kdapasien] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDocRujuk] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NomorUrut] int  NULL,
  [Kunjungan] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurThn] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurBln] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UmurHari] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Bod] datetime  NULL,
  [StatusReg] int  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUpdate] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoSep] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdICD] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Otor] int  NULL,
  [KdSex] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [GroupUnit] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdICDBPJS] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BodBPJS] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Pisat] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglRujuk] datetime  NULL,
  [NoRujuk] nvarchar(19) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdRujukan] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmRujukan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdRefPeserta] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmRefPeserta] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKelas] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Prn] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NotifSEP] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmUnit] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKasus] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [LokasiKasus] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nikktp] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [StatPeserta] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [StatusAkhir] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdstatpeserta] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [AsalRujuk] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [phone] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdcob] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmcob] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminanBPJS] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoSepRI] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoKontrol] nvarchar(19) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPropinsi] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPropinsi] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKabupaten] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKabupaten] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKecamatan] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKecamatan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PoliEksekutif] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Katarak] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglKejadian] datetime  NULL,
  [Suplesi] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoSuplesi] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDPJP] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [IdRegOld] int  NULL,
  [Deleted] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Prolanis] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Perjanjian] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Catatan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BatalBerobat] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [unitInstansi] int  NULL,
  [regno_instansi] int  NULL,
  [kewarganegaraan] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [StatusPeriksa] tinyint DEFAULT ((0)) NOT NULL,
  [rujukan_dari] int  NULL,
  [I_Kunjungan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [antrean_status] int DEFAULT ('0') NOT NULL,
  [pasien_odc] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [alasan_odc] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[Register_copy1] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for Register_instansi


CREATE TABLE [dbo].[Register_instansi] (
  [No_register] int  NULL,
  [Nama_perusahaan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regdate] datetime2(7)  NULL,
  [KdTuju] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPoli] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [unitInstansi] int  NULL,
  [jumlah_peserta] int  NULL,
  [NomorUrut] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdInstansi] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [validuser] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDetail_tindakan] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Diskon_instansi] real  NULL,
  [Cetak_kwitansi] datetime  NULL,
  [User_cetak] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Terima_dari] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jenis_bayar] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [No_kwitansi] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Nominal_bayar] real  NULL,
  [Tipe_diskon] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tgl_upload] datetime  NULL,
  [file_photo] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[Register_instansi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for register_sep


CREATE TABLE [dbo].[register_sep] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [tanggal] datetime  NOT NULL,
  [Regno] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NoSep] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[register_sep] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for register_task_data


CREATE TABLE [dbo].[register_task_data] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [registrasi_id] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [tanggal] date  NOT NULL,
  [waktu] datetime  NOT NULL,
  [task_id] int  NOT NULL,
  [user] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[register_task_data] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for RegistrasiTemp


CREATE TABLE [dbo].[RegistrasiTemp] (
  [NoRegistrasi] int  NULL,
  [Nomor] varchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPasien] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoKtp] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglLahir] datetime  NULL,
  [TahunUmur] int  NULL,
  [BulanUmur] int  NULL,
  [HariUmur] int  NULL,
  [JenisKelamin] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [StatusKawin] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Alamat] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kelurahan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kecamatan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kabupaten] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Provinsi] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPos] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KategoriPsn] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoBPJS] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoRujukan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Suku] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Agama] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Pendidikan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PoliTujuan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoHP] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Email] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglBerobat] datetime  NULL,
  [TglInput] datetime  NULL,
  [Rekmed] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JamDatang] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[RegistrasiTemp] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for Reports


CREATE TABLE [dbo].[Reports] (
  [CLASSNAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [DAILY] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [WEEKLY] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [HOUR] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MONTHDAYS] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [WEEKDAYS] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TIMEVAL] numeric(19)  NULL
)
GO

ALTER TABLE [dbo].[Reports] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for RESELLERINFO


CREATE TABLE [dbo].[RESELLERINFO] (
  [RESELLERID] bigint  NOT NULL,
  [RESELLERNAME] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [CONTACTPERSON] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CONTACTEMAIL] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[RESELLERINFO] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for ResourceConfig


CREATE TABLE [dbo].[ResourceConfig] (
  [RESOURCENAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [COMPONENTNAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [USERNAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PASSWORD] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CLIENTTYPE] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ERRMSG] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[ResourceConfig] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for respone_time_igd


CREATE TABLE [dbo].[respone_time_igd] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [no_registrasi] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tgl_masuk] date  NULL,
  [nama] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_rm] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jenis_kelamin] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [umur] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [td] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [n] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [rr] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [s] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [keterangan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [dokter_igd] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [waktu_masuk] varchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [waktu_tindakan] varchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [waktu_keluar] varchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[respone_time_igd] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for ResumeMedis


CREATE TABLE [dbo].[ResumeMedis] (
  [id_riwayat] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [medrec] varchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nama_pasien] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [regno] varchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tgl_lahir_pasien] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [umur_pasien] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jenkel] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [asal] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jenis_kunj] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ruang_akhir] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tgl_masuk] date  NULL,
  [tgl_keluar] date  NULL,
  [pngng_jawab] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdcbayar] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diagnosa] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [riwayat_penyakit] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [pem_fisik] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [pem_penunjang] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [hasil_konsul] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diag_utama] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [icd_10] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diag_sek1] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diag_sek2] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diag_sek3] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diag_sek4] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diag_sek5] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [icd_sek1] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [icd_sek2] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [icd_sek3] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [icd_sek4] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [icd_sek5] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tindakan_1] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tindakan_2] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tindakan_3] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tindakan_4] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tindakan_5] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [icd9_1] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [icd9_2] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [icd9_3] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [icd9_4] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [icd9_5] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diet_terakhir] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [alergi_ya] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [alergi_no] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [alergi_teks] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [efek_obat_no] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [efek_obat_ya] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [hasil_lab] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kesadaran] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tekanan_Darah] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nadi] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [suhu] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [frek_nafas] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [spo2] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [sembuh] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [belum_s] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [mng_lbh_48] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [mng_krg_48] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [baik] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [sehat] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [rs_asal] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [keluar] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kabur] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [mng] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [izin] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [paksa] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [pndh] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [alamat_pasien] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kontrol_kembali] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kel_rujukan] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [instruksi] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [deleted] int DEFAULT ((0)) NOT NULL,
  [kd_doc] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[ResumeMedis] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for ResumeMedis_copy


CREATE TABLE [dbo].[ResumeMedis_copy] (
  [id_riwayat] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [medrec] varchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nama_pasien] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [regno] varchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tgl_lahir_pasien] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [umur_pasien] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jenkel] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [asal] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [jenis_kunj] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ruang_akhir] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tgl_masuk] date  NULL,
  [tgl_keluar] date  NULL,
  [pngng_jawab] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdcbayar] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diagnosa] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [riwayat_penyakit] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [pem_fisik] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [pem_penunjang] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [hasil_konsul] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diag_utama] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [icd_10] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diag_sek1] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diag_sek2] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diag_sek3] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diag_sek4] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diag_sek5] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [icd_sek1] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [icd_sek2] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [icd_sek3] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [icd_sek4] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [icd_sek5] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tindakan_1] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tindakan_2] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tindakan_3] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tindakan_4] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tindakan_5] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [icd9_1] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [icd9_2] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [icd9_3] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [icd9_4] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [icd9_5] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diet_terakhir] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [alergi_ya] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [alergi_no] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [alergi_teks] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [efek_obat_no] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [efek_obat_ya] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [hasil_lab] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kesadaran] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tekanan_Darah] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nadi] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [suhu] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [frek_nafas] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [spo2] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [sembuh] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [belum_s] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [mng_lbh_48] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [mng_krg_48] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [baik] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [sehat] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [rs_asal] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [keluar] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kabur] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [mng] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [izin] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [paksa] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [pndh] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [alamat_pasien] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kontrol_kembali] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kel_rujukan] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[ResumeMedis_copy] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for ResumeMedisObat


CREATE TABLE [dbo].[ResumeMedisObat] (
  [ResumeID] varchar(80) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KdObat] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Qty] int  NOT NULL,
  [Dosis] varchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[ResumeMedisObat] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for RollbackData


CREATE TABLE [dbo].[RollbackData] (
  [RESOURCENAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [COMPONENTNAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [SEGMENTNAME] varchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [TABLESPACENAME] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [INITIALEXTENT] bigint  NULL,
  [NEXTEXTENT] bigint  NULL,
  [MINEXTENT] bigint  NULL,
  [MAXEXTENT] bigint  NULL,
  [STATUS] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CURRENTSIZE] bigint  NULL,
  [BLOCKS] bigint  NULL,
  [GETS] bigint  NULL,
  [WAITS] bigint  NULL,
  [HWMSIZE] bigint  NULL,
  [SHRINKS] bigint  NULL,
  [WRAPS] bigint  NULL,
  [EXTEND] bigint  NULL,
  [COLLECTIONTIME] bigint  NOT NULL
)
GO

ALTER TABLE [dbo].[RollbackData] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for RPTBedNew


CREATE TABLE [dbo].[RPTBedNew] (
  [ttcode] nvarchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmbangsal] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdkelas] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmkelas] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nokamar] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nobed] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [sex] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nstat] int  NULL
)
GO

ALTER TABLE [dbo].[RPTBedNew] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for RPTBiayaPelayanan


CREATE TABLE [dbo].[RPTBiayaPelayanan] (
  [nnomor] int  NULL,
  [keterangan] nvarchar(60) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmtarif] nvarchar(60) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tanggal] datetime  NULL,
  [jumlahbiaya] money  NULL,
  [kdbangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[RPTBiayaPelayanan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for SerahTerimaBendaharaIrj


CREATE TABLE [dbo].[SerahTerimaBendaharaIrj] (
  [NoTran] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [TglTran] datetime  NULL,
  [Penyetor] varchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Penerima] varchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalSore] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalPagi] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalBni] money  NULL,
  [Validuser] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[SerahTerimaBendaharaIrj] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for SerahTerimaKasirIrj


CREATE TABLE [dbo].[SerahTerimaKasirIrj] (
  [NoTran] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [TglTran] datetime  NULL,
  [DariShift] varchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KeShift] varchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PetugasLama] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PetugasBaru] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TotalPenerimaan] money  NULL,
  [Validuser] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[SerahTerimaKasirIrj] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for SessionInfo


CREATE TABLE [dbo].[SessionInfo] (
  [COMPONENTNAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [SESSIONID] bigint  NOT NULL,
  [STATUS] varchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MACHINE] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [USERNAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ELAPSEDTIME] bigint  NULL,
  [CPUUSED] bigint  NULL,
  [MEMORYSORTS] bigint  NULL,
  [TABLESCANS] bigint  NULL,
  [PHYSICALREADS] bigint  NULL,
  [LOGICALREADS] bigint  NULL,
  [DISKSORTS] bigint  NULL,
  [BLOCKSCHANGED] bigint  NULL,
  [CHAINEDROWS] bigint  NULL,
  [COMMITS] bigint  NULL,
  [CURSORS] bigint  NULL,
  [BUFFERCACHEHITRATIO] bigint  NULL,
  [COLLECTIONTIME] bigint  NOT NULL,
  [RESOURCEID] bigint  NOT NULL
)
GO

ALTER TABLE [dbo].[SessionInfo] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for SettingMorbiditas


CREATE TABLE [dbo].[SettingMorbiditas] (
  [KdICD] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] varchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[SettingMorbiditas] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for SgaDetails


CREATE TABLE [dbo].[SgaDetails] (
  [RESOURCENAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [COMPONENTNAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [BUFFERCACHESIZE] bigint  NULL,
  [SHAREDPOOLSIZE] bigint  NULL,
  [REDOLOGBUFFERSIZE] bigint  NULL,
  [LIBRARYCACHESIZE] bigint  NULL,
  [DATADICTCACHESIZE] bigint  NULL,
  [SQLAREASIZE] bigint  NULL,
  [FIXEDSIZE] bigint  NULL,
  [COLLECTIONTIME] bigint  NOT NULL
)
GO

ALTER TABLE [dbo].[SgaDetails] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for SgaDetailsExt


CREATE TABLE [dbo].[SgaDetailsExt] (
  [RESOURCEID] bigint  NOT NULL,
  [JAVAPOOLALLOCATEDBYTES] float(53)  NULL,
  [LARGEPOOLALLOCATEDBYTES] float(53)  NULL,
  [COLLECTIONTIME] bigint  NOT NULL
)
GO

ALTER TABLE [dbo].[SgaDetailsExt] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for SgaStatus


CREATE TABLE [dbo].[SgaStatus] (
  [RESOURCENAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [COMPONENTNAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [FREEMEMORYSIZE] bigint  NULL,
  [BUFFERHITRATIO] bigint  NULL,
  [DICTIONARYHITRATIO] bigint  NULL,
  [LIBRARYHITRATIO] bigint  NULL,
  [COLLECTIONTIME] bigint  NOT NULL
)
GO

ALTER TABLE [dbo].[SgaStatus] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for Sisa_Makan_Detail


CREATE TABLE [dbo].[Sisa_Makan_Detail] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [Jenis_Menu] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [P] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tigaperempat] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [satuperdua] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [satuperempat] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nol] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [id_head] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[Sisa_Makan_Detail] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for Sisa_Makan_Head


CREATE TABLE [dbo].[Sisa_Makan_Head] (
  [id] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Bangsal] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPasien] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Diet] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] date  NULL,
  [Waktu_Makan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[Sisa_Makan_Head] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for SmtpServer


CREATE TABLE [dbo].[SmtpServer] (
  [NAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [OWNERNAME] varchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [FROMADDRESS] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TOADDRESS] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MMESSAGE] varchar(max) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[SmtpServer] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for SnmpInterface


CREATE TABLE [dbo].[SnmpInterface] (
  [NAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [HOSTNETMASK] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [IFINDEX] bigint  NULL,
  [PHYSMEDIA] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PHYSADDR] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [IFSPEED] bigint  NULL,
  [IFDESCR] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SYSOID] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [OWNERNAME] varchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[SnmpInterface] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for SnmpNode


CREATE TABLE [dbo].[SnmpNode] (
  [NAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [HOSTNETMASK] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SYSDESCR] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SYSNAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SYSOID] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [OWNERNAME] varchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[SnmpNode] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for SqlServer


CREATE TABLE [dbo].[SqlServer] (
  [NAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [OWNERNAME] varchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [URL] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DRIVERNAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [COMMAND] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [USERNAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PASSWORD] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[SqlServer] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for StandaloneMonitorGroupList


CREATE TABLE [dbo].[StandaloneMonitorGroupList] (
  [monitor_group_ids] bigint  NULL
)
GO

ALTER TABLE [dbo].[StandaloneMonitorGroupList] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for StatsTables


CREATE TABLE [dbo].[StatsTables] (
  [TableName] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [CreateSchema] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[StatsTables] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for StockApotikDinas


CREATE TABLE [dbo].[StockApotikDinas] (
  [KdObat] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Lokasi] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [STAwal] real  NULL,
  [TRTerima] real  NULL,
  [TRKeluar] real  NULL,
  [TRRetur] real  NULL,
  [KdDepo] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[StockApotikDinas] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for StockApotikDinas_


CREATE TABLE [dbo].[StockApotikDinas_] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Lokasi] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [STAwal] real  NULL,
  [TRTerima] real  NULL,
  [TRKeluar] real  NULL,
  [TRRetur] real  NULL,
  [KdDepo] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[StockApotikDinas_] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for StockFarmasi


CREATE TABLE [dbo].[StockFarmasi] (
  [KdObat] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [STAwal] real  NULL,
  [TRTerima] real  NULL,
  [TRMutasi] real  NULL,
  [TRKeluar] real  NULL,
  [TRINRetur] real  NULL,
  [TROutRetur] real  NULL,
  [TrGroup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[StockFarmasi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for StockFarmasi_


CREATE TABLE [dbo].[StockFarmasi_] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [STAwal] real  NULL,
  [TRTerima] real  NULL,
  [TRMutasi] real  NULL,
  [TRKeluar] real  NULL,
  [TRINRetur] real  NULL,
  [TROutRetur] real  NULL,
  [TrGroup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[StockFarmasi_] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for StockMinFarmasi


CREATE TABLE [dbo].[StockMinFarmasi] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [SMinFar] int  NULL,
  [SMaxFar] int  NULL,
  [SMinApt] int  NULL,
  [SMaxApt] int  NULL
)
GO

ALTER TABLE [dbo].[StockMinFarmasi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for StockMinFarmasi_


CREATE TABLE [dbo].[StockMinFarmasi_] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [SMinFar] int  NULL,
  [SMaxFar] int  NULL,
  [SMinApt] int  NULL,
  [SMaxApt] int  NULL
)
GO

ALTER TABLE [dbo].[StockMinFarmasi_] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for StockRawatJalan


CREATE TABLE [dbo].[StockRawatJalan] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Lokasi] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [STAwal] real  NULL,
  [TRTerima] real  NULL,
  [TRKeluar] real  NULL,
  [TRRetur] real  NULL
)
GO

ALTER TABLE [dbo].[StockRawatJalan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for StockRawatJalan_


CREATE TABLE [dbo].[StockRawatJalan_] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Lokasi] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [STAwal] real  NULL,
  [TRTerima] real  NULL,
  [TRKeluar] real  NULL,
  [TRRetur] real  NULL
)
GO

ALTER TABLE [dbo].[StockRawatJalan_] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for StockRuangan


CREATE TABLE [dbo].[StockRuangan] (
  [KdObat] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [STAwal] real  NULL,
  [TRTerima] real  NULL,
  [TRKeluar] real  NULL,
  [TRRetur] real  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[StockRuangan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for StockRuangan_


CREATE TABLE [dbo].[StockRuangan_] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [STAwal] real  NULL,
  [TRTerima] real  NULL,
  [TRKeluar] real  NULL,
  [TRRetur] real  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[StockRuangan_] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for StockUGD


CREATE TABLE [dbo].[StockUGD] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [STAwal] real  NULL,
  [TRTerima] real  NULL,
  [TRKeluar] real  NULL,
  [TRRetur] real  NULL
)
GO

ALTER TABLE [dbo].[StockUGD] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for StockUGD_


CREATE TABLE [dbo].[StockUGD_] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [STAwal] real  NULL,
  [TRTerima] real  NULL,
  [TRKeluar] real  NULL,
  [TRRetur] real  NULL
)
GO

ALTER TABLE [dbo].[StockUGD_] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for StorageGudangBesar


CREATE TABLE [dbo].[StorageGudangBesar] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [STAwal] real  NULL,
  [TRTerima] real  NULL,
  [TRMutasi] real  NULL,
  [TRKeluar] real  NULL,
  [TRINRetur] real  NULL,
  [TROutRetur] real  NULL,
  [TrGroup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS DEFAULT ('DRAFT') NULL
)
GO

ALTER TABLE [dbo].[StorageGudangBesar] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for StorageGudangBesar_


CREATE TABLE [dbo].[StorageGudangBesar_] (
  [KdObat] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Notran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime  NULL,
  [STAwal] real  NULL,
  [TRTerima] real  NULL,
  [TRMutasi] real  NULL,
  [TRKeluar] real  NULL,
  [TRINRetur] real  NULL,
  [TROutRetur] real  NULL,
  [TrGroup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS DEFAULT ('DRAFT') NULL
)
GO

ALTER TABLE [dbo].[StorageGudangBesar_] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for StrageringDetail


CREATE TABLE [dbo].[StrageringDetail] (
  [Id] int  IDENTITY(1,1) NOT NULL,
  [NoTrans] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Perihal] nvarchar(60) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] date  NULL,
  [Nomor] nvarchar(60) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJabatan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmJabatan] nvarchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TTD] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CreateAt] datetime  NULL,
  [CreateBy] int  NULL
)
GO

ALTER TABLE [dbo].[StrageringDetail] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for StrageringPengadaan


CREATE TABLE [dbo].[StrageringPengadaan] (
  [NoTrans] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Support] nvarchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SMCode] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SMName] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [MA] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JumlahAnggaran] money  NULL,
  [PPK] nvarchar(60) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kabinayanmasum] nvarchar(60) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kabagminadamat] nvarchar(60) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kabagrengarku] nvarchar(60) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PPSPM] nvarchar(60) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PJPHP] nvarchar(60) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [create_at] datetime  NULL,
  [update_at] datetime  NULL,
  [delete_at] datetime  NULL,
  [KodeProgram] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kegiatan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Output] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Komponen] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CoaId] int  NULL
)
GO

ALTER TABLE [dbo].[StrageringPengadaan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for SupplierMaster


CREATE TABLE [dbo].[SupplierMaster] (
  [SMCode] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SMName] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SMContactPerson] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SMHP] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CACode] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SMAddress] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SMCity] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SMZipCode] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SMPhone] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SMFax] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SMEmail] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SMTaxStatus] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SMNPWP] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SMPKP] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [izinpbf] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [apotekerpp] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nosika] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[SupplierMaster] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for sysdiagrams


CREATE TABLE [dbo].[sysdiagrams] (
  [name] sysname  NOT NULL,
  [principal_id] int  NOT NULL,
  [diagram_id] int  IDENTITY(1,1) NOT NULL,
  [version] int  NULL,
  [definition] varbinary(max)  NULL
)
GO

ALTER TABLE [dbo].[sysdiagrams] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for tanggal_pulang_bpjs


CREATE TABLE [dbo].[tanggal_pulang_bpjs] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [no_sep] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [status_pulang] int  NOT NULL,
  [no_surat_meninggal] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tanggal_meninggal] date  NULL,
  [tanggal_pulang] date  NOT NULL,
  [no_lp_manual] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [user] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[tanggal_pulang_bpjs] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for tarif_pelayanan_bpjs_irna


CREATE TABLE [dbo].[tarif_pelayanan_bpjs_irna] (
  [IdTarif] int  IDENTITY(1,1) NOT NULL,
  [Inst] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [asgiz] bigint  NULL,
  [askep_0] bigint  NULL,
  [askep_1] bigint  NULL,
  [askep_2] bigint  NULL,
  [askep_3] bigint  NULL,
  [askep_4] bigint  NULL,
  [ranap_dari_igd_dokter] bigint  NULL,
  [ranap_dari_igd_perawat] bigint  NULL,
  [visite_spesialis_konsul_telpon] bigint  NULL,
  [visite_spesialis_visite_0] bigint  NULL,
  [visite_spesialis_visite_1] bigint  NULL,
  [visite_spesialis_visite_2] bigint  NULL,
  [visite_spesialis_visite_3] bigint  NULL,
  [visite_umum_jaga] bigint  NULL,
  [visite_umum_visite] bigint  NULL,
  [CreateAt] datetime  NULL
)
GO

ALTER TABLE [dbo].[tarif_pelayanan_bpjs_irna] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TaskAudit


CREATE TABLE [dbo].[TaskAudit] (
  [EXECUTIONID] bigint  NULL,
  [USERNAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TASKNAME] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DEVICELIST] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DATASOURCE] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [EXECUTEDTIME] varchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TaskAudit] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLAgama


CREATE TABLE [dbo].[TBLAgama] (
  [KdAgama] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmAgama] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLAgama] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLApproval


CREATE TABLE [dbo].[TBLApproval] (
  [id_approve] int  IDENTITY(1,1) NOT NULL,
  [tgl_approve] date  NULL,
  [periode_so] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [xuser] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [kdDepo] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLApproval] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLAsalDana


CREATE TABLE [dbo].[TBLAsalDana] (
  [KdDana] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmDana] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLAsalDana] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLAsalpasien


CREATE TABLE [dbo].[TBLAsalpasien] (
  [KDApasien] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NMApasien] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Alamat] nvarchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLAsalpasien] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TblBagumHead


CREATE TABLE [dbo].[TblBagumHead] (
  [KdPengadaan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [StartDate] date  NULL,
  [EndDate] date  NULL,
  [StatusPengadaan] tinyint  NULL,
  [KdApproval] int  NULL,
  [ApprovalDate] date  NULL,
  [KdValidator] int  NULL,
  [ValidatorDate] date  NULL,
  [RegBy] int  NULL,
  [RegDate] date  NULL,
  [JnsPengadaan] tinyint  NULL
)
GO

ALTER TABLE [dbo].[TblBagumHead] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLBangsal


CREATE TABLE [dbo].[TBLBangsal] (
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmBangsal] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kapasitas] int  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kl1] int  NULL,
  [Kl2] int  NULL,
  [Kl3] int  NULL,
  [ket_ruang] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ruang_jenis] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Publish] tinyint DEFAULT ('1') NOT NULL
)
GO

ALTER TABLE [dbo].[TBLBangsal] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLBangsal_copy


CREATE TABLE [dbo].[TBLBangsal_copy] (
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmBangsal] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kapasitas] bigint  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kl1] bigint  NULL,
  [Kl2] bigint  NULL,
  [Kl3] bigint  NULL,
  [ket_ruang] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ruang_jeni] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLBangsal_copy] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLBangsal_proses


CREATE TABLE [dbo].[TBLBangsal_proses] (
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmBangsal] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kapasitas] int  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kl1] int  NULL,
  [Kl2] int  NULL,
  [Kl3] int  NULL,
  [ket_ruang] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ruang_jenis] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLBangsal_proses] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLcarabayar


CREATE TABLE [dbo].[TBLcarabayar] (
  [KDCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NMCbayar] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [GroupUnit] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLcarabayar] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLcarakeluar


CREATE TABLE [dbo].[TBLcarakeluar] (
  [KDCkeluar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NMCkeluar] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLcarakeluar] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLcaramasuk


CREATE TABLE [dbo].[TBLcaramasuk] (
  [KDCmasuk] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NMCmasuk] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLcaramasuk] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLCaraMinumObat


CREATE TABLE [dbo].[TBLCaraMinumObat] (
  [Kode] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(60) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLCaraMinumObat] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLDepo


CREATE TABLE [dbo].[TBLDepo] (
  [KdDepo] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmDepo] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLDepo] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLDiit


CREATE TABLE [dbo].[TBLDiit] (
  [KdDiit] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmDiit] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLDiit] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLDiitKhusus


CREATE TABLE [dbo].[TBLDiitKhusus] (
  [KdDiitK] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmDiitK] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLDiitKhusus] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLGolongan


CREATE TABLE [dbo].[TBLGolongan] (
  [KODEGOL] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NAMAGOL] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[TBLGolongan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLGroupObat


CREATE TABLE [dbo].[TBLGroupObat] (
  [GroupCode] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [GroupName] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLGroupObat] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLGroupUnit


CREATE TABLE [dbo].[TBLGroupUnit] (
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [GroupUnit] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLGroupUnit] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLHari


CREATE TABLE [dbo].[TBLHari] (
  [Kode] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Keterangan] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLHari] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLHasilMicro


CREATE TABLE [dbo].[TBLHasilMicro] (
  [KdHasil] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmHasil] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLHasilMicro] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLICD10


CREATE TABLE [dbo].[TBLICD10] (
  [KDICD] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KDDTD] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SUBDIAGNOSA] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DIAGNOSA] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLICD10] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLicd10B


CREATE TABLE [dbo].[TBLicd10B] (
  [KDICD] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KDDTD] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DIAGNOSA] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SUBDIAGNOSA] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLicd10B] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLicd9


CREATE TABLE [dbo].[TBLicd9] (
  [KDICD] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KDDTD] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Diagnosa] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLicd9] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLIndikasi


CREATE TABLE [dbo].[TBLIndikasi] (
  [IndikasiCode] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [IndikasiName] nvarchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLIndikasi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLInformasi


CREATE TABLE [dbo].[TBLInformasi] (
  [Informasi] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] date  NULL,
  [ValidUser] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLInformasi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLInstansi


CREATE TABLE [dbo].[TBLInstansi] (
  [KdInstansi] int  NOT NULL,
  [NmInstansi] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLInstansi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLJaminan


CREATE TABLE [dbo].[TBLJaminan] (
  [KDJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NMJaminan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ContactPerson] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ContactPhone] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Alamat] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kota] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPos] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Telepon] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Fax] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Email] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NoKontrak] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [StatusJaminan] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BeginDate] datetime  NULL,
  [DueDate] datetime  NULL,
  [CACode] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JangkaWaktu] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JenisPelayanan] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ObatDitanggung] nvarchar(300) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PlafonKamar] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TidakDitanggung] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Penagihan] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Pembayaran] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Denda] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UangR] money  NULL,
  [Embalase] money  NULL,
  [ProsenJual] real  NULL,
  [Discount] real  NULL,
  [Status] int  NULL,
  [Aktif] int  NULL,
  [jtempo] int  NULL,
  [JPelayanan0] int  NULL,
  [JPelayanan1] int  NULL,
  [JPelayanan2] int  NULL,
  [JPelayanan3] int  NULL,
  [JPelayanan4] int  NULL,
  [JPelayanan5] int  NULL,
  [JPelayanan6] int  NULL,
  [JPelayanan7] int  NULL,
  [CService] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CProvider] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [COffice] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLJaminan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLJangkaWaktu


CREATE TABLE [dbo].[TBLJangkaWaktu] (
  [Keterangan] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLJangkaWaktu] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLJenisBayar


CREATE TABLE [dbo].[TBLJenisBayar] (
  [KDJbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [JenisBayar] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLJenisBayar] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLjeniskasus


CREATE TABLE [dbo].[TBLjeniskasus] (
  [KDJkasus] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NMJkasus] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLjeniskasus] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLJenisObat


CREATE TABLE [dbo].[TBLJenisObat] (
  [JenisCode] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [JenisName] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLJenisObat] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLJenisPelayanan


CREATE TABLE [dbo].[TBLJenisPelayanan] (
  [KdJenisPelayanan] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmJenisPelayanan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLJenisPelayanan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLKabupaten


CREATE TABLE [dbo].[TBLKabupaten] (
  [KdKabupaten] char(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKabupaten] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPropinsi] char(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLKabupaten] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLKasusLaka


CREATE TABLE [dbo].[TBLKasusLaka] (
  [KdKasus] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmKasus] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLKasusLaka] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TblKategori


CREATE TABLE [dbo].[TblKategori] (
  [Kode] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Kategori] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TblKategori] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLKategoriObat


CREATE TABLE [dbo].[TBLKategoriObat] (
  [KdKategori] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmKategori] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLKategoriObat] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLKategoriObatold


CREATE TABLE [dbo].[TBLKategoriObatold] (
  [KdKategori] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmKategori] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLKategoriObatold] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TblKategoriPsn


CREATE TABLE [dbo].[TblKategoriPsn] (
  [KdKategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmKategori] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TblKategoriPsn] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TblKategoriPsn_kepri


CREATE TABLE [dbo].[TblKategoriPsn_kepri] (
  [KdKategori] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmKategori] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TblKategoriPsn_kepri] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLKecamatan


CREATE TABLE [dbo].[TBLKecamatan] (
  [KdKecamatan] char(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKecamatan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKabupaten] char(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLKecamatan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLKelas


CREATE TABLE [dbo].[TBLKelas] (
  [KDKelas] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NMKelas] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ByTarif] float(53)  NULL,
  [JMLtt] int  NULL,
  [ByAdm] float(53)  NULL,
  [Prosen] real  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelasBpjs] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLKelas] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLKelas_copy


CREATE TABLE [dbo].[TBLKelas_copy] (
  [KDKelas] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NMKelas] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ByTarif] float(53)  NULL,
  [JMLtt] int  NULL,
  [ByAdm] float(53)  NULL,
  [Prosen] real  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelasBpjs] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLKelas_copy] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLKelas_lama


CREATE TABLE [dbo].[TBLKelas_lama] (
  [KDKelas] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NMKelas] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ByTarif] float(53)  NULL,
  [JMLtt] int  NULL,
  [ByAdm] float(53)  NULL,
  [Prosen] real  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelasBpjs] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLKelas_lama] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLKelompokObat


CREATE TABLE [dbo].[TBLKelompokObat] (
  [KdKelompok] int  IDENTITY(1,1) NOT NULL,
  [NmKelompok] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLKelompokObat] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLKelurahan


CREATE TABLE [dbo].[TBLKelurahan] (
  [KdKelurahan] char(11) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmKelurahan] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKecamatan] char(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLKelurahan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLKesatuan


CREATE TABLE [dbo].[TBLKesatuan] (
  [KdKeSatuan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmKeSatuan] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UnitCode] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Angkatan] nvarchar(6) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLKesatuan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLkkeluar


CREATE TABLE [dbo].[TBLkkeluar] (
  [KDKkeluar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NMKkeluar] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLkkeluar] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLKodeKelas


CREATE TABLE [dbo].[TBLKodeKelas] (
  [Kode] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Keterangan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLKodeKelas] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLKodeKelas_copy


CREATE TABLE [dbo].[TBLKodeKelas_copy] (
  [Kode] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Keterangan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLKodeKelas_copy] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLkondisiPasien


CREATE TABLE [dbo].[TBLkondisiPasien] (
  [KDKpasien] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NMKpasien] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLkondisiPasien] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLKorp


CREATE TABLE [dbo].[TBLKorp] (
  [KdKorp] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmKorp] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Angkatan] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLKorp] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLMasterDepartemen


CREATE TABLE [dbo].[TBLMasterDepartemen] (
  [KdDepartemen] int  IDENTITY(1,1) NOT NULL,
  [NmDepartemen] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Aktif] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegBy] int  NULL,
  [RegDate] date  NULL
)
GO

ALTER TABLE [dbo].[TBLMasterDepartemen] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLMasterGudang


CREATE TABLE [dbo].[TBLMasterGudang] (
  [KdGudang] int  IDENTITY(1,1) NOT NULL,
  [KdDepartemen] int  NULL,
  [KdUnit] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmGudang] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Aktif] tinyint  NULL,
  [RegBy] int  NULL,
  [RegDate] date  NULL
)
GO

ALTER TABLE [dbo].[TBLMasterGudang] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLMasterPengadaan


CREATE TABLE [dbo].[TBLMasterPengadaan] (
  [KdPengadaan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Pengadaan] int  NULL,
  [KdUnit] int  NULL,
  [KdUser] int  NULL,
  [KdApproval] int  NULL,
  [ApprovalDate] date  NULL,
  [KdValidator] int  NULL,
  [ValidatorDate] date  NULL,
  [ApprovalNote] ntext COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidatorNote] ntext COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [StatusPengadaan] tinyint  NULL,
  [RegBy] int  NULL,
  [RegDate] date  NULL,
  [JnsPengadaan] tinyint  NULL
)
GO

ALTER TABLE [dbo].[TBLMasterPengadaan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLMasterPenggunaan


CREATE TABLE [dbo].[TBLMasterPenggunaan] (
  [KdPenggunaan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Pengajuan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDepartemen] int  NULL,
  [KdUnit] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegBy] int  NULL,
  [RegDate] date  NULL,
  [StatusPenggunaan] tinyint  NULL
)
GO

ALTER TABLE [dbo].[TBLMasterPenggunaan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLMasterRole


CREATE TABLE [dbo].[TBLMasterRole] (
  [KdRole] int  IDENTITY(1,1) NOT NULL,
  [NmRole] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Aktif] tinyint  NULL,
  [RegBy] int  NULL,
  [RegDate] date  NULL
)
GO

ALTER TABLE [dbo].[TBLMasterRole] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLMasterSettingPengajuan


CREATE TABLE [dbo].[TBLMasterSettingPengajuan] (
  [KdSetting] int  IDENTITY(1,1) NOT NULL,
  [NmInstitusi] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPendek] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPanjang] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmDinas] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Logo] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Aktif] tinyint  NULL,
  [RegBy] int  NULL,
  [RegDate] date  NULL
)
GO

ALTER TABLE [dbo].[TBLMasterSettingPengajuan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLMasterUnit


CREATE TABLE [dbo].[TBLMasterUnit] (
  [UnitName] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [id] int  IDENTITY(1,1) NOT NULL
)
GO

ALTER TABLE [dbo].[TBLMasterUnit] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLMasterUser


CREATE TABLE [dbo].[TBLMasterUser] (
  [KdUser] int  IDENTITY(1,1) NOT NULL,
  [NmUser] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [UserName] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Password] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdUnit] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdRole] int  NULL,
  [Aktif] int  NULL,
  [RegBy] int  NULL,
  [RegDate] date  NULL
)
GO

ALTER TABLE [dbo].[TBLMasterUser] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLNotes


CREATE TABLE [dbo].[TBLNotes] (
  [Kode] int  NOT NULL,
  [Keterangan] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLNotes] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLOperasi


CREATE TABLE [dbo].[TBLOperasi] (
  [csDrOperator] real  NULL,
  [csAsDrOperator] real  NULL,
  [csDrAnestesi] real  NULL,
  [csAsDrAnestesi] real  NULL,
  [csDrAnak] real  NULL,
  [csDrPendamping] real  NULL,
  [cmDrOperator] real  NULL,
  [cmAsDrOperator] real  NULL,
  [cmDrAnestesi] real  NULL,
  [cmAsDrAnestesi] real  NULL,
  [cmDrAnak] real  NULL,
  [cmDrPendamping] real  NULL,
  [cito] int  NULL,
  [penyulit] int  NULL
)
GO

ALTER TABLE [dbo].[TBLOperasi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLPangkat


CREATE TABLE [dbo].[TBLPangkat] (
  [KdPangkat] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmPangkat] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Angkatan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdGroup] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [GroupPangkat] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLPangkat] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLPekerjaan


CREATE TABLE [dbo].[TBLPekerjaan] (
  [KdKerja] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmKerja] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdMapping] nvarchar(12) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLPekerjaan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLPelangganApotik


CREATE TABLE [dbo].[TBLPelangganApotik] (
  [KdPelanggan] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmPelanggan] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Margin] float(53)  NULL,
  [Discount] float(53)  NULL,
  [ValidUser] varchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLPelangganApotik] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLPendidikan


CREATE TABLE [dbo].[TBLPendidikan] (
  [KdDidik] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmDidik] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLPendidikan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TblPengadaanDetail


CREATE TABLE [dbo].[TblPengadaanDetail] (
  [KdItem] int  IDENTITY(1,1) NOT NULL,
  [KdPengadaan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBrg] int  NULL,
  [JmlPengadaan] int  NULL,
  [StatusRekap] int  NULL,
  [RegBy] int  NULL,
  [RegDate] datetime  NULL
)
GO

ALTER TABLE [dbo].[TblPengadaanDetail] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TblPengadaanHead


CREATE TABLE [dbo].[TblPengadaanHead] (
  [KdPengadaan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [JnsPengadaan] int  NULL,
  [KdUnit] int  NULL,
  [KdApproval] int  NULL,
  [ApprovalDate] datetime  NULL,
  [ApprovalNote] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdValidator] int  NULL,
  [ValidatorDate] datetime  NULL,
  [ValidatorNote] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdVerificator] int  NULL,
  [VerificationDate] datetime  NULL,
  [VerificatorNote] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegBy] int  NULL,
  [RegDate] datetime  NULL
)
GO

ALTER TABLE [dbo].[TblPengadaanHead] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TblPengajuanDetail


CREATE TABLE [dbo].[TblPengajuanDetail] (
  [KdItem] int  IDENTITY(1,1) NOT NULL,
  [KdPengajuan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBrg] int  NULL,
  [JmlPermintaan] int  NULL,
  [JmlBeri] int  NULL,
  [RegBy] int  NULL,
  [RegDate] datetime  NULL
)
GO

ALTER TABLE [dbo].[TblPengajuanDetail] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TblPengajuanHead


CREATE TABLE [dbo].[TblPengajuanHead] (
  [KdPengajuan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [JnsPengajuan] int  NULL,
  [KdUnit] int  NULL,
  [ApprovalDate] datetime  NULL,
  [ApprovalNote] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [StatusPengajuan] int  NULL,
  [RegBy] int  NULL,
  [RegDate] datetime  NULL
)
GO

ALTER TABLE [dbo].[TblPengajuanHead] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLPerkawinan


CREATE TABLE [dbo].[TBLPerkawinan] (
  [KdKawin] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmKawin] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLPerkawinan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLPerusahaan


CREATE TABLE [dbo].[TBLPerusahaan] (
  [KDPerusahaan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NMPerusahaan] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ContactPerson] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ContactPhone] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Alamat] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kota] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdPos] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Telepon] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Fax] nvarchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Email] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmJaminan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLPerusahaan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLPJawab


CREATE TABLE [dbo].[TBLPJawab] (
  [NmDoc] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jabatan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLPJawab] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLPJawabG


CREATE TABLE [dbo].[TBLPJawabG] (
  [NmDoc] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jabatan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLPJawabG] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLPrincipal


CREATE TABLE [dbo].[TBLPrincipal] (
  [KdPrincipal] nvarchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmPrincipal] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [alamat] nvarchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [phone] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [fax] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [noizin] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLPrincipal] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLPropinsi


CREATE TABLE [dbo].[TBLPropinsi] (
  [KdPropinsi] char(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NmPropinsi] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLPropinsi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLRegistrasi


CREATE TABLE [dbo].[TBLRegistrasi] (
  [Kode] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Keterangan] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLRegistrasi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLRrawat


CREATE TABLE [dbo].[TBLRrawat] (
  [KDRrawat] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NMRrawat] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLRrawat] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLRujukan


CREATE TABLE [dbo].[TBLRujukan] (
  [KDRujuk] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NMRujuk] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLRujukan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLSatuan


CREATE TABLE [dbo].[TBLSatuan] (
  [STCode] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [STKemasan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [STQtyUnit] int  NULL,
  [STSatuan] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLSatuan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLSex


CREATE TABLE [dbo].[TBLSex] (
  [KdSex] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Sex] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLSex] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLSigna


CREATE TABLE [dbo].[TBLSigna] (
  [Kode] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Keterangan] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLSigna] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLStOperasi


CREATE TABLE [dbo].[TBLStOperasi] (
  [Kode] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Keterangan] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLStOperasi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLSuku


CREATE TABLE [dbo].[TBLSuku] (
  [KdSuku] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmSuku] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLSuku] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLSukuy


CREATE TABLE [dbo].[TBLSukuy] (
  [KdSuku] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmSuku] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLSukuy] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLTpengobatan


CREATE TABLE [dbo].[TBLTpengobatan] (
  [KDTuju] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NMTuju] nvarchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Grup] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLTpengobatan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TblTransBarang


CREATE TABLE [dbo].[TblTransBarang] (
  [KdTrans] int  IDENTITY(1,1) NOT NULL,
  [KdUnit] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JnsTrans] tinyint  NULL,
  [KdBrg] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JmlIn] int  NULL,
  [JmlOut] int  NULL,
  [RegBy] int  NULL,
  [RegDate] date  NULL,
  [JnsBrg] tinyint  NULL,
  [KdPenggunaan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TblTransBarang] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLTransPengadaan


CREATE TABLE [dbo].[TBLTransPengadaan] (
  [KdItem] int  IDENTITY(1,1) NOT NULL,
  [KdPengadaan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBrg] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JmlStandar] int  NULL,
  [StockB] int  NULL,
  [StockRR] int  NULL,
  [StockRB] int  NULL,
  [JmlPermintaan] int  NULL,
  [JmlApproval] int  NULL,
  [RegBy] int  NULL,
  [RegDate] date  NULL,
  [Rekap] tinyint  NULL,
  [RekapBy] int  NULL,
  [RekapDate] date  NULL
)
GO

ALTER TABLE [dbo].[TBLTransPengadaan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLTransPenggunaan


CREATE TABLE [dbo].[TBLTransPenggunaan] (
  [KdItem] int  IDENTITY(1,1) NOT NULL,
  [KdPenggunaan] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBrg] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Jml] int  NULL,
  [RegBy] int  NULL,
  [RegDate] date  NULL
)
GO

ALTER TABLE [dbo].[TBLTransPenggunaan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLType


CREATE TABLE [dbo].[TBLType] (
  [KdType] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmType] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Validuser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLType] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLUnitInstansi


CREATE TABLE [dbo].[TBLUnitInstansi] (
  [KdUnit] int  NOT NULL,
  [NmUnit] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdInstansi] varchar(11) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLUnitInstansi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLUnitKategori


CREATE TABLE [dbo].[TBLUnitKategori] (
  [KdUnit] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmUnit] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [GroupKategori] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLUnitKategori] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLUnitKategori_awal


CREATE TABLE [dbo].[TBLUnitKategori_awal] (
  [KdUnit] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmUnit] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [GroupKategori] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLUnitKategori_awal] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLUnitKategori_bak


CREATE TABLE [dbo].[TBLUnitKategori_bak] (
  [KdUnit] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NmUnit] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [GroupKategori] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLUnitKategori_bak] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TBLWilayah


CREATE TABLE [dbo].[TBLWilayah] (
  [Keterangan] nvarchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TBLWilayah] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for temp_medrec_numbers


CREATE TABLE [dbo].[temp_medrec_numbers] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [medrec] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[temp_medrec_numbers] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TermOfPayment


CREATE TABLE [dbo].[TermOfPayment] (
  [TOPCode] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [TOPDescription] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TOPDays] decimal(3)  NULL,
  [TOPDisc] decimal(4,2)  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TermOfPayment] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for tghaib


CREATE TABLE [dbo].[tghaib] (
  [kddokter] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmdokter] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[tghaib] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for ThresholdObjects


CREATE TABLE [dbo].[ThresholdObjects] (
  [NAME] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [KIND] varchar(15) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SEVERITY] bigint  NULL,
  [TRIGGERSEVERITY] bigint  NULL,
  [RESETSEVERITY] bigint  NULL,
  [THRESHOLDTYPE] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CATEGORY] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [THRESHOLDVALUE] numeric(19)  NULL,
  [REARMVALUE] numeric(19)  NULL,
  [MMESSAGE] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CLEARMESSAGE] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SENDCLEAR] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ALLOWED] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DISALLOWED] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [OID] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [OIDTYPE] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[ThresholdObjects] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TindakanTD


CREATE TABLE [dbo].[TindakanTD] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KodeTarif] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaTindakan] nvarchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DetailCode] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DetailName] nvarchar(70) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdURL] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrOpr] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrRawat] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdAsDrOpr] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrAnestesi] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrPenata] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrAnak] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrPendamping] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBidan] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdAsBidan] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ByRrawat] float(53)  NULL,
  [ByDrOpr] float(53)  NULL,
  [ByAsDrOpr] float(53)  NULL,
  [ByDrAnestesi] float(53)  NULL,
  [ByDrPenata] float(53)  NULL,
  [ByDrAnak] float(53)  NULL,
  [ByDrPendamping] float(53)  NULL,
  [ByBidan] float(53)  NULL,
  [ByAsBidan] float(53)  NULL,
  [BySewaAlat] float(53)  NULL,
  [ByAlatRS] float(53)  NULL,
  [ByRroom] float(53)  NULL,
  [ByObat] float(53)  NULL,
  [JumlahBiaya] float(53)  NULL,
  [Cito] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NilaiCito] float(53)  NULL,
  [CitoDrOperator] float(53)  NULL,
  [CitoAsDrOperator] float(53)  NULL,
  [CitoDrAnestesi] float(53)  NULL,
  [CitoAsDrAnestesi] float(53)  NULL,
  [CitoDrAnak] float(53)  NULL,
  [CitoDrPendamping] float(53)  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sts] int  NULL,
  [VCode] int  NULL,
  [Verifikasi] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [dabyrrawat] float(53)  NULL,
  [dabyalatrs] float(53)  NULL,
  [dabydropr] float(53)  NULL,
  [dabyasdropr] float(53)  NULL,
  [dabydranestesi] float(53)  NULL,
  [dabydrpenata] float(53)  NULL,
  [dabydranak] float(53)  NULL,
  [dabydrpendamping] float(53)  NULL,
  [dabybidan] float(53)  NULL,
  [dabyasbidan] float(53)  NULL,
  [dabysewaalat] float(53)  NULL,
  [dabyrroom] float(53)  NULL,
  [dabyobat] float(53)  NULL,
  [dajumlahbiaya] float(53)  NULL,
  [umbyrrawat] float(53)  NULL,
  [umbyalatrs] float(53)  NULL,
  [umbydropr] float(53)  NULL,
  [umbyasdropr] float(53)  NULL,
  [umbydranestesi] float(53)  NULL,
  [umbydrpenata] float(53)  NULL,
  [umbydranak] float(53)  NULL,
  [umbydrpendamping] float(53)  NULL,
  [umbybidan] float(53)  NULL,
  [umbyasbidan] float(53)  NULL,
  [umbysewaalat] float(53)  NULL,
  [umbyrroom] float(53)  NULL,
  [umbyobat] float(53)  NULL,
  [umjumlahbiaya] float(53)  NULL,
  [is_posted] bit DEFAULT ((0)) NULL,
  [ByImplant] float(53)  NULL,
  [ByAlat] float(53)  NULL,
  [ByCucian] float(53)  NULL,
  [ByHSpeetDrill] float(53)  NULL,
  [ByENDOSCOPY] float(53)  NULL,
  [ByInfantWarmer] float(53)  NULL,
  [ByCArm] float(53)  NULL,
  [ByCuttingLoop] float(53)  NULL,
  [ByUSGDoopler] float(53)  NULL,
  [BySonopet] float(53)  NULL,
  [StatusRawat] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SecondaryActionsCode] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SecondaryActionsName] ntext COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ByPatologi] float(53)  NULL,
  [Qty] int  NULL,
  [Sarana] float(53)  NULL,
  [Pelayanan] float(53)  NULL,
  [Discount] real  NULL,
  [KdLain] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [stsbayar] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tglbayar] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TindakanTD] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TindakanVK


CREATE TABLE [dbo].[TindakanVK] (
  [NoTran] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Tanggal] datetime  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KodeTarif] nvarchar(9) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaTindakan] nvarchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DetailCode] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DetailName] nvarchar(70) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdURL] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrOpr] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrRawat] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdAsDrOpr] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrAnestesi] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrPenata] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrAnak] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDrPendamping] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBidan] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdAsBidan] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ByRrawat] float(53)  NULL,
  [ByDrOpr] float(53)  NULL,
  [ByAsDrOpr] float(53)  NULL,
  [ByDrAnestesi] float(53)  NULL,
  [ByDrPenata] float(53)  NULL,
  [ByDrAnak] float(53)  NULL,
  [ByDrPendamping] float(53)  NULL,
  [ByBidan] float(53)  NULL,
  [ByAsBidan] float(53)  NULL,
  [BySewaAlat] float(53)  NULL,
  [ByAlatRS] float(53)  NULL,
  [ByRroom] float(53)  NULL,
  [ByObat] float(53)  NULL,
  [JumlahBiaya] float(53)  NULL,
  [Cito] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NilaiCito] float(53)  NULL,
  [CitoDrOperator] float(53)  NULL,
  [CitoAsDrOperator] float(53)  NULL,
  [CitoDrAnestesi] float(53)  NULL,
  [CitoAsDrAnestesi] float(53)  NULL,
  [CitoDrAnak] float(53)  NULL,
  [CitoDrPendamping] float(53)  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Kategori] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Sts] int  NULL,
  [VCode] int  NULL,
  [Verifikasi] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [dabyrrawat] float(53)  NULL,
  [dabyalatrs] float(53)  NULL,
  [dabydropr] float(53)  NULL,
  [dabyasdropr] float(53)  NULL,
  [dabydranestesi] float(53)  NULL,
  [dabydrpenata] float(53)  NULL,
  [dabydranak] float(53)  NULL,
  [dabydrpendamping] float(53)  NULL,
  [dabybidan] float(53)  NULL,
  [dabyasbidan] float(53)  NULL,
  [dabysewaalat] float(53)  NULL,
  [dabyrroom] float(53)  NULL,
  [dabyobat] float(53)  NULL,
  [dajumlahbiaya] float(53)  NULL,
  [umbyrrawat] float(53)  NULL,
  [umbyalatrs] float(53)  NULL,
  [umbydropr] float(53)  NULL,
  [umbyasdropr] float(53)  NULL,
  [umbydranestesi] float(53)  NULL,
  [umbydrpenata] float(53)  NULL,
  [umbydranak] float(53)  NULL,
  [umbydrpendamping] float(53)  NULL,
  [umbybidan] float(53)  NULL,
  [umbyasbidan] float(53)  NULL,
  [umbysewaalat] float(53)  NULL,
  [umbyrroom] float(53)  NULL,
  [umbyobat] float(53)  NULL,
  [umjumlahbiaya] float(53)  NULL,
  [is_posted] bit DEFAULT ((0)) NULL,
  [ByImplant] float(53)  NULL,
  [ByAlat] float(53)  NULL,
  [ByCucian] float(53)  NULL,
  [ByHSpeetDrill] float(53)  NULL,
  [ByENDOSCOPY] float(53)  NULL,
  [ByInfantWarmer] float(53)  NULL,
  [ByCArm] float(53)  NULL,
  [ByCuttingLoop] float(53)  NULL,
  [ByUSGDoopler] float(53)  NULL,
  [BySonopet] float(53)  NULL,
  [StatusRawat] nvarchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SecondaryActionsCode] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SecondaryActionsName] ntext COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ByPatologi] float(53)  NULL,
  [Qty] int  NULL,
  [Sarana] float(53)  NULL,
  [Pelayanan] float(53)  NULL,
  [Discount] real  NULL,
  [KdLain] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [stsbayar] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tglbayar] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TindakanVK] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for tingkat_kej_decubitus


CREATE TABLE [dbo].[tingkat_kej_decubitus] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [no_transaksi] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [no_registrasi] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [no_rm] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nama] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [diagnosa] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [grade2] char(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tgl_masuk] date  NULL,
  [tgl_periksa] date  NULL,
  [hari_indikasi] char(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [keterangan] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[tingkat_kej_decubitus] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TL1Interface


CREATE TABLE [dbo].[TL1Interface] (
  [STATPOLLCOMMAND] varchar(254) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CONNECTIONHANDLER] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DICTIONARY] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SESSIONID] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TL1PORT] bigint  NULL,
  [NAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [OWNERNAME] varchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[TL1Interface] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TL1Node


CREATE TABLE [dbo].[TL1Node] (
  [LOGINCOMMAND] varchar(254) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [INITCOMMAND] varchar(254) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CONNECTIONHANDLER] varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [INFOCOMMAND] varchar(254) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DICTIONARY] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SESSIONID] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TL1PORT] bigint  NULL,
  [NOTIFYID] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [OWNERNAME] varchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[TL1Node] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TMUNIT


CREATE TABLE [dbo].[TMUNIT] (
  [I_Unit] int  NOT NULL,
  [N_Unit] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [I_Bagian] tinyint  NULL,
  [I_Kelas] tinyint  NULL,
  [I_GroupKelas] tinyint  NULL,
  [I_Kamar] int  NULL,
  [I_JumlahBed] int  NULL,
  [I_Terisi] int  NULL,
  [I_Entry] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [D_Entry] datetime  NULL,
  [IsUnitKhusus] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [IsPsikiatri] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [IsUnitLuar] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TMUNIT] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TOPODBSPECIALKEY


CREATE TABLE [dbo].[TOPODBSPECIALKEY] (
  [KEYSTRING] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [VALUESTRING] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TOPODBSPECIALKEY] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TopoObject


CREATE TABLE [dbo].[TopoObject] (
  [NAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [IPADDRESS] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NETMASK] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [COMMUNITY] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [WRITECOMMUNITY] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [SNMPPORT] bigint  NULL,
  [ISDHCP] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BASEMIBS] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [OWNERNAME] varchar(25) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [VERSION] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [USERNAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CONTEXTNAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ISSNMP] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ISNODE] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ISNETWORK] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ISINTERFACE] varchar(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TopoObject] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for trans_dasar_pengajuan


CREATE TABLE [dbo].[trans_dasar_pengajuan] (
  [no_pengajuan] char(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [no_dasar_pengajuan] char(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [tingkat] tinyint DEFAULT ((1)) NOT NULL
)
GO

ALTER TABLE [dbo].[trans_dasar_pengajuan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for trans_distribusi


CREATE TABLE [dbo].[trans_distribusi] (
  [trans_distribusi_id] int  IDENTITY(1,1) NOT NULL,
  [tanggal] date  NULL
)
GO

ALTER TABLE [dbo].[trans_distribusi] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for trans_ipcln_detail


CREATE TABLE [dbo].[trans_ipcln_detail] (
  [id_detail] int  IDENTITY(1,1) NOT NULL,
  [Notrans] varchar(12) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [id_medis] int  NULL,
  [KdTindakan] varchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CekInfeksi] varchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS DEFAULT ((0)) NULL,
  [KetInfeksi] varchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ParamTindakan] varchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [HasilAwal] varchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status] varchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[trans_ipcln_detail] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for trans_ipcln_detail_j


CREATE TABLE [dbo].[trans_ipcln_detail_j] (
  [id_detail] int  IDENTITY(1,1) NOT NULL,
  [Notrans] varchar(12) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [id_medis] int  NULL,
  [KdTindakan] varchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [CekInfeksi] varchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS DEFAULT ((0)) NULL,
  [KetInfeksi] varchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ParamTindakan] varchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [HasilAwal] varchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status] varchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[trans_ipcln_detail_j] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for trans_ipcln_head


CREATE TABLE [dbo].[trans_ipcln_head] (
  [Notrans] nvarchar(12) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaPasien] nvarchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglMasuk] datetime2(7)  NULL,
  [TglTrans] datetime2(7)  NULL,
  [KetDarah] nvarchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KetUrine] nvarchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KetSputum] nvarchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KetPus] nvarchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Antibiotik] nvarchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[trans_ipcln_head] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for trans_ipcln_head_j


CREATE TABLE [dbo].[trans_ipcln_head_j] (
  [Notrans] nvarchar(12) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Medrec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaPasien] nvarchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TglMasuk] datetime2(7)  NULL,
  [TglTrans] datetime2(7)  NULL,
  [KetDarah] nvarchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KetUrine] nvarchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KetSputum] nvarchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KetPus] nvarchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Antibiotik] nvarchar(225) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[trans_ipcln_head_j] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for trans_pengajuan


CREATE TABLE [dbo].[trans_pengajuan] (
  [no_pengajuan] char(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [kode_barang] char(10) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [jumlah_permintaan] int  NOT NULL,
  [jumlah_disetujui_1] int  NULL,
  [created_at] datetime DEFAULT (getdate()) NOT NULL,
  [updated_at] datetime DEFAULT (getdate()) NOT NULL,
  [jumlah_disetujui_2] int  NULL,
  [jumlah_disetujui_3] int  NULL,
  [jumlah_disetujui_4] int  NULL,
  [jumlah_diterima] int  NULL
)
GO

ALTER TABLE [dbo].[trans_pengajuan] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TransStorBNI


CREATE TABLE [dbo].[TransStorBNI] (
  [Id] int  IDENTITY(1,1) NOT NULL,
  [Regno] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Medrec] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RekeningPenerima] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [NamaPenerima] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalStor] datetime  NULL,
  [NominalStor] money  NULL,
  [ValidUser] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Shift] varchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [DataSet] varchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TransStorBNI] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TrapDisabledMO


CREATE TABLE [dbo].[TrapDisabledMO] (
  [Name] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [Type] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TrapDisabledMO] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for TrapEventParser


CREATE TABLE [dbo].[TrapEventParser] (
  [TYPE] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [NAME] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [PROPKEY] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [PROPVALUE] varchar(1000) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[TrapEventParser] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for tuserjp


CREATE TABLE [dbo].[tuserjp] (
  [username] varchar(60) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [password] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [nmuser] varchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [tingkat] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [login] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[tuserjp] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for UangMuka


CREATE TABLE [dbo].[UangMuka] (
  [NoBukti] nvarchar(14) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Tanggal] datetime2(7)  NULL,
  [Regno] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [RegDate] datetime2(7)  NULL,
  [MedRec] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Firstname] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdDoc] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdBangsal] nvarchar(4) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdKelas] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdCbayar] nvarchar(2) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [KdJaminan] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TerimaDari] nvarchar(40) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JumlahUang] bigint  NULL,
  [Shift] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [ValidUser] nvarchar(35) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Otor] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Status] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TRGroup] nvarchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JenisBayar] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [Keterangan] nvarchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [STprint] nvarchar(8) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [TanggalDat] datetime2(7)  NULL,
  [Lokasi] nvarchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [BayarCash] bigint  NULL,
  [BayarKartu] bigint  NULL,
  [BayarKart1] bigint  NULL,
  [ProsenKart] bigint  NULL,
  [ProsenKar1] bigint  NULL,
  [TotalKartu] bigint  NULL,
  [JenisKartu] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [JenisKart1] nvarchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[UangMuka] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for user


CREATE TABLE [dbo].[user] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [username] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [password] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [akses_level] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[user] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for users


CREATE TABLE [dbo].[users] (
  [id] bigint  IDENTITY(1,1) NOT NULL,
  [name] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [username] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [email] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [email_verified_at] datetime  NULL,
  [password] nvarchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [remember_token] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[users] SET (LOCK_ESCALATION = TABLE)
GO

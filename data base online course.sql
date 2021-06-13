drop table member

create table Member(
	IdM int,
	nama varchar (50),
	alamat varchar (100),
	email varchar (50),
	wallet money
)

create table Transaksi_kupon (
	waktu_transaksi date,
	IdTR int,
	IdM int
)

create table Tkupon (
	IdTR int,
	IdK int
)

create table kupon (
	nominal money,
	IdK int,
	kode_kupon varchar (10)
)

create table  enrollment (
	IdE int,
	wktEnrollment date
)

create table enrollment_member (
	IdM int,
	IdE int
)

create table nilai (
	IdN int,
	jumlah_nilai int,
	IdT int
)

create table nilai_member (
	IdM int,
	IdN int
)

create table course (
	batas_nilai int,
	judulCourse varchar (50),
	IdC int,
	IdS int,
	waktu_terbit_sertif date,
	IdP int
)

create table course_enrollment (
	IdE int,
	IdC int
)

create table isi_course (
	IdC int,
	IdMod int,
	id_ujian int
)

create table pengajar (
	nama varchar (50),
	IdP int,
	email varchar (50)
)
create table admin (
	idA int
)
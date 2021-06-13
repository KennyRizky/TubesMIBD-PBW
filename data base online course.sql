drop table member

create table Member(
	IdM int primary key,
	nama varchar (50),
	alamat varchar (100),
	email varchar (50),
	wallet money
)

create table Transaksi_kupon (
	waktu_transaksi date,
	IdTR int primary key,
	IdM int foreign key(
		IdM
	) references Member(IdM)
)

create table Tkupon (
	IdTR int foreign key(
		IdTR
	) references Transaksi_kupon(IdTR),
	IdK int foreign key(
		IdK
	) references kupon (IdK)
)

create table kupon (
	nominal money,
	IdK int,
	kode_kupon varchar (10)
)

create table  enrollment (
	IdE int primary key,
	wktEnrollment date
)

create table enrollment_member (
	IdM int foreign key (
		IdM
		) references member (IdM),
	IdE int foreign key (
		IdE
	) references enrollment (IdE)
)

create table nilai (
	IdN int primary key,
	jumlah_nilai int,
	IdC int foreign key (
		IdC
	) references course (IdC)
)

create table nilai_member (
	IdM int foreign key (
		IdM
		) references member (IdM),
	IdN int foreign key (
		IdN 
	) references nilai (IdN)
)

create table course (
	batas_nilai int,
	judulCourse varchar (50),
	IdC int primary key,
	IdS int,
	waktu_terbit_sertif date,
	IdP int foreign key (
		IdS
	) references pengajar (IdS)
)

create table course_enrollment (
	IdE int foreign key (
		IdE
	) references enrollment (IdE),
	IdC int foreign key (
		IdC
	) references course (IdC)
)

create table isi_course (
	IdC int foreign key (
		IdC
	) references course (IdC),
	IdMod int,
	id_ujian int
)


create table pengajar (
	nama varchar (50),
	IdP int primary key,
	email varchar (50)
)
create table admin (
	idA int primary key 
)





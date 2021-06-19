CREATE TABLE Member(
	IdM INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
	nama VARCHAR (50),
	pass VARCHAR (50),
	tgllahir DATE,
	alamat VARCHAR (100),
	email VARCHAR (50),
	wallet decimal(15,2)
);

CREATE TABLE kupon (
	IdK INT (6) UNSIGNED PRIMARY KEY,
	nominal decimal(15,2)
);
INSERT INTO kupon (IdK,nominal)
	values(1,10000);
INSERT INTO kupon (IdK,nominal)
	values(2,50000);
INSERT INTO kupon (IdK,nominal)
	values(3,100000);


CREATE TABLE Transaksi_kupon (
	IdTR INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
	waktu_transaksi DATE,
	IdM INT (6) UNSIGNED,
	CONSTRAINT FK_IdM
		FOREIGN KEY (IdM) REFERENCES Member(IdM),
	IdK INT (6) UNSIGNED,
	CONSTRAINT FK_IdK_TR
		FOREIGN KEY (IdK) REFERENCES kupon(IdK),
	payment_method varchar (50)
		
);


CREATE TABLE Tkupon (
	IdTR INT (6) UNSIGNED,
	IdK INT (6) UNSIGNED,
	CONSTRAINT FK_IdTR
		FOREIGN KEY (IdTR) REFERENCES Transaksi_kupon(IdTR),
	CONSTRAINT FK_IdK
		FOREIGN KEY (IdK) REFERENCES kupon(IdK)
);


CREATE TABLE  enrollment (
	IdE INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	wktEnrollment DATE
);

CREATE TABLE enrollment_member (
	IdM INT (6) UNSIGNED,
	IdE INT (6) UNSIGNED,
	CONSTRAINT fkidm
		FOREIGN KEY (IdM) REFERENCES member(IdM),
	CONSTRAINT fkide
		FOREIGN KEY (IdE) REFERENCES enrollment(IdE)
);

CREATE TABLE pengajar (
	IdP INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nama VARCHAR (50),
	pass varchar (50),
	email VARCHAR (50),
	alamat VARCHAR(50),
	tgllahir DATE,
	ijazah varchar (50)
);

CREATE TABLE course (
	IdC INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	batas_nilai INT (6),
	judulCourse VARCHAR (50),
	IdS INT (6),
	waktu_terbit_sertif DATE,
	IdP INT (6) UNSIGNED,
	CONSTRAINT fkidp
		FOREIGN KEY (IdP) REFERENCES pengajar(IdP)
);

CREATE TABLE nilai (
	IdN INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	jumlah_nilai INT (6),
	IdC INT (6) UNSIGNED,
	CONSTRAINT fkidc
		FOREIGN KEY (IdC) REFERENCES course(IdC)
);

CREATE TABLE nilai_member (
	IdM INT (6) UNSIGNED,
	IdN INT (6) UNSIGNED,
	CONSTRAINT foreignkeyidm
		FOREIGN KEY (IdM) REFERENCES Member(IdM),
	CONSTRAINT foreignkeyidn
		FOREIGN KEY (IdN) REFERENCES nilai(IdN)
);


CREATE TABLE course_enrollment (
	IdE INT (6) UNSIGNED,
	IdC INT (6) UNSIGNED,
	CONSTRAINT foreignkeyide
		FOREIGN KEY (IdE) REFERENCES enrollment(IdE),
	CONSTRAINT foreignkeyidc
		FOREIGN KEY (IdC) REFERENCES course(IdC)
);

CREATE TABLE isi_course (
	IdC INT (6) UNSIGNED,
	CONSTRAINT fk_idc
		FOREIGN KEY (IdC) REFERENCES course(IdC),
	IdMod INT (6) UNSIGNED,
	id_ujian INT (6) UNSIGNED
);

create table modul(
	IdMod int (6) unsigned AUTO_INCREMENT PRIMARY KEY,
	isiMod varchar (5000)
);

create table pertanyaan_ujian(
	id_pertanyaan int (6) unsigned AUTO_INCREMENT PRIMARY KEY,
	IdC INT (6) UNSIGNED,
	CONSTRAINT foreignkeyujian
		FOREIGN KEY (IdC) REFERENCES course(IdC),
	isi_pertanyaan varchar (500),
	jawaban int (1)
);

CREATE TABLE admin (
	idA INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	IdTR INT (6) UNSIGNED,
		CONSTRAINT IdTR
			FOREIGN KEY (IdTR) REFERENCES Transaksi_kupon(IdTR),
	IdTR_validasi int (1)
);





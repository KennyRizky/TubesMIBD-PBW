CREATE TABLE Member(
	IdM INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
	nama VARCHAR (50),
	pass VARCHAR (50),
	tgllahir DATE,
	alamat VARCHAR (100),
	email VARCHAR (50),
	wallet INT(20)
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
	hargaCourse INT (20),
	IdS INT (6),
	waktu_terbit_sertif DATE,
	courseDesc VARCHAR (1000),
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

CREATE TABLE ujian(
	id_ujian INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY
);

create table modul(
	IdMod int (6) unsigned AUTO_INCREMENT PRIMARY KEY,
	JudulMod varchar (100),
	isiMod varchar (5000)
);

CREATE TABLE isi_courseMod (
	IdC INT (6) UNSIGNED,
	CONSTRAINT fk_idc
		FOREIGN KEY (IdC) REFERENCES course(IdC),
	IdMod INT (6) UNSIGNED,
	CONSTRAINT fk_idmod
		FOREIGN KEY (IdMod) REFERENCES modul(IdMod)
);

CREATE TABLE isi_courseUjian(
	IdC INT (6) UNSIGNED,
	CONSTRAINT fk_idcourse
		FOREIGN KEY (IdC) REFERENCES course(IdC),
	id_ujian INT (6) UNSIGNED,
	CONSTRAINT foreignkeyUjian
		FOREIGN KEY (id_ujian) REFERENCES ujian(id_ujian)
);

create table pertanyaan_ujian(
	id_pertanyaan int (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	IdC INT (6) UNSIGNED,
	CONSTRAINT foreignkeycourse
		FOREIGN KEY (IdC) REFERENCES course(IdC),
	isi_pertanyaan varchar (500),
	id_ujian INT (6) UNSIGNED,
	CONSTRAINT foreignkeyujian
		FOREIGN KEY (id_ujian) REFERENCES ujian(id_ujian)
);

CREATE TABLE option_ujian(
	id_option INT (6) unsigned AUTO_INCREMENT PRIMARY KEY,
	id_pertanyaan INT (6) UNSIGNED,
		CONSTRAINT foreignkeyIdPertanyaan
		FOREIGN KEY (id_pertanyaan) REFERENCES pertanyaan_ujian(id_pertanyaan),
	isi_option VARCHAR (100),
	jawaban INT (1)

);
 
CREATE TABLE admin (
	idA INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	namaAdmin VARCHAR (50),
	pass VARCHAR (50),
	email VARCHAR (50)

);

CREATE TABLE validasi_transaksiKupon (
	IdTR INT (6) UNSIGNED,
		CONSTRAINT IdTRValidasi
			FOREIGN KEY (IdTR) REFERENCES Transaksi_kupon(IdTR),
	IdTR_validasi int (1)
);

CREATE TABLE validasi_nilai (
	IdN INT(6) UNSIGNED,
		CONSTRAINT IdNValidasi
			FOREIGN KEY (IdN) REFERENCES nilai(IdN),
	IdE INT(6) UNSIGNED,
		CONSTRAINT IdEValidasi
			FOREIGN KEY (IdE) REFERENCES enrollment(IdE),
	
	IdN_validasi INT(1) UNSIGNED


);

INSERT INTO admin (IdA,namaAdmin, pass, email)
VALUES (DEFAULT, 'ALMIGHTYGOD', '6666666666', 'fransiskus@gmail.com');
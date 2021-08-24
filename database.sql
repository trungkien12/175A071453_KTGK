CREATE TABLE chuc_vu(
    id int NOT NULL AUTO_INCREMENT,
    ten_chuc_vu varchar(100) NOT NULL,
    mo_ta text NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE don_vi(
    id int NOT NULL AUTO_INCREMENT,
    ten_don_vi varchar(100) NOT NULL,
    mo_ta text NOT NULL,
     PRIMARY KEY (id)
);


CREATE TABLE quan_tri_vien (
    id int NOT NULL AUTO_INCREMENT,
    ho_va_ten varchar(100) NOT NULL,
    email varchar(100) NOT NULL UNIQUE,
    mat_khau varchar(100) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE can_bo (
    id int NOT NULL AUTO_INCREMENT,
    ho_va_ten varchar(100) NOT NULL,
    email varchar(100) NOT NULL,
    so_dien_thoai varchar(10) NOT NULL,
    dia_chi text NOT NULL,
    id_chuc_vu int NOT NULL,
    id_don_vi int NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_chuc_vu) REFERENCES chuc_vu(id),
    FOREIGN KEY (id_don_vi) REFERENCES don_vi(id)
);


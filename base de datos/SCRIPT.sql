CREATE TABLE personal
(
    ci  VARCHAR(50) ,
    nom_ap  VARCHAR(300)  NOT NULL,
    cargo  VARCHAR(150) ,
    nivel  VARCHAR(50) ,
    repart_uni  VARCHAR(400) ,
    CONSTRAINT personal_pkey PRIMARY KEY (ci)
)
CREATE TABLE administrador
(
    usuario  VARCHAR(50) PRIMARY KEY NOT NULL,
    password  VARCHAR(100)  NOT NULL
);

INSERT INTO administrador VALUES ('admin','2oumnsalud20');

CREATE TABLE inscritos
(
    ci  VARCHAR(50) ,
    cel integer,
    tel_dom integer,
    cel_ref integer,
    equipos  VARCHAR(150) ,
    formacion  VARCHAR(150),
    condicion_lab  VARCHAR(150) ,
    correo_per  VARCHAR(200) ,
    correo_umsalud  VARCHAR(200) ,
    correo_umsa  VARCHAR(200) ,
    funciones_resumen  VARCHAR(200) ,
    equipos_laboral  VARCHAR(200) ,
    patologia_base  VARCHAR(200) ,
    activo integer,
    activo_patologia  VARCHAR(3) ,
    CONSTRAINT fktest FOREIGN KEY (ci)
        REFERENCES personal (ci) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
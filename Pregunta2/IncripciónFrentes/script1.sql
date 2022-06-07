create table Frente
(
    idFrente varchar(5),
    nombre varchar(50),
    sigla varchar(5)
);
 create table Candidato
 (
     codCandidato varchar(5),
     nombrecompleto varchar(50),
     fechanacimiento date,
     ci varchar(10),
     titulo varchar(20),
     idfrente varchar(5)
 );

 INSERT INTO `frente`(`idFrente`, `nombre`, `sigla`) VALUES ('009','movimiento al socialismo','MAS')
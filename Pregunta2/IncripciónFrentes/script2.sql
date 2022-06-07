create table FlujoProceso					
(
Flujo varchar(3),
Proceso varchar(3),
ProcesoSiguiente varchar(3),
Tipo varchar(1),
Pantalla varchar(20),
Rol varchar(20)
);

create table FlujoProcesoCondicionante
(			
Flujo varchar(3),
Proceso varchar(3),
ProcesoSI varchar(3),
ProcesoNO varchar(3)
);

create table FlujoProcesoSeguimiento
(
    Flujo varchar(3),
    Proceso varchar(3),
    NumeroTramite int,
    Usuario varchar(5),
    FechaInicio date,
    HoraInicio time,
    FechaFin date,
    HoraFin time
);

insert into FlujoProceso values('F1','P1','P2','I','Inicio','Frente');
insert into FlujoProceso values('F1','P2','P3','P','Documentos','Frente');
insert into FlujoProceso values('F1','P3','P4','P','Presentar','Frente');
insert into FlujoProceso values('F1','P4','P5','P','Recepcion','ComiteElectoral');
insert into FlujoProceso values('F1','P5',null,'C','AlDia','ComiteElectoral');
insert into FlujoProceso values('F1','P6',null,'F','CausaNegativa','ComiteElectoral');
insert into FlujoProceso values('F1','P7','p8','P','Inscripcion','ComiteElectoral');
insert into FlujoProceso values('F1','P8',null,'P','PrepararElecciones','Frente');

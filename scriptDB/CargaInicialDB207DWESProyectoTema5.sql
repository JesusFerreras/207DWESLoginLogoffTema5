delete from DB207DWESProyectoTema5.T01_Usuario;
insert into DB207DWESProyectoTema5.T01_Usuario (T01_CodUsuario,T01_Password,T01_DescUsuario,T01_Perfil) values
    ('admin', sha2('adminpaso', 256), 'administrador', 'administrador'),
    ('heraclio', sha2('heracliopaso', 256), 'usuario 1', 'usuario'),
    ('amor', sha2('amorpaso', 256), 'usuario 2', 'usuario'),
    ('victor', sha2('victorpaso', 256), 'usuario 3', 'usuario'),
    ('alex', sha2('alexpaso', 256), 'usuario 4', 'usuario'),
    ('jesus', sha2('jesuspaso', 256), 'usuario 5', 'usuario'),
    ('luis', sha2('luispaso', 256), 'usuario 6', 'usuario')
;

delete from DB207DWESProyectoTema5.T02_Departamento;
insert into DB207DWESProyectoTema5.T02_Departamento(T02_CodDepartamento,T02_DescDepartamento,T02_VolumenDeNegocio) values
    ('AAA', 'Departamento 1', 1.01),
    ('BBB', 'Departamento 2', 2.02),
    ('CCC', 'Departamento 3', 3.03),
    ('DDD', 'Departamento 4', 4.04)
;
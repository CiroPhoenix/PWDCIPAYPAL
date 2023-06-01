delimiter //
create procedure AgregarCurso(InstructorCurso INT,  CostoCurso decimal, DescripcionCurso varchar(100), FotoCurso LONGBLOB,TituloCurso VARCHAR(45),FotoCurso2 LONGBLOB,FotoCurso3 LONGBLOB,CategoriaCurso VARCHAR(255),path_video VARCHAR(100),nombre_video VARCHAR(100),type_video VARCHAR(50), content_type VARCHAR(50), nombre_usuario VARCHAR(100))
begin 
INSERT INTO curso(Instructor_Curso,  Costo_Curso, Descripcion_Curso, Foto_Curso, Titulo_Curso, Foto_Curso2, Foto_Curso3,Categoria_Curso,path_video,nombre_video,type_video,content_type,nombre_usuario) VALUES (InstructorCurso, CostoCurso,  DescripcionCurso, FotoCurso,TituloCurso,FotoCurso2,FotoCurso3,CategoriaCurso,path_video,nombre_video,type_video,content_type,nombre_usuario);
end//
delimiter ;

drop procedure AgregarCurso;


delimiter //
create procedure AgregarCategoria(InstructorCategoria INT, TituloCategoria varchar(100), DescripcionCategoria varchar(200))
begin 

INSERT INTO categoria(Instructor_Categoria,Titulo_Categoria, Descripcion_Categoria) VALUES (InstructorCategoria, TituloCategoria, DescripcionCategoria);
end//
delimiter ;




delimiter //
create procedure RegistrarUsuario(FotoUsuario LONGBLOB, NombreUsuario varchar(45), NombrePaterno varchar(45),NombreMaterno varchar(45),RolUsuario enum ('Maestro','Estudiante','Administrador'),GeneroUsuario enum('Masculino','Femenino'),NacimientoUsuario datetime,CorreoUsuario varchar(45),NombreUsername varchar(45),PasswordUsuario varchar(45))
begin 

INSERT INTO usuario (`Foto_Usuario`,`Nombre_Usuario`, `NomPatr_Usuario`, `NomMatr_Usuario`,`Rol_Usuario`, `Genero_Usuario`, `Nacimiento_Usuario`, `Correo_Usuario`,`Nombre_usuario_Usuario`, `Contrasena_Usuario`)
            VALUES (FotoUsuario,NombreUsuario, NombrePaterno,NombreMaterno,RolUsuario,GeneroUsuario,NacimientoUsuario,CorreoUsuario,NombreUsername,PasswordUsuario);
end//
delimiter ;



delimiter //
create procedure VerUsuarios()
begin 
select * from usuario;
end//
delimiter ;

delimiter //
create procedure ModificarCurso(IDCurso INT, CostoCurso decimal, DescripcionCurso varchar(100), FotoCurso LONGBLOB,TituloCurso VARCHAR(45),FotoCurso2 LONGBLOB,FotoCurso3 LONGBLOB,CategoriaCurso VARCHAR(255), path_video VARCHAR(100),nombre_video VARCHAR(100),type_video VARCHAR(50), content_type VARCHAR(50), nombre_usuario VARCHAR(100))
begin 
UPDATE curso set  Costo_Curso=CostoCurso, Descripcion_Curso=DescripcionCurso, Foto_Curso=FotoCurso, Titulo_Curso=TituloCurso, Foto_Curso2=FotoCurso2, Foto_Curso3=FotoCurso3,Categoria_Curso=CategoriaCurso, path_video=path_video, nombre_video=nombre_video, type_video=type_video, content_type=content_type, nombre_usuario=nombre_usuario   WHERE ID_Curso = IDCurso;
end//
delimiter ;

drop procedure ModificarCurso;

execute VerUsuarios;
delimiter //
create procedure VerUsuariosRecientes()
begin 
SELECT * from usuario ORDER BY Nombre_usuario_Usuario asc;
end//
delimiter ;


delimiter //
create procedure VerUsuariosAntiguos()
begin 
SELECT * from usuario ORDER BY Nombre_usuario_Usuario desc;
end//
delimiter ;



delimiter //
create procedure VerEstudiantes()
begin 
SELECT * from usuario where `Rol_Usuario` = 'Estudiante';
end//
delimiter ;



delimiter //
create procedure VerMaestros()
begin 
SELECT * from usuario where `Rol_Usuario` = 'Maestro';
end//
delimiter ;


delimiter //
create procedure VerAdministradores()
begin 
SELECT * from usuario where `Rol_Usuario` = 'Administrador';
end//
delimiter ;


delimiter //
create procedure MostrarFotoDeUsuario(IDSelecionado int)
begin 


SELECT Foto_Usuario from usuario where ID_Usuario= IDSelecionado;
end//
delimiter ;



delimiter //
create procedure EditarUsuario(FotoUsuario LONGBLOB, NombreUsuario varchar(45), NombrePaterno varchar(45),NombreMaterno varchar(45), GeneroUsuario enum('Masculino','Femenino'),NacimientoUsuario datetime,CorreoUsuario varchar(45),NombreUsername varchar(45),PasswordUsuario varchar(45),IDUsuario int)
begin 

UPDATE usuario set Foto_Usuario= FotoUsuario, Nombre_Usuario= NombreUsuario, NomPatr_Usuario= NombrePaterno, NomMatr_Usuario= NombreMaterno,  Genero_Usuario=GeneroUsuario, Nacimiento_Usuario=NacimientoUsuario, Correo_Usuario=CorreoUsuario, Nombre_usuario_Usuario=NombreUsername, Contrasena_Usuario=PasswordUsuario WHERE ID_Usuario= IDUsuario;
end//
delimiter ;


drop procedure EditarUsuario;










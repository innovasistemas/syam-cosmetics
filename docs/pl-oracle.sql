create or replace procedure sp_insertar_departamento(nombre in varchar2) -- returns character as $$
is
begin 
insert into jm_departamentos(descripcion)
values (nombre);

end sp_insertar_departamento;
-- $$ 
-- language plpgsql


create or replace procedure sp_insertar_nomina(p_fecha_pago in date, p_valor_pago in number, p_empleado_id in number) 
is
begin 
insert into jm_nomina(fecha_pago, valor_pago, empleado_id)
values (p_fecha_pago, p_valor_pago, p_empleado_id);
end sp_insertar_nomina;



create or replace function fn_validar_salario(p_id in number) 
return boolean
is
	sw boolean;
	salario number;
	cursor c_buscar is
		select salario
		from jm_departamentos
		where id = p_id;
begin 
	open c_buscar;
	fetch c_buscar into salario;
	close c_buscar;
	
	if salario >= 1000000 then
		sw := true;
	else
		sw := false;
	end if;
return sw;
end fn_validar_salario;


select JM_EMPLEADOS.CEDULA || JM_EMPLEADOS.NOMBRE AS identificador, JM_EMPLEADOS.id
from JM_EMPLEADOS JM_EMPLEADOS





sqlplus /nolog


conn sys as sysdba
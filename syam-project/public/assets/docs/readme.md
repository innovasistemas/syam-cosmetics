# Versiones de tecnologías

- HTML5
- CSS3
- Bootstrap 4.5.3
- Material Design for Bootstrap MDB FREE 4.19.1
- ECMAScript ES6 (Javascript)
- jQuery 3.4.1
- XAMPP 3.2.4
- Apache 2.4.43
- PHP 7.4.8
- CodeIgniter 4.0.4
- MariaDB 10.4.13 - MySQL 14.14 Distrib 5.7.25
- Composer 2.0.4


# Estructura del objeto JSON para solicitar registros de cualquier tabla

- store: propiedad que contiene elementos de la base de datos, tal y como las tablas
- list: corresponde a la tabla que se desea consultar
- code: código de la tabla a consultar
- identifier: especifica el id de la tabla a consultar. Sino se envía, indica que se solicitan todos los registros o se está haciendo un insert
- attributes: especifica el campo id, ya sea para mostrar o actualizar. 

```
objJson = {
	store: {
		list: code
	},
	attributes: {
		identifier: id
	}
}
```


# Módulos de la aplicación
La aplicación está compuesta de los siguientes módulos que agrupan las distintas tablas de la base de datos

### Configuración

- city
- component
- contract_type
- country
- currency
- department
- entity_type
- exchange_rate
- parameter
- parameter_category
- payment_method
- product
- service_entity
- unit_measurement
- way_to_pay
- person
- permission
- loan_status


### Usuarios

- profile
- user
- access
- operation


### Ventas

- customer
- sale_order
- sale_detail



### Compras

- provider
- purchase_order
- purchase_detail


### Nómina

- employee
- employee_document
- contract_type_employee
- employee_service_entity
- payroll
- payroll_detail
- loan
- loan_payment


# Fuentes

- Actualizar versión de PHP a 7.3
https://informaticaeficiente.com/actualizar-php-7-3/

- Sitio oficial CodeIgniter
https://codeigniter.com/

- Guía oficial CodeIgniter
https://codeigniter.com/user_guide/intro/index.html

- Otras fuentes
https://xpertphp.com/codeigniter-4-crud-create-read-update-delete-tutorial-for-beginners/
https://parzibyte.me/blog/2019/07/29/codeigniter-4-creacion-proyecto-novedades/

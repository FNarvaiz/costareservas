


Create table [ESTADIAS]
(
	[id_reserva] Integer NOT NULL,
	[id_ocupacion] Integer NOT NULL,
Primary Key ([id_ocupacion])
) 
go

Create table [PERMISOS]
(
	[Permiso] Varchar(30) NOT NULL,
	[Unidades] Bit NOT NULL,
	[Estadisticas] Bit NOT NULL,
	[Usuarios] Bit NOT NULL,
	[Cuentas] Bit NOT NULL,
	[Ocupaciones] Bit NOT NULL,
	[Bar] Bit NOT NULL,
	[Ventas] Bit NOT NULL,
	[Operaciones] Bit NOT NULL,
	[Reservas] Bit NOT NULL,
	[Cajas] Bit NOT NULL,
	[Configuracion] Bit NOT NULL,
	[Verificador] Bit Default 0 NOT NULL,
Primary Key ([Permiso])
) 
go

Create table [ARTICULOS]
(
	[Codigo] Varchar(20) NOT NULL,
	[Stock] Decimal(11,2) NOT NULL,
	[Costo] Decimal(10,2) NULL,
	[id_consumo] Integer NOT NULL,
Primary Key ([Codigo],[id_consumo])
) 
go

Create table [FORMAS_PAGOS]
(
	[id_Forma_Pago] Integer NOT NULL,
	[Nombre] Varchar(50) NOT NULL, UNIQUE ([Nombre]),
	[Altera_Caja] Bit Default 0 NOT NULL,
	[Ver_Cuentas] Bit NOT NULL,
	[Solo_cuentas_Propias] Bit NOT NULL,
	[Altera_limite] Bit NOT NULL,
	[Alta] Bit Default 1 NOT NULL,
	[Acarrear] Bit Default 1 NOT NULL,
	[Cotizar] Bit NOT NULL,
	[Relevante] Bit Default 1 NOT NULL,
	[Enviar_cuenta] Bit Default 0 NOT NULL,
Primary Key ([id_Forma_Pago])
) 
go

Create table [CONFIGURACION]
(
	[id_configuracion] Integer Identity NOT NULL,
	[IVA] Decimal(4,2) NULL,
	[Nombre_hotel] Varchar(60) NULL,
	[Nombre_Inmobiliaria] Varchar(60) NULL,
	[Slogan] Varchar(200) NULL,
	[Slogan_Inmobiliaria] Varchar(200) NULL,
	[LogoHotel] Image NULL,
	[LogoInmobiliaria] Image NULL,
	[LogoHotelURL] Varchar(300) NULL,
	[LogoInmobiliariaURL] Varchar(300) NULL,
	[HoraCheckIn] Varchar(5) NULL,
	[HoraCheckOut] Varchar(5) NULL,
	[TextoCheckOut] Varchar(500) NULL,
	[Domicilio] Varchar(100) NULL,
	[Domicilio_Inmobiliaria] Char(100) NULL,
	[Telefono] Varchar(30) NULL,
	[Telefono_Inmobiliaria] Varchar(30) NULL,
	[Celular] Varchar(30) NULL,
	[PaginaHotel] Varchar(100) NULL,
	[PaginaInmobiliaria] Varchar(30) NULL,
	[SubconceptoSenia] Integer NULL,
	[SubconceptoPago] Integer NULL,
	[SubconceptoVenta] Integer NULL,
	[EnviarEmail] Bit NOT NULL,
	[LeyendaSenia] Varchar(300) NULL,
	[ServerHost] Varchar(30) NULL,
	[Puerto] Integer NULL,
	[MatriculaMartillero] Integer NULL,
	[EstadoConfirmacion] Integer NULL,
	[EstadoVencida] Integer NULL,
	[EstadoPendiente] Integer NULL,
	[CuentaPredefinidaPropia] Integer NULL,
	[Celular_Inmobiliaria] Varchar(30) NULL,
	[SubconceptoACuenta] Integer NULL,
	[IncluirAdicional] Bit Default 1 NOT NULL,
	[FormaDePago_CA] Integer Default 0 NOT NULL,
	[CondicionesUnidades] Bit Default 0 NOT NULL,
	[Limpieza_automatizada] Bit Default 1 NOT NULL,
	[alto_fila] int Default 36 NOT NULL,
	[SSL] Bit Default 1 NOT NULL,
Primary Key ([id_configuracion])
) 
go

Create table [CONCEPTOS]
(
	[id_concepto] Integer NOT NULL,
	[Descripcion] Varchar(100) NOT NULL,
	[Ingreso] Bit NOT NULL,
	[Egreso] Bit NOT NULL,
Primary Key ([id_concepto])
) 
go

Create table [OPERACIONES]
(
	[id_operacion] Integer NOT NULL,
	[id_Forma_Pago] Integer NOT NULL,
	[Importe] Decimal(10,2) NOT NULL,
	[Ingreso] Bit NOT NULL,
	[Fecha] Datetime NOT NULL,
	[id_subconcepto] Integer NOT NULL,
	[DNI_usuario] Integer NOT NULL,
	[Comentario] Varchar(200) NULL,
	[Verificada] Bit NOT NULL,
	[id_caja] Integer NOT NULL,
Primary Key ([id_operacion])
) 
go

Create table [UNIDADES]
(
	[id_lugar] Integer NOT NULL,
	[Descripcion] Varchar(100) NOT NULL,
	[Banos] Integer NOT NULL,
	[id_tipo] Integer NULL,
Primary Key ([id_lugar])
) 
go

Create table [CLIENTES]
(
	[DNI_cliente] Integer NOT NULL,
	[Nombre] Varchar(50) NOT NULL,
	[Telefono] Varchar(25) NULL,
	[Celular] Varchar(25) NULL,
	[Mail] Varchar(60) NULL,
	[id_Localidad] Integer NOT NULL,
	[Direccion] Varchar(100) NULL,
	[Profesion] Varchar(30) NULL,
	[Fecha_nac] Datetime NULL,
Primary Key ([DNI_cliente])
) 
go

Create table [USUARIOS]
(
	[DNI_usuario] Integer NOT NULL,
	[Nombre] Varchar(25) NOT NULL,
	[Telefono] Varchar(25) NULL,
	[Celular] Varchar(25) NULL,
	[Direccion] Varchar(100) NULL,
	[Mail] Varchar(40) NULL,
	[Password_Mail] Varchar(150) NULL,
	[Password] Varchar(150) NOT NULL,
	[id_Localidad] Integer NOT NULL,
	[Interfaz] Varchar(30) NOT NULL,
	[Permiso] Varchar(30) NOT NULL,
	[Alta] Bit Default 1 NOT NULL,
Primary Key ([DNI_usuario])
) 
go

Create table [VENTAS]
(
	[Total] Decimal(10,2) NOT NULL,
	[Fecha] Datetime NOT NULL,
	[DNI_usuario] Integer NOT NULL,
	[id_venta] Integer NOT NULL,
	[id_ocupacion] Integer NOT NULL,
Primary Key ([id_venta])
) 
go

Create table [TIPOS_RESERVAS]
(
	[id_tipo] Integer NOT NULL,
	[Nombre] Varchar(60) NOT NULL,
	[Camas_una_plaza] Integer NULL,
	[Camas_dos_plazas] Integer NULL,
	[Cant_personas] Integer Default 1 NOT NULL,
Primary Key ([id_tipo])
) 
go

Create table [ESTADOS]
(
	[id_estado] Integer NOT NULL,
	[Nombre] Varchar(60) NOT NULL,
	[id_color] Integer NOT NULL,
	[Inicial] Bit NOT NULL,
	[Cancelada] Bit Default 0 NOT NULL,
	[Pedir_Senia] Bit Default 0 NOT NULL,
Primary Key ([id_estado])
) 
go

Create table [PROPIETARIOS]
(
	[DNI_propietario] Integer NOT NULL,
	[Nombre] Varchar(50) NOT NULL,
	[Telefono] Varchar(25) NULL,
	[Celular] Varchar(25) NULL,
	[Direccion] Varchar(100) NULL,
	[Mail] Varchar(40) NULL,
	[Password] Char(8) Default 0 NULL,
	[Alta] Bit NOT NULL,
	[id_Localidad] Integer NOT NULL,
Primary Key ([DNI_propietario])
) 
go

Create table [SERVICIOS]
(
	[id_servicio] Integer NOT NULL,
	[Nombre] Varchar(60) NOT NULL,
	[Bar] Bit NOT NULL,
Primary Key ([id_servicio])
) 
go

Create table [CUENTAS]
(
	[DNI_propietario] Integer NOT NULL,
	[id_cuenta] Integer NOT NULL,
	[Nro_Sucursal] Integer NOT NULL,
	[id_banco] Integer NOT NULL,
	[Titular] Varchar(100) NOT NULL,
	[Cuit] Varchar(20) NULL,
	[CBU] Varchar(30) NULL,
	[Num_cuenta] Varchar(20) NOT NULL,
	[Propia] Bit NOT NULL,
	[Alta] Bit NOT NULL,
	[EsCuit] Bit Default 1 NOT NULL,
	[id_tipo_cuenta] Integer NOT NULL,
Primary Key ([id_cuenta])
) 
go

Create table [PAGOS]
(
	[id_operacion] Integer NOT NULL,
	[id_ocupacion] Integer NOT NULL,
	[Cotizacion] Decimal(10,2) NULL,
Primary Key ([id_operacion])
) 
go

Create table [TAREAS]
(
	[Por_una_plaza] Bit NULL,
	[Por_dos_plazas] Bit NULL,
	[Por_persona] Bit NULL,
	[Por_banos] Bit NULL,
	[Descripcion] Varchar(50) NOT NULL,
	[id_tarea] Integer NOT NULL,
Primary Key ([id_tarea])
) 
go

Create table [PAQUETES]
(
	[id_paquete] Integer NOT NULL,
	[Nombre] Varchar(60) NOT NULL,
	[id_color] Integer NOT NULL,
	[Alta] Bit Default 1 NOT NULL,
Primary Key ([id_paquete])
) 
go

Create table [PAQUETES-SERVICIOS]
(
	[id_paquete] Integer NOT NULL,
	[id_servicio] Integer NOT NULL,
Primary Key ([id_paquete],[id_servicio])
) 
go

Create table [CONTRATOS]
(
	[id_contrato] Integer NOT NULL,
	[id_cuenta] Integer NOT NULL,
	[Desde] Datetime NOT NULL,
	[Hasta] Datetime NOT NULL,
	[Limite] Decimal(10,2) NOT NULL,
	[Saldo] Decimal(10,2) NOT NULL,
	[Total] Decimal(10,2) NOT NULL,
	[Observacion] Varchar(100) NULL,
	[Cerrado] Bit NOT NULL,
	[DNI_usuario] Integer NOT NULL,
Primary Key ([id_contrato])
) 
go

Create table [SUBCONCEPTOS]
(
	[id_subconcepto] Integer NOT NULL,
	[Descripcion] Varchar(100) NOT NULL,
	[id_concepto] Integer NOT NULL,
	[ContraAsiento] Bit Default 0 NOT NULL,
Primary Key ([id_subconcepto])
) 
go

Create table [BANCOS]
(
	[id_banco] Integer NOT NULL,
	[Nombre] Varchar(50) NOT NULL,
Primary Key ([id_banco])
) 
go

Create table [SUCURSALES]
(
	[Nro_Sucursal] Integer NOT NULL,
	[id_banco] Integer NOT NULL,
Primary Key ([Nro_Sucursal],[id_banco])
) 
go





Create table [COLORES]
(
	[id_color] Integer NOT NULL,
	[Nombre] Varchar(30) NULL,
	[R] Integer Default 0 NOT NULL,
	[G] Integer NOT NULL,
	[B] Integer Default 0 NOT NULL,
Primary Key ([id_color])
) 
go

Create table [INTERFACES]
(
	[Interfaz] Varchar(30) NOT NULL,
	[Btn_Down] Integer NOT NULL,
	[Btn_Normal] Integer NOT NULL,
	[Btn_Hover] Integer NOT NULL,
	[Textbox] Integer NOT NULL,
	[Fuente] Integer NOT NULL,
	[Panel] Integer NOT NULL,
	[Fondo] Integer NOT NULL,
	[Grilla] Integer NOT NULL,
Primary Key ([Interfaz])
) 
go

Create table [PROVEEDORES]
(
	[Nombre] Varchar(40) NOT NULL,
	[id_proveedor] Integer NOT NULL,
Primary Key ([id_proveedor])
) 
go

Create table [COMPRAS]
(
	[id_operacion] Integer NOT NULL,
	[id_categoria] Integer NOT NULL,
	[id_proveedor] Integer NOT NULL,
	[Iva] Decimal(10,2) NOT NULL,
	[Iva_percepcion] Decimal(10,2) NOT NULL,
	[Retenciones] Decimal(10,2) NOT NULL,
	[Nro_Factura] Integer NULL,
Primary Key ([id_operacion],[id_proveedor])
) 
go

Create table [SUBCONCEPTOS-PROVEEDORES]
(
	[id_proveedor] Integer NOT NULL,
	[id_subconcepto] Integer NOT NULL,
Primary Key ([id_proveedor],[id_subconcepto])
) 
go

Create table [CATEGORIAS]
(
	[Nombre] Varchar(30) NOT NULL,
	[id_categoria] Integer NOT NULL,
Primary Key ([id_categoria])
) 
go

Create table [SIGUIENTES]
(
	[anterior] Integer NOT NULL,
	[siguiente] Integer NOT NULL,
Primary Key ([anterior],[siguiente])
) 
go

Create table [CONTRATOS-OPERACIONES]
(
	[id_operacion] Integer NOT NULL,
	[id_contrato] Integer NOT NULL,
Primary Key ([id_operacion],[id_contrato])
) 
go

Create table [TIPOS_CAUSAS]
(
	[id_tipo] Varchar(20) NOT NULL,
	[Descripcion] Varchar(100) NOT NULL,
Primary Key ([id_tipo])
) 
go

Create table [CAUSAS]
(
	[id_ocupacion] Integer NOT NULL,
	[id_tipo] Varchar(20) NOT NULL,
Primary Key ([id_ocupacion])
) 
go

Create table [ADICIONALES]
(
	[id_lugar] Integer NOT NULL,
	[DNI_propietario] Integer NOT NULL,
Primary Key ([id_lugar])
) 
go

Create table [PROPIETARIOS-ADICIONALES]
(
	[DNI_propietario] Integer NOT NULL,
	[id_lugar] Integer NOT NULL,
Primary Key ([DNI_propietario],[id_lugar])
) 
go

Create table [SUGERENCIAS]
(
	[id_unidad] Integer NOT NULL,
	[id_adicional] Integer NOT NULL,
Primary Key ([id_unidad],[id_adicional])
) 
go

Create table [REGISTROS]
(
	[id] Integer Identity NOT NULL,
	[Fecha] Datetime NOT NULL,
	[Ocupacion] Integer NULL,
	[Reserva] Integer NOT NULL,
	[Operacion] Integer NOT NULL,
	[Venta] Integer NOT NULL,
	[Lugar] Integer NOT NULL,
	[M] Bit NOT NULL,
	[A] Bit NOT NULL,
	[B] Bit NOT NULL,
	[id_registro] Integer NULL,
Primary Key ([id])
) 
go

Create table [CONSUMOS]
(
	[id_consumo] Integer NOT NULL,
	[Descripcion] Varchar(200) NOT NULL,
	[Precio] Decimal(10,2) NOT NULL,
	[Alta] Bit NOT NULL,
Primary Key ([id_consumo])
) 
go

Create table [ITEMS-CONSUMOS]
(
	[id_consumo] Integer NOT NULL,
	[id_venta] Integer NOT NULL,
	[Cant] Decimal(10,2) NOT NULL,
	[Importe] Decimal(10,2) NOT NULL,
Primary Key ([id_consumo],[id_venta])
) 
go

Create table [EXTERNAS]
(
	[Direccion] Varchar(200) NULL,
	[DNI_propietario] Integer NOT NULL,
	[id_lugar] Integer NOT NULL,
Primary Key ([id_lugar])
) 
go

Create table [CAJAS]
(
	[Fecha] Datetime NOT NULL,
	[id_caja] Integer NOT NULL,
	[Cerrada] Bit NOT NULL,
Primary Key ([id_caja])
) 
go

Create table [SALDOS-ANTERIORES]
(
	[id_Forma_Pago] Integer NOT NULL,
	[id_caja] Integer NOT NULL,
	[Importe] Decimal(10,2) NOT NULL,
Primary Key ([id_Forma_Pago],[id_caja])
) 
go

Create table [OCUPACIONES]
(
	[id_ocupacion] Integer NOT NULL, UNIQUE ([id_ocupacion]),
	[desde] Datetime NOT NULL,
	[hasta] Datetime NOT NULL,
	[descripcion] Varchar(50) NOT NULL,
	[id_lugar] Integer NOT NULL,
	[Importe] Decimal(10,2) NOT NULL,
Primary Key ([id_ocupacion])
) 
go

Create table [SALDOS-CUENTAS]
(
	[id_cuenta] Integer NOT NULL,
	[id_caja] Integer NOT NULL,
	[Importe] Decimal(10,2) NOT NULL,
Primary Key ([id_cuenta],[id_caja])
) 
go

Create table [SENIAS]
(
	[id_operacion] Integer NOT NULL,
	[Pendiente] Bit NOT NULL,
	[Fecha_venc] Datetime NOT NULL,
Primary Key ([id_operacion])
) 
go

Create table [LEYENDAS]
(
	[id_leyenda] Integer NOT NULL,
	[Titulo] Varchar(100) NOT NULL,
	[Descripcion] Varchar(500) NOT NULL,
Primary Key ([id_leyenda])
) 
go

Create table [ESTADOS-LEYENDAS]
(
	[id_leyenda] Integer NOT NULL,
	[PorDefecto] Bit NOT NULL,
	[id_Forma_Pago] Integer NOT NULL,
	[id_estado] Integer NOT NULL,
Primary Key ([id_leyenda])
) 
go

Create table [LUGARES]
(
	[id_lugar] Integer NOT NULL,
	[Nombre] Varchar(60) NOT NULL,
	[Alta] Bit NOT NULL,
	[id_tipo_lugar] Integer NOT NULL,
Primary Key ([id_lugar])
) 
go

Create table [RESERVAS]
(
	[id_reserva] Integer NOT NULL,
	[DNI_cliente] Integer NOT NULL,
	[Desde] Datetime NOT NULL,
	[Hasta] Datetime NOT NULL,
	[Cerrada] Bit NOT NULL,
	[Observaciones] Varchar(400) NULL,
	[Comentarios] Varchar(400) NULL,
	[Credito] Bit NOT NULL,
	[Precio] Decimal(10,2) NULL,
	[id_estado] Integer NOT NULL,
	[Alta] Bit NOT NULL,
	[Ultima_modificacion] Datetime NOT NULL,
	[DNI_usuario] Integer NOT NULL,
	[Fecha_Creada] Datetime NOT NULL,
	[id_origen] Integer NOT NULL,
Primary Key ([id_reserva])
) 
go

Create table [COMPLEJAS]
(
	[id_paquete] Integer NOT NULL,
	[id_tipo] Integer NOT NULL,
	[Pasajeros] Integer NOT NULL,
	[id_ocupacion] Integer NOT NULL,
	[Cuna] Bit NOT NULL,
Primary Key ([id_ocupacion])
) 
go

Create table [SERVICIOS-TAREAS]
(
	[id_servicio] Integer NOT NULL,
	[id_tarea] Integer NOT NULL,
	[Cant_Dias] Integer NOT NULL,
Primary Key ([id_servicio],[id_tarea])
) 
go

Create table [INCLUSIONES]
(
	[Estadia_Padre] Integer NOT NULL,
	[Estadia_Hijo] Integer NOT NULL,
Primary Key ([Estadia_Padre],[Estadia_Hijo])
) 
go

Create table [TIPOS_CUENTAS]
(
	[id_tipo_cuenta] Integer NOT NULL,
	[Nombre] Varchar(50) NOT NULL,
Primary Key ([id_tipo_cuenta])
) 
go

Create table [DEUDAS]
(
	[Saldo] Decimal(10,2) NOT NULL,
	[id_reserva] Integer NOT NULL,
Primary Key ([id_reserva])
) 
go

Create table [TIPOS_LUGARES]
(
	[id_tipo_lugar] Integer NOT NULL,
	[Descripcion] Varchar(40) NOT NULL,
	[Unidad] Bit NOT NULL,
	[Unidad_Externa] Bit NOT NULL,
Primary Key ([id_tipo_lugar])
) 
go

Create table [NOTAS]
(
	[id_nota] Integer NOT NULL,
	[Emisor] Integer NOT NULL,
	[Receptor] Integer NOT NULL,
	[Escrito] Datetime NOT NULL,
	[Aviso] Datetime NOT NULL,
	[Respuesta] Varchar(500) NOT NULL,
	[Nota] Varchar(1000) NOT NULL,
	[Mantenimiento] Bit NOT NULL,
	[Resuelto] Bit NOT NULL,
Primary Key ([id_nota])
) 
go

Create table [Servicios-Adicionales]
(
	[id_servicio] Integer NOT NULL,
	[id_ocupacion] Integer NOT NULL,
	[Precio] Decimal(10,2) NOT NULL,
	[Fecha] Datetime NOT NULL,
Primary Key ([id_servicio],[id_ocupacion])
) 
go

Create table [DERIVACIONES]
(
	[id_subconcepto] Integer NOT NULL,
	[id_lugar] Integer NOT NULL,
Primary Key ([id_subconcepto],[id_lugar])
) 
go

Create table [CONDICIONES]
(
	[Fecha] Datetime NOT NULL,
	[id_condicion] Integer NOT NULL,
	[id_lugar] Integer NOT NULL,
	[id_tipo] Integer NOT NULL,
Primary Key ([id_lugar])
) 
go

Create table [TIPOS_CONDICIONES]
(
	[id_condicion] Integer NOT NULL,
	[Nombre] Varchar(60) NULL,
	[id_color] Integer NOT NULL,
Primary Key ([id_condicion])
) 
go

Create table [MUCAMAS]
(
	[DNI_mucama] Integer NOT NULL,
	[id_Localidad] Integer NOT NULL,
	[Nombre] Varchar(50) NOT NULL,
	[Telefono] Varchar(25) NULL,
	[Celular] Varchar(25) NULL,
	[Mail] Varchar(60) NULL,
	[Direccion] Varchar(100) NULL,
	[Alta] Bit Default 1 NOT NULL,
Primary Key ([DNI_mucama])
) 
go

Create table [ASIGNACIONES]
(
	[id_lugar] Integer NOT NULL,
	[DNI_mucama] Integer NOT NULL,
Primary Key ([id_lugar],[DNI_mucama])
) 
go

Create table [RESULTADOS]
(
	[id_caja] Integer NOT NULL,
	[id_concepto] Integer NOT NULL,
	[Importe] Decimal(10,2) NOT NULL,
Primary Key ([id_caja],[id_concepto])
) 
go

Create table [FACTURACIONES]
(
	[id_lugar] Integer NOT NULL,
	[id_caja] Integer NOT NULL,
	[Importe] Decimal(10,2) NOT NULL,
Primary Key ([id_lugar],[id_caja])
) 
go

Create table [ESTADISTICAS]
(
	[Fecha] Datetime NOT NULL,
	[id_tipo_lugar] Integer NOT NULL,
	[Causas] Integer NOT NULL,
	[Reservas] Integer NOT NULL,
	[Unidades] Integer NOT NULL,
Primary Key ([Fecha],[id_tipo_lugar])
) 
go

Create table [PROVINCIAS]
(
	[id_Provincia] Integer NOT NULL,
	[Nombre] Varchar(50) NOT NULL,
	
Primary Key ([id_Provincia])
) 
go

Create table [LOCALIDADES]
(
	[id_Localidad] Integer NOT NULL,
	[Nombre] Varchar(50) NOT NULL,
	[id_Provincia] Integer NOT NULL,
Primary Key ([id_Localidad])
) 
go

Create table [ORIGENES]
(
	[id_origen] Integer NOT NULL,
	[Descripcion] Varchar(50) NOT NULL,
	[Comision] Decimal(10,2) NOT NULL,
Primary Key ([id_origen])
) 
go


Alter table [COMPLEJAS] add  foreign key([id_ocupacion]) references [ESTADIAS] ([id_ocupacion])  on update no action on delete no action 
go
Alter table [INCLUSIONES] add  foreign key([Estadia_Padre]) references [ESTADIAS] ([id_ocupacion])  on update no action on delete no action 
go
Alter table [INCLUSIONES] add  foreign key([Estadia_Hijo]) references [ESTADIAS] ([id_ocupacion])  on update no action on delete no action 
go
Alter table [USUARIOS] add  foreign key([Permiso]) references [PERMISOS] ([Permiso])  on update no action on delete no action 
go
Alter table [OPERACIONES] add  foreign key([id_Forma_Pago]) references [FORMAS_PAGOS] ([id_Forma_Pago])  on update no action on delete no action 
go
Alter table [SALDOS-ANTERIORES] add  foreign key([id_Forma_Pago]) references [FORMAS_PAGOS] ([id_Forma_Pago])  on update no action on delete no action 
go
Alter table [ESTADOS-LEYENDAS] add  foreign key([id_Forma_Pago]) references [FORMAS_PAGOS] ([id_Forma_Pago])  on update no action on delete no action 
go
Alter table [SUBCONCEPTOS] add  foreign key([id_concepto]) references [CONCEPTOS] ([id_concepto])  on update no action on delete no action 
go
Alter table [RESULTADOS] add  foreign key([id_concepto]) references [CONCEPTOS] ([id_concepto])  on update no action on delete no action 
go
Alter table [PAGOS] add  foreign key([id_operacion]) references [OPERACIONES] ([id_operacion])  on update no action on delete no action 
go
Alter table [COMPRAS] add  foreign key([id_operacion]) references [OPERACIONES] ([id_operacion])  on update no action on delete no action 
go
Alter table [CONTRATOS-OPERACIONES] add  foreign key([id_operacion]) references [OPERACIONES] ([id_operacion])  on update no action on delete no action 
go
Alter table [SUGERENCIAS] add  foreign key([id_unidad]) references [UNIDADES] ([id_lugar])  on update no action on delete no action 
go
Alter table [EXTERNAS] add  foreign key([id_lugar]) references [UNIDADES] ([id_lugar])  on update no action on delete no action 
go
Alter table [CONDICIONES] add  foreign key([id_lugar]) references [UNIDADES] ([id_lugar])  on update no action on delete no action 
go
Alter table [ASIGNACIONES] add  foreign key([id_lugar]) references [UNIDADES] ([id_lugar])  on update no action on delete no action 
go
Alter table [RESERVAS] add  foreign key([DNI_cliente]) references [CLIENTES] ([DNI_cliente])  on update no action on delete no action 
go
Alter table [VENTAS] add  foreign key([DNI_usuario]) references [USUARIOS] ([DNI_usuario])  on update no action on delete no action 
go
Alter table [OPERACIONES] add  foreign key([DNI_usuario]) references [USUARIOS] ([DNI_usuario])  on update no action on delete no action 
go
Alter table [RESERVAS] add  foreign key([DNI_usuario]) references [USUARIOS] ([DNI_usuario])  on update no action on delete no action 
go
Alter table [CONTRATOS] add  foreign key([DNI_usuario]) references [USUARIOS] ([DNI_usuario])  on update no action on delete no action 
go
Alter table [NOTAS] add  foreign key([Emisor]) references [USUARIOS] ([DNI_usuario])  on update no action on delete no action 
go
Alter table [NOTAS] add  foreign key([Receptor]) references [USUARIOS] ([DNI_usuario])  on update no action on delete no action 
go
Alter table [ITEMS-CONSUMOS] add  foreign key([id_venta]) references [VENTAS] ([id_venta])  on update no action on delete no action 
go
Alter table [COMPLEJAS] add  foreign key([id_tipo]) references [TIPOS_RESERVAS] ([id_tipo])  on update no action on delete no action 
go
Alter table [UNIDADES] add  foreign key([id_tipo]) references [TIPOS_RESERVAS] ([id_tipo])  on update no action on delete no action 
go
Alter table [CONDICIONES] add  foreign key([id_tipo]) references [TIPOS_RESERVAS] ([id_tipo])  on update no action on delete no action 
go
Alter table [SIGUIENTES] add  foreign key([anterior]) references [ESTADOS] ([id_estado])  on update no action on delete no action 
go
Alter table [SIGUIENTES] add  foreign key([siguiente]) references [ESTADOS] ([id_estado])  on update no action on delete no action 
go
Alter table [RESERVAS] add  foreign key([id_estado]) references [ESTADOS] ([id_estado])  on update no action on delete no action 
go
Alter table [ESTADOS-LEYENDAS] add  foreign key([id_estado]) references [ESTADOS] ([id_estado])  on update no action on delete no action 
go
Alter table [CUENTAS] add  foreign key([DNI_propietario]) references [PROPIETARIOS] ([DNI_propietario])  on update no action on delete no action 
go
Alter table [PROPIETARIOS-ADICIONALES] add  foreign key([DNI_propietario]) references [PROPIETARIOS] ([DNI_propietario])  on update no action on delete no action 
go
Alter table [EXTERNAS] add  foreign key([DNI_propietario]) references [PROPIETARIOS] ([DNI_propietario])  on update no action on delete no action 
go
Alter table [ADICIONALES] add  foreign key([DNI_propietario]) references [PROPIETARIOS] ([DNI_propietario])  on update no action on delete no action 
go
Alter table [PAQUETES-SERVICIOS] add  foreign key([id_servicio]) references [SERVICIOS] ([id_servicio])  on update no action on delete no action 
go
Alter table [SERVICIOS-TAREAS] add  foreign key([id_servicio]) references [SERVICIOS] ([id_servicio])  on update no action on delete no action 
go
Alter table [Servicios-Adicionales] add  foreign key([id_servicio]) references [SERVICIOS] ([id_servicio])  on update no action on delete no action 
go
Alter table [CONTRATOS] add  foreign key([id_cuenta]) references [CUENTAS] ([id_cuenta])  on update no action on delete no action 
go
Alter table [SALDOS-CUENTAS] add  foreign key([id_cuenta]) references [CUENTAS] ([id_cuenta])  on update no action on delete no action 
go
Alter table [SENIAS] add  foreign key([id_operacion]) references [PAGOS] ([id_operacion])  on update no action on delete no action 
go
Alter table [SERVICIOS-TAREAS] add  foreign key([id_tarea]) references [TAREAS] ([id_tarea])  on update no action on delete no action 
go
Alter table [PAQUETES-SERVICIOS] add  foreign key([id_paquete]) references [PAQUETES] ([id_paquete])  on update no action on delete no action 
go
Alter table [COMPLEJAS] add  foreign key([id_paquete]) references [PAQUETES] ([id_paquete])  on update no action on delete no action 
go
Alter table [CONTRATOS-OPERACIONES] add  foreign key([id_contrato]) references [CONTRATOS] ([id_contrato])  on update no action on delete no action 
go
Alter table [OPERACIONES] add  foreign key([id_subconcepto]) references [SUBCONCEPTOS] ([id_subconcepto])  on update no action on delete no action 
go
Alter table [SUBCONCEPTOS-PROVEEDORES] add  foreign key([id_subconcepto]) references [SUBCONCEPTOS] ([id_subconcepto])  on update no action on delete no action 
go
Alter table [DERIVACIONES] add  foreign key([id_subconcepto]) references [SUBCONCEPTOS] ([id_subconcepto])  on update no action on delete no action 
go
Alter table [SUCURSALES] add  foreign key([id_banco]) references [BANCOS] ([id_banco])  on update no action on delete no action 
go
Alter table [CUENTAS] add  foreign key([Nro_Sucursal],[id_banco]) references [SUCURSALES] ([Nro_Sucursal],[id_banco])  on update no action on delete no action 
go
Alter table [CLIENTES] add  foreign key([id_Localidad]) references [LOCALIDADES] ([id_Localidad])  on update no action on delete no action 
go
Alter table [PROPIETARIOS] add  foreign key([id_Localidad]) references [LOCALIDADES] ([id_Localidad])  on update no action on delete no action 
go
Alter table [USUARIOS] add  foreign key([id_Localidad]) references [LOCALIDADES] ([id_Localidad])  on update no action on delete no action 
go
Alter table [MUCAMAS] add  foreign key([id_Localidad]) references [LOCALIDADES] ([id_Localidad])  on update no action on delete no action 
go
Alter table [PAQUETES] add  foreign key([id_color]) references [COLORES] ([id_color])  on update no action on delete no action 
go
Alter table [ESTADOS] add  foreign key([id_color]) references [COLORES] ([id_color])  on update no action on delete no action 
go
Alter table [INTERFACES] add  foreign key([Fondo]) references [COLORES] ([id_color])  on update no action on delete no action 
go
Alter table [INTERFACES] add  foreign key([Panel]) references [COLORES] ([id_color])  on update no action on delete no action 
go
Alter table [INTERFACES] add  foreign key([Textbox]) references [COLORES] ([id_color])  on update no action on delete no action 
go
Alter table [INTERFACES] add  foreign key([Fuente]) references [COLORES] ([id_color])  on update no action on delete no action 
go
Alter table [INTERFACES] add  foreign key([Btn_Hover]) references [COLORES] ([id_color])  on update no action on delete no action 
go
Alter table [INTERFACES] add  foreign key([Grilla]) references [COLORES] ([id_color])  on update no action on delete no action 
go
Alter table [INTERFACES] add  foreign key([Btn_Down]) references [COLORES] ([id_color])  on update no action on delete no action 
go
Alter table [INTERFACES] add  foreign key([Btn_Normal]) references [COLORES] ([id_color])  on update no action on delete no action 
go
Alter table [TIPOS_CONDICIONES] add  foreign key([id_color]) references [COLORES] ([id_color])  on update no action on delete no action 
go
Alter table [USUARIOS] add  foreign key([Interfaz]) references [INTERFACES] ([Interfaz])  on update no action on delete no action 
go
Alter table [COMPRAS] add  foreign key([id_proveedor]) references [PROVEEDORES] ([id_proveedor])  on update no action on delete no action 
go
Alter table [SUBCONCEPTOS-PROVEEDORES] add  foreign key([id_proveedor]) references [PROVEEDORES] ([id_proveedor])  on update no action on delete no action 
go
Alter table [COMPRAS] add  foreign key([id_categoria]) references [CATEGORIAS] ([id_categoria])  on update no action on delete no action 
go
Alter table [CAUSAS] add  foreign key([id_tipo]) references [TIPOS_CAUSAS] ([id_tipo])  on update no action on delete no action 
go
Alter table [PROPIETARIOS-ADICIONALES] add  foreign key([id_lugar]) references [ADICIONALES] ([id_lugar])  on update no action on delete no action 
go
Alter table [SUGERENCIAS] add  foreign key([id_adicional]) references [ADICIONALES] ([id_lugar])  on update no action on delete no action 
go
Alter table [ARTICULOS] add  foreign key([id_consumo]) references [CONSUMOS] ([id_consumo])  on update no action on delete no action 
go
Alter table [ITEMS-CONSUMOS] add  foreign key([id_consumo]) references [CONSUMOS] ([id_consumo])  on update no action on delete no action 
go
Alter table [OPERACIONES] add  foreign key([id_caja]) references [CAJAS] ([id_caja])  on update no action on delete no action 
go
Alter table [SALDOS-ANTERIORES] add  foreign key([id_caja]) references [CAJAS] ([id_caja])  on update no action on delete no action 
go
Alter table [SALDOS-CUENTAS] add  foreign key([id_caja]) references [CAJAS] ([id_caja])  on update no action on delete no action 
go
Alter table [RESULTADOS] add  foreign key([id_caja]) references [CAJAS] ([id_caja])  on update no action on delete no action 
go
Alter table [FACTURACIONES] add  foreign key([id_caja]) references [CAJAS] ([id_caja])  on update no action on delete no action 
go
Alter table [CAUSAS] add  foreign key([id_ocupacion]) references [OCUPACIONES] ([id_ocupacion])  on update no action on delete no action 
go
Alter table [VENTAS] add  foreign key([id_ocupacion]) references [OCUPACIONES] ([id_ocupacion])  on update no action on delete no action 
go
Alter table [PAGOS] add  foreign key([id_ocupacion]) references [OCUPACIONES] ([id_ocupacion])  on update no action on delete no action 
go
Alter table [ESTADIAS] add  foreign key([id_ocupacion]) references [OCUPACIONES] ([id_ocupacion])  on update no action on delete no action 
go
Alter table [ESTADOS-LEYENDAS] add  foreign key([id_leyenda]) references [LEYENDAS] ([id_leyenda])  on update no action on delete no action 
go
Alter table [UNIDADES] add  foreign key([id_lugar]) references [LUGARES] ([id_lugar])  on update no action on delete no action 
go
Alter table [ADICIONALES] add  foreign key([id_lugar]) references [LUGARES] ([id_lugar])  on update no action on delete no action 
go
Alter table [OCUPACIONES] add  foreign key([id_lugar]) references [LUGARES] ([id_lugar])  on update no action on delete no action 
go
Alter table [FACTURACIONES] add  foreign key([id_lugar]) references [LUGARES] ([id_lugar])  on update no action on delete no action 
go
Alter table [DERIVACIONES] add  foreign key([id_lugar]) references [LUGARES] ([id_lugar])  on update no action on delete no action 
go
Alter table [ESTADIAS] add  foreign key([id_reserva]) references [RESERVAS] ([id_reserva])  on update no action on delete no action 
go
Alter table [DEUDAS] add  foreign key([id_reserva]) references [RESERVAS] ([id_reserva])  on update no action on delete no action 
go
Alter table [Servicios-Adicionales] add  foreign key([id_ocupacion]) references [COMPLEJAS] ([id_ocupacion])  on update no action on delete no action 
go
Alter table [CUENTAS] add  foreign key([id_tipo_cuenta]) references [TIPOS_CUENTAS] ([id_tipo_cuenta])  on update no action on delete no action 
go
Alter table [LUGARES] add  foreign key([id_tipo_lugar]) references [TIPOS_LUGARES] ([id_tipo_lugar])  on update no action on delete no action 
go
Alter table [ESTADISTICAS] add  foreign key([id_tipo_lugar]) references [TIPOS_LUGARES] ([id_tipo_lugar])  on update no action on delete no action 
go
Alter table [CONDICIONES] add  foreign key([id_condicion]) references [TIPOS_CONDICIONES] ([id_condicion])  on update no action on delete no action 
go
Alter table [ASIGNACIONES] add  foreign key([DNI_mucama]) references [MUCAMAS] ([DNI_mucama])  on update no action on delete no action 
go
Alter table [RESERVAS] add  foreign key([id_origen]) references [ORIGENES] ([id_origen])  on update no action on delete no action 
go
ALTER TABLE [RESERVAS] add constraint FK_RESERVAS_CLIENTES_dni foreign key(DNI_cliente) references CLIENTES(DNI_cliente) ON UPDATE CASCADE
go
ALTER TABLE [CUENTAS] add constraint FK_CUENTAS_PROPIETARIOS_dni foreign key(DNI_propietario) references PROPIETARIOS(DNI_propietario) ON UPDATE CASCADE
go
ALTER TABLE [PROPIETARIOS-ADICIONALES] add constraint FK_ADICIONALES_PROPIETARIOS_dni foreign key(DNI_propietario) references PROPIETARIOS(DNI_propietario) ON UPDATE CASCADE
go
ALTER TABLE [EXTERNAS] add constraint FK_EXTERNAS_PROPIETARIOS_dni foreign key(DNI_propietario) references PROPIETARIOS(DNI_propietario) ON UPDATE CASCADE
go
Alter table [RESERVAS] add  foreign key([id_origen]) references [ORIGENES] ([id_origen])  on update no action on delete no action 
go
Alter table [LOCALIDADES] add  foreign key([id_Provincia]) references [PROVINCIAS] ([id_Provincia])  on update no action on delete no action 
go

Set quoted_identifier on
go



Set quoted_identifier off
go


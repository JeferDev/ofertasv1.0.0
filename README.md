#################
#Datos generales#
#################

Apache version: 2.4.54
PHP Version:    8.2.0
phpMyAdmin versión: 5.2.0
Versión del cliente de base de datos: libmysql - mysqlnd 8.2.0

BD: ofertas
Ofertas v 1.0.0

##############
#    nota    #
##############

nota: La base de datos contiene eventos, en caso de que no funcionen por favor verifique que tenga los eventos activados con el comando

SHOW VARIABLES LIKE 'event_scheduler';

Si el valor de la variable "event_scheduler" es "ON", significa que los eventos están habilitados. Si el valor es "OFF", significa que los eventos están deshabilitados.

Si los eventos están deshabilitados, puedes habilitarlos ejecutando el siguiente comando:

SET GLOBAL event_scheduler = ON;

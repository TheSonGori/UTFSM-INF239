Integrantes:
	Nombre: Javiera Gutierrez Abarca	Rol: 202173626-3		Paralelo: 201
	Nombre: Nicolas Contreras Jofre	Rol: 202130555-6		Paralelo: 201

Instrucciones:
	-> Para ingresar sus datos para ingresar a la base de datos en las lineas 10 a las 13 en Main.py estan
	para modificar estos valores.
	
	-> Si se cambia de nombre el archivo .csv para hacer la ejecucion del programa con otro archivo .csv
	este esta en la linea 81 de Main.py para modificar
	
	-> Todas las funciones tanto de Functions.py y de Main.py estan comentadas con el siguiente formato:
    		"""
    		Esta función recibe como parámetro un nombre y retorna un saludo personalizado.

    		Parámetros:
    		nombre (str): El nombre de la persona a saludar.

    		Retorna:
    		str: Un mensaje de saludo personalizado.
   		"""

	-> VIEW es utilizado en la operacion 10. Peak position de un artista

	-> FUNCTION es utilizado en la operacion 11. Promedio de streams totales

	-> Como es indicado en el PDF (3. To Do List) explicacion de la operacion 6. la tabla de reproduccion la fecha
	es la primera vez que el usuario escucha la cancion, esta jamas sera modificada. Si bien se solicita siempre una 
	fecha, si el programa detecta que la cancion ya esta en la tabla de reproduccion, mantendra la primera fecha.
	
	-> Para la operacion 1. el usuario puede elegir el orden que el desee ya sea de mayor a menor [Mayor] o de menor a
	mayor [Menor], tanto para las fechas y reproducciones.
	
	-> Por cada dato mal ingresado por consola el programa preguntara si se quiere volver a intentar, si el usuario 
	dice que si, el programa vuelve a preguntar, si senala que no, el programa vuelve al menu.
	
	-> Cuando se solicitan ingresos del usuario por consola, se puede escribir con mayusculas o minisculas, ya que el
	programa hacer uso de .upper() para verificar los ingresos de usuario por consola.
	
	-> En la operacion 3, 5 y 8 hacemos uso de LIKE en vez de WHERE song_name = ?, logrando asi que la busqueda sea mas 
	realista y parecida a la de spotify. Por ejemplo: Si ingresamos Stan (en el apartado de cancion) nos imprimira por 
	pantalla todas aquellas canciones que tengan la palabra stan en sus canciones. Como lo son la de Eminem o como la de Travis
	Scott NO BYSTANDERS, entre otras.

	-> Para las fechas se utiliza la libreria datetime y las funciones de esta. Las fechas solo se solicitan en la op.
	3, 5 y 7, la 5 para saber cuando fue la primera vez que reprodujo cierta cancion y en la 7 para que de una fecha y
	el programa retroceda los x dias solicitados (la fecha se considera).
	Ejemplo: Op.7 | Fecha ingresada: 2022-01-04 | X dias a retroceder: x = 3 |
		Intervalo fechas: [(2022-01-01),(2022-01-02),(2022-01-03),(2022-01-04)]
	
	-> Por uso de funciones en SQL, el resultado de la op.11 da un aproximado, que esto tambien pasaria si usaramos
	funciones en python. 
	
	
	
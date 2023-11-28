import datetime

#------------------------ FUNCTIONS -------------------------#

def FirstMenu():
    """
    Esta funcion es el primer menu donde se puede eliminar las tablas, crear tablas o entrar a la app.

    Parámetros:
        No hay parametros

    Retorna:
        int (int): si el valor puede ser un int retorna como entero
        False (bool): Cuando la opcion no es valida
    """

    print("\n→    BIENVENIDOS   ←")
    print("\t1. Borrar Tablas Anteriores")
    print("\t2. Crear Tabla Nuevas")
    print("\t3. Entrar a SPOT-USM")

    UsuarioSelect = str(input("Ingrese una opcion: "))
    if UsuarioSelect.isdigit():
        return int(UsuarioSelect)
    else:
        print("|⚠️| Ingrese una opcion valida |⚠️|")
        return False

def MenuDeNavegacion():
    """
    Esta funcion es el segundo menu donde se puede hacer las 12 operaciones.

    Parámetros:
        No hay parametros

    Retorna:
        int (int): si el valor puede ser un int retorna como entero
        False (bool): Cuando la opcion no es valida
    """

    print("\n→    S P O T - U S M    ←")
    print("\t1. Mostrar Reproduccion")
    print("\t2. Mostrar Canciones Favoritas")
    print("\t3. Hacer Favorita una Cancion")
    print("\t4. Sacar de Favoritas a una Cancion")
    print("\t5. Reproducir una Cancion")
    print("\t6. Buscar una Cancion en la tabla Reproduccion")
    print("\t7. Mostrar Canciones que has escuchado por primera vez en los ultimos dias")
    print("\t8. Buscar por nombre de Cancion y por Artista")
    print("\t9. Top 15 Artistas con mayor cantidad total de veces que sus canciones han estado en el top 10")
    print("\t10. Peak Position de un artista")
    print("\t11. Promedio de streams totales")
    print("\t12. Salir\n")

    UsuarioSelect = str(input("Ingrese una opcion: "))

    if UsuarioSelect.isdigit():
        return int(UsuarioSelect)
    else:
        print("|⚠️| Ingrese una opcion valida |⚠️|")
        return False

def Date(FechaVer,X):
    """
    Esta funcion solicita una fecha y verifica que este correcta.

    Parámetros:
        FechaVer (str): con esto se selecciona el mensaje por consola (por los 2 casos que hay)
        X (str): la cantidad de dias para retroceder en una fecha

    Retorna:
        LastDate(str): retorna una fecha en string de la forma YYYY-MM-DD
    """

    if FechaVer == "Solicitud":
        DateInput = "\tIngrese Fecha para retroceder "+ X +" dias (YYYY-MM-DD): "
    else:
        DateInput = "\tIngrese Fecha (YYYY-MM-DD): "

    DateCorrect = False

    while not DateCorrect:
        FechaStr = input(DateInput)
        try:
            fecha = datetime.datetime.strptime(FechaStr, '%Y-%m-%d')
            DateCorrect = True
        except ValueError:
            print("\t\t|⚠️| La fecha ingresada es inválida. Inténtelo de nuevo |⚠️|\n")
    
    LastDate = ReturnDate(fecha)
    return LastDate

def ReturnDate(fecha):
    """
    Esta funcion recibe una fecha en forma de YYYY-MM-DD 00:00:00 y separa la fecha para obtener YYYY-MM-DD

    Parámetros:
        fecha (datetime): recibe una fecha de la forma YYYY-MM-DD 00:00:00

    Retorna:
        fecha (str): retorna una fecha en string de la forma YYYY-MM-DD
    """

    fecha = str(fecha)
    fecha = fecha.split(" ")
    fecha = fecha[0]

    return fecha

def Answer():
    """
    Esta funcion le pregutan al usuario si quiere seguir intentando el ingreso por consola de alguna operacion

    Parámetros:
        No hay parametros

    Retorna:
        True (bool): si el usuario quiere seguir intentando
        False (bool): si el usuario no quiere seguir intentando
    """   

    while True:
        Answer = input("\t\t¿Desea volver a intentarlo? [Si/No] : ")
        if Answer.upper() == "SI":
            return True
        elif Answer.upper() == "NO":
            return False
        else:
            print("\t\t\t|⚠️| Ingrese un valor valido |⚠️|\n")

def PrintReproducciones(List):
    """
    Esta funcion imprime la lista por reproducciones

    Parámetros:
        List (List): Lista con los valores a imprimir por consola

    Retorna:
        No hay retorno
    """ 

    print("\t\tCola de Reproduccion por cantidad de reproducciones: ")
    for x in range(len(List)):
        Song_name = List[x][1]
        Artist_name = List[x][2]
        Cant_Reproduccion = str(List[x][4])
        print("\t\t\t → Cant. Reproducciones (" + Cant_Reproduccion +") - " + Song_name + " - " + Artist_name)

def PrintDate(List):
    """
    Esta funcion imprime la lista por fechas

    Parámetros:
        List (List): Lista con los valores a imprimir por consola

    Retorna:
        No hay retorno
    """ 
    print("\t\tCola de Reproduccion por fecha: ")
    for x in range(len(List)):
        Id = str(List[x][0])
        Song_name = List[x][1]
        Artist_name = List[x][2]
        Date = ReturnDate(List[x][3])
        print("\t\t\t → Fecha (" + Date +") - " + Song_name + " - " + Artist_name + " - (" + Id + ")")

def PrintList(List):
    """
    Esta funcion imprime los resultados encontrados en x busqueda de alguna operacion

    Parámetros:
        List (List): Lista con los valores a imprimir por consola

    Retorna:
        No hay retorno
    """ 
    print("\t\tResultado/s: ")
    for x in range(len(List)):
        Id = str(List[x][0])
        Song_name = str(List[x][1])
        Artist_name = str(List[x][2])
        print("\t\t\t → (" + Id + ") " + Song_name + " - " + Artist_name)

def PrintXdias(List):
    """
    Esta funcion imprime la lista que se obtiene en la operacion 7.

    Parámetros:
        List (List): Lista con los valores a imprimir por consola

    Retorna:
        No hay retorno
    """ 
        
    print("\t\tResultado/s: ")
    for x in range(len(List)):
        Song_name = str(List[x][1])
        Artist_name = str(List[x][2])
        Fecha_reproduccion = str(List[x][3])

        print("\t\t\t → (" + Fecha_reproduccion + ") " + Song_name + " - " + Artist_name)

def DateOrder(TupleList):
    """
    Esta convierte a los valores en la posicion [3] de la tupla en datetime.strptime

    Parámetros:
        TupleList (Tuple): Tupla de valores
    Retorna:
        No hay retorno
    """ 
    return datetime.datetime.strptime(TupleList[3], '%Y-%m-%d')

def SongOrArtist():
    """
    Para la operacion 8. Donde se solicita ingresar ya sea una cancion o artista, 
    siendo este el menu principal de la operacion.

    Parámetros:
        No hay parametros

    Retorna:
        int (int): si el valor puede ser un int retorna como entero
        False (bool): Cuando la opcion no es valida
    """ 

    print("\t\t(1) Ingresar cancion")
    print("\t\t(2) Ingresar artista")

    UsuarioSelect = str(input("\tIngrese una opcion [1/2]: "))

    if UsuarioSelect.isdigit():
        return int(UsuarioSelect)
    else:
        print("Ingrese una opcion valida...")
        return False
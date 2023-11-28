#--------------------------- MODULES ---------------------------#
import pyodbc
import Functions
import datetime
from operator import itemgetter
import csv

#----------------------- SQL CONNECTION -----------------------#

server = 'THESONGORI-PC\SQLEXPRESS'
bd = 'SPOTUSM'
usuario = 'TheSonGori'
clave = '1234'

#TABLES
TableRepositorioMusica = "repositorio_musica"
TableReproduccion = "reproduccion"
TableListaDeFavoritos = "lista_favoritos"

try:
    conexion = pyodbc.connect('DRIVER={SQL Server}; SERVER='+server+';DATABASE='+bd+';UID='+usuario+';PWD='+clave)
    print("|📶| Conexion a la base de datos exitosa |📶|")

except:
    print("|⚠️| Error de conexion |⚠️|")

Info = conexion.cursor()

#DROP TABLE
def DropTable():
    """
    Elimina las tablas en la base de datos.

    Parámetros:
        No hay parametros

    Retorna:
        No hay retorno
    """  

    try:
        Info.execute("DROP TABLE " + TableRepositorioMusica)
        Info.execute("DROP TABLE " + TableReproduccion)
        Info.execute("DROP TABLE " + TableListaDeFavoritos)
        Info.execute("DROP VIEW table_peak_position")
        Info.execute("DROP FUNCTION dbo.division")
    except:
        print("|⚠️| Error en la eliminacion de las tablas |⚠️|")
      
#CREATION TABLE
def CreationTable():
    """
    Crea las tablas en la base de datos.

    Parámetros:
        No hay parametros

    Retorna:
        No hay retorno
    """ 

    try:
        Info.execute("CREATE TABLE " + TableRepositorioMusica + "(id INTEGER IDENTITY(1,1) PRIMARY KEY, position INTEGER, artist_name VARCHAR(256), song_name VARCHAR(256), days INTEGER, top_10 INTEGER, peak_position INTEGER, peak_position_time VARCHAR(256), peak_streams INTEGER, total_streams INTEGER)")
        Info.execute("CREATE TABLE " + TableReproduccion + "(id INTEGER PRIMARY KEY, song_name VARCHAR(256), artist_name VARCHAR(256), fecha_reproduccion DATE, cant_reproducciones INTEGER, favorito BIT)")
        Info.execute("CREATE TABLE " + TableListaDeFavoritos + "(id INTEGER PRIMARY KEY, song_name VARCHAR(256), artist_name VARCHAR(256), fecha_agregada DATE)")
        conexion.commit()
    except:
        print("|⚠️| Error en la creacion de las tablas |⚠️|")

#OPEN CSV
def OpenCSV():
    """
    Abre el archivo .csv e ingresa los valores a la tabla repositorio_musica.

    Parámetros:
        No hay parametros

    Retorna:
        No hay retorno
    """ 
    with open('song.csv', "r", encoding = 'utf-8') as csv_file:
        lectura = csv.reader(csv_file,delimiter=';')
        flag = False
        for line in lectura:
            if flag == True:
                position = line[0]
                artist_name = line[1]
                song_name = line[2]
                days = line [3]
                top_10 = line [4]
                peak_position = line[5]
                peak_position_time = line[6]
                peak_streams = line[7]
                total_streams = line[8]
                
                Info.execute("INSERT INTO dbo." + TableRepositorioMusica + "(position, artist_name, song_name, days, top_10, peak_position, peak_position_time, peak_streams, total_streams) VALUES (?,?,?,?,?,?,?,?,?)",position, artist_name, song_name, days, top_10, peak_position, peak_position_time, peak_streams, total_streams)
            flag = True

#CREATE VIEW
def CreateView():
    """
    Crea el VIEW table_peak_positions respecto a la tabla repositorio_musica.

    Parámetros:
        No hay parametros

    Retorna:
        No hay retorno
    """ 
    
    Info.execute("CREATE VIEW table_peak_position AS SELECT artist_name,peak_position FROM " + TableRepositorioMusica)
    conexion.commit()

#CREATE FUNCTION
def CreateFunction():
    """
    Crea la FUNCTION dbo.division

    Parámetros:
        No hay parametros

    Retorna:
        No hay retorno
    """ 

    PromedioSQL = '''
        CREATE FUNCTION division(@suma BIGINT,@Largostreams INT)
        RETURNS INT
        AS
        BEGIN
            DECLARE @promedio BIGINT
            SELECT @promedio = CAST(@suma AS BIGINT) / CAST(@Largostreams AS INT)
            RETURN @promedio
        END
        '''
    Info.execute(PromedioSQL)
    conexion.commit()

#---------------------------- MAIN ----------------------------#

while True:
    UsuarioSelect = Functions.FirstMenu()

    if UsuarioSelect == 1:
        DropTable()
        conexion.commit()

    elif UsuarioSelect == 2:
        CreationTable()
        OpenCSV()
        CreateView()
        CreateFunction()
        conexion.commit()

    elif UsuarioSelect == 3:
        conexion.commit()
        print()
        break

    elif UsuarioSelect != False:
        print("|⚠️| Ingrese una opcion dentro del rango (1-3) |⚠️|")

while True:
    UsuarioSelect = Functions.MenuDeNavegacion()

    if UsuarioSelect == 1:
        ExitFlag = True

        while ExitFlag:
            MostrarReproduccion = str(input("\t¿En que orden te gustaria mostrar tu cola de reproduccion 🎧 ? [Fecha / Reproducciones]: "))

            if MostrarReproduccion.upper() == "FECHA":
                Info.execute("SELECT * FROM " + TableReproduccion)
                FechaList = Info.fetchall()

                while True:
                    Orden = input("\t¿Orden de Mayor a Menor o Menor a Mayor? [Mayor / Menor]: ")
                    if Orden.upper() == "MAYOR":
                        FechaList = sorted(FechaList, key=Functions.DateOrder, reverse=True)
                        break

                    elif Orden.upper() == "MENOR":
                        FechaList = sorted(FechaList, key=Functions.DateOrder, reverse=False)
                        break

                    else:
                        print("\t\tIngrese un valor valido, vuelve a intentarlo...\n")

                Functions.PrintDate(FechaList)
                ExitFlag = False
                break

            elif MostrarReproduccion.upper() == "REPRODUCCIONES":
                Info.execute("SELECT * FROM " + TableReproduccion)
                CantReproducionList = Info.fetchall()

                while True:
                    Orden = input("\t¿Orden de Mayor a Menor o Menor a Mayor? [Mayor / Menor]: ")
                    if Orden.upper() == "MAYOR":
                        CantReproducionList = sorted(CantReproducionList, key=itemgetter(4), reverse=True)
                        break

                    elif Orden.upper() == "MENOR":
                        CantReproducionList = sorted(CantReproducionList, key=itemgetter(4), reverse=False)
                        break

                    else:
                        print("\t\tIngrese un valor valido, vuelve a intentarlo...\n")

                Functions.PrintReproducciones(CantReproducionList)
                ExitFlag = False
                break

            else:
                Answer = Functions.Answer()
                if Answer == False:
                    ExitFlag = False
                    break

    elif UsuarioSelect == 2:
        Info.execute("SELECT * FROM " + TableListaDeFavoritos)
        ListDelFav = Info.fetchall()

        print("\t\tCanciones Favoritas: ")

        if len(ListDelFav) != 0:
            for x in range(len(ListDelFav)):
                Id = str(ListDelFav[x][0])
                Song_name = str(ListDelFav[x][1])
                Artist_name = str(ListDelFav[x][2])
                print("\t\t → (" + Id + ") " + Song_name + " - " + Artist_name)
        else:
            print("\t\t → Todavia no has agregado ninguna cancion como favorita!")

    elif UsuarioSelect == 3:
        Date = Functions.Date("-","-")
        DateTime = datetime.datetime.strptime(Date,'%Y-%m-%d')

        ExitFlag = True
        while ExitFlag:
            FavSong = str(input("\t¿Que cancion te apetece agregar como favorito 💖 ?: ")) 
            Info.execute("SELECT id,song_name,artist_name FROM " + TableRepositorioMusica+ " WHERE song_name LIKE '%"+FavSong+"%'")
            ListPlayingSong  = Info.fetchall()

            if len(ListPlayingSong) == 0:
                print("\t\tNo se ha encontrado ninguna cancion con ese nombre!")
                Answer = Functions.Answer()
                if Answer == False:
                    ExitFlag = False
                    break
            else:

                Functions.PrintList(ListPlayingSong)
                Flag = True

                while Flag:
                    while True:
                            Fav = input("\t\t Ingrese ID para agregar a favoritos: ")
                            if Fav.isdigit():
                                Fav = int(Fav)
                                break
                            else:
                                print("\t\tIngrese un valor valido!\n")

                    for x in range(len(ListPlayingSong)):
                            ID = ListPlayingSong[x][0]
                            if ID == Fav:
                                Info.execute("SELECT * FROM " + TableListaDeFavoritos + " WHERE id= ?",(ID))
                                ListFavoritos = Info.fetchall()

                                if len(ListFavoritos) == 0:
                                    Flag = False
                                    Info.execute("INSERT INTO " + TableListaDeFavoritos + "(id,song_name,artist_name,fecha_agregada) VALUES (?,?,?,?)",(ListPlayingSong[x][0],ListPlayingSong[x][1],ListPlayingSong[x][2],Date))
                                    conexion.commit()
                                    print("\t\tCancion agregada con exito!")

                                    Info.execute("SELECT * FROM " + TableReproduccion + " WHERE id = ?", (ListPlayingSong[x][0]))
                                    ListReproducir = Info.fetchall()

                                    if len(ListReproducir) != 0:
                                        Info.execute("UPDATE " + TableReproduccion + " SET favorito = ? WHERE id = ?",(1,ListPlayingSong[x][0]))
                                        conexion.commit()


                                    ExitFlag = False
                                    Flag = False
                                    break

                                else:
                                    print("\t\tEsta cancion ya esta como favorita!")
                                    Flag = False
                                    ExitFlag = False
                                    break

                    if Flag == True:
                        Answer = Functions.Answer()
                        if Answer == False:
                            Flag = False
                            ExitFlag = False
                            break

    elif UsuarioSelect == 4:
        Info.execute("SELECT * FROM " + TableListaDeFavoritos)
        ListDelFav = Info.fetchall()

        print("\t\tCanciones Favoritas: ")

        for x in range(len(ListDelFav)):
            Id = str(ListDelFav[x][0])
            Song_name = str(ListDelFav[x][1])
            Artist_name = str(ListDelFav[x][2])
            print("\t\t → (" + Id + ") " + Song_name + " - " + Artist_name)

        ExitFlag = True
        Answer = True

        while ExitFlag:
            while True:
                DelFav = str(input("\t\t\t¿Que cancion te apetece eliminar de favoritos 💔 ? [ID]: "))
                if DelFav.isdigit() == True:
                    DelFav = int(DelFav)
                    break
                else:
                    print("\t\t\tIngrese un valor valido!\n")
                    Answer = Functions.Answer()
                    if Answer == False:
                        ExitFlag = False
                        break

            if Answer != False:
                Info.execute("SELECT * FROM " + TableListaDeFavoritos + " WHERE id= ?",(DelFav))
                ListDelFav = Info.fetchall()

                if len(ListDelFav) == 0:
                    print("\t\t\tNo se ha encontrado ninguna cancion con ese nombre!")
                    Answer = Functions.Answer()
                    if Answer == False:
                        ExitFlag = False
                        break
                else:
                    Flag = True

                    while Flag:
                        for x in range(len(ListDelFav)):
                            ID = ListDelFav[x][0]
                            if ID == DelFav:
                                Info.execute("DELETE FROM " + TableListaDeFavoritos + " WHERE id = ?",(ListDelFav[x][0]))
                                conexion.commit()

                                Info.execute("SELECT * FROM " + TableReproduccion + " WHERE id = ?", (ListDelFav[x][0]))
                                ListReproducir = Info.fetchall()

                                if len(ListReproducir) != 0:
                                    Info.execute("UPDATE " + TableReproduccion + " SET favorito = ? WHERE id = ?",(0, ListDelFav[x][0]))
                                    conexion.commit()


                                Flag = False
                                ExitFlag = False

                        if Flag == True:
                            Answer = Functions.Answer()
                            if Answer == False:
                                Flag = False
                                ExitFlag = False
                                break

    elif UsuarioSelect == 5:
        Date = Functions.Date("-","-")
        DateTime = datetime.datetime.strptime(Date,'%Y-%m-%d')

        ExitFlag = True

        while ExitFlag:
            PlayingSong = str(input("\t¿Que te apetece escuchar 🔊 ?: ")) 
            Info.execute("SELECT id,song_name,artist_name FROM " + TableRepositorioMusica + " WHERE song_name LIKE '%" + PlayingSong + "%'")
            ListPlayingSong = Info.fetchall()

            if len(ListPlayingSong) == 0:
                print("\t\tNo se ha encontrado ninguna cancion con ese nombre!")
                Answer = Functions.Answer()
                if Answer == False:
                    ExitFlag = False
                    break
            else:
                Functions.PrintList(ListPlayingSong)
                Flag = True

                while Flag:
                    while True:
                        Reproducir = input("\t\t Ingrese ID de la cancion a reproducir: ")
                        if Reproducir.isdigit():
                            Reproducir = int(Reproducir)
                            break
                        else:
                            print("\t\tIngrese un valor valido!\n")

                    for x in range(len(ListPlayingSong)):
                        ID = ListPlayingSong[x][0]
                        if ID == Reproducir:
                            Info.execute("SELECT id,cant_reproducciones FROM " + TableReproduccion + " WHERE id = ?",(ListPlayingSong[x][0]))
                            ListReproducir = Info.fetchall()

                            Info.execute("SELECT id FROM " + TableListaDeFavoritos + " WHERE id = ?",(ListPlayingSong[x][0]))
                            ListFavoritos = Info.fetchall()

                            if len(ListReproducir) == 0:
                                if len(ListFavoritos) == 0:
                                    Info.execute("INSERT INTO " + TableReproduccion + "(id,song_name,artist_name,fecha_reproduccion,cant_reproducciones,favorito) VALUES (?,?,?,?,?,?)",(ListPlayingSong[x][0],ListPlayingSong[x][1],ListPlayingSong[x][2],Date,1,0))
                                else:
                                    Info.execute("INSERT INTO " + TableReproduccion + "(id,song_name,artist_name,fecha_reproduccion,cant_reproducciones,favorito) VALUES (?,?,?,?,?,?)",(ListPlayingSong[x][0],ListPlayingSong[x][1],ListPlayingSong[x][2],Date,1,1))
                            else:
                                CountRepro = int(ListReproducir[0][1]) + 1
                                if len(ListFavoritos) == 0:
                                    Info.execute("UPDATE " + TableReproduccion + " SET cant_reproducciones = ?, favorito = ? WHERE id = ?",(CountRepro,0,ListPlayingSong[x][0]))
                                else:
                                    Info.execute("UPDATE " + TableReproduccion + " SET cant_reproducciones = ?, favorito = ? WHERE id = ?",(CountRepro,1,ListPlayingSong[x][0]))
                                
                            conexion.commit()
                            print("\t\t → Se esta reproduciendo: " + ListPlayingSong[x][1] + " - "+ ListPlayingSong[x][2])
                            Flag = False
                            ExitFlag = False

                    if Flag == True:
                        Answer = Functions.Answer()
                        if Answer == False:
                            Flag = False
                            ExitFlag = False
                            break

    elif UsuarioSelect == 6:
        ExitFlag = True

        while ExitFlag:
            SearchSong = str(input("\t¿Que cancion quieres buscar de la fila de reproduccion?: "))
            Info.execute("SELECT * FROM " + TableReproduccion+ " WHERE song_name = ?",(SearchSong))
            ListSearchSong = Info.fetchall()

            if len(ListSearchSong) == 0:
                print("\t\tNo se ha encontrado ninguna cancion con ese nombre!")
                Answer = Functions.Answer()
                if Answer == False:
                    ExitFlag = False
                    break
            else:
                print("\t\tResultado/s: ")
                for x in range(len(ListSearchSong)):
                    Id = str(ListSearchSong[x][0])
                    Song_name = str(ListSearchSong[x][1])
                    Artist_name = str(ListSearchSong[x][2])
                    Fecha = str(ListSearchSong[x][3])
                    CantReproducion = str(ListSearchSong[x][4])
                    Fav = ListSearchSong[x][5]
                    if Fav == True:
                        Fav = "Si"
                    else:
                        Fav = "No"

                    print("\t\t\t → (" + Id + ") " + Song_name + " - " + Artist_name)
                    print("\t\t\t\t↳ Fecha de primera reproduccion: " + Fecha + " | Cant. Reproducciones: " + CantReproducion + " | Fav: " + Fav)
                
                ExitFlag = False
                break

    elif UsuarioSelect == 7:
        ExitFlag = True
        while True:
            LastDays = input("\tIngrese cantidad de dias que desea retroceder [Dias a retroceder]: ")

            if LastDays.isdigit() == True:
                LastDate = Functions.Date("Solicitud",str(LastDays))
                LastDate = datetime.datetime.strptime(LastDate, '%Y-%m-%d').date()
                FirstDate = LastDate - datetime.timedelta(days=int(LastDays))
                Intervalo = datetime.timedelta(days=1)

                Fechas = []

                while FirstDate <= LastDate:
                    Fechas.append(FirstDate)
                    FirstDate += Intervalo

                ListPrint = []
                for x in range(len(Fechas)):
                    Date = str(Fechas[x])
                    Info.execute("SELECT * FROM " + TableReproduccion + " WHERE fecha_reproduccion = ?",(Date))
                    ListSelect = Info.fetchall()

                    if len(ListSelect) != 0:
                        for y in range(len(ListSelect)):
                            ListPrint.append(ListSelect[y])

                Functions.PrintXdias(ListPrint)
                ExitFlag = False
                break

            else:
                Answer = Functions.Answer()
                if Answer == False:
                    ExitFlag = False
                    break

    elif UsuarioSelect == 8:
        ExitFlag = True

        while ExitFlag:
            Op8 = Functions.SongOrArtist()
            if Op8 == 1:
                cancion = str(input("\tIntroduzca palabra/s clave: "))
                Info.execute("SELECT * FROM " + TableRepositorioMusica+ " WHERE song_name LIKE '%"+ cancion +"%'")
                ListSearchSong = Info.fetchall()

                if len(ListSearchSong) == 0:
                    print("\t\tNo se ha encontrado ninguna cancion con esa/s palabra/s!")
                    Answer = Functions.Answer()
                    if Answer == False:
                        ExitFlag = False
                        break

                else:
                    print("\n\tCanciones encontradas: ")
                    for x in range(len(ListSearchSong)):
                        Song_name = str(ListSearchSong[x][2])
                        Artist_name = str(ListSearchSong[x][3])

                        print("\t\t →  " + Artist_name + " - " + Song_name)

                    ExitFlag = False
                    break

            elif Op8 == 2:
                Artist = str(input("\t¿Que artista quieres buscar?: "))
                Info.execute("SELECT * FROM " + TableRepositorioMusica+ " WHERE artist_name = ?",(Artist))
                ListSearchSong = Info.fetchall()

                if len(ListSearchSong) == 0:
                    print("\t\tNo se ha encontrado ningun Artista con ese nombre!")
                    Answer = Functions.Answer()
                    if Answer == False:
                        ExitFlag = False
                        break

                else:
                    print("\t\tResultado/s: ")
                    for x in range(len(ListSearchSong)):
                        Song_name = str(ListSearchSong[x][2])
                        Artist_name = str(ListSearchSong[x][3])

                        print("\t\t →  " + Song_name + " - " + Artist_name)

                    ExitFlag = False
                    break
            else:
                Answer = Functions.Answer()
                if Answer == False:
                    ExitFlag = False
                    break

    elif UsuarioSelect == 9:
        Info.execute("SELECT TOP 15 SUM(top_10),artist_name FROM " + TableRepositorioMusica + " GROUP BY artist_name ORDER BY SUM(top_10) DESC")
        Top15 = Info.fetchall()
        print("\tTOP 15 ARTISTAS: ")

        for x in range(len(Top15)):
            Number = x + 1
            Artist_name = Top15[x][1]
            Cant = Top15[x][0]
            print("\t\t → (" + str(Number) + ") " + Artist_name + " con: " + str(Cant))

    elif UsuarioSelect == 10:
        ExitFlag = True

        while ExitFlag:
            PeakPosition = str(input("\tIngrese artista : "))
            Info.execute("SELECT TOP 1 peak_position FROM table_peak_position WHERE artist_name = ? ORDER BY peak_position ASC",(PeakPosition))
            Top = Info.fetchall()

            if len(Top) != 0:
                Top = Top[0][0]
                print("\t\t → La posicion mas alta obtenida por "+ PeakPosition + " entre todas sus canciones es: "+ str(Top))
                ExitFlag = False
                break
            else:
                print("\t\tNo se a encontrado ningun artista...")
                Answer = Functions.Answer()
                if Answer == False:
                    ExitFlag = False
                    break
            
    elif UsuarioSelect == 11:
        ExitFlag = True

        while ExitFlag:

            TotalStreams = str(input("\tIngrese artista : "))
            Info.execute("SELECT total_streams FROM " + TableRepositorioMusica + " WHERE artist_name = ?",(TotalStreams))
            ListTotalStreams = Info.fetchall()
            suma = 0
            
            for cancion in ListTotalStreams:
                suma += cancion[0]

            Largostreams = len(ListTotalStreams)

            if Largostreams != 0:
                sql = f"SELECT dbo.division({suma}, {Largostreams})"
                promedioparcial = (Info.execute(sql).fetchone()[0])
                promediofinal = promedioparcial
                print(f"\tEl promedio de los streams considerando todas las canciones de '{TotalStreams}' es aproximadamente: {promediofinal}")
                ExitFlag = False
                break
            else:
                print("\t\tNo se a encontrado ningun artista...")
                Answer = Functions.Answer()
                if Answer == False:
                    ExitFlag = False
                    break

    elif UsuarioSelect == 12:
        Info.close()
        conexion.close()
        exit()

    elif UsuarioSelect != False:
        print("|⚠️| Ingrese una opcion dentro del rango (1-13) |⚠️|")
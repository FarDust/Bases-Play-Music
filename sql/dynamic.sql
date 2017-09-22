SELECT Artista.* FROM Artista, Banda, Miembro WHERE Artista.id = Miembro.ida AND Banda.id = Miembro.idb AND Artista.nombre = $1

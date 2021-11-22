# Coneixements previs

- Protocol HTTP: https://tubeme.acacha.org/http
- Què és NodeJs i que són els paquets Javascript (Bundles): 
  - Videos 2 i 3 de la serie: https://www.youtube.com/playlist?list=PLyasg1A0hpk2MhbwKbDimNHQXmdqC8CYi
  
No és imprescindible però també us pot ser interessant saber com està feta la API que utilitzarem. 
Com crear una API Laravel: Vídeos 124 i 125 de la serie casteaching, aplicació Laravel amb TDD: 

- Vídeos 124 i 125 de: https://tubeme.acacha.org/tdd

# Paquet NPM

Instal·lació:

```bash 
npm install casteaching
``` 

Exemple d'ús:

```javascript
import casteaching from 'casteaching'

// Obtenir llista de vídeos publicats
casteaching.videos()

// Obtenir vídeo per ID
casteaching.video.show(1)

// Crear video
casteaching.video.create({name: 'PHP 101', description: 'Bla bla bla',  url: 'https://youtube.com/...' })

// Update video
casteaching.video.update(1,{name: 'PHP 101', description: 'Bla bla bla',  url: 'https://youtube.com/...' })

// Destroy
casteaching.video.destroy(1)
```



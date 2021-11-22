# Instal·lació

```bash 
npm install casteaching
``` 

# Usage 

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

# Author

Sergi Tur Badenas

# More info
- https://github.com/acacha/casteaching

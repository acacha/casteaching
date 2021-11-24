# Coneixements previs

- Protocol HTTP: https://tubeme.acacha.org/http
- Què és NodeJs i que són els paquets Javascript (Bundles): 
  - Videos 2 i 3 de la serie: https://www.youtube.com/playlist?list=PLyasg1A0hpk2MhbwKbDimNHQXmdqC8CYi
  
No és imprescindible però també us pot ser interessant saber com està feta la API que utilitzarem. 
Com crear una API Laravel: Vídeos 124 i 125 de la serie casteaching, aplicació Laravel amb TDD: 

- Vídeos 124 i 125 de: https://tubeme.acacha.org/tdd

# Screencasts

https://tubeme.acacha.org/javascript_package | https://tubeme.acacha.org/package_javascript | https://tubeme.acacha.org/llibreria_javascript |
https://tubeme.acacha.org/casteaching_javascript

## 101

Conceptes previs:
- Javascript bundles, export/import -> https://www.youtube.com/watch?v=VmlSy0Y7uso&list=PLyasg1A0hpk1Ew0daOLwgkt02EcZwXrEY&index=3

Continguts
- Explicació del que volem fer
- Definició de la API
- Comprovar existència del paquet a npmjs
- Creació del paquet des de zero:
- npm init -> Creació package.json
- Creació del fitxer index.js
- export/import
- Crear un codi manual per comprovar el funcionament de la nostra llibreria (al no fer TDD, només queda tests manual...)
- Introducció a axios
- Programació asincrona amb Javascript
- Javascript Closures/Callbacks
- Javascript Promises
- Callback Hell -> 
- Javascript async/await
- Executar codi Javascript a Laravel -> Laravel mix -> Laravel watch. Codi inserit i codi compilat
- DOMContentLoaded -> Entendre que l'ordre en que apareix el codi en Javascript no té pq ser l'ordre en que s'executa el codi
- Depuració amb Chrome Dev Tools de peticions HTTP XHR/fetch
- Diferències entre peticions HTTP regulars i peticions HTTP XHR/fetch/axios
- Diferents formes executar codi Javascript: inserit a HTML, amb Laravel Mix, Javascript Vanilla, Vue.
- Publicació versió 1.0: només amb la R (List) de CRUD | nom login | npm publish


## 102 -> Vue 1 -> Previ: https://www.vuemastery.com/courses/intro-to-vue-3/creating-the-vue-app-vue3

- Objectiu: Publicació versió 1.1: Resta del CRUD (Store, show, update, destroy)
- Llibreria o servei per accedir a la API -> Concepte Service en Javascript. Objecte video
- video.show(id) | video.create(data) | video.update(id,data) | video.destroy(id)
- Nivell extra d'abstracció per millora el codi
Configuració axios:
- baseURL
- Informació autenticació
- Capçaleres HTTP
- mime/type -> application/json -> Lo habitual és application/html
- Proposta exercicis: gestió errors -> Try catch
- Exemple amb Vue per provar la nostra llibreria
- Diferències entre codi Vue i Laravel Blade templates
- Instal·lació de Vue a Laravel Jetstream
- Components Vue -> Single File Components -> Necessita de Laravel Mix per funcionar (webpack)
- Implementació VideosList
- Proposta exercicis per mostra errors
- 
IMPORTANT: les llibreries no tenen pq gestionar les excepcions, això ho farà l'apicació que executa la llibreria.

PLANTILLES
Les plantilles (Tailwind CSS) poden ser les mateixes només cal fer petites adaptacions entre els diferents sistemes:
- Plantilles Laravel Blade
- Plantilles Vue
- Plantilles Ionic = Plantilla Vue + Components Ionic predefinits

TESTOS AMB VUE -> Problema Javascript Asíncron -> Testos de navegador -> Laravel Dusk|Cypress són necessaris -> video 127 

## 103
- Deixem pendent Test no funciona per que utilitzem Javascript asíncron -> Testos de Navegador.
- Components Anidats/nested
- Implementació de les accions: update/destroy
- Vue Dev Tools per depurar components Vue
- Xarxa Chrome Developer -> Podem simular connexions de xarxa lentes  

Qüestions de Vue que em vist en aquests videos:
- Instal·lació de Vue -> import Vue i muntatge de Vue en un component HTML utilitzant CSS selectors.
- Attribute binding: https://www.vuemastery.com/courses/intro-to-vue-3/attribute-binding-vue3
- Conditional rendering: https://www.vuemastery.com/courses/intro-to-vue-3/conditional-rendering-vue3
- Lists rendering: https://www.vuemastery.com/courses/intro-to-vue-3/list-rendering-vue3
- Event handling: https://www.vuemastery.com/courses/intro-to-vue-3/event-handling-vue3
- Components and props: https://www.vuemastery.com/courses/intro-to-vue-3/components-and-props-vue3
- Comunicating events: https://www.vuemastery.com/courses/intro-to-vue-3/communicating-events-vue3
- Forms and model: https://www.vuemastery.com/courses/intro-to-vue-3/forms-and-v-model-vue3
- Ens trobem que no ens funcionen les peticions a la API per qüestions de permisos -> Falta token
Intro to vue 3:
- https://www.vuemastery.com/courses/intro-to-vue-3/intro-to-vue3

# 104 
- Afegir Token utilitzant la interfície gràfica de Laravel Jetstream
- El token permet al nostre codi Javascript comportar-se execatament igual que si fossim l'usuari equivalent al qual pertany el token
- Boto de refresh
- Problema de comunicació entre components -> Solucionarem al pròxim vídeo.

# 105
- Publicar nova versió del paquet
- Afegir fitxer README.
- Comunicació entre components. 
- Comunicació components pares i fills
- Event Bus-> Comunicació enviant esdeveniments entre components -> Problema -> Coupled
- Events -> Disparar/emitir events -> Escoltar/procesar events.
- UX i UI: afegir components UI a la interfície gràfica per tal de millora la seva experiència -> UX
- Mostrar missatges error i missatges ok -> Components status
- TODO : spinners

Que veiem de Vue:
- Lifecycle Hooks: created com a constructor
- Events amb Vue: emisio d'events i recepció events. Custom events i events ja existents (click)
- Conditional rendering

# 106
- Solució exercicis proposats anteriors
- Arrow functions i this
- Comunicació entre components: reaprofitar el formulari de creació per a editar.
- Component editing
- Proposta exercici: mostrar errors amb el component status

## 10X

Repassar el que hem fet:
- Laravel Jetstream no porta Vue -> Hem vist com instal·lar
- Vue és un framework progressiu -> es pot utilitzar amb un simple CDN (Javascript de tota la vida) o amb eines tipus webpack, Laravel mix, vue cli, vite etc.
- Els single File components -> fitxer .vue -> Necessiten de Laravel Mix / Webpack -> No funcionen amb només navegador sense compilar
- Recordeu la diferència entre projectes juguet/bàsics i real world Vue


Comparativa real word:
- Axios a real world -> Fetch de serie a Javascript
- Vue amb CDN i sense .vue -> Components Vue però necessitat de Vite o Vue-cli (webpack) o Laravel Mix (webpack)
- Navegació multipàgina -> Problema de cody WET i layouts -> Shell app -> Vue router -> SPA

PLANTILLES
Les plantilles (Tailwind CSS) poden ser les mateixes només cal fer petites adaptacions entre els diferents sistemes:
- Plantilles Laravel Blade
- Plantilles Vue
- Plantilles Ionic = Plantilla Vue + Components Ionic predefinits


# Paquet NPM

Pujat a npmjs: https://www.npmjs.com/package/casteaching

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

## Truc, Local paths

Fitxer package.json, utilitzar "file:":

```json
{
    "private": true,
    "scripts": {
        "dev": "npm run development",
        ...
    },
    "dependencies": {
        "casteaching": "file:./casteaching_package",
        "vue": "^2.6.14"
    },
    "devDependencies": {
        "@tailwindcss/forms": "^0.3.1",
        ...
    }
}
``` 

## Com es publica un paquet

- Crear un usuari a npmjs
- Crear fitxer package.json amb npm init
- Logar-se amb npm login
- Publicar amb npm publisj

## Llista de videos

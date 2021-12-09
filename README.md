![image](https://user-images.githubusercontent.com/4015406/139868670-5d6179cd-6ddd-4c2e-836d-afbc4bfac424.png)

# Projecte en producció

https://casteaching.alumnedam.me

# Notes markdown

Més info a: https://github.com/acacha/wiki/blob/main/casteaching.md

# Screencasts/Video tutorials a Youtube

https://tubeme.acacha.org/tdd

# Projectes relacionats/Germans

- Javascript Package casteaching: https://tubeme.acacha.org/javascript_package
- Casteaching Ionic: Versió amb frontend Ionic (app multiplataforma incloent versió Android) https://tubeme.acacha.org/ionic_realworld

# Autor

- Sergi Tur Badenas: https://acacha.github.io
- Instagram: https://instagram.com/acacha_dev
- Github: https://github.com/acacha

![image](https://user-images.githubusercontent.com/4015406/140644527-e186bf90-e556-4970-98ed-3f00c5f1af11.png)

# Codi font dels alumnes

- Audí Bielsa, Daniel: https://github.com/daudi44/casteaching
- Avante Caballé, Marc: https://github.com/AvanteCaballe/casteaching
- Brusca Manchón, Albert: https://github.com/Albert-Brusca/casteaching
- Goncear, Tudor: https://github.com/tgoncear/casteaching
- Moreno Giraldo, Jhon: Jhon1348: https://github.com/Jhon1348/casteaching
- Muñoz Zafra, Ferran | https://github.com/Fmunozzafra/casteaching
- Pont Lopez, David: Palanka777: https://github.com/Palanka777/casteaching.git
- Rius Rivas, Alba: AlbaRiius: https://github.com/AlbaRiius/casteaching
- Tomas Altadill, Axel: AxelTomas99: https://github.com/AxelTomas99/casteaching
- Gabriel Urs. Gabriel: l3lackJack https://github.com/l3lackJack/casteaching
- Tur Badenas, Sergi: Alumne DAM Prova: https://github.com/AlumneDAMPRova/casteaching


# Projectes en explotació dels alumnes

- Audí Bielsa, Daniel: http://casteaching.danielaudibielsa.codes/
- Avante Caballé, Marc: http://casteaching.marcavante.codes/
- Brusca Manchón, Albert: http://casteaching.albertbrusca.me/
- Goncear, Tudor: http://casteaching.tudorgoncear.me/ 
- Moreno Giraldo, Jhon: Jhon1348: http://casteaching.jhonmoreno.codes
- Pont Lopez, David: Palanka777: http://casteaching.davidpont.me/
- Rius Rivas, Alba: -
- Tomas Altadill, Axel: AxelTomas99: http://casteaching.axeltomas.codes/
- Muñoz Zafra, Ferran | http://casteaching.ferranmunozzafra.me/
- Urs, Gabriel: l3lackJack: http://casteaching.gabriel.alumnedam.me/
- Tur Badenas, Sergi: Alumne DAM Prova: https://github.com/AlumneDAMPRova/casteaching

# Versió de l'aplicació per a mòbils

- Ionic casteaching: https://github.com/acacha/casteachingIonic

# 109 Feature UI -> Vista mostrar video

STARTING FROM SCRATCH
- Start with a feature not a layout -> Focusing on the value -> Evitar procastrinació
  - No cal pensar el layout de tota l'aplicació, el shell sinó la nostra feature 

FEATURE

**Jerarquia**

Dades principals
- Title del vídeo
- Description -> Pensar podrà ser markdown
- URL -> URL del vídeo per incrustar el vídeo -> de moment YOUTUBE
Dades secundàries
- Data de publicació, 
- Data de creació, data última modificació -> només per backend?, li cal a l'usuari final?
- Navegació -> next, previous
- Series -> TODO

- Details come later
- Hold the color -> grayscale -> Force to use spacing,contrast and size 
- Don't design to much
- Work in cycles
- Be a pessimist -> si no tenim clar si una funcionalitat la implementarem la trèiem
- Choose a personality -> Tailwind CSS: https://tailwindcss.com/
  - Simple -> ESCOLLO ESTA
  - Playful
  - Elegant
  - Brutalist
- Escollir una font -> utilitzem -> Tailwind UI  Tipus de font a mida amb l'estil
- Colors primaris -> Blue is safe an familiar -> Pink més playful -> Golds poden ser més elegants
- Borders/cantonades -> Molt marcades indiquen més playfull, cap indica seriositat, simple -> poc border radius
- LIMIT YOU CHOICES -> Això ja ho fa Tailwind CSS
  - Mides de text
  - Mides borders, paddings, spacings, etc

### Jerarquia

De totes les dades d'un vídeo quina és la més IMPORTANT?
- LA URL -> El vídeo en si -> el posem davant de tot
- Títol -> segon en importància
- Descripció: tercer

La mida no ho és tot
- Primary and Secondary content
  - Tipografia: font-weight
  - Softer colors -> escala de grisos
  - Limitar el nombre colors i el nombre de font weights


**VIDEO**

IFRAME DE YOUTUBE

**TITLE**

- Background color -> Evitar blanc
- Plugin de Tailwind instal·lat a PHPStorm
- space-y 6 per evitar tants paddings

Tipografia i Jerarquia:
- Tipus de font: Tailwind UI -> 
- Inter Font Family: https://tailwindui.com/documentation#optional-add-the-inter-font-family
- Responsive Design de la lletra? Sí podem aprofitar quan tenim més espai per fer les fonts més grans
- Color de lletres. Evitar el negre pur.
- Line-height and font size are inversely proportional: Line-heigh 1 per a titols
- Tenir en compte els pitjors casos sobretot amb dades que venen de base de dades -> Overflow, titol llarg com queda, límit màxim a base de dades
- Letter spacing: 

CARD per ressaltar-ho
- Title a Card heading
- Altres pocions secundaries dins la card

Navegació:
- Button groups


Dividers?

**DESCRIPTION**

- Controlar la mida màxima de la font i utilitzat diseny responsive Tiny Teaks -> Petits canvis a mesura que disposem de més espai
- Text gray


# RESPONSIVE DESIGN
- Lorem isum text llar a descriptión. Un title més realista
- Centrar contingut? mx-auto


# CRUD

- No ha de ser public -> guest_users no han de tenir accés
- Logged Users? Tampoc han de tenir accés -> només administradors
- Authorization -> Permisos per administadors de videos
- Superadministradors -> root -> Independentment dels permisos puguin realitzar qualsevol acció
- URL SHOW -> /videos/1
- URL -> /manage/videos
- Controlador Model Vista: 
- Controlador: VideosManageController
- Model -> Video.php
- Vista: videos.manage.index
- Test: VideosManageControllerTest

CRUD -> Controladors Resource Controllers

# Detalls a polir UI

- Marge del formulari de creació card en mobile -> Eliminar div extra amb un p-4 de padding
- bg-white a tot el formulari
- Zebra: Even row amb Laravel
- type="text" per evitar error no surt focus indigo correcte
- Menu de navegació en medium

# Testos published 

- Scopes
- Unit test -> methods publish -> unpublish

# Eloquent Relacions
- Relació 1 a n -> Series i videos
- TDD, test units de series i videos per definir les relacions

# Exercici Crud de series

Fer-ho en una branca
Serie:
- title: Nom de la sèrie
- description: nullable
- media: imatge de la sèrie

Branca series -> Acabar fent merge a main amb la solució

# DDD (Domain Driven Design) i focusing on the value

Dashboard
- Info específica de l'usuari? TODO -> Treure de moment o desactivar pq no ho tenim implementat

Landing Page:
- Dos vistes -> Usuari logat o usuari no logat -> canvia el CTA
- Utilitzar TailwindUI per formatar la pàgina però les idees extretes de Laracasts

CTAs Browse series
- Mostrar un grid de series, ordenades per les més recents a dalt de tot
- Registrar-se (només usuari no logat)

Altres:
- Browse de vídeos

CTA
- 

# UI TODO

- Landing Page
  - CTA -> Browse series
  - STATS -> Número de vídeos | Hores totals d'aprenentatge | Numero de series
  - Features section amb les series destacades
  - Part de recomanacions altres usuaris
  - Part de preus de l'aplicació
  - Part sobre l'autor
  - Mailing List -> Casteaching news
  - Peu de pàgina amb Facebook, instagram, etc
  - Link a privacy i terms, Partners i webs amigues -> xarxes socials
- Spinners de processament
- Zero State Quan no hi ha cap vídeo que mostrar a la taula -> Comprovar no hi ha errors
- Responsive Design per a taules: Cards apilades

# TODOS

- [ ] Petites millores -> Marcar al editar videos http://casteaching.test/manage/videos/1 al menu de navegació que encara estem a videos
- [ ] Internacionalització
- [ ] Topics/Tags -> Per etiquetar videos i series -> Relació polimorfica
- [ ] Edit d'usuaris igual que amb videos -> Proposta d'exercici i donar resultat als alumnes
- [ ] Vídeo explicant pull requests -> Editar el fitxer README de acacha/casteaching per afegir els links a explotació i elns links codi font
- [ ] API
- [ ] Published i scopes
- [ ] Branca de series -> CRUD de series sense la relació 1 a n amb Videos
- [ ] Explicar scripts de bash -> deploy.sh | tubeme.sh | Altres
- [ ] Components predefinits Laravel Livewire -> aplicació exemples Laravel livewire
- [ ] Component Markdown Editor per a descripció
- [ ] Un altre opció pot ser utilitzar un GIST o MD de Github com a font
- [X] Explicar alpine-js que està instal·lat de serie i utilitzem al component x-status
- [X] Eines per a depurar la sessió i altres amb Laravel: Laravel Debugbar i Laravel Telescope
- [X] Even rows -> https://laravel.com/docs/8.x/blade#loops | $loop->last  | $loop->first | $loop->even | $loop->odd

## DESCRIPTION / MARKDOWN EDITOR / TEXTAREA EDITOR amb suport per markdown

## API

Videos 124 i 125.

- Insights i prova script deploy.sh
- Exemple de treball amb branca Creem branca apis i fem merge només quan estigui ok
- Començar per mètode SHOW
- Ja posats fem tota la api que no es complexa
- Proposta api per a series -> TDD -> Us dono els testos (especificació) i genereu el codi

# Video 126

TODO grabar un vídeos explicant cap a on tirar

On anar partir d'aquí:

- Video 127 i seguents: TDD amb Laravel (web PHP pur i Laravel Blade) però també Laravel Livewire
- Aplicacions multiplataforma
  - Contingut Previ: creació d'un paquet Javascript -> Service accés api REST amb Axios.
  - Mobile APP amb Ionic + API REST CASTEACHING: sèrie Ionic casteaching
  - Android App -> TODO
  - Laravel amb Vue

# CASTEACHING JAVASCRIPT LIBRARY

https://tubeme.acacha.org/llibreria_javascript

Després dels vídeos 124 i 125 -> Llibreria Javascript -> Paquet a part -Submodules

101:
- Explicació del que volem fer
- Documentació API.md

## VUE dins de la branca API
Exemple de com utilitza API amb Vue dins de Laravel

# 126

Es tracta d'un "Glue video", pegamento per unir les múltiples peces que anem a crear. Us explico el que farem, a partir d'aquí seguim múltiples camins en paral·lel

1) Objectius

MP7
- Aprendre ús de components UI amb Vue i Ionic. Component Laravel Blade

MP8 Desenvolupaments aplicacions mòbils:
- Aprendre Vue
- Ionic + Vue. Creació aplicacions multiplataforma reals amb Laravel API REST

MP9 Seguretat i Processos
- Coneixements previs: Laravel Security
- Aprendrem a utilitzar Tokens per accedir a APIS REst
Autenticació en Frontend: 
- Aplicacions SPA. Autenticació i Laravel Sanctum
- Laravel Passport: Protocol autenticació i permisos Oauth
- Social Login

2) PATH|Camí a seguir

MP7
- En tots els cursos utilitzem User Interface i aprenem components Laravel Blade + Tailwind CSS/Tailwind UI i components dispositius mòbils amb Ionic
- Com crear un paquet Javascript: https://tubeme.acacha.org/javascript_package
  - Excusa per practicar Vue (interessant haver fet abans curs intro Vue 3) i començar tema processos amb programació concurrent/asíncrona de Javascript 
  - Excusa per aprendre Clients HTTP: XHR/Fetch/Axios
MP8 Desenvolupaments aplicacions mòbils:
- Teoria: Fer el curs (no cal entregar res) sobre introducció a Vue de Vue Mastery
  - https://www.vuemastery.com/courses/intro-to-vue-3 
  - Opcionalment us ho podeu saltar o consultar els videos del curs quan tingueu dubtes i7o al final
- Fer el curs IonicCasteaching: https://tubeme.acacha.org/ionic_realworld

MP9 Seguretat i Processos
- Coneixements previs: Sèrie. Laravel Security (prioritat baixa). Es tracta de teoria que podeu fer a posteriori o saltar-se
- Programació asincrona (Procesos) amb Javascript. Primer vídeo de la serie explica que són els callbacks, les promeses y async/await amb Javascript https://tubeme.acacha.org/javascript_package 
- TODO -> Videos IonicCasteaching sobre com fer el Login i la autenticació en aplicacions SPA
- Continuació curs TDD

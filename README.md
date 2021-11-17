![image](https://user-images.githubusercontent.com/4015406/139868670-5d6179cd-6ddd-4c2e-836d-afbc4bfac424.png)

# Projecte en producció

https://casteaching.alumnedam.me

# Notes markdown

Més info a: https://github.com/acacha/wiki/blob/main/casteaching.md

# Screencasts/Video tutorials a Youtube

https://tubeme.acacha.org/tdd

# Autor

- Sergi Tur Badenas: https://acacha.github.io
- Instagram: https://instagram.com/acacha_dev
- Github: https://github.com/acacha

![image](https://user-images.githubusercontent.com/4015406/140644527-e186bf90-e556-4970-98ed-3f00c5f1af11.png)

# Codi font dels alumnes

# Projectes en explotació dels alumnes

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

- Insights i prova script deploy.sh
- Exemple de treball amb branca Creem branca apis i fem merge només quan estigui ok
- Començar per mètode SHOW
- Ja posats fem tota la api que no es complexa
- Proposta api per a series -> TDD -> Us dono els testos (especificació) i genereu el codi

![image](https://user-images.githubusercontent.com/4015406/139868670-5d6179cd-6ddd-4c2e-836d-afbc4bfac424.png)


# Notes markdown

Més info a: https://github.com/acacha/wiki/blob/main/casteaching.md

# Screencasts/Video tutorials a Youtube

https://tubeme.acacha.org/tdd

# Autor

- Sergi Tur Badenas: https://acacha.github.io
- Instagram: https://instagram.com/acacha_dev
- Github: https://github.com/acacha

![image](https://user-images.githubusercontent.com/4015406/140644527-e186bf90-e556-4970-98ed-3f00c5f1af11.png)

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

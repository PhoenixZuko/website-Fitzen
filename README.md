# Fitzen - Blog Scalabil si Optimizat

**Fitzen** a inceput ca o tema HTML5 gratuita, dar a evoluat intr-o platforma completa pentru gestionarea articolelor, optimizata pentru SEO si utilizare eficienta.

---

## ** Caracteristici Principale**

### ** Design Responsiv si Scalabil**
- Tema HTML5 optimizata pentru desktop, tableta si telefon.
- Performanta ridicata si incarcare rapida.
- **Butoane de Zoom In si Zoom Out** pentru dispozitive mobile, oferind o solutie simpla si eficienta pentru a evita problemele cu textul prea mic.

### ** Dashboard pentru Gestionare**
- Adaugare si editare de articole dintr-un **dashboard dedicat**.
- Sistem de moderare a comentariilor direct din panoul de administrare.

### ** Articole cu mai multe parti**
- Posibilitatea de a adauga **parti suplimentare** unui articol existent.
- PHP-ul genereaza automat un **buton de navigare** catre urmatoarea parte.

### ** Tracking & Analytics**
- Stocare **IP** in SQL pentru a contoriza **numarul de vizualizari** ale unui articol.
- Vizualizarile sunt afisate pe pagina pentru transparenta.

### ** Sistem de Rating (Vot cu Stele)**
- Implementat in **JavaScript**, utilizatorii pot vota articolele cu stele.
- Protectie impotriva spamului: fiecare utilizator poate vota **o singura data** (inregistrat prin IP).

### ** SEO & Optimizare**
- **Autogenerare de metadate**: PHP extrage titlul articolului si il completeaza automat in **meta tags**.
- Site-ul a fost testat si obtinut un scor **SEO de 100**.
- Include si un **sitemap** pentru o indexare mai eficienta de catre motoarele de cautare.

---

## ** Tehnologii Folosite**
- **Frontend:** HTML5, CSS3, JavaScript
- **Backend:** PHP, MySQL
- **SEO:** Optimizare meta tags, sitemap
- **Tracking & Analytics:** Stocare IP, contorizare view-uri
- **Interactivitate:** Sistem de vot JavaScript, navigare articole
- **Optimizare Mobil:** Media Queries, butoane de Zoom In/Out

---

## ** Instalare & Configurare**
1. Cloneaza repository-ul:
   ```sh
   git clone https://github.com/utilizatorul-tau/fitzen.git
   ```
2. Importa baza de date SQL in serverul MySQL.
3. Configureaza conexiunea SQL in fisierul `config.php`:
   ```php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "fitzen";
   ```
4. incarca fisierele pe un server cu suport PHP & MySQL.
5. Acceseaza dashboard-ul pentru administrare.

---

## ** Licenta & Drepturi**
- Tema de baza este **gratuita si open-source**.
- Codul modificat este **disponibil pentru utilizare si extindere**.

  **Fitzen nu este doar un simplu site, ci un sistem avansat de gestionare a continutului!** 


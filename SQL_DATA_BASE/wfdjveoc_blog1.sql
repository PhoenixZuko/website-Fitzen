-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 20, 2025 at 08:55 PM
-- Server version: 8.0.40-cll-lve
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wfdjveoc_blog1`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `summary` text COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `summary`, `content`, `created_at`, `image`) VALUES
(1, 'Despre Noi', 'Nu sunt un expert, dar am un nivel acceptabil de cunoștințe, puțin mai mult decât un începător. Recunosc că urăsc atitudinea celor care se cred experți și consideră că le știu pe toate. În paradoxul științei, adevăratul savant este cel care, pe măsură ce descoperă mai multe, realizează că știe din ce în ce mai puțin. Această umilință intelectuală este, de fapt, motorul progresului. Este o lecție pe care o respect și care mă inspiră să continui să învăț.\r\n\r\nAcceptăm și critici, dar cu o singură condiție: să vină la pachet cu soluții!', '    **Un Proiect Născut din Pasiune și Dorință de a Inspira**\r\n\r\nAcest site este materializarea unei dorințe mai vechi care, din diverse motive, a fost amânată timp de ani de zile. Uneori din nesiguranță, alteori pentru că nu-mi doresc și nu mi-a plăcut niciodată ideea de a fi o persoană publică. Totuși, recent am realizat că adevăratele lucruri de valoare se regăsesc în pasiuni, iar experiența vine din greșeli. Și, odată cu greșeala, omul învață și evoluează, descoperindu-și potențialul.\r\n\r\n\r\nSubiectele acestui site sunt, de fapt, o reflecție a pasiunilor mele. Este un proiect personal bucuros ca e realizat, deoarece reprezintă o provocare și, totodată, o oportunitate de a învăța și de a construi ceva cu adevărat semnificativ. Cu ajutorul minunat al lui ChatGPT, acest site a devenit prima mea pasiune concretizată și, cu mândrie, o consider o realizare demnă de împărtășit.\r\n\r\nNu caut clisee și nu sunt interesat de audiență. Mi-aș dori mai degrabă să am 10-12 oameni care înțeleaga ceea ce vreau să realizez decât 100.000 de click-uri ,like-uri pentru audiență sau rating. Sunt genul de persoană care evită televizorul, politica,\"chilotareala\" sau subiectele mainstream. În schimb, sunt fascinat de tehnologie, sport și mai ales de capacitatea uimitoare a corpului uman de a se adapta. Mă fascinează puterea imaginației umane, care transformă gândurile abstracte în realități concrete, proiectate și create cu o precizie remarcabilă.\r\n\r\nAcest site este un proiect personal, dar deschis pentru oricine dorește să contribuie cu idei, articole temporare sau permanente ori, pur și simplu, să citească și să se inspire. Acceptăm și critici, dar cu o singură condiție: să vină la pachet cu soluții!  Nu sunt un expert, dar am un nivel acceptabil de cunoștințe in it , puțin mai mult decât un începător . Recunosc că urăsc atitudinea celor care se cred experți și consideră că le știu pe toate. În paradoxul științei, adevăratul savant este cel care, pe măsură ce descoperă mai multe, realizează că știe din ce în ce mai puțin. Această umilință intelectuală este, de fapt, motorul progresului. Este o lecție pe care o respect și care mă inspiră să continui să învăț.\r\nScopul meu este de a prezenta lucruri pe care mi-ar fi plăcut să le găsesc într-un mod practic și realist, fără clisee sau promisiuni exagerate. De exemplu, voi aborda subiecte despre alimentația sănătoasă, tehnologie sau metode de motivație.\r\n\r\nPentru mine, un succes adevărat ar fi să motivez o singură persoană să facă o schimbare benefică în viața sa. De asemenea, sunt deschis într-o manieră prietenoasă pentru cei care au cunoștințe și abilități mai avansate și doresc să contribuie și ei la acest proiect. O astfel de colaborare ar fi binevenită, iar fiecare contribuție ar reprezenta un pas în direcția corectă.\r\n\r\nAcesta este un spațiu pentru pasiuni, idei și colaborare. Este locul unde hobby-urile devin puncte de conexiune și unde oamenii pot împărtăși experiențele lor unice într-un mod autentic. Dacă și tu dorești să faci parte din această comunitate sau ai ceva de oferit, ești binevenit. Haide să construim împreună ceva care contează!\r\n\r\nConcluzie:\r\n\r\nDetest superficialitatea sub toate formele ei. Nu îmi plac limbajele afectate, site-uri,stiri, care promit \"secrete\" sau articolele senzaționale menite să atragă atenția prin exagerări. Resping consumatorismul exagerat, aroganța celor care se consideră superiori și cliseele fără substanță.\r\n\r\nMai mult, mă deranjează așa-zișii specialiști care, în loc să explice clar, își maschează lipsa de cunoștințe în fraze complicate, sugerând că „oricum nu ai înțelege”. Disprețuiesc pe cei care judecă oamenii fără să îi cunoască, pentru că, astfel de judecăți nu reflectă realitatea, ci superficialitatea celor care le emit. Cei care își exagerează importanța și pe cei care cred că adevărul poate avea o singură direcție.\r\n\r\nCred cu tărie în autenticitate, în diversitatea ideilor și în puterea de a învăța unii de la alții printr-un dialog deschis și respectuos. Adevărata valoare stă în pasiune, curaj și în capacitatea de a împărtăși experiențele noastre într-un mod sincer și constructiv.\r\n', '2024-12-06 20:00:53', 'fitZen.png');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'admin@example.com', '$2y$10$v7D34rO4ZmaaPeAajqWnmegMEVCiIYA1QMxrydDj/81nIhGj6zwQO', '2024-12-07 11:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `summary` text COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `author_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `category` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `views` int DEFAULT '0',
  `categories` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `summary`, `content`, `author_id`, `created_at`, `image`, `category`, `views`, `categories`, `slug`) VALUES
(1, 'Importanța Sportului în Viața Cotidiană', 'Sportul este esențial pentru o viață sănătoasă. De la îmbunătățirea stării fizice până la reducerea stresului, activitățile sportive aduc beneficii fizice și mentale. Participarea regulată ajută la prevenirea bolilor și îmbunătățește disciplina, construind obiceiuri pozitive în viața de zi cu zi.', 'Sportul joacă un rol fundamental în menținerea sănătății fizice și mentale. Indiferent dacă alegi alergarea, înotul sau sporturile de echipa, beneficiile sunt evidente: o inimă mai sănătoasă, o mai bună circulație sanguină și un corp mai puternic. Sportul nu doar că ajută la prevenirea bolilor, dar stimulează și sistemul imunitar, făcându-ne mai rezistenți la provocările zilnice.\r\n\r\nDincolo de aspectele fizice, sportul contribuie la bunăstarea emoțională. Practicarea regulată eliberează endorfine, reducând stresul și anxietatea. Totodată, participarea la sporturi de echipă dezvoltă abilități sociale esențiale, precum cooperarea, comunicarea și încrederea în sine.\r\n\r\nUn alt aspect important este disciplina pe care sportul o aduce în viață. Stabilirea unor rutine de antrenament încurajează organizarea și motivația, elemente esențiale pentru succesul personal și profesional.\r\n\r\nPe scurt, sportul nu este doar o activitate fizică; este un mod de viață care ne ajută să ne simțim bine în pielea noastră, să rămânem sănătoși și să gestionăm mai bine provocările cotidiene. Indiferent de vârstă, începe astăzi să faci mișcare și bucură-te de beneficii!\r\n\r\n\r\n\r\n\r\n', 1, '2024-12-05 18:30:43', 'pic01.jpg', 'General', 20, NULL, NULL),
(2, 'Second Article', 'Summary for the second article.', 'Full content for the second article.', 2, '2024-12-05 18:30:43', 'pic02.jpg', 'General', 11, NULL, NULL),
(3, 'Third Article', 'A brief overview of the third article.', 'Here is the complete content for the third article.', 1, '2024-12-05 18:30:43', 'pic03.jpg', 'General', 11, NULL, NULL),
(4, 'Importanța Sportului în Viața Cotidiană', 'Sportul joacă un rol fundamental în menținerea sănătății și în îmbunătățirea calității vieții.', 'Sportul este esențial pentru o viață sănătoasă. De la îmbunătățirea stării fizice la reducerea stresului, practicarea regulată a sportului aduce beneficii multiple. Este o modalitate excelentă de a îmbunătăți sănătatea cardiovasculară, de a reduce riscul de boli cronice și de a crește nivelul de energie. Sportul nu este doar o activitate fizică, ci și un mijloc de a construi relații sociale și de a învăța valori precum disciplina, respectul și spiritul de echipă. De asemenea, activitățile sportive stimulează producția de endorfine, cunoscute sub numele de hormonii fericirii, contribuind astfel la o stare generală de bine. Indiferent dacă alegi alergarea, fotbalul, înotul sau ciclismul, beneficiile sportului sunt incontestabile.', 1, '2024-12-05 18:30:43', 'pic01.jpg', 'Sport', 15, NULL, 'importanta-sportului-in-viata-cotidiana'),
(5, 'Cum să Alegi Sportul Potrivit pentru Tine', 'Descoperă cum să identifici sportul care se potrivește cel mai bine stilului tău de viață și obiectivelor tale.', 'Alegerea sportului potrivit poate fi o provocare, dar este esențială pentru a te bucura de beneficiile sale. În primul rând, trebuie să îți stabilești obiectivele. Dacă dorești să pierzi în greutate, sporturi precum alergarea sau ciclismul pot fi ideale. Pentru creșterea masei musculare, antrenamentele de forță sau crossfit-ul sunt soluția. Dacă preferi activitățile în grup, poți opta pentru fotbal, baschet sau volei, care îți oferă și oportunitatea de a socializa. În plus, ia în considerare preferințele tale. Dacă îți place să fii în aer liber, sporturi precum drumețiile sau schiatul sunt perfecte. În schimb, dacă preferi să stai în interior, poți încerca yoga, pilates sau înotul. Este important să alegi ceva ce te face fericit și îți menține motivația pe termen lung. Nu uita să consulți un specialist pentru a te asigura că sportul ales este compatibil cu starea ta de sănătate.', 1, '2024-12-06 07:15:00', 'pic02.jpg', 'Sport', 14, NULL, 'cum-sa-alegi-sportul-potrivit-pentru-tine'),
(6, 'Cum funcționează ChatGPT și rețeaua neuronală', 'Un ghid simplu pentru a înțelege cum rețelele neuronale alimentează modele AI precum ChatGPT.', 'ChatGPT este un model de limbaj bazat pe rețele neuronale, conceput pentru a înțelege și genera text asemănător celui uman. La bază, acest model utilizează o arhitectură avansată numită Transformer, care analizează contextul frazelor și învață relațiile dintre cuvinte. Acest proces este realizat prin antrenarea unui set uriaș de date text și optimizarea răspunsurilor printr-o metodă numită învățare supravegheată.\n\nO rețea neuronală este o structură matematică inspirată de creierul uman, formată din noduri (neuroni) interconectate. În cazul ChatGPT, rețeaua neuronală utilizează milioane de astfel de noduri pentru a analiza textul și a genera răspunsuri relevante. Fiecare nod este responsabil pentru procesarea unei părți din informație, iar conexiunile dintre ele determină modul în care datele sunt transformate.\n\nUn aspect unic al ChatGPT este capacitatea sa de a folosi atenția. Acest mecanism permite modelului să identifice cuvintele cheie dintr-o propoziție și să le conecteze la alte părți ale textului. Rezultatul este o înțelegere profundă a contextului și o generare de răspunsuri fluide.\n\nÎn practică, ChatGPT poate fi utilizat pentru sarcini variate, de la redactarea de texte și traduceri, până la ajutor tehnic și educație. Înțelegerea modului în care funcționează o rețea neuronală este un prim pas pentru cei care doresc să exploreze lumea fascinantă a inteligenței artificiale.', 1, '2024-12-06 08:00:00', 'gpchat_tutorial.jpg', 'Tutoriale', 16, NULL, 'cum-functioneaza-chatgpt-si-reteaua-neuronala'),
(7, 'Importanța Somnului în Menținerea Sănătății', 'Somnul este esențial pentru o viață sănătoasă, influențând atât corpul, cât și mintea.', 'Somnul este o parte vitală a sănătății noastre generale, fiind la fel de important precum dieta echilibrată și exercițiile fizice. Studiile arată că adulții au nevoie de cel puțin 7-8 ore de somn pe noapte pentru a funcționa optim. Lipsa somnului poate duce la probleme precum oboseala cronică, scăderea imunității și chiar riscul crescut de boli cardiovasculare. În plus, somnul joacă un rol esențial în consolidarea memoriei și în menținerea stării de bine mentale. Pentru a avea un somn de calitate, este important să creezi un mediu liniștit și întunecat, să eviți utilizarea dispozitivelor electronice înainte de culcare și să menții un program regulat de somn. Înțelegerea beneficiilor somnului și aplicarea unor obiceiuri sănătoase poate avea un impact pozitiv major asupra vieții tale.', 1, '2024-12-06 18:47:10', 'sleep_health.jpg', 'Sanatate', 18, NULL, 'importanta-somnului-in-mentinerea-sanatatii'),
(8, 'Povestea Primei Călătorii în Străinătate', 'Prima călătorie în străinătate este o experiență memorabilă, plină de descoperiri și emoții.', 'Prima mea călătorie în străinătate a fost una dintre cele mai captivante experiențe din viața mea. Am ales o destinație europeană clasică: Paris, orașul luminilor. Cu un rucsac mic și o inimă plină de entuziasm, am explorat străzile înguste ale Montmartre, am admirat turnul Eiffel și am gustat celebrele croissante. Ceea ce m-a impresionat cel mai mult nu a fost doar arhitectura sau gastronomia, ci și diversitatea culturală. Fiecare persoană întâlnită avea o poveste, iar această interacțiune a adăugat un farmec aparte călătoriei mele. Pentru cei care planifică o primă excursie, recomand să își lase loc în itinerar pentru spontaneitate. Uneori, cele mai frumoase amintiri sunt cele neplanificate. Parisul m-a învățat nu doar să călătoresc, ci să apreciez fiecare moment al vieții.', 1, '2024-12-06 18:47:40', 'paris_travel.jpg', 'Blog', 25, NULL, NULL),
(10, 'Mitocondriile: Motorul Vieții și Secretul Performanței Umane', 'Introducere: Ce sunt mitocondriile și de ce sunt esențiale?\r\nOriginea mitocondriilor: Explică relația lor cu bacteriile arhaice și teoria endosimbiotică.\r\nImportanța lor: Sublinează cum fără mitocondrii, viața multicelulară nu ar fi posibilă.\r\nStatistici fascinante: Numărul de mitocondrii din organism și rolul lor în celulele musculare, inimă și creier.', '1. Rolul mitocondriilor în producerea de energie\r\nProducția de ATP: Cum mitocondriile transformă nutrienții în energie utilizabilă (procesul de fosforilare oxidativă).\r\nMetabolismul celular: Explică rolul lor în metabolizarea grăsimilor, carbohidraților și proteinelor.\r\nLegătura cu performanța fizică: Cum nivelul mitocondriilor influențează rezistența și recuperarea.\r\n2. Mitocondriile și sănătatea metabolică\r\nDisfuncții mitocondriale: Consecințele lor asupra sănătății (oboseală cronică, boli neurodegenerative, diabet).\r\nLegătura cu stresul oxidativ: Producerea radicalilor liberi și importanța echilibrului antioxidant.\r\nLongevitatea: Cum mitocondriile influențează procesele de îmbătrânire prin activarea sirtuinelor.\r\n3. Mitocondriile și reglarea hormonală\r\nSinteza hormonilor: Rolul lor în producerea de hormoni steroizi precum testosteronul și estrogenul.\r\nInteracțiunea cu glandele endocrine: Implicațiile pentru stres (cortizol) și regenerare.\r\n4. Mitocondriile ca senzori ai stresului\r\nRăspunsul la stres: Cum se adaptează mitocondriile la stresul acut (exerciții fizice, post intermitent) versus stresul cronic.\r\nDisfuncții cauzate de stres: Legătura cu inflamațiile, pierderea masei musculare și scăderea performanței cognitive.\r\nCum să îmbunătățești sănătatea mitocondrială: Strategii bazate pe antrenament fizic, alimentație, somn și reducerea stresului.\r\n5. Cum să optimizezi funcția mitocondrială?\r\nExercițiile fizice: Rolul antrenamentului aerobic și anaerobic în creșterea biogenezei mitocondriale.\r\nNutriția și suplimentele: Nutrienți esențiali (coenzima Q10, carnitină, acid alfa-lipoic) și rolul dietei ketogenice.\r\nPostul intermitent și termogeneza: Cum activarea mitocondriilor prin frig sau căldură poate îmbunătăți eficiența energetică.\r\nSomnul: Importanța somnului în regenerarea mitocondriilor.\r\n6. Mitocondriile și viitorul sănătății\r\nCercetări în domeniu: Terapii mitocondriale pentru tratarea bolilor cronice și neurodegenerative.\r\nMedicina personalizată: Cum analiza funcției mitocondriale ar putea ghida tratamentele personalizate.\r\nBiohacking mitocondrial: Metode moderne pentru optimizarea funcțiilor mitocondriale.\r\nConcluzie: De ce să îți pese de mitocondrii?\r\nRecapitularea rolului mitocondriilor în sănătatea generală și performanță.\r\nÎncurajare către un stil de viață care sprijină sănătatea mitocondrială.\r\nCheia unei vieți lungi, sănătoase și active începe cu grija pentru aceste mici, dar vitale componente celulare.', 1, '2024-12-09 22:57:54', 'miticondria.jpg', 'Blog', 24, NULL, 'mitocondriile-motorul-vietii-si-secretul-performantei-umane'),
(11, 'pisca ', 'adadadsa', 'asdadasdasdasdada', 1, '2024-12-10 11:54:14', 'paris_travel.jpg', 'Sport', 15, NULL, 'pisca'),
(12, 'O metoda de antrenament care te ajuta sa iti dezvolti muschii ramasi in urma, sa eviti accidentarile si sa iti imbunatatesti tehnica.', 'Metoda 1,5 este simpla. Faci repetari complete cu repetari partiale intre ele. Desi 1,5 inseamna \"unu si jumatate\", se pot folosi si sferturi de repetari, metoda fiind numita in acest caz 1 si 1/4. \r\n\r\nSa luam ca exemplu genuflexiunile! Cobori normal, apoi te ridici jumatate (sau un sfert), cobori din nou, si apoi te ridici complet - aceasta este o repetare folosind metoda 1,5. Poti introduce repetarile partiale si in partea de sus a genuflexiunii, coborand jumatate sau un sfert,  apoi te ridici la loc si cobori complet, inainte sa revii la pozitia de start - aceasta este o repetare. \r\n\r\nSa vedem care sunt beneficiile in a face astfel de repetari. ', '1) Adauga timp sub tensiune pe partea cea mai neglijata a exercitiilor\r\nStabileste cea mai puternica jumatate sau sfert al unui exercitiu si fa o jumatate sau sfert de repetare in plus in acea portiune. Nu conetaza marimea exacta a repetarii partiale, nu sta nimeni sa masoare exact.\r\n\r\nCa regula generala, evita sa treci prin punctul de blocaj al exercitiului respectiv (partea din raza de miscare de care iti este cel mai greu sa treci cand ridici greutatile). Fa repetarea partiala inainte sau dupa acest punct de blocaj. Va varia de la exercitiu la exercitiu. De exemplu, la indreptari, daca iti este greu sa ridici bara chiar cand ajungi cu ea sub genunchi, atunci ramai cu repetarile partiale deasupra genunchilor. \r\n\r\n2) Metoda 1,5 creste timpul sub tensiune in partea exercitiului care pune accent pe un anumit muschi\r\nHotaraste-te ce muschi vrei sa lucrezi, apoi determina ce portiune din exercitiu incarca cel mai mult muschiul respectiv.  De exemplu, pentru dezvoltarea picioarelor, vrei sa te lasi cat mai jos la genuflexiuni pentru a flexa soldurile cat mai mult si a incarca fesierii. Asa ca fa o repetare partiala in partea de jos a genuflexiunilor, pentru a iti lucra fesierii. \r\n\r\nPentru piept, sa lucrezi pectoralii mai mult, fa o repetare partiala dupa ce atingi pieptul cu bara. Partea de sus a genuflexiunilor va pune accent mai mult pe cvadricepsi, asa ca fa repetarea partiala acolo daca asta urmaresti. \r\n\r\n3) Aceasta metoda te ajuta sa petreci mai mult timp in partea exercitiului care se potriveste cel mai bine structuri tale\r\nExercitiile nu sunt \"rele\" in sine, dar exista pozitii si raze de miscare care pot crea probleme daca nu ai structura potrivita pentru ele. Stabileste pozitia \"de compromis\" la un exercitiu in functie de structura ta si istoricul accidentarilor, apoi incearca sa petreci mai putin timp in acele portiuni, in timp ce crezi mai mult timp sub tensiune in pozitiile sigure. \r\n\r\nCum nu vei putea folosi greutati la fel de mari cu metoda 1,5 nu vei incarca asa tare pozitiile care iti fac rau dar datorita repetarilor partiale in plus vei lucra intens restul miscarii. \r\n\r\n4) Metoda 1,5 poate fi folosita pentru corectarea tehnicii\r\nAlegea partea unui exercitiu unde esti blocat, apoi petrece mai mul timp acolo. Pierzi tensiune in partea de jos a unei genuflexiuni? Adauga o repetare partiala acolo. \r\n\r\nCompensezi la ridicarea peste bara la tractiuni prin rotunjirea umerilor? Petreci mai mult timp acolo adaugand repetarile partiale. Nu evita problema, confrunt-o!', 1, '2024-12-10 12:13:28', 'start.jpg', 'Sport', 20, NULL, 'o-metoda-de-antrenament-care-te-ajuta-sa-iti-dezvolti-muschii-ramasi-in-urma-sa-eviti-accidentarile-si-sa-iti-imbunatatesti-tehnica'),
(15, 'Cum să Îți Faci Curaj să Te Apuci de Sport: O Abordare pentru Începători', 'Dacă sportul este un element nou în viața ta, cel mai important lucru este să începi cu pași mici și să nu te forțezi. Corpul tău are nevoie de timp pentru a se adapta treptat la mișcare, iar cheia succesului este să transformi sportul într-o rutină zilnică, plăcută și sustenabilă. În loc să te arunci direct într-un antrenament intens, începe ușor, ascultă-ți corpul și bucură-te de progresul tău. Construind această obișnuință pas cu pas, vei descoperi că sportul devine o parte firească a vieții tale.', 'Sportul: Mai Mult Decât o Activitate Fizică\r\n\r\nÎnainte de a percepe sportul ca o simplă activitate fizică, este esențial să înțelegem că acesta este profund coordonat de sistemul nervos, având creierul ca centru de control. Orice mișcare pe care o facem, de la un simplu pas până la un antrenament complex, este rezultatul unei coordonări fine între creier, sistemul nervos și mușchi.\r\n\r\nSportul: O sinergie între creier și corp\r\nÎn timpul activității fizice, creierul transmite semnale către mușchi prin intermediul sistemului nervos, activându-i pentru a efectua mișcări. Acest proces presupune:\r\n\r\nConsum de energie: Corpul utilizează carbohidrații pentru a genera energie necesară efortului fizic.\r\nUtilizarea oxigenului: Oxigenul este esențial pentru a menține mușchii în funcțiune și pentru a preveni oboseala excesivă.\r\nCreierul: Managerul efortului fizic\r\nUn aspect vital de reținut este că creierul decide cât de mult efort poate depune corpul tău. Dacă simte că activitatea depășește limitele suportabile, creierul va încerca să oprească efortul pentru a preveni supra-solicitarea. Acest mecanism de protecție este esențial pentru a evita accidentele sau epuizarea.\r\n\r\nImportanța adaptării treptate\r\nDacă începi sportul cu o intensitate prea mare, creierul și corpul tău vor percepe activitatea ca pe o amenințare. În consecință, vei resimți disconfort, lipsă de motivație și, în cel mai rău caz, te vei opri înainte de a face din sport o rutină.\r\n\r\nPentru a evita acest scenariu, este important să:\r\n\r\nÎncepi cu pași mici: Activități fizice ușoare care să nu provoace epuizare.\r\nAjuți creierul să accepte sportul: Transformă mișcarea într-o experiență plăcută și progresivă.\r\nRespecți doza potrivită: O activitate fizică bine dozată ajută creierul să integreze sportul ca parte a rutinei zilnice, fără a percepe efortul ca pe o amenințare.\r\nUn drum corect spre sport\r\nCând începem o călătorie sportivă, trebuie să înțelegem că totul pornește de la creier și de la sistemul său nervos. Dacă îi oferim timp să se adapteze, sportul va deveni o obișnuință plăcută. În schimb, dacă ignorăm semnalele pe care ni le transmite și forțăm limitele, drumul nostru poate deveni greșit, conducând la eșec sau chiar probleme de sănătate.\r\n\r\nPrin urmare, cheia succesului este răbdarea, ascultarea corpului și învățarea echilibrului între efort și odihnă.\r\n\r\nPregătirea Mentală: Primul Pas Spre Sport\r\nÎnainte de a începe efectiv exercițiile fizice, pregătirea mentală este esențială. Corpul urmează comenzile minții, iar o atitudine pozitivă și bine organizată poate face diferența dintre succes și renunțare.\r\n\r\nCum să te pregătești mental pentru sport?\r\nPlanifică-ți momentul dedicat sportului: Alege un interval orar în care să fii liber de alte responsabilități.\r\nPregătește-ți echipamentul: Alege hainele potrivite și, dacă ai nevoie, pregătește un rucsac cu lucrurile necesare (prosop, încălțăminte comodă, o sticlă cu apă). Această rutină simplă transmite corpului tău mesajul că urmează o activitate importantă.\r\nInformare: Citește câteva articole despre tipul de activitate fizică pe care vrei să îl faci. Înțelegerea exercițiilor te ajută să reduci anxietatea și să-ți setezi așteptări realiste.\r\n\r\nPrimele săptămâni: Fără presiune suplimentară\r\nDacă ești începător, este important să nu îți complici începuturile:\r\n\r\nFără suplimente alimentare: Primele 2-3 săptămâni nu necesită suplimente nutritive. Este suficient să consumi o hrană echilibrată și să te hidratezi corespunzător.\r\nAlimentația corectă: Un mic dejun sau o gustare ușoară înainte de antrenament îți oferă energia necesară.\r\n\r\nEvită riscurile: Atenție la suprafețele dure\r\nUn sfat crucial pentru începători este să evite alegerea asfaltului ca teren pentru activități fizice precum alergarea. Suprafețele dure pun o presiune imensă pe articulații, în special pe genunchi, ceea ce poate duce la probleme grave pe termen lung.\r\n\r\nStatistică personală: Aproximativ 90% dintre cunoscuții mei care au făcut sport pe asfalt și-au deteriorat genunchii iremediabil.\r\n\r\nAlternativa potrivită:\r\nAlege terenuri moi, cum ar fi:\r\nPiste speciale pentru alergare.\r\nGazon.\r\nSuprafețe de tartan.\r\nDacă totuși trebuie să alergi pe o suprafață tare, investește într-o pereche de încălțăminte sportivă de calitate, cu amortizare optimă.\r\n\r\nProgresul în Sport: Răbdare și Adaptare\r\nUn aspect esențial de înțeles este că mușchii, sistemul nervos și capacitatea de oxigenare se dezvoltă împreună și necesită timp. Fiecare antrenament este o colaborare între creier, sistemul nervos și corp, iar această adaptare trebuie să fie graduală pentru a evita disconfortul sau accidentările.\r\n\r\nImportanța unui program progresiv\r\nRecomandarea principală pentru începători este să urmeze un program progresiv, care să crească treptat intensitatea exercițiilor. Acest lucru permite corpului să se adapteze, iar sistemul nervos să învețe să coordoneze mișcările mai eficient.\r\n\r\nDe ce este progresia importantă?\r\nÎmbunătățește funcția mușchilor și capacitatea de oxigenare.\r\nPrevine supra-solicitarea sistemului nervos și a mușchilor.\r\nReduce riscul de accidentări sau disconfort major, cum ar fi febra musculară.\r\nFebra musculară: Dușmanul unui start prost\r\nMulți începători, plini de motivație și entuziasm, fac greșeala de a începe prea intens. Rezultatul? O febră musculară severă care:\r\n\r\nFace fiecare mișcare dureroasă (inclusiv întoarcerea în pat de pe o parte pe alta).\r\nTe demotivează și poate duce la o pauză neintenționată imediat după primul antrenament.\r\nÎți oferă un start greșit și frustrează progresul.\r\nCum să previi febra musculară severă?\r\nÎncălzirea înainte de antrenament: 5-10 minute de mișcări ușoare cresc temperatura corpului și pregătesc mușchii.\r\nCrește treptat intensitatea: Nu te arunca direct la exerciții complexe sau greutăți mari. Începe cu exerciții simple și ușoare.\r\nStretching după antrenament: Ajută la relaxarea mușchilor și la reducerea tensiunii.\r\nAscultă-ți corpul: Dacă simți disconfort, oprește-te. Suprasolicitarea nu înseamnă progres.\r\nUn început corect: Fără pauze neintenționate\r\nPentru a evita să începi sportul cu o pauză imediată, acordă timp corpului tău să se adapteze treptat. Nu te lăsa descurajat de progrese lente – construirea unei baze solide este cheia succesului pe termen lung.\r\n\r\nAmintire personală: Am fost și eu în locul tău – entuziasmat și motivat, dar după un antrenament intens, febra musculară m-a țintuit la pat. Acest lucru m-a învățat că mai puțin este uneori mai bine atunci când începi.\r\n\r\nLegătura dintre Creier, Sistemul Nervos, Inimă și Respirație\r\nFiecare exercițiu fizic pe care îl facem activează un întreg sistem coordonat de creier, care include sistemul nervos, inima și respirația. Organismul nostru funcționează ca un mecanism complex, iar toate aceste elemente lucrează împreună pentru a genera energia necesară mișcării.\r\nLegătura dintre Creier, Sistemul Nervos, Inimă și Respirație\r\nFiecare exercițiu fizic pe care îl facem activează un întreg sistem coordonat de creier, care include sistemul nervos, inima și respirația. Organismul nostru funcționează ca un mecanism complex, iar toate aceste elemente lucrează împreună pentru a genera energia necesară mișcării.\r\n\r\nCum se coordonează creierul cu restul corpului?\r\nCreierul: Este centrul de comandă. Când decidem să facem un exercițiu, creierul transmite semnale prin sistemul nervos către mușchi, coordonând contracția și relaxarea acestora.\r\nSistemul nervos: Asigură transmiterea rapidă a comenzilor de la creier către mușchi și reglează funcții esențiale, precum ritmul cardiac și respirația.\r\nInima: Pompează sângele bogat în oxigen către mușchii care lucrează, furnizând resursele necesare pentru efort.\r\nRespirația: Plămânii se asigură că organismul primește suficient oxigen pentru a susține activitatea fizică, iar dioxidul de carbon rezultat este eliminat.\r\nEnergia organismului: Cum se produce?\r\nPentru a efectua un exercițiu, organismul are nevoie de energie, iar aceasta este generată la nivel celular.\r\n\r\nCelulele mitocondriale: Sunt „uzinele energetice” ale corpului. Acestea produc energie printr-un proces complex, numit respirație celulară, care implică:\r\nCarbohidrații: Alimentele consumate sunt transformate în glucoză, principala sursă de energie.\r\nOxigenul: Inspirat prin plămâni, este transportat prin sânge către celule, unde este folosit pentru arderea glucozei.\r\nRezultatul: Energia rezultată sub formă de ATP (adenozin trifosfat) este utilizată pentru contracția mușchilor.\r\nFormula simplificată a respirației celulare:\r\nGlucoză + Oxigen → Energie (ATP) + Dioxid de Carbon + Apă\r\n\r\nCe se întâmplă în timpul exercițiului fizic?\r\nCreierul activează mușchii: Prin semnalele transmise de sistemul nervos.\r\nRitmul cardiac crește: Inima pompează mai mult sânge pentru a transporta oxigenul și nutrienții către mușchi.\r\nRespirația se accelerează: Pentru a furniza mai mult oxigen organismului.\r\nProducția de energie crește: Mitocondriile din celulele musculare intensifică procesul de respirație celulară pentru a susține efortul.\r\nDe ce este important acest proces?\r\nFără o coordonare eficientă între creier, sistemul nervos, inimă și respirație, corpul nu ar putea susține activitatea fizică. Dacă unul dintre aceste elemente este supra-solicitat sau nu funcționează corect:\r\n\r\nPerformanța scade.\r\nOboseala se instalează rapid.\r\nPot apărea riscuri pentru sănătate (de exemplu, respirație insuficientă sau suprasolicitarea inimii).', 1, '2025-01-26 13:06:16', 'pic02.jpg', 'Sănătate', 14, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `article_categories`
--

CREATE TABLE `article_categories` (
  `article_id` int NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `article_parts`
--

CREATE TABLE `article_parts` (
  `id` int NOT NULL,
  `article_id` int NOT NULL,
  `part_number` int NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article_parts`
--

INSERT INTO `article_parts` (`id`, `article_id`, `part_number`, `content`) VALUES
(1, 8, 1, 'Aceasta este partea suplimentară a articolului.'),
(2, 8, 2, 'Acesta este conținutul pentru partea a treia  articolului.'),
(5, 10, 1, 'Statistici fascinante despre mitocondrii: Numărul și rolul lor în organism\r\nMitocondriile sunt omniprezente în corpul nostru, iar distribuția lor reflectă nevoile energetice ale diferitelor tipuri de celule. Numărul impresionant de mitocondrii din organism, precum și concentrația lor în țesuturile cu cerințe energetice mari, subliniază rolul lor critic în menținerea funcționării optime a corpului.\r\n\r\n1. Numărul total de mitocondrii din organism\r\nCorpul unui adult conține aproximativ 10 miliarde de mitocondrii, care reprezintă 10% din greutatea corporală.\r\nÎntr-o singură celulă pot exista între câteva sute și câteva mii de mitocondrii, în funcție de necesarul energetic al celulei.\r\nDe exemplu:\r\n\r\nCelulele care necesită mai multă energie, cum sunt cele musculare, inimii și creierului, conțin un număr mult mai mare de mitocondrii.\r\nÎn schimb, celulele cu cerințe energetice mai mici (cum ar fi globulele roșii mature, care nu conțin mitocondrii) sunt o excepție notabilă.\r\n2. Mitocondriile în celulele musculare\r\nMusculatura scheletică este printre cele mai mari consumatoare de energie din corp, mai ales în timpul exercițiilor fizice.\r\n\r\nConcentrație ridicată: Celulele musculare conțin între 1000 și 2000 de mitocondrii fiecare.\r\nEnergie pentru contracții: Mitocondriile furnizează ATP-ul necesar pentru contracțiile musculare. În timpul exercițiilor intense, ele lucrează la capacitate maximă pentru a susține mișcarea.\r\nAntrenamentul fizic și mitocondriile: Antrenamentele de tip aerobic cresc biogeneza mitocondrială, ceea ce înseamnă mai multe mitocondrii și o performanță musculară mai bună.\r\n3. Mitocondriile în inimă\r\nInima este cel mai activ mușchi al corpului, bătând în medie de 100.000 de ori pe zi și pompând aproape 7.500 de litri de sânge zilnic.\r\n\r\nCampioanele energetice: Celulele musculare cardiace au între 5000 și 8000 de mitocondrii fiecare, reprezentând aproximativ 40% din volumul celular.\r\nRol vital: Energia produsă de mitocondrii este esențială pentru contracțiile ritmice ale inimii, care trebuie să fie continue și eficiente pentru a menține circulația sângelui.\r\n4. Mitocondriile în creier\r\nCreierul, deși reprezintă doar 2% din greutatea corporală, consumă aproximativ 20% din energia totală a corpului.\r\n\r\nNeuroni și mitocondrii: Celulele neuronale sunt extrem de dependente de mitocondrii pentru a genera energia necesară transmiterii semnalelor electrice și sintezei neurotransmițătorilor.\r\nRolul în sănătatea creierului: Mitocondriile sunt implicate și în eliminarea radicalilor liberi generați în timpul activității intense a creierului. Disfuncțiile mitocondriale sunt asociate cu boli neurodegenerative precum Alzheimer și Parkinson.\r\nPlasticitatea creierului: Funcționarea optimă a mitocondriilor este esențială pentru învățare, memorie și adaptarea creierului la noi experiențe.\r\n5. Adaptabilitatea mitocondrială: mai mult decât număr\r\nUn aspect fascinant este faptul că mitocondriile nu sunt structuri statice. Ele se adaptează constant la nevoile organismului:\r\n\r\nCreșterea numărului: În timpul perioadelor de activitate intensă (antrenamente sau stres metabolic), corpul stimulează biogeneza mitocondrială, crescând astfel numărul de mitocondrii pentru a face față cerințelor.\r\nEficiență crescută: Mitocondriile existente pot deveni mai eficiente, producând mai mult ATP cu aceleași resurse.\r\nConcluzie: Importanța mitocondriilor în țesuturile critice\r\nFie că este vorba de generarea forței musculare, bătăile constante ale inimii sau gândirea rapidă și clară, mitocondriile sunt elementele cheie care susțin aceste procese. Ele funcționează ca un motor invizibil, dar indispensabil, al vieții noastre, iar sănătatea și funcționalitatea lor sunt direct legate de calitatea vieții pe care o avem.\r\n\r\nMitocondriile nu sunt doar „centralele energetice ale celulelor”; ele sunt pilonii sănătății, performanței și longevității umane.'),
(6, 1, 1, 'test 2024');

-- --------------------------------------------------------

--
-- Table structure for table `article_photos`
--

CREATE TABLE `article_photos` (
  `id` int NOT NULL,
  `article_id` int NOT NULL,
  `photo_path` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `article_tags`
--

CREATE TABLE `article_tags` (
  `article_id` int NOT NULL,
  `tag_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article_tags`
--

INSERT INTO `article_tags` (`article_id`, `tag_id`) VALUES
(4, 1),
(4, 2),
(5, 2),
(5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `article_views`
--

CREATE TABLE `article_views` (
  `id` int NOT NULL,
  `article_id` int NOT NULL,
  `user_ip` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article_views`
--

INSERT INTO `article_views` (`id`, `article_id`, `user_ip`, `created_at`) VALUES
(1, 7, '::1', '2024-12-09 17:48:51'),
(2, 6, '::1', '2024-12-09 17:49:08'),
(3, 8, '::1', '2024-12-09 18:16:22'),
(4, 10, '::1', '2024-12-09 23:02:03'),
(5, 5, '::1', '2024-12-10 04:21:56'),
(6, 11, '::1', '2024-12-10 11:59:15'),
(7, 12, '::1', '2024-12-10 12:13:44'),
(8, 13, '::1', '2024-12-10 21:02:20'),
(9, 4, '::1', '2024-12-14 20:27:49'),
(10, 0, '::1', '2024-12-15 01:04:29'),
(11, 7, '86.120.182.133', '2024-12-15 12:06:49'),
(12, 6, '86.120.182.133', '2024-12-15 12:06:53'),
(13, 0, '86.120.182.133', '2024-12-15 12:29:14'),
(14, 12, '86.120.182.133', '2024-12-15 21:44:49'),
(15, 10, '86.120.182.133', '2024-12-15 22:40:45'),
(16, 8, '86.120.182.133', '2024-12-15 22:53:13'),
(17, 4, '86.120.182.133', '2024-12-15 23:03:20'),
(18, 5, '86.120.182.133', '2024-12-16 03:52:45'),
(19, 11, '86.120.182.133', '2024-12-16 04:03:57'),
(20, 7, '86.120.179.39', '2024-12-16 13:08:39'),
(21, 11, '86.120.179.39', '2024-12-16 13:23:02'),
(22, 12, '86.120.179.39', '2024-12-16 13:30:34'),
(23, 10, '86.120.179.39', '2024-12-16 13:47:14'),
(24, 8, '86.120.179.39', '2024-12-16 14:16:03'),
(25, 6, '86.120.179.39', '2024-12-16 14:37:53'),
(26, 3, '86.120.179.39', '2024-12-16 15:39:25'),
(27, 12, '82.77.193.183', '2024-12-16 16:59:22'),
(28, 4, '86.120.179.39', '2024-12-16 21:33:41'),
(29, 7, '82.77.193.183', '2024-12-16 23:05:10'),
(30, 5, '86.120.179.39', '2024-12-17 01:29:18'),
(31, 6, '82.77.193.189', '2024-12-26 17:30:36'),
(32, 10, '86.120.251.175', '2024-12-31 18:04:43'),
(33, 12, '86.125.80.31', '2024-12-31 18:12:19'),
(34, 6, '86.120.251.175', '2025-01-01 09:46:30'),
(35, 11, '86.120.251.175', '2025-01-02 00:18:20'),
(36, 12, '2a02:2f05:6406:5e00:3cac:afa:4509:f73b', '2025-01-02 10:50:08'),
(37, 4, '2a02:2f05:6406:5e00:3cac:afa:4509:f73b', '2025-01-02 10:51:47'),
(38, 11, '2a02:2f05:6406:5e00:3cac:afa:4509:f73b', '2025-01-02 10:55:13'),
(39, 1, '2a02:2f05:6406:5e00:3cac:afa:4509:f73b', '2025-01-02 10:58:41'),
(40, 7, '2a02:2f05:6406:5e00:3cac:afa:4509:f73b', '2025-01-02 11:00:17'),
(41, 12, '86.120.251.79', '2025-01-07 04:54:49'),
(42, 10, '86.125.80.30', '2025-01-07 17:23:45'),
(43, 7, '86.125.80.30', '2025-01-09 01:45:24'),
(44, 7, '86.120.182.70', '2025-01-14 09:03:43'),
(45, 12, '144.217.135.193', '2025-01-22 10:23:42'),
(46, 11, '144.217.135.193', '2025-01-22 10:23:43'),
(47, 10, '54.36.149.11', '2025-01-23 23:11:13'),
(48, 11, '54.36.148.16', '2025-01-23 23:15:07'),
(49, 12, '54.36.148.154', '2025-01-23 23:18:59'),
(50, 2, '54.36.148.83', '2025-01-23 23:22:25'),
(51, 3, '54.36.148.154', '2025-01-23 23:26:16'),
(52, 5, '54.36.149.73', '2025-01-23 23:34:11'),
(53, 6, '54.36.149.100', '2025-01-23 23:38:17'),
(54, 7, '54.36.148.126', '2025-01-23 23:41:50'),
(55, 8, '54.36.148.110', '2025-01-23 23:45:30'),
(56, 1, '54.36.148.8', '2025-01-24 00:45:09'),
(57, 4, '54.36.148.149', '2025-01-24 00:54:52'),
(58, 10, '54.36.149.36', '2025-01-24 01:25:21'),
(59, 1, '54.36.148.149', '2025-01-24 03:40:18'),
(60, 8, '54.36.149.79', '2025-01-24 04:10:02'),
(61, 8, '54.36.149.88', '2025-01-24 05:07:13'),
(62, 14, '86.120.179.65', '2025-01-26 12:29:28'),
(63, 12, '86.120.179.65', '2025-01-26 12:44:31'),
(64, 15, '86.120.179.65', '2025-01-26 13:06:37'),
(65, 15, '86.125.80.201', '2025-01-26 14:39:51'),
(66, 15, '54.36.149.56', '2025-01-29 07:47:02'),
(67, 10, '54.36.148.140', '2025-01-29 11:35:18'),
(68, 8, '54.36.149.61', '2025-01-29 11:58:49'),
(69, 11, '54.36.148.105', '2025-01-29 12:27:52'),
(70, 12, '54.36.148.58', '2025-01-29 12:54:52'),
(71, 2, '54.36.149.96', '2025-01-29 13:21:06'),
(72, 3, '54.36.148.210', '2025-01-29 13:50:45'),
(73, 1, '54.36.148.217', '2025-01-29 14:37:15'),
(74, 5, '54.36.149.49', '2025-01-29 15:26:20'),
(75, 6, '54.36.148.163', '2025-01-29 16:41:14'),
(76, 7, '54.36.148.15', '2025-01-29 18:48:42'),
(77, 4, '54.36.149.24', '2025-01-29 21:32:38'),
(78, 10, '54.36.148.210', '2025-01-31 12:18:44'),
(79, 1, '54.36.149.8', '2025-01-31 15:17:04'),
(80, 8, '54.36.148.239', '2025-01-31 19:47:33'),
(81, 8, '54.36.148.147', '2025-02-01 02:42:20'),
(82, 1, '95.217.139.6', '2025-02-02 06:22:49'),
(83, 10, '95.217.139.6', '2025-02-02 06:22:52'),
(84, 11, '95.217.139.6', '2025-02-02 06:22:55'),
(85, 12, '95.217.139.6', '2025-02-02 06:22:57'),
(86, 15, '95.217.139.6', '2025-02-02 06:23:01'),
(87, 2, '95.217.139.6', '2025-02-02 06:23:03'),
(88, 3, '95.217.139.6', '2025-02-02 06:23:06'),
(89, 4, '95.217.139.6', '2025-02-02 06:23:08'),
(90, 5, '95.217.139.6', '2025-02-02 06:23:10'),
(91, 6, '95.217.139.6', '2025-02-02 06:23:14'),
(92, 7, '95.217.139.6', '2025-02-02 06:23:17'),
(93, 8, '95.217.139.6', '2025-02-02 06:23:20'),
(94, 12, '2a03:2880:f804:18::', '2025-02-03 01:33:10'),
(95, 8, '2a03:2880:f804:1b::', '2025-02-03 01:38:16'),
(96, 3, '2a03:2880:f804:9::', '2025-02-03 01:53:23'),
(97, 5, '2a03:2880:f804:1b::', '2025-02-03 01:55:08'),
(98, 1, '2a03:2880:f804:19::', '2025-02-03 01:55:47'),
(99, 7, '2a03:2880:f804:1c::', '2025-02-03 02:01:08'),
(100, 15, '2a03:2880:f804:8::', '2025-02-03 02:24:33'),
(101, 2, '2a03:2880:f804:12::', '2025-02-03 03:46:00'),
(102, 10, '2a03:2880:f804:13::', '2025-02-03 04:29:58'),
(103, 6, '2a03:2880:f804:19::', '2025-02-03 04:57:14'),
(104, 4, '2a03:2880:f804:4::', '2025-02-03 18:02:32'),
(105, 10, '54.36.148.203', '2025-02-03 19:50:05'),
(106, 8, '54.36.148.65', '2025-02-03 20:29:16'),
(107, 15, '54.36.148.218', '2025-02-03 21:07:24'),
(108, 11, '54.36.148.136', '2025-02-03 21:48:29'),
(109, 1, '54.36.149.48', '2025-02-03 23:17:59'),
(110, 12, '54.36.148.182', '2025-02-04 00:08:21'),
(111, 11, '2a03:2880:f806:8::', '2025-02-04 00:20:58'),
(112, 2, '54.36.149.24', '2025-02-04 00:57:09'),
(113, 3, '54.36.148.238', '2025-02-04 01:46:44'),
(114, 10, '2a03:2880:f806:b::', '2025-02-04 02:31:49'),
(115, 5, '54.36.149.63', '2025-02-04 02:53:11'),
(116, 6, '54.36.148.202', '2025-02-04 04:05:35'),
(117, 8, '2a03:2880:f806:b::', '2025-02-04 05:21:34'),
(118, 7, '54.36.149.35', '2025-02-04 05:27:48'),
(119, 4, '54.36.149.77', '2025-02-04 06:54:10'),
(120, 1, '2a03:2880:f806:5::', '2025-02-04 09:16:12'),
(121, 8, '2a03:2880:22ff:f::', '2025-02-05 04:28:41'),
(122, 7, '185.191.171.10', '2025-02-07 00:58:05'),
(123, 5, '85.208.96.200', '2025-02-07 01:04:15'),
(124, 11, '185.191.171.7', '2025-02-07 06:25:47'),
(125, 12, '85.208.96.199', '2025-02-07 07:06:44'),
(126, 2, '85.208.96.198', '2025-02-07 07:46:00'),
(127, 15, '185.191.171.12', '2025-02-07 08:20:40'),
(128, 10, '185.191.171.11', '2025-02-07 08:30:59'),
(129, 3, '85.208.96.198', '2025-02-07 09:26:20'),
(130, 6, '85.208.96.208', '2025-02-07 10:07:15'),
(131, 1, '185.191.171.12', '2025-02-07 11:11:45'),
(132, 8, '85.208.96.207', '2025-02-07 13:11:54'),
(133, 10, '54.36.148.50', '2025-02-07 15:22:10'),
(134, 4, '185.191.171.5', '2025-02-07 15:43:42'),
(135, 1, '54.36.149.68', '2025-02-07 16:58:21'),
(136, 8, '54.36.148.121', '2025-02-07 22:01:04'),
(137, 8, '54.36.148.63', '2025-02-08 09:52:04'),
(138, 15, '43.130.102.223', '2025-02-08 13:42:46'),
(139, 10, '43.159.149.56', '2025-02-08 13:54:06'),
(140, 10, '43.135.142.7', '2025-02-08 14:24:09'),
(141, 10, '43.130.16.140', '2025-02-08 14:55:23'),
(142, 10, '54.36.148.36', '2025-02-08 22:58:26'),
(143, 8, '54.36.148.82', '2025-02-09 00:08:20'),
(144, 1, '54.36.148.22', '2025-02-09 01:41:42'),
(145, 11, '54.36.148.116', '2025-02-09 02:47:53'),
(146, 15, '54.36.148.50', '2025-02-09 04:04:39'),
(147, 12, '54.36.149.8', '2025-02-09 06:18:54'),
(148, 2, '54.36.148.8', '2025-02-09 06:59:50'),
(149, 3, '54.36.148.92', '2025-02-09 07:42:21'),
(150, 5, '54.36.148.207', '2025-02-09 08:24:30'),
(151, 6, '54.36.148.8', '2025-02-09 09:05:43'),
(152, 7, '54.36.149.87', '2025-02-09 10:05:51'),
(153, 4, '54.36.148.162', '2025-02-09 10:57:25'),
(154, 1, '43.130.40.120', '2025-02-09 13:31:40'),
(155, 2, '43.130.53.252', '2025-02-09 13:42:34'),
(156, 3, '43.155.166.202', '2025-02-09 13:49:33'),
(157, 1, '43.155.183.138', '2025-02-09 14:12:31'),
(158, 1, '43.159.63.75', '2025-02-09 14:20:17'),
(159, 1, '43.157.201.184', '2025-02-09 14:31:15'),
(160, 2, '162.62.231.139', '2025-02-09 14:42:33'),
(161, 12, '43.156.228.27', '2025-02-09 15:19:45'),
(162, 4, '124.156.225.181', '2025-02-10 15:25:27'),
(163, 10, '43.159.144.16', '2025-02-10 15:55:06'),
(164, 8, '43.130.9.111', '2025-02-10 16:10:46'),
(165, 6, '43.155.27.244', '2025-02-10 16:25:00'),
(166, 5, '49.51.73.183', '2025-02-10 16:35:46'),
(167, 4, '170.106.73.216', '2025-02-10 16:45:54'),
(168, 12, '86.120.182.130', '2025-02-11 08:56:35'),
(169, 15, '86.125.80.25', '2025-02-11 18:19:15'),
(170, 10, '54.36.148.240', '2025-02-14 20:26:19'),
(171, 8, '54.36.148.195', '2025-02-14 20:46:53'),
(172, 1, '54.36.148.204', '2025-02-14 21:07:03'),
(173, 11, '54.36.148.111', '2025-02-14 21:27:44'),
(174, 15, '54.36.148.30', '2025-02-14 21:47:49'),
(175, 12, '54.36.148.41', '2025-02-14 22:13:23'),
(176, 15, '86.120.182.130', '2025-02-14 22:29:30'),
(177, 10, '86.120.182.130', '2025-02-14 22:30:04'),
(178, 6, '86.120.182.130', '2025-02-14 22:30:42'),
(179, 2, '54.36.149.58', '2025-02-14 22:38:59'),
(180, 3, '54.36.148.37', '2025-02-14 23:27:01'),
(181, 5, '54.36.148.75', '2025-02-15 00:00:56'),
(182, 10, '54.36.148.12', '2025-02-15 00:33:40'),
(183, 6, '54.36.148.137', '2025-02-15 01:07:10'),
(184, 7, '54.36.148.232', '2025-02-15 01:55:18'),
(185, 1, '54.36.148.107', '2025-02-15 02:40:48'),
(186, 4, '54.36.149.76', '2025-02-15 03:54:15'),
(187, 8, '54.36.149.36', '2025-02-15 04:58:38'),
(188, 8, '86.125.80.25', '2025-02-15 05:31:38'),
(189, 1, '86.125.80.25', '2025-02-15 05:32:24'),
(190, 5, '86.125.80.25', '2025-02-15 05:39:02'),
(191, 8, '54.36.149.14', '2025-02-15 11:41:58'),
(192, 10, '54.36.148.54', '2025-02-20 06:11:49'),
(193, 8, '54.36.148.145', '2025-02-20 06:34:12'),
(194, 1, '54.36.149.32', '2025-02-20 06:56:04'),
(195, 11, '54.36.148.156', '2025-02-20 07:16:23'),
(196, 15, '54.36.149.8', '2025-02-20 08:05:30'),
(197, 2, '54.36.148.197', '2025-02-20 08:29:52'),
(198, 3, '54.36.148.219', '2025-02-20 08:51:54'),
(199, 5, '54.36.148.215', '2025-02-20 09:58:42'),
(200, 6, '54.36.148.138', '2025-02-20 10:54:08'),
(201, 7, '54.36.148.223', '2025-02-20 11:50:45'),
(202, 4, '54.36.148.72', '2025-02-20 14:13:49'),
(203, 15, '149.56.150.173', '2025-02-20 15:17:52'),
(204, 12, '149.56.150.173', '2025-02-20 15:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(1, 'Sport', 'sport'),
(2, 'Blog', 'blog'),
(3, 'Tutoriale', 'tutoriale'),
(4, 'Sănătate', 'sanatate');

-- --------------------------------------------------------

--
-- Table structure for table `category_tags`
--

CREATE TABLE `category_tags` (
  `category_id` int NOT NULL,
  `tag_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_tags`
--

INSERT INTO `category_tags` (`category_id`, `tag_id`) VALUES
(1, 1),
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `parent_id` int DEFAULT NULL,
  `article_id` int NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `parent_id`, `article_id`, `username`, `email`, `content`, `created_at`) VALUES
(1, NULL, 1, 'kiokio', '', 'da dar cum pot sa organizez acest lucru ?', '2024-12-06 11:38:49'),
(2, NULL, 1, 'kiokio', 'andreisorinstefan@gmail.com', 'da am vazut ce pot face ....', '2024-12-06 11:43:31'),
(3, 2, 1, 'Administrator', '', 'test', '2024-12-06 11:49:33'),
(4, NULL, 6, 'kiokio', 'andreisorinstefan@gmail.com', 'salutare imi place ce citesc', '2024-12-06 18:22:42'),
(6, NULL, 12, 'test', 'andrei.sorin.stefan@gmail.com', 'asdasdasda', '2024-12-10 12:47:08'),
(7, NULL, 12, 'aliosa', 'andreisorinstefan@gmail.com', 'Alegea partea unui exercitiu unde esti blocat, apoi petrece mai mul timp acolo. Pierzi tensiune in partea de jos a unei genuflexiuni? Adauga o repetare partiala acolo.', '2024-12-10 12:50:27'),
(8, NULL, 7, 'test', 'test@email.c', 'test', '2025-01-02 11:01:04');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `ip_address`, `created_at`) VALUES
(1, 'andtei', 'andreisorinstefan@gmail.com', 'asdasdasdasda asdasdada', '::1', '2024-12-11 01:35:36'),
(2, 'Ciolacu', 'andreisorinstefan@gmail.com', 'Da doresc sa scriu articole pe acest blog ', '::1', '2024-12-11 01:38:29'),
(3, 'test2', 'andreisorinstefan@gmail.com', 'Trimite-ne un mesaj pentru critici, corectări sau sugestii. Acceptăm propuneri de articole și, dacă ești pasionat și consideri că ai talent, îți putem crea un cont pentru a scrie pe blogul nostru!', '::1', '2024-12-11 01:42:34'),
(4, 'test', 'email@test.c', 'ttdgh', '2a02:2f05:6406:5e00:3cac:afa:4509:f73b', '2025-01-02 10:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int NOT NULL,
  `article_id` int NOT NULL,
  `rating` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_ip` varchar(45) COLLATE utf8mb4_general_ci NOT NULL
) ;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `article_id`, `rating`, `created_at`, `user_ip`) VALUES
(127, 5, 4, '2024-12-09 17:02:39', '::1'),
(128, 7, 5, '2024-12-09 17:03:16', '::1'),
(129, 6, 4, '2024-12-09 17:04:01', '::1'),
(130, 8, 4, '2024-12-09 17:22:56', '::1'),
(131, 10, 5, '2024-12-09 23:09:45', '::1'),
(132, 12, 4, '2024-12-10 12:51:25', '::1'),
(133, 11, 5, '2024-12-10 19:46:04', '::1'),
(134, 8, 4, '2024-12-15 23:03:10', '86.120.182.133'),
(135, 4, 5, '2024-12-15 23:03:22', '86.120.182.133'),
(136, 7, 4, '2024-12-16 02:13:22', '86.120.182.133'),
(137, 12, 5, '2024-12-16 03:00:47', '86.120.182.133'),
(138, 12, 5, '2024-12-16 14:07:44', '86.120.179.39'),
(139, 11, 4, '2024-12-16 14:08:20', '86.120.179.39'),
(140, 7, 1, '2024-12-16 18:54:14', '86.120.179.39'),
(141, 6, 5, '2024-12-17 04:07:59', '86.120.179.39'),
(142, 12, 5, '2024-12-31 18:12:33', '86.125.80.31'),
(143, 11, 5, '2025-01-02 00:18:23', '86.120.251.175'),
(144, 4, 4, '2025-01-02 10:51:50', '2a02:2f05:6406:5e00:3cac:afa:4509:f73b'),
(145, 7, 5, '2025-01-09 01:45:30', '86.125.80.30'),
(147, 15, 5, '2025-01-26 14:54:59', '86.125.80.201'),
(148, 15, 4, '2025-01-27 00:16:10', '86.120.179.65'),
(149, 6, 5, '2025-02-14 22:30:59', '86.120.182.130');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`) VALUES
(1, 'Sanatate', 'sanatate'),
(2, 'Yoga', 'yoga'),
(3, 'Respiratie', 'respiratie'),
(4, 'Energie', 'energie'),
(5, 'Concentrare', 'concentrare');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'Andrei Sorin', 'john@example.com', 'password1', '2024-12-05 18:30:16'),
(2, 'Jane Smith', 'jane@example.com', 'password2', '2024-12-05 18:30:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `article_categories`
--
ALTER TABLE `article_categories`
  ADD KEY `article_id` (`article_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `article_parts`
--
ALTER TABLE `article_parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `article_photos`
--
ALTER TABLE `article_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `article_tags`
--
ALTER TABLE `article_tags`
  ADD PRIMARY KEY (`article_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `article_views`
--
ALTER TABLE `article_views`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `article_id` (`article_id`,`user_ip`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `category_tags`
--
ALTER TABLE `category_tags`
  ADD PRIMARY KEY (`category_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `article_parts`
--
ALTER TABLE `article_parts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `article_photos`
--
ALTER TABLE `article_photos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article_views`
--
ALTER TABLE `article_views`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `article_categories`
--
ALTER TABLE `article_categories`
  ADD CONSTRAINT `article_categories_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `article_parts`
--
ALTER TABLE `article_parts`
  ADD CONSTRAINT `article_parts_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `article_photos`
--
ALTER TABLE `article_photos`
  ADD CONSTRAINT `article_photos_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `article_tags`
--
ALTER TABLE `article_tags`
  ADD CONSTRAINT `article_tags_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_tags`
--
ALTER TABLE `category_tags`
  ADD CONSTRAINT `category_tags_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

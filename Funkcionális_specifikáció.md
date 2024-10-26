# Funkcionális Specifikáció

## 1. Áttekintés
Az alkalmazás célja egy központosított felület létrehozása, ahol különböző állatmenhelyek saját profilokat hozhatnak létre, és regisztrálhatják a gondozásukban lévő állatokat.  
Ezzel segítjük a menhelyek munkáját, növeljük az örökbefogadási esélyeket, és a leendő gazdik számára könnyebbé tesszük az örökbefogadás folyamatát.  
A rendszer felhasználóbarát keresési funkcióval rendelkezik, így az örökbefogadók könnyen megtalálhatják a számukra megfelelő állatot.  
Az alkalmazás elérhető lesz web platformon, így bárki, bárhonnan hozzáférhet az adatbázishoz.


## 2. Jelenlegi helyzet
Jelenleg a menhelyeknek nincs közös platformjuk, ahol állataikat egyszerűen bemutathatnák a nyilvánosság számára. Számos menhely saját weboldallal vagy közösségi média profillal próbálkozik, de ezek nem biztosítják az egységes hozzáférést és kereshetőséget.  
A megrendelő célja egy olyan alkalmazás létrehozása, amely egy közös adatbázison keresztül lehetővé teszi, hogy az érdeklődők egyetlen felületen böngésszenek különböző menhelyek állatai között, illetve közvetlen kapcsolatba lépjenek a menhelyekkel az örökbefogadás ügyében.  
Ezen felül a rendszer lehetőséget biztosít a menhelyeknek a saját logójuk/menhelyképük megjelenítésére és egyedi profiloldalak létrehozására.


## 3. Követelménylista

| Modul ID      | Név                        | Verzió | Kifejtés                                                                                                                                                                                                                                   |
|---------------|-----------------------------|--------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| Jogosultság M1 | Menhely regisztráció        | 1.0    | A menhelyek a nevük, e-mail címük és jelszavuk megadásával regisztrálhatnak. Amennyiben az adatok hiányosak vagy hibásak, a rendszer figyelmezteti a felhasználót.                                   |
| Jogosultság M2 | Belépési felület            | 1.0    | A menhelyek, adminok és felhasználók beléphetnek az e-mail címük és jelszavuk megadásával. Hibás adatok esetén a felhasználó hibaüzenetet kap.                                                                     |
| Jogosultság M3 | Jogosultsági szintek        | 1.0    | - **Admin:** új menhelyek jóváhagyása, felhasználók kezelése  <br> - **Menhely:** profil létrehozása, állatok feltöltése, adatok módosítása  <br> - **Vendég:** regisztráció és belépés, állatok keresése  |
| Adatkezelés A1 | Menhely profil              | 1.0    | A menhelyek létrehozhatják profiljaikat, ahol bemutathatják magukat, feltölthetik logójukat, elérhetőségeiket és rövid leírást adhatnak magukról.                                                    |
| Adatkezelés A2 | Állat feltöltése            | 1.0    | A menhelyek feltölthetik a gondozásukban lévő állatokat a nevük, fajtájuk, koruk, egészségi állapotuk, oltottságuk és fényképek megadásával.                                                         |
| Adatkezelés A3 | Állat adatainak módosítása  | 1.0    | A menhelyek módosíthatják a már feltöltött állatok adatait, például a gazdira találás státuszát, egészségi állapot változását vagy új képek feltöltését.                                             |
| Keresés K1     | Kereső funkció              | 1.0    | A vendégek és regisztrált felhasználók böngészhetnek az adatbázisban szűrők használatával (pl. fajta, menhely neve, település).                                                                 |                      
| Felhasználó K5 | Felhasználói módosítások    | 1.0    | A menhelyek módosíthatják saját profiladataikat, például a leírást, logót, illetve elérhetőségi adatokat.                                                                                           |
| Biztonság B1   | Adatbiztonság és mentés     | 1.0    | A rendszer titkosítva tárolja a felhasználói jelszavat.                                                                                     |

## 4. Jelenlegi üzleti folyamatok modellje
A mai világban egyre nagyobb az igény arra, hogy az emberek gyorsan és egyszerűen találjanak megfelelő menhelyi állatokat örökbefogadásra. Jelenleg sok menhely nem rendelkezik olyan felülettel, ahol könnyen megoszthatnák az állataikat az örökbefogadók számára, így az elérhetőségük korlátozott. A papíralapú nyilvántartás és az elavult rendszerek sok időt vesznek igénybe, és bonyolulttá teszik az állatok adatainak kezelését. Az általunk tervezett weboldal erre kínál megoldást, modern technológiák segítségével könnyen kezelhető, interaktív felületet biztosítva. A rendszer lehetővé teszi az állatok adatainak egyszerű feltöltését, frissítését és nyomon követését, miközben egy központi platformként szolgál az örökbefogadók és menhelyek számára.

## 5. Igényelt üzleti folyamatok modellje
Azért hogy a menhelyek és az örökbefogadók számára egyszerűbbé tegyük a kisállatok örökbefogadásának folyamatát, létrehozunk egy weboldalt, amely lehetőséget biztosít a menhelyek számára, hogy bemutathassák kisállataikat. Az alkalmazásunk egy könnyen kezelhető felületet kínál, amelyet modern webes technológiák segítségével valósítunk meg. A menhelyek egyszerűen feltölthetik, frissíthetik és kezelhetik az állatok adatait, így nem kell minden egyes kisállatot külön-külön bemutatniuk. Ezáltal az örökbefogadók számára sokkal könnyebbé válik a választás, hiszen egy helyen találhatják meg az összes elérhető kisállatot. A rendszer nemcsak a menhelyek, hanem a potenciális örökbefogadók számára is hasznos, mivel gyorsan és könnyen hozzáférhetnek az információkhoz, és azonnal értesülnek a kisállatok állapotáról és elérhetőségéről. Ezzel a platformmal szeretnénk elősegíteni az állatok örökbefogadását, és egy szorosabb kapcsolatot kialakítani a menhelyek és az örökbefogadók között.

## 6. Használati esetek
*Felhasználói Szerepkörök a Fogadj örökbe Weboldalon*

**REGISZTRÁLT FELHASZNÁLÓ:**

- Kereshet állatokat és menhelyeket, valamint szűrhet az elérhetőség, fajta és kor alapján.
- Hozzászólhat az állatok profiljához, és értékelheti a menhelyek szolgáltatásait.
- Megoszthatja saját örökbefogadási élményeit, tapasztalatait más felhasználókkal.

**MENHELYTULAJDONOS:**

- Képes egy új állatmenhelyet létrehozni, ahol bemutathatja az örökbefogadható állatokat.
- Feltöltheti az állatok adatait, beleértve a képeket, leírásokat és egyéb fontos információkat.
- Frissítheti az állatok állapotát, például amikor egy állat örökbefogadásra kerül, vagy új információkat adhat meg az állatokkal kapcsolatban.

**LÁTOGATÓ (regisztráció nélkül):**

- Böngészhet az állatok és menhelyek között.

**ADMINISZTRÁTOR:**

- Teljes hozzáférése van a rendszerhez.

**Használati esetek példái:**

**Állat Keresése:**

- A felhasználó bejelentkezik, keres egy adott fajtát vagy menhelyet, és megtekinti az elérhető állatok listáját.

**Menhely Létrehozása:**

- A menhelytulajdonos bejelentkezik, létrehoz egy új állatmenhelyet, majd feltölti az örökbefogadható állatokat a megfelelő információkkal.

**Adminisztrátor Beavatkozása:**

- Az adminisztrátor egy problémás tartalmat észlel az állatok profilja között, amely nem felel meg az irányelveknek, és eltávolítja azt a platformról.

## 7. Használati esetek:
**Felhasználói szerepkörök:**

1. **REGISZTRÁLT FELHASZNÁLÓ:**
   - Kereshet úticélokat, turisztikai látványosságokat kontinensek, országok és városok szerint.
   - Véleményt írhat és olvashat más felhasználók tapasztalatairól.
   - Hozzászólhat és értékelheti a látványosságokat.
   - Saját utazási élményeit megoszthatja.

2. **LÁTOGATÓ (regisztráció nélkül):**
   - Böngészhet az úticélok és látványosságok között, de nem írhat véleményt vagy értékelést.
   - Megtekintheti más felhasználók véleményeit és értékeléseit.

3. **ADMINISZTRÁTOR:**
   - Teljes hozzáféréssel rendelkezik a rendszerhez, beleértve a felhasználói adatok kezelését és a moderációs funkciókat.
   - Ellenőrzi a felhasználók által megosztott tartalmakat, és moderálja a véleményeket, hogy biztosítsa a platform biztonságát és hitelességét.
   - Új látványosságokat és úticélokat adhat hozzá az adatbázishoz.
   - Képes felhasználói fiókokat létrehozni vagy törölni, valamint globális üzeneteket küldeni a felhasználók számára.

**Használati esetek példái:**

1. **Úticél keresése:**
   - A felhasználó bejelentkezik, keres egy adott országot vagy várost, és megtekinti a látványosságok listáját.
   - Kiválaszt egy helyszínt, és elolvassa mások értékeléseit és véleményeit.

2. **Vélemény írása:**
   - Egy felhasználó meglátogat egy látványosságot, majd értékelést és tapasztalatot ír az oldalra.
   - Más felhasználók hozzászólhatnak a véleményhez, és értékelhetik azt (pl. "hasznos" vagy "nem hasznos").

3. **Adminisztrátor beavatkozása:**
   - Az adminisztrátor egy problémás tartalmat észlel a vélemények között, amely nem felel meg az irányelveknek, és eltávolítja azt a platformról.
   - Új úticélokat ad hozzá, amelyekről a felhasználók véleményt alkothatnak.

---
## 8. Megfeleltetés (Használati esetek és követelmények):

| Követelmény                                  | Használati eset                                                                                       | Szerepkörök                              |
|----------------------------------------------|-------------------------------------------------------------------------------------------------------|------------------------------------------|
| Keresés úticélok, látványosságok között      | 1. **Úticél keresése:** Felhasználó kontinensek, országok és városok szerint kereshet turisztikai helyszíneket. | Regisztrált felhasználó, Látogató        |
| Vélemények írása és olvasása                 | 2. **Vélemény írása:** Felhasználó megosztja élményeit egy látványosságról, és olvassa mások véleményét.       | Regisztrált felhasználó                  |
| Hozzászólás és értékelés                     | 2. **Vélemény írása:** Felhasználó hozzászól egy meglévő véleményhez, értékelheti azt hasznos vagy nem hasznos szempontból. | Regisztrált felhasználó                  |
| Böngészés úticélok és vélemények között      | 1. **Úticél keresése:** Látogató böngészhet az úticélok között, és olvashat véleményeket.                     | Látogató                                 |
| Moderáció és tartalom eltávolítása           | 3. **Adminisztrátor beavatkozása:** Adminisztrátor észleli a nem megfelelő tartalmat, és eltávolítja azt.      | Adminisztrátor                           |
| Új látványosságok, úticélok hozzáadása       | 3. **Adminisztrátor beavatkozása:** Adminisztrátor új látványosságokat és úticélokat ad hozzá.                | Adminisztrátor                           |
| Felhasználói adatok kezelése                 | 3. **Adminisztrátor beavatkozása:** Adminisztrátor kezeli a felhasználói fiókokat, hozzáad vagy töröl fiókokat. | Adminisztrátor                           |
| Globális üzenetek küldése                    | 3. **Adminisztrátor beavatkozása:** Adminisztrátor globális üzenetet küld a felhasználók számára.             | Adminisztrátor                           |
| Utazási élmények megosztása                  | 2. **Vélemény írása:** Felhasználó megosztja személyes utazási élményeit a platformon.                        | Regisztrált felhasználó                  |


### Képernyő tervek:
#### Desktop nézetek:
##### Érkezési oldal
![Landing page](files/img/Landing%20page.png)
##### Bejelentkezés oldal
![Bejelentkezés oldal](files/img/Landing%20page-1.png)
##### Regisztráció oldal
![Regisztráció oldal](files/img/Landing%20page-2.png)
##### Állatmenhelyek oldal
![Állatmenhelyek oldal](files/img/Feltöltés-1.png)
##### Örökbefogadásra váró állatok oldal
![Örökbefogadásra váró állatok oldal oldal](files/img/Feltöltés-4.png)
##### Profil oldal, felhasználói nézetben
![Profil oldal, felhasználói nézetben](files/img/Fiók%20kezelése.png)
##### Kisállat feltöltése oldal
![Kisállat feltöltése oldal](files/img/Feltöltés-3.png)
##### Kisállat módosítása oldal
![Kisállat módosítása oldal](files/img/Feltöltés-3.png)
##### Állatmenhely hozzáadása oldal
![Állatmenhely hozzáadása oldal oldal](files/img/Feltöltés-2.png)
##### Állatmenhely módosítása oldal
![Állatmenhely módosítása oldal](files/img/Feltöltés-2.png)

## 9. Forgatókönyv:

### 1. Érkezési Oldal
- **Célja**: A látogatók üdvözlése és a weboldal bemutatása.
- **Fő elemek**:
    - **Navigációs sáv(Hamburger menü)**
    - **Hős szekció**:
        - Üdvözlése a felhasználónak.
        - A felhasznéló posztjai edit módban.
        - **Call to Action (CTA)** gombok: "Új poszt".


---

### 2. Profil oldal
- **Célja**: A felhasználó látja és szerkesztheti a saját posztjait, illetve új posztokat is hozzáadhat.
- **Fő elemek**:
    - **Navigációs sáv(Hamburger menü)**: Logó, Hamburger menü, Menüpontok (Poszt (Poszt feltöltése, Poszt módosítása, Poszt törlése), Fiók (Profil, Bejelntkezés, Fiók műveletek, Kijelentkezés)), cégnév, about leíró oldal, Term and policy.
    - **Hős szekció**:
        - Nagy, figyelemfelkeltő szöveg.
        - Posztok
        - **Call to Action (CTA)** gombok: "Bejelentkezés", "Regisztrálás".

---

### 3. Bejelentkezés/Regisztráció
- **Célja**: A látogató (guest) bejelentkezthet vagy regisztrálhat.
- **Fő elemek**:
    - **Navigációs sáv(Hamburger menü)**: Logó, Hamburger menü, Menüpontok (Poszt (Poszt feltöltése, Poszt módosítása, Poszt törlése), Fiók (Profil, Bejelntkezés, Fiók műveletek, Kijelentkezés)), cégnév, about leíró oldal, Term and policy.
    - **Hős szekció**:
        - Bejelentkezési űrlap/Regisztrációs űrlap
   - **Lábléc**: Adathasználati irányelvek és a cég neve

---

### 4. Fiók műveletek
- **Célja**: A felhasználó itt tud módosítasokat végrhajtani a fiókjával kapcsolatban.
- **Fő elemek**:
    - **Navigációs sáv(Hamburger menü)**: Logó, Hamburger menü, Menüpontok (Poszt (Poszt feltöltése, Poszt módosítása, Poszt törlése), Fiók (Profil, Bejelntkezés, Fiók műveletek, Kijelentkezés)), cégnév, about leíró oldal, Term and policy.
    - **Hős szekció**:
        - Egy felhasználónév csere űrlap.
        - Egy jelszó csere űrlap.
        - Egy fiók törlése gomb.

---

### 5. Megnyitott Poszt
- **Célja**: A felhasználó/látogató (guest) itt tudja a képet nagyobb formátumban megnézni, illetve a kommenteket. A felhasználó új kommentet is tud hozzáadni. Illetve mind a felhasználó, mind a látogató (guest) tudja értékelni a posztot.
- **Fő elemek**:
    - **Navigációs sáv(Hamburger menü)**: Logó, Hamburger menü, Menüpontok (Poszt (Poszt feltöltése, Poszt módosítása, Poszt törlése), Fiók (Profil, Bejelntkezés, Fiók műveletek, Kijelentkezés)), cégnév, about leíró oldal, Term and policy.
    - **Hős szekció**:
        - A kép.
        - A poszt helye a világban.
        - Értékelések.
        - Kommentek és/vagy komment írása.

---

### 6. Hírfolyam
- **Célja**: A felhasználó/látogató (guest) láthatja mások posztjai, illetve szűrhet közöttük.
- **Fő elemek**:
    - **Navigációs sáv(Hamburger menü)**: Logó, Hamburger menü, Menüpontok (Poszt (Poszt feltöltése, Poszt módosítása, Poszt törlése), Fiók (Profil, Bejelntkezés, Fiók műveletek, Kijelentkezés)), cégnév, about leíró oldal, Term and policy.
    - **Hős szekció**:
        - Köszöntő rész
        - Szűrési sáv.
        - Posztok

---

### 7. Poszt feltöltése
- **Célja**: A felhasználó/admin itt tud új posztot hozzáadni.
- **Fő elemek**:
    - **Navigációs sáv(Hamburger menü)**: Logó, Hamburger menü, Menüpontok (Poszt (Poszt feltöltése, Poszt módosítása, Poszt törlése), Fiók (Profil, Bejelntkezés, Fiók műveletek, Kijelentkezés)), cégnév, about leíró oldal, Term and policy.
    - **Hős szekció**:
        - Kép beillesztésének helye
        - Adatok a posztról
        - Feltöltés gomb.
   - **Megközelíthetőség**: A felhasználó/admin vagy a menüből érheti el, vagy a profiljából az "Új poszt" gombra kattintva.

---

### 8. Poszt módosítása
- **Célja**: A felhasználó/admin itt tud meglévő posztot módosítani.
- **Fő elemek**:
    - **Navigációs sáv(Hamburger menü)**: Logó, Hamburger menü, Menüpontok (Poszt (Poszt feltöltése, Poszt módosítása, Poszt törlése), Fiók (Profil, Bejelntkezés, Fiók műveletek, Kijelentkezés)), cégnév, about leíró oldal, Term and policy.
    - **Hős szekció**:
        - Kép módosításának helye
        - Adatok a posztról és annak a megváltozatatása
        - Módoítás gomb.
   - **Megközelíthetőség**: A felhasználó/admin csak a profiljából a poszt alatti "Módosítás" gombra kattintva érheti el.

---

## 10. Funkció - követelmény megfeleltetés:

- Menhely regisztráció: A weboldalnak képesnek kell lennie helyes ellenőrizni és kezelni a megadott adatokat és sikeresen regisztrálni egy új menhelyet. Amennyiben az adatok hiányosak vagy hibásak, a rendszernek figyelmeztetnie kell  a felhasználót.
- Menhely profil létrehozása és szerkesztése: Képesnek kell lennie a weboldalnak létrehozni a megadott adatokkal egy profilt a menhelyeknek ugyanakkor szerkeszteni is lehetséges legyen a felhasználó számára.
- Állat feltöltése: A menhelyek feltölthetik a gondozásukban lévő állatokat a nevük, fajtájuk, koruk, egészségi állapotuk, oltottságuk és fényképek megadásával.
- Állat adatainak módosítása: A menhelyek módosíthatják a már feltöltött állatok adatait, például a gazdira találás státuszát, egészségi állapot változását vagy új képek feltöltését.
- Kereső funkció: A vendégek és regisztrált felhasználók böngészhetnek az adatbázisban szűrők használatával (pl. fajta, menhely neve, település).                   
- Felhasználói módosítások: menhelyek módosíthatják saját profiladataikat, például a leírást, logót, illetve elérhetőségi adatokat.
- Adatbiztonság és mentés: A rendszer titkosítva tárolja a felhasználói jelszavat.                                                  

## 11. Fogalomszótár:

### Webfejlesztés és technológia

- HTML (Hypertext Markup Language): A weboldalak szerkezetét definiáló nyelv
- CSS (Cascading Style Sheets): A weboldalak kinézetét és formázását szabályozó nyelv
- JavaScript: Interaktív elemeket és dinamikus működést biztosító programozási nyelv
- Web Server: A weboldalakat szolgáltató szoftverrendszer
- URL (Uniform Resource Locator): Az adott weboldal címe és helye az interneten
- PHP: Szerveroldali scriptnyelv weboldalak létrehozásához
- SQL: Adatbázisokkal való kommunikációhoz használt nyelv

### Webes marketing és SEO

- Backlink: Egy másik oldalra mutató linkek egy adott weboldalhoz
- Content Marketing: Tartalmat készítve az ügyfelek érdeklődésének ösztönzése érdekében
- Conversion Rate: Az oldal látogatóinak hányada, akik végrehajtottak egy konkrét cselekedetet
- CPC (Cost Per Click): Az egyes reklámkattintásokért fizetett összeg
- CTR (Click Through Rate): A reklám vagy link kattintási aránya
- Keyword Research: Kulcsszavak meghatározása és elemzése a célcsoport szempontjából
- Link Building: Hivatkozások létrehozása más weboldalakra
- Meta Description: A Google keresési eredményeiben megjelenő leírás rövidítése
- On-page SEO: A weboldalon található SEO-optimalizálási technikák
- Organic Traffic: Természetes keresési eredmények által generált forgalom
- PPC (Pay Per Click): Fizetős reklámmodell, ahol a felhasználó fizet minden kattintásért
- SERP (Search Engine Results Page): A keresőmotorok keresési eredményei oldala
- White Hat SEO: Törvényes és etikus módszerekkel végzett SEO

### Webdesign és felülettervezés

- Responsive Design: Adaptív tervezés, ami optimálisan működik különböző eszközökön
- UI (User Interface): Felhasználói felület, amely lehetővé teszi a felhasználók és a rendszer közötti interakciót
- UX (User Experience): A felhasználók élményét befolyásoló összes tényező
- Wireframe: Egyszerű vázlatos rajz a weboldal felépítéséről

### Webhely fenntartás és biztonság

- Backup: Adatmentés a biztonság érdekében
- CDN (Content Delivery Network): Globális hálózat, mely tartalmakat szolgáltat felhasználóknak közelebbi helyről
- DDoS Protection: Állóideiglenes támadások elleni védelem
- Firewall: Jogi korlátozások betartásának ellenőrzése
- HTTPS: Biztonságos protokoll a weboldalakhoz
- SSL/TLS: Titkosítási protokoll a weboldalakhoz
- Uptime Monitoring: Az oldal elérhetőségének folyamatos figyelése

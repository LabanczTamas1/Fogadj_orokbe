## 10. Implementációs terv:
A Webes felület főként **HTML**, **CSS**, **PHP**, **Javascript** nyelven fog készülni.
Ezeket a technológiákat amennyire csak lehet külön fájlokba írva készítjük, és
úgy fogjuk egymáshoz csatolni a jobb átláthatóság, könnyebb változtathatóság,
és könnyebb bővítés érdekében. Képes lesz felhasználni a Backend részen futó
REST szolgáltatás metódusait, ezáltal tud felvinni és lekérdezni adatokat az
adatbázisból. Az eltelt időt a kliens fogja számolni a feladatoknál, hogy ne
legyenek eltérések. Legfőképpen PHP-t fogunk használni.
## 11. Tesztterv:
### Unit teszt:
Minden lehetséges és fontosabb kisebb részt tesztelni, akár egy form mezőjétől a gombok működéséig, illetve a szélsőséges esetek letesztelése, akár a null, illetve nagy számok tesztjei.
### Alfa teszt:
Itt leteszteljük, hogy mindne böngészőben, illetve milyen verziókban működik a webapp.
### Beta teszt:
A termék reszponzivitásának tesztelése különboző eszközöken és technológiákon.
### Tesztelendő funkciók:
- **Bejelentkezés**
- **Regisztráció**
- **Poszt feltöltése**
- **Poszt módosítása**
- **Felhasználónév módosítása**
- **Jelszó módosítása**
- **Profil törlése**
- **Poszt értékelése**
- **Poszt kommentelése**
- **Posztok szűrése**
- **Keresési tesztek**

## 12. Telepítési terv:
A szoftver webes felületéhez csak egy ajánlott böngésző telepítése
szükséges (Google Chrome, Firefox, Opera, Safari), külön szoftver
nem kell hozzá. A webszerverre közvetlenül az internetről
kapcsolódnak rá a kliensek.
## 13. Karbantartási terv:

1. **Biztonsági frissítések**:  
   - Rendszeres ellenőrzés a PHP és MySQL verziófrissítésekhez.  
   - Automatikus biztonsági mentések beállítása (napi/heti).

2. **Adatbázis optimalizálás**:  
   - Túlméretes táblák optimalizálása (pl. indexek létrehozása).  
   - Redundáns adatbejegyzések eltávolítása.  
   - Adatbázis lekérdezések elemzése és finomítása.

3. **Hibajavítások**:  
   - Felhasználói hibajelentések azonnali kezelése.  
   - PHP error log rendszeres áttekintése.

4. **Funkciók tesztelése**:  
   - Weboldal funkcióinak havi manuális tesztelése.  
   - Automatikus tesztelési scriptek futtatása kritikus elemekre.

5. **Biztonsági intézkedések**:  
   - SSL tanúsítványok frissítése.  
   - Jelszóval védett adminisztrációs felületek rendszeres felülvizsgálata.

6. **Tárhely karbantartása**:  
   - Szerver erőforrás-használat figyelése (pl. CPU, RAM).  
   - Lejárt log fájlok és ideiglenes fájlok törlése.

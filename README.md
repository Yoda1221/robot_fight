# Robots fight application
Bela Fekete
2023. 02. 25. 

## Description
Ez egy egyszerű alkalmazás gyerekeknek, amiben nyílván tudják tartani a robotjaikat és harcba tuják küldeni egymás ellen.
Lehet fogadásokat kötni arra, hogy melyik robot fog nyerni, mert a párosításkor a robotok ereje nem látszik.
A háttérben lévő szines "buborékok" nagyon lassan, de mozognak.
A főoldalon vannak kilistázva a már elmentett robotok és erről az oldalról kiindulva lehet szerkeszteni, vagy éppen törölni a meglévő robotainkat.

## Guide
- A table mappában lévő Mysql utasítáeokkal létre kell hozni az adatbázist és a robotokat nyílvántartó táblát.
- A menüben az "**Add new**" menüpontra klikkelve lehet új robotot hozzáadni az applikációhoz.
    - A robotnak bármilyen nevet adhatunk
    - A típust a legödülő menöből kell választani
    - A robot ereje pedig autómatikusan generálódik 10-100 közt
- A már elmentett robotokat a főoldalon lehet látni, szerkeszteni és törölni
- A szerkesztés ikonra klikkelve módosítható a robot neve, típusa és az ereje is
    - az erő itt is autómatikusan generálódik, attól függetlenül, hogy melyik gombra klikkelünk
        - az "**up**" (pl. ha upgrade-eltük a robotunkat)
        - a "**down**" (pl. ha egy harcott elvesztett és leamortizálódott a gobot)
- A "**Fight**" menüpontra klikkelve a "*Harci*" oldal jön be, ahol a 
    1. "**Pairing**" gombra klikkelve a rendszer random összepárosít 2 robotot. A robotoknak az ereje nem látszik, lehet fogadni, hogy melyik győz. (temészetesen mindig az erősebb)
    2. Ha az első párosítás megtörtént, akkor a "**Fight**" gombra klikkelve kiderül, hogy melyik robot lett a győztes.
    3. A "**Next paring**" gombra klikkelve a rendszer újrapárosít 2 tetszőleges robotot
    Ezután a 2-es és a 3-as pontokat kell ismételnünk, amíg meg nem únjuk. :) 


    ### Changes
    A robotok párosítását nem kiválasztás alápján tettem meg, hanem egy random választóval rendeltem egymáshoz a robotokat, mert a gyerekek képesek a "kedvencüket" kiválasztani és úgy harcba küldeni olyan robotokkal, amiket ha akarnak akkor gyengébbre állítanak és akkor nem lesz benne semmi izgis! :)


    ### Further development
    Természetesen az applikáció jelenlegi állapotában még nem piacképes, legalábbis számomra
    - Beépítenék egy rendom függvényt, ami az összes robot erejét időnként átállítaná és a listában nem is tüntetném fel
        - ezután már lehetne manuálisan is kiválasztani robotokat és azokat egymás ellen "harcba" küldeni
    - Fotó feltöltésével mégérdekesebb lehetne a program, de ez nem volt a feladat réaze
    - Természetesen a program jelenlegi struktúráján is változtatnék
        - jobban elkülöníteném a frontendet és a backendet
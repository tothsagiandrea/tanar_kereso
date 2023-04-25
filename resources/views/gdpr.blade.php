@extends('layouts.main')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/aszf.css') }}">
@endsection

@section('content')
    <div class="container">
        <br>
        <h1>Felhasználói feltételek</h1>

        <h3>Elfogadható használat</h3>

            <p>
                A Tanárt keres oldal lehetőséget biztosít kérdések, posztok és
                multimédiás tartalomak megosztását annak érdekében, hogy gazdagabb és hasznosabb információkat
                kínáljunk a látogatóinknak.
                Azonban fontos, hogy tartsa tiszteletben mások személyiségi jogait és ne sértse semmilyen szellemi tulajdonhoz
                fűződő jogot. Kérjük, ne tegyen semmilyen kijelentést, amely sérti mások becsületét, gyűlöletet keltő, erőszakra vagy rendzavarásra felbujtó lehet.
                A fájlok feltöltésekor kérjük, hogy vegye figyelembe a biztonsági szempontokat, és ne töltsön fel olyan
                fájlokat, amelyek vírusokat tartalmazhatnak vagy biztonsági problémákat okozhatnak a weboldal számára.
                Az Tanártkeres.hu fenntartja magának a jogot, hogy eltávolítsa a jogellenesnek vagy sértőnek ítélt tartalmat a
                weboldalról, hogy a weboldal biztonságos és zavartalan maradjon.
                Köszönjük, hogy használja és hozzájárul a weboldalunkhoz!
            </p>

        <h3>Adatvédelem</h3>

            <p>
                Az Adatvédelmi Nyilatkozat a weboldalon megosztott minden személyes adatra vagy anyagra kiterjed. Erről bővebben <a href="aszf">itt</a>  olvashat.
            </p>

            <h3>Szellemi alkotásokhoz fűződő jogok</h3>

            <p>
                A tanartkeres.hu által vagy nevében publikált anyagokhoz (pl. szövegekhez és képekhez)
                fűződő szerzői-, védjegy- és más szellemi alkotáshoz fűződő jogok jogosultja a tanartkeres.hu, illetve a vonatkozó jogosult engedélyével jelennek meg a weboldalon.
                A Felhasználó jogosult a weboldal tartalmából készült kivonatokat magáncélra (azaz nem kereskedelmi felhasználás céljából) sokszorosítani.
                E jog gyakorlásának feltétele, hogy  a Felhasználó érintetlenül hagyja és tekintetbe veszi a szellemi tulajdonhoz fűződő jogokat,
                köztük a szerzői jogokra vonatkozó szabályzatot.
            </p>

           <h3>A Felhasználók által szolgáltatott tartalom </h3>

           <p>A Felhasználó kijelenti, hogy a weboldalra általa feltett tartalomnak a szerzője vagy rendelkezik a tartalomra vonatkozó jogokkal.
            A Felhasználó belegyezik, hogy az általa feltöltött tartalom nyilvános, valamint hozzájárul ahhoz,
             hogy arra vonatkozóan jogdíjmentes, időbeli korlátozás nélkül, az egész világra kiterjedő felhasználási jogot nyújt a tanartkeres.hu számára
            Tájékoztatjuk, hogy a tanartkeres.hu saját belátása szerint dönthet a tartalom felhasználásáról, valamint
            a már fejlesztett vagy más forrásokból beszerzett hasonló tartalmat, mely esetben a tartalmat illető szellemi
            tulajdonhoz fűződő jogok a tanartkeres.hu oldalt, illetve a vonatkozó jogosultat illetik. </p>

            <h3>Felelősség </h3>

            <p>
                Az tanartkeres.hu mindent megtesz annak érdekében, hogy biztosítsa a weboldalon található anyagok pontosságát és elkerülje a zavarokat.
                Az tanartkeres.hu nem vállal felelősséget semmilyen pontatlan információból, zavarból, az oldal elérhetetlenségéből vagy egyéb
                eseményből eredő közvetlen (pl. számítógép meghibásodása) vagy közvetett (pl. elmaradt haszon) károkért.

                A Felhasználó vállalja, hogy a weboldalon található anyagokat kizárólag saját felelősségére használja.
                A weboldal a tanartkeres.hu weboldalán kívüli más weboldalakra mutató hivatkozásokat tartalmazhat.

                A tanartkeres.hunak nincs ellenőrzése a harmadik felek weboldalai felett és nem támogatja azokat,
                illetve nem vállal felelősséget érte azok tartalmáért, pontosságáért és működéséért.
                Így arra kérjük a Felhasználót, hogy ismerje meg és gondosan olvassa át a meglátogatott más weboldalakon elhelyezett
                jogi és adatvédelmi nyilatkozatokat, módosításait.

                Amennyiben a Felhasználó külső weboldalt üzemeltet és a jelen weboldalhoz kíván hivatkozást létrehozni a tanartkeres.hu ezt nem kifogásolja
                feltéve, hogy a Felhasználó a jelen weboldal nyitóoldali URL-jét adja meg
                és nem keltheti azt a látszatot, hogy a tanartkeres.hu támogatná vagy hozzá kapcsolódna.
                 A „framing“ vagy hasonló megoldások alkalmazása tilos, és a Felhasználó köteles gondoskodni róla,
                 hogy a weboldalra mutató hivatkozás új ablakban nyíljon meg.
            </p>

            <h3>Változások</h3>

            <p> A tanartkeres.hu a jelen felhasználási feltételek módosításának jogát fenntartja.
                A felhasználási feltételek és az esetleges újabb információk áttekintése érdekében látogassa az oldalt.</p>

            <h3>Irányadó jog és joghatóság</h3>

            <p>
                A weboldal magyarországi felhasználók számára készült. A tanartkeres.hu nem tesz arra irányuló kijelentést, hogy
                a weboldalon található anyagok és információk Magyarországon kívül megfelelőek vagy elérhetőek.
                A Felhasználó a weboldal látogatásával elfogadja, hogy a weboldal használatából származó vagy azzal kapcsolatos vitákra
                és követelésekre Magyarország joga alkalmazandó. Az esetleges jogviták eldöntésére Magyarország bíróságai rendelkeznek kizárólagos joghatósággal.
                Felhasználó a weboldal látogatásával elfogadja a jelen Felhasználási feltételeket.
            </p>

            <button
            class="btn btn-outline-dark vissza" type="submit">
            <a href="{{route('gdprPage')}}">Vissza az oldal tetejére</a>
            </button>





            <br>
    </div>
@endsection

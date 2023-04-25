@extends('layouts.main')

@section('content')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/aszf.css') }}">
@endsection



<div class="container ">
    <article class="col-sm12 col-lg6">
        <div class="flex-container">
            <div id="carousel-container">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/slide1.jpg" class="d-block w-100 img-fluid" alt="slide1">
                            <div class="carousel-caption d-none d-md-block"></div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/slide2.jpg" class="d-block w-100 img-fluid" alt="slide2">
                            <div class="carousel-caption d-none d-md-block"></div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/slide3.jpg" class="d-block w-100 img-fluid" alt="slide3">
                            <div class="carousel-caption d-none d-md-block"></div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/slide4.jpg" class="d-block w-100 img-fluid" alt="slide4">
                            <div class="carousel-caption d-none d-md-block"></div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>


            </div>

            <div class="flex-item-right">
                <p class="infolink"><b>Fontosabb információk</b><br>Itt megpróbáltuk összegyűjteni a fontosabb <br>
                    információkhoz szükséges linkeket.</p>
                <a href='https://www.felvi.hu/felveteli' target="blank">Felvételi » Alapinformációk »</a>
                <a href='https://www.felvi.hu/'>felvi.hu</a>
                <a href='https://dtk.tankonyvtar.hu/'>Digitális Tankönyvtár oldala</a>
                <a href='https://tudasbazis.sulinet.hu/hu'>Sulinet>>Tudásbázis</a>
                <a href='https://mek.oszk.hu/'>Magyar Elektronikus Könyvtár</a>
                <a href='https://hirmagazin.sulinet.hu/hu/hirek/jatekalapu-tanulas'>Játékalapú tanulás?</a>
                <a href='https://www.w3schools.com/css/tryit.asp?filename=trycss3_flexbox_responsive2'>akármi</a>
            </div>
        </div>

        <div>
            <br>
            <br>
            <article class="row">
                <div class="col-12">
                    <h3>Tippek szülőknek:</h3>
                    <p>
                        <b>Ha úgy döntesz,</b> hogy magántanárt szeretnél találni a gyermekednek, akkor az
                        alábbi tippeket érdemes szem előtt tartanod:
                        Első lépésként érdemes beszélni a gyermek tanáraival, hogy kiderüljön, mely
                        területeken van szüksége a gyermeknek további segítségre.
                        Érdemes utánanézni az online magántanárok oldalainak, és keresni azokat, akik
                        szakosodtak a gyermek által tanulmányozott területen.
                        Kérj ajánlást más szülőktől, akik már korábban használták a magántanár
                        szolgáltatását.
                        Kérj ajánlást az iskola tanáraitól, vagy a tanároktól, akik szakosodtak az adott
                        területen.
                    </p>
                </div>
            </article>
            <article class="row">
                <div class="col-12">

                </div>
                <div class="col-sm-6 col-lg-4">
                    <img src="img/cikk1.png" alt="cikk1 "style=style=height:300px class="img-fluid img-thumbnail">;

                    <br>
                    <br>
                    <p>
                        <b>Ha valaki</b> a barátaid vagy a családtagjaid közül magántanárt alkalmazott
                        korábban, kérj tőlük ajánlást.
                        Ha a gyermeknek speciális igényei vannak (például tanulási nehézségek), akkor olyan
                        magántanárt keresel, aki tapasztalt ilyen területen.
                        Ha olyan magántanárt keresel, aki közel van a lakhelyedhez, keress olyanokat, akik a
                        te környékeden dolgoznak.
                        Válaszd ki azokat a magántanárokat, akik a gyermek korához és tanulási szintjéhez
                        illeszkednek.
                        Kérdezd meg a magántanárt, hogy milyen módszereket alkalmaz a tanítás során.
                        Ellenőrizd a magántanár végzettségét és tapasztalatát.
                    </p>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <img src="img/cikk2.png" alt="cikk1 ";
                        class="img-fluid img-thumbnail">
                    <br>
                    <br>
                    <p>
                        <b>Érdemes kérni</b> egy ingyenes konzultációt az előzetes találkozó előtt, hogy
                        kiderüljön, hogy a magántanár és a gyermek hogyan illeszkednek egymáshoz.
                        Kérj referenciákat a magántanártól, hogy megbizonyosodj arról, hogy megbízható és
                        eredményes.
                        Kérdezd meg a magántanárt, hogy hogyan tartják a kapcsolatot, és hogyan tartják a
                        diák fejlődését nyomon.
                        Az ár is fontos szempont, ezért kérj több ajánlatot, és hasonlítsd össze az árakat.
                        Ha a gyermek tanulási nehézségekkel küzd, akkor kérj olyan magántanárt, aki
                        tapasztalt azzal kapcsolatban,
                        hogy hogyan segítheti a diákokat, akiknek nehézségeik vannak.

                    </p>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <img src="img/cikk3.png" alt="cikk1 ";
                        class="img-fluid img-thumbnail">
                    <br>
                    <br>
                    <p>
                        <b>Egy magántanár segíthet</b> a diákoknak abban, hogy hatékonyabban és
                        eredményesebben
                        sajátítsák el a tananyagot. Az alábbiakban 30 olyan előnyt mutatok be, amit egy
                        magántanár nyújthat a diákoknak:
                        Egy magántanár egyénre szabott oktatást nyújt, amely lehetővé teszi a diákoknak,
                        hogy a saját ütemükben haladjanak.
                        A magántanár több időt tud szánni az egyes diákokra, mint amennyit a tömegoktatásban
                        egy tanár tudna.
                        A magántanár személyes figyelmet tud szentelni a diák egyéni tanulási stílusának és
                        igényeinek.

                    </p>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <img src="img/cikk4.png" alt="cikk1 ";
                        class="img-fluid img-thumbnail">
                    <br>
                    <br>

                    <p>
                        <b>A magántanár személyes</b> visszajelzést tud adni a diák teljesítményéről.
                        Megérti, hogy minden diák különböző és egyedi, így olyan oktatási
                        megoldásokat tud alkalmazni, amelyek a diák igényeire szabottak.
                        Segít a diákoknak abban, hogy megbirkózzanak a nehéz vagy összetett
                        tananyaggal.
                        Motiválja a diákokat, és segít nekik elérni a céljaikat.

                        Könnyen alkalmazkodik az egyes diákok tanulási tempójához és
                        stílusához.
                        Segít a diákoknak megtalálni a saját erősségeiket és kihívásaikat.

                    </p>

                    <p><b>Felkészíti a diákokat</b> az érettségi vizsgákra vagy más fontos vizsgákra.
                        Lehetőséget biztosít a diákoknak, hogy megtanuljanak a tanórán kívül
                        is.
                        Segíti a diákokat abban, hogy jobban megértsék a tananyagot, és hogy
                        összefüggéseket lássanak az egyes témakörök között.
                        Segít a diákoknak abban, hogy kritikus gondolkodóvá váljanak.
                        Javítja a diák kommunikációs képességeit.

                    </p>

                    <br>
                    <br>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <img src="img/cikk5.png" alt="cikk1 ";
                        class="img-fluid img-thumbnail">
                    <br>
                    <br>

                    <p><b>
                        Ha úgy döntesz, hogy magántanárt szeretnél találni a gyermekednek, akkor az alábbi
                        tippeket érdemes szem előtt tartanod:</b>
                    </p>
                    <p>

                        Első lépésként érdemes beszélni a gyermek tanáraival, hogy kiderüljön, mely
                        területeken van szüksége a gyermeknek további segítségre.
                        Érdemes utánanézni az online magántanárok oldalainak, és keresni azokat, akik
                        szakosodtak a gyermek által tanulmányozott területen.
                        Kérj ajánlást más szülőktől, akik már korábban használták a magántanár
                        szolgáltatását.
                        Kérj ajánlást az iskola tanáraitól, vagy a tanároktól, akik szakosodtak az adott
                        területen.
                        Ha valaki a barátaid vagy a családtagjaid közül magántanárt alkalmazott korábban,
                        kérj tőlük ajánlást.
                        Ha a gyermeknek speciális igényei vannak (például tanulási nehézségek), akkor olyan
                        magántanárt keresel, aki tapasztalt ilyen területen.

                    </p>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <img src="img/cikk6.png" alt="cikk1 ";
                        class="img-fluid img-thumbnail">
                    <br>
                    <br>
                    <p>
                        <b>Ha olyan magántanárt keresel,</b> aki közel van a lakhelyedhez, keress olyanokat, akik a
                        te környékeden dolgoznak.Válaszd ki azokat a magántanárokat, akik a gyermek korához és tanulási szintjéhez illeszkednek.
                        Kérdezd meg a magántanárt, hogy milyen módszereket alkalmaz a tanítás során.
                        Érdemes kérni egy ingyenes konzultációt az előzetes találkozó előtt, hogy kiderüljön, hogy a magántanár és a gyermek hogyan illeszkednek egymáshoz.
                        Kérj referenciákat a magántanártól, hogy megbizonyosodj arról, hogy megbízható és eredményes.
                        Kérdezd meg a magántanárt, hogy hogyan tartják a kapcsolatot, és hogyan tartják a diák fejlődését nyomon.
                        Az ár is fontos szempont, ezért kérj több ajánlatot, és hasonlítsd össze az árakat.
                        Ha a gyermek tanulási nehézségekkel küzd, akkor kérj olyan magántanárt, aki tapasztalt azzal kapcsolatban, hogy hogyan segítheti a diákokat, akiknek nehézségeik vannak.


                    </p>

                </div>
            </article>
        </div>
</div>
@endsection
